<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
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
use App\Models\Audit;
use Illuminate\Support\Carbon;

class PenawaranPermohonanAPIController extends Controller
{
    //
    public function display_penawaran()
    {

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
       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'ditawar' => $ditawar,
            'cadang1ditawar' => $cadang1ditawar,
            'cadang2ditawar' => $cadang2ditawar,
            'programditawar' => $programditawar,
            'ditolak' => $ditolak,
            'cadang1ditolak' => $cadang1ditolak,
            'cadang2ditolak' => $cadang2ditolak,
            'programditolak' => $programditolak,
            'kiv' => $kiv,
            'cadang1kiv' => $cadang1kiv,
            'cadang2kiv' => $cadang2kiv,
            'programkiv' => $programkiv,
            'hadir' => $hadir,
            'cadang1hadir' => $cadang1hadir,
            'cadang2hadir' => $cadang2hadir,
            'programhadir' => $programhadir,
            'program' => $program,
                    
        ];

        return response()->json($data);
    }

    public function display_penawaran_ajax(Request $req)
    {

       //ditawar
        $ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $req->type)->get();
        $cadang1ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $req->type)->get();
        $cadang2ditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $req->type)->get();
        $programditawar = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditawarkan')->where('user_details.state', $req->type)->get();

        $ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $req->type)->get();
        $cadang1ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $req->type)->get();
        $cadang2ditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $req->type)->get();
        $programditolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Ditolak')->where('user_details.state', $req->type)->get();

        $kiv = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $req->type)->get();
        $cadang1kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $req->type)->get();
        $cadang2kiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $req->type)->get();
        $programkiv  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Dalam Pemerhatian (KIV)')->where('user_details.state', $req->type)->get();

        $hadir = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')      
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $req->type)->get();
        $cadang1hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $req->type)->get();
        $cadang2hadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $req->type)->get();
        $programhadir  = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
        ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
        ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
        ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
        ->join('program', 'program.program_id', '=', 'penawaran_permohonan.program_tawar')
        ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
        ->where('all_status_permohonan.status_offer', 'Hadir Temuduga')->where('user_details.state', $req->type)->get();


        $program = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();

       
       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'ditawar' => $ditawar,
            'cadang1ditawar' => $cadang1ditawar,
            'cadang2ditawar' => $cadang2ditawar,
            'programditawar' => $programditawar,
            'ditolak' => $ditolak,
            'cadang1ditolak' => $cadang1ditolak,
            'cadang2ditolak' => $cadang2ditolak,
            'programditolak' => $programditolak,
            'kiv' => $kiv,
            'cadang1kiv' => $cadang1kiv,
            'cadang2kiv' => $cadang2kiv,
            'programkiv' => $programkiv,
            'hadir' => $hadir,
            'cadang1hadir' => $cadang1hadir,
            'cadang2hadir' => $cadang2hadir,
            'programhadir' => $programhadir,
            'program' => $program,
                    
        ];

        return response()->json($data);
    }

    public function display_penawarabynric(Request $req)
    {

        $displaypenawaran = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displaypenawaran' => $displaypenawaran,
            'program' => $program,
        ];

        return response()->json($data);
    }



    public function tawar_penawaran(Request $req)
    {
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

        



        

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

    public function tolak_penawaran(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');
        $logic = PenawaranPermohonan::where('nric',$req->nric)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }

        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Ditolak',
            'status_global' => 'PENAWARAN DITOLAK',   
            'status_temuduga' => 'Ditolak',     
        ]);

        $update = PenawaranPermohonan::where('nric',$req->nric)->update
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
        

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

    

        return response()->json($data);
    }

    public function KIV_penawaran(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');
        $logic = PenawaranPermohonan::where('nric',$req->nric)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }

        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Dalam Pemerhatian (KIV)',  
            'status_global' => 'DALAM PEMERHATIAN (KIV)' ,  
            'status_temuduga' => 'Kiv',    
        ]);

        $update = PenawaranPermohonan::where('nric',$req->nric)->update
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

      
        

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

    public function hadir_penawaran(Request $req)
    {

        $logic = PenawaranPermohonan::where('nric',$req->nric)->first();

        if($logic->program_tawar != NULL){

            $program = Offerprogram::where('program_id', $logic->program_tawar)->first();

            $quotasemasa = $program->quota_semasa - 1;

            $updatequota = Offerprogram::where('program_id', $logic->program_tawar)->update
            ([
                'quota_semasa' => $quotasemasa,        
            ]);

        }


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Hadir Temuduga',    
            'status_global' => 'HADIR TEMUDUGA' , 
            'status_temuduga' => 'Hadir',   
        ]);

        $update = PenawaranPermohonan::where('nric',$req->nric)->update
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

      

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

    public function AjaxTawaran(Request $req)
    {

        $displaypenawaran = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->first();
        $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();
        $offer = Offerprogram::where('program_id', $req->program)->first();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displaypenawaran' => $displaypenawaran,
            'program' => $program,
            'offer' => $offer,
        ];

        return response()->json($data);
    }

    public function pemprosesanTawaran(Request $req)
    {

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

                
                $nosiri = StatusPermohonan::where('job_id', $req->display)->where('nric', $User->nric)->first();

                $audit = new Audit;
                $audit->nric = $User->nric;
                $audit->no_siri = $nosiri->no_siri;
                $audit->penerangan = 'Penawaran Diproses';
                $audit->tarikh_audit = $currentdt;
                $audit->created_by = $req->id;
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
            }
        }
    }
}
