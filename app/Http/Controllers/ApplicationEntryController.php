<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\UserDetailSub;

class ApplicationEntryController extends Controller
{


    public function getAllUserApplicant(){

       

        $displayUser = UserDetail::orderBy('id', 'desc')->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'user_id' => $displayUser->user_id,
                'nric' => $displayUser->nric,
                'name' => $displayUser->name,
                'short_name' => $displayUser->short_name,
                'date_of_birth' => $displayUser->date_of_birth,
                'place_of_birth' => $displayUser->place_of_birth,
                'race' => $displayUser->race,
                'address_1' => $displayUser->address_1,
                'address_2' => $displayUser->address_2,
                'address_3' => $displayUser->address_3,
                'state' => $displayUser->state,
                'birth_cert_no' => $displayUser->birth_cert_no,
                'nationality' => $displayUser->nationality,
                'tel_house' => $displayUser->tel_house,
                'phone_no' => $displayUser->phone_no,
                'dun' => $displayUser->dun,
                'parliament' => $displayUser->parliament,
                'payment_ref_no' => $displayUser->payment_ref_no,
                'form_description' => $displayUser->form_description,
                'form_completion' => $displayUser->form_completion,
                'description' => $displayUser->description,
                'status_admission' => $displayUser->status_admission,
                'type_program_applied' => $displayUser->type_program_applied,
                'date_application' => $displayUser->date_application,
                'date_acceptance' => $displayUser->date_acceptance,
                'created_by' => $displayUser->created_by,
                'modified_by' => $displayUser->modified_by,
                'created_date' => $displayUser->created_at,
                'modify_date' => $displayUser->updated_at
            ]
        ];

        return response()->json($data);

    }


    public function getAllUserApplicantById ($id){



        $displayUserbyId = UserDetail::orderBy('id', 'desc')->where('nric',$id)->get();
        $displayUserSubbyId = UserDetailSub::orderBy('id', 'desc')->where('nric',$id)->get();
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'user_id' => $displayUserbyId->user_id,
                'nric' => $displayUserbyId->nric,
                'name' => $displayUserbyId->name,
                'short_name' => $displayUserbyId->short_name,
                'date_of_birth' => $displayUserbyId->date_of_birth,
                'place_of_birth' => $displayUserbyId->place_of_birth,
                'race' => $displayUserbyId->race,
                'address_1' => $displayUserbyId->address_1,
                'address_2' => $displayUserbyId->address_2,
                'address_3' => $displayUserbyId->address_3,
                'state' => $displayUserbyId->state,
                'birth_cert_no' => $displayUserbyId->birth_cert_no,
                'nationality' => $displayUserbyId->nationality,
                'tel_house' => $displayUserbyId->tel_house,
                'phone_no' => $displayUserbyId->phone_no,
                'dun' => $displayUserbyId->dun,
                'parliament' => $displayUserbyId->parliament,
                'payment_ref_no' => $displayUserbyId->payment_ref_no,
                'form_description' => $displayUserbyId->form_description,
                'form_completion' => $displayUserbyId->form_completion,
                'description' => $displayUserbyId->description,
                'status_admission' => $displayUserbyId->status_admission,
                'type_program_applied' => $displayUserbyId->type_program_applied,
                'date_application' => $displayUserbyId->date_application,
                'date_acceptance' => $displayUserbyId->date_acceptance,
                'status_marriage' => $displayUserSubbyId->status_marriage,
                'partner_name' => $displayUserSubbyId->partner_name,
                'partner_address_1' => $displayUserSubbyId->partner_address_1,
                'partner_address_2' => $displayUserSubbyId->partner_address_2,
                'partner_address_3' => $displayUserSubbyId->partner_address_3,
                'partner_no_tel' => $displayUserSubbyId->partner_no_tel,
                'partner_no_phonehouse' => $displayUserSubbyId->partner_no_phonehouse,
                'guardian_name' => $displayUserSubbyId->guardian_name,
                'guardian_nric_old' => $displayUserSubbyId->guardian_nric_old,
                'guardian_nric_new' => $displayUserSubbyId->guardian_nric_new,
                'guardian_no_tel' => $displayUserSubbyId->guardian_no_tel,
                'guardian_no_phonehouse' => $displayUserSubbyId->guardian_no_phonehouse,
                'guardian_address_1' => $displayUserSubbyId->guardian_address_1,
                'guardian_address_2' => $displayUserSubbyId->guardian_address_2,
                'guardian_address_3' => $displayUserSubbyId->guardian_address_3,
                'guardian_email' => $displayUserSubbyId->guardian_email,
                'guardian_income' => $displayUserSubbyId->guardian_income,
                'relationship' => $displayUserSubbyId->relationship,
                'guardian_occupation' => $displayUserSubbyId->guardian_occupation,
                'number_of_dependents' => $displayUserSubbyId->number_of_dependents,
                'relationship_guardian' => $displayUserSubbyId->relationship_guardian,
                'kin_name' => $displayUserSubbyId->kin_name,
                'kin_relationship' => $displayUserSubbyId->kin_relationship,
                'kin_no_tel' => $displayUserSubbyId->kin_no_tel,
                'kin_no_phonehouse' => $displayUserSubbyId->kin_no_phonehouse,
                'kin_email' => $displayUserSubbyId->kin_email,
                'guardian_nric_new' => $displayUserSubbyId->guardian_nric_new,
                'kin_address_1' => $displayUserSubbyId->kin_address_1,
                'kin_address_2' => $displayUserSubbyId->kin_address_2,
                'kin_address_3' => $displayUserSubbyId->kin_address_3,

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
