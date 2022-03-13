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
                 <h4 class="card-title">{!! __('locale.Candidate Replies Detail') !!}</h4>
                </div>
                <div class="card-body">
                    <form action=" " method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                    @csrf  
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="nric">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nric" class="form-control" name="nric" placeholder=""/>
                                </div>
                                </div>
                            </div>

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
                                    <label class="col-form-label">{!! __('locale.Type') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="type" name="status">
                                    <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                    <option value="Sepenuh Masa">{!! __('locale.Full Time') !!}</option>
                                    <option value="Separuh Masa">{!! __('locale.Half Time') !!}</option>
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
                                    <label class="col-form-label">{!! __('locale.Status') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="status" name="status">
                                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option data-avatar="1-small.png" value="Terima">{!! __('locale.Accept') !!}</option>
                                        <option data-avatar="1-small.png" value="Tolak">{!! __('locale.Reject') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="date">{!! __('locale.Date') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="date" name="date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Hostel Application') !!}:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="mohon_asrama" name="mohon_asrama">
                                    <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                    <option value="Sepenuh Masa">{!! __('locale.Yes') !!}</option>
                                    <option value="Separuh Masa">{!! __('locale.No') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-3 offset-sm-9">
                                <a href="{{ route('balasancalon') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                                <button type="submit" class="btn btn-success">
                                    <i data-feather="plus-circle" class="me-25"></i>
                                    <span>{!! __('locale.Submit') !!}</span>
                                 </button>
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
