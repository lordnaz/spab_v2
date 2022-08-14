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
                 <h4 class="card-title">{!! __('locale.Student Registration') !!}</h4>
                </div>
                <div class="card-body mt-2">    
                </div>
                <form action="updateapplicantinfo" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                @csrf
                <div class="card-body">                               
                        <div class="content-header">
                        <h5 class="mb-0">{!! __('locale.Candidate/Student Information') !!}</h5>
                        </div>
                        <br>  
                        <input hidden type="text" id="nric" class="form-control" name="nric" placeholder="" value="{{$data['nric']}}" readonly/>
                        <div class="row">                           
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value= "{{$data['name']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="no_matriks">{!! __('locale.no_matriks') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="no_matriks" class="form-control" name="no_matriks" placeholder="" value= "{{$data['no_matriks']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="date_of_birth">{!! __('locale.DOB') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="text" id="place_of_birth" name="place_of_birth" class="form-control place_of_birth" value="{{Carbon\Carbon::parse($data['date_of_birth'])->format('Y-m-d')}}"readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Gender') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="text" id="nationality" class="form-control" name="nationality" placeholder="" value= "{{$data['gender']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="nationality">{!! __('locale.Nationality') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nationality" class="form-control" name="nationality" placeholder="" value= "{{$data['nationality']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Race') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="text" id="nationality" class="form-control" name="nationality" placeholder="" value= "{{$data['race']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="address_1">{!! __('locale.Address') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address_1" name="address_1" rows="4" placeholder="" readonly>{{$data['address_1']}}</textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="phone_no">{!! __('locale.Phone_No') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="phone_no" class="form-control" name="phone_no" placeholder="" value= "{{$data['phone_no']}}" readonly/>
                                </div>
                                </div>
                            </div>

                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="program">{!! __('locale.Program') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="program" class="form-control" name="program" placeholder="" value= "{{$data['program']}}" readonly/>
                                </div>
                                </div>
                            </div>

                           
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Faculty') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                <input type="text" id="phone_no" class="form-control" name="phone_no" placeholder="" value= "{{$data['faculty']}}" readonly/>
                                   
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="description">{!! __('locale.Description') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="" value="{{$data['description']}}" readonly></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="hostel_room">{!! __('locale.Hostel Room') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="hostel_room" class="form-control" name="hostel_room" placeholder="" value="{{$data['hostel_room']}}" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="status_pendaftaran" class="form-control" name="status_pendaftaran" placeholder="" value="{{$data['status_global']}}" readonly/>
                                </div>
                                </div>
                            </div>
                        </div>

                        <br>
                       
                                     
                
            
                </form>                  
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
