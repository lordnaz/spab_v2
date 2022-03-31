
@extends('layouts/contentLayoutMaster')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')

<!-- Horizontal Wizard -->
<section class="horizontal-wizard">
  <div class="bs-stepper horizontal-wizard-example">
    <div class="bs-stepper-header" role="tablist">
      <div class="step" data-target="#account-details" role="tab" id="account-details-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">1</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Registration Details') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Registration Details Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">2</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Personal Info') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Personal Info Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#program" role="tab" id="program-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">3</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Programme') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Programme Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#qualification" role="tab" id="qualification-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">4</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Qualification') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Qualification Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#education" role="tab" id="education-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">5</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.High Education') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.High Education Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#art" role="tab" id="art-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">6</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Art Involvements') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Art Involvements Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#work" role="tab" id="work-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">7</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Work Experience') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Work Experience Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#course" role="tab" id="course-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">8</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Course') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Course Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#sponsor" role="tab" id="sponsor-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">9</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Sponsor') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Sponsor Sub') !!}</span> -->
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>

      <div class="step" data-target="#activities" role="tab" id="activities-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">10</span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">{!! __('locale.Activities') !!}</span>
            <!-- <span class="bs-stepper-subtitle">{!! __('locale.Activities Sub') !!}</span> -->
          </span>
        </button>
      </div>
    </div>

    <div class="bs-stepper-content">
      <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
        <div class="content-header">
          <h5 class="mb-0">{!! __('locale.Registration Details') !!}</h5>
          <small class="text-muted">{!! __('locale.Registration Details Desc') !!}</small>
        </div>
        <form>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="nric">{!! __('locale.nric') !!}</label>
              <input type="text" id="nric" name="nric" class="form-control nric" placeholder="821102082727" readonly value="{{ Auth::user()->usersdetail->nric }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="name">{!! __('locale.register_name') !!}</label>
              <input type="text" id="name" name="name" class="form-control name" placeholder="John Smith" value="{{ Auth::user()->usersdetail->name }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="short_name">{!! __('locale.short_name') !!}</label>
              <input type="text" id="short_name" name="short_name" class="form-control short_name" value="{{ Auth::user()->usersdetail->short_name }}" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="email">{!! __('locale.Email') !!}</label>
              <input
                type="email"
                id="email"
                class="form-control email"
                placeholder="john.smith@email.com"
                name="email"
                value="{{ $email }}"
                readonly
              />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="date_of_birth">{!! __('locale.DOB') !!}</label>
              <input type="text" id="date_of_birth" name="date_of_birth" class="form-control flatpickr-basic date_of_birth" value="{{ Auth::user()->usersdetail->date_of_birth }}" placeholder="YYYY-MM-DD" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="place_of_birth">{!! __('locale.POB') !!}</label>
              <input type="text" id="place_of_birth" name="place_of_birth" class="form-control place_of_birth" value="{{ Auth::user()->usersdetail->place_of_birth }}" placeholder="Tg Malim" />
            </div>
            <div class="mb-1 col-md-12">
              <label class="form-label" for="address_1">{!! __('locale.Address') !!}</label>
              <textarea class="form-control address_1" id="address_1" name="address_1" rows="4" placeholder="">{{ Auth::user()->usersdetail->address_1 }}</textarea>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="race">{!! __('locale.Race') !!}</label>
              <select class="form-select w-100 race" id="race" name="race">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Melayu" @if(Auth::user()->usersdetail->race == "Melayu") selected @endif>Melayu</option>
                <option value="Cina" @if(Auth::user()->usersdetail->race == "Cina") selected @endif>Cina</option>
                <option value="India" @if(Auth::user()->usersdetail->race == "India") selected @endif>India</option>
                <option value="Lain-lain" @if(Auth::user()->usersdetail->race == "Lain-lain") selected @endif>Lain-lain</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="state">{!! __('locale.State') !!}</label>
              <select class="select2 w-100 state" id="state" name="state">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Perlis" @if(Auth::user()->usersdetail->state == "Perlis") selected @endif>Perlis</option>
                <option value="Pulau Pinang" @if(Auth::user()->usersdetail->state == "Pulau Pinang") selected @endif>Pulau Pinang</option>
                <option value="Kedah" @if(Auth::user()->usersdetail->state == "Kedah") selected @endif>Kedah</option>
                <option value="Terengganu" @if(Auth::user()->usersdetail->state == "Terengganu") selected @endif>Terengganu</option>
                <option value="Kelantan" @if(Auth::user()->usersdetail->state == "Kelantan") selected @endif>Kelantan</option>
                <option value="Pahang" @if(Auth::user()->usersdetail->state == "Pahang") selected @endif>Pahang</option>
                <option value="Perak" @if(Auth::user()->usersdetail->state == "Perak") selected @endif>Perak</option>
                <option value="Selangor" @if(Auth::user()->usersdetail->state == "Selangor") selected @endif>Selangor</option>
                <option value="Negeri Sembilan" @if(Auth::user()->usersdetail->state == "Negeri Sembilan") selected @endif>Negeri Sembilan</option>
                <option value="Melaka" @if(Auth::user()->usersdetail->state == "Melaka") selected @endif>Melaka</option>
                <option value="W.P Kuala Lumpur" @if(Auth::user()->usersdetail->state == "W.P Kuala Lumpur") selected @endif>W.P Kuala Lumpur</option>
                <option value="W.P Putrajaya" @if(Auth::user()->usersdetail->state == "W.P Putrajaya") selected @endif>W.P Putrajaya</option>
                <option value="Johor" @if(Auth::user()->usersdetail->state == "Johor") selected @endif>Johor</option>
                <option value="Serawak" @if(Auth::user()->usersdetail->state == "Serawak") selected @endif>Serawak</option>
                <option value="Sabah" @if(Auth::user()->usersdetail->state == "Sabah") selected @endif>Sabah</option>
                <option value="W.P Labuan" @if(Auth::user()->usersdetail->state == "W.P Labuan") selected @endif>W.P Labuan</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="gender">{!! __('locale.Gender') !!}</label>
              <select class="form-select w-100 gender" id="gender" name="gender">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Male" @if(Auth::user()->usersdetail->gender == "Male") selected @endif>Male</option>
                <option value="Female" @if(Auth::user()->usersdetail->gender == "Female") selected @endif>Female</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="birth_cert_no">{!! __('locale.Birth Certificate') !!}</label>
              <input type="text" id="birth_cert_no" name="birth_cert_no" class="form-control birth_cert_no" value="{{ Auth::user()->usersdetail->birth_cert_no }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="nationality">{!! __('locale.Nationality') !!}</label>
              <input type="text" id="nationality" name="nationality" class="form-control nationality" value="{{ Auth::user()->usersdetail->nationality }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="phone_no">{!! __('locale.Phone_No') !!}</label>
              <input type="number" id="phone_no" name="phone_no" class="form-control phone_no" placeholder=" " value="{{ Auth::user()->usersdetail->phone_no }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="house_no">{!! __('locale.House_No') !!}</label>
              <input type="number" id="house_no" name="house_no" class="form-control house_no" placeholder=" " value="{{ Auth::user()->usersdetail->tel_house }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="dun">{!! __('locale.DUN') !!}</label>
              <input type="text" id="dun" name="dun" class="form-control dun" placeholder=" " value="{{ Auth::user()->usersdetail->dun }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="parliament">{!! __('locale.Parliament') !!}</label>
              <input type="text" id="parliament" name="parliament" class="form-control parliament" placeholder=" " value="{{ Auth::user()->usersdetail->parliament }}"/>
            </div>
            
          </div>
        </form>

        <div class="d-flex bd-highlight">
            <button class="btn btn-outline-secondary btn-prev bd-highlight me-auto" disabled>
              <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>

            <a class="btn btn-success bd-highlight draftOne" id="draftOne">
              <span class="d-sm-inline-block d-none">Save</span>
              <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
            </a>
            &emsp;
            <button class="btn btn-primary btn-next bd-highlight" data-draft="draftOne">
              <span class="align-middle d-sm-inline-block d-none">Next</span>
              <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
            </button>
        </div>
        
      </div>

      
      <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
        <div class="content-header">
          <h5 class="mb-0">Personal Info</h5>
          <small>Enter Your Personal Info.</small>
        </div>
        <form>
          <div class="row">

            <div class="mb-1 col-md-6">
              <label class="form-label" for="status_marriage">{!! __('locale.Status_Marriage') !!}</label>
              <select class="form-select w-100 status_marriage" id="status_marriage" name="status_marriage">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Married" @if(Auth::user()->usersdetail_sub->status_marriage == "Married") selected @endif>Married</option>
                <option value="Single" @if(Auth::user()->usersdetail_sub->status_marriage == "Single") selected @endif>Single</option>
              </select>
            </div>
          </div>

          <div id="married_section">
            <div class="row">
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-partner_name">{!! __('locale.Partner_Name') !!}</label>
                <input type="text" id="vertical-partner_name" name="partner_name" value="{{ Auth::user()->usersdetail_sub->partner_name }}" class="form-control partner_name" placeholder=""/>
              </div>
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-partner_no_tel">{!! __('locale.Partner_Phone_No') !!}</label>
                <input type="text" id="vertical-partner_no_tel" name="partner_no_tel" value="{{ Auth::user()->usersdetail_sub->partner_no_tel }}" class="form-control partner_no_tel" placeholder=""/>
              </div>
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-no_phonehouse">{!! __('locale.Partner_House_No') !!}</label>
                <input type="text" id="vertical-no_phonehouse" name="partner_no_phonehouse" value="{{ Auth::user()->usersdetail_sub->partner_no_phonehouse }}" class="form-control partner_no_phonehouse" placeholder=""/>
              </div>

              <div class="mb-1 col-md-12">
                <label class="form-label" for="vertical-partner_address_1">{!! __('locale.Partner_Address') !!}</label>
                <textarea class="form-control partner_address_1" id="label-partner_address_1" name="partner_address_1" rows="4" placeholder="">{{ Auth::user()->usersdetail_sub->partner_address_1 }}</textarea>
              </div>  
            </div>
          </div>
          

          <br>
          <br>
          <hr>
          <div class="content-header">
            <h5 class="mb-0">Guardian</h5>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_name">{!! __('locale.Guardian_Name') !!}</label>
              <input type="text" id="vertical-guardian_name" name="guardian_name" value="{{ Auth::user()->usersdetail_sub->guardian_name }}" class="form-control guardian_name" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-relationship_guardian">{!! __('locale.Relationship_Guardian') !!}</label>
              <input type="text" id="vertical-relationship_guardian" name="relationship_guardian" value="{{ Auth::user()->usersdetail_sub->relationship_guardian }}" class="form-control relationship_guardian" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_nric_old">{!! __('locale.Guardian_Nric_Old') !!}</label>
              <input type="text" id="vertical-guardian_nric_old" name="guardian_nric_old" value="{{ Auth::user()->usersdetail_sub->guardian_nric_old }}" class="form-control guardian_nric_old" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_nric_new">{!! __('locale.Guardian_Nric_New') !!}</label>
              <input type="text" id="vertical-guardian_nric_new" name="guardian_nric_new" value="{{ Auth::user()->usersdetail_sub->guardian_nric_new }}" class="form-control guardian_nric_new" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_no_tel">{!! __('locale.Guardian_Phone_No') !!}</label>
              <input type="text" id="vertical-guardian_no_tel" name="guardian_no_tel" value="{{ Auth::user()->usersdetail_sub->guardian_no_tel }}" class="form-control guardian_no_tel" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_no_phonehouse">{!! __('locale.Guardian_House_No') !!}</label>
              <input type="text" id="vertical-guardian_no_phonehouse" name="guardian_no_phonehouse" value="{{ Auth::user()->usersdetail_sub->guardian_no_phonehouse }}" class="form-control guardian_no_phonehouse" placeholder="Doe" />
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-12">
              <label class="form-label" for="vertical-guardian_address_1">{!! __('locale.Guardian_Address') !!}</label>
              <textarea class="form-control guardian_address_1" id="label-guardian_address_1" name="guardian_address_1" rows="4" placeholder="">{{ Auth::user()->usersdetail_sub->guardian_address_1 }}</textarea>
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Guardian_Income') !!}</label>
              <input type="text" id="vertical-first-name" name="guardian_income" value="{{ Auth::user()->usersdetail_sub->guardian_income }}" class="form-control guardian_income" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Occupation') !!}</label>
              <input type="text" id="vertical-last-name" name="guardian_occupation" value="{{ Auth::user()->usersdetail_sub->guardian_occupation }}" class="form-control guardian_occupation" placeholder="Doe" />
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Number_of_Dependents') !!}</label>
              <input type="text" id="vertical-first-name" name="guardian_dependent" value="{{ Auth::user()->usersdetail_sub->number_of_dependents }}" class="form-control guardian_dependent" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-email">{!! __('locale.Guardian_Email') !!}</label>
              <input
                type="email"
                id="vertical-email"
                class="form-control guardian_email"
                placeholder="john.smith@email.com"
                name="guardian_email"
                value="{{ Auth::user()->usersdetail_sub->guardian_email }}"
              />
            </div>
          </div>

          <br>
          <br>
          <hr>
          <div class="content-header">
            <h5 class="mb-0">Heirs</h5>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Kin_Name') !!}</label>
              <input type="text" id="vertical-first-name" name="kin_name" value="{{ Auth::user()->usersdetail_sub->kin_name }}" class="form-control kin_name" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_Relationship') !!}</label>
              <input type="text" id="vertical-last-name" name="kin_relationship" value="{{ Auth::user()->usersdetail_sub->kin_relationship }}" class="form-control kin_relationship" placeholder="Doe" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Kin_Phone_No') !!}</label>
              <input type="text" id="vertical-first-name" name="kin_no_tel" value="{{ Auth::user()->usersdetail_sub->kin_no_tel }}" class="form-control kin_no_tel" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_House_No') !!}</label>
              <input type="text" id="vertical-last-name" name="kin_no_phonehouse" value="{{ Auth::user()->usersdetail_sub->kin_no_phonehouse }}" class="form-control kin_no_phonehouse" placeholder="Doe" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-email">{!! __('locale.Kin_Email') !!}</label>
              <input
                type="email"
                id="vertical-email"
                class="form-control kin_email"
                placeholder="john.smith@email.com"
                name="kin_email"
                value="{{ Auth::user()->usersdetail_sub->kin_email }}"
              />
            </div>

            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Kin_Address') !!}</label>
              <textarea class="form-control kin_address_1" id="label-textarea" name="kin_address_1" rows="4" placeholder="">{{ Auth::user()->usersdetail_sub->kin_address_1 }}</textarea>
            </div>
          </div>
          
        </form>
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftTwo" id="draftTwo">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftTwo">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>


      

      
      <div id="program" class="content" role="tabpanel" aria-labelledby="program-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Rujukan & Program</h5>
          <small>Fill in the form.</small>
        </div>
        <form>
          <div class="row">
            <!-- <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Series_No') !!}</label>
              <input type="text" id="vertical-last-name" name="no_siri" class="form-control" placeholder="Doe" />
            </div> -->
            <!-- <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Program_Name') !!}</label>
              <input type="text" id="vertical-last-name" name="program_name" class="form-control program_name" placeholder="Doe" />
            </div> -->

            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-status_marriage">{!! __('locale.Type_Program_Applied') !!}</label>
              <select class="form-select w-100" id="type_program_applied" name="type_program_applied">
              <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Full Time">Full-Time</option>
                <option value="Half Time">Half-Time</option>
              </select>
            </div>

          </div>

          <div class="row">
            <div class="mb-1 col-md-12">
              <label class="form-label" for="program_one">{!! __('locale.Chosen Program') !!} 1</label>
              <select class="form-select w-100 program_one" id="program_one" name="program_one">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Melayu">Melayu</option>
                <option value="Cina">Cina</option>
                <option value="India">India</option>
                <option value="Lain-lain">Lain-lain</option>
              </select>
            </div>

            <div class="mb-1 col-md-12">
              <label class="form-label" for="program_two">{!! __('locale.Chosen Program') !!} 2</label>
              <select class="form-select w-100 program_two" id="program_two" name="program_two">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Melayu">Melayu</option>
                <option value="Cina">Cina</option>
                <option value="India">India</option>
                <option value="Lain-lain">Lain-lain</option>
              </select>
            </div>
          </div>
          
          <!-- <div class="row"> -->
            <!-- <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-status_marriage">{!! __('locale.Type_Program_Applied') !!}</label>
              <select class="select2 w-100" id="type_program_applied" name="type_program_applied">
                <option label=" "></option>
                <option value="Full Time">Full-Time</option>
                <option value="Half Time">Half-Time</option>
              </select>
            </div> -->
            <!-- <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Payment_Ref_No') !!}</label>
              <input type="text" id="vertical-last-name" name="payment_ref_no" class="form-control" placeholder="Doe" />
            </div> -->
          <!-- </div> -->
          <!-- <div class="row">
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
          </div> -->
          <!-- <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Form_Completion') !!}</label>
              <input type="text" id="vertical-last-name" name="form_completion" class="form-control" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Status_Admission') !!}</label>
              <input type="text" id="vertical-last-name" name="status_admission" class="form-control" placeholder="Doe" />
            </div>
          </div> -->
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftThree" id="draftThree">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftThree">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="qualification" class="content" role="tabpanel" aria-labelledby="qualification-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="education" class="content" role="tabpanel" aria-labelledby="education-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="art" class="content" role="tabpanel" aria-labelledby="art-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>


      <div id="work" class="content" role="tabpanel" aria-labelledby="work-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="course" class="content" role="tabpanel" aria-labelledby="course-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="sponsor" class="content" role="tabpanel" aria-labelledby="sponsor-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex bd-highlight">

          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="activities" class="content" role="tabpanel" aria-labelledby="activities-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
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
        </form>
        
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-success btn-submit">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- /Horizontal Wizard -->


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
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
