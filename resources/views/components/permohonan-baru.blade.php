
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
      <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">3</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Programme') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Programme Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">4</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Qualification') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Qualification Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">5</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Muet') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Muet Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">6</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.High Education') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.High Education Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">7</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Art Involvements') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Art Involvements Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">8</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Work Experience') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Work Experience Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">9</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Course') !!}</span>
            <span class="bs-stepper-subtitle">{!! __('locale.Course Sub') !!}</span>
          </span>
        </button>
      </div>
      <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
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
            <label class="form-label" for="vertical-country">{!! __('locale.Race') !!}</label>
            <select class="select2 w-100" id="vertical-country" name="race">
              <option label=" "></option>
              <option value="Melayu">Melayu</option>
              <option value="Cina">Cina</option>
              <option value="India">India</option>
              <option value="Lain-lain">Lain-lain</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Address') !!}</label>
            <textarea class="form-control" id="label-textarea" name="address_1" rows="4" placeholder=""></textarea>
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
            <label class="form-label" for="vertical-birth_cert_no">{!! __('locale.Nationality') !!}</label>
            <input type="text" id="vertical-birth_cert_no" name="nationality" class="form-control" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-short_name">{!! __('locale.Phone_No') !!}</label>
            <input type="text" id="vertical-short_name" name="phone_no" class="form-control" placeholder=" " />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-short_name">{!! __('locale.House_No') !!}</label>
            <input type="text" id="vertical-short_name" name="house_no" class="form-control" placeholder=" " />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-short_name">{!! __('locale.Parliament') !!}</label>
            <input type="text" id="vertical-short_name" name="parliament" class="form-control" placeholder=" " />
          </div>
        </div>
      

        <div class="d-flex justify-content-between">
          <button class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>





      <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Personal Info</h5>
          <small>Enter Your Personal Info.</small>
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
            <label class="form-label" for="vertical-last-name">{!! __('locale.Partner_Name') !!}</label>
            <input type="text" id="vertical-last-name" name="partner_name" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Partner_Phone_No') !!}</label>
            <input type="text" id="vertical-last-name" name="partner_no_tel" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Partner_House_No') !!}</label>
            <input type="text" id="vertical-last-name" name="partner_no_phonehouse" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Partner_Address') !!}</label>
            <textarea class="form-control" id="label-textarea" name="partner_address_1" rows="4" placeholder=""></textarea>
          </div>  
        </div>
        <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Name') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_name" class="form-control" placeholder="Doe" />
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
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Nric_Old') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_nric_old" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Nric_New') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_nric_new" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Phone_No') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_no_tel" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_House_No') !!}</label>
            <input type="text" id="vertical-last-name" name="guardian_no_phonehouse" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Guardian_Address') !!}</label>
            <textarea class="form-control" id="label-textarea" name="guardian_address_1" rows="4" placeholder=""></textarea>
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
            <label class="form-label" for="vertical-last-name">{!! __('locale.Relationship_Guardian') !!}</label>
            <input type="text" id="vertical-last-name" name="relationship_guardian" class="form-control" placeholder="Doe" />
          </div>
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
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          </div>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>




      
      <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="program-step-vertical-trigger">
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
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>




      
      <div id="social-links-vertical" class="content" role="tabpanel" aria-labelledby="qualification-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Social Links</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.institution_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="institution_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.grade_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="grade_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.specialization_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="specialization_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.year_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="year_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Test</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>



      <div id="muet-vertical" class="content" role="tabpanel" aria-labelledby="muet-vertical-trigger">
        <div class="content-header">
          <h5 class="mb-0">Social Links</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.institution_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="institution_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.grade_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="grade_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.specialization_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="specialization_others_qc" class="form-control" placeholder="Doe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-last-name">{!! __('locale.year_others_qc') !!}</label>
            <input type="text" id="vertical-last-name" name="year_others_qc" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Testing</span>
          </button>
          <button class="btn btn-success btn-submit">Submit</button>
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
