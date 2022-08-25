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

        // $request = Request::create('/api/getAllPanel', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        $displayPanel = PanelInterview::where('status', true)->get();

        return view('components.panel-temuduga', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayPanel);

    }

    public function details_temuduga($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Panel Temuduga"], ['name' => "ButiranTemuduga"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/getPanelDetailsbyId', [
        //     'code' => $code,
        // ]);

        // $datas = $request['data'];

        $displayPanelbyId = PanelInterview::where('no_ic',$code)->first();

        return view('components.temuduga-details', ['breadcrumbs' => $breadcrumbs])->with('datas', $displayPanelbyId);

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

        // $param = [

        //     'no_ic' => $req->no_ic,
        //     'panel_name'=> $req->panel_name,
        //     'panel_position' => $req->panel_position,
        //    'panel_faculty' => $req->panel_faculty,
        //     'address_1' => $req->address_1,
        //     'tel_house' => $req->tel_house,
        //     'tel_phone' => $req->tel_phone,
        //     'panel_email' => $req->panel_email,
        //     'description' => $req->description,
        //     'panel_status' =>$req->status,
            
        // ];

        $currentdt = date('Y-m-d H:i:s');
        $user_id = auth()->User()->name;

        $addpanel = new PanelInterview;
        $addpanel->no_ic = $req->no_ic;
        $addpanel->panel_name = $req->panel_name;
        $addpanel->panel_position = $req->panel_position;
        $addpanel->panel_faculty = $req->panel_faculty;
        $addpanel->address_1 = $req->address_1;
        $addpanel->address_2 = $req->address_2;
        $addpanel->address_3 = $req->address_3;
        $addpanel->tel_house = $req->tel_house;
        $addpanel->tel_phone = $req->tel_phone;
        $addpanel->panel_email = $req->panel_email;
        $addpanel->description = $req->description;
        $addpanel->panel_status = $req->panel_status;
        $addpanel->status = true;
        $addpanel->created_by = $user_id;
        $addpanel->save();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/paneltemuduga", 'name' => "Panel Temuduga"], ['name' => "Butiran Temuduga"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/addNewPanel', $param);

        

        return redirect()->route('paneltemuduga');

    }

    public function delete_temuduga($code){

        $code = decrypt($code);
        
        $user_name = auth()->User()->name;
        $deletePanel = PanelInterview::where('panel_id', $code)->update([
            'status' => false    
    
            ]);


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/deletePanelById', [
        //     'code' => $code,
        // ]);

       

        return redirect()->route('paneltemuduga');

    }

    public function update_temuduga(Request $req){

        // $param = [

        //     'panel_id' => $req->panel_id,
        //     'no_ic' => $req->no_ic,
        //     'panel_name'=> $req->panel_name,
        //     'panel_position' => $req->panel_position,
        //    'panel_faculty' => $req->panel_faculty,
        //     'address_1' => $req->address_1,
        //     'tel_house' => $req->tel_house,
        //     'tel_phone' => $req->tel_phone,
        //     'panel_email' => $req->panel_email,
        //     'description' => $req->description,
        //     'panel_status' =>$req->status,
            
        // ];

        $currentdt = date('Y-m-d H:i:s');
        $updatePanelById = PanelInterview::where('panel_id',$req->panel_id)->update
        ([
                'no_ic' => $req->no_ic,
                'panel_name' => $req->panel_name,
                'panel_position' => $req->panel_position,
                'panel_faculty' => $req->panel_faculty,
                'address_1' => $req->address_1,
                'address_2' => $req->address_2,
                'address_3' => $req->address_3,
                'tel_house' => $req->tel_house,
                'tel_phone' => $req->tel_phone,
                'panel_email' => $req->panel_email,
                'description' => $req->description,
                'panel_status' => $req->panel_status,
        ]);

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/updatePanelById', $param);

       

        return redirect()->route('paneltemuduga');

    }
}
