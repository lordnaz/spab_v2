
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
              <input type="text" id="nric" name="nric" class="form-control nric" placeholder="821102082727" readonly value="{{$form1['nric']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="name">{!! __('locale.register_name') !!}</label>
              <input type="text" id="name" name="name" class="form-control name" placeholder="John Smith" value="{{$form1['name']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="short_name">{!! __('locale.short_name') !!}</label>
              <input type="text" id="short_name" name="short_name" class="form-control short_name" value="{{$form1['short_name']}}" placeholder="John"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="email">{!! __('locale.Email') !!}</label>
              <input
                type="email"
                id="email"
                class="form-control email"
                placeholder="john.smith@email.com"
                name="email"
                value="{{$form1['email']}}"
            
              />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="date_of_birth">{!! __('locale.DOB') !!}</label>
              <input type="text" id="date_of_birth" name="date_of_birth" class="form-control flatpickr-basic date_of_birth" value="{{$form1['date_of_birth']}}" placeholder="YYYY-MM-DD"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="place_of_birth">{!! __('locale.POB') !!}</label>
              <input type="text" id="place_of_birth" name="place_of_birth" class="form-control place_of_birth" value="{{$form1['place_of_birth']}}" placeholder="Tg Malim"/>
            </div>
            <div class="mb-1 col-md-12">
              <label class="form-label" for="address_1">{!! __('locale.Address') !!}</label>
              <textarea class="form-control address_1" id="address_1" name="address_1" rows="4" placeholder="">{{$form1['address_1']}}</textarea>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="race">{!! __('locale.Race') !!}</label>
              <select class="form-select w-100 race" id="race" name="race">
                <option label="" selected>{!! __('locale.Please Choose') !!}</option>
                <option value="Melayu" @if($form1['race'] == "Melayu") selected @else @endif>Melayu</option>
                <option value="Cina" @if($form1['race'] == "Cina") selected @else @endif>Cina</option>
                <option value="India" @if($form1['race'] == "India") selected @else @endif>India</option>
                <option value="Lain-lain" @if($form1['race'] == "Lain-lain") selected @else @endif>Lain-lain</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="state">{!! __('locale.State') !!}</label>
              <select class="select2 w-100 state" id="state" name="state">
                <option label="" selected>{!! __('locale.Please Choose') !!}</option>
                <option value="Perlis" @if($form1['state'] == "Perlis") selected @else @endif>Perlis</option>
                <option value="Pulau Pinang" @if($form1['state'] == "Pulau Pinang") selected @else @endif>Pulau Pinang</option>
                <option value="Kedah" @if($form1['state'] == "Kedah") selected @else @endif>Kedah</option>
                <option value="Terengganu" @if($form1['state'] == "Terengganu") selected @else @endif>Terengganu</option>
                <option value="Kelantan" @if($form1['state'] == "Kelantan") selected @else @endif>Kelantan</option>
                <option value="Pahang" @if($form1['state'] == "Pahang") selected @else @endif>Pahang</option>
                <option value="Perak" @if($form1['state'] == "Perak") selected @else @endif>Perak</option>
                <option value="Selangor" @if($form1['state'] == "Selangor") selected @else @endif>Selangor</option>
                <option value="Negeri Sembilan" @if($form1['state'] == "Negeri Sembilan") selected @else @endif>Negeri Sembilan</option>
                <option value="Melaka" @if($form1['state'] == "Melaka") selected @else @endif>Melaka</option>
                <option value="W.P Kuala Lumpur" @if($form1['state'] == "W.P Kuala Lumpur") selected @else @endif>W.P Kuala Lumpur</option>
                <option value="W.P Putrajaya" @if($form1['state'] == "W.P Putrajaya") selected @else @endif>W.P Putrajaya</option>
                <option value="Johor" @if($form1['state'] == "Johor") selected @else @endif>Johor</option>
                <option value="Serawak" @if($form1['state'] == "Serawak") selected @else @endif>Serawak</option>
                <option value="Sabah" @if($form1['state'] == "Sabah") selected @else @endif>Sabah</option>
                <option value="W.P Labuan" @if($form1['state'] == "W.P Labuan") selected @else @endif>W.P Labuan</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="gender">{!! __('locale.Gender') !!}</label>
              <select class="form-select w-100 gender" id="gender" name="gender">
                <option label="" selected>{!! __('locale.Please Choose') !!}</option>
                <option value="Male" @if($form1['gender'] == "Lelaki") selected @else @endif>Lelaki</option>
                <option value="Female" @if($form1['gender'] == "Perempuan") selected @else @endif>Perempuan</option>
              </select>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="birth_cert_no">{!! __('locale.Birth Certificate') !!}</label>
              <input type="text" id="birth_cert_no" name="birth_cert_no" class="form-control birth_cert_no" value="{{$form1['birth_cert_no']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="nationality">{!! __('locale.Nationality') !!}</label>
              <input type="text" id="nationality" name="nationality" class="form-control nationality" value="{{$form1['nationality']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="phone_no">{!! __('locale.Phone_No') !!}</label>
              <input type="number" id="phone_no" name="phone_no" class="form-control phone_no" placeholder=" " value="{{$form1['phone_no']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="house_no">{!! __('locale.House_No') !!}</label>
              <input type="number" id="house_no" name="house_no" class="form-control house_no" placeholder=" " value="{{$form1['tel_house']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="dun">{!! __('locale.DUN') !!}</label>
              <input type="text" id="dun" name="dun" class="form-control dun" placeholder=" " value="{{$form1['dun']}}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="parliament">{!! __('locale.Parliament') !!}</label>
              <input type="text" id="parliament" name="parliament" class="form-control parliament" placeholder=" " value="{{$form1['parliament']}}"/>
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
                <option label="" selected>{!! __('locale.Please Choose') !!}</option>
                <option value="Married" @if($form2['status_marriage'] == "Married") selected @else @endif)>Berkahwin</option>
                <option value="Single" @if($form2['status_marriage'] == "Single") selected @else @endif)>Bujang</option>
              </select>
            </div>
          </div>

          <div id="married_section">
            <div class="row">
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-partner_name">{!! __('locale.Partner_Name') !!}</label>
                <input type="text" id="vertical-partner_name" name="partner_name" value="{{$form2['partner_name']}}" class="form-control partner_name" placeholder=""/>
              </div>
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-partner_no_tel">{!! __('locale.Partner_Phone_No') !!}</label>
                <input type="text" id="vertical-partner_no_tel" name="partner_no_tel" value="{{$form2['partner_no_tel']}}" class="form-control partner_no_tel" placeholder=""/>
              </div>
              <div class="mb-1 col-md-4">
                <label class="form-label" for="vertical-no_phonehouse">{!! __('locale.Partner_House_No') !!}</label>
                <input type="text" id="vertical-no_phonehouse" name="partner_no_phonehouse" value="{{$form2['partner_no_phonehouse']}}" class="form-control partner_no_phonehouse" placeholder=""/>
              </div>

              <div class="mb-1 col-md-12">
                <label class="form-label" for="vertical-partner_address_1">{!! __('locale.Partner_Address') !!}</label>
                <textarea class="form-control partner_address_1" id="label-partner_address_1" name="partner_address_1" rows="4" placeholder="">{{$form2['partner_address_1']}}</textarea>
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
              <input type="text" id="vertical-guardian_name" name="guardian_name" value="{{$form2['guardian_name']}}" class="form-control guardian_name" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-relationship_guardian">{!! __('locale.Relationship_Guardian') !!}</label>
              <input type="text" id="vertical-relationship_guardian" name="relationship_guardian" value="{{$form2['relationship_guardian']}}" class="form-control relationship_guardian" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_nric_old">{!! __('locale.Guardian_Nric_Old') !!}</label>
              <input type="text" id="vertical-guardian_nric_old" name="guardian_nric_old" value="{{$form2['guardian_nric_old']}}" class="form-control guardian_nric_old" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_nric_new">{!! __('locale.Guardian_Nric_New') !!}</label>
              <input type="text" id="vertical-guardian_nric_new" name="guardian_nric_new" value="{{$form2['guardian_nric_new']}}" class="form-control guardian_nric_new" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_no_tel">{!! __('locale.Guardian_Phone_No') !!}</label>
              <input type="text" id="vertical-guardian_no_tel" name="guardian_no_tel" value="{{$form2['guardian_no_tel']}}" class="form-control guardian_no_tel" placeholder="Doe" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-guardian_no_phonehouse">{!! __('locale.Guardian_House_No') !!}</label>
              <input type="text" id="vertical-guardian_no_phonehouse" name="guardian_no_phonehouse" value="{{$form2['guardian_no_phonehouse']}}" class="form-control guardian_no_phonehouse" placeholder="Doe" />
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-12">
              <label class="form-label" for="vertical-guardian_address_1">{!! __('locale.Guardian_Address') !!}</label>
              <textarea class="form-control guardian_address_1" id="label-guardian_address_1" name="guardian_address_1" rows="4" placeholder="">{{$form2['guardian_address_1']}}</textarea>
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Guardian_Income') !!}</label>
              <input type="text" id="vertical-first-name" name="guardian_income" value="{{$form2['guardian_income']}}" class="form-control guardian_income" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Guardian_Occupation') !!}</label>
              <input type="text" id="vertical-last-name" name="guardian_occupation" value="{{$form2['guardian_occupation']}}" class="form-control guardian_occupation" placeholder="Doe" />
            </div>
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Number_of_Dependents') !!}</label>
              <input type="text" id="vertical-first-name" name="guardian_dependent" value="{{$form2['number_of_dependents']}}" class="form-control guardian_dependent" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-email">{!! __('locale.Guardian_Email') !!}</label>
              <input
                type="email"
                id="vertical-email"
                class="form-control guardian_email"
                placeholder="john.smith@email.com"
                name="guardian_email"
                value="{{$form2['guardian_email']}}"
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
              <input type="text" id="vertical-first-name" name="kin_name" value="{{$form2['kin_name']}}" class="form-control kin_name" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_Relationship') !!}</label>
              <input type="text" id="vertical-last-name" name="kin_relationship" value="{{$form2['kin_relationship']}}" class="form-control kin_relationship" placeholder="Doe" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-first-name">{!! __('locale.Kin_Phone_No') !!}</label>
              <input type="text" id="vertical-first-name" name="kin_no_tel" value="{{$form2['kin_no_tel']}}" class="form-control kin_no_tel" placeholder="John" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Kin_House_No') !!}</label>
              <input type="text" id="vertical-last-name" name="kin_no_phonehouse" value="{{$form2['kin_no_phonehouse']}}" class="form-control kin_no_phonehouse" placeholder="Doe" />
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
                value="{{$form2['kin_email']}}"
              />
            </div>

            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-place_of_birth">{!! __('locale.Kin_Address') !!}</label>
              <textarea class="form-control kin_address_1" id="label-textarea" name="kin_address_1" rows="4" placeholder="">{{$form2['kin_address_1']}}</textarea>
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
              <select class="form-select w-100 type_program_applied" id="type_program_applied" name="type_program_applied">
              <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                <option value="Full Time" @if($form3['study_mode'] == "Full Time") selected @endif>Full-Time</option>
                <option value="Half Time" @if($form3['study_mode'] == "Half Time") selected @endif>Half-Time</option>
              </select>
            </div>

          </div>

          <div class="row">
            <div class="mb-1 col-md-12">
              <label class="form-label" for="program_one">{!! __('locale.Chosen Program') !!} 1</label>
              <select class="form-select w-100 program_one" id="program_one" name="program_one">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                @foreach ($programs as $program)
                <option value="{{$program->program_id}}" @if($program->program_id == $program_one_id) selected @endif>{{$program->code}} - {{$program->program}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-1 col-md-12">
              <label class="form-label" for="program_two">{!! __('locale.Chosen Program') !!} 2</label>
              <select class="form-select w-100 program_two" id="program_two" name="program_two">
                <option label="" selected disabled>{!! __('locale.Please Choose') !!}</option>
                @foreach ($programs as $program)
                <option value="{{$program->program_id}}" @if($program->program_id == $program_two_id) selected @endif>{{$program->code}} - {{$program->program}}</option>
                @endforeach
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
          <h5 class="mb-0">MUET</h5>
          <small>Malaysian University English Test</small>
        </div>
        <form>
          <div class="row">
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Year_Muet') !!}</label>
              <input type="text" id="vertical-last-name" value="{{$form4['year_muet']}}" name="year_muet" class="form-control year_muet" placeholder="" />
            </div>
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Place_Muet') !!}</label>
              <input type="text" id="vertical-last-name" name="place_muet" value="{{$form4['result_grade']}}" class="form-control place_muet" placeholder="" />
            </div>
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Speaking_Grade') !!}</label>
              <input type="text" id="vertical-last-name" value="{{$form4['speaking_grade']}}" name="speaking_grade" class="form-control speaking_grade" placeholder="" />
            </div>
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Reading_Grade') !!}</label>
              <input type="text" id="vertical-last-name" name="reading_grade" value="{{$form4['reading_grade']}}" class="form-control reading_grade" placeholder="" />
            </div>
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Writing_Grade') !!}</label>
              <input type="text" id="vertical-last-name" name="writing_grade" value="{{$form4['writing_grade']}}" class="form-control writing_grade" placeholder="" />
            </div>
            <div class="mb-1 col-md-2">
              <label class="form-label" for="vertical-band">{!! __('locale.Band') !!}</label>
              <select class="select2 w-100 band" id="band" name="band">
                <option label=" "></option>
                <option value="1" @if($form4['band'] == "1") selected @endif>1</option>
                <option value="2" @if($form4['band'] == "2") selected @endif>2</option>
                <option value="3" @if($form4['band'] == "3") selected @endif>3</option>
                <option value="4" @if($form4['band'] == "4") selected @endif>4</option>
                <option value="5" @if($form4['band'] == "5") selected @endif>5</option>
                <option value="6" @if($form4['band'] == "6") selected @endif>6</option>
              </select>
            </div>
          </div>
          <div class="row">
           
          </div>
          <br>
          <div class="content-header">
            <h5 class="mb-0">Other Qualifications</h5>
          </div>

           <!-- loop  -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
             @foreach($kelulusanloop as $kelulusan)
             <input hidden type="text" class="id"  name="id" id="id" value="{{$kelulusan['permohonan_id']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="type">Institusi/Kolej/Universiti</label>
                    <input type="text" class="form-control institusidisplay" name="institusidisplay" id="institusidisplay" value="{{$kelulusan['institution_others_qc']}}">
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
            
                        <label class="form-label" for="itemcost">Tahap/Gred/HPNG/PNGK</label>
                        <input type="text" name="gradedisplay" class="form-control gradedisplay" id="gradedisplay" value="{{$kelulusan['grade_others_qc']}}">
                      </div>
                    </div>
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
            
                        <label class="form-label" for="itemcost">Pengkhususan</label>
                        <input type="text" name="khususdisplay" class="form-control khususdisplay" id="khususdisplay" value="{{$kelulusan['specialization_others_qc']}}">
                      </div>
                    </div>
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
            
                        <label class="form-label" for="itemcost">Tahun</label>
                        <input type="text" name="tahundisplay" class="form-control tahundisplay" id="tahundisplay" value="{{$kelulusan['year_others_qc']}}">
                      </div>
                    </div>
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($kelulusanloop as $kelulusan)
@if($loop->last)
<p hidden id="form4value">{{$kelulusan['sequence']}}</p>
@endif
@endforeach
<p hidden id="form4value">0</p>

<!-- loop  -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="view"></div>
       </div>
          </div>
          <br>
       <div class="row">
       <div class="col-4">
                <button id="btn1" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>

       <div class="row">
            <div class="mb-1 col-md-6">
            <div class="demo-inline-spacing">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input cert_related_program" value="Ada Sijil" id="cert_related_program" @if($form44['cert_related_program'] == "Ada Sijil") checked @else unchecked @endif />
              <label class="custom-control-label" for="customCheck1">Sijil Seni Kreatif,Diploma Peguruan atau <br/> Diploma dalam bidang-bidang berkaitan</label>
            </div>
            </div>
            </div>

            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-description_cert">{!! __('locale.Description_cert') !!}</label>
              <textarea class="form-control description_cert" id="description_cert" name="description_cert" rows="4" placeholder="">{{$form44['description_cert']}}</textarea>
            </div> 
          </div>

          <div class="row">
            <div class="mb-1 col-md-6">
            <div class="demo-inline-spacing">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input work_exp_related_program" value="Ada Sijil" id="work_exp_related_program" @if($form44['work_exp_related_program'] == "Ada Sijil") checked @else unchecked @endif />
              <label class="custom-control-label" for="customCheck1">Pengelaman Pekerjaan bersesuaian dengan <br/> bidang pengajian</label>
            </div>
            </div>
            </div>
            
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-description_cert">{!! __('locale.Work_exp_related_program') !!}</label>
              <textarea class="form-control description_work_exp" id="description_work_exp" name="description_cert" rows="4" placeholder="">{{$form44['description_work_exp']}}</textarea>
            </div> 
          </div>
      

        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftEmpat" id="draftEmpat">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftEmpat">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="education" class="content" role="tabpanel" aria-labelledby="education-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">PMR</h5>
          <small>Enter Your Address.</small>
        </div>
        <form>
          <div class="row">
            <div class="mb-1 col-md-4">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Year_pmr') !!}</label>
              <input type="text" id="vertical-last-name" name="year_pmr" class="form-control year_pmr" value="{{$pmryear}}"/>
            </div>
          </div>
          
           <!-- PMR  -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
             @foreach($pmr as $PMR)
             <input hidden type="text" class="id_pmr"  name="id_pmr" id="id_pmr" value="{{$PMR['subject_gradeid']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="usubject_pmr" name="usubject_pmr">
                    <option selected disabled>Please Choose</option>
                    <option value="Bahasa Melayu" @if ($PMR['subject_list'] == 'Bahasa Melayu') selected @endif>Bahasa Melayu</option>
                    <option value="Matematik"  @if ($PMR['subject_list'] == 'Matematik') selected @endif>Matematik</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="ugrade_pmr" name="usgrade_pmr">
                    <option selected disabled>Please Choose</option>
                    <option data-avatar="1-small.png" value="10" @if ($PMR['grade'] == 10) selected @endif>A+</option>
                    <option data-avatar="3-small.png" value="9" @if ($PMR['grade'] == 9) selected @endif>A</option>
                    <option data-avatar="3-small.png" value="8" @if ($PMR['grade'] == 8) selected @endif>A-</option>
                    <option data-avatar="3-small.png" value="7" @if ($PMR['grade'] == 7) selected @endif>B+</option>
                    <option data-avatar="3-small.png" value="6" @if ($PMR['grade'] == 6) selected @endif>B</option>
                    <option data-avatar="3-small.png" value="5" @if ($PMR['grade'] == 5) selected @endif>C+</option>
                    <option data-avatar="3-small.png" value="4" @if ($PMR['grade'] == 4) selected @endif>C</option>
                    <option data-avatar="3-small.png" value="3" @if ($PMR['grade'] == 3) selected @endif>D</option>
                    <option data-avatar="3-small.png" value="2" @if ($PMR['grade'] == 2) selected @endif>E</option>
                    <option data-avatar="3-small.png" value="1" @if ($PMR['grade'] == 1) selected @endif>G</option>
                  </select>
                      </div>
                    </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($pmr as $PMR)
@if($loop->last)
<p hidden id="pmrvalue">{{$PMR['sequence']}}</p>
@endif
@endforeach
<p hidden id="pmrvalue">0</p>

            <!-- PMR  -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="pmr"></div>
       </div>
          </div>
          <br>
       <div class="row">
       <div class="col-4">
                <button id="btnpmr" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
          
          <br>
          <div class="content-header">
            <h5 class="mb-0">SPM</h5>
          </div>
          <div class="row">
            <div class="mb-1 col-md-4">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Year_spm') !!}</label>
              <input type="text" id="vertical-last-name" name="year_spm" class="form-control year_spm" value="{{$spmyear}}"/>
            </div>
          </div>
          
           <!-- SPM  -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
             @foreach($spm as $SPM)
             <input hidden type="text" class="id_spm"  name="id_spm" id="id_spm" value="{{$SPM['subject_gradeid']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="usubject_spm" name="usubject_spm">
                    <option selected disabled>Please Choose</option>
                    <option data-avatar="1-small.png" value="Bahasa Melayu"  @if ($SPM['subject_list'] == 'Bahasa Melayu') selected @endif>Bahasa Melayu</option>
                    <option data-avatar="3-small.png" value="Bahasa Inggeris"  @if ($SPM['subject_list'] == 'Bahasa Inggeris') selected @endif>Bahasa Inggeris</option>
                    <option data-avatar="3-small.png" value="Sains"  @if ($SPM['subject_list'] == 'Sains') selected @endif>Sains</option>
                    <option data-avatar="3-small.png" value="Sejarah"  @if ($SPM['subject_list'] == 'Sejarah') selected @endif>Sejarah</option>
                    <option data-avatar="3-small.png" value="Matematik"  @if ($SPM['subject_list'] == 'Matematik') selected @endif>Matematik</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="ugrade_spm" name="usgrade_spm">
                    <option selected disabled>Please Choose</option>
                    <option data-avatar="1-small.png" value="10" @if ($SPM['grade'] == 10) selected @endif>A+</option>
                    <option data-avatar="3-small.png" value="9" @if ($SPM['grade'] == 9) selected @endif>A</option>
                    <option data-avatar="3-small.png" value="8" @if ($SPM['grade'] == 8) selected @endif>A-</option>
                    <option data-avatar="3-small.png" value="7" @if ($SPM['grade'] == 7) selected @endif>B+</option>
                    <option data-avatar="3-small.png" value="6" @if ($SPM['grade'] == 6) selected @endif>B</option>
                    <option data-avatar="3-small.png" value="5" @if ($SPM['grade'] == 5) selected @endif>C+</option>
                    <option data-avatar="3-small.png" value="4" @if ($SPM['grade'] == 4) selected @endif>C</option>
                    <option data-avatar="3-small.png" value="3" @if ($SPM['grade'] == 3) selected @endif>D</option>
                    <option data-avatar="3-small.png" value="2" @if ($SPM['grade'] == 2) selected @endif>E</option>
                    <option data-avatar="3-small.png" value="1" @if ($SPM['grade'] == 1) selected @endif>G</option>
                  </select>
                      </div>
                    </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($spm as $SPM)
@if($loop->last)
<p hidden id="spmvalue">{{$SPM['sequence']}}</p>
@endif
@endforeach
<p hidden id="spmvalue">0</p>

            <!-- SPM  -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="spm"></div>
       </div>
          </div>
          <br>
       <div class="row">
       <div class="col-4">
                <button id="btnspm" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
          <br>
          <div class="content-header">
            <h5 class="mb-0">STPM</h5>
          </div>
          <div class="row">
            <div class="mb-1 col-md-4">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Year_stpm') !!}</label>
              <input type="text" id="vertical-last-name" name="year_stpm" class="form-control year_stpm" value="{{$stpmyear}}"/>
            </div>
          </div>
          
           <!-- STPM  -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
             @foreach($stpm as $STPM)
             <input hidden type="text" class="id_stpm" name="id_stpm" id="id_stpm" value="{{$STPM['subject_gradeid']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="usubject_stpm" name="usubject_stpm">
                    <option selected disabled>Please Choose</option>
                    <option value="Bahasa Melayu" @if ($STPM['subject_list'] == 'Bahasa Melayu') selected @endif>Bahasa Melayu</option>
                    <option value="Matematik"  @if ($STPM['subject_list'] == 'Matematik') selected @endif>Matematik</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
                  <label class="form-label" for="itemname">Subjek</label>
                  <select class="form-control" id="ugrade_stpm" name="usgrade_stpm">
                    <option selected disabled>Please Choose</option>
                    <option value="10" @if ($STPM['grade'] == 10) selected @endif>A+</option>
                    <option value="9" @if ($STPM['grade'] == 9) selected @endif>A</option>
                  </select>
                      </div>
                    </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($stpm as $STPM)
@if($loop->last)
<p hidden id="stpmvalue">{{$STPM['sequence']}}</p>
@endif
@endforeach
<p hidden id="stpmvalue">0</p>

            <!-- STPM -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="stpm"></div>
       </div>
          </div>
          
       <div class="row">
       <div class="col-4">
                <button id="btnstpm" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
       <br>
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftLima" id="draftLima">
            <span class="d-sm-inline-block d-none" >Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftLima">
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
           <!-- Form 6 -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
           @foreach($form6 as $Form6)
             <input hidden type="text" class="id_form6" name="id_form6" id="id_form6" value="{{$Form6['art_id']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="vertical-last-name">{!! __('locale.Area_involvement') !!}</label>
                  <input type="text" class="form-control uarea_involvement" name="uarea_involvement" id="uarea_involvement" value="{{$Form6['area_involvement']}}">
                  </div>
                </div>
                <div class="col-md-4 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Organizer') !!}</label>
                      <input type="text" id="uorganizer" name="uorganizer" class="form-control uorganizer" value="{{$Form6['organizer']}}"/>
                      </div>
                  </div>
                  <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Year_involvement') !!}</label>
                       <input type="text" id="uyear_involvement" name="uyear_involvement" class="form-control uyear_involvement" value="{{$Form6['year_involvement']}}" />
                      </div>
                  </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($form6 as $Form6)
@if($loop->last)
<p hidden id="form6value">{{$Form6['sequence']}}</p>
@endif
@endforeach
<p hidden id="form6value">0</p>

            <!-- Form 6 -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="form6"></div>
       </div>
          </div>
          
       <div class="row">
       <div class="col-4">
                <button id="btnform6" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
       <br>
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftEnam" id="draftEnam">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftEnam">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>


      <div id="work" class="content" role="tabpanel" aria-labelledby="work-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Pekerjaan</h5>
          <small>Pekerjaan</small>
        </div>
        <form>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Job_type') !!}</label>
              <input type="text" id="vertical-last-name" name="job_type" class="form-control job_type" value="{{$form7['job_type']}}" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Monthly_income') !!}</label>
              <input type="text" id="vertical-last-name" name="monthly_income" class="form-control monthly_income" value="{{$form7['monthly_income']}}" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Year_working') !!}</label>
              <input type="date" id="vertical-last-name" name="year_working" class="form-control year_working" value="{{ Carbon\Carbon::parse($form7['year_working'])->format('Y-m-d') }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Company_name') !!}</label>
              <input type="text" id="vertical-last-name" name="company_name" class="form-control company_name" value="{{$form7['company_name'] }}" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-company_address">{!! __('locale.Company_address') !!}</label>
              <textarea class="form-control company_address" id="label-textarea" name="company_address" rows="4" placeholder="">{{$form7['company_address']}}</textarea>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.No_faks') !!}</label>
              <input type="text" id="vertical-last-name" name="no_faks" class="form-control no_faks" value="{{$form7['no_faks']}}" />
            </div>
          </div>
        </form>
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftTujuh" id="draftTujuh">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftTujuh">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="course" class="content" role="tabpanel" aria-labelledby="course-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Kursus</h5>
          <small>Kursus</small>
        </div>
        <form>
           <!-- Form 8 -->
           <div class="invoice-repeater">
           <div data-repeater-list="" >
           
           @foreach($form8 as $Form8)
             <input hidden type="text" class="id_form8" name="id_form8" id="id_form8" value="{{$Form8['course_takenid']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="vertical-last-name">{!! __('locale.Course_taken') !!}</label>
                  <input type="text" class="form-control ucourse_taken" name="ucourse_taken" id="ucourse_taken" value="{{$Form8['course_taken']}}">
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Course_organizer') !!}</label>
                      <input type="text" id="ucourse_organizer" name="ucourse_organizer" class="form-control ucourse_organizer" value="{{$Form8['course_organizer']}}"/>
                      </div>
                  </div>
                  <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Place_taken') !!}</label>
                       <input type="text" id="uplace_taken" name="uplace_taken" class="form-control uplace_taken" value="{{$Form8['place_taken']}}" />
                      </div>
                  </div>
                  <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">Tarikh Tempoh</label>
                       <input type="text" id="uyear_taken" name="uyear_taken" class="form-control uyear_taken" value="{{$Form8['year_taken']}}" />
                      </div>
                  </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($form8 as $Form8)
@if($loop->last)
<p hidden id="form8value">{{$Form8['sequence']}}</p>
@endif
@endforeach
<p hidden id="form8value">0</p>

            <!-- Form 8 -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="form8"></div>
       </div>
          </div>
          
       <div class="row">
       <div class="col-4">
                <button id="btnform8" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
       <br>
        </form>
        
        
        <div class="d-flex bd-highlight">
          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftLapan" id="draftLapan">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftLapan">
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
              <input type="text" id="vertical-last-name" name="sponsorship" class="form-control sponsorship" value="{{$form9['sponsorship']}}" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-address_sponsorship">{!! __('locale.Address_sponsorship') !!}</label>
              <textarea class="form-control address_sponsorship" id="label-textarea" name="address_sponsorship" rows="4" placeholder="">{{$form9['address_sponsorship']}}</textarea>
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Type_sponsorship') !!}</label>
              <input type="text" id="vertical-last-name" name="type_sponsorship" class="form-control type_sponsorship" value="{{$form9['type_sponsorship']}}" />
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Reference_no_spsp') !!}</label>
              <input type="text" id="vertical-last-name" name="reference_no_spsp" class="form-control reference_no_spsp" value="{{$form9['reference_no_spsp']}}" />
            </div>
          </div>
          <div class="row">
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-date_offer">{!! __('locale.Date_offer') !!}</label>
              <input type="date" id="date_offer" name="date_offer" class="form-control date_offer" value="{{ Carbon\Carbon::parse($form9['date_offer'])->format('Y-m-d') }}"/>
            </div>
            <div class="mb-1 col-md-6">
              <label class="form-label" for="vertical-last-name">{!! __('locale.Monthly_amount_spsp') !!}</label>
              <input type="text" id="vertical-last-name" name="monthly_amount_spsp" class="form-control monthly_amount_spsp" value="{{$form9['monthly_amount_spsp']}}" />
            </div>
          </div>
        </form>
        
        <div class="d-flex bd-highlight">

          <button class="btn btn-primary btn-prev bd-highlight me-auto">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>

          <a class="btn btn-success bd-highlight draftSembilan" id="draftSembilan">
            <span class="d-sm-inline-block d-none">Save</span>
            <i data-feather='save' class="align-middle ms-sm-25 ms-0"></i>
          </a>
          &emsp;
          <button class="btn btn-primary btn-next bd-highlight" data-draft="draftSembilan">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>

      <div id="activities" class="content" role="tabpanel" aria-labelledby="activities-step-trigger">
        <div class="content-header">
          <h5 class="mb-0">Aktiviti/Kelab</h5>
          <small>Aktiviti/Kelab.</small>
        </div>
        <form>
          <!-- Form 10 -->
          <div class="invoice-repeater">
           <div data-repeater-list="" >
           
           @foreach($form10 as $Form10)
             <input hidden type="text" class="id_form10" name="id_form10" id="id_form10" value="{{$Form10['club_id']}}">
            
            
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <label class="form-label" for="vertical-last-name">{!! __('locale.Club') !!}</label>
                  <input type="text" class="form-control uclub" name="uclub" id="uclub" value="{{$Form10['club']}}">
                  </div>
                </div>
                <div class="col-md-3 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Role') !!}</label>
                      <input type="text" id="urole" name="urole" class="form-control urole" value="{{$Form10['role']}}"/>
                      </div>
                  </div>
                  <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <label class="form-label" for="vertical-last-name">{!! __('locale.Year_taken') !!}</label>
                       <input type="text" id="uyear_takenclub" name="uyear_takenclub" class="form-control uyear_takenclub" value="{{$Form10['year_taken']}}" />
                      </div>
                  </div>
                   
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
               
            </div>
</div>
<!-- index  -->

@foreach($form10 as $Form10)
@if($loop->last)
<p hidden id="form10value">{{$Form10['sequence']}}</p>
@endif
@endforeach
<p hidden id="form10value">0</p>

            <!-- Form 10 -->
          <div class="invoice-repeater">
          <div data-repeater-list="data">
       <div id="form10"></div>
       </div>
          </div>
          
       <div class="row">
       <div class="col-4">
                <button id="btnform10" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>
       </div>
       <br>
        </form>
        
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-success btn-next btn-submit" data-draft="draftSepuluh">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
</section>


<!-- /Horizontal Wizard -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
     
       $(document).ready(function() {
    
        
        var form4 = $("#form4value").html();
        var pmr = $("#pmrvalue").html();
        var spm = $("#spmvalue").html();
        var stpm = $("#stpmvalue").html();
        var form6 = $("#form6value").html();
        var form8 = $("#form8value").html();
        var form10 = $("#form10value").html();
    
    $("#btn1").click(function() { 
      var value = parseInt(form4);    
      var form44 = value + 1;
      $("#view").append('<input hidden type="text" name="index" value='+form44+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="itemname">Institusi/Kolej/Universiti</label><input type="text" class="form-control" id="institution_others_qc" name="institution_others_qc"></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemcost">Tahap/Gred/HPNG/PNGK</label><input type="text" class="form-control" id="grade_others_qc" name="grade_others_qc"> </div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemname">Pengkhususan</label><input type="text" class="form-control" id="specialization_others_qc" name="specialization_others_qc"></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemname">Tahun</label><input type="text" class="form-control" id="year_others_qc" name="year_others_qc"></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
      
      
      
    });

    $("#btnpmr").click(function() {     

      var valuepmr = parseInt(pmr);    
      var pmrr = valuepmr + 1;

      $("#pmr").append('<input hidden type="text" name="index_pmr" value='+pmrr+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="itemname">Subjek</label><select class="select2 form-select" id="subject_pmr" name="subject_pmr"><option selected disabled>Please Choose</option><option value="Bahasa Melayu">Bahasa Melayu</option><option value="Matematik">Matematik</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemcost">Grade</label><select class="select2 form-select" id="grade_pmr" name="grade_pmr"><option selected disabled>Please Choose</option><option data-avatar="1-small.png" value="10">A+</option><option data-avatar="3-small.png" value="9">A</option><option data-avatar="3-small.png" value="8">A-</option><option data-avatar="3-small.png" value="7">B+</option><option data-avatar="3-small.png" value="6">B</option><option data-avatar="3-small.png" value="5">C+</option><option data-avatar="3-small.png" value="4">C</option><option data-avatar="3-small.png" value="3">D</option><option data-avatar="3-small.png" value="2">E</option><option data-avatar="3-small.png" value="1">G</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
    
      
    });

    $("#btnspm").click(function() {   
      
      var valuespm = parseInt(spm);    
      var spmm = valuespm + 1;
      
      $("#spm").append('<input hidden type="text" name="index_spm" value='+spmm+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="itemname">Subjek</label><select class="select2 form-select" id="subject_spm" name="subject_spm"><option selected disabled>Please Choose</option><option data-avatar="1-small.png" value="Bahasa Melayu">Bahasa Melayu</option><option data-avatar="3-small.png" value="Bahasa Inggeris">Bahasa Inggeris</option><option data-avatar="3-small.png" value="Sains">Sains</option><option data-avatar="3-small.png" value="Sejarah">Sejarah</option><option data-avatar="3-small.png" value="Matematik">Matematik</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemcost">Grade</label><select class="select2 form-select" id="grade_spm" name="grade_spm"><option selected disabled>Please Choose</option><option data-avatar="1-small.png" value="10">A+</option><option data-avatar="3-small.png" value="9">A</option><option data-avatar="3-small.png" value="8">A-</option><option data-avatar="3-small.png" value="7">B+</option><option data-avatar="3-small.png" value="6">B</option><option data-avatar="3-small.png" value="5">C+</option><option data-avatar="3-small.png" value="4">C</option><option data-avatar="3-small.png" value="3">D</option><option data-avatar="3-small.png" value="2">E</option><option data-avatar="3-small.png" value="1">G</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
     
      
    });

    $("#btnstpm").click(function() {     
      
      var valuestpm = parseInt(stpm);    
      var stpmm = valuestpm + 1;

      $("#stpm").append('<input hidden type="text" name="index_stpm" value='+stpmm+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="itemname">Subjek</label><select class="select2 form-select" id="subject_stpm" name="subject_stpm"><option selected disabled>Please Choose</option><option value="Bahasa Melayu">Bahasa Melayu</option><option value="Matematik">Matematik</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemcost">Grade</label><select class="select2 form-select" id="grade_stpm" name="grade_stpm"><option selected disabled>Please Choose</option><option value="10">A+</option><option value="9">A</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
     
      
    });

    $("#btnform6").click(function() {    
      
      
      var valueform6 = parseInt(form6);    
      var form66 = valueform6 + 1;
      
      $("#form6").append('<input hidden type="text" name="index_form6" value='+form66+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Bidang Penglibatan</label><input type="text" class="form-control area_involvement" name="area_involvement" id="area_involvement" value=""></div></div><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Penganjur</label><input type="text" id="organizer" name="organizer" class="form-control organize"/></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Tahun</label><input type="text" id="year_involvement" name="year_involvement" class="form-control year_involvement" /></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
     
      
    });

    $("#btnform8").click(function() {     

      var valueform8 = parseInt(form8);    
      var form88 = valueform8 + 1;
      
      $("#form8").append('<input hidden type="text" name="index_form8" value='+form88+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Kursus Yang Diambil</label><input type="text" class="form-control course_taken" name="course_taken" id="course_taken" value=""></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Penaja</label><input type="text" id="course_organizer" name="course_organizer" class="form-control course_organizer"/></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Tempat Diambil</label><input type="text" id="place_taken" name="place_taken" class="form-control place_taken" /></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Tarikh Tempoh</label><input type="text" id="year_taken" name="year_taken" class="form-control year_taken" /></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
     
      
    });

    $("#btnform10").click(function() {    
      
      var valueform10 = parseInt(form10);    
      var form1010 = valueform10 + 1;
      
      $("#form10").append('<input hidden type="text" name="index_form10" value='+form1010+'><div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Kelab/Persatuan</label><input type="text" class="form-control club" name="club" id="club" value=""></div></div><div class="col-md-3 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Jawatan</label><input type="text" id="role" name="role" class="form-control role"/></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="vertical-last-name">Tahun</label><input type="text" id="year_takenclub" name="year_takenclub" class="form-control year_takenclub" /></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;
      feather.replace()
      
      
    });
    
    
    
  });

  
    </script>

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
@endsection
