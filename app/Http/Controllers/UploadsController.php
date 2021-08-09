<?php

namespace App\Http\Controllers;

use App\Business\Upload\Upload;
use Illuminate\Http\Request;

class UploadsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $upload = Upload::where('slug', $slug)->first();
        if (empty($upload)){
            abort(404);
        }

        //verificamos si el archivo existe y lo retornamos
        if (!empty($upload) && \Storage::exists($upload->ruta_relativa)) {
            if(request()->get('d') == 'stream'){
                return response()->file(storage_path('app/').$upload->ruta_relativa, $upload->nombre);  // to display a file in user's browser
            }
            return response()->download(storage_path('app/').$upload->ruta_relativa, $upload->nombre);  // download
        }
        // si no se encuentra lanzamos un error 404.
        abort(404);
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
        $id = decrypt($id);
        $upload = Upload::find($id);
        if (!empty($upload)){
            $upload->delete();
            session()->flash('upload-deleted','Archivo eliminado correctamente');
            session()->flash('scroll_to','#uploaded-files-title');
        }
        return redirect()->back();
    }
}
