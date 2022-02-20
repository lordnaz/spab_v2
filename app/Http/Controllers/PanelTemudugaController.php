<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\PanelInterview;

class PanelTemudugaController extends Controller
{
    //
    public function temuduga_setting(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Panel Temuduga"]
        ];

        $request = Request::create('/api/getAllPanel', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        return view('components.panel-temuduga', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function details_temuduga($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Panel Temuduga"], ['name' => "ButiranTemuduga"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getPanelDetailsbyId', [
            'code' => $code,
        ]);

        $datas = $request['data'];

        return view('components.temuduga-details', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function page_new_temuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/paneltemuduga", 'name' => "Panel Temuduga"], ['name' => "Temuduga Baru"]
        ];

        $datas = 'test';

        return view('components.temuduga-add-new', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function add_new_temuduga(Request $req){

        // $data = $req->input();

        $param = [

            'no_ic' => $req->no_ic,
            'panel_name'=> $req->panel_name,
            'panel_position' => $req->panel_position,
           'panel_faculty' => $req->panel_faculty,
            'address_1' => $req->address_1,
            'tel_house' => $req->tel_house,
            'tel_phone' => $req->tel_phone,
            'panel_email' => $req->panel_email,
            'description' => $req->description,
            'panel_status' =>$req->status,
            
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/paneltemuduga", 'name' => "Panel Temuduga"], ['name' => "Butiran Temuduga"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/addNewPanel', $param);

        return redirect()->route('paneltemuduga');

    }

    public function delete_temuduga($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/deletePanelById', [
            'code' => $code,
        ]);

       

        return redirect()->route('paneltemuduga');

    }

    public function update_temuduga(Request $req){

        $param = [

            'panel_id' => $req->panel_id,
            'no_ic' => $req->no_ic,
            'panel_name'=> $req->panel_name,
            'panel_position' => $req->panel_position,
           'panel_faculty' => $req->panel_faculty,
            'address_1' => $req->address_1,
            'tel_house' => $req->tel_house,
            'tel_phone' => $req->tel_phone,
            'panel_email' => $req->panel_email,
            'description' => $req->description,
            'panel_status' =>$req->status,
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/updatePanelById', $param);

       

        return redirect()->route('paneltemuduga');

    }
}
