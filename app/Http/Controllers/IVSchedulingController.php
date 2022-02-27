<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppplicantIVSession;
use App\Models\UserDetail;
use App\Models\SessionInterview;

class IVSchedulingController extends Controller
{

//to filter by center iv
    public function getAllPlaceIVapplicant(){


        $displayAllPlaceIVapplicant = AppplicantIVSession::distinct()->get('iv_place_selected');

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayAllPlaceIVapplicant
            
        ];

        return response()->json($data);

    }

//display the applicant that choose by the same place iv

    public function getAllApplicantDetailbyPlaceIV (Request $req){



        $displayAllApplicantDetailbyPlaceIV = UserDetail::where('user_details.nric','desc')->join('applicant_iv_session','user_details.nric','=','applicant_iv_session.nric')
        ->where('applicant_iv_session.nric.iv_place_selected',$req->iv_place_selected)
        ->get();
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'nric' => $displayAllApplicantDetailbyPlaceIV->nric,
                'name' => $displayAllApplicantDetailbyPlaceIV->name,
                'number_session' => $displayAllApplicantDetailbyPlaceIV->number_session,
                'date_session' => $displayAllApplicantDetailbyPlaceIV->date_session,
                'time_session' => $displayAllApplicantDetailbyPlaceIV->time_session
   
                
            ]
        ];


        return response()->json($data);
    }

//display detail session for each center
    public function getIVSessionbyCenter (Request $req){

        $displayIVSessionbyCenter = SessionInterview::where('status_center',$req->status_center)->get();

        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'number_session' => $displayIVSessionbyCenter->number_session,
                'date_session' => $displayIVSessionbyCenter->date_session,
                'time_session' => $displayIVSessionbyCenter->time_session
   
                
            ]
        ];


        return response()->json($data);
    }




//update session assign for the applicant

    public function updatePlaceIVapplicantById(Request $req){
        $user_name = auth()->User()->name;
        $currentdt = date('Y-m-d H:i:s');
        $updatePlaceIVapplicantById = AppplicantIVSession::where('nric',$req->nric)->update
        ([

            'number_session' => $updateCenterInterviewybId->number_session,
            'date_session' => $updateCenterInterviewybId->date_session,
            'time_session' => $updateCenterInterviewybId->time_session,
            'description_admin' => $updateCenterInterviewybId->description_admin,
            'updated_by' => $user_name,
            'updated_at' => $currentdt
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }



}
