@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{!! __('locale.Details_3') !!}</h4>
        </div>
        <div class="card-body">
          <form action="/add_new_offered_program" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf  
            <div class="row">


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">Program:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="program_id">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        @foreach ($datas as $data)
                        <option data-avatar="1-small.png" value="{{$data['program_id']}}">{{$data['code']}} - {{$data['program']}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
              </div>
              


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield" >{!! __('locale.Type') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="radio" id="subfield"  name="mode" value="Sepenuh Masa"  required/>
                    <label class="col-form-label" for="subfield" >Sepenuh Masa</label>
                    <input type="radio" id="subfield"  name="mode" value="Separuh Masa"  required/>
                    <label class="col-form-label" for="subfield">Separuh Masa</label>
                  </div>
                  
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="field">Kuota</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" id="field" class="form-control" name="quota"  required />
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">Catatan</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="notes" rows="4" placeholder="...."></textarea>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">Tarikh Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="subfield" class="form-control" name="registration_date" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">Masa Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="subfield" class="form-control" name="registration_time" placeholder=""  required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">Tempat Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="registration_venue" rows="4" placeholder="...."></textarea>
                  </div>
                </div>
              </div>



              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('offered_program') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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
