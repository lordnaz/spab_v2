<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningIV;
use App\Models\UserDetail;

class InterviewScreeningController extends Controller
{


    public function getAllScreeningIVapplicant(){

       
        $displayBelumProses = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Belum proses')
        ->get();

        $displayTemuduga = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Temuduga')
        ->get();

        $displayTolak = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Tolak')
        ->get();
       


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak, 
            
        ];

        return response()->json($data);

    }

    public function AjaxView(Request $req){

       if ($req->type == "Semua")
       {
        $displayBelumProses = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Belum proses')
        ->get();

        $displayTemuduga = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Temuduga')
        ->get();

        $displayTolak = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Tolak')
        ->get();
       }
       else{

        $displayBelumProses = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Belum proses')
        ->where('user_details.state', $req->type)
        ->get();

        $displayTemuduga = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Temuduga')
        ->where('user_details.state', $req->type)
        ->get();

        $displayTolak = UserDetail::join('applicant_experiences','applicant_experiences.nric','=','user_details.nric')      
        ->join('program_applied','program_applied.nric','=','user_details.nric')
        ->join('screening_interview','screening_interview.nric','=','user_details.nric')
        ->join('interview_center','interview_center.center_id','=','screening_interview.center_id')
        ->join('program', 'program.program_id', '=', 'program_applied.program_id')
        ->join('all_status_permohonan','all_status_permohonan.nric','=','user_details.nric')
        ->where('all_status_permohonan.status_temuduga', 'Tolak')
        ->where('user_details.state', $req->type)
        ->get();

       }


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak, 
            
        ];

        return response()->json($data);

    }



    public function updateScreeningIVapplicantById(Request $req){

        $currentdt = date('Y-m-d H:i:s');
        $user_name = auth()->User()->name;
        $existsScreeningIV = ScreeningIV::where('nric', $req->nric)->exists();

        if(!$existsScreeningIV){
   
            $addScreeningIV = new ScreeningIV;
            $addScreeningIV->nric = $req->nric;
            $addScreeningIV->screening_ic_status = $req->screening_ic_status;
            $addScreeningIV->created_by = $user_name;
            $addScreeningIV->updated_by = $user_name;
            $addScreeningIV->save();
     
    }else{


    $updateScreeningIV = ScreeningIV::where('nric', $req->nric)->update
    ([
            'screening_ic_status' => $req->screening_ic_status,
            'updated_by' => $user_name,
            'updated_at' =>  $currentdt,
    ]);}

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }





}
