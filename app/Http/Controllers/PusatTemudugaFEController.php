<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class PusatTemudugaFEController extends Controller
{
    //
    public function pusattemuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Panel Temuduga"]
        ];

        $request = Request::create('/api/getAllCenterInterview', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.pusat-temuduga-table', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function page_new_pusat(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/paneltemuduga", 'name' => "Panel Temuduga"], ['name' => "Temuduga Baru"]
        ];

        $datas = 'test';

        return view('components.pusat-temuduga-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_pusat(Request $req){

        // $data = $req->input();

        $param = [

            'code_center' => $req->code_center,
            'name_center'=> $req->name_center,
            'address_center_1' => $req->address_center_1,
           'tel_no_center' => $req->tel_no_center,
            'fax_no_center' => $req->fax_no_center,
            'officer_center' => $req->officer_center,
            'position_officer_center' => $req->position_officer_center,
            'description_center' => $req->description_center,
            
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/pusattemuduga", 'name' => "Pusat Temuduga"], ['name' => "Butiran Temuduga"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/addCenterInterview', $param);

        return redirect()->route('pusattemuduga');

    }

    public function details_pusat($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/pusattemuduga", 'name' => "Pusat Temuduga"], ['name' => "Butiran Pusat Temuduga"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getAllCenterInterviewybId', [
            'code' => $code,
        ]);

        $datas = $request['data'];

        return view('components.pusat-temuduga-detail', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function update_pusat(Request $req){


    $code = decrypt($req->center_id);

        $param = [

            'code'=> $code,
            'name_center'=> $req->name_center,
            'address_center_1' => $req->address_center_1,
           'tel_no_center' => $req->tel_no_center,
            'fax_no_center' => $req->fax_no_center,
            'officer_center' => $req->officer_center,
            'position_officer_center' => $req->position_officer_center,
            'description_center' => $req->description_center,
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/updateCenterInterviewybId', $param);

       

        return redirect()->route('pusattemuduga');

    }

    public function delete_pusat($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/deleteCenterInterviewybId', [
            'code' => $code,
        ]);

       

        return redirect()->route('pusattemuduga');

    }
}
