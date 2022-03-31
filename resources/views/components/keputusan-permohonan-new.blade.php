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
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                 <h4 class="card-title">{!! __('locale.Application Decision') !!}</h4>
                </div>
                <div class="card-body mt-2">    
                <form class="dt_adv_search" method="POST">
                    <div class="row g-1 mb-md-1">
                    <div class="col-md-4">
                        <label class="form-label">{!! __('locale.nric') !!}:</label>
                        <div class="col-sm-8">
                            <input type="text" id="nric" class="form-control" name="nric" placeholder=""/>
                        </div>               
                    </div>
                    <div class="col-sm-4 pt-2">
                        <button type="submit" class="btn btn-success">
                        <i data-feather="plus-circle" class="me-25"></i>
                        <span>{!! __('locale.Process') !!}</span>
                        </button>
                    </div>
                    </div>
                </form>
                </div>
                <div class="card-body">
                    <form action=" " method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                    @csrf  
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Status') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="status" name="status">
                                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.No Process') !!}</option>
                                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.Call Interview') !!}</option>
                                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.Failed Interview') !!}</option>
                                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.No Attend Interview') !!}</option>
                                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.Attend Interview') !!}</option>
                                        <option data-avatar="3-small.png" value="Diploma">{!! __('locale.Offer') !!}</option>
                                        <option data-avatar="5-small.png" value="Sarjana Muda">{!! __('locale.KIV') !!}</option>
                                        <option data-avatar="3-small.png" value="Diploma">{!! __('locale.Failed Interview 2') !!}</option>
                                        <option data-avatar="5-small.png" value="Sarjana Muda">{!! __('locale.Accept Offer') !!}</option>
                                        <option data-avatar="3-small.png" value="Diploma">{!! __('locale.Decline Offer') !!}</option>
                                        <option data-avatar="5-small.png" value="Sarjana Muda">{!! __('locale.Listed') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Program') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="program" name="program">
                                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="ANF123">ANF123 - Penulisan Seni Kreatif</option>
                                        <option value="SFX321">SFX321 - Animasi & Multimedia</option>
                                        <option value="MSC456">MSC456 - Perniagaan Musik</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""/>
                                </div>
                                </div>
                            </div>

                            
                            <div class="content-header">
                            <h5 class="mb-0">{!! __('locale.Interview Information') !!}</h5>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Interview Center') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="interview_center" name="interview_center">
                                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="ASWARA">ASWARA</option>
                                        <option value="JKKN Kedah">JKKN Kedah</option>
                                        <option value="JKKN Terengganu">JKKN Terengganu</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Session') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="session" name="session">
                                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="place">{!! __('locale.Place Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="place" class="form-control" name="place" placeholder=""/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="date_of_interview">{!! __('locale.Date Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="date_of_interview" name="date_of_interview" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Time') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""/>
                                </div>
                                </div>
                            </div>


                            <div class="content-header">
                            <h5 class="mb-0">{!! __('locale.Registration Information') !!}</h5>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="place">{!! __('locale.Place Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="place" class="form-control" name="place" placeholder=""/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="date_of_interview">{!! __('locale.Date Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="date_of_interview" name="date_of_interview" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Time') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""/>
                                </div>
                                </div>
                            </div>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Horizontal form layout section end -->
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
