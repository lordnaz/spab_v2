<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\SessionInterview;

class PenjadualanTemudugaFEController extends Controller
{
    //
    public function penjadualan_temuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Panel Temuduga"]
        ];

        $request = Request::create('/api/getAllPlaceIVapplicant', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $DataCenter = $responseBody['DataCenter'];
        $FirstCenter = $responseBody['FirstCenter'];
        $Sesi = $responseBody['Sesi'];
        $FirstSesi = $responseBody['FirstSesi'];
        $displayTable = $responseBody['displayTable'];

        return view('components.penjadualan-temuduga', ['breadcrumbs' => $breadcrumbs])
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable);

    }

    public function PenjadualanTemuduga($code){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Temuduga"], ['name' => "Panel Temuduga"]
        ];

        $param = [
            
            'type' => $code,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxCenter', $param);

        $DataCenter = $request['DataCenter'];
        $FirstCenter = $request['FirstCenter'];
        $Sesi = $request['Sesi'];
        $FirstSesi = $request['FirstSesi'];
        $displayTable = $request['displayTable'];

        return view('components.PenjadualanTemuduga', ['breadcrumbs' => $breadcrumbs])
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable);

    }

    public function AjaxSesi(Request $req){

        
        
        //update details
        $param = [
            
            'type' => $req->type,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxSesi', $param);

        $Sesi = $request['Sesi'];
        $FirstSesi = $request['FirstSesi'];

        return view('components.penjadualan-sesi-ajax')->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi);
    }

    public function JadualSesi(Request $req){
  

        $id = SessionInterview::where('session_id', $req->session_id)->first();

        $param = [
            
            'session_id' => $req->session_id,
            'TarikhHadir' => $req->TarikhHadir,
            'MasaFrom' => $req->MasaFrom,
            'MasaTo' => $req->MasaTo,
            'catatan_temuduga' => $req->catatan_temuduga,
            'checkbox' => $req->checkbox,
                 
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/UpdateJadualSesi', $param);



        return redirect()->route('PenjadualanTemuduga', $id->asas_id);

    }

    public function KosongkanSesi(Request $req){
   
        
        $id = SessionInterview::where('session_id', $req->session_id)->first();

        $param = [
            
            'session_id' => $req->session_id,
            'checkbox' => $req->checkbox,
                            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/KosongkanSesi', $param);



        return redirect()->route('PenjadualanTemuduga', $id->asas_id);

    }
}
