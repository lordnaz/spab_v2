<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FE_PermohonanController extends Controller
{
    //
    public function registration(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"], ['name' => "Permohonan Baru"]
        ];

        // $request = Request::create('/api/display_allprogram', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        // return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

        return view('components.permohonan-baru', ['breadcrumbs' => $breadcrumbs]);
    }

}
