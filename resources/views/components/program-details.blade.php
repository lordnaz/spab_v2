
@extends('layouts/contentLayoutMaster')
@php
$test = Session::get('variableName');
@endphp
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
        <form action="/update_details_program" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
        {{@csrf_field()}}
            <div class="row">
           
            <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">MQA</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="mqa" class="form-control" name="mqa" value="{{$datas['mqa']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">{!! __('locale.Program Code') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="code" class="form-control" name="code" placeholder="" value="{{$datas['code']}}" required/>
                  </div>
                </div>
              </div>
 <input hidden type="text" id="program_id" class="form-control" name="program_id" value="{{$datas['program_id']}}"/>
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Program Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="program" placeholder="" value="{{$datas['program']}}" required/>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Type') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="type">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" value="Program Asasi" @if($datas['type'] == "Program Asasi") selected @endif>{!! __('locale.Foundation') !!}</option>
                        <option data-avatar="3-small.png" value="Diploma" @if($datas['type'] == "Diploma") selected @endif>{!! __('locale.Diploma') !!}</option>
                        <option data-avatar="5-small.png" value="Sarjana Muda" @if($datas['type'] == "Sarjana Muda") selected @endif>{!! __('locale.Degree') !!}</option>
                        <option data-avatar="5-small.png" value="Sarjana" @if($datas['type'] == "Sarjana") selected @endif>Ijazah Sarjana</option>
                        <option data-avatar="5-small.png" value="Kedoktoran" @if($datas['type'] == "Kedoktoran") selected @endif>Ijazah Kedoktoran</option>
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
                    <select class="select2 form-select" id="type" name="faculty">
                        <option data-avatar="1-small.png" value="Muzik" @if($datas['faculty'] == 'Muzik') selected @endif >Muzik</option>
                        <option data-avatar="3-small.png" value="Tari" @if($datas['faculty'] == "Tari") selected @endif >Tari</option>
                        <option data-avatar="5-small.png" value="Teater" @if($datas['faculty'] == 'Teater') selected @endif >Teater</option>
                        <option data-avatar="7-small.png" value="Animasi Dan Multimedia" @if($datas['faculty'] == "Animasi Dan Multimedia") selected @endif >Animasi Dan Multimedia</option>
                        <option data-avatar="9-small.png" value="Pengurusan Seni Budaya Dan Warisan" @if($datas['faculty'] == 'Pengurusan Seni Budaya Dan Warisan') selected @endif>Pengurusan Seni Budaya Dan Warisan</option>
                        <option data-avatar="7-small.png" value="Seni Halus" @if($datas['faculty'] == 'Seni Halus') selected @endif>Seni Halus</option>
                        <option data-avatar="7-small.png" value="Penulisan Kretif dan Filem" @if($datas['faculty'] == 'Penulisan Kretif dan Filem') selected @endif>Penulisan Kretif dan Filem</option>
                        <option data-avatar="7-small.png" value="Pusat Pengajian Asasi" @if($datas['faculty'] == 'Pusat Pengajian Asasi') selected @endif>Pusat Pengajian Asasi</option>
                        <option data-avatar="7-small.png" value="Pusat Pascasiswazah" @if($datas['faculty'] == 'Pusat Pascasiswazah') selected @endif>Pusat Pascasiswazah</option>
                        <option data-avatar="7-small.png" value="Diploma Seni Muzik TLDM" @if($datas['faculty'] == 'Diploma Seni Muzik TLDM') selected @endif>Diploma Seni Muzik TLDM</option>
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
                    <input type="text" id="field" class="form-control" name="field" placeholder="" value="{{$datas['field']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">{!! __('locale.Sub-Field') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="subfield" class="form-control" name="subfield" placeholder="" value="{{$datas['sub_field']}}"/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">{!! __('locale.Notes') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="note" rows="4" placeholder="....">{{$datas['notes']}}</textarea>
                  </div>
                </div>
              </div>

            

              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('program') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                              
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>Kemaskini</span>
                </button>
                

              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
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
