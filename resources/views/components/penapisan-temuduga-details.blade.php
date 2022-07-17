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
                    <form action="/KemaskiniTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                        <div class="row">

                        <input hidden type="text" id="" class="form-control" name="screening_id" value="{{$detailTemuduga['screening_id']}}"/>


                        <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">No.KP</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="code" class="form-control" name="nric" value="{{$detailTemuduga['nric']}}" readonly/>
                                    </div>
                                </div>
                            </div>


                        <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="code" class="form-control" name="number_session" value="{{$detailTemuduga['name']}}" readonly/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Pusat Temuduga:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="select2 form-select" id="type" name="center_id">
                                            <option disabled>{!! __('locale.Please Choose') !!}</option>
                                            @foreach ($detailCenter as $detailCenterr)
                                            <option value="{{$detailCenterr['center_id']}}" @if($detailTemuduga['center_id'] == $detailCenterr['center_id'] ) selected @endif>{{$detailCenterr['code_center']}} - {{$detailCenterr['name_center']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                           



                            <div class="col-sm-3 offset-sm-9">
                                <a href="{{ route('PenapisanTemuduga') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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