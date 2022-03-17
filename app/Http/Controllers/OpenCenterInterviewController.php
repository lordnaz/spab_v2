<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CenterInterview;
use App\Models\SessionInterview;
use App\Models\PanelSessionInterview;
use App\Models\AsasInterview;
use App\Models\PanelInterview;
use App\Models\ScreeningIV;

class OpenCenterInterviewController extends Controller
{

    //to display list of open center
    public function getAllOpenCenterInterview()
    {



        $displayCenterInterview = CenterInterview::where('status', true)->get();
        $displayCenterInterviewTable = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();



        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayCenterInterview,
            'dataa' => $displayCenterInterviewTable

        ];

        return response()->json($data);
    }

    public function UpdateAsasTemuduga(Request $req)
    {

        $update = AsasInterview::where('asas_id', $req->asas_id)->update([
                'center_id' => $req->center_id,
                'negeri' => $req->negeri,
                'catatan' => $req->catatan,


            ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }

    public function deleteOpenTemuduga(Request $req)
    {
        
        $exists = SessionInterview::where('asas_id', $req->code)->where('status',true)->exists();

        if(!$exists){
        $update = AsasInterview::where('asas_id', $req->code)->update([
                'status' => false,
                


            ]);

            $status="berjaya";

        }
        else{

            $status="tidak berjaya";
        }

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => $status
        ];

        return response()->json($data);
    }

    public function deleteSesi(Request $req)
    {
        
        $exists = ScreeningIV::where('session_id', $req->code)->exists();

       if(!$exists){
        $update = SessionInterview::where('session_id', $req->code)->update([

                'status' => false,           

            ]);

            $status="berjaya";
        }
        else{
            $status="Tidak Berjaya";
        }

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => $status
        ];

        return response()->json($data);
    }

    public function PostOpenCenterInterview(Request $req)
    {

        
        $exists = AsasInterview::where('center_id', $req->center_id)->where('status',true)->exists();
    

        if(!$exists){
        $addNewPanelInterview = new AsasInterview();
        $addNewPanelInterview->center_id = $req->center_id;
        $addNewPanelInterview->negeri = $req->negeri;
        $addNewPanelInterview->catatan = $req->catatan;
        $addNewPanelInterview->status = true;
        $addNewPanelInterview->save();

        $update = CenterInterview::where('center_id', $req->center_id)->update([
            'status_center' =>'AKTIF',
           

        ]);



        $status="berjaya";
        }
        else{
            $status="tidak berjaya";
        }

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => $status
        ];

        return response()->json($data);
    }


    public function getAllOpenCenterInterviewybId(Request $req)
    {


        // $displayOpenCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->first();
        $displayCenterInterview = AsasInterview::where('asas_id', $req->code)->first();
        $displayall = CenterInterview::where('status', true)->get();
        $Displayasas = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_id', $req->code)->first();
        $DisplaySession = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $req->code)->where('status', true)->get();
        $kiraan = SessionInterview::orderBy('number_session', 'asc')->where('asas_id', $req->code)->where('status', true)->get();
        $panel = PanelInterview::where('status', true)->get();

        $data = [

            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayCenterInterview,
            'dataa' => $displayall,
            'Displaysession' => $DisplaySession,
            'panel' => $panel,
            'Displayasas' => $Displayasas,
            'kiraan' => $kiraan,

        ];



        return response()->json($data);
    }

    public function OpenSession(Request $req)
    {
        

        $addNewPanelInterview = new SessionInterview();
        $addNewPanelInterview->asas_id = $req->asas_id;
        $addNewPanelInterview->number_session = $req->number_session;
        $addNewPanelInterview->TarikhFrom = $req->TarikhFrom;
        $addNewPanelInterview->TarikhTo = $req->TarikhTo;
        $addNewPanelInterview->DateFrom = $req->DateFrom;
        $addNewPanelInterview->DateTo = $req->DateTo;
        $addNewPanelInterview->description = $req->description;
        $addNewPanelInterview->place_description = $req->place_description;
        $addNewPanelInterview->panel_id = $req->panel;
        $addNewPanelInterview->status = true;
        $addNewPanelInterview->save();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'program added successfully'
        ];

        return response()->json($data);
    }

    public function OpenSessionDetail(Request $req)
    {


        // $displayOpenCenterInterviewybId = CenterInterview::where('center_id',$req->center_id)->first();
        
        $DisplaySession = SessionInterview::where('session_id', $req->code)->first();
        $panel = PanelInterview::where('status', true)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'Displaysession' => $DisplaySession,
            'panel' => $panel,

        ];



        return response()->json($data);
    }

    public function UpdateSesi(Request $req)
    {

        $exists = ScreeningIV::where('asas_id', $req->session_id)->exists();

        if(!$exists){
        $update = SessionInterview::where('session_id', $req->session_id)->update([
            
                'TarikhFrom' => $req->TarikhFrom,
                'TarikhTo' => $req->TarikhTo,
                'DateFrom' => $req->DateFrom,
                'DateTo' => $req->DateTo,
                'description' => $req->description,
                'panel_id' => $req->panel,
                'place_description' => $req->place_description,
                

            ]);

            $status = 'Berjaya';
        }
        else{

            $status = 'Tidak Berjaya';
        }

        $data = [
            'status' => $status,
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }

    //to open the center based on list(grab from CenterInterview to display all inactive center) . display the info then they can update and open center(update status)
    //status = TIDAK AKTIF/AKTIF/HAPUS

    public function updateStatusCenterInterviewybId(Request $req)
    {
        $user_name = auth()->User()->name;
        $currentdt = date('Y-m-d H:i:s');
        $updateStatusCenterInterviewybId = CenterInterview::where('center_id', $req->center_id)->update([

                'code_center' => $req->code_center,
                'name_center' => $req->name_center,
                'address_center_1' => $req->address_center_1,
                'address_center_2' => $req->address_center_2,
                'address_center_3' => $req->address_center_3,
                'tel_no_center' => $req->tel_no_center,
                'fax_no_center' => $req->fax_no_center,
                'officer_center' => $req->officer_center,
                'position_officer_center' => $req->position_officer_center,
                'description_center' => $req->description_center,
                'status_center' => $req->status_center,
                'updated_by' => $user_name,
                'updated_at' => $currentdt
            ]);

        $updateSessionInterviewybId = SessionInterview::where('center_id', $req->center_id)->update([

                'date_session' => $req->date_session,
                'time_session' => $req->time_session,
                'place_description' => $req->place_description,
                'updated_by' => $user_name,
                'updated_at' => $currentdt
            ]);


        $deletePanel = PanelSessionInterview::where('session_id', $req->session_id);
        $deletePanel->delete();

        foreach ($req->input('panel_name') as $key => $value) {



            $addNewPanelInterview = new PanelSessionInterview;
            $addNewPanelInterview->number_session = $req->code;
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

    public function deleteOpenCenterInterviewbyId(Request $req)
    {


        $user_name = auth()->User()->name;
        $deleteOpenCenterInterviewbyId = CenterInterview::where('center_id', $req->center_id)->update([
            'status_center' => "TIDAK AKTIF"

        ]);


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by' . $user_name . '.'
        ];

        return response()->json($data);
    }





    //in order to add interview session , the center need to open first . in here admin can add panel , session and time/date . panel and session can be more than 1

    public function addSessionInterviewbyId(Request $req)
    {
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

    public function deleteSessionInterviewbyId(Request $req)
    {


        $user_name = auth()->User()->name;
        $deleteSessionInterviewbyId = SessionInterview::where('number_session', $req->number_session)->update([
            'status_center' => false

        ]);


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'disable status by' . $user_name . '.'
        ];

        return response()->json($data);
    }
}
