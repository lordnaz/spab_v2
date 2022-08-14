<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScreeningIV;
use App\Models\UserDetail;
use App\Models\StatusPermohonan;
use App\Models\AsasInterview;
use App\Models\CenterInterview;
use App\Models\ProgramApplied;
use App\Models\SubjectGrade;
use App\Models\Qualification;
use Illuminate\Support\Facades\Session;
use App\Models\Audit;

class InterviewScreeningController extends Controller
{


    public function getAllScreeningIVapplicant()
    {


        $displayBelumProses = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
            ->get();

        $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
            ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Temuduga')
            ->get();
            

        $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric') 
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'Tolak')
            ->get();

        $tolak = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();

      
       
        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak,
            'tolak' => $tolak,
        ];

        return response()->json($data);
    }

    public function AjaxView(Request $req)
    {

        if ($req->type == "Semua") {
            $displayBelumProses =  UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
            ->get();

            $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')               
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Temuduga')
                ->get();

            $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric') 
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')               
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Tolak')
                ->get();
                $tolak = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();
        } else {

            $displayBelumProses =  UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')
            ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
            ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
            ->where('user_details.state', $req->type)
            ->get();

            $displayTemuduga = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')              
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')
                ->join('interview_center', 'interview_center.center_id', '=', 'screening_interview.center_id')           
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Temuduga')
                ->where('user_details.state', $req->type)
                ->get();

            $displayTolak = UserDetail::join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')             
                ->join('screening_interview', 'screening_interview.nric', '=', 'user_details.nric')                
                ->join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                ->where('all_status_permohonan.status_temuduga', 'Tolak')
                ->where('user_details.state', $req->type)
                ->get();
                $tolak = ProgramApplied::join('program', 'program.program_id', '=', 'program_applied.program_id')->get();
        }


        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'succesfull',
            'displayBelumProses' => $displayBelumProses,
            'displayTemuduga' => $displayTemuduga,
            'displayTolak' => $displayTolak,
            'tolak' => $tolak,
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
                'status_temuduga' => 'BELUM PROSES',
                'status_global' => 'DISAHKAN',
                'status_validation' => 'SAH',

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
                'TarikhProses' =>$currentdt

            ]);

        $updatestatus = StatusPermohonan::where('nric', $req->code)->update([
                'status_temuduga' => 'Tolak',
                'status_global' => 'PENAPISAN DITOLAK' ,

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



        $detailTemuduga = ScreeningIV::join('user_details', 'user_details.nric', '=', 'screening_interview.nric')->where('screening_interview.nric', $req->code)->first();
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
                'TarikhProses' =>$currentdt

            ]);

        $updatestatus = StatusPermohonan::where('nric', $req->nric)->update([
                'status_temuduga' => 'Temuduga',
                'status_global' => 'DITEMUDUGA' ,

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
                ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
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
                    ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
                    ->get();
            }

            else{

                $ProsesUser = UserDetail::join('all_status_permohonan', 'all_status_permohonan.nric', '=', 'user_details.nric')
                    ->join('applicant_experiences', 'applicant_experiences.nric', '=', 'user_details.nric')                 
                    ->where('all_status_permohonan.status_temuduga', 'BELUM PROSES')
                    ->where('user_details.state', $req->proses)
                    ->get();

            }


                foreach ($ProsesUser as $Proses) {

                    $nosiri = StatusPermohonan::where('job_id', $req->display)->where('nric', $Proses->nric)->first();

                    $audit = new Audit;
                    $audit->nric = $Proses->nric;
                    $audit->no_siri = $nosiri->no_siri;
                    $audit->penerangan = 'Temuduga Diproses';
                    $audit->tarikh_audit = $currentdt;
                    $audit->created_by = $req->id;
                    $audit->save();

                    if ($Proses->cert_related_program == 'Ada Sijil') {

                        $existCenter = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->exists();

                        if (!$existCenter) {

                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([
                                    'kelulusan1' => 'L',
                                    'kelulusan2' => 'L',
                                    'TarikhProses' => $currentdt,

                                ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                    'status_temuduga' => 'Tolak',
                                    'status_validation' => 'Tolak',
                                    'status_global' => 'PENAPISAN DITOLAK' ,

                                ]);
                        }

                        else{

                        $ProsesCenter = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->inRandomOrder()->first();

                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                'kelulusan1' => 'L',
                                'kelulusan2' => 'L',
                                'TarikhProses' => $currentdt,
                                'center_id' => $ProsesCenter->center_id,

                            ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                'status_temuduga' => 'Temuduga',
                                'status_validation' => 'Temuduga',
                                'status_global' => 'DITEMUDUGA' ,

                            ]);

                        }

                    } 


                    else {

                        $gradeExists = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', 'Bahasa Melayu')->exists();

                        if(!$gradeExists){

                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                'kelulusan1' => 'G',
                                'kelulusan2' => 'G',
                                'TarikhProses' => $currentdt,

                            ]);

                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([

                                'status_temuduga' => 'Tolak',
                                'status_validation' => 'Tolak',
                                'status_global' => 'PENAPISAN DITOLAK' ,

                            ]);



                        }

                        else{

                            $grade = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', 'Bahasa Melayu')->first();

                            if($grade->grade <= 3){

                                $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                    'kelulusan1' => 'G',
                                    'kelulusan2' => 'G',
                                    'TarikhProses' => $currentdt,
    
                                ]);
    
                                $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
    
                                    'status_temuduga' => 'Tolak',
                                    'status_validation' => 'Tolak',
                                    'status_global' => 'PENAPISAN DITOLAK' ,
    
                                ]);


                            }

                            else{

                                $syarat[1] = 1;
                                $syarat[2] = 1;

                                $gradelist = SubjectGrade::where('nric', $Proses->nric)->where('type_qualification', 'SPM')->where('subject_list', '!=', 'Bahasa Melayu')->get();

                                if (count($Proses->program_applid) == 2){

                                    
                                    foreach($Proses as $Prosess){

                                        $i = 1;

                                    $offerprogram = Qualification::where('offerprogram_id', $Prosess->offerprogram_id)->where('status', true)->get();

                                    foreach($offerprogram as $offer){

                                        foreach($gradelist as $grade){

                                        if($offer->subj_name == $grade->subject_list){

                                            if($grade->grade >= $offer->val_grade){

                                                $syarat[$i] = $syarat[$i] + 1;
                                            }
                                            else{

                                            }

                                        }
                                        else{

                                        }


                                        }
                                    }

                                    if($i == 1){

                                      
                                        $existCenter = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->exists();
                                        
                                    
                                    if($syarat[$i] >= 4){

                                        if(!$existCenter){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan1' => $syarat[$i],                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                                                'status_validation' => 'Tolak',
                                                'status_global' => 'DPENAPISAN DITOLAK' ,
                
                                            ]);


                                        }

                                      else{
                                        $ProsesCenterr = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->inRandomOrder()->first();

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterr->center_id
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
                                            'status_validation' => 'Temuduga',
                                            'status_global' => 'DITEMUDUGA' ,
            
                                        ]);

                                    }
                                }

                                    else{

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
            
                                        ]);

                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Tolak',
                                            'status_validation' => 'Tolak',
                                            'status_global' => 'PENAPISAN DITOLAK' ,
            
                                        ]);
                              


                                    }
                                }

                                else{

                                    if($syarat[$i] >= 4){

                                        $existCenterrr = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->exists();

                                        if(!$existCenterrr)
                                        {

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan2' => $syarat[$i],                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                                                'status_validation' => 'Tolak',
                                                'status_global' => 'PENAPISAN DITOLAK' ,
                
                                            ]);

                                        }

                                        else{

                                        if($Proses->status_temuduga == 'Temuduga'){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan2' => $syarat[$i],                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Temuduga',
                                                'status_validation' => 'Temuduga',
                                                'status_global' => 'DITEMUDUGA' ,
                
                                            ]);

                                        }

                                        else{
                                        
                                        $ProsesCenterrr = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->inRandomOrder()->first();
                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan2' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterrr->center_id,
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
                                            'status_validation' => 'Temuduga',
                                            'status_global' => 'DITEMUDUGA' ,
            
                                        ]);
                                        }

                                    }
                                }

                                    else{

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan2' => $syarat[$i],                                           
                                            'TarikhProses' => $currentdt,
            
                                        ]);

                                        if($Proses->status_temuduga == 'Temuduga'){
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
                                            'status_validation' => 'Temuduga',
                                            'status_global' => 'DITEMUDUGA' ,
            
                                        ]);
                                    }
                                    else

                                    $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                        'status_temuduga' => 'Tolak',
                                        'status_validation' => 'Tolak',
                                        'status_global' => 'PENAPISAN DITOLAK' ,
        
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

                                   

                                    $existCenter = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->exists();
                                        
                                        
                                    
                                    if($syaratt >= 4){

                                        if(!$existCenter){

                                            $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                                'kelulusan1' => $syaratt,                                           
                                                'TarikhProses' => $currentdt,
                                                
                
                                            ]);
                
                                            $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
                
                                                'status_temuduga' => 'Tolak',
                                                'status_validation' => 'Tolak',
                                                'status_global' => 'PENAPISAN DITOLAK' ,
                
                                            ]);


                                        }

                                      else{
                                        $ProsesCenterr = AsasInterview::where('status', true)->where('negeri','LIKE', '%'.$Proses->state.'%')->inRandomOrder()->first();

                                        $updateScreeningIV = ScreeningIV::where('nric', $Proses->nric)->update([

                                            'kelulusan1' => $syaratt,                                           
                                            'TarikhProses' => $currentdt,
                                            'center_id' => $ProsesCenterr->center_id
            
                                        ]);
            
                                        $updatestatus = StatusPermohonan::where('nric', $Proses->nric)->update([
            
                                            'status_temuduga' => 'Temuduga',
                                            'status_validation' => 'Temuduga',
                                            'status_global' => 'DITEMUDUGA' ,
            
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
                                            'status_validation' => 'Tolak',
                                            'status_global' => 'PENAPISAN DITOLAK' ,
            
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
