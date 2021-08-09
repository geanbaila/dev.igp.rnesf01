<?php

namespace App\Http\Controllers;

use App\Business\Admin\UserService;
use App\Business\Lista\ListaService;
use App\Exports\AcelerometricasStationsExport;
use App\Exports\SismicasStationsExport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ListAdminController extends Controller{
    /**
     * @var ListaService
     */
    private $listaService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * ListAdminController constructor.
     * @param ListaService $listaService
     * @param UserService $userService
     */
    public function __construct(ListaService $listaService, UserService $userService){
        $this->listaService = $listaService;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        $users = $this->userService->findAll();

        $filters['institution_filter'] = $request->get('inst', null);
        if (!empty($request->get('inst'))){
            $filters['institution_filter'] = base64_decode($filters['institution_filter']);
        }

        $lists = $this->listaService->findReceivedLists($filters)->paginate(15)
            ->appends($request->query());

        return view('admin.lists.index')
            ->with('lists',$lists)
            ->with('users', $users)
            ->with('filters', $filters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        $id = decrypt($id);
        $list = $this->listaService->findById($id);

        return view('admin.lists.show')
            ->with('list', $list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id){
        //
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

    public function export($id){
        $t = request()->get('t');
        $id = decrypt($id);
        $list = $this->listaService->findById($id);

        mb_internal_encoding('UTF-8');

        if ($t == 'sis'){
            // iterate throught all the records
            return Excel::download(new SismicasStationsExport($list->sismicas), 'sismicas.csv',
            \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);
        }elseif ($t == 'acel'){
            // iterate throught all the records
            return Excel::download(new AcelerometricasStationsExport($list->acelerometricas), 'acelerometricas.csv',
                \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);
        }
    }
}
