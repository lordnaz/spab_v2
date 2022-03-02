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

class KeputusanPermohonanAPIController extends Controller
{
    //
    public function display_keputusanbynric(Request $req)
    {

        $displaypenawaran = UserDetail::join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->get();
        $displayy = program::where('status', true)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displaypenawaran,
            'dataa' => $displayy,
        ];
    }

}
