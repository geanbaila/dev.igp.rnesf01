<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }

    public function preview(){
        return view('preview');
    }

    public function queryRucs($ruc){
        $token = env('IGP_SERVICES_TOKEN');

        if(!is_full_integer($ruc)){
            return response()->json([], 400);
        }

        try {
            $client = new Client(['base_uri' => 'http://test.igp.gob.pe:8080']);
            $options = ['headers' => ['Authorization' => $token]];
            $response = $client->request('GET', '/serviceruc/api/v1/rucs/' . $ruc, $options);
            $response = $response->getBody()->getContents();

            $user = User::where('ruc','=',$ruc)->first();
            if (!empty($user)){
                return response()->json(['response'=>$response, 'exists' => true], 201);
            }

            return response()->json(['response'=>$response, 'exists' => false], 200);
        }catch (\Exception $e){
            return response()->json([], 503);
        }
    }

}
