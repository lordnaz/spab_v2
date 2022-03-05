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

class BalasanCalonAPIController extends Controller
{
    //

    public function display_balasan()
    {

       
        $balasan = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', "Ditawarkan")->get();
       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $balasan,
           
            
        ];
    }

    public function display_balasanbynric(Request $req)
    {

       
        $balasan = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('user_details.nric', $req->nric)->get();
       

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $balasan,
                  
        ];
    }

    public function terima(Request $req)
    {


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'balasan_calon' => 'Terima',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

    public function tolak(Request $req)
    {


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'balasan_calon' => 'Tolak',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

}
