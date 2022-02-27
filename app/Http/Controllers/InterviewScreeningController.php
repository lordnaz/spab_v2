<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningIV;
use App\Models\UserDetail;

class InterviewScreeningController extends Controller
{


    public function getAllScreeningIVapplicant(){

       
        $displayScreeningIV = UserDetail::orderBy('user_details.id', 'desc')->join('applicant_experiences','user_details.nric','=','applicant_experiences.nric')
        ->join('program_applied','applicant_experiences.nric','=','program_applied.nric')
        ->join('all_status_permohonan','program_applied.nric','=','all_status_permohonan.nric')
        ->where('all_status_permohonan.status_validation','SAH')
        ->get();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayScreeningIV
            
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
