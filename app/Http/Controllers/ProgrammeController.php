<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;


class ProgrammeController extends Controller
{
    //
    public function program_setting(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Tetapan Program"]
        ];

        $request = Request::create('/api/display_allprogram', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function offered_program(){
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['name' => "Program Ditawar"]
        ];

        $request = Request::create('/api/display_allprogram', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.program-offer', ['breadcrumbs' => $breadcrumbs], compact('datas'));
    }

    public function add_new(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Program Baru"]
        ];

        $datas = 'test';

        return view('components.program-add-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_program(Request $req){

        // $data = $req->input();

        $param = [
            'code' => $req->code,
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
        ])->post(getenv('ENDPOINT').'/api/add_program', $param);

        return redirect()->route('program');

    }

    public function details_program($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/display_program', [
            'code' => $code,
        ]);

        $datas = $request['data'];

        return view('components.program-details', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

}
