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
          <form action="/add_new_program" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf  
            <div class="row">

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">{!! __('locale.Program Code') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="code" class="form-control" name="code" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Program Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="program" placeholder="" required/>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Type') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="type" required>
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" value="Program Asasi">{!! __('locale.Foundation') !!}</option>
                        <option data-avatar="3-small.png" value="Diploma">{!! __('locale.Diploma') !!}</option>
                        <option data-avatar="5-small.png" value="Sarjana Muda">{!! __('locale.Degree') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Faculty') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="faculty" name="faculty" required>
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" value="asasi">{!! __('locale.Foundation') !!}</option>
                        <option data-avatar="3-small.png" value="diploma">{!! __('locale.Diploma') !!}</option>
                        <option data-avatar="5-small.png" value="sarjana muda">{!! __('locale.Degree') !!}</option>
                        <option data-avatar="7-small.png" value="sarjana">{!! __('locale.Master') !!}</option>
                        <option data-avatar="9-small.png" value="kedoktoran">{!! __('locale.PhD') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="field">{!! __('locale.Field') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="field" class="form-control" name="field" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">{!! __('locale.Sub-Field') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="subfield" class="form-control" name="sub_field" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">{!! __('locale.Notes') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="notes" rows="4" placeholder="...." required></textarea>
                  </div>
                </div>
              </div>

              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('program') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>{!! __('locale.Add') !!}</span>
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
