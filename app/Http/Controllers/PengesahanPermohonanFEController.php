<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;

class PengesahanPermohonanFEController extends Controller
{
    
    public function display_pengesahan_permohonan(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"],['name' => "Pengesahan Permohonan"]
        ];

        $request = Request::create('/api/display_permohonan', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components..pengesahan-permohonan-detail', ['breadcrumbs' => $breadcrumbs], compact('datas'));
        

    }

   



    public function sahkan_permohonan($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/sahkan', [
            'code' => $code,
        ]);

       

        return redirect()->route('display_pengesahan_permohonan');


        
    }

    public function tolak_permohonan($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/tolak_pengesahan_pemohon', [
            'code' => $code,
        ]);

       

        return redirect()->route('display_pengesahan_permohonan');

    }



}
