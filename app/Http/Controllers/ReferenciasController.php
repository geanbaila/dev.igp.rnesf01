<?php

namespace App\Http\Controllers;

use App\Business\Admin\UserService;
use App\Business\Estacion\Almacenamiento;
use App\Business\Estacion\TipoComunicacion;
use App\Business\Estacion\Fuente;
use App\Business\Estacion\Referencia\EstacionReferencia;
use App\Business\Estacion\Referencia\ReferenciasCreateRequest;
use App\Business\Estacion\Referencia\ReferenciaService;
use App\Business\Estacion\Serie;
use App\Business\Lista\ListaService;
use App\Business\Pais\PaisService;
use App\Business\Upload\Upload;
use App\Business\Upload\UploadHelper;
use App\Business\Upload\UploadService;
use App\Business\Utils;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReferenciasController extends Controller{
    /**
     * @var PaisService
     */
    private $paisService;
    /**
     * @var UploadService
     */
    private $uploadService;
    /**
     * @var ReferenciaService
     */
    private $referenciaService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ListaService
     */
    private $listaService;

    private $DESCRIPCION_TIPO_COMUNICACION = 4;
    private $SIN_FIRMA=1;
    private $CON_FIRMA=2;
    private $EN_EDICION=3;

    /**
     * ReferenciasController constructor.
     * @param PaisService $paisService
     * @param UploadService $uploadService
     * @param ReferenciaService $referenciaService
     * @param UserService $userService
     * @param ListaService $listaService
     */
    public function __construct(PaisService $paisService, UploadService $uploadService,
                                ReferenciaService $referenciaService, UserService $userService, ListaService $listaService){
        $this->paisService = $paisService;
        $this->uploadService = $uploadService;
        $this->referenciaService = $referenciaService;
        $this->userService = $userService;
        $this->listaService = $listaService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $filters = $this->getFilterValues();
        $prg_stations = array();
 
        $filters['signed_file_path'] = $this->EN_EDICION;//en edición
        $prg_stations[] = $this->referenciaService->findAll($filters)->get();

        $filters['signed_file_path'] = $this->SIN_FIRMA;//sin firma
        $prg_stations[] = $this->referenciaService->findAll($filters)->get();

        $filters['signed_file_path'] = $this->CON_FIRMA;//con firma
        $prg_stations[] = $this->referenciaService->findAll($filters)->get();

        $users = $this->userService->findAll();

        return view('referencia.index')
            ->with('filters',$filters)
            ->with('users', $users)
            ->with('prg_stations', $prg_stations)
            ->with('SIN_FIRMA', $this->SIN_FIRMA)
            ->with('CON_FIRMA', $this->CON_FIRMA)
            ->with('EN_EDICION', $this->EN_EDICION);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function previousAddition(Request $request){
        $items = $request->get('selected_items');
        $items = str_without_starting($items,',');
        $items = collect(explode(',', $items));

        $items = $items->map(function ($value){ return base64_decode($value);});
        $items = $items->sort()->unique();
        $items = $items->filter(function ($item){
            return is_full_integer($item);
        });

        $list = $this->listaService->findPending(['user_id' => auth()->user()->id]);

        $this->referenciaService->findByIds($items)->update(['lista_id' => $list->id]);

        if ($items->count() > 0){
            session()->flash('added-stations', $items->count());
        }

        return redirect()->route('estaciones.referencias.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function previousRemove($id){
        $id = decrypt($id);
        $station = $this->referenciaService->findById($id);
        $station->lista_id = null;
        $station->update();

        return redirect()->route('draf.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $districts = $this->paisService->findAllDistricts();
        $almacenamientos = Almacenamiento::all();
        $prg_tipocomunicacion = TipoComunicacion::all();
        $fuentes = Fuente::all();
        $fix_tipocomunicacion = $this->DESCRIPCION_TIPO_COMUNICACION;


        return view('referencia.create')
            ->with('almacenamientos', $almacenamientos)
            ->with('fuentes', $fuentes)
            ->with('districts', $districts)
            ->with('prg_tipocomunicacion', $prg_tipocomunicacion)
            ->with('fix_tipocomunicacion', $fix_tipocomunicacion);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ReferenciasCreateRequest $request){
        $data = $request->all();
        $isOk = false;

        DB::transaction(function () use ($data, &$isOk, $request){
            $station = $this->referenciaService->save($data);
            $serie = Serie::available(auth()->user()->id, EstacionReferencia::TYPE);
            $station->numero = $serie->full_number;
            $station->update();
            $serie->next = $serie->next+1;
            $serie->update();
            $isOk = true;

            $station->fuentes()->sync($request->get('fuentes'));

            $sync = array();
            foreach ($request->get('almacenamientos') as $st){
                $sync[$st] = ['capacidad'=>$request->get('storage'.$st,'')];
            }
            $station->almacenamientos()->sync($sync);

            $sync = array();
            foreach ($request->get('tipocomunicacion') as $st){
                $sync[$st] = ['descripcion'=>$request->get('tipocomunicacion'.$st,'')];
            }
            $station->tipocomunicacion()->sync($sync);


            // save files
            if($request->hasFile('sheets')){
                $data = UploadHelper::saveFiles($request->file('sheets'), $station->id,
                    EstacionReferencia::MORPH_NAME, Upload::SHEET_TYPE);
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            if($request->hasFile('files')){
                $data = UploadHelper::saveFiles($request->file('files'),$station->id ,
                    EstacionReferencia::MORPH_NAME, Upload::PHOTO_TYPE, $request->get('files_description'));
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            if($request->hasFile('other_files')){
                $data = UploadHelper::saveFiles($request->file('other_files'),$station->id ,
                    EstacionReferencia::MORPH_NAME, Upload::OTHER_FILES_TYPE, $request->get('other_files_description'));
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            // save files

            Utils::sendStationStoredMail($station);
        });

        if ($isOk === true){
            session()->flash('saved-correctly','Guardado correctamente');
            // Guardar archivos en sistema de archivos y db
        }

        return redirect()->route('estaciones.referencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $id = decrypt($id);

        $station = $this->referenciaService->findById($id);
        $districts = $this->paisService->findAllDistricts();
        $almacenamientos = Almacenamiento::all();
        $prg_tipocomunicacion = TipoComunicacion::all();
        $fuentes = Fuente::all();

        $selected_storages = $station->almacenamientos;
        $selected_tipocomunicacion = $station->tipocomunicacion;
        $selected_fuentes = $station->fuentes->pluck('id')->all();

        //artificio para obtener la descripción para el checkbox
        $fix_tipocomunicacion = $this->DESCRIPCION_TIPO_COMUNICACION;

        return view('referencia.edit')
            ->with('districts', $districts)
            ->with('station', $station)
            ->with('almacenamientos', $almacenamientos)
            ->with('fuentes', $fuentes)
            ->with('selected_fuentes', $selected_fuentes)
            ->with('selected_storages', $selected_storages)
            ->with('prg_tipocomunicacion', $prg_tipocomunicacion)
            ->with('selected_tipocomunicacion', $selected_tipocomunicacion)
            ->with('fix_tipocomunicacion', $fix_tipocomunicacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReferenciasCreateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ReferenciasCreateRequest $request, $id){
        $id = decrypt($id);
        $station = $this->referenciaService->findById($id);
        $station = $this->referenciaService->update($station, $request->all());

        if (!empty($station)){
            $station->fuentes()->sync($request->get('fuentes'));

            $sync = array();
            foreach ($request->get('almacenamientos') as $st){
                $sync[$st] = ['capacidad'=>$request->get('storage'.$st,'')];
            }
            $station->almacenamientos()->sync($sync);

            $sync = array();
            foreach ($request->get('tipocomunicacion') as $st){
                $sync[$st] = ['descripcion'=>$request->get('tipocomunicacion'.$st,'')];
            }
            $station->tipocomunicacion()->sync($sync);


            session()->flash('saved-correctly','Actualizado correctamente');

            // save files
            if($request->hasFile('sheets')){
                $data = UploadHelper::saveFiles($request->file('sheets'), $station->id,
                    EstacionReferencia::MORPH_NAME, Upload::SHEET_TYPE);
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            if($request->hasFile('files')){
                $data = UploadHelper::saveFiles($request->file('files'),$station->id ,
                    EstacionReferencia::MORPH_NAME, Upload::PHOTO_TYPE, $request->get('files_description'));
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            if($request->hasFile('other_files')){
                $data = UploadHelper::saveFiles($request->file('other_files'),$station->id ,
                    EstacionReferencia::MORPH_NAME, Upload::OTHER_FILES_TYPE, $request->get('other_files_description'));
                if ( count($data) > 0){
                    $this->uploadService->saveAll($data);
                }
            }
            // save files

            return redirect()->route('estaciones.referencias.edit', encrypt($station->id));
        }
        return redirect()->route('estaciones.referencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        //
    }
}
