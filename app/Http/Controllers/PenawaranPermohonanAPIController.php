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

class PenawaranPermohonanAPIController extends Controller
{
    //
    public function display_penawaran(Request $req)
    {

        $displayallpenawaran = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', '!=', "Belum Ditawar")->where('all_status_permohonan.balasan_calon', "Tiada Balasan")->get();
        $ditawar = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', "Ditawarkan")->where('all_status_permohonan.balasan_calon', "Tiada Balasan")->get();
        $ditolak = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', "Ditolak")->where('all_status_permohonan.balasan_calon', "Tiada Balasan")->get();
        $kiv = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', "Dalam Pemerhatian (KIV)")->where('all_status_permohonan.balasan_calon', "Tiada Balasan")->get();
        $hadir = UserDetail::join('program_applied', 'nric', '=', 'user_details.nric')->join('all_status_permohonan', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'nric', '=', 'user_details.nric')->where('all_status_permohonan.status_offer', "Hadir Temuduga")->where('all_status_permohonan.balasan_calon', "Tiada Balasan")->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'data' => $displayallpenawaran,
            'ditawar' => $ditawar,
            'ditolak' => $ditolak,
            'kiv' => $kiv,
            'hadir' => $hadir,
            
        ];
    }

    public function display_penawaranbynric(Request $req)
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



    public function tawar_penawaran(Request $req)
    {

        $update = PenawaranPermohonan::where('nric', $req->nric)->update(
            [
                'program_tawar' => $req->program_tawar,
                'sem' => $req->sem,
                'sesi' => $req->sesi,
                'tarikh_daftar' => $req->tarikh_daftar,
                'masa_daftar' => $req->masa_daftar,
                'tempat_daftar' => $req->tempat_daftar,
                'catatan' => $req->catatan,
            ]
        );

        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Ditawarkan',        
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


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Ditolak',        
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


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Dalam Pemerhatian (KIV)',        
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


        $update = StatusPermohonan::where('nric',$req->nric)->update
        ([
            'status_offer' => 'Hadir Temuduga',        
        ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }
}
