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
  
                <div class="card-body">
                    <form action=" " method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                    @csrf  
                        <div class="row">
                        <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datas['nric'] ?? ''}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datas['name'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datas['status'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datass['program_tawar'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datas['type_program_applied'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
        

            

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datass['type_program_applied'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""readonly/>
                                </div>
                                </div>
                            </div>

                            
                            <div class="content-header">
                            <h5 class="mb-0">{!! __('locale.Interview Information') !!}</h5>
                            </div>


                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Interview Center') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""value="{{$datasss['code_center'] ?? ''}}-{{$datasss['name_center'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Session') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""value="{{$datasss['number_session'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Place Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""value="{{$datasss['iv_place_selected'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Date Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""value="{{$datasss['date_session'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Time') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""value="{{$datasss['time_session'] ?? ''}}"readonly/>
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
                                    <input type="text" id="place" class="form-control" name="place" placeholder=""readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="place">{!! __('locale.Date Interview') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="place" class="form-control" name="place" placeholder=""readonly/>
                                </div>
                                </div>
                            </div>
              

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Time') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder=""readonly/>
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
