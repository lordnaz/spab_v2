<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\ScreeningIV;

class PenapisanTemudugaFEController extends Controller
{
    //

    public function PenapisanTemuduga(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Program"], ['link' => "/offered_program", 'name' => "Program Ditawar"], ['name' => "Tetapan Tawaran Program"]
        ];

        $request = Request::create('/api/getAllScreeningIVapplicant', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $displayBelumProses = $responseBody['displayBelumProses'];
        $displayTemuduga = $responseBody['displayTemuduga'];
        $displayTolak = $responseBody['displayTolak'];
        $tolak = $responseBody['tolak'];


        return view('components.penapisan-temuduga-table', ['breadcrumbs' => $breadcrumbs])->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)
        ->with('displayTolak', $displayTolak)->with('tolak', $tolak);

    }

    public function ajaxtemuduga($code){



        //update details

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxView', [
            'type' => $code,
        ]);

        $displayBelumProses = $request['displayBelumProses'];
        $displayTemuduga = $request['displayTemuduga'];
        $displayTolak = $request['displayTolak'];
        $tolak = $request['tolak'];

        
        return view('components.penapisan-ajaxTemuduga')->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)->with('displayTolak', $displayTolak)->with('code', $code)->with('tolak', $tolak);

    }

    public function batalPenapisan($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/batalPenapisan', [
            'code' => $code,
        ]);

       

        return redirect()->route('PenapisanTemuduga');

    }

    public function tolakPenapisan($code){

        $code = decrypt($code);
        


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/tolakPenapisan', [
            'code' => $code,
        ]);

       

        return redirect()->route('PenapisanTemuduga');

    }

    public function temudugaPenapisan($code){

    

        $code = decrypt($code);

        $test = ScreeningIV::where('nric', $code)->first();

        if ($test->status_sesi == 'Ada Sesi')
        {

            return redirect()->route('PenapisanTemuduga');
       
       }
       
       else{
           
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Panel Temuduga"], ['name' => "ButiranTemuduga"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/temudugaPenapisan', [
            'code' => $code,
        ]);

        $detailTemuduga= $request['detailTemuduga'];
        $detailCenter= $request['detailCenter'];

        return view('components.penapisan-temuduga-details', ['breadcrumbs' => $breadcrumbs])->with('detailTemuduga', $detailTemuduga)->with('detailCenter', $detailCenter);
       }

    }

    public function KemaskiniTemuduga(Request $req){

        $screening_id = decrypt($req->screening_id);
        //update details
        $param = [
            
            'center_id' => $req->center_id,
            'screening_id' => $screening_id,
            'nric' => $req->nric,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/KemaskiniTemuduga', $param);

        return redirect()->route('PenapisanTemuduga');

    }

    public function pemprosesanTemuduga(Request $req){

        
        //update details
        $param = [
            
            'proses' => $req->proses,
        
            
        ];


        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/pemprosesanTemuduga', $param);

        if($req->proses = "Semua"){

            return redirect()->route('PenapisanTemuduga');
        }

        else{

            return redirect()->route('ajaxtemuduga', $req->proses);

        }
    }

}
