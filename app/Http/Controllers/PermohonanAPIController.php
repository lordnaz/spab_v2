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
    public function add_permohonan(Request $req)
    {

        $user_id = auth()->User()->name;

        $addapplicant = new UserDetail;
        $addapplicant->no_siri = $req->no_siri;
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
        $addapplicant->status_admission = 'Daftar';
        $addapplicant->type_program_applied = $req->type_program_applied;
        $addapplicant->date_application = $req->date_application;
        $addapplicant->date_acceptance = $req->date_acceptance;
        $addapplicant->created_by = $user_id;
        $addapplicant->modified_by = $user_id;
        $addapplicant->save();

        $addapplicant2 = new UserDetailSub;
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

        $programapply = new ProgramApplied;
        $programapply->nric = $req->nric;
        $programapply->program_name = $req->program_name;
        $programapply->created_by = $user_id;
        $programapply->modified_by = $user_id;;
        $programapply->save();

        $pmr = new SubjectGrade;
        $pmr->nric = $req->nric;
        $pmr->subject_list = $req->subject_pmr;
        $pmr->grade = $req->grade_pmr;
        $pmr->type_qualification = $req->type_pmr;
        $pmr->created_by = $user_id;
        $pmr->modified_by = $user_id;;
        $pmr->save();

        $spm = new SubjectGrade;
        $spm->nric = $req->nric;
        $spm->subject_list = $req->subject_spm;
        $spm->grade = $req->grade_spm;
        $spm->type_qualification = $req->type_spm;
        $spm->created_by = $user_id;
        $spm->modified_by = $user_id;;
        $spm->save();

        $stpm = new SubjectGrade;
        $stpm->nric = $req->stpm;
        $stpm->subject_list = $req->subject_stpm;
        $stpm->grade = $req->grade_stpm;
        $stpm->type_qualification = $req->type_stpm;
        $stpm->created_by = $user_id;
        $stpm->modified_by = $user_id;;
        $stpm->save();

        $muet = new MuetResult;
        $muet->nric = $req->nric;
        $muet->year_muet = $req->year_muet;
        $muet->grade = $req->grade_muet;
        $muet->speaking_grade = $req->speaking_grade;
        $muet->reading_grade = $req->reading_grade;
        $muet->writing_grade = $req->writing_grade;
        $muet->band = $req->band;
        $muet->created_by = $user_id;
        $muet->modified_by = $user_id;;
        $muet->save();

        $qualification = new Qualification;
        $qualification->nric = $req->nric;
        $qualification->institution_others_qc = $req->institution_others_qc;
        $qualification->grade_others_qc = $req->grade_others_qc;
        $qualification->specialization_others_qc = $req->specialization_others_qc;
        $qualification->year_others_qc = $req->year_others_qc;
        $qualification->created_by = $user_id;
        $qualification->modified_by = $user_id;;
        $qualification->save();

        $experience = new ApplicantExperiences;
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

        $artinvolvement = new ArtInvolve;
        $artinvolvement->nric = $req->nric;
        $artinvolvement->area_involvement = $req->area_involvement;
        $artinvolvement->organizer = $req->organizer;
        $artinvolvement->year_involvement = $req->year_involvement;
        $artinvolvement->created_by = $user_id;
        $artinvolvement->modified_by = $user_id;;
        $artinvolvement->save();

        $sponsorship = new SponsorDetails;
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

        $club = new ClubActivities;
        $club->nric = $req->nric;
        $club->club = $req->club;
        $club->role = $req->role;
        $club->year_taken = $req->year_taken;
        $club->created_by = $user_id;
        $club->modified_by = $user_id;;
        $club->save();

        $course = new CourseTaken;
        $course->nric = $req->nric;
        $course->course_taken = $req->course_taken;
        $course->organizer = $req->course_organizer;
        $course->place_taken = $req->place_taken;
        $course->created_by = $user_id;
        $course->modified_by = $user_id;;
        $course->save();

        $statuspermohonan = new StatusPermohonan();
        $statuspermohonan->nric = $req->nric;
        $statuspermohonan->status_validation = 'Belum Disahkan';
        $statuspermohonan->save();




        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful'
        ];

        return response()->json($data);
    }

    public function display_permohonan()
    {

        $display = UserDetail::where('status', true)->get();

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
            'data' => $display,
        ];

        return response()->json($data);
    }

    public function delete_permohonan(Request $req)
    {

        $update = UserDetail::where('nric', $req->nric)->update(
            [
                'status' => false,
            ]
        );

        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }

    public function display_permohonanbynric(Request $req)
    {

        $displaybynric = UserDetail::join('applicant_details_sub', 'nric', '=', 'user_details.nric')->join('qualification', 'nric', '=', 'user_details.nric')->join('muet_result', 'nric', '=', 'user_details.nric')->join('applicant_experiences', 'nric', '=', 'user_details.nric')->join('art_involvements', 'nric', '=', 'user_details.nric')->join('sponsorship_details', 'nric', '=', 'user_details.nric')->join('subject_grade', 'nric', '=', 'user_details.nric')->join('course_taken', 'nric', '=', 'user_details.nric')->join('club_activities', 'nric', '=', 'user_details.nric')->where('nric', $req->nric)->get();
    }


    public function update_permohonan(Request $req)
    {

        $update = UserDetail::where('nric', $req->nric)->update(
            [
                'status' => false,
                'no_siri' => $req->no_siri,
                'nric' => $req->nric,
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
            ]
        );

        $update = UserDetailSub::where('nric', $req->nric)->update(
            [
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
                'relationship' => $req->relationship,
                'guardian_occupation' => $req->guardian_occupation,
                'number_of_dependents' => $req->number_of_dependents,
                'relationship_guardian' => $req->relationship_guardian,
                'kin_name' => $req->kin_name,
                'kin_relationship' => $req->kin_relationship,
                'kin_no_tel' => $req->kin_no_tel,
                'kin_no_phonehouse' => $req->kin_no_phonehouse,
                'kin_email' => $req->kin_email,
                'kin_address_1' => $req->kin_address_1,
            ]
        );

        $update = ProgramApplied::where('nric', $req->nric)->update(
            [

                'program_name' => $req->program_name,

            ]
        );

        $update = ProgramApplied::where('nric', $req->nric)->update(
            [

                'program_name' => $req->program_name,

            ]
        );

        $update = SubjectGrade::where('nric', $req->nric)->where('type_qualification', 'PMR')->update(
            [

                'subject_list' => $req->subject_pmr,
                'grade' => $req->grade_pmr,

            ]
        );

        $update = SubjectGrade::where('nric', $req->nric)->where('type_qualification', 'SPM')->update(
            [

                'subject_list' => $req->subject_spm,
                'grade' => $req->grade_spm,

            ]
        );

        $update = SubjectGrade::where('nric', $req->nric)->where('type_qualification', 'STMP')->update(
            [

                'subject_list' => $req->subject_stpm,
                'grade' => $req->grade_stpm,

            ]
        );

        $update = MuetResult::where('nric', $req->nric)->update(
            [

                'year_muet' => $req->year_muet,
                'grade' => $req->grade_muet,
                'speaking_grade' => $req->speaking_grade,
                'reading_grade' => $req->reading_grade,
                'writing_grade' => $req->writing_grade,
                'band' => $req->band,
            ]
        );

        $update = Qualification::where('nric', $req->nric)->update(
            [

                'institution_others_qc' => $req->institution_others_qc,
                'grade_others_qc' => $req->grade_others_qc,
                'specialization_others_qc' => $req->specialization_others_qc,
                'year_others_qc' => $req->year_others_qc,
            ]
        );

        $update = ApplicantExperiences::where('nric', $req->nric)->update(
            [
                'job_type' => $req->job_type,
                'monthly_income' => $req->monthly_income,
                'year_working' => $req->year_working,
                'company_name' => $req->company_name,
                'company_address' => $req->company_address,
                'no_faks' => $req->no_faks,
                'cert_related_program' => $req->cert_related_program,
                'description_cert' => $req->description_cert,
                'work_exp_related_program' => $req->work_exp_related_program,
                'description_work_exp' => $req->description_work_exp,
            ]

        );

        $update = ArtInvolve::where('nric', $req->nric)->update(
            [
                'area_involvement' => $req->area_involvement,
                'organizer' => $req->organizer,
                'year_involvement' => $req->year_involvement,
            ]

        );

        $update = SponsorDetails::where('nric', $req->nric)->update(
            [
                'sponsorship' => $req->sponsorship,
                'address_sponsorship' => $req->address_sponsorship,
                'type_srponsorship' => $req->type_srponsorship,
                'reference_no_spsp' => $req->reference_no_spsp,
                'date_offer' => $req->date_offer,
                'monthly_amount_spsp' => $req->monthly_amount_spsp,
            ]

        );

        $update = ClubActivities::where('nric', $req->nric)->update(
            [
                'club' => $req->club,
                'role' => $req->role,
                'year_taken' => $req->year_taken,
            ]

        );

        $update = CourseTaken::where('nric', $req->nric)->update(
            [
                'course_taken' => $req->course_taken,
                'organizer' => $req->course_organizer,
                'place_taken' => $req->place_taken,
            ]

        );
        $currentdt = date('d-m-Y H:i:s');




        $data = [
            'status' => 'success',
            'code' => '000',
            'description' => 'successful',
        ];

        return response()->json($data);
    }
}
