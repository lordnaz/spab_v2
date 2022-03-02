<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultInterview;

class ResultInterviewController extends Controller
{


    public function getAllApplicantIvResult(){

        $displayAllApplicantIvResult= UserDetail::orderBy('user_details.id', 'desc')->join('applicant_experiences','user_details.nric','=','applicant_experiences.nric')
        ->join('program_applied','applicant_experiences.nric','=','program_applied.nric')
        ->join('result_interview_applicant','program_applied.nric','=','result_interview_applicant.nric')
        ->get();

      

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayAllApplicantIvResult
            
        ];

        return response()->json($data);

    }


    public function updateApplicantIvResultById(Request $req){

        $currentdt = date('Y-m-d H:i:s');
        $user_name = auth()->User()->name;
        $existsApplicantIvResult = ResultInterview::where('nric', $req->nric)->exists();

        if(!$existsApplicantIvResult){
   
            $addApplicantIvResult = new ResultInterview;
            $addApplicantIvResult->nric = $req->nric;
            $addApplicantIvResult->marks_iv = $req->marks_iv;
            $addApplicantIvResult->status_iv = $req->status_iv;
            $addApplicantIvResult->created_by = $user_name;
            $addApplicantIvResult->updated_by = $user_name;
            $addApplicantIvResult->save();
     
    }else{


    $updateApplicantIvResult = ResultInterview::where('nric', $req->nric)->update
    ([
            'marks_iv' => $req->marks_iv,
            'status_iv' => $req->status_iv,
            'updated_by' => $user_name,
            'updated_at' =>  $currentdt,
    ]);
}

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }




}
