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
                    <form action="/OpenPusatTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Pusat Temuduga:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select class="select2 form-select" id="type" name="center_id">
                                            <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                            @foreach ($datas as $data)
                                            <option value="{{$data['center_id']}}">{{$data['code_center']}} - {{$data['name_center']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Negeri:</label>
                                    </div>
                                    <div class="col-sm-10">
                                    <select name="negeri[]" class="select2 form-select" id="select2-multiple" multiple>
                                    <optgroup label="Sila Pilih Negeri">

                                            <option value="Johor Darul Takzim">Johor Darul Takzim</option>
                                            <option value="Kedah Darul Aman">Kedah Darul Aman</option>
                                            <option value="Kelantan Darul Naim">Kelantan Darul Naim</option>
                                            <option value="Melaka">Melaka</option>
                                            <option value="Negeri Sembilan Darul Khusus">Negeri Sembilan Darul Khusus</option>
                                            <option value="Pahang Darul Makmur">Pahang Darul Makmur</option>
                                            <option value="Pulau Pinang">Pulau Pinang</option>
                                            <option value="Perak Darul Ridzuan">Perak Darul Ridzuan</option>
                                            <option value="Perlis Indra Kayangan">Perlis Indra Kayangan</option>
                                            <option value="Selangor Darul Ehsan">Selangor Darul Ehsan</option>
                                            <option value="Terengganu Darul Iman">Terengganu Darul Iman</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                                            <option value="W.P Labuan">W.P Labuan</option>
                                            <option value="W.P Putrajaya">W.P Putrajaya</option>
                                            <option value="Lain-lain">Lain-lain</option>
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
                                        <textarea class="form-control" id="label-textarea" name="catatan" rows="4" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-3 offset-sm-9">
                                <a href="{{ route('pusattemuduga') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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