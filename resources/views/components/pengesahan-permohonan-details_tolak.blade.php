@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{!! __('locale.Details') !!}</h4>
        </div>
        <div class="card-body">
          <form action="/tolak_permohonan" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf  
            <div class="row">

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">{!! __('locale.No.KP') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="nric" class="form-control" name="nric" placeholder="" value="{{$datas['nric']}}" readonly/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="name" placeholder="" value="{{$datas['name']}}"readonly/>
                  </div>
                </div>
              </div>


              
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Email') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="email" class="form-control" name="email" placeholder="" value="{{$datas['email']}}"readonly/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Payment_Ref_No') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="payment_ref_no" class="form-control" name="payment_ref_no" placeholder="" value="{{$datas['payment_ref_no']}}"readonly/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="label-textarea">Catatan</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="label-textarea" name="description_validation" rows="4" placeholder="">{{$datass['description_validation']}}</textarea>
                                    </div>
                                </div>
                            </div>



              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('display_pengesahan_permohonan') }}" class="btn btn-outline-danger me-1">{!! __('locale.Back') !!}</a>
                <button type="submit" class="btn btn-primary">{!! __('locale.Reject') !!}</button>
                
                <!-- <button type="reset" class="btn btn-outline-secondary">Back</button> -->
              </div>
            </div>
          </form>

          <br>
            <hr>
            <br>
        
          <!-- end of form repeater -->
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Basic Horizontal form layout section end -->

@endsection


@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
@endsection
