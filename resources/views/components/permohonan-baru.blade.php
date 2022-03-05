
@extends('layouts/contentLayoutMaster')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')

<!-- Vertical Wizard -->
<section class="vertical-wizard">
  <div class="bs-stepper vertical vertical-wizard-example">
    <div class="bs-stepper-header">
      <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">1</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Registration Details') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Registration Details Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">2</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Personal Info') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Personal Info Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#program-vertical" role="tab" id="program-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">3</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Programme') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Programme Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#qualification-vertical" role="tab" id="qualification-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">4</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Qualification') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Qualification Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#education-vertical" role="tab" id="education-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">5</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.High Education') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.High Education Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#art-vertical" role="tab" id="art-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">6</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Art Involvements') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Art Involvements Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#work-vertical" role="tab" id="work-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">7</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Work Experience') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Work Experience Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#course-vertical" role="tab" id="course-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">8</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Course') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Course Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#sponsor-vertical" role="tab" id="sponsor-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">9</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Sponsor') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Sponsor Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#activities-vertical" role="tab" id="activities-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">10</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Activities') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Activities Sub') !!}</span>
          </span>
        </button>
      </div>
    </div>




    <form action="/add_permohonan" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
    {{@csrf_field()}}
    <div class="bs-stepper-content">
      <div
        id="account-details-vertical"
        class="content"
        role="tabpanel"
        aria-labelledby="account-details-vertical-trigger"
      >
        <div class="content-header">
          <h5 class="mb-0">{!! __('locale.Registration Details') !!}</h5>
          <small class="text-muted">{!! __('locale.Registration Details Desc') !!}</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-username">{!! __('locale.nric') !!}</label>
            <input type="text" id="vertical-username" name="nric" class="form-control" placeholder="821102082727" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-name">{!! __('locale.register_name') !!}</label>
            <input type="text" id="vertical-name" name="name" class="form-control" placeholder="John Smith" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-short_name">{!! __('locale.short_name') !!}</label>
            <input type="text" id="vertical-short_name" name="short_name" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-email">{!! __('locale.Email') !!}</label>
            <input
              type="email"
              id="vertical-email"
              class="form-control"
              placeholder="john.smith@email.com"
              name="email"
            />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-date_of_birth">{!! __('locale.DOB') !!}</label>
            <input type="text" id="vertical-date_of_birth" name="date_of_birth" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.POB') !!}</label>
            <input type="text" id="vertical-place_of_birth" name="place_of_birth" class="form-control" placeholder="Tg Malim" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-race">{!! __('locale.Race') !!}</label>
            <select class="select2 w-100" id="vertical-race" name="race">
              <option label=" "></option>
              <option value="Melayu">Melayu</option>
              <option value="Cina">Cina</option>
              <option value="India">India</option>
              <option value="Lain-lain">Lain-lain</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-address_1">{!! __('locale.Address') !!}</label>
            <textarea class="form-control" id="label-address_1" name="address_1" rows="4" placeholder=""></textarea>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-state">{!! __('locale.State') !!}</label>
            <select class="select2 w-100" id="vertical-state" name="state">
              <option label=" "></option>
              <option value="Perlis">Perlis</option>
              <option value="Pulau Pinang">Pulau Pinang</option>
              <option value="Kedah">Kedah</option>
              <option value="Terengganu">Terengganu</option>
              <option value="Kelantan">Kelantan</option>
              <option value="Pahang">Pahang</option>
              <option value="Perak">Perak</option>
              <option value="Selangor">Selangor</option>
              <option value="Negeri Sembilan">Negeri Sembilan</option>
              <option value="Melaka">Melaka</option>
              <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
              <option value="W.P Putrajaya">W.P Putrajaya</option>
              <option value="Johor">Johor</option>
              <option value="Serawak">Serawak</option>
              <option value="Sabah">Sabah</option>
              <option value="W.P Labuan">W.P Labuan</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-gender">{!! __('locale.Gender') !!}</label>
            <select class="select2 w-100" id="vertical-gender" name="gender">
              <option label=" "></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-birth_cert_no">{!! __('locale.Birth Certificate') !!}</label>
            <input type="text" id="vertical-birth_cert_no" name="birth_cert_no" class="form-control" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-nationality">{!! __('locale.Nationality') !!}</label>
            <input type="text" id="vertical-nationality" name="nationality" class="form-control" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-phone_no">{!! __('locale.Phone_No') !!}</label>
            <input type="text" id="vertical-phone_no" name="phone_no" class="form-control" placeholder=" " />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-house_no">{!! __('locale.House_No') !!}</label>
            <input type="text" id="vertical-house_no" name="house_no" class="form-control" placeholder=" " />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-parliament">{!! __('locale.Parliament') !!}</label>
            <input type="text" id="vertical-parliament" name="parliament" class="form-control" placeholder=" " />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </a>
          <div data-target="#personal-info-vertical" id="personal-info-vertical-trigger">
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </a>
          </div>
        </div>
      </div>





      <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">{!! __('locale.Personal Info') !!}</h5>
          <small class="text-muted">{!! __('locale.Personal Info Desc') !!}</small>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">Marital Status</h5>
        </div>
        <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-status_marriage">{!! __('locale.Status_Marriage') !!}</label>
            <select class="select2 w-100" id="status_marriage" name="status_marriage">
              <option label=" "></option>
              <option value="Married">Married</option>
              <option value="Divorced">Divorced</option>
              <option value="Seperated">Seperated</option>
              <option value="Widowed">Widowed</option>
              <option value="Single">Single</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-partner_name">{!! __('locale.Partner_Name') !!}</label>
            <input type="text" id="vertical-partner_name" name="partner_name" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-partner_no_tel">{!! __('locale.Partner_Phone_No') !!}</label>
            <input type="text" id="vertical-partner_no_tel" name="partner_no_tel" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-no_phonehouse">{!! __('locale.Partner_House_No') !!}</label>
            <input type="text" id="vertical-no_phonehouse" name="partner_no_phonehouse" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-partner_address_1">{!! __('locale.Partner_Address') !!}</label>
            <textarea class="form-control" id="label-partner_address_1" name="partner_address_1" rows="4" placeholder=""></textarea>
          </div>  
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">Guardian</h5>
        </div>
        <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_name">{!! __('locale.Guardian_Name') !!}</label>
            <input type="text" id="vertical-guardian_name" name="guardian_name" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-relationship_guardian">{!! __('locale.Relationship_Guardian') !!}</label>
            <input type="text" id="vertical-relationship_guardian" name="relationship_guardian" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_nric_old">{!! __('locale.Guardian_Nric_Old') !!}</label>
            <input type="text" id="vertical-guardian_nric_old" name="guardian_nric_old" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_nric_new">{!! __('locale.Guardian_Nric_New') !!}</label>
            <input type="text" id="vertical-guardian_nric_new" name="guardian_nric_new" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_no_tel">{!! __('locale.Guardian_Phone_No') !!}</label>
            <input type="text" id="vertical-guardian_no_tel" name="guardian_no_tel" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_no_phonehouse">{!! __('locale.Guardian_House_No') !!}</label>
            <input type="text" id="vertical-guardian_no_phonehouse name="guardian_no_phonehouse" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-guardian_address_1">{!! __('locale.Guardian_Address') !!}</label>
            <textarea class="form-control" id="label-guardian_address_1" name="guardian_address_1" rows="4" placeholder=""></textarea>
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-first-name">{!! __('locale.Guardian_Income') !!}</label>
            <input type="text" id="vertical-first-name" name="guardian_income" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Occupation') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_occupation" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-first-name">{!! __('locale.Number_of_Dependents') !!}</label>
            <input type="text" id="vertical-first-name" name="guardian_occupation" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-email">{!! __('locale.Guardian_Email') !!}</label>
            <input
              type="email"
              id="vertical-email"
              class="form-control"
              placeholder="john.smith@email.com"
              name="guardian_email"
            />
          </div>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">Heirs</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-first-name">{!! __('locale.Kin_Name') !!}</label>
            <input type="text" id="vertical-first-name" name="kin_name" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_Relationship') !!}</label>
            <input type="text" id="vertical-last-name" name="kin_relationship" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-first-name">{!! __('locale.Kin_Phone_No') !!}</label>
            <input type="text" id="vertical-first-name" name="kin_no_tel" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_House_No') !!}</label>
            <input type="text" id="vertical-last-name" name="kin_no_phonehouse" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-email">{!! __('locale.Kin_Email') !!}</label>
            <input
              type="email"
              id="vertical-email"
              class="form-control"
              placeholder="john.smith@email.com"
              name="kin_email"
            />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Kin_Address') !!}</label>
            <textarea class="form-control" id="label-textarea" name="kin_address_1" rows="4" placeholder=""></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div data-target="#account-details-vertical-trigger">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          </div>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>




      
      <div id="program-vertical" class="content" role="tabpanel" aria-labelledby="program-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Program</h5>
          <small>Enter Your Address.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Series_No') !!}</label>
            <input type="text" id="vertical-last-name" name="no_siri" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Program_Name') !!}</label>
            <input type="text" id="vertical-last-name" name="program_name" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-status_marriage">{!! __('locale.Type_Program_Applied') !!}</label>
            <select class="select2 w-100" id="type_program_applied" name="type_program_applied">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Payment_Ref_No') !!}</label>
            <input type="text" id="vertical-last-name" name="payment_ref_no" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Form_Description') !!}</label>
            <textarea class="form-control" id="label-textarea" name="form_description" rows="4" placeholder=""></textarea>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Description') !!}</label>
            <textarea class="form-control" id="label-textarea" name="description" rows="4" placeholder=""></textarea>
          </div> 
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-date_application">{!! __('locale.Date_Application') !!}</label>
            <input type="text" id="vertical-date_application" name="date_application" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-date_acceptance">{!! __('locale.Date_Acceptance') !!}</label>
            <input type="text" id="vertical-date_acceptance" name="date_acceptance" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Form_Completion') !!}</label>
            <input type="text" id="vertical-last-name" name="form_completion" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Status_Admission') !!}</label>
            <input type="text" id="vertical-last-name" name="status_admission" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>




      
      <div id="qualification-vertical" class="content" role="tabpanel" aria-labelledby="qualification-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Qualification</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">MUET Results</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_Muet') !!}</label>
            <input type="text" id="vertical-last-name" name="year_muet" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Place_Muet') !!}</label>
            <input type="text" id="vertical-last-name" name="place_muet" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-band">{!! __('locale.Band') !!}</label>
            <select class="select2 w-100" id="band" name="band">
              <option label=" "></option>
              <option value="Full Time">1</option>
              <option value="Half Time">2</option>
              <option value="Full Time">3</option>
              <option value="Half Time">4</option>
              <option value="Full Time">5</option>
              <option value="Half Time">6</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Speaking_Grade') !!}</label>
            <input type="text" id="vertical-last-name" name="speaking_grade" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Reading_Grade') !!}</label>
            <input type="text" id="vertical-last-name" name="reading_grade" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Writing_Grade') !!}</label>
            <input type="text" id="vertical-last-name" name="writing_grade" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">Other Qualifications</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_Others') !!}</label>
            <input type="text" id="vertical-last-name" name="year_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Institution_Others') !!}</label>
            <input type="text" id="vertical-last-name" name="institution_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Grade_Others') !!}</label>
            <input type="text" id="vertical-last-name" name="grade_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Specialization_Others') !!}</label>
            <input type="text" id="vertical-last-name" name="specialization_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>



      <div id="education-vertical" class="content" role="tabpanel" aria-labelledby="education-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Education</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">PMR</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_pmr') !!}</label>
            <input type="text" id="vertical-last-name" name="year_pmr" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-subject_pmr">{!! __('locale.Subject_pmr') !!}</label>
            <select class="select2 w-100" id="subject_pmr" name="subject_pmr">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-grade_pmr">{!! __('locale.Grade_pmr') !!}</label>
            <select class="select2 w-100" id="grade_pmr" name="grade_pmr">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">SPM</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_spm') !!}</label>
            <input type="text" id="vertical-last-name" name="year_spm" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-subject_spm">{!! __('locale.Subject_spm') !!}</label>
            <select class="select2 w-100" id="subject_spm" name="subject_spm">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-grade_spm">{!! __('locale.Grade_spm') !!}</label>
            <select class="select2 w-100" id="grade_spm" name="grade_spm">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
        </div>
        <br>
        <div class="content-header">
          <h5 class="mb-0">STPM</h5>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_stpm') !!}</label>
            <input type="text" id="vertical-last-name" name="year_stpm" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-subject_stpm">{!! __('locale.Subject_stpm') !!}</label>
            <select class="select2 w-100" id="subject_stpm" name="subject_stpm">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-grade_stpm">{!! __('locale.Grade_stpm') !!}</label>
            <select class="select2 w-100" id="grade_stpm" name="grade_stpm">
              <option label=" "></option>
              <option value="Full Time">Full-Time</option>
              <option value="Half Time">Half-Time</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>


      <div id="art-vertical" class="content" role="tabpanel" aria-labelledby="art-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Art Involvements</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Area_involvement') !!}</label>
            <input type="text" id="vertical-last-name" name="area_involvement" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Organizer') !!}</label>
            <input type="text" id="vertical-last-name" name="organizer" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-4">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_involvement') !!}</label>
            <input type="text" id="vertical-last-name" name="year_involvement" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>



      <div id="work-vertical" class="content" role="tabpanel" aria-labelledby="work-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Work Experience</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Job_type') !!}</label>
            <input type="text" id="vertical-last-name" name="job_type" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Monthly_income') !!}</label>
            <input type="text" id="vertical-last-name" name="monthly_income" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_working') !!}</label>
            <input type="text" id="vertical-last-name" name="year_working" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Company_name') !!}</label>
            <input type="text" id="vertical-last-name" name="company_name" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-company_address">{!! __('locale.Company_address') !!}</label>
            <textarea class="form-control" id="label-textarea" name="company_address" rows="4" placeholder=""></textarea>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.No_faks') !!}</label>
            <input type="text" id="vertical-last-name" name="no_faks" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Cert_related_program') !!}</label>
            <input type="text" id="vertical-last-name" name="cert_related_program" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-description_cert">{!! __('locale.Description_cert') !!}</label>
            <textarea class="form-control" id="label-textarea" name="description_cert" rows="4" placeholder=""></textarea>
          </div> 
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Work_exp_related_program') !!}</label>
            <input type="text" id="vertical-last-name" name="work_exp_related_program" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-description_work_exp">{!! __('locale.Description_work_exp') !!}</label>
            <textarea class="form-control" id="label-textarea" name="description_work_exp" rows="4" placeholder=""></textarea>
          </div> 
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>

      
      
      <div id="course-vertical" class="content" role="tabpanel" aria-labelledby="course-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Course</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Course_taken') !!}</label>
            <input type="text" id="vertical-last-name" name="course_taken" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Course_organizer') !!}</label>
            <input type="text" id="vertical-last-name" name="course_organizer" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Place_taken') !!}</label>
            <input type="text" id="vertical-last-name" name="place_taken" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>



      <div id="sponsor-vertical" class="content" role="tabpanel" aria-labelledby="sponsor-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Course</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Sponsorship') !!}</label>
            <input type="text" id="vertical-last-name" name="sponsorship" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-address_sponsorship">{!! __('locale.Address_sponsorship') !!}</label>
            <textarea class="form-control" id="label-textarea" name="address_sponsorship" rows="4" placeholder=""></textarea>
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Type_sponsorship') !!}</label>
            <input type="text" id="vertical-last-name" name="type_sponsorship" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Reference_no_spsp') !!}</label>
            <input type="text" id="vertical-last-name" name="reference_no_spsp" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-date_offer">{!! __('locale.Date_offer') !!}</label>
            <input type="text" id="vertical-date_offer" name="date_offer" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Monthly_amount_spsp') !!}</label>
            <input type="text" id="vertical-last-name" name="monthly_amount_spsp" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
</a>
        </div>
      </div>


      <div id="activities-vertical" class="content" role="tabpanel" aria-labelledby="activities-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Club Activities</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Club') !!}</label>
            <input type="text" id="vertical-last-name" name="club" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Role') !!}</label>
            <input type="text" id="vertical-last-name" name="role" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Year_taken') !!}</label>
            <input type="text" id="vertical-last-name" name="year_taken" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
</a>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<!-- /Vertical Wizard -->

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
