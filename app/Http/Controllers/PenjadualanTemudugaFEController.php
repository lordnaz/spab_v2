<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\SessionInterview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\StatusPermohonan;

class PenjadualanTemudugaFEController extends Controller
{
    //
    public function penjadualan_temuduga(){

      

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
        $program = $responseBody['program'];

        return view('components.penjadualan-temuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable)->with('program', $program);

    }

    public function PenjadualanTemuduga($code){

       
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
        $program = $request['program'];

        return view('components.PenjadualanTemuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable)->with('program', $program);

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

        $TarikhHadir = Carbon::parse($req->TarikhHadir)->format('Y-m-d');
        $MasaFrom = Carbon::parse($req->MasaFrom)->format('Y-m-d H:i:s');
        $MasaTo = Carbon::parse($req->MasaTo)->format('Y-m-d H:i:s');
  
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');

        foreach($req->checkbox as $check){
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $check)->first();

        $audit = new Audit;
        $audit->nric = $check;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Jadual Temuduga Ditetapkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        }

           
       
        $param = [
            
            'session_id' => $req->session_id,
            'TarikhHadir' => $TarikhHadir,
            'MasaFrom' => $MasaFrom,
            'MasaTo' => $MasaTo,
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

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');

        foreach($req->checkbox as $check){
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $check)->first();

        $audit = new Audit;
        $audit->nric = $check;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Jadual Temuduga Dikosongkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        }

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
