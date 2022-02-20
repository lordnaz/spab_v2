<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanelInterview;

class PanelInterviewController extends Controller
{


    public function getAllPanel(){

       

        $displayPanel = PanelInterview::where('status', true)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayPanel
            
        ];

        return response()->json($data);

    }


    public function getPanelDetailsbyId (Request $req){


        $displayPanelbyId = PanelInterview::where('no_ic',$req->code)->first();
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'panel_id' => $displayPanelbyId->panel_id,
                'no_ic' => $displayPanelbyId->no_ic,
                'panel_name' => $displayPanelbyId->panel_name,
                'panel_position' => $displayPanelbyId->panel_position,
                'panel_faculty' => $displayPanelbyId->panel_faculty,
                'address_1' => $displayPanelbyId->address_1,
                'address_2' => $displayPanelbyId->address_2,
                'address_3' => $displayPanelbyId->address_3,
                'tel_house' => $displayPanelbyId->tel_house,
                'tel_phone' => $displayPanelbyId->tel_phone,
                'panel_email' => $displayPanelbyId->panel_email,
                'description' => $displayPanelbyId->description,
                'status' => $displayPanelbyId->panel_status,
                'created_by' => $displayPanelbyId->created_by,
                'created_date' => $displayPanelbyId->created_at,
                'modify_date' => $displayPanelbyId->updated_at
            ]
        ];


        return response()->json($data);
    }

    public function updatePanelById(Request $req){

        $currentdt = date('Y-m-d H:i:s');
        $updatePanelById = PanelInterview::where('panel_id',$req->panel_id)->update
        ([
                'no_ic' => $req->no_ic,
                'panel_name' => $req->panel_name,
                'panel_position' => $req->panel_position,
                'panel_faculty' => $req->panel_faculty,
                'address_1' => $req->address_1,
                'address_2' => $req->address_2,
                'address_3' => $req->address_3,
                'tel_house' => $req->tel_house,
                'tel_phone' => $req->tel_phone,
                'panel_email' => $req->panel_email,
                'description' => $req->description,
                'panel_status' => $req->status,
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }



    public function deletePanelById(Request $req){

        $user_name = auth()->User()->name;
        $deletePanel = PanelInterview::where('panel_id', $req->code)->update([
            'status' => false    
    
            ]);
    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by'.$user_name.'.'
        ];

        return response()->json($data);

    }

    public function addNewPanel(Request $req){
        $currentdt = date('Y-m-d H:i:s');
        $user_id = auth()->User()->name;

        $addpanel = new PanelInterview;
        $addpanel->no_ic = $req->no_ic;
        $addpanel->panel_name = $req->panel_name;
        $addpanel->panel_position = $req->panel_position;
        $addpanel->panel_faculty = $req->panel_faculty;
        $addpanel->address_1 = $req->address_1;
        $addpanel->address_2 = $req->address_2;
        $addpanel->address_3 = $req->address_3;
        $addpanel->tel_house = $req->tel_house;
        $addpanel->tel_phone = $req->tel_phone;
        $addpanel->panel_email = $req->panel_email;
        $addpanel->description = $req->description;
        $addpanel->panel_status = $req->panel_status;
        $addpanel->status = true;
        $addpanel->created_by = $user_id;
        $addpanel->save();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }


}
