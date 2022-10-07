<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;
use App\Models\UserDetailSub;
use App\Models\ApplicantExperiences;
use App\Models\ArtInvolve;
use App\Models\ClubActivities;
use App\Models\CourseTaken;
use App\Models\MuetResult;
use App\Models\ProgramApplied;
use App\Models\Qualification;
use App\Models\SponsorDetails;
use App\Models\StatusPermohonan;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\Offerprogram;
use App\Models\program;
use App\Models\AsasInterview;
use App\Models\PendaftaranPelajar;
use Illuminate\Support\Carbon;
use App\Exceptions\TemplateProcessing as TemplateProcessing;

class PenawaranPermohonanFEController extends Controller
{
    //
    public function PenawaranPermohonan(){

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Penawaran Permohonan"]
        ];
        
        //ditawar
        $ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->get();
        $cadang1ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->get();
        $cadang2ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->get();
        $programditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->get();

        $ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->get();
        $cadang1ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->get();
        $cadang2ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->get();
        $programditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->get();

        $kiv = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->get();
        $cadang1kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->get();
        $cadang2kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->get();
        $programkiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->get();

        $hadir = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->get();
        $cadang1hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->get();
        $cadang2hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->get();
        $programhadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->get();




        $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();

        // $request = Request::create('/api/display_penawaran', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $ditawar = $responseBody['ditawar'];
        // $cadang1ditawar = $responseBody['cadang1ditawar'];
        // $cadang2ditawar = $responseBody['cadang2ditawar'];
        // $programditawar = $responseBody['programditawar'];
        // $ditolak = $responseBody['ditolak'];
        // $cadang1ditolak = $responseBody['cadang1ditolak'];
        // $cadang2ditolak = $responseBody['cadang2ditolak'];
        // $programditolak = $responseBody['programditolak'];
        // $kiv = $responseBody['kiv'];
        // $cadang1kiv = $responseBody['cadang1kiv'];
        // $cadang2kiv = $responseBody['cadang2kiv'];
        // $programkiv = $responseBody['programkiv'];
        // $hadir = $responseBody['hadir'];
        // $cadang1hadir = $responseBody['cadang1hadir'];
        // $cadang2hadir = $responseBody['cadang2hadir'];
        // $programhadir = $responseBody['programhadir'];
        // $program = $responseBody['program'];
        


        return view('components.penawaran-permohonan' , ['breadcrumbs' => $breadcrumbs])
        ->with('ditawar', $ditawar)->with('cadang1ditawar', $cadang1ditawar)->with('cadang2ditawar', $cadang2ditawar)->with('programditawar', $programditawar)
        ->with('ditolak', $ditolak)->with('cadang1ditolak', $cadang1ditolak)->with('cadang2ditolak', $cadang2ditolak)->with('programditolak', $programditolak)
        ->with('kiv', $kiv)->with('cadang1kiv', $cadang1kiv)->with('cadang2kiv', $cadang2kiv)->with('programkiv', $programkiv)
        ->with('hadir', $hadir)->with('cadang1hadir', $cadang1hadir)->with('cadang2hadir', $cadang2hadir)->with('programhadir', $programhadir)->with('program', $program);

    }

    public function AjaxPenawaranPermohonan($code){

        $breadcrumbs = [
            ['link' => "home", 'name' => "Halaman Utama"], ['link' => "javascript:void(0)", 'name' => "Kemasukan"], ['name' => "Penawaran Permohonan"]
        ];


         //ditawar
         $ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $code)->get();
         $cadang1ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $code)->get();
         $cadang2ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $code)->get();
         $programditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $code)->get();
 
         $ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $code)->get();
         $cadang1ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $code)->get();
         $cadang2ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $code)->get();
         $programditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $code)->get();
 
         $kiv = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $code)->get();
         $cadang1kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $code)->get();
         $cadang2kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $code)->get();
         $programkiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $code)->get();
 
         $hadir = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $code)->get();
         $cadang1hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $code)->get();
         $cadang2hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $code)->get();
         $programhadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
         ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
         ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
         ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
         ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
         ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
         ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $code)->get();
 
 
         $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();
        // //update details

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_penawaran_ajax', [
        //     'type' => $code,
        // ]);

        // $ditawar = $request['ditawar'];
        // $cadang1ditawar = $request['cadang1ditawar'];
        // $cadang2ditawar = $request['cadang2ditawar'];
        // $programditawar = $request['programditawar'];
        // $ditolak = $request['ditolak'];
        // $cadang1ditolak = $request['cadang1ditolak'];
        // $cadang2ditolak = $request['cadang2ditolak'];
        // $programditolak = $request['programditolak'];
        // $kiv = $request['kiv'];
        // $cadang1kiv = $request['cadang1kiv'];
        // $cadang2kiv = $request['cadang2kiv'];
        // $programkiv = $request['programkiv'];
        // $hadir = $request['hadir'];
        // $cadang1hadir = $request['cadang1hadir'];
        // $cadang2hadir = $request['cadang2hadir'];
        // $programhadir = $request['programhadir'];
        // $program = $request['program'];
        


        return view('components.penawaran-permohonan-ajax' , ['breadcrumbs' => $breadcrumbs])
        ->with('ditawar', $ditawar)->with('cadang1ditawar', $cadang1ditawar)->with('cadang2ditawar', $cadang2ditawar)->with('programditawar', $programditawar)
        ->with('ditolak', $ditolak)->with('cadang1ditolak', $cadang1ditolak)->with('cadang2ditolak', $cadang2ditolak)->with('programditolak', $programditolak)
        ->with('kiv', $kiv)->with('cadang1kiv', $cadang1kiv)->with('cadang2kiv', $cadang2kiv)->with('programkiv', $programkiv)
        ->with('hadir', $hadir)->with('cadang1hadir', $cadang1hadir)->with('cadang2hadir', $cadang2hadir)->with('programhadir', $programhadir)->with('code', $code)->with('program', $program);

    }

    public function KIV_penawaran($code){

        $code = decrypt($code);
        
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Dalam Pemerhatian (KIV)';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $currentdt = date('Y-m-d H:i:s');
        $logic = PenawaranPermohonan::where('nric',$code)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }

        $update = StatusPermohonan::where('nric',$code)->update
        ([
            'status_offer' => 'Dalam Pemerhatian (KIV)',  
            'status_global' => 'DALAM PEMERHATIAN (KIV)' ,  
            'status_temuduga' => 'Kiv',    
        ]);

        $update = PenawaranPermohonan::where('nric',$code)->update
        ([
            'program_tawar' => NULL,       
            'TarikhTawar' => NULL,  
            'tarikh_daftar' => NULL, 
            'masa_daftar' => NULL,   
            'TarikhKIV' => $currentdt,  
            'TarikhTolak' => NULL, 
            'tempat_daftar' => NULL,   
            'catatan' => NULL,  
            'sem' => NULL,   
            'tahun' => NULL,     
        ]);


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/KIV_penawaran', [
        //     'nric' => $code,
        // ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function tolak_penawaran($code){

        $code = decrypt($code);
        

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Penawaran Ditolak';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $currentdt = date('Y-m-d H:i:s');
        $logic = PenawaranPermohonan::where('nric',$code)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }

        $update = StatusPermohonan::where('nric',$code)->update
        ([
            'status_offer' => 'Ditolak',
            'status_global' => 'PENAWARAN DITOLAK',   
            'status_temuduga' => 'Ditolak',     
        ]);

        $update = PenawaranPermohonan::where('nric',$code)->update
        ([
            'program_tawar' => NULL,       
            'TarikhTawar' => NULL,  
            'tarikh_daftar' => NULL, 
            'masa_daftar' => NULL,   
            'tempat_daftar' => NULL,  
            'TarikhTolak' => $currentdt,   
            'TarikhKIV' => NULL, 
            'catatan' => NULL,   
            'sem' => NULL,   
            'tahun' => NULL, 
           
        ]);

        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/tolak_penawaran', [
        //     'nric' => $code,
        // ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function hadir_penawaran($code){

        $code = decrypt($code);
        
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $code)->first();

        $audit = new Audit;
        $audit->nric = $code;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Penawaran Dibatalkan';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $logic = PenawaranPermohonan::where('nric', $code)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }


        $update = StatusPermohonan::where('nric', $code)->update
        ([
            'status_offer' => 'Hadir Temuduga',    
            'status_global' => 'HADIR TEMUDUGA' , 
            'status_temuduga' => 'Hadir',   
        ]);

        $update = PenawaranPermohonan::where('nric', $code)->update
        ([
            'program_tawar' => NULL,       
            'TarikhTawar' => NULL,  
            'TarikhKIV' => NULL,
            'tarikh_daftar' => NULL, 
            'masa_daftar' => NULL,   
            'tempat_daftar' => NULL,   
            'catatan' => NULL,  
            'sem' => NULL,   
            'tahun' => NULL,     
        ]);


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/hadir_penawaran', [
        //     'nric' => $code,
        // ]);

       

        return redirect()->route('PenawaranPermohonan');

    }

    public function display_penawarabynric($code){

        $code = decrypt($code);
        
        $displaypenawaran = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric', $code)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
       



        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/display_penawarabynric', [
        //     'nric' => $code,
        // ]);

        // $program = $request['program'];
        // $displaypenawaran = $request['displaypenawaran'];

       

        return view('components.penawaran-permohonan-tawaran')
        ->with('displaypenawaran', $displaypenawaran)->with('program', $program);

    }

    public function AjaxTawaran(Request $req){

       
        $displaypenawaran = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
        $offer = Offerprogram::where('program_id', $req->program)->first();
        // //update details
        // $param = [
            
        //     'program' => $req->program,
        //     'nric' => $req->nric,
        
            
        // ];



        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/AjaxTawaran', $param);

        // $program = $request['program'];
        // $displaypenawaran = $request['displaypenawaran'];
        // $offer = $request['offer'];


        return view('components.penawaran-permohonan-tawar-ajax')
        ->with('displaypenawaran', $displaypenawaran)->with('program', $program)->with('offer', $offer)->with('id', $req->program);
    }

    public function tawar_penawaran(Request $req){

        $display = Session::get('display');
        $usersession = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $req->nric)->first();

        $audit = new Audit;
        $audit->nric = $req->nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Penawaran Ditawar';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $currentdt = date('Y-m-d H:i:s');

        $logic = PenawaranPermohonan::where('nric',$req->nric)->first();

        if($logic->program_tawar != NULL){

            if($logic->program_tawar != $req->program_tawar){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

            $program2 = Offerprogram::where('program_id', $req->program_tawar)->first();

            $quotasemasa2 = $program2->quota_semasa + 1;

            $updatequota = Offerprogram::where('program_id', $req->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa2,        
            ]);
        }

        }else{

            $program = Offerprogram::where('program_id', $req->program_tawar)->first();

            $quotasemasa = $program->quota_semasa + 1;

            $updatequota = Offerprogram::where('program_id', $req->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }
        
        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Ditawarkan', 
            'status_global' => 'PENAWARAN DITAWAR' ,   
            'status_temuduga' => 'Ditawarkan',    
        ]);


        $update = PenawaranPermohonan::where('nric', $req->nric)->update
        ([
                'program_tawar' => $req->program_tawar,
                'TarikhTawar' => $currentdt,
                'sem' => $req->sem,
                'tahun' => $req->tahun,
                'tarikh_daftar' => $req->tarikh_daftar,
                'masa_daftar' => $req->masa_daftar,
                'tempat_daftar' => $req->tempat_daftar,
                'catatan' => $req->catatan,
                'TarikhTolak' =>NULL,   
                'TarikhKIV' => NULL, 
            ]);

            $User = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                    ->join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                    ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')                   
                    ->where('all_status_permohonan.nric', $req->nric)
                    ->get();

            $type = 'surat_permohonan';  
            $nric = $User->nric;
            $address1 = $User->address_1;
            $date_created = date('Y-m-d H:i:s');
            $pengajian = $User->pengajian;
            $program = $User->program;
            $fullname = $User->name;
    
            $create_surat_permohonan = $this->TemplateProcessing($type, $nric, $address1, $date_created, $pengajian, $program, $fullname);
        



        //update details
        // $param = [
        //     'nric' => $req->nric,
        //     'program_tawar' => $req->program_tawar,
        //     'sem' => $req->sem,
        //     'tahun' => $req->tahun,
        //     'tarikh_daftar' => $req->tarikh_daftar,
        //     'masa_daftar' => $req->masa_daftar,
        //     'tempat_daftar' => $req->tempat_daftar,
        //     'catatan' => $req->catatan,
                  
        // ];
        


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/tawar_penawaran', $param);

       

        return redirect()->route('PenawaranPermohonan');
    }

    public function pemprosesanTawaran(Request $req){

        
        //update details
        $display = Session::get('display');
        $usersession = auth()->user()->id;
        // $param = [
            
        //     'proses' => $req->proses,
        //     'display' => $display,
        //     'id' => $usersession,
        
            
        // ];


        // $request = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        // ])->post(getenv('ENDPOINT').'/api/pemprosesanTawaran', $param);

        $currentdt = date('Y-m-d H:i:s');

        $carbon =new Carbon($currentdt);
        if ($req->proses == 'Semua') {

            $opencenter = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();

            $User = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Belum proses')
                ->get();

            foreach ($User as $Users) {

                foreach ($opencenter as $open) {

                    if (is_array($open->negeri)) {
                        foreach ($open as $negeri) {

                            if ($negeri->negeri == $Users->state) {

                                $status = 'Ada';
                            } else {

                                $status = 'Tiada';
                                break;
                            }
                        }
                    } else {

                        if ($open->negeri == $Users->state) {

                            $status = 'Ada';
                        } else {

                            $status = 'Tiada';
                            break;
                        }
                    }
                }
            }
        } else {

            $status = 'Ada';
        }

        if ($status == 'Ada') {

            if ($req->proses == 'Semua') {

                $ProsesUser = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                    ->join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                    ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')                   
                    ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')
                    ->get();
            }

            else{

                $ProsesUser = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                    ->join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                    ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')                 
                    ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')
                    ->where('user_details.state', $req->proses)
                    ->get();

            }

            foreach($ProsesUser as $User){
               
                
                $nosiri = StatusPermohonan::where('job_id', $display)->where('nric', $User->nric)->first();

                $audit = new Audit;
                $audit->nric = $User->nric;
                $audit->no_siri = $nosiri->no_siri;
                $audit->penerangan = 'Penawaran Diproses';
                $audit->tarikh_audit = $currentdt;
                $audit->created_by = $usersession;
                $audit->save();

                $total = 0;
                $total2 = 0;
                if($User->cadang1 == NULL && $User->cadang2 == NULL){

                    $update = StatusPermohonan::where('nric',$User->nric)->update
                    ([
                        'status_offer' => 'Ditolak',  
                        'status_temuduga' => 'Ditolak',    
                        'status_global' => 'PENAWARAN DITOLAK',   
                    ]);

                }
                else{

                    if($User->cadang1 != NULL){

                  
                        $program = Offerprogram::where('program_id', $User->cadang1)->first();
                        $proses =  UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
                        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')
                        ->where('penawaran_permohonan.cadang1', $User->cadang1)
                        ->orWhere('penawaran_permohonan.cadang2', $User->cadang1)
                        ->orderBy('penawaran_permohonan.markah', 'desc')->get();

                        foreach ($proses as $pro){

                            if($pro->nric != $User->nric){

                                $total = $total + 1;
                                 
                                
                            }
            

                        }

                        $totalquota1 = $program->quota_semasa + $total;

                        if ($totalquota1 < $program->quota){

                            $quotasemasa = $program->quota_semasa + 1;

                            $update = PenawaranPermohonan::where('nric',$User->nric)->update
                            ([
                                'program_tawar' => $program->program_id,       
                                'TarikhTawar' => $currentdt,  
                                'TarikhKIV' => $currentdt, 
                                'TarikhTolak' => $currentdt,   
                                'tarikh_daftar' => $program->registration_date, 
                                'masa_daftar' => $program->registration_time,   
                                'tempat_daftar' => $program->registration_venue,
                                'sem' => 1,    
                                'tahun' => $carbon->year, 
                          
            
                            ]);

                            $updatequota = Offerprogram::where('program_id', $User->cadang1)->update
                            ([
                                'quota_semasa' => $quotasemasa,        
                            ]);
                            

                            $updatestatus = StatusPermohonan::where('nric',$User->nric)->update
                            ([
                                'status_offer' => 'Ditawarkan',    
                                'status_temuduga' => 'Ditawarkan', 
                                'status_global' => 'PENAWARAN DITAWAR',    
                            ]);
                            
                        }
                        else{

                            $updatestatus = StatusPermohonan::where('nric',$User->nric)->update
                            ([
                                'status_offer' => 'Dalam Pemerhatian (KIV)', 
                                'status_temuduga' => 'KIV',  
                                'status_global' => 'DALAM PEMERHATIAN (KIV)' ,      
                            ]);
                        }

                    }else{

                        $updatestatus = StatusPermohonan::where('nric',$User->nric)->update
                            ([
                                'status_offer' => 'Dalam Pemerhatian (KIV)',   
                                'status_temuduga' => 'KIV',  
                                'status_global' => 'DALAM PEMERHATIAN (KIV)' ,     
                            ]);
                    }

                    if($User->program_tawar = NULL){
                    if($User->cadang2 != NULL){

                        $program2 = Offerprogram::where('program_id', $User->cadang2)->first();
                        $proses2 =  UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
                        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')
                        ->where('penawaran_permohonan.cadang1', $User->cadang2)
                        ->orWhere('penawaran_permohonan.cadang2', $User->cadang2)
                        ->orderBy('penawaran_permohonan.markah', 'desc')->get();

                        foreach ($proses2 as $pro2){

                            if($pro2->nric == $User->nric){

                                $total2 = $total2 + 1;
                                
                            }
                            

                        }

                        $totalquota2 = $program2->quota_semasa + $total2;

                        if ($totalquota2 < $program2->quota){

                            $quotasemasa2 = $program2->quota_semasa + 1;
                            $update = PenawaranPermohonan::where('nric',$User->nric)->update
                            ([
                                'program_tawar' => $program2->program_id,       
                                'TarikhTawar' => $currentdt,  
                                'TarikhKIV' => $currentdt, 
                                'TarikhTolak' => $currentdt,  
                                'tarikh_daftar' => $program2->registration_date, 
                                'masa_daftar' => $program2->registration_time,   
                                'tempat_daftar' => $program2->registration_venue,   
                                'sem' => 1,    
                                'tahun' => $carbon->year,
            
                            ]);

                            $updatequota = Offerprogram::where('program_id', $User->cadang2)->update
                            ([
                                'quota_semasa' => $quotasemasa2,        
                            ]);

                            $updatestatus = StatusPermohonan::where('nric',$User->nric)->update
                            ([
                                'status_offer' => 'Ditawarkan',      
                                'status_temuduga' => 'tawar',  
                                'status_global' => 'PENAWARAN DITAWAR' ,  
                            ]);
                        }
                        else{

                            $updatestatus = StatusPermohonan::where('nric',$User->nric)->update
                            ([
                                'status_offer' => 'Dalam Pemerhatian (KIV)',   
                                'status_temuduga' => 'KIV',     
                                'status_global' => 'DALAM PEMERHATIAN (KIV)' ,  
                            ]);
                        }

                    }else{
                        
                    }
                   
                }else{

                }

                }

               
            
                $type = 'surat_permohonan';  
                $nric = $User->nric;
                $address1 = $User->address_1;
                $date_created = date('Y-m-d H:i:s');
                $pengajian = $User->pengajian;
                $program = $User->program;
                $fullname = $User->name;
        
                $create_surat_permohonan = $this->TemplateProcessing($type, $nric, $address1, $date_created, $pengajian, $program, $fullname);
            }
            
        }
      
    

        if($req->proses = "Semua"){

            return redirect()->route('PenawaranPermohonan');
        }

        else{

            return redirect()->route('AjaxPenawaranPermohonan', $req->proses);
        
        }

    }


    function TemplateProcessing($type, $nric, $address1, $date_created, $pengajian, $program, $fullname)
    {

        switch ($type) {
            case 'surat_permohonan':

                $templatePath = TemplateProcessing::TemplateProcessingLetter($type);
                
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);

                $templateProcessor->setValue('nric', $nric);
                $templateProcessor->setValue('address', $address1);
                $templateProcessor->setValue('date_created', $date_created);
                $templateProcessor->setValue('pengajian', $pengajian);
                $templateProcessor->setValue('program', $program);
                $templateProcessor->setValue('full_name', $fullname);

                $timestamp = date('YmdHis');

                $filename = 'template_created/Surat_Permohonan_'.$timestamp.'.docx';


                        
                
                $exists = PendaftaranPelajar::where('nric', $nric)
                ->update([
    
                    'surat_tawaran' => $filename,
                    
        
                ]);

                // code to insert filename for application reference

                // end of

                $pathToSave = storage_path($filename);

                try {
                    $templateProcessor->saveAs($pathToSave); 
                } catch (Exception $e) {
                }

                return response()->download(storage_path($filename)); 

                break;
            
            default:
                # code...
                break;
        }

    }
}
