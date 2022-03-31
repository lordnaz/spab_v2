<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
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
use App\Models\StatusPermohonan;
use App\Models\SubjectGrade;
use App\Models\PenawaranPermohonan;
use App\Models\program;

class FE_PermohonanController extends Controller
{
    //
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

        return view('components.permohonan-baru', ['breadcrumbs' => $breadcrumbs], compact('email'));
    }

    public function draft_one(Request $req){
        // return $req;
        // $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        // $random_number = rand(10000000,99999999);
        // $no_siri = $random_string.$random_number;

        $usersession = auth()->user()->name;
        $nric = $req->nric;
        $code = '000';

        if($nric != ''){

            $exists = UserDetail::where('nric', $nric)->exists();

            if($exists){

                $check_siri = UserDetail::where('nric', $nric)->first();

                // if no_siri not exist, then let empty 
                // if($check_siri->no_siri != null || $check_siri->no_siri != ''){
                //     $no_siri = null;
                // }

                try {
                    $save_draft = UserDetail::where('nric', $nric)
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
                        'status_admission' => 'Draft',
                        'created_by' => $usersession,
                        ]);
                }
                catch (exception $e) {
                    $code = '001';
                }

            }else{
                $code = '002';
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


    public function draft_two(Request $req){
        // return $req;
        // $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        // $random_number = rand(10000000,99999999);
        // $no_siri = $random_string.$random_number;

        $usersession = auth()->user()->id;
        $nric = $req->nric;
        $code = '000';

        if($nric != ''){

            $exists = UserDetailSub::where('nric', $nric)->exists();

            if($exists){
                // if exist update 
                try {
                    $save_draft = UserDetailSub::where('nric', $nric)
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

}
