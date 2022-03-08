@extends('layouts/contentLayoutMaster')

@section('vendor-style')
{{-- vendor css files --}}

<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{!! __('locale.Details_2') !!}</h4>
                </div>
                <section id="pick-a-time">
  <div class="card">
    
  <div class="card-body">
                    <form action="/UpdateSesi" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                    <div class="row">

                    <input hidden type="text" id="name" class="form-control" name="session_id" value="{{Crypt::encrypt($Displaysession['session_id'])}}"/>
                    <input hidden type="text" id="name" class="form-control" name="asas_id" value="{{Crypt::encrypt($Displaysession['asas_id'])}}"/>
                    
                    <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">No Sesi</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="code" class="form-control" name="number_session" value="{{$Displaysession['number_session']}}" readonly/>
                                    </div>
                                </div>
                            </div>

                            
        <div class="col-12">

<div class="mb-1 row">
  <div class="col-sm-2">

    <label class="col-form-label" for="name">Masa</label>
  </div>
  <div class="col-sm-4">
  
  <input type="time" id="TarikhFrom" name="TarikhFrom" value="{{Carbon\Carbon::parse($Displaysession['TarikhFrom'])->format('H:i:s')}}" >
  
  </div>

  <div class="col-sm-2">
    <label class="col-form-label" for="name">{!! __('locale.Program Name') !!}</label>
  </div>
  <div class="col-sm-4">

  <input type="time" id="TarikhTo"  name="TarikhTo" value="{{Carbon\Carbon::parse($Displaysession['TarikhTo'])->format('H:i:s')}}">
  </div>

</div>
</div>

        

        <div class="col-12">

                <div class="mb-1 row">
                  <div class="col-sm-2">

                    <label class="col-form-label" for="name">Tarikh</label>
                  </div>
                  <div class="col-sm-4">
                  
                  <input type="date" id="DateFrom" name="DateFrom" value="{{Carbon\Carbon::parse($Displaysession['DateFrom'])->format('Y-m-d')}}" >
                  </div>

                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Program Name') !!}</label>
                  </div>
                  <div class="col-sm-4">
                  <input type="date" id="DateFrom" name="DateTo" value="{{Carbon\Carbon::parse($Displaysession['DateTo'])->format('Y-m-d')}}" >
                  </div>

                </div>
              </div>

              
              <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="label-textarea">Tempat</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="label-textarea" name="place_description" rows="2" >{{$Displaysession['place_description']}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Panel:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="panel[]" class="select2 form-select" id="select2-multiple" multiple>
                                    <optgroup label="Sila Pilih Panel">

                                    @foreach ($panel as $panels)
                                    
                                        <option value="{{$panels['panel_id']}}" @if (is_array($Displaysession['panel_id'])) @foreach($Displaysession['panel_id'] as $data) @if($data == $panels['panel_id'] ) selected @endif @endforeach @else @if($Displaysession['panel_id'] == $panels['panel_id'] ) selected @endif @endif> {{$panels['no_ic']}} - {{$panels['panel_name']}} - {{$panels['panel_position']}} </option>

                                    @endforeach
                                    </optgroup>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="label-textarea">Catatan</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="label-textarea" name="description" rows="4" placeholder="">{{$Displaysession['description']}}</textarea>
                                    </div>
                                </div>
                            </div>

                    <div class="col-sm-3 offset-sm-9">

                    <a href="{{ route('sessiontable', Crypt::encrypt($Displaysession['asas_id'])) }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                                
                                
                                <button type="submit" class="btn btn-success">
                               
                                    <i data-feather="plus-circle" class="me-25"></i>
                                    <span>{!! __('locale.Add') !!}</span>
                                </button>


                            </div>

                </div>
                    </form>
            </div>
  </div>
</section>
            </div>
        </div>

    </div>
</section>
<!-- Basic Horizontal form layout section end -->

@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection