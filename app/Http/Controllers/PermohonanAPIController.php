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

class PermohonanAPIController extends Controller
{
    public function new_permohonan(Request $req){

    $user_id = auth()->User()->name;

    $addapplicant = new user_details;
    $addapplicant->user_id = $req->user_id;
    $addapplicant->nric = $req->nric;
    $addapplicant->name = $req->name;
    $addapplicant->short_name = $req->short_name;
    $addapplicant->email = $req->email;
    $addapplicant->date_of_birth = $req->date_of_birth;
    $addapplicant->place_of_birth = $req->place_of_birth;
    $addapplicant->race = $req->race;
    $addapplicant->address_1 = $req->address_1;
    $addapplicant->state = $req->state;
    $addapplicant->gender = $req->gender;
    $addapplicant->birth_cert_no = $req->birth_cert_no;
    $addapplicant->nationality = $req->nationality;
    $addapplicant->tel_house = $req->tel_house;
    $addapplicant->phone_no = $req->phone_no;
    $addapplicant->parliament = $req->parliament;
    $addapplicant->payment_ref_no = $req->payment_ref_no;
    $addapplicant->form_description = $req->form_description;
    $addapplicant->form_completion = $req->form_completion;
    $addapplicant->description = $req->description;
    $addapplicant->status_admission = $req->status_admission;
    $addapplicant->type_program_applied = $req->type_program_applied;
    $addapplicant->date_application = $req->date_application;
    $addapplicant->date_acceptance = $req->date_acceptance;
    $addapplicant->created_by = $user_id;
    $addapplicant->modified_by = $user_id;
    $addapplicant->save();

    $addapplicant2 = new applicant_details_sub;
    $addapplicant2->nric = $req->nric;
    $addapplicant2->status_marriage = $req->status_marriage;
    $addapplicant2->partner_name = $req->partner_name;
    $addapplicant2->partner_address_1 = $req->partner_address_1;
    $addapplicant2->partner_no_tel = $req->partner_no_tel;
    $addapplicant2->partner_no_phonehouse = $req->partner_no_phonehouse;
    $addapplicant2->guardian_name = $req->guardian_name;
    $addapplicant2->guardian_nric_old = $req->guardian_nric_old;
    $addapplicant2->guardian_nric_new = $req->guardian_nric_new;
    $addapplicant2->guardian_no_tel = $req->guardian_no_tel;
    $addapplicant2->guardian_no_phonehouse = $req->guardian_no_phonehouse;
    $addapplicant2->guardian_address_1 = $req->guardian_address_1;
    $addapplicant2->guardian_email = $req->guardian_email;
    $addapplicant2->guardian_income = $req->guardian_income;
    $addapplicant2->relationship = $req->relationship;
    $addapplicant2->guardian_occupation = $req->guardian_occupation;
    $addapplicant2->number_of_dependents = $req->number_of_dependents;
    $addapplicant2->relationship_guardian = $req->relationship_guardian;
    $addapplicant2->kin_name = $req->kin_name;
    $addapplicant2->kin_relationship = $req->kin_relationship;
    $addapplicant2->kin_no_tel = $req->kin_no_tel;
    $addapplicant2->kin_no_phonehouse = $req->kin_no_phonehouse;
    $addapplicant2->kin_email = $req->kin_email;
    $addapplicant2->kin_address_1 = $req->kin_address_1;
    $addapplicant2->created_by = $user_id;
    $addapplicant2->modified_by = $user_id;
    $addapplicant2->save();

    $programapply = new program_applied;
    $programapply->nric = $req->nric;
    $programapply->program_name = $req->program_name;
    $programapply->created_by = $user_id;
    $programapply->modified_by = $user_id;;
    $programapply->save();

    $pmr = new subject_grade;
    $pmr->nric = $req->nric;
    $pmr->subject_list = $req->subject_pmr;
    $pmr->grade = $req->grade_pmr;
    $pmr->type_qualification = $req->type_pmr;
    $pmr->created_by = $user_id;
    $pmr->modified_by = $user_id;;
    $pmr->save();

    $spm = new subject_grade;
    $spm->nric = $req->nric;
    $spm->subject_list = $req->subject_spm;
    $spm->grade = $req->grade_spm;
    $spm->type_qualification = $req->type_spm;
    $spm->created_by = $user_id;
    $spm->modified_by = $user_id;;
    $spm->save();

    $stpm = new subject_grade;
    $stpm->nric = $req->stpm;
    $stpm->subject_list = $req->subject_stpm;
    $stpm->grade = $req->grade_stpm;
    $stpm->type_qualification = $req->type_stpm;
    $stpm->created_by = $user_id;
    $stpm->modified_by = $user_id;;
    $stpm->save();

    $muet = new muet_result;
    $muet->nric = $req->nric;
    $muet->year_muet = $req->year_muet;
    $muet->grade = $req->grade;
    $muet->speaking_grade = $req->speaking_grade;
    $muet->reading_grade = $req->reading_grade;
    $muet->writing_grade = $req->writing_grade;
    $muet->band = $req->band;
    $muet->created_by = $user_id;
    $muet->modified_by = $user_id;;
    $muet->save();

    $qualification = new qualification;
    $qualification->nric = $req->nric;
    $qualification->institution_others_qc = $req->institution_others_qc;
    $qualification->grade_others_qc = $req->grade_others_qc;
    $qualification->specialization_others_qc = $req->specialization_others_qc;
    $qualification->year_others_qc = $req->year_others_qc;
    $qualification->created_by = $user_id;
    $qualification->modified_by = $user_id;;
    $qualification->save();

    $experience = new applicant_experiences;
    $experience->nric = $req->nric;
    $experience->job_type = $req->job_type;
    $experience->monthly_income = $req->monthly_income;
    $experience->year_working = $req->year_working;
    $experience->company_name = $req->company_name;
    $experience->company_address = $req->company_address;
    $experience->no_faks = $req->no_faks;
    $experience->cert_related_program = $req->cert_related_program;
    $experience->description_cert = $req->description_cert;
    $experience->work_exp_related_program = $req->work_exp_related_program;
    $experience->description_work_exp = $req->description_work_exp;
    $experience->created_by = $user_id;
    $experience->modified_by = $user_id;;
    $experience->save();
    
    $artinvolvement = new art_involvements;
    $artinvolvement->nric = $req->nric;
    $artinvolvement->area_involvement = $req->area_involvement;
    $artinvolvement->organizer = $req->organizer;
    $artinvolvement->year_involvement = $req->year_involvement;
    $artinvolvement->created_by = $user_id;
    $artinvolvement->modified_by = $user_id;;
    $artinvolvement->save();

    $sponsorship = new sponsorship_details;
    $sponsorship->nric = $req->nric;
    $sponsorship->sponsorship = $req->sponsorship;
    $sponsorship->address_sponsorship = $req->address_sponsorship;
    $sponsorship->type_srponsorship = $req->type_srponsorship;
    $sponsorship->reference_no_spsp = $req->reference_no_spsp;
    $sponsorship->date_offer = $req->date_offer;
    $sponsorship->monthly_amount_spsp = $req->monthly_amount_spsp;
    $sponsorship->created_by = $user_id;
    $sponsorship->modified_by = $user_id;;
    $sponsorship->save();

    $club = new club_activities;
    $club->nric = $req->nric;
    $club->club = $req->club;
    $club->role = $req->role;
    $club->year_taken = $req->year_taken;
    $club->created_by = $user_id;
    $club->modified_by = $user_id;;
    $club->save();

    $course = new course_taken;
    $course->nric = $req->nric;
    $course->course_taken = $req->course_taken;
    $course->organizer = $req->organizer;
    $course->place_taken = $req->place_taken;
    $course->created_by = $user_id;
    $course->modified_by = $user_id;;
    $course->save();

    $status = new all_status_permohonan;
    $status->nric = $req->nric;
    $status->status_validation = $req->status_validation;
    $status->modified_by_validation = $req->modified_by_validation;
    $status->status_offer = $req->status_offer;
    $status->modified_by_offer = $req->modified_by_offer;
    $status->save();

    $data = [
        'status' => 'success',
        'code' => '000',
        'description' => 'successful'
    ];

    return response()->json($data);
    }
}
