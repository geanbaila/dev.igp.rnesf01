<?php

namespace App\Http\Controllers;

use App\Business\Estacion\Acelerometrica\AcelerometricaService;
use App\Business\Estacion\Referencia\ReferenciaService;
use App\Business\Estacion\Sismica\SismicasService;
use App\Business\Lista\ListaService;
use App\Mail\ListArriveMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListsController extends Controller{

    /**
     * @var ListaService
     */
    private $listaService;

    /**
     * ListsController constructor.
     * @param ListaService $listaService
     */
    public function __construct(ListaService $listaService){
        $this->listaService = $listaService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = auth()->user();
        $lists = $this->listaService->findSentLists(['user_id' => $user->id])->paginate();

        return view('lists.index')
            ->with('lists', $lists);
    }

    public function download($id){
        $id = decrypt($id);
        $list = $this->listaService->findById($id);

        if (empty($list)){
            abort(404);
        }

        //verificamos si el archivo existe y lo retornamos
        if (\Storage::exists($list->signed_file_path)) {
            if(request()->get('d') == 'stream'){
                return response()->file(storage_path('app/').$list->signed_file_path);  // to display a file in user's browser
            }
            return response()->download(storage_path('app/').$list->signed_file_path);  // download
        }
        // si no se encuentra lanzamos un error 404.
        abort(404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function signatureArgs($id){
        $metadata = [];
        $user = auth()->user();

        $id = decrypt($id);
        $type = in_array(request()->get('type'),['W','L'])?request()->get('type'):'W';
        $list = $this->listaService->findById($id);
        $fileName = str_slug('formulario-rsn-f01-'.$user->username);

        $metadata['s'] = time();
        $metadata['file_name'] = $fileName;
        // $metadata['personal'] = encrypt(auth()->user()->personal_id);  // personal_id
        $metadata['target'] = encrypt($list->id);  // id of list

        // Customize args for a requirement
        // $filter = (!empty(auth()->user()->persona))?'.*'.auth()->user()->personal->dni.'.*':config('signature.default_params.dcfilter');
        // $args['dcfilter'] = $filter;
        $args = config('signature.default_params');
        $args['type'] = $type;
        $args['posx'] = 322;
        $args['posy'] = 100;
        $args['fileDownloadUrl'] = route('public.resource.download.signable',[encrypt($id)]);
        $args['fileUploadUrl'] = route('public.resource.upload.signed').'?s='.$metadata['s'];
        $args['contentFile'] = $fileName.'.pdf';
        $args['outputFile'] = $fileName.'-firmado.pdf';

        $data['args'] = $args;
        $data['args_64'] = base64_encode(json_encode($args));
        $data['metadata'] = $metadata;

        return response()->json($data);
    }

    public function signatureUpdate(Request $request, $id){
        $id = decrypt($id);
        $list = $this->listaService->findById($id);

        $origin = '/signed-files/'.$request->get('file_name').'-firmado.pdf'.$request->get('s');

        if (\Storage::exists($origin)){
            $list->signed_file_path = $origin;
            $list->fecha_firma = current_time();

            // $list->numero = 'something';

            $list->save();

            // Send an email and set a flash message ...
            $user = auth()->user();
            $mail = Mail::to($user->email, $user->name);

            $bccs = collect();

            if(!empty(env('FORM_MAIL_TO',''))){
                $bccs->push(env('FORM_MAIL_TO'));
            }
            if (!empty(env('FORM_MAIL_TO_2',''))){
                $bccs->push(env('FORM_MAIL_TO_2'));
            }
            if (!empty(env('FORM_MAIL_TO_3',''))){
                $bccs->push(env('FORM_MAIL_TO_3'));
            }
            if (!empty(env('FORM_MAIL_TO_4',''))){
                $bccs->push(env('FORM_MAIL_TO_4'));
            }
            if (!empty(env('FORM_MAIL_OTIDG_TO',''))){
                $bccs->push(env('FORM_MAIL_OTIDG_TO'));
            }

            if ($bccs->isNotEmpty()){
                $mail->bcc($bccs->all());
            }
            $mail->send(new ListArriveMail($list));

            return response()->json(['status'=>0]);  // Ok
        }
        return response()->json(['status'=>1]);  //  Something was wrong
    }

    public function downloadSignable($id){
        $list = $this->listaService->findById(decrypt($id));
        $user = $list->user;
        $file_name = 'formulario-rsn-f01-'.$user->username.'.pdf';

        $data['list'] = $list;
        $data['sismicas'] = $list->sismicas;
        $data['acelerometricas'] = $list->acelerometricas;
        $data['referencias'] = $list->referencias;

        $data['user'] = $user;

        $header = view('pdfs.parts.header')->render();

        return \SnappyPDF::setPaper('a4')
            ->setOption('margin-top', '20mm')
            ->setOption('margin-bottom', '25mm')
            ->setOption('header-html', $header)
            //->setOption('footer-html', $footer)
            ->loadView('pdfs.format1', $data)
            ->download($file_name);
    }

    public function storeSignedDocument(Request $request){
        $suffix = $request->get('s');
        /*if(auth()->guest()){
            $itoken = $request->get('itoken');
            if (empty($itoken)) abort(404);
            $token = jwt_parse($itoken);
            if ($token['error_code'] != 0) abort(401, $token['error_message']);
            $suffix = $token['claims']['s'];
            if (empty($suffix)) abort(401);
        }*/

        $input_name = config('signature.default_params.idFile');
        // $suffix = decrypt($request->get('token'));
        $client_name = $request->file($input_name)->getClientOriginalName().$suffix;

        if ( $request->hasFile($input_name) && $request->file($input_name)->isValid() ){  // file
            save_file([
                'disk' => 'local',
                'file' => $request->file($input_name),
                'folder' => 'signed-files',
                'file_name' => $client_name
            ]);

            return response()->json(['response'=>'Ok']);
        }
        abort(401);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    public function showStation($id){
        $id = decrypt($id);
        $type = base64_decode(request()->get('type'));
        $html_text = '';

        if (!empty($type) && in_array($type, [1,2,3])){
            if ($type == 1){  // sismicas
                $service = new SismicasService();
                $station = $service->findById($id);

                $html_text = view('admin.lists.show.sismica')->with('station',$station)->render();
                $html_text = clean_extra_whitespaces($html_text);
            }elseif ($type == 2){  // acelerometricas
                $service = new AcelerometricaService();
                $station = $service->findById($id);

                $html_text = view('admin.lists.show.acelerometrica')->with('station',$station)->render();
                $html_text = clean_extra_whitespaces($html_text);
            }elseif ($type == 3){  // referencias
                $service = new ReferenciaService();
                $station = $service->findById($id);

                $html_text = view('admin.lists.show.referencia')->with('station',$station)->render();
                $html_text = clean_extra_whitespaces($html_text);
            }
        }

        return response()->json(['content'=>$html_text]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
