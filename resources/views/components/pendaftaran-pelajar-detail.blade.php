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
                <form action="applicantinfo" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                    @csrf
                    <div class="row g-1 mb-md-1">
                    <div class="col-md-4">
                        <label class="form-label">{!! __('locale.nric') !!}:</label>
                        <div class="col-sm-8">
                            <input type="text" id="nric" class="form-control" name="nric" placeholder="" value="{{$data['nric']}}"/>
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
                <form action="updateapplicantinfo" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                @csrf
                <div class="card-body">                               
                        <div class="content-header">
                        <h5 class="mb-0">{!! __('locale.Candidate/Student Information') !!}</h5>
                        </div>
                        <br>  
                        <div class="row">                           
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="name">{!! __('locale.register_name') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" value= "{{$data['name']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="no_matriks">{!! __('locale.no_matriks') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="no_matriks" class="form-control" name="no_matriks" placeholder="" value= "{{$data['no_matriks']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="date_of_birth">{!! __('locale.DOB') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="date_of_birth" name="date_of_birth" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value= "{{$data['date_of_birth']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Gender') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="gender" name="gender">
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>                                       
                                        <option value="Male" @if($data['gender'] == "Male") selected @endif >{!! __('locale.Male') !!}</option>
                                        <option value="Female" @if($data['gender'] == "Female") selected @endif>{!! __('locale.Female') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="nationality">{!! __('locale.Nationality') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nationality" class="form-control" name="nationality" placeholder="" value= "{{$data['nationality']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Race') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="race" name="race">
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="Malay" @if($data['race'] == "Malay") selected @endif >{!! __('locale.Malay') !!}</option>
                                        <option value="Chinese" @if($data['race'] == "Chinese") selected @endif>{!! __('locale.Chinese') !!}</option>
                                        <option value="Indian" @if($data['race'] == "Indian") selected @endif >{!! __('locale.Indian') !!}</option>
                                        <option value="Others" @if($data['race'] == "Others") selected @endif>{!! __('locale.Others') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="address_1">{!! __('locale.Address') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address_1" name="address_1" rows="4" placeholder="" value= "{{$data['address_1']}}"></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="phone_no">{!! __('locale.Phone_No') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="phone_no" class="form-control" name="phone_no" placeholder="" value= "{{$data['phone_no']}}"/>
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
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>
                                        @foreach ($dataa as $datas)
                                        <option value="{{$datas['program_id']}}" @if($data['program_tawar'] == $datas['program_id']) selected @endif>{{$datas['code']}} - {{$datas['program']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Faculty') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="faculty" name="faculty">
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>
                                        @foreach ($dataa as $datas)
                                        <option value="{{$datas['program_id']}}" @if($data['program_tawar'] == $datas['program_id']) selected @endif>{{$datas['faculty']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="description">{!! __('locale.Description') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="" value="{{$data['description']}}"></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="hostel_room">{!! __('locale.Hostel Room') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="hostel_room" class="form-control" name="hostel_room" placeholder="" value="{{$data['hostel_room']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Status') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="status_pendaftaran" class="form-control" name="status_pendaftaran" placeholder="" value="{{$data['status_pendaftaran']}}"/>
                                </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="content-header">
                        <h5 class="mb-0">{!! __('locale.Payment Information') !!}</h5>
                        </div>
                        <br> 
                        <div class="row">
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="no_resit">{!! __('locale.no_resit') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="no_resit" class="form-control" name="no_resit" placeholder="" value="{{$data['no_resit']}}"/>
                                </div>
                                </div>
                            </div>   
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="total_payment">{!! __('locale.Total Payment') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="total_payment" class="form-control" name="total_payment" placeholder="" value="{{$data['total_payment']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Payment Type') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="payment_type" name="payment_type">
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="Cash" @if($data['payment_type'] == "Cash") selected @endif >{!! __('locale.Cash') !!}</option>
                                        <option value="Cheque" @if($data['payment_type'] == "Cheque") selected @endif>{!! __('locale.Cheque') !!}</option>
                                        <option value="Credit Card" @if($data['payment_type'] == "Credit Card") selected @endif >{!! __('locale.Credit Card') !!}</option>
                                        <option value="Bank Transfer" @if($data['payment_type'] == "Bank Transfer") selected @endif>{!! __('locale.Bank Transfer') !!}</option>
                                        <option value="Others" @if($data['payment_type'] == "Others") selected @endif >{!! __('locale.Others') !!}</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{!! __('locale.Bank') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="select2 form-select" id="bank" name="bank">
                                        <option disabled>{!! __('locale.Please Choose') !!}</option>
                                        <option value="Affin Bank Berhad" @if($data['bank'] == "Affin Bank Berhad") selected @endif >Affin Bank Berhad</option>
                                        <option value="AmBank Berhad" @if($data['bank'] == "AmBank Berhad") selected @endif>AmBank Berhad</option>
                                        <option value="Bank Islam Malaysia Berhad" @if($data['bank'] == "Bank Islam Malaysia Berhad") selected @endif >Bank Islam Malaysia Berhad</option>
                                        <option value="CIMB Berhad" @if($data['bank'] == "CIMB Berhad") selected @endif>CIMB Berhad</option>
                                        <option value="Hong Leong Bank Berhad" @if($data['bank'] == "Hong Leong Bank Berhad") selected @endif >Hong Leong Bank Berhad<option>
                                        <option value="HSBC Bank Malaysia Berhad" @if($data['bank'] == "HSBC Bank Malaysia Berhad") selected @endif>HSBC Bank Malaysia Berhad</option>
                                        <option value="Maybank Berhad" @if($data['bank'] == "Maybank Berhad") selected @endif >Maybank Berhad</option>     
                                        <option value="Public Bank Berhad" @if($data['bank'] == "Public Bank Berhad") selected @endif >Public Bank Berhad</option>
                                        <option value="Others" @if($data['bank'] == "Others") selected @endif>{!! __('locale.Others') !!}</option>                                      
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="payment_reference">{!! __('locale.Reference_no_spsp') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="payment_reference" class="form-control" name="payment_reference" placeholder="" value="{{$data['payment_reference']}}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12">                              
                                <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="payment_details">{!! __('locale.For Payment') !!}</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="payment_details" class="form-control" name="payment_details" placeholder="" value="{{$data['payment_details']}}"/>
                                </div>
                                </div>
                            </div>                                                      
                        </div> 
                                     
                    <div class="card-datatable">
                        <table class="dt-advanced-search-2 table">
                            <thead>
                                <tr class="text-center">
                                    <th></th>
                                    <th>{!! __('locale.Fee Type') !!}</th>
                                    <th>{!! __('locale.Amount') !!}</th>
                                    </tr>
                            </thead>
                            <tbody>
                            @php  
                                $count = 1;
                            @endphp

                            @foreach ($datas as $data)             
                                    <tr class="text-center">
                                    <td>{{$count++}}</td>
                                    <td>{{$data['fee_type']}}</td>
                                    <td>{{$data['fee_amount']}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="d-flex justify-content-between">
                    <div class="col-sm-7 offset-sm-6">
                    <a href="{{ route('cancelstatusapplicant', Crypt::encrypt($data['nric'])) }}" class="btn btn-outline-secondary me-1">{!! __('locale.Cancel') !!}</a>
                    <a href="{{ route('pendaftaranpelajar') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Cancel Receipt') !!}</a>
                    <a href="" class="btn btn-outline-secondary me-1">{!! __('locale.Details') !!}</a>
                    <a href="" class="btn btn-outline-secondary me-1">{!! __('locale.Print') !!}</a>
                    <button type="submit" class="btn btn-success">
                    <i data-feather="plus-circle" class="me-25"></i>
                    <span>{!! __('locale.Save') !!}</span>
                    </button>
                </div>
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
