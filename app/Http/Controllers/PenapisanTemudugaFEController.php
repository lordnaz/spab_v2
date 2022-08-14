<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\ScreeningIV;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\StatusPermohonan;

class PenapisanTemudugaFEController extends Controller
{
    //

    public function PenapisanTemuduga(){

      

        $request = Request::create('/api/getAllScreeningIVapplicant', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $displayBelumProses = $responseBody['displayBelumProses'];
        $displayTemuduga = $responseBody['displayTemuduga'];
        $displayTolak = $responseBody['displayTolak'];
        $tolak = $responseBody['tolak'];


        return view('components.penapisan-temuduga-table')->with('displayBelumProses', $displayBelumProses)->with('displayTemuduga', $displayTemuduga)
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

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Temuduga Dibatalkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        


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
        

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Temuduga Ditolak';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

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
           
       

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/temudugaPenapisan', [
            'code' => $code,
        ]);

        $detailTemuduga= $request['detailTemuduga'];
        $detailCenter= $request['detailCenter'];

        return view('components.penapisan-temuduga-details')->with('detailTemuduga', $detailTemuduga)->with('detailCenter', $detailCenter);
       }

    }

    public function KemaskiniTemuduga(Request $req){

        
        //update details
       
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Ditemuduga';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $param = [
            
            'center_id' => $req->center_id,
            'screening_id' => $req->screening_id,
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
        $display = Session::get('display');
        $usersession = auth()->user()->id;
       

        $param = [
            
            'proses' => $req->proses,
            'display' => $display,
            'id' => $usersession,
        
            
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
