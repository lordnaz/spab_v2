<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CenterInterview;
use App\Models\SessionInterview;
use App\Models\PanelSessionInterview;

class OpenCenterInterviewController extends Controller
{

//to display list of open center
    public function getAllOpenCenterInterview(){

       

        $displayOpenCenterInterview = CenterInterview::where('status_center', 'AKTIF')->get();
        

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayOpenCenterInterview
            
        ];

        return response()->json($data);

    }


    public function getAllOpenCenterInterviewybId (Request $req){


        // $displayOpenCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->first();
        
        $displayOpenCenterInterviewybId = CenterInterview::orderBy('interview_center.center_id', 'desc')->join('session_interview','interview_center.center_id','=','session_interview.center_id')
        ->join('panel_session_iv','session_interview.session_id','=','panel_session_iv.session_id')
        ->where('interview_center.center_id',$center_id)
        ->where('interview_center.status_center','AKTIF')
        ->get();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' =>[
                'center_id' => $displayOpenCenterInterviewybId->center_id,
                'code_center' => $displayOpenCenterInterviewybId->code_center,
                'name_center' => $displayOpenCenterInterviewybId->name_center,
                'address_center_1' => $displayOpenCenterInterviewybId->address_center_1,
                'address_center_2' => $displayOpenCenterInterviewybId->address_center_2,
                'address_center_3' => $displayOpenCenterInterviewybId->address_center_3,
                'tel_no_center' => $displayOpenCenterInterviewybId->tel_no_center,
                'fax_no_center' => $displayOpenCenterInterviewybId->fax_no_center,
                'officer_center' => $displayOpenCenterInterviewybId->officer_center,
                'position_officer_center' => $displayOpenCenterInterviewybId->position_officer_center,
                'description_center' => $displayOpenCenterInterviewybId->description_center,
                'status_center' => $displayOpenCenterInterviewybId->status_center,
                'created_by' => $displayOpenCenterInterviewybId->created_by,
                'updated_by' => $displayOpenCenterInterviewybId->updated_by,
                'created_at' => $displayOpenCenterInterviewybId->created_at,
                'updated_at' => $displayOpenCenterInterviewybId->updated_at,
                'panel_name' => $displayOpenCenterInterviewybId->panel_name,
                'description' => $displayOpenCenterInterviewybId->description,
                'number_session' => $displayOpenCenterInterviewybId->number_session,
                'date_session' => $displayOpenCenterInterviewybId->date_session,
                'time_session' => $displayOpenCenterInterviewybId->time_session,
                'place_description' => $displayOpenCenterInterviewybId->place_description,
            ]
        ];


        return response()->json($data);
    }

//to open the center based on list(grab from CenterInterview to display all inactive center) . display the info then they can update and open center(update status)
//status = TIDAK AKTIF/AKTIF/HAPUS

    public function updateStatusCenterInterviewybId(Request $req){
        $user_name = auth()->User()->name;
        $currentdt = date('Y-m-d H:i:s');
        $updateStatusCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->update
        ([

            'code_center' => $updateStatusCenterInterviewybId->code_center,
            'name_center' => $updateStatusCenterInterviewybId->name_center,
            'address_center_1' => $updateStatusCenterInterviewybId->address_center_1,
            'address_center_2' => $updateStatusCenterInterviewybId->address_center_2,
            'address_center_3' => $updateStatusCenterInterviewybId->address_center_3,
            'tel_no_center' => $updateStatusCenterInterviewybId->tel_no_center,
            'fax_no_center' => $updateStatusCenterInterviewybId->fax_no_center,
            'officer_center' => $updateStatusCenterInterviewybId->officer_center,
            'position_officer_center' => $updateStatusCenterInterviewybId->position_officer_center,
            'description_center' => $updateStatusCenterInterviewybId->description_center,
            'status_center' => $updateStatusCenterInterviewybId->status_center,
            'updated_by' => $user_name,
            'updated_at' => $currentdt
        ]);

         $updateSessionInterviewybId = SessionInterview::where('center_id',$req->center_id)->update
        ([

            'date_session' => $updateSessionInterviewybId->date_session,
            'time_session' => $updateSessionInterviewybId->time_session,
            'place_description' => $updateSessionInterviewybId->place_description,
            'updated_by' => $user_name,
            'updated_at' => $currentdt
        ]);


        $deletePanel = PanelSessionInterview::where('session_id',$req->session_id);
        $deletePanel->delete();
 
        foreach ($req->input('panel_name') as $key => $value) {

        

            $addNewPanelInterview = new PanelSessionInterview;
            $addNewPanelInterview->number_session = $session_id;
            $addNewPanelInterview->panel_name = $req->get('panel_name')[$key];
            $addNewPanelInterview->description = $req->description;
            $addNewPanelInterview->created_by = $user_name;
            $addNewPanelInterview->updated_by = $user_name;
            $addNewPanelInterview->created_at = $currentdt;
            $addNewPanelInterview->updated_at = $currentdt;
            $addNewPanelInterview->save();

        }

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);

    }

//status in database should be TIDAK AKTIF if they want to HAPUS . 

    public function deleteOpenCenterInterviewbyId(Request $req){

        
        $user_name = auth()->User()->name;
        $deleteOpenCenterInterviewbyId = CenterInterview::where('center_id', $req->center_id)->update([
            'status_center' => "TIDAK AKTIF"    
    
            ]);
    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by'.$user_name.'.'
        ];

        return response()->json($data);

    }





//in order to add interview session , the center need to open first . in here admin can add panel , session and time/date . panel and session can be more than 1
    
    public function addSessionInterviewbyId(Request $req){
        $currentdt = date('Y-m-d H:i:s');
        $user_name = auth()->User()->name;
        $center_id = $req->center_id;


        $addNewSessionInterview = new SessionInterview;
        $addNewSessionInterview->center_id = $req->center_id;
        $addNewSessionInterview->number_session = $req->number_session;
        $addNewSessionInterview->date_session = $req->date_session;
        $addNewSessionInterview->time_session = $req->time_session;
        $addNewSessionInterview->place_description = $req->place_description;
        $addNewSessionInterview->created_by = $user_name;
        $addNewSessionInterview->updated_by = $user_name;
        $addNewSessionInterview->created_at = $currentdt;
        $addNewSessionInterview->updated_at = $currentdt;
        $addNewSessionInterview->save();

        $session_id = $addNewSessionInterview->session_id;

        foreach ($req->input('panel_name') as $key => $value) {

        

            $addNewPanelInterview = new PanelSessionInterview;
            $addNewPanelInterview->number_session = $session_id;
            $addNewPanelInterview->panel_name = $req->get('panel_name')[$key];
            $addNewPanelInterview->description = $req->description;
            $addNewPanelInterview->created_by = $user_name;
            $addNewPanelInterview->updated_by = $user_name;
            $addNewPanelInterview->created_at = $currentdt;
            $addNewPanelInterview->updated_at = $currentdt;
            $addNewPanelInterview->save();

        }


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);


    }

    public function deleteSessionInterviewbyId(Request $req){

        
        $user_name = auth()->User()->name;
        $deleteSessionInterviewbyId = SessionInterview::where('number_session', $req->number_session)->update([
            'status_center' => false   
    
        ]);
    

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by'.$user_name.'.'
        ];

        return response()->json($data);

    }

    

    


}
