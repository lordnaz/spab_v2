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
                 <h4 class="card-title">Sejarah Pelajar</h4>
                </div>
                <div class="card-body mt-2">    
                <form action="sejarah_pelajar_detail" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                    @csrf
                    <div class="row g-1 mb-md-1">
                    <div class="col-md-4">
                        <label class="form-label">{!! __('locale.nric') !!}:</label>
                        <div class="col-sm-8">
                            <input type="text" id="nric" class="form-control" name="nric" value="{{$nric ?? ''}}"/>
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

                @if($wujud == 'tiada')
                <div class="card-body">
                <h4 class="card-title">Tiada Maklumat</h4>
                </div>
                @else
                @endif
                <!-- Asasi -->
                @if($datas != '')
                <div class="card-body">
              
                 <h4 class="card-title text-center">Asasi</h4>
                
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
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datas['status_global'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datass['code'] ?? ''}} {{$datass['program'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datas['study_mode'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datass['sem'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder="" value="{{$datass['tahun'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>                           
            </div>  
            
            
        </div>  
        @endif

        <!-- Diploma -->
        @if($datasd != '')
                <div class="card-body">
              
                 <h4 class="card-title text-center">Diploma</h4>
                
                        <div class="row">
                        <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datasd['nric'] ?? ''}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasd['name'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasd['status_global'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassd['code'] ?? ''}} {{$datassd['program'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasd['study_mode'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datassd['sem'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder="" value="{{$datassd['tahun'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>                           
            </div>  
            
            
        </div>  
        @endif

        <!-- Sarjana Muda-->
        @if($datasm != '')
                <div class="card-body">
              
                 <h4 class="card-title text-center">Ijazah Sarjana Muda</h4>
                
                        <div class="row">
                        <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datasm['nric'] ?? ''}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasm['name'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasm['status_global'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassm['code'] ?? ''}} {{$datassm['program'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasm['study_mode'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datassm['sem'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder="" value="{{$datassm['tahun'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>                           
            </div>  
            
            
        </div>  
        @endif

         <!--Master -->
         @if($datassa != '')
                <div class="card-body">
              
                 <h4 class="card-title text-center">Asasi</h4>
                
                        <div class="row">
                        <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datassa['nric'] ?? ''}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassa['name'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassa['status_global'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datasssa['code'] ?? ''}} {{$datasssa['program'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassa['study_mode'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datasssa['sem'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder="" value="{{$datasssa['tahun'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>                           
            </div>  
            
            
        </div>  
        @endif

         <!-- Doktor -->
         @if($datask != '')
                <div class="card-body">
              
                 <h4 class="card-title text-center">Asasi</h4>
                
                        <div class="row">
                        <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.nric') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datask['nric'] ?? ''}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datask['name'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
              
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datask['status_global'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datassk['code'] ?? ''}} {{$datassk['program'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.Type_Program_Applied') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder=""value="{{$datask['study_mode'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>
   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="semester">{!! __('locale.Semester') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="semester" class="form-control" name="semester" placeholder=""value="{{$datassk['sem'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="year">{!! __('locale.Year') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="year" class="form-control" name="year" placeholder="" value="{{$datassk['tahun'] ?? ''}}"readonly/>
                                </div>
                                </div>
                            </div>                           
            </div>  
            
            
        </div>  
        @endif
        
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
