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
                <div class="card-body">
                    <form action="/updateHadirTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                        <div class="row">

                        <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">Nama</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="program" value="{{$dataPelajar['name']}}" readonly/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">No.KP</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="nric" value="{{$dataPelajar['nric']}}" readonly/>
                  </div>
                </div>
              </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Panel 1:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="basicSelect" name="cadang1">
                                            <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                            @foreach ($program as $programs)
                                            <option value="{{$programs['program_id']}}" @if(!empty($dataPelajar['cadang1'])) @if($programs['program_id'] == $dataPelajar['cadang1']) selected @endif @endif>{{$programs['code']}} - {{$programs['program']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Panel 2:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="basicSelect" name="cadang2">
                                            <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                            @foreach ($program as $programs)
                                            <option value="{{$programs['program_id']}}" @if(!empty($dataPelajar['cadang2'])) @if($programs['program_id'] == $dataPelajar['cadang2']) selected @endif @endif>{{$programs['code']}} - {{$programs['program']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="field">Markah</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" id="field" class="form-control" name="markah" @if(!empty($dataPelajar['markah'])) value="{{$dataPelajar['markah']}}" @endif />
                  </div>
                </div>
              </div>



                            <div class="col-sm-3 offset-sm-9">
                                <a href="{{ route('keputusan_temuduga') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection