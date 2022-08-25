<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\SessionInterview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\StatusPermohonan;
use App\Models\AppplicantIVSession;
use App\Models\UserDetail;
use App\Models\ScreeningIV;
use App\Models\AsasInterview;
use App\Models\ProgramApplied;

class PenjadualanTemudugaFEController extends Controller
{
    //
    public function penjadualan_temuduga(){

      

        // $request = Request::create('/api/getAllPlaceIVapplicant', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $DataCenter = $responseBody['DataCenter'];
        // $FirstCenter = $responseBody['FirstCenter'];
        // $Sesi = $responseBody['Sesi'];
        // $FirstSesi = $responseBody['FirstSesi'];
        // $displayTable = $responseBody['displayTable'];
        // $program = $responseBody['program'];

        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->first();
        $Sesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->leftjoin('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')          
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

            $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();

        return view('components.penjadualan-temuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable)->with('program', $program);

    }

    public function PenjadualanTemuduga($code){

       
        // $param = [
            
        //     'type' => $code,
        
            
        // ];



        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/AjaxCenter', $param);

        // $DataCenter = $request['DataCenter'];
        // $FirstCenter = $request['FirstCenter'];
        // $Sesi = $request['Sesi'];
        // $FirstSesi = $request['FirstSesi'];
        // $displayTable = $request['displayTable'];
        // $program = $request['program'];

        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->where('asas_id', $code)->first();
        $Sesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('asas_id', $FirstCenter->asas_id)->where('status', true)->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->leftjoin('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')          
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();
            $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();

        return view('components.PenjadualanTemuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi)->with('displayTable', $displayTable)->with('program', $program);

    }

    public function AjaxSesi(Request $req){

        
        
        //update details
        // $param = [
            
        //     'type' => $req->type,
        
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/AjaxSesi', $param);

        // $Sesi = $request['Sesi'];
        // $FirstSesi = $request['FirstSesi'];

        $FindAsas = SessionInterview::where('session_id', $req->type)->first();
        $Sesi = SessionInterview::where('asas_id', $FindAsas->asas_id)->where('status', true)->orderBy('number_session', 'asc')->get();
        $FirstSesi = SessionInterview::where('session_id', $req->type)->where('status', true)->orderBy('number_session', 'asc')->first();

        return view('components.penjadualan-sesi-ajax')->with('Sesi', $Sesi)->with('FirstSesi', $FirstSesi);
    }

    public function JadualSesi(Request $req){
  

        $id = SessionInterview::where('session_id', $req->session_id)->first();

        $TarikhHadir = Carbon::parse($req->TarikhHadir)->format('Y-m-d');
        $MasaFrom = Carbon::parse($req->MasaFrom)->format('Y-m-d H:i:s');
        $MasaTo = Carbon::parse($req->MasaTo)->format('Y-m-d H:i:s');
  
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');

        foreach($req->checkbox as $check){
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $check)->first();

        $audit = new Audit;
        $audit->nric = $check;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Jadual Temuduga Ditetapkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        }

      
           foreach($req->checkbox as $checkboxx){
          
           $update = ScreeningIV::where('nric', $checkboxx)->update([
               
                   'session_id' => $req->session_id,
                   'TarikhHadir' => $TarikhHadir,
                   'MasaFrom' => $MasaFrom,
                   'MasaTo' => $MasaTo,
                   'catatan_temuduga' => $req->catatan_temuduga,
                   
   
               ]);
   
           }
       
       
        // $param = [
            
        //     'session_id' => $req->session_id,
        //     'TarikhHadir' => $TarikhHadir,
        //     'MasaFrom' => $MasaFrom,
        //     'MasaTo' => $MasaTo,
        //     'catatan_temuduga' => $req->catatan_temuduga,
        //     'checkbox' => $req->checkbox,
                       
        // ];
      

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/UpdateJadualSesi', $param);



        return redirect()->route('PenjadualanTemuduga', $id->asas_id);

    }

    public function KosongkanSesi(Request $req){
   
        
        $id = SessionInterview::where('session_id', $req->session_id)->first();

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');

        foreach($req->checkbox as $check){
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $check)->first();

        $audit = new Audit;
        $audit->nric = $check;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Jadual Temuduga Dikosongkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
        }

        
           foreach($req->checkbox as $checkboxx){
          
           $update = ScreeningIV::where('nric', $checkboxx)->update([
               
                   'session_id' => NULL,
                   'TarikhHadir' => NULL,
                   'MasaFrom' => NULL,
                   'MasaTo' => NULL,
                   'catatan_temuduga' => NULL,
                   
   
               ]);
            }
      

        // $param = [
            
        //     'session_id' => $req->session_id,
        //     'checkbox' => $req->checkbox,
                            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/KosongkanSesi', $param);



        return redirect()->route('PenjadualanTemuduga', $id->asas_id);

    }
}
