<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningIV;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;
use App\Models\AsasInterview;
use App\Models\CenterInterview;
use App\Models\SubjectGrade;
use App\Models\Qualification;

class InterviewScreeningController extends Controller
{


    public function getAllScreeningIVapplicant()
    {


        $displayBelumProses = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Belum proses')
            ->get();

        $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->get();

        $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
            ->join('program', 'program.program_id', '=', 'program_applied.program_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Tolak')
            ->get();



        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak,

        ];

        return response()->json($data);
    }

    public function AjaxView(Request $req)
    {

        if ($req->type == "Semua") {
            $displayBelumProses = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Belum proses')
                ->get();

            $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Temuduga')
                ->get();

            $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Tolak')
                ->get();
        } else {

            $displayBelumProses = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Belum proses')
                ->where('user_details.state', $req->type)
                ->get();

            $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Temuduga')
                ->where('user_details.state', $req->type)
                ->get();

            $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
                ->join('program', 'program.program_id', '=', 'program_applied.program_id')
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Tolak')
                ->where('user_details.state', $req->type)
                ->get();
        }


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak,

        ];

        return response()->json($data);
    }


    //batal penapisan
    public function batalPenapisan(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');



        $updateScreeningIV = ScreeningIV::where('nric', $req->code)->update([
                'center_id' => NULL,
                'TarikhProses' => NULL,
                'kelulusan1' =>  NULL,
                'kelulusan2' =>  NULL,
                'status_sesi' =>  NULL,
            ]);

        $updatestatus = StatusPermohonan::where('nric', $req->code)->update([
                'status_temuduga' => 'Belum proses',

            ]);


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }

    //tolak penapisan
    public function tolakPenapisan(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');



        $updateScreeningIV = ScreeningIV::where('nric', $req->code)->update([
                'center_id' => NULL,
                'status_sesi' =>  NULL,

            ]);

        $updatestatus = StatusPermohonan::where('nric', $req->code)->update([
                'status_temuduga' => 'Tolak',

            ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }

    //temuduga penapisan
    public function temudugaPenapisan(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');



        $detailTemuduga = ScreeningIV::where('nric', $req->code)->first();
        $detailCenter = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();



        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'detailTemuduga' => $detailTemuduga,
            'detailCenter' => $detailCenter,
        ];

        return response()->json($data);
    }


    //Kemaskini Temuduga
    public function KemaskiniTemuduga(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');



        $updateScreeningIV = ScreeningIV::where('screening_id', $req->screening_id)->update([
                'center_id' => $req->center_id,

            ]);

        $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
                'status_temuduga' => 'Temuduga',

            ]);

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }


    public function pemprosesanTemuduga(Request $req)
    {

        $currentdt = date('Y-m-d H:i:s');

        if ($req->proses == 'Semua') {

            $opencenter = AsasInterview::join('interview_center', 'interview_center.center_id', '=', 'asas_interview.center_id')->where('asas_interview.status', true)->get();

            $User = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
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
                    ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                    ->where('all_status_permohonan.status_temuduga', 'Belum proses')
                    ->get();
            }

            else{

                $ProsesUser = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                    ->join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                    ->join('program_applied', 'program_applied.nric', '=', 'user_details.nric')
                    ->where('all_status_permohonan.status_temuduga', 'Belum proses')
                    ->where('user_details.state', $req->proses)
                    ->get();

            }


                foreach ($ProsesUser as $Proses) {

                    if ($Proses->cert_related_program == 'Ada Sijil') {

                        $existCenter = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->exists();

                        if (!$existCenter) {

                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([
                                    'kelulusan1' => 'L',
                                    'kelulusan2' => 'L',
                                    'TarikhProses' => $currentdt,

                                ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                    'status_temuduga' => 'Tolak',

                                ]);
                        }

                        else{

                        $ProsesCenter = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->inRandomOrder()->first();

                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                'kelulusan1' => 'L',
                                'kelulusan2' => 'L',
                                'TarikhProses' => $currentdt,
                                'center_id' => $ProsesCenter->center_id,

                            ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                'status_temuduga' => 'Temuduga',

                            ]);

                        }

                    } 


                    else {

                        $gradeExists = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', 'BM')->exists();

                        if(!$gradeExists){

                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                'kelulusan1' => 'G',
                                'kelulusan2' => 'G',
                                'TarikhProses' => $currentdt,

                            ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                'status_temuduga' => 'Tolak',

                            ]);



                        }

                        else{

                            $grade = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', 'BM')->first();

                            if($grade->grade <= 3){

                                $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                    'kelulusan1' => 'G',
                                    'kelulusan2' => 'G',
                                    'TarikhProses' => $currentdt,
    
                                ]);
    
                                $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
    
                                    'status_temuduga' => 'Tolak',
    
                                ]);


                            }

                            else{

                                $syarat[1] = 1;
                                $syarat[2] = 1;

                                $gradelist = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', '!=', 'BM')->get();

                                if (count($Proses->program_applid) == 2){

                                    
                                    foreach($Proses as $Prosess){

                                        $i = 1;

                                    $offerprogram = Qualification::where('offerprogram_id', $Prosess->offerprogram_id)->where('status', true)->get();

                                    foreach($offerprogram as $offer){

                                        foreach($gradelist as $grade){

                                        if($offer->subj_name == $grade->subject_list){

                                            if($grade->grade >= $offer->val_grade){

                                                $syarat[$i] = $syarat + 1;
                                            }
                                            else{

                                            }

                                        }
                                        else{

                                        }


                                        }
                                    }

                                    if($i == 1){

                                        $existCenter = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->exists();
                                        
                                        
                                    
                                    if($syarat[$i] >= 4){

                                        if(!$existCenter){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan1' => 'L',                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                
                                            ]);


                                        }

                                      else{
                                        $ProsesCenterr = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->inRandomOrder()->first();

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => 'L',                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterr->center_id
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
            
                                        ]);

                                    }
                                }

                                    else{

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
            
                                        ]);
            
                                


                                    }
                                }

                                else{

                                    if($syarat[$i] >= 4){

                                        $existCenterrr = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->exists();

                                        if(!$existCenterrr)
                                        {

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan2' => 'L',                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                
                                            ]);

                                        }

                                        else{

                                        if($Proses->kelulusan1 == 'L'){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan2' => 'L',                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Temuduga',
                
                                            ]);

                                        }

                                        else{
                                        
                                        $ProsesCenterrr = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->inRandomOrder()->first();
                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan2' => 'L',                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterrr->center_id,
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
            
                                        ]);
                                        }

                                    }
                                }

                                    else{

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan2' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
            
                                        ]);

                                        if($syarat[1] >= 4){
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
            
                                        ]);
                                    }
                                    else

                                    $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                        'status_temuduga' => 'Tolak',
        
                                    ]);



                                    }


                                }



                                    $i = $i + 1;

                                    }
                                }

                                else{

                                    $offerprogram = Qualification::where('offerprogram_id', $Proses->offerprogram_id)->where('status', true)->get();
                                    $syaratt = 1;

                                    foreach($offerprogram as $offer){

                                        foreach($gradelist as $grade){

                                        if($offer->subj_name == $grade->subject_list){

                                            if($grade->grade >= $offer->val_grade){

                                                $syaratt = $syaratt + 1;
                                            }
                                            else{

                                            }

                                        }
                                        else{

                                        }


                                        }
                                    }

                                   

                                        $existCenter = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->exists();
                                        
                                        
                                    
                                    if($syaratt >= 4){

                                        if(!$existCenter){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan1' => 'L',                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                
                                            ]);


                                        }

                                      else{
                                        $ProsesCenterr = AsasInterview::where('status', true)->whereIn('negeri', $Proses->state)->inRandomOrder()->first();

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => 'L',                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterr->center_id
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
            
                                        ]);

                                    }
                                }

                                    else{

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => $syaratt,                                           
                                            'TarikhProses' => $currentdt,
            
                                        ]);

                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                            'status_temuduga' => 'Tolak',
            
                                        ]);                            


                                    }
                                


                                }


                            }


                        }



                        


                    }
                }

            
            
        }

        $data = [
            'status' => $status,
            'code' => '000',
            'description' => 'succesfull'
        ];

        return response()->json($data);
    }
}
