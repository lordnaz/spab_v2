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
        $displayUser = UserDetail::orderBy('id', 'desc')->get();


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

        
        $displaypenawaran = UserDetail::where('nric',$req->code)->first();
        $displayDataPengesahan = PenawaranPermohonan::where('nric',$req->code)->first();
        $displayDataInterview = AppplicantIVSession::join('interview_center','interview_center.center_id','=','applicant_iv_session.center_id')->where('nric',$req->code)->first();

       

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
