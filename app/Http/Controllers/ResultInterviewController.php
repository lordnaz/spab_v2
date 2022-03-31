<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultInterview;
use App\Models\AppplicantIVSession;
use App\Models\UserDetail;
use App\Models\SessionInterview;
use App\Models\ScreeningIV;
use App\Models\AsasInterview;
use App\Models\PenawaranPermohonan;
use App\Models\Offerprogram;
use App\Models\StatusPermohonan;

class ResultInterviewController extends Controller
{


    //to filter by center iv
    public function DataKeputusanTemuduga(){


        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->first();

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('all_status_permohonan.status_temuduga', 'Hadir')
            ->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

            $cadang1 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            ->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('all_status_permohonan.status_temuduga', 'Hadir')
            ->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->select('program.code as cadang1code')
            ->get();

            $cadang2 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('all_status_permohonan.status_temuduga', 'Temuduga')->where('all_status_permohonan.status_temuduga', 'Hadir')->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')->where('screening_interview.center_id', $FirstCenter->center_id)->select('program.code as cadang2code')->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'DataCenter' => $DataCenter,
            'FirstCenter' => $FirstCenter,
            'displayTable' => $displayTable,
            'cadang1' => $cadang1,
            'cadang2' => $cadang2,
            
        ];

        return response()->json($data);

    }

    public function RouteCenter(Request $req){


        $DataCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->orderBy('asas_interview.asas_id', 'asc')->where('asas_interview.status', true)->get();
        $FirstCenter = AsasInterview::join('interview_center','interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->where('asas_id', $req->type)->first();
       

        $displayTable = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->where('all_status_permohonan.status_temuduga', 'Hadir')
            ->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')
            ->where('screening_interview.center_id', $FirstCenter->center_id)
            ->get();

            $cadang1 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang1')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('all_status_permohonan.status_temuduga', 'Temuduga')->where('all_status_permohonan.status_temuduga', 'Hadir')->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')->where('screening_interview.center_id', $FirstCenter->center_id)->get();

            $cadang2 = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')->join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')->join('session_interview', 'session_interview.session_id', '=', 'screening_interview.session_id')->join('program', 'program.program_id', '=', 'penawaran_permohonan.cadang2')->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')->where('all_status_permohonan.status_temuduga', 'Temuduga')->where('all_status_permohonan.status_temuduga', 'Hadir')->where('all_status_permohonan.status_temuduga', 'Tidak Hadir')->where('screening_interview.center_id', $FirstCenter->center_id)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'DataCenter' => $DataCenter,
            'FirstCenter' => $FirstCenter,
            'displayTable' => $displayTable,
            
        ];

        return response()->json($data);

    }
    

    public function hadirTemuduga(Request $req){


       
       

        $dataPelajar = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->where('user_details.nric', $req->type)           
            ->get();

            $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'dataPelajar' => $dataPelajar,
            'program' => $program,

            
        ];

        return response()->json($data);

    }

    public function PostHadirTemuduga(Request $req){

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

        ]);

        }

        $data = [
            'status' => 'failed',
            'code' => '001',
            'description' => 'program failed to update'
        ];

        return response()->json($data);
    }

    public function TidakHadirTemuduga(Request $req){


       
       

        $dataPelajar = UserDetail::join('penawaran_permohonan', 'penawaran_permohonan.nric', '=', 'user_details.nric')
            ->where('user_details.nric', $req->type)           
            ->get();

            $program = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'dataPelajar' => $dataPelajar,
            'program' => $program,

            
        ];

        return response()->json($data);

    }

    public function PostTidakHadir(Request $req){

        $exist = PenawaranPermohonan::where('nric', $req->nric)->exists();

        if(!$exist){

            $masukdata = new PenawaranPermohonan;
            $masukdata->nric = $req->nric;
            $masukdata->markah = $req->markah;
            $masukdata->save();

            $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
                'status_temuduga' => 'Tidak Hadir',

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

        ]);

        }

        $data = [
            'status' => 'failed',
            'code' => '001',
            'description' => 'program failed to update'
        ];

        return response()->json($data);
    }

    public function batalTemuduga(Request $req){

        $exist = PenawaranPermohonan::where('nric', $req->code)->exists();

        if(!$exist){


            $updatestatus = StatusPermohonan::where('nric', $req->code)->update([
                'status_temuduga' => 'Temuduga',

            ]);
        }
        else{

            $update = PenawaranPermohonan::where('nric',$req->code)->update
        ([

        'markah' => NULL,
        'cadang1' => NULL,
        'cadang2' => NULL,

        ]);

        $updatestatus = StatusPermohonan::where('nric', $req->code)->update([
            'status_temuduga' => 'Temuduga',

        ]);

        }

        $data = [
            'status' => 'failed',
            'code' => '001',
            'description' => 'program failed to update'
        ];

        return response()->json($data);
    }



    



}
