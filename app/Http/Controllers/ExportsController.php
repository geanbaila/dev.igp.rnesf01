<?php

namespace App\Http\Controllers;

use App\Business\Estacion\Acelerometrica\AcelerometricaService;
use App\Business\Estacion\Referencia\ReferenciaService;
use App\Business\Estacion\Sismica\EstacionSismica;
use App\Business\Estacion\Sismica\SismicasService;
use App\Business\Lista\ListaService;
use App\Business\Upload\ArchivoFirmado;
use Illuminate\Http\Request;

class ExportsController extends Controller{
    /**
     * @var SismicasService
     */
    private $sismicasService;
    /**
     * @var AcelerometricaService
     */
    private $acelerometricaService;
    /**
     * @var ReferenciaService
     */
    private $referenciaService;
    /**
     * @var ListaService
     */
    private $listaService;


    /**
     * ExportsController constructor.
     * @param SismicasService $sismicasService
     * @param AcelerometricaService $acelerometricaService
     * @param ReferenciaService $referenciaService
     * @param ListaService $listaService
     */
    public function __construct(SismicasService $sismicasService,
                                AcelerometricaService $acelerometricaService,
                                ReferenciaService $referenciaService, ListaService $listaService){

        $this->sismicasService = $sismicasService;
        $this->acelerometricaService = $acelerometricaService;
        $this->referenciaService = $referenciaService;
        $this->listaService = $listaService;
    }

    public function uploadedFiles(){
        $signed_files = ArchivoFirmado::where('user_id','=',auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('uploads.create')
            ->with('signed_files', $signed_files);
    }

    public function storeUploadedFiles(Request $request){
        $data = array();
        $file = $request->file('file');

        if ($request->hasFile('file') && $file->isValid()){
            $result = save_file(['file'=>$file, 'folder'=>ArchivoFirmado::STORAGE_FOLDER, 'disk'=>'local']);
            if($result){
                $data['ruta_relativa'] = $result;
                $data['nombre'] = $file->getClientOriginalName();
                $data['slug'] = str_slug($data['nombre'].'-'.time());
                $data['user_id'] = auth()->user()->id;

                $signed = new ArchivoFirmado;
                $signed->fill($data);
                $signed->save();
                session()->flash('saved-correctly','Guardado correctamente');
            }
        }

        return redirect()->route('upload.signed.format');

    }

    public function downloadFormat1(){
        $user = auth()->user();
        $file_name = 'formulario-rsn-f01-'.$user->username.'.pdf';
        $params = array();
        $params['institution_id'] = $user->id;

        $data['sismicas'] = $this->sismicasService->findForFormats($params);
        $data['acelerometricas'] = $this->acelerometricaService->findForFormats($params);
        $data['referencias'] = $this->referenciaService->findForFormats($params);
        $data['user'] = auth()->user();

        $header = view('pdfs.parts.header')->render();
        //$footer = view($requirement->pdf_template_name.'.parts.footer')->with('requirement',$requirement)->render();

        //return view('pdf', $data);
        return \SnappyPDF::setPaper('a4')
            ->setOption('margin-top', '20mm')
            ->setOption('margin-bottom', '25mm')
            ->setOption('header-html', $header)
            //->setOption('footer-html', $footer)
            ->loadView('pdfs.format1', $data)
            ->download($file_name);
    }

    public function downloadSignedFiles($slug){
        $signed = ArchivoFirmado::where('slug', $slug)->first();
        if (empty($signed)){
            abort(404);
        }

        //verificamos si el archivo existe y lo retornamos
        if (!empty($signed) && \Storage::exists($signed->ruta_relativa)) {
            if(request()->get('d') == 'stream'){
                return response()->file(storage_path('app/').$signed->ruta_relativa, $signed->nombre);  // to display a file in user's browser
            }
            return response()->download(storage_path('app/').$signed->ruta_relativa, $signed->nombre);  // download
        }
        // si no se encuentra lanzamos un error 404.
        abort(404);
    }

    public function drafList(Request $request){
        $user = auth()->user();
        // sísmicas, acelerométricas, referencia

        $list = $this->listaService->findPending( ['user_id' => auth()->user()->id] );

        $sismicas = $list->sismicas;
        $acelerometricas = $list->acelerometricas;
        $referencias = $list->referencias;

        /*if ($request->session()->has(EstacionSismica::SESSION_PREVIOUS_KEY)){
            $keys = $request->session()->get(EstacionSismica::SESSION_PREVIOUS_KEY);
            $sismicas = $this->sismicasService->findAll([
                'stations_filter_institution' => $user->id,
                'stations_filter_ids_in' => $keys,
            ])->get();
        }*/
        
        return view('pending')
            ->with('list', $list)
            ->with('sismicas', $sismicas)
            ->with('acelerometricas', $acelerometricas)
            ->with('referencias', $referencias);
    }

    public function downloadFormat1FromSession(Request $request){
        $user = auth()->user();
        $file_name = 'formulario-rnes-f01-'.$user->username.'.pdf';
        $list = $this->listaService->findPending( ['user_id' => auth()->user()->id] );

        $data['list'] = $list;
        $data['sismicas'] = $list->sismicas;
        $data['acelerometricas'] = $list->acelerometricas;
        $data['referencias'] = $list->referencias;

        $data['user'] = auth()->user();

        $header = view('pdfs.parts.header')->render();
        //$footer = view($requirement->pdf_template_name.'.parts.footer')->with('requirement',$requirement)->render();

        
        //return view('pdf', $data);
        return \SnappyPDF::setPaper('a4')
            ->setOption('margin-top', '20mm')
            ->setOption('margin-bottom', '25mm')
            ->setOption('header-html', $header)
            //->setOption('footer-html', $footer)
            ->loadView('pdfs.format1', $data)
            ->stream($file_name);

    }




}
