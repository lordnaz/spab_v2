<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\UserDetail;
use App\Models\UserDetailSub;
use App\Models\ApplicantExperiences;
use App\Models\ArtInvolve;
use App\Models\ClubActivities;
use App\Models\CourseTaken;
use App\Models\MuetResult;
use App\Models\ProgramApplied;
use App\Models\QualificationPermohonan;
use App\Models\SponsorDetails;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\ScreeningIV;
use App\Models\Offerprogram;
use App\Models\DaftarIntake;
use App\Models\Intake;
use App\Models\PendaftaranPelajar;
use App\Models\program as Program;
use App\Models\StatusPermohonan as SubmitApplication;
use Carbon\Carbon;
use Exception;
use App\Models\Audit;
use App\Models\UserInformation;
use PDO;

class FE_PermohonanController extends Controller
{
    
    //
    public function regis_all(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"], ['name' => "Senarai Permohonan"]
        ];

        // $request = Request::create('/api/display_allprogram', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        // return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

        $userid = auth()->user()->id;

        $userdetails = UserInformation::where('created_by', $userid)->first();

        $check_applications = SubmitApplication::where('nric', $userdetails->nric)->exists();

        $test = Session::get('variableName');
        

        $applications = null;

        if($check_applications){
            $applications = SubmitApplication::join('pendaftaran_pelajar','pendaftaran_pelajar.nric', '=', 'all_status_permohonan.nric')->where('all_status_permohonan.nric', $userdetails->nric)->where('all_status_permohonan.all_status', 'DRAFT')->orWhere('all_status', 'BELUM DISAHKAN')->get();
        }

        // return 'data'.$applications;
        // die();
        

        // check if have active application, then disable button new registration 
        $active_exist = SubmitApplication::where('nric', $userdetails->nric)
                                        ->where('all_status', 'DRAFT')
                                        ->orWhere('all_status', 'DALAM PROSES')
                                        ->exists();
        
        $button = SubmitApplication::where('nric', $userdetails->nric)->where('all_status', 'BELUM DISAHKAN')->exists();

        if(!$button){

            $disable = 'ada';

        }
        else{

            $disable = 'disable';
        }
        

        return view('components.permohonan-main', ['breadcrumbs' => $breadcrumbs], compact('applications', 'active_exist'))->with('button', $disable);
    }

    public function registration(){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"], ['name' => "Permohonan Baru"]
        ];

       
        // $request = Request::create('/api/display_allprogram', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        // return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

        $email = auth()->user()->email;

        $intake = Session::get('variableName');

        $programs = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Sepenuh Masa')->where('program.type', 'Program Asasi')->get();
        $programs2 = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Separuh Masa')->where('program.type', 'Program Asasi')->get();
        $diploma = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Sepenuh Masa')->where('program.type', 'Diploma')->get();
        $diploma2 = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Separuh Masa')->where('program.type', 'Diploma')->get();
        $sarjanamuda = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Sepenuh Masa')->where('program.type', 'Sarjana Muda')->get();
        $sarjanamuda2 = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Separuh Masa')->where('program.type', 'Sarjana Muda')->get();
        $sarjana = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Sepenuh Masa')->where('program.type', 'Sarjana')->get();
        $sarjana2 = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Separuh Masa')->where('program.type', 'Sarjana')->get();
        $kedoktoran = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Sepenuh Masa')->where('program.type', 'Kedoktoran')->get();
        $kedoktoran2 = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'aktif')->where('offerprogram.mode', 'Separuh Masa')->where('program.type', 'Kedoktoran')->get();

        $userid = auth()->user()->id;
        $userdetails = UserInformation::where('created_by', $userid)->first();


        $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        $random_number = rand(10000000,99999999);
        $job_id = $random_string.$random_number;

        $check_job_id = SubmitApplication::where('nric', $userdetails->nric)
                                        ->where('job_id', $intake)
                                        ->where('all_status', 'DRAFT')
                                        ->orWhere('all_status', 'DALAM PROSES')
                                        ->exists();

        if(!$check_job_id){
            $create_job = new SubmitApplication;
            $create_job->nric = $userdetails->nric;
            $create_job->no_siri = $job_id;
            $create_job->job_id = $intake;
            $create_job->all_status = 'DRAFT';
            $create_job->status_global = 'DRAFT';
            $create_job->created_by = $userid;
            $create_job->modified_by = $userid;
            $create_job->save();
        }
       
            //create data table
            $userexist = UserDetail::where('nric', $userdetails->nric)->where('job_id', $intake)->exists();
            if(!$userexist){
            $userpermohonan = new UserDetail();
            $userpermohonan->nric = $userdetails->nric;
            $userpermohonan->job_id = $intake;
            $userpermohonan->save();
            }

            $usersubexist = UserDetailSub::where('nric', $userdetails->nric)->where('job_id', $intake)->exists();
            if(!$usersubexist){
            $userpermohonan = new UserDetailSub();
            $userpermohonan->nric = $userdetails->nric;
            $userpermohonan->job_id = $intake;
            $userpermohonan->save();
            }
            else{
                $save_draft = UserDetailSub::where('nric', $userdetails->nric)
                ->update([
                    'job_id' => $intake,
                    ]);
            }

            $pendaftaran = PendaftaranPelajar::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
            if(!$pendaftaran){
            $pendaftarann = new PendaftaranPelajar();
            $pendaftarann->nric = $userdetails->nric;
            $pendaftarann->job_id = $intake;
            $pendaftarann->save();
            }
            

         $penawaranexist = PenawaranPermohonan::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
         if(!$penawaranexist){
         $penawaranpermohonan = new PenawaranPermohonan();
         $penawaranpermohonan->nric = $userdetails->nric;
         $penawaranpermohonan->job_id = $intake;
         $penawaranpermohonan->save();
         }
 
         $screeningexist = ScreeningIV::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
         if(!$screeningexist){
         $screening = new ScreeningIV();
         $screening->nric = $userdetails->nric;
         $screening->job_id = $intake;
         $screening->save();
         }

         $muetexist = MuetResult::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
         if(!$muetexist){
         $muet_result = new MuetResult();
         $muet_result->nric = $userdetails->nric;
         $muet_result->job_id = $intake;
         $muet_result->save();
         }

         $appexist = ApplicantExperiences::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
         if(!$appexist){
         $applicant_exp = new ApplicantExperiences();
         $applicant_exp->nric = $userdetails->nric;
         $applicant_exp->job_id = $intake;
         $applicant_exp->save();
         }

         $sponsorexist = SponsorDetails::where('nric', $userdetails->nric)->where('job_id',  $intake)->exists();
         if(!$sponsorexist){
         $sponsor = new SponsorDetails();
         $sponsor->nric = $userdetails->nric;
         $sponsor->job_id = $intake;
         $sponsor->save();
         }
        
        
        //form1

        $form1 = UserDetail::join('all_status_permohonan','all_status_permohonan.nric', '=','user_details.nric')->where('user_details.nric', $userdetails->nric)->where('user_details.job_id', $intake)->first();


         //form2

         $form2 = UserDetailSub::where('nric', $userdetails->nric)->where('job_id', $intake)->first();


         //form3
         
         $form3 = SubmitApplication::where('nric', $userdetails->nric)->where('job_id', $intake)->first();
        

        $applications = SubmitApplication::where('nric', $userdetails->nric)->where('job_id', $intake)
                                        ->where('all_status', 'DRAFT')
                                        ->orWhere('all_status', 'DALAM PROSES')
                                        ->first();

        $check_one = ProgramApplied::where('nric', $userdetails->nric)->where('job_id', $intake)
                                    ->where('sequence', 'program_one')->exists();
        $program_one_id = "NOT_EXIST";
        
        if($check_one){
            $applied_program_one = ProgramApplied::where('nric', $userdetails->nric)->where('job_id',  $intake)
                                            ->where('sequence', 'program_one')->first();                                   
            $program_one_id = $applied_program_one->program_id;
        }
        

        $check_two = ProgramApplied::where('nric', $userdetails->nric)->where('job_id',  $intake)
                                    ->where('sequence', 'program_two')->exists();
        $program_two_id = 'NOT_EXIST';

        if($check_two){
            $applied_program_two = ProgramApplied::where('nric', $userdetails->nric)->where('job_id',  $intake)
                                            ->where('sequence', 'program_two')->first();
            $program_two_id = $applied_program_two->program_id;
        }

         
 //form 4
 $form4 = MuetResult::where('nric', $userdetails->nric)->where('job_id', $intake)->first();
 $form44 = ApplicantExperiences::where('nric', $userdetails->nric)->where('job_id', $intake)->first();
         
 
        //kelulusanloop
        $kelulusanloop = QualificationPermohonan::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('status', true)->get();

       //PMR
       $pmr = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'PMR')->where('status', true)->get();
       $pmryear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'PMR')->where('status', true)->exists();
       if($pmryear){

           $tahunpmr = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'PMR')->where('year', '!=', NULL)->exists();
           if($tahunpmr){
           $tahun = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'PMR')->where('year', '!=', NULL)->first();
           $years = $tahun->year;
           }
           else{
               $years= '';
           }
       }
       else{

           $years = '';
       }

       //SPM
       $spm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'SPM')->where('status', true)->get();
       $spmyear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'SPM')->where('status', true)->exists();
       if($spmyear){

           $tahunspm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'SPM')->where('year', '!=', NULL)->exists();
           if($tahunspm){
           $tahunSPM = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'SPM')->where('year', '!=', NULL)->first();
           $yearsspm = $tahunSPM->year;
           }
           else{
               $yearsspm= '';
           }
       }
       else{

           $yearsspm = '';
       }

        //STPM
        $stpm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'STPM')->where('status', true)->get();
        $stpmyear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'STPM')->where('status', true)->exists();
        if($stpmyear){
 
            $tahunstpm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'STPM')->where('year', '!=', NULL)->exists();
            if($tahunstpm){
            $tahunSTPM = SubjectGrade::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('type_qualification', 'STPM')->where('year', '!=', NULL)->first();
            $yearsstpm = $tahunSTPM->year;
            }
            else{
                $yearsstpm= '';
            }
        }
        else{
 
            $yearsstpm = '';
        }

        //form 6
        $form6 = ArtInvolve::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('status', true)->get();
         
          //form7
          $form7 = ApplicantExperiences::where('nric', $userdetails->nric)->where('job_id', $intake)->first();

          //form 8
          $form8 = CourseTaken::where('nric', $userdetails->nric)->where('job_id', $intake)->where('status', true)->get();
 
          //form 9 
          $form9 = SponsorDetails::where('nric', $userdetails->nric)->where('job_id', $intake)->first();


         //form 10
         $form10 = ClubActivities::where('nric', $userdetails->nric)->where('job_id',  $intake)->where('status', true)->get();

         //allform
         
        

        return view('components.permohonan-baru', ['breadcrumbs' => $breadcrumbs], 
        compact('email', 'programs', 'program_one_id', 'program_two_id'))->with('kelulusanloop', $kelulusanloop)->with('pmr', $pmr)->with('pmryear', $years)
        ->with('spm', $spm)->with('spmyear', $yearsspm)->with('stpm', $stpm)->with('stpmyear', $yearsstpm)->with('form6', $form6)->with('form8', $form8)
        ->with('form10', $form10)->with('form1', $form1)->with('form2', $form2)->with('form3', $form3)->with('form4', $form4)->with('form44', $form44)->with('form7', $form7)
        ->with('form9', $form9)->with('sarjana', $sarjana)->with('sarjanamuda', $sarjanamuda)->with('diploma', $diploma)->with('kedoktoran', $kedoktoran)
        ->with('sarjana2', $sarjana2)->with('sarjanamuda2', $sarjanamuda2)->with('diploma2', $diploma2)->with('kedoktoran2', $kedoktoran2)->with('programs2', $programs2);
    }

    public function draft_one(Request $req){
        // return $req;
        // $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        // $random_number = rand(10000000,99999999);
        // $no_siri = $random_string.$random_number;

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');
        if($nric != ''){

            $exists = UserDetail::where('nric', $nric)->exists();

            if($exists){

                // $check_siri = UserDetail::where('nric', $nric)->first();

                // if no_siri not exist, then let empty 
                // if($check_siri->no_siri != null || $check_siri->no_siri != ''){
                //     $no_siri = null;
                // }

                try {
                    $save_draft = UserDetail::where('nric', $nric)->where('job_id', $intake)
                    ->update([
                        // 'no_siri' => $no_siri,
                        'nric' => $nric,
                        'name' => $req->name,
                        'short_name' => $req->short_name,
                        'email' => $req->email,
                        'date_of_birth' => $req->date_of_birth,
                        'place_of_birth' => $req->place_of_birth,
                        'race' => $req->race,
                        'address_1' => $req->address_1,
                        'state' => $req->state,
                        'gender' => $req->gender,
                        'birth_cert_no' => $req->birth_cert_no,
                        'nationality' => $req->nationality,
                        'tel_house' => $req->house_no,
                        'phone_no' => $req->phone_no,
                        'dun' => $req->dun,
                        'parliament' => $req->parliament,
                        // 'status_admission' => 'Draft',
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {
                    $detail_sub = new UserDetail;
                    $detail_sub->nric = $nric;
                    $detail_sub->name = $req->name;
                    $detail_sub->short_name = $req->short_name;
                    $detail_sub->date_of_birth = $req->date_of_birth;
                    $detail_sub->place_of_birth = $req->place_of_birth;
                    $detail_sub->race = $req->race;
                    $detail_sub->address_1 = $req->address_1;
                    $detail_sub->state = $req->state;
                    $detail_sub->birth_cert_no = $req->birth_cert_no;
                    $detail_sub->nationality = $req->nationality;
                    $detail_sub->tel_house = $req->tel_house;
                    $detail_sub->nationality = $req->nationality;
                    $detail_sub->phone_no = $req->phone_no;
                    $detail_sub->dun = $req->dun;      
                    $detail_sub->job_id = $intake;
                    $detail_sub->parliament = $req->parliament; 
                    $detail_sub->created_by = $usersession; 
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }

       

       

            // If update is success and DRAFT submission OR PROCESSED submission not exist, then can insert new DRAFT submission
            // Fatin kena update kalau ada lagi status lain selain dari DALAM PROSES, untuk allow new submission

          

        

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 
    }


    public function draft_two(Request $req){
        // return $req;
        // $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        // $random_number = rand(10000000,99999999);
        // $no_siri = $random_string.$random_number;

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';

        $intake = Session::get('variableName');

        if($nric != ''){

            $exists = UserDetailSub::where('nric', $nric)->exists();

            if($exists){
                // if exist update 
                try {
                    $save_draft = UserDetailSub::where('nric', $nric)->where('job_id', $intake)
                    ->update([
                        'status_marriage' => $req->status_marriage,
                        'partner_name' => $req->partner_name,
                        'partner_address_1' => $req->partner_address_1,
                        'partner_no_tel' => $req->partner_no_tel,
                        'partner_no_phonehouse' => $req->partner_no_phonehouse,
                        'guardian_name' => $req->guardian_name,
                        'guardian_nric_old' => $req->guardian_nric_old,
                        'guardian_nric_new' => $req->guardian_nric_new,
                        'guardian_no_tel' => $req->guardian_no_tel,
                        'guardian_no_phonehouse' => $req->guardian_no_phonehouse,
                        'guardian_address_1' => $req->guardian_address_1,
                        'guardian_email' => $req->guardian_email,
                        'guardian_income' => $req->guardian_income,
                        'guardian_occupation' => $req->guardian_occupation,
                        'number_of_dependents' => $req->guardian_dependent,
                        'relationship_guardian' => $req->relationship_guardian,
                        'kin_name' => $req->kin_name,
                        'kin_relationship' => $req->kin_relationship,
                        'kin_no_tel' => $req->kin_no_tel,
                        'kin_no_phonehouse' => $req->kin_no_phonehouse,
                        'kin_email' => $req->kin_email,
                        'kin_address_1' => $req->kin_address_1,
                        'job_id' => $intake,
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {
                    $detail_sub = new UserDetailSub;
                    $detail_sub->nric = $nric;
                    $detail_sub->status_marriage = $req->status_marriage;
                    $detail_sub->partner_name = $req->partner_name;
                    $detail_sub->partner_address_1 = $req->partner_address_1;
                    $detail_sub->partner_no_tel = $req->partner_no_tel;
                    $detail_sub->partner_no_phonehouse = $req->partner_no_phonehouse;
                    $detail_sub->guardian_name = $req->guardian_name;
                    $detail_sub->guardian_nric_old = $req->guardian_nric_old;
                    $detail_sub->guardian_nric_new = $req->guardian_nric_new;
                    $detail_sub->guardian_no_tel = $req->guardian_no_tel;
                    $detail_sub->guardian_no_phonehouse = $req->guardian_no_phonehouse;
                    $detail_sub->guardian_address_1 = $req->guardian_address_1;
                    $detail_sub->guardian_email = $req->guardian_email;
                    $detail_sub->guardian_income = $req->guardian_income;
                    $detail_sub->guardian_occupation = $req->guardian_occupation;
                    $detail_sub->number_of_dependents = $req->number_of_dependents;
                    $detail_sub->relationship_guardian = $req->relationship_guardian;
                    $detail_sub->kin_name = $req->kin_name;
                    $detail_sub->kin_relationship = $req->kin_relationship;
                    $detail_sub->kin_no_tel = $req->kin_no_tel;
                    $detail_sub->kin_no_phonehouse = $req->kin_no_phonehouse;
                    $detail_sub->kin_email = $req->kin_email;
                    $detail_sub->job_id = $intake;
                    $detail_sub->kin_address_1 = $req->kin_address_1;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 
    }

    public function draft_three(Request $req){

        $usersession = auth()->user()->id;
        $type = $req->type_program_applied;
        $program_one = $req->program_one;
        $program_two = $req->program_two;
        $pengajian = $req->pengajian;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');

        $application = SubmitApplication::where('nric', $nric)
                                        ->where('all_status', 'DRAFT')
                                        ->orWhere('all_status', 'DALAM PROSES')
                                        ->first();

        // update study mode
        $save_draft = SubmitApplication::where('nric', $nric)
                                        ->where('job_id', $intake)
                                        ->update([
                                            'study_mode' => $type,
                                            'pengajian' => $pengajian,
                                            ]);

        $check_program_one = ProgramApplied::where('nric', $nric)->where('job_id', $intake)
                                            ->where('sequence', 'program_one')->exists();

        if(!$check_program_one){
            if($program_one != ''){
                $program_applied = new ProgramApplied;
                $program_applied->nric = $nric;
                $program_applied->job_id = $intake;
                $program_applied->program_id = $program_one;
                $program_applied->sequence = 'program_one';
                $program_applied->created_by = $usersession;
                $program_applied->modified_by = $usersession;
                $program_applied->save();
            }
        }else{
            // If exist, update data 
            $save_one = ProgramApplied::where('nric', $nric)
                                        ->where('job_id', $intake)
                                        ->where('sequence', 'program_one')
                                        ->update([
                                            'program_id' => $program_one,
                                            ]);
        }

        $check_program_two = ProgramApplied::where('nric', $nric)->where('job_id', $intake)
                                            ->where('sequence', 'program_two')->exists();
        
        if(!$check_program_two){
            if($program_two != ''){
                $program_applied = new ProgramApplied;
                $program_applied->nric = $nric;
                $program_applied->program_id = $program_two;
                $program_applied->job_id = $intake;
                $program_applied->sequence = 'program_two';
                $program_applied->created_by = $usersession;
                $program_applied->modified_by = $usersession;
                $program_applied->save();
            }
        }else{
            // If exist, update data 
            $save_two = ProgramApplied::where('nric', $nric)
                                        ->where('job_id', $intake)
                                        ->where('sequence', 'program_two')
                                        ->update([
                                            'program_id' => $program_two,
                                            ]);
        }

        $data = [
            'status' => 'success',
            'code' => $code,
            'description' => 'draft successfully submitted',
        ];

        return $data; 

    }

    public function draft_empat(Request $req){
        // return $req;
        // $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        // $random_number = rand(10000000,99999999);
        // $no_siri = $random_string.$random_number;

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');

        //Muet Result
        if($nric != ''){

            $exists = MuetResult::where('nric', $nric)->where('job_id', $intake)->exists();

            if($exists){
                // if exist update 
                try {
                    $save_draft = MuetResult::where('nric', $nric)->where('job_id', $intake)
                    ->update([
                        'year_muet' => $req->year_muet,
                        'grade' => $req->place_muet,
                        'speaking_grade' => $req->speaking_grade,
                        'reading_grade' => $req->reading_grade,
                        'writing_grade' => $req->writing_grade,
                        'band' => $req->band,
                        'job_id' => $intake,
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {

                    $detail_sub = new MuetResult;
                    $detail_sub->nric = $nric;
                    $detail_sub->year_muet = $req->year_muet;
                    $detail_sub->grade = $req->place_muet;
                    $detail_sub->speaking_grade = $req->speaking_grade;
                    $detail_sub->reading_grade = $req->reading_grade;
                    $detail_sub->writing_grade = $req->writing_grade;
                    $detail_sub->band = $req->band;
                    $detail_sub->job_id = $intake;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }

         //Sijil Kelulusan
         if($nric != ''){

            $exists1 = ApplicantExperiences::where('nric', $nric)->where('job_id', $intake)->exists();

            if($req->cert_related_program == "Ada Sijil"){

                $sijilprogram = $req->cert_related_program;
            }
            else{

                $sijilprogram ="Tiada";
            }

            if($req->work_exp_related_program == "Ada Sijil"){

                $expkerja = $req->work_exp_related_program;
            }
            else{

                $expkerja ="Tiada";
            }

            if($exists1){
                // if exist update 
                try {
                    $save_draft = ApplicantExperiences::where('nric', $nric)->where('job_id', $intake)
                    ->update([
                        'cert_related_program' =>  $sijilprogram,
                        'description_cert' => $req->description_cert,
                        'work_exp_related_program' => $expkerja,
                        'description_work_exp' => $req->description_work_exp,
                        'job_id' => $intake,
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {

                    $detail_sub = new ApplicantExperiences;
                    $detail_sub->nric = $nric;
                    $detail_sub->cert_related_program = $sijilprogram;
                    $detail_sub->description_cert = $req->description_cert;
                    $detail_sub->work_exp_related_program = $expkerja;
                    $detail_sub->description_work_exp = $req->description_work_exp;
                    $detail_sub->job_id = $intake;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }


        //loop update

        if(!empty($req->id)){

            for($i=0; $i < count($req->id); $i++){

                if(empty($req->institusidisplay[$i]) && empty($req->gradedisplay[$i]) && empty($req->khususdisplay[$i]) && empty($req->tahundisplay[$i])){
                
                    $save_draft = QualificationPermohonan::where('permohonan_id', $req->id[$i])
                    ->update([
                        'status' => false,    
                        ]);
               
                }
                else{
                   

                        $save_draft = QualificationPermohonan::where('permohonan_id', $req->id[$i])
                        ->update([
                            'institution_others_qc' => $req->institusidisplay[$i],
                            'grade_others_qc' => $req->gradedisplay[$i],
                            'specialization_others_qc' => $req->khususdisplay[$i],
                            'year_others_qc' => $req->tahundisplay[$i],          
                            ]);
                }

            }
            
        }

        //Loop Kelulusan submit



        if($nric != ''){

          
                try {
                    
if(!empty($req->institution) || !empty($req->grade) || !empty($req->specialization) || !empty($req->year) ){
                    
                    for($i=0; $i < count($req->institution); $i++){

                    $wujud = QualificationPermohonan::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('sequence', $req->index[$i])->exists();
                    
                    if(!$wujud){
                        
                    $detail_sub = new QualificationPermohonan;
                    $detail_sub->nric = $nric;
                    $detail_sub->institution_others_qc = $req->institution[$i];
                    $detail_sub->grade_others_qc = $req->grade[$i];
                    $detail_sub->specialization_others_qc = $req->specialization[$i];
                    $detail_sub->year_others_qc = $req->year[$i];
                    $detail_sub->sequence = $req->index[$i];
                    $detail_sub->job_id = $intake;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                    }
                }
                   
                
            }    

                } catch (exception $e) {
                    $code = '001';
                }
            
            
        }else{
            $code = '002';
        }

        

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 
    }

    public function draft_lima(Request $req){

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');
        

        //SPM update
        if(!empty($req->id_spm)){

            for($i=0; $i < count($req->id_spm); $i++){

                if(empty($req->ugrade_spm[$i]) && empty($req->usubject_spm[$i])){

                    $save_draft = SubjectGrade::where('subject_gradeid', $req->id_spm[$i])
                    ->update([
                        'status' => false,
                               
                        ]);

                }

                else{
                $save_draft = SubjectGrade::where('subject_gradeid', $req->id_spm[$i])
                ->update([
                    'subject_list' => $req->usubject_spm[$i],
                    'grade' => $req->ugrade_spm[$i],
                    'year' => $req->year_spm,          
                    ]);
                }
        }
    }
        //SPM submit

        
        if(!empty($req->subject_spm) || !empty($req->grade_spm)){
            for($i=0; $i < count($req->subject_spm); $i++){
              
            $wujudspm = SubjectGrade::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('type_qualification', 'SPM')->where('sequence', $req->index_spm[$i])->exists();
                    
            if(!$wujudspm){    
                
            $detail_sub = new SubjectGrade;
            $detail_sub->nric = $nric;
            $detail_sub->subject_list = $req->subject_spm[$i];
            $detail_sub->grade = $req->grade_spm[$i];
            $detail_sub->type_qualification = "SPM";
            $detail_sub->sequence = $req->index_spm[$i];
            $detail_sub->year = $req->year_spm;
            $detail_sub->job_id = $intake;
            $detail_sub->created_by = $usersession;
            $detail_sub->save();

            }
            }
        }

        //PMR update
        if(!empty($req->id_pmr)){

            for($i=0; $i < count($req->id_pmr); $i++){

                if(empty($req->usubject_pmr[$i]) && empty($req->ugrade_pmr[$i])){

                    $save_draft = SubjectGrade::where('subject_gradeid', $req->id_pmr[$i])
                    ->update([
                        'status' => false,
                               
                        ]);

                }

                else{
                $save_draft = SubjectGrade::where('subject_gradeid', $req->id_pmr[$i])
                ->update([
                    'subject_list' => $req->usubject_pmr[$i],
                    'grade' => $req->ugrade_pmr[$i],
                    'year' => $req->year_pmr,          
                    ]);
                }
        }
    }
        //PMR submit

      
        if(!empty($req->subject_pmr) || !empty($req->grade_pmr)){
            for($k=0; $k < count($req->subject_pmr); $k++){
               
            $wujudpmr = SubjectGrade::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('type_qualification', 'PMR')->where('sequence', $req->index_pmr[$i])->exists();
                    
            if(!$wujudpmr){   
                
            $detail = new SubjectGrade;
            $detail->nric = $nric;
            $detail->subject_list = $req->subject_pmr[$k];
            $detail->grade = $req->grade_pmr[$k];
            $detail->type_qualification = "PMR";
            $detail->year = $req->year_pmr;
            $detail_sub->job_id = $intake;
            $detail->sequence = $req->index_pmr[$k];
            $detail->created_by = $usersession;
            $detail->save();

            
            }
        }
    }
        
         

          //STPM update
          if(!empty($req->id_stpm)){

            for($k=0; $k < count($req->id_stpm); $k++){
                if(empty($req->usubject_stpm[$k]) && empty($req->ugrade_stpm[$k])){

                    $save_draft = SubjectGrade::where('subject_gradeid', $req->id_stpm[$k])
                    ->update([
                        'status' => false,
                               
                        ]);

                }
                else{

                $save_draft = SubjectGrade::where('subject_gradeid', $req->id_stpm[$k])
                ->update([
                    'subject_list' => $req->usubject_stpm[$k],
                    'grade' => $req->ugrade_stpm[$k],
                    'year' => $req->year_stpm,          
                    ]);
                }

        }
    }
    
        //STPM submit

       
        if(!empty($req->subject_stpm) || !empty($req->grade_stpm)){
            for($l=0; $l < count($req->subject_stpm); $l++){

                $wujudstpm = SubjectGrade::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('type_qualification', 'STPM')->where('sequence', $req->index_stpm[$l])->exists();
                    
                if(!$wujudstpm){   
                
            $details = new SubjectGrade;
            $details->nric = $nric;
            $details->subject_list = $req->subject_stpm[$l];
            $details->grade = $req->grade_stpm[$l];
            $details->type_qualification = "STPM";
            $details->year = $req->year_stpm;
            $details->sequence = $req->index_stpm[$l];
            $detail_sub->job_id = $intake;
            $details->created_by = $usersession;
            $details->save();

            
            }
        }
    }

        
       



        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 

    }

    public function draft_enam(Request $req){

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');
        //form6
        if(!empty($req->id_form6)){

            for($i=0; $i < count($req->id_form6); $i++){

                if(empty($req->uarea_involvement[$i]) && empty($req->uorganizer[$i]) && empty($req->uyear_involvement[$i])){

                    $save_draft = ArtInvolve::where('art_id', $req->id_form6[$i])
                    ->update([
                        'status' => false,
                               
                        ]);

                }
                else{

                $save_draft = ArtInvolve::where('art_id', $req->id_form6[$i])
                ->update([
                    'area_involvement' => $req->uarea_involvement[$i],
                    'organizer' => $req->uorganizer[$i],
                    'year_involvement' => $req->uyear_involvement[$i],          
                    ]);
                }

        }
    }
        //form6

        if(!empty($req->area_involvement) || !empty($req->organizer) || !empty($req->year_involvement)){

            for($i=0; $i < count($req->area_involvement); $i++){

                $wujud = ArtInvolve::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('sequence', $req->index_form6[$i])->exists();
                    
                if(!$wujud){       
                
            $detail_sub = new ArtInvolve();
            $detail_sub->nric = $nric;
            $detail_sub->area_involvement = $req->area_involvement[$i];
            $detail_sub->organizer = $req->organizer[$i];
            $detail_sub->year_involvement = $req->year_involvement[$i];
            $detail_sub->sequence = $req->index_form6[$i];
            $detail_sub->job_id = $intake;
            $detail_sub->created_by = $usersession;
            $detail_sub->save();

            
            }
        }
        }

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 

    }

    public function draft_tujuh(Request $req){

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $year_working = Carbon::parse($req->year_working)->format('Y-m-d');
        $intake = Session::get('variableName');
        if($nric != ''){

            $exists =ApplicantExperiences::where('nric', $nric)->where('job_id', $intake)->exists();

            if($exists){
                // if exist update 
                try {
                    $save_draft = ApplicantExperiences::where('nric', $nric)->where('job_id',$intake)
                    ->update([
                        'job_type' => $req->job_type,
                        'monthly_income' => $req->monthly_income,
                        'year_working' => $year_working,
                        'company_name' => $req->company_name,
                        'company_address' => $req->company_address,
                        'no_faks' => $req->no_faks,
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {

                    $detail_sub = new ApplicantExperiences;
                    $detail_sub->nric = $nric;
                    $detail_sub->job_type = $req->job_type;
                    $detail_sub->monthly_income = $req->monthly_income;
                    $detail_sub->year_working = $year_working;
                    $detail_sub->company_name = $req->company_name;
                    $detail_sub->company_address = $req->company_address;
                    $detail_sub->no_faks = $req->no_faks;
                    $detail_sub->job_id = $intake;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }
        
        
    

    switch ($code) {
        case '001':
            $data = [
                'status' => 'failed',
                'code' => $code,
                'description' => 'draft failed to be saved',
            ];
            break;
        case '002':
            $data = [
                'status' => 'failed',
                'code' => $code,
                'description' => 'NRIC not exist!',
            ];
            break;
        default:
            $data = [
                'status' => 'success',
                'code' => $code,
                'description' => 'draft successfully submitted',
            ];
            break;
    }

    return $data; 

    }

    public function draft_lapan(Request $req){

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');
        //lapan update
        if(!empty($req->id_form8)){

            for($i=0; $i < count($req->id_form8); $i++){

                if(empty($req->ucourse_taken[$i]) && empty($req->ucourse_organizer[$i]) && empty($req->uplace_taken[$i]) && empty($req->uyear_taken[$i])){

                    $save_draft = CourseTaken::where('course_takenid', $req->id_form8[$i])
                    ->update([
                        'status' => false,
                               
                        ]);

                }
                else{

                $save_draft = CourseTaken::where('course_takenid', $req->id_form8[$i])
                ->update([
                    'course_taken' => $req->ucourse_taken[$i],
                    'course_organizer' => $req->ucourse_organizer[$i],
                    'place_taken' => $req->uplace_taken[$i],   
                    'year_taken' => $req->uyear_taken[$i],        
                    ]);
                }

        }
    }
        //lapan

        if(!empty($req->course_taken) || !empty($req->course_organizer) || !empty($req->place_taken) || !empty($req->year_taken)){

            for($i=0; $i < count($req->course_taken); $i++){

                $wujud = CourseTaken::where('nric', $nric)->where('job_id',$intake)->where('status', true)->where('sequence', $req->index_form8[$i])->exists();
                    
                if(!$wujud){   
                
            $detail_sub = new CourseTaken();
            $detail_sub->nric = $nric;
            $detail_sub->course_taken = $req->course_taken[$i];
            $detail_sub->course_organizer = $req->course_organizer[$i];
            $detail_sub->place_taken = $req->place_taken[$i];
            $detail_sub->year_taken = $req->year_taken[$i];
            $detail_sub->sequence = $req->index_form8[$i];
            $detail_sub->job_id = $intake;
            $detail_sub->created_by = $usersession;
            $detail_sub->save();

                }
            }
        }

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 

    }

    public function draft_sembilan(Request $req){

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $date_offer = Carbon::parse($req->date_offer)->format('Y-m-d');
        $intake = Session::get('variableName');
        if($nric != ''){

            $exists =SponsorDetails::where('nric', $nric)->where('job_id', $intake)->exists();

            if($exists){
                // if exist update 
                try {
                    $save_draft = SponsorDetails::where('nric', $nric)->where('job_id', $intake)
                    ->update([
                        'sponsorship' => $req->sponsorship,
                        'address_sponsorship' => $req->address_sponsorship,
                        'date_offer' => $date_offer,
                        'type_sponsorship' => $req->type_sponsorship,
                        'reference_no_spsp' => $req->reference_no_spsp,
                        'monthly_amount_spsp' => $req->monthly_amount_spsp,
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{

                // if not exist create  

                try {

                    $detail_sub = new SponsorDetails;
                    $detail_sub->nric = $nric;
                    $detail_sub->sponsorship = $req->sponsorship;
                    $detail_sub->address_sponsorship = $req->address_sponsorship;
                    $detail_sub->date_offer = $date_offer;
                    $detail_sub->type_sponsorship = $req->type_sponsorship;
                    $detail_sub->reference_no_spsp = $req->reference_no_spsp;
                    $detail_sub->monthly_amount_spsp = $req->monthly_amount_spsp;
                    $detail_sub->job_id = $intake;
                    $detail_sub->created_by = $usersession;
                    $detail_sub->save();

                } catch (exception $e) {
                    $code = '001';
                }
            }
            
        }else{
            $code = '002';
        }
        
        
    

    switch ($code) {
        case '001':
            $data = [
                'status' => 'failed',
                'code' => $code,
                'description' => 'draft failed to be saved',
            ];
            break;
        case '002':
            $data = [
                'status' => 'failed',
                'code' => $code,
                'description' => 'NRIC not exist!',
            ];
            break;
        default:
            $data = [
                'status' => 'success',
                'code' => $code,
                'description' => 'draft successfully submitted',
            ];
            break;
    }

    return $data; 

    }

    public function draft_sepuluh(Request $req){
        $currentdt = date('Y-m-d H:i:s');
        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';
        $intake = Session::get('variableName');
        $application = SubmitApplication::where('nric', $nric)->where('job_id', $intake)
        ->where('all_status', 'DRAFT')
        ->orWhere('all_status', 'DALAM PROSES')
        ->first();

        //save status

        $nosiri = SubmitApplication::where('job_id', $intake)->where('nric', $nric)->first();

        $audit = new Audit;
        $audit->nric = $nric;
        $audit->no_siri = $nosiri->no_siri;
        $audit->penerangan = 'Permohonan Dihantar';
        $audit->tarikh_audit = $currentdt;
        $audit->created_by = $usersession;
        $audit->save();

        $status = SubmitApplication::where('job_id', $intake)->where('nric', $nric)
                ->update([
                    'all_status' => 'BELUM DISAHKAN',
                    'status_global' => 'BELUM DISAHKAN',
                    'status_validation' => 'DALAM PROSES',
                    'submit_permohonan' => $currentdt
                    
                    ]);

        //form10
        if(!empty($req->id_form10)){

            for($i=0; $i < count($req->id_form10); $i++){
                if(empty($req->uclub[$i]) && empty($req->urole[$i]) && empty($req->uyear_takenclub[$i])){

                    $save_draft = ClubActivities::where('club_id', $req->id_form10[$i])
                    ->update([
                        'status' => false,
                               
                        ]);

                }
                else{

                $save_draft = ClubActivities::where('club_id', $req->id_form10[$i])
                ->update([
                    'club' => $req->uclub[$i],
                    'role' => $req->urole[$i],
                    'year_taken' => $req->uyear_takenclub[$i],          
                    ]);
                }
        }
    }
        //form10

        if(!empty($req->club) || !empty($req->role) || !empty($req->year_takenclub)){

            for($i=0; $i < count($req->club); $i++){

                $wujud = ClubActivities::where('nric', $nric)->where('job_id', $intake)->where('status', true)->where('sequence', $req->index_form10[$i])->exists();
                    
                if(!$wujud){   
                
            $detail_sub = new ClubActivities();
            $detail_sub->nric = $nric;
            $detail_sub->club = $req->club[$i];
            $detail_sub->role = $req->role[$i];
            $detail_sub->year_taken = $req->year_takenclub[$i];
            $detail_sub->sequence = $req->index_form10[$i];
            $detail_sub->job_id = $intake;
            $detail_sub->created_by = $usersession;
            $detail_sub->save();

            
            }
        }
    }

        switch ($code) {
            case '001':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'draft failed to be saved',
                ];
                break;
            case '002':
                $data = [
                    'status' => 'failed',
                    'code' => $code,
                    'description' => 'NRIC not exist!',
                ];
                break;
            default:
                $data = [
                    'status' => 'success',
                    'code' => $code,
                    'description' => 'draft successfully submitted',
                ];
                break;
        }

        return $data; 

    }

    public function returnpage(Request $req){

        return redirect()->route('regis_all');
    }



    public function add_permohonan(Request $req){

        // $data = $req->input();

        $param = [
            'nric' => $req->nric,
            'no_siri' => $req->no_siri,
            'name' => $req->name,
            'short_name' => $req->short_name,
            'email' => $req->email,
            'date_of_birth' => $req->date_of_birth,
            'place_of_birth' => $req->place_of_birth,
            'race' => $req->race,
            'address_1' => $req->address_1,
            'state' => $req->state,
            'gender' => $req->gender,
            'birth_cert_no' => $req->birth_cert_no,
            'nationality' => $req->nationality,
            'tel_house' => $req->tel_house,
            'phone_no' => $req->phone_no,
            'parliament' => $req->parliament,
            'payment_ref_no' => $req->payment_ref_no,
            'form_description' => $req->form_description,
            'form_completion' => $req->form_completion,
            'description' => $req->description,
            'type_program_applied' => $req->type_program_applied,
            'date_application' => $req->date_application,
            'date_acceptance' => $req->date_acceptance,
            'status_marriage' => $req->status_marriage,
            'partner_name' => $req->partner_name,
            'partner_no_tel' => $req->partner_address_1,
            'partner_no_phonehouse' => $req->partner_no_phonehouse,
            'guardian_name' => $req->guardian_name,
            'guardian_nric_old' => $req->guardian_nric_old,
            'guardian_nric_new' => $req->guardian_nric_new,
            'guardian_no_tel' => $req->guardian_no_tel,
            'guardian_no_phonehouse' => $req->guardian_no_phonehouse,
            'guardian_address_1' => $req->guardian_address_1,
            'guardian_email' => $req->guardian_email,
            'guardian_income' => $req->guardian_income,
            'guardian_occupation' => $req->guardian_occupation,
            'number_of_dependents' => $req->number_of_dependents,
            'relationship_guardian' => $req->relationship_guardian,
            'kin_name' => $req->kin_name,
            'kin_relationship' => $req->kin_relationship,
            'kin_no_tel' => $req->kin_no_tel,
            'kin_no_phonehouse' => $req->kin_no_phonehouse,
            'kin_email' => $req->kin_email,
            'kin_address_1' => $req->kin_address_1,
            'program_name' => $req->program_name,
            'year_pmr' => $req->year_pmr,
            'subject_pmr' => $req->subject_pmr,
            'grade_pmr' => $req->grade_pmr,
            'year_spm' => $req->year_spm,
            'subject_spm' => $req->subject_spm,
            'grade_spm' => $req->grade_spm,
            'year_stpm' => $req->year_stpm,
            'subject_stpm' => $req->subject_stpm,
            'grade_stpm' => $req->grade_stpm,
            'year_muet' => $req->year_muet,
            'place_muet' => $req->place_muet,
            'speaking_grade' => $req->speaking_grade,
            'reading_grade' => $req->reading_grade,
            'writing_grade' => $req->writing_grade,
            'band' => $req->band,
            'institution_others_qc' => $req->institution_others_qc,
            'grade_others_qc' => $req->grade_others_qc,
            'specialization_others_qc' => $req->specialization_others_qc,
            'year_others_qc' => $req->year_others_qc,
            'job_type' => $req->job_type,
            'monthly_income' => $req->monthly_income,
            'year_working' => $req->year_working,
            'company_name' => $req->company_name,
            'company_address' => $req->company_address,
            'no_faks' => $req->no_faks,
            'description_cert' => $req->description_cert,
            'work_exp_related_program' => $req->work_exp_related_program,
            'description_work_exp' => $req->description_work_exp,
            'area_involvement' => $req->area_involvement,
            'organizer' => $req->organizer,
            'year_involvement' => $req->year_involvement,
            'sponsorship' => $req->sponsorship,
            'address_sponsorship' => $req->address_sponsorship,
            'type_sponsorship' => $req->type_sponsorship,
            'reference_no_spsp' => $req->reference_no_spsp,
            'date_offer' => $req->date_offer,
            'monthly_amount_spsp' => $req->monthly_amount_spsp,
            'club' => $req->club,
            'role' => $req->role,
            'year_taken' => $req->year_taken,
            'course_taken' => $req->course_taken,
            'course_organizer' => $req->course_organizer,
            'place_taken' => $req->place_taken,
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/program", 'name' => "Tetapan Program"], ['name' => "Butiran Program"]
        ];

        $request = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . getenv('APP_TOKEN')
        ])->post(getenv('ENDPOINT').'/api/add_permohonan', $param);

        

    }

    public function butiran($code){

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Permohonan"], ['name' => "Permohonan Baru"]
        ];

        $code = decrypt($code);
        // $request = Request::create('/api/display_allprogram', 'GET');
        // $response = Route::dispatch($request);

        // $request->headers->set('Content-Type', 'application/json');
        // $request->headers->set('Authorization', 'Bearer ' . getenv('APP_TOKEN'));
        
        // $responseBody = json_decode($response->getContent(), true);

        // $datas = $responseBody['data'];

        // return view('components.program-setting', ['breadcrumbs' => $breadcrumbs], compact('datas'));

        $email = auth()->user()->email;

        
        $programs = Offerprogram::join('program', 'program.program_id', '=', 'offerprogram.program_id')->where('offerprogram.status_aktif', 'Aktif')->get();

        $userdetails = SubmitApplication::where('nric', $code)->first();
           
        $intake = Session::get('variableName');
        //form1

        $form1 = UserDetail::join('all_status_permohonan','all_status_permohonan.nric', '=','user_details.nric')->where('user_details.nric', $code)->where('user_details.job_id', $intake)->first();


         //form2

         $form2 = UserDetailSub::where('nric', $code)->where('job_id', $intake)->first();


         //form3
         
         $form3 = SubmitApplication::where('nric', $code)->where('job_id', $intake)->first();


        $check_one = ProgramApplied::where('nric', $code)->where('job_id', $intake)
                                    ->where('sequence', 'program_one')->exists();
        $program_one_id = "NOT_EXIST";
        
        if($check_one){
            $applied_program_one = ProgramApplied::where('nric', $code)->where('job_id', $intake)
                                            ->where('sequence', 'program_one')->first();                                   
            $program_one_id = $applied_program_one->program_id;
        }
        

        $check_two = ProgramApplied::where('nric', $code)->where('job_id', $intake)
                                    ->where('sequence', 'program_two')->exists();
        $program_two_id = 'NOT_EXIST';

        if($check_two){
            $applied_program_two = ProgramApplied::where('nric', $code)->where('job_id', $intake)
                                            ->where('sequence', 'program_two')->first();
            $program_two_id = $applied_program_two->program_id;
        }

         

         
        //form 4
        $form4 = MuetResult::where('nric', $userdetails->nric)->where('job_id', $intake)->first();
        $form44 = ApplicantExperiences::where('nric', $userdetails->nric)->where('job_id', $intake)->first();

        //kelulusanloop
        $kelulusanloop = QualificationPermohonan::where('nric', $userdetails->nric)->where('job_id', $intake)->where('status', true)->get();

       //PMR
       $pmr = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'PMR')->where('status', true)->get();
       $pmryear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'PMR')->where('status', true)->exists();
       if($pmryear){

           $tahunpmr = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'PMR')->where('year', '!=', NULL)->exists();
           if($tahunpmr){
           $tahun = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'PMR')->where('year', '!=', NULL)->first();
           $years = $tahun->year;
           }
           else{
               $years= '';
           }
       }
       else{

           $years = '';
       }

       //SPM
       $spm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'SPM')->where('status', true)->get();
       $spmyear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'SPM')->where('status', true)->exists();
       if($spmyear){

           $tahunspm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'SPM')->where('year', '!=', NULL)->exists();
           if($tahunspm){
           $tahunSPM = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'SPM')->where('year', '!=', NULL)->first();
           $yearsspm = $tahunSPM->year;
           }
           else{
               $yearsspm= '';
           }
       }
       else{

           $yearsspm = '';
       }

        //STPM
        $stpm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'STPM')->where('status', true)->get();
        $stpmyear = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'STPM')->where('status', true)->exists();
        if($stpmyear){
 
            $tahunstpm = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'STPM')->where('year', '!=', NULL)->exists();
            if($tahunstpm){
            $tahunSTPM = SubjectGrade::where('nric', $userdetails->nric)->where('job_id', $intake)->where('type_qualification', 'STPM')->where('year', '!=', NULL)->first();
            $yearsstpm = $tahunSTPM->year;
            }
            else{
                $yearsstpm= '';
            }
        }
        else{
 
            $yearsstpm = '';
        }

        //form 6
        $form6 = ArtInvolve::where('nric', $userdetails->nric)->where('job_id', $intake)->where('status', true)->get();

        //form7
        $form7 = ApplicantExperiences::where('nric', $userdetails->nric)->where('job_id', $intake)->first();

         //form 8
         $form8 = CourseTaken::where('nric', $userdetails->nric)->where('job_id', $intake)->where('status', true)->get();

         //form 9 
         $form9 = SponsorDetails::where('nric', $userdetails->nric)->where('job_id', $intake)->first();

         //form 10
         $form10 = ClubActivities::where('nric', $userdetails->nric)->where('job_id', $intake)->where('status', true)->get();

         //allform
         
        

        return view('components.butiran', ['breadcrumbs' => $breadcrumbs], 
        compact('email', 'programs', 'program_one_id', 'program_two_id'))->with('kelulusanloop', $kelulusanloop)->with('pmr', $pmr)->with('pmryear', $years)
        ->with('spm', $spm)->with('spmyear', $yearsspm)->with('stpm', $stpm)->with('stpmyear', $yearsstpm)->with('form6', $form6)->with('form8', $form8)
        ->with('form10', $form10)->with('form1', $form1)->with('form2', $form2)->with('form3', $form3)->with('form4', $form4)->with('form44', $form44)->with('form7', $form7)
        ->with('form9', $form9);
    }

}
