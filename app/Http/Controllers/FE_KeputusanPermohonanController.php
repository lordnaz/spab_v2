<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class FE_KeputusanPermohonanController extends Controller
{
    //
    public function keputusanpermohonan(){

      

        $request = Request::create('/api/display_all_permohonan_pengesahan', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['dataa'];

        
        return view('components.keputusan-permohonan-table')->with('datas', $datas);

    }
    public function keputusanpermohonanybNRIC($code){

        $code = decrypt($code);
        
       

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_keputusanbynric', [
            'code' => $code,
        ]);
       
       
        $datas = $request['data'];
        $datass = $request['dataa'];
        $datasss = $request['dataaa'];
        // $datassss = $request['dataaaa'];
        
        return view('components.keputusan-permohonan-new')->with('datas', $datas)->with('datass',$datass)->with('datasss',$datasss);
      


        
    }



}
