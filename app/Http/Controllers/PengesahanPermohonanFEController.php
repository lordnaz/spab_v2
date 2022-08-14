<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;
use App\Models\program;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\ProgramApplied;


class PengesahanPermohonanFEController extends Controller
{
    
    public function display_pengesahan_permohonan(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"],['name' => "Pengesahan Permohonan"]
        ];

        $request = Request::create('/api/display_permohonan', 'GET');
        $response = Route::dispatch($request);

        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody = json_decode($response->getContent(), true);

        $datas = $responseBody['data'];

        $request2 = Request::create('/api/display_allprogram', 'GET');
        $response2 = Route::dispatch($request2);

        $request2->headers->set('Content-Type', 'application/json');
        $request2->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        $responseBody2 = json_decode($response2->getContent(), true);

        $datas2 = $responseBody2['data'];
        $sah = $responseBody['sah'];
        $tolak= $responseBody['tolak'];


        return view('components.pengesahan-permohonan-all')->with('datas', $datas)->with('datas2',$datas2)->with('sah',$sah)->with('tolak',$tolak);
        // return view('components.pengesahan-permohonan-detail', ['breadcrumbs' => $breadcrumbs], compact('datas'));
        

    }




    public function sahkan_permohonan(Request $req){

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Permohonan Disahkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $param = [

            'payment_ref_no' => $req->payment_ref_no,
            'nric' => $req->nric,
            'name' => $req->name,
            'email' => $req->email,
            'job_id' => $req->job_id,
            
           
            
        ];

//        return $param;
// die();  

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/sahkan', $param);

       

        return redirect()->route('display_pengesahan_permohonan');

    }

    public function tolak_permohonan(Request $req){

         $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Permohonan Ditolak';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $param = [

            'payment_ref_no' => $req->payment_ref_no,
            'nric' => $req->nric,
            'name' => $req->name,
            'email' => $req->email,
            'description_validation' => $req->description_validation,
            'job_id' => $req->job_id,
            
           
            
        ];

//        return $param;
// die();  

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/tolak_pengesahan_pemohon', $param);

       

        return redirect()->route('display_pengesahan_permohonan');

    }

    public function batal_permohonan($code){

        $code = decrypt($code);
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Permohonan Dibatalkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();


        $display = Session::get('display');
        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/batal_pengesahan_pemohon', [
            'code' => $code,
        ]);

        

        return redirect()->route('display_pengesahan_permohonan');

    }

    public function sahkan_permohonan_id($code){

        $code = decrypt($code);
        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"],['name' => "Pengesahan Permohonan"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getSahkanbyID', [
            'code' => $code,
        ]);
     
        $datas = $request['data'];
        $dataa = $request['dataa'];
      
     
        return view('components.pengesahan-permohonan-details', ['breadcrumbs' => $breadcrumbs], compact('datas', 'dataa'));

    }

    public function tolak_permohonan_id($code){

        $code = decrypt($code);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"],['name' => "Pengesahan Permohonan"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/getSahkanbyID', [
            'code' => $code,
        ]);
     
        $datas = $request['data'];
        $datass = $request['dataa'];
        return view('components.pengesahan-permohonan-details_tolak', ['breadcrumbs' => $breadcrumbs])->with('datas', $datas)->with('datass', $datass);
        // return view('components.pengesahan-permohonan-details_tolak', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }

    public function filterByProgram($code){

        $code = decrypt($code);

       

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"],['name' => "Pengesahan Permohonan"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/AjaxView2', [
            'code' => $code,
        ]);
     
        $datas = $request['displaybyProgram'];
        $datas2 = $request['displayAllProgram'];
  
        return view('components.pengesahan-ajaxPermohonan', ['breadcrumbs' => $breadcrumbs])->with('datas', $datas)->with('datas2',$datas2);
      

    }

    public function draft_permohonan($code){

        $code = decrypt($code);

     
        $currentdt = date('Y-m-d H:i:s');
       
        $sahkan = StatusPermohonan::where('nric', $code)->update([
            'updated_date_validation' => $currentdt,
            'status_validation' => 'DRAFT' ,
            'status_global' => 'DRAFT' ,
            'all_status' => 'DRAFT',
            'balasan_calon' => NULL
    
            ]);

            return redirect()->route('display_pengesahan_permohonan');
        // return view('components.pengesahan-permohonan-details_tolak', ['breadcrumbs' => $breadcrumbs], compact('datas'));

    }


 




}
