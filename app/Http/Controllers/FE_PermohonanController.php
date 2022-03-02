<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
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

    public function add_permohonan(Request $req){

        // $data = $req->input();

        $param = [
            'nric' => $req->nric,
            'program' => $req->program,
            'type' => $req->type,
            'faculty' => $req->faculty,
            'field' => $req->field,
            'sub_field' => $req->sub_field,
            'notes' => $req->notes,
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/add_permohonan', $param);

        return redirect()->route('program');

    }

}
