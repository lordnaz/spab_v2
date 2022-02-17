<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanelInterview;

class PanelInterviewController extends Controller
{


    public function getAllPanel(){

       

        $displayPanel = PanelInterview::orderBy('id_panel', 'desc')->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'no_ic' => $displayPanel->no_ic,
                'panel_name' => $displayPanel->panel_name,
                'panel_position' => $displayPanel->panel_position,
                'panel_faculty' => $displayPanel->panel_faculty,
                'address_1' => $displayPanel->address_1,
                'address_2' => $displayPanel->address_2,
                'address_3' => $displayPanel->address_3,
                'tel_house' => $displayPanel->tel_house,
                'tel_phone' => $displayPanel->tel_phone,
                'panel_email' => $displayPanel->panel_email,
                'description' => $displayPanel->description,
                'status' => $displayPanel->status,
                'created_by' => $displayPanel->created_by,
                'created_date' => $displayPanel->created_at,
                'modify_date' => $displayPanel->updated_at
            ]
        ];

        return response()->json($data);

    }


    public function getPanelDetailsbyId ($id){


        $displayPanelbyId = PanelInterview::orderBy('id_panel', 'desc')->where('id_panel',$id)->get();
        
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
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
                'status' => $displayPanelbyId->status,
                'created_by' => $displayPanelbyId->created_by,
                'created_date' => $displayPanelbyId->created_at,
                'modify_date' => $displayPanelbyId->updated_at
            ]
        ];


        return response()->json($data);
    }

    public function updatePanelById(Request $req){

        $currentdt = date('Y-m-d H:i:s');
        $updatePanelById = PanelInterview::where('id_panel',$req->id_panel)->update
        ([
                'no_ic' => $updatePanelById->no_ic,
                'panel_name' => $updatePanelById->panel_name,
                'panel_position' => $updatePanelById->panel_position,
                'panel_faculty' => $updatePanelById->panel_faculty,
                'address_1' => $updatePanelById->address_1,
                'address_2' => $updatePanelById->address_2,
                'address_3' => $updatePanelById->address_3,
                'tel_house' => $updatePanelById->tel_house,
                'tel_phone' => $updatePanelById->tel_phone,
                'panel_email' => $updatePanelById->panel_email,
                'description' => $updatePanelById->description,
                'status' => $updatePanelById->status,
                'modify_date' => $currentdt,
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }



    public function deletePanelById($id){

        $user_name = auth()->User()->name;
        $deletePanel = PanelInterview::where('id_panel', $id)->update([
            'status' => 'false',     
    
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
        $addpanel->status = 'true';
        $addpanel->created_by = $user_id;
        $addpanel->created_date = $currentdt;
        $addpanel->modify_date = $currentdt;
        $addpanel->save();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }


}
