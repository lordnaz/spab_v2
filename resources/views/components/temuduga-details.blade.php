@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{!! __('locale.Details_2') !!}</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal">
            <div class="row">

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">{!! __('locale.No.KP') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="code" class="form-control" name="no_ic" placeholder="" value="{{$datas['no_ic']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_name" placeholder="" value="{{$datas['panel_name']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Position') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_position" placeholder="" value="{{$datas['panel_position']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Faculty') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_faculty" placeholder="" value="{{$datas['panel_faculty']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Address') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="address_1" placeholder="" value="{{$datas['address_1']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Tel(H)') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="tel_house" placeholder="" value="{{$datas['tel_house']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Tel(P)') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="tel_phone" placeholder="" value="{{$datas['tel_phone']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Email') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_email" placeholder="" value="{{$datas['panel_email']}}"/>
                  </div>
                </div>
              </div>
              
              
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Status') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" value="asasi">{!! __('locale.Active') !!}</option>
                        <option data-avatar="3-small.png" value="diploma">{!! __('locale.Not Active') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Description') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="description" placeholder="" value="{{$datas['description']}}"/>
                  </div>
                </div>
              </div>


              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('paneltemuduga') }}" class="btn btn-outline-danger me-1">{!! __('locale.Back') !!}</a>
                <button type="reset" class="btn btn-primary">{!! __('locale.Update') !!}</button>
                
                <!-- <button type="reset" class="btn btn-outline-secondary">Back</button> -->
              </div>
            </div>
          </form>

          <br>
            <hr>
            <br>
          <!-- form repeater  -->
          <h4 class="card-title">{!! __('locale.Details_2') !!}</h4>
          <form action="#" class="invoice-repeater">
            <div data-repeater-list="invoice">
              <div data-repeater-item>
                <div class="row d-flex align-items-end">
                  <div class="col-md-4 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Item Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="itemname"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

                  <div class="col-md-2 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="itemcost">Cost</label>
                      <input
                        type="number"
                        class="form-control"
                        id="itemcost"
                        aria-describedby="itemcost"
                        placeholder="32"
                      />
                    </div>
                  </div>

                  <div class="col-md-2 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="itemquantity">Quantity</label>
                      <input
                        type="number"
                        class="form-control"
                        id="itemquantity"
                        aria-describedby="itemquantity"
                        placeholder="1"
                      />
                    </div>
                  </div>

                  <div class="col-md-2 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="staticprice">Price</label>
                      <input type="text" readonly class="form-control-plaintext" id="staticprice" value="$32" />
                    </div>
                  </div>

                  <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                        <i data-feather="x" class="me-25"></i>
                        <span>Delete</span>
                      </button>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
              </div>
            </div>
          </form>
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
