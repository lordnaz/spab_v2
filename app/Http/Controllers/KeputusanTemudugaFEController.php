<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\ResultInterview;
use App\Models\AppplicantIVSession;
use App\Models\UserDetail;
use App\Models\SessionInterview;
use App\Models\ScreeningIV;
use App\Models\AsasInterview;
use App\Models\PenawaranPermohonan;
use App\Models\Offerprogram;
use App\Models\StatusPermohonan;
use App\Models\ProgramApplied;

class KeputusanTemudugaFEController extends Controller
{
    //
    public function keputusan_temuduga(){

     

        // $request = Request::create('/api/DataKeputusanTemuduga', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $DataCenter = $responseBody['DataCenter'];
        // $FirstCenter = $responseBody['FirstCenter'];
        // $displayTable = $responseBody['displayTable'];
        // $cadang1 = $responseBody['cadang1'];
        // $cadang2 = $responseBody['cadang2'];
        // $program = $responseBody['program'];

        
        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')       
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')          
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->orWhere('all_status_permohonan.status_temuduga', 'Temuduga')
            ->orWhere('all_status_permohonan.status_temuduga', 'Hadir')
            ->orWhere('all_status_permohonan.status_temuduga', 'Tidak Hadir')       
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

            $cadang1 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->orWhere('all_status_permohonan.status_temuduga', 'Temuduga')
            ->orWhere('all_status_permohonan.status_temuduga', 'Hadir')
            ->orWhere('all_status_permohonan.status_temuduga', 'Tidak Hadir')  
            ->where('screening_interview.center_id', $FirstCenter->center_id)   
            ->get();

            $cadang2 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->orWhere('all_status_permohonan.status_temuduga', 'Temuduga')
            ->orWhere('all_status_permohonan.status_temuduga', 'Hadir')
            ->orWhere('all_status_permohonan.status_temuduga', 'Tidak Hadir')   
            ->where('screening_interview.center_id', $FirstCenter->center_id)  
            ->get();

            
            $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();



        return view('components.keputusan-temuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('displayTable', $displayTable)->with('cadang1', $cadang1)->with('cadang2', $cadang2)->with('program', $program);

    }

    public function KeputusanTemuduga($code){

      

        // $param = [
            
        //     'type' => $code,
        
            
        // ];
        

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/RouteCenter', $param);

        // $DataCenter = $request['DataCenter'];
        // $FirstCenter = $request['FirstCenter'];
        // $displayTable = $request['displayTable'];
        // $cadang1 = $request['cadang1'];
        // $cadang2 = $request['cadang2'];
        // $program = $request['program'];

        
        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->where('asas_id', $code)->first();
       
      
        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')       
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')          
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')   
        ->where('screening_interview.center_id', $FirstCenter->center_id)      
        ->orWhere([['all_status_permohonan.status_temuduga', 'Temuduga'],
                 ['all_status_permohonan.status_temuduga', 'Hadir'],
                 ['all_status_permohonan.status_temuduga', 'Tidak Hadir']
       ])       
        ->get();

        $cadang1 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('screening_interview.center_id', $FirstCenter->center_id) 
        ->orWhere([['all_status_permohonan.status_temuduga', 'Temuduga'],
                 ['all_status_permohonan.status_temuduga', 'Hadir'],
                 ['all_status_permohonan.status_temuduga', 'Tidak Hadir']
                ])       
        ->get();

        $cadang2 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('screening_interview.center_id', $FirstCenter->center_id) 
        ->orWhere([['all_status_permohonan.status_temuduga', 'Temuduga'],
                 ['all_status_permohonan.status_temuduga', 'Hadir'],
                 ['all_status_permohonan.status_temuduga', 'Tidak Hadir']
       ])       
        ->get();

        $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();
        
        return view('components.KeputusanTemuduga')
        ->with('FirstCenter', $FirstCenter)->with('DataCenter', $DataCenter)->with('displayTable', $displayTable)->with('cadang1', $cadang1)->with('cadang2', $cadang2)->with('program', $program);

    }

    public function hadirTemuduga($code){

        $code = decrypt($code);

        
        $dataPelajar = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->where('user_details.nric', $code)           
        ->first();

        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        // $param = [
            
        //     'type' => $code,
        
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/hadirTemuduga', $param);

        // $dataPelajar = $request['dataPelajar'];
        // $program = $request['program'];
       

        return view('components.keputusan-hadir-temuduga')
        ->with('dataPelajar', $dataPelajar)->with('program', $program);

    }

    
    public function updateHadirTemuduga(Request $req){

        // $data = $req->input();

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Hadir Temuduga';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $exist = PenawaranPermohonan::where('nric', $req->nric)->exists();

        if(!$exist){

            $masukdata = new PenawaranPermohonan;
            $masukdata->nric = $req->nric;
            $masukdata->cadang1 = $req->cadang1;
            $masukdata->cadang2 = $req->cadang2;
            $masukdata->markah = $req->markah;
            $masukdata->save();

            $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
                'status_temuduga' => 'Hadir',
                'status_offer' => 'Hadir Temuduga',
                'status_global' => 'HADIR TEMUDUGA',

            ]);
        }
        else{

            $update = PenawaranPermohonan::where('nric',$req->nric)->update
        ([

        'cadang1' => $req->cadang1,
        'cadang2' => $req->cadang2,
        'markah' => $req->markah,

        ]);

        $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
            'status_temuduga' => 'Hadir',
            'status_offer' => 'Hadir Temuduga',
            'status_global' => 'HADIR TEMUDUGA',

        ]);

        }

        // $param = [
        //     'cadang1' => $req->cadang1,
        //     'cadang2' => $req->cadang2,
        //     'markah' => $req->markah,
        //     'nric' => $req->nric,
        // ];

        

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/PostHadirTemuduga', $param);

        return redirect()->route('keputusan_temuduga');

    }

    public function TidakhadirTemuduga($code){

        $code = decrypt($code);


        
        $dataPelajar = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->where('user_details.nric', $code)           
            ->first();

            $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
       

        // $param = [
            
        //     'type' => $code,
        
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/TidakHadirTemuduga', $param);

        // $dataPelajar = $request['dataPelajar'];
        // $program = $request['program'];
       

        return view('components.keputusan-tidak-hadir-temuduga')
        ->with('dataPelajar', $dataPelajar)->with('program', $program);

    }

    public function updateTidakHadirTemuduga(Request $req){

        // $data = $req->input();

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Tidak Hadir Temuduga';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $exist = PenawaranPermohonan::where('nric', $req->nric)->exists();

        if(!$exist){

            $masukdata = new PenawaranPermohonan;
            $masukdata->nric = $req->nric;
            $masukdata->markah = $req->markah;
            $masukdata->save();

            $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
                'status_temuduga' => 'Tidak Hadir',
                'status_offer' => 'Tidak Hadir',
                'status_global' => 'TIDAK HADIR TEMUDUGA' ,

            ]);
        }
        else{

            $update = PenawaranPermohonan::where('nric',$req->nric)->update
        ([

        'markah' => $req->markah,
        'cadang1' => NULL,
        'cadang2' => NULL,

        ]);

        $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
            'status_temuduga' => 'Tidak Hadir',
            'status_offer' => 'Tidak Hadir'

        ]);

        }
        
        // $param = [
        //     'markah' => $req->markah,
        //     'nric' => $req->nric,
        // ];

       

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/PostTidakHadir', $param);

        return redirect()->route('keputusan_temuduga');

    }

    public function batalTemuduga($code){

        $code = decrypt($code);


        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Hadir Temuduga Dibatalkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();
       
        $exist = PenawaranPermohonan::where('nric', $code)->exists();

        if(!$exist){


            $updatestatus = StatusPermohonan::where('nric', $code)->update([
                'status_temuduga' => 'Temuduga',
                'status_global' => 'DITEMUDUGA' ,

            ]);
        }
        else{

            $update = PenawaranPermohonan::where('nric',$code)->update
        ([

        'markah' => NULL,
        'cadang1' => NULL,
        'cadang2' => NULL,

        ]);

        $updatestatus = StatusPermohonan::where('nric', $code)->update([
            'status_temuduga' => 'Temuduga',
            'status_offer' => NULL

        ]);

        }

        // $param = [
            
        //     'code' => $code,
        
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/batalTemuduga', $param);

        
       
       
        return redirect()->route('keputusan_temuduga');
    }
}
