<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\StatusPermohonan;
use App\Models\UserDetail;
use App\Models\UserDetailSub;
use App\Models\ApplicantExperiences;
use App\Models\ArtInvolve;
use App\Models\ClubActivities;
use App\Models\CourseTaken;
use App\Models\MuetResult;
use App\Models\ProgramApplied;
use App\Models\Qualification;
use App\Models\SponsorDetails;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\program;

class FE_BalasanCalonController extends Controller
{
    //
    public function balasancalon(){


        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        
        ->where(function($q){

            

            $q->where('all_status_permohonan.status_offer', "TAWAR") 
            ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
            ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN");
            })
            ->where('user_details.status','!=', "2")
            ->get();


      
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where(function($q2){
        $q2->where('all_status_permohonan.status_offer', "Ditawarkan");
        })
        ->where('user_details.status','!=', "2")
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where(function($q3){
        $q3->where('all_status_permohonan.status_offer', "TERIMA TAWARAN");
        })
        ->where('user_details.status','!=', "2")
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where(function($q4){
        $q4->where('all_status_permohonan.status_offer', "TOLAK TAWARAN");
        })
        ->where('user_details.status','!=', "2")
        ->get();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Balasan Calon"]
        ];

        // $request = Request::create('/api/display_balasan', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $display = $responseBody['display'];
        // $displayTawar = $responseBody['displayTawar'];
        // $displayTerima = $responseBody['displayTerima'];
        // $displayTolak = $responseBody['displayTolak'];
      
        return view('components.balasan-calon-new', ['breadcrumbs' => $breadcrumbs])->with('display', $display)->with('displayTawar', $displayTawar)->with('displayTerima', $displayTerima)->with('displayTolak', $displayTolak);
       

    }

    public function details_balasancalon($code){
        $code = decrypt($code);

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->get();
        $displaybyNRIC = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
    
            ->where('user_details.nric',$code)
            ->first();
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->where('user_details.nric',$code)
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->where('user_details.nric',$code)
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->where('user_details.nric',$code)
        ->get();
        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
        //     'code' => $code,
        // ]);
     
        // $display = $request['display'];
        // $displayTawar = $request['displayTawar'];
     
        // $displayTerima = $request['displayTerima'];
        // $displayTolak = $request['displayTolak'];
      
        return view('components.balasan-ajaxPermohonan', ['breadcrumbs' => $breadcrumbs])->with('display', $display)->with('displayTawar', $displayTawar)->with('displayTerima', $displayTerima)->with('displayTolak', $displayTolak);
  

    }

    public function details_balasancalonbynricTerima($code){
        $code = decrypt($code);

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->get();
        $displaybyNRIC = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
    
            ->where('user_details.nric',$code)
            ->first();
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->where('user_details.nric',$code)
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->where('user_details.nric',$code)
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->where('user_details.nric',$code)
        ->get();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
        //     'code' => $code,
        // ]);
     
        // $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-terima', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }
    public function details_balasancalonbynricTolak($code){
        $code = decrypt($code);

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->get();
        $displaybyNRIC = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
    
            ->where('user_details.nric',$code)
            ->first();
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->where('user_details.nric',$code)
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->where('user_details.nric',$code)
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->where('user_details.nric',$code)
        ->get();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
        //     'code' => $code,
        // ]);
     
        // $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-tolak', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }
    public function details_balasancalonbynricBatal($code){
        $code = decrypt($code);

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->get();
        $displaybyNRIC = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
    
            ->where('user_details.nric',$code)
            ->first();
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->where('user_details.nric',$code)
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->where('user_details.nric',$code)
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->where('user_details.nric',$code)
        ->get();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['link' => "/balasancalon", 'name' => "Balasan Calon"], ['name' => "Butiran Balasan Calon"]
        ];

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_balasanbynric', [
        //     'code' => $code,
        // ]);
     
        // $displaybyNRIC = $request['displaybyNRIC'];
    
        return view('components.balasan-calon-details-batal', ['breadcrumbs' => $breadcrumbs])->with('displaybyNRIC', $displaybyNRIC);
  

    }


    public function balasan_permohonan(Request $req){

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        if($req->balasan_calon == 'TERIMA TAWARAN'){
        $audit->penerangan = 'Terima Tawaran';
        }
        elseif($req->balasan_calon == 'TOLAK TAWARAN'){
            $audit->penerangan = 'Tolak Tawaran';
        }
        else{
            $audit->penerangan = 'Batal Tawaran';
        }
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        
       
        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'balasan_calon' => $req->balasan_calon,   
            'status_offer' => $req->balasan_calon,   
            'balasan_calon_description' => $req->balasan_calon_description,    
            'status_global' => 'DITERIMA' ,
            'tarikh_balasan' => $currentdt
        ]);

//         $param = [

         
//             'nric' => $req->nric,
//             'balasan_calon' => $req->balasan_calon,
//             'balasan_calon_description' => $req->balasan_calon_description,
           
            
//         ];

// //        return $param;
// // die();  

//         $request = Http::withHeaders([
//             'Content-Type' => 'application/json',
//             'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
//         ])->post(getenv('ENDPOINT').'/api/balasan_terima', $param);

       

        return redirect()->route('balasancalon');

    }
}
