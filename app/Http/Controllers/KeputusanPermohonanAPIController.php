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
use App\Models\program;
use App\Models\AppplicantIVSession;
use App\Models\CenterInterview;
use App\Models\SessionInterview;
use App\Models\ScreeningIV;

class KeputusanPermohonanAPIController extends Controller
{
    //


    public function display_all_permohonan_pengesahan()
    {
        $displayUser = UserDetail::orderBy('user_detailsid', 'desc')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', '=', 'Ditawarkan')->orWhere('all_status_permohonan.status_offer', '=', 'Ditolak')
        ->orWhere('all_status_permohonan.status_offer', '=', 'Dalam Pemerhatian (KIV)')->orWhere('all_status_permohonan.status_offer', '=', 'Hadir Temuduga')->get();


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'dataa' => $displayUser,
        ];
        return response()->json($data);
    }


    public function display_keputusanbynric(Request $req)
    {

        
        $displaypenawaran = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('user_details.nric',$req->code)->first();
        $displayDataPengesahan = PenawaranPermohonan::join('program','program.program_id', '=', 'penawaran_permohonan.program_tawar')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'penawaran_permohonan.nric')->where('penawaran_permohonan.nric',$req->code)->first();
        $displayDataInterview = ScreeningIV::join('session_interview','session_interview.session_id', '=' , 'screening_interview.session_id')->join('interview_center','interview_center.center_id', '=', 'screening_interview.center_id')->where('screening_interview.nric',$req->code)->first();

       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displaypenawaran,
            'dataa' => $displayDataPengesahan,
            'dataaa' => $displayDataInterview,
           
        ];
        return response()->json($data);
    }

}
