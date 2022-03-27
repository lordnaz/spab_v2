<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\StatusPermohonan;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\program;

class BalasanCalonAPIController extends Controller
{
    //

    public function display_balasan()
    {


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
        $q2->where('all_status_permohonan.status_offer', "TAWAR");
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
        
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'display' => $display,
            'displayTawar' => $displayTawar,
            'displayTerima' => $displayTerima,
            'displayTolak' => $displayTolak,
            
        ];
        return response()->json($data);
    }

    public function display_balasanbynric(Request $req)
    {

        $display = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->orWhere('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->orWhere('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->get();
        $displaybyNRIC = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
    
            ->where('user_details.nric',$req->code)
            ->first();
        $displayTawar = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TAWAR")
        ->where('user_details.nric',$req->code)
        ->get();
        $displayTerima = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TERIMA TAWARAN")
        ->where('user_details.nric',$req->code)
        ->get();
        $displayTolak = UserDetail::join('all_status_permohonan', 'user_details.nric', '=', 'all_status_permohonan.nric')
        ->where('all_status_permohonan.status_offer', "TOLAK TAWARAN")
        ->where('user_details.nric',$req->code)
        ->get();
       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'display' => $display,
            'displayTawar' => $displayTawar,
            'displayTerima' => $displayTerima,
            'displayTolak' => $displayTolak,
            'displaybyNRIC'=> $displaybyNRIC
            
        ];
        return response()->json($data);
    }

    public function balasan_terima(Request $req)
    {


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'balasan_calon' => $req->balasan_calon,   
            'status_offer' => $req->balasan_calon,   
            'balasan_calon_description' => $req->balasan_calon_description,    
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }





}
