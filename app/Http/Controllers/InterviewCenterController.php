<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CenterInterview;

class InterviewCenterController extends Controller
{


    public function getAllCenterInterview(){

       

        $displayCenterInterview = CenterInterview::where('status_center','!=', "HAPUS")->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayCenterInterview
            
        ];

        return response()->json($data);

    }


    public function getAllCenterInterviewybId (Request $req){


        $displayCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->first();
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'center_id' => $displayCenterInterviewybId->center_id,
                'code_center' => $displayCenterInterviewybId->code_center,
                'name_center' => $displayCenterInterviewybId->name_center,
                'address_center_1' => $displayCenterInterviewybId->address_center_1,
                'address_center_2' => $displayCenterInterviewybId->address_center_2,
                'address_center_3' => $displayCenterInterviewybId->address_center_3,
                'tel_no_center' => $displayCenterInterviewybId->tel_no_center,
                'fax_no_center' => $displayCenterInterviewybId->fax_no_center,
                'officer_center' => $displayCenterInterviewybId->officer_center,
                'position_officer_center' => $displayCenterInterviewybId->position_officer_center,
                'description_center' => $displayCenterInterviewybId->description_center,
                'status_center' => $displayCenterInterviewybId->status_center,
                'created_by' => $displayCenterInterviewybId->created_by,
                'updated_by' => $displayCenterInterviewybId->updated_by,
                'created_at' => $displayCenterInterviewybId->created_at,
                'updated_at' => $displayCenterInterviewybId->updated_at
            ]
        ];


        return response()->json($data);
    }


    public function updateCenterInterviewybId(Request $req){
        $user_name = auth()->User()->name;
        $currentdt = date('Y-m-d H:i:s');
        $updateCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->update
        ([

            'code_center' => $updateCenterInterviewybId->code_center,
            'name_center' => $updateCenterInterviewybId->name_center,
            'address_center_1' => $updateCenterInterviewybId->address_center_1,
            'address_center_2' => $updateCenterInterviewybId->address_center_2,
            'address_center_3' => $updateCenterInterviewybId->address_center_3,
            'tel_no_center' => $updateCenterInterviewybId->tel_no_center,
            'fax_no_center' => $updateCenterInterviewybId->fax_no_center,
            'officer_center' => $updateCenterInterviewybId->officer_center,
            'position_officer_center' => $updateCenterInterviewybId->position_officer_center,
            'description_center' => $updateCenterInterviewybId->description_center,
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



    public function deleteCenterInterviewybId(Request $req){

        
        $user_name = auth()->User()->name;
        $deleteCenterInterviewybId = CenterInterview::where('center_id', $req->center_id)->update([
            'status_center' => "HAPUS"    
    
            ]);
    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by'.$user_name.'.'
        ];

        return response()->json($data);

    }

    public function addCenterInterview(Request $req){
        $currentdt = date('Y-m-d H:i:s');
        $user_name = auth()->User()->name;

        $addNewCenter = new CenterInterview;
        $addNewCenter->code_center = $req->code_center;
        $addNewCenter->name_center = $req->name_center;
        $addNewCenter->address_center_1 = $req->address_center_1;
        $addNewCenter->address_center_2 = $req->address_center_2;
        $addNewCenter->address_center_3 = $req->address_center_3;
        $addNewCenter->tel_no_center = $req->tel_no_center;
        $addNewCenter->fax_no_center = $req->fax_no_center;
        $addNewCenter->officer_center = $req->officer_center;
        $addNewCenter->position_officer_center = $req->position_officer_center;
        $addNewCenter->description_center = $req->description_center;
        $addNewCenter->status_center = "TIDAK AKTIF";
        $addNewCenter->created_by = $user_name;
        $addNewCenter->updated_by = $user_name;
        $addNewCenter->created_at = $currentdt;
        $addNewCenter->updated_at = $currentdt;
        $addNewCenter->save();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }


}
