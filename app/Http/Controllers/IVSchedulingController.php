<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppplicantIVSession;
use App\Models\UserDetail;
use App\Models\SessionInterview;
use App\Models\ScreeningIV;
use App\Models\AsasInterview;

class IVSchedulingController extends Controller
{

//to filter by center iv
    public function getAllPlaceIVapplicant(){


        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->first();
        $Sesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'DataCenter' => $DataCenter,
            'FirstCenter' => $FirstCenter,
            'Sesi' => $Sesi,
            'FirstSesi' => $FirstSesi,
            'displayTable' => $displayTable,
            
        ];

        return response()->json($data);

    }

    public function AjaxCenter(Request $req){


        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->where('asas_id', $req->type)->first();
        $Sesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'DataCenter' => $DataCenter,
            'FirstCenter' => $FirstCenter,
            'Sesi' => $Sesi,
            'FirstSesi' => $FirstSesi,
            'displayTable' => $displayTable,
            
        ];

        return response()->json($data);

    }

    public function AjaxSesi(Request $req){


       $FindAsas = SessionInterview::where('session_id', $req->type)->first();
        $Sesi = SessionInterview::where('asas_id', $FindAsas->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('session_id', $req->type)->where('status', true)->orderBy('number_session', 'asc')->first();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'Sesi' => $Sesi,
            'FirstSesi' => $FirstSesi,
            
        ];

        return response()->json($data);

    }

    public function UpdateJadualSesi(Request $req)
    {

        if(!empty($req->checkbox)){
         if(is_array($req->checkbox)){ 
        foreach($req->checkbox as $req->checkboxx){
       
        $update = ScreeningIV::where('nric', $req->checkboxx)->update([
            
                'session_id' => $req->session_id,
                'TarikhHadir' => $req->TarikhHadir,
                'MasaFrom' => $req->MasaFrom,
                'MasaTo' => $req->MasaTo,
                'catatan_temuduga' => $req->catatan_temuduga,
                

            ]);

        }
    }
        else{

            $update = ScreeningIV::where('nric', $req->checkboxx)->update([
                
                'session_id' => $req->session_id,
                'TarikhHadir' => $req->TarikhHadir,
                'MasaFrom' => $req->MasaFrom,
                'MasaTo' => $req->MasaTo,
                'catatan_temuduga' => $req->catatan_temuduga,
                
    
            ]);
        }
    $status="Berjaya";
    
    }
    else{

        $status = "Tidak Berjaya";
    }

        
       

        $data = [
            'status' => $status,
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }

    public function KosongkanSesi(Request $req)
    {

        if(!empty($req->checkbox)){
         if(is_array($req->checkbox)){ 
        foreach($req->checkbox as $req->checkboxx){
       
        $update = ScreeningIV::where('nric', $req->checkboxx)->update([
            
                'session_id' => NULL,
                'TarikhHadir' => NULL,
                'MasaFrom' => NULL,
                'MasaTo' => NULL,
                'catatan_temuduga' => NULL,
                

            ]);

        }
    }
        else{

            $update = ScreeningIV::where('nric', $req->checkboxx)->update([
                
                'session_id' => NULL,
                'TarikhHadir' => NULL,
                'MasaFrom' => NULL,
                'MasaTo' => NULL,
                'catatan_temuduga' => NULL,
                
    
            ]);
        }
    $status="Berjaya";
    
    }
    else{

        $status = "Tidak Berjaya";
    }

        
       

        $data = [
            'status' => $status,
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }


}
