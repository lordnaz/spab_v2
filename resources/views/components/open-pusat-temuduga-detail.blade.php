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
                    <form action="/UpdateOpenPusatTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
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
                                            @foreach ($datass as $dataa)
                                            <option value="{{$dataa['center_id']}}" @if($datas['center_id'] == $dataa['center_id']) selected @endif>{{$dataa['code_center']}} - {{$dataa['name_center']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input hidden type="text" id="name" class="form-control" name="asas_id" value="{{Crypt::encrypt($datas['asas_id'])}}"/>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">Pusat Temuduga:</label>
                                    </div>
                                    <div class="col-sm-10">
                                    <select name="negeri[]" class="select2 form-select" id="select2-multiple" multiple>
                                    <optgroup label="Sila Pilih Negeri">

                                    

                                   

                                            <option value="Johor Darul Takzim" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Johor Darul Takzim' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Johor Darul Takzim' ) selected @endif @endif >Johor Darul Takzim</option>
                                            <option value="Kedah Darul Aman" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Kedah Darul Aman' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Kedah Darul Aman' ) selected @endif @endif>Kedah Darul Aman</option>
                                            <option value="Kelantan Darul Naim" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Kelantan Darul Naim' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Kelantan Darul Naim' ) selected @endif @endif>Kelantan Darul Naim</option>
                                            <option value="Melaka" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Melaka' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Melaka' ) selected @endif @endif>Melaka</option>
                                            <option value="Negeri Sembilan Darul Khusus" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Negeri Sembilan Darul Khusus' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Negeri Sembilan Darul Khusus' ) selected @endif @endif>Negeri Sembilan Darul Khusus</option>
                                            <option value="Pahang Darul Makmur" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Pahang Darul Makmur' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Pahang Darul Makmur' ) selected @endif @endif>Pahang Darul Makmur</option>
                                            <option value="Pulau Pinang" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Pulau Pinang' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Pulau Pinang' ) selected @endif @endif>Pulau Pinang</option>
                                            <option value="Perak Darul Ridzuan" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Perak Darul Ridzuan' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Perak Darul Ridzuan' ) selected @endif @endif>Perak Darul Ridzuan</option>
                                            <option value="Perlis Indra Kayangan" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Perlis Indra Kayangan' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Perlis Indra Kayangan' ) selected @endif @endif>Perlis Indra Kayangan</option>
                                            <option value="Selangor Darul Ehsan" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Selangor Darul Ehsan' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Selangor Darul Ehsan' ) selected @endif @endif>Selangor Darul Ehsan</option>
                                            <option value="Terengganu Darul Iman" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Terengganu Darul Iman' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Terengganu Darul Iman' ) selected @endif @endif>Terengganu Darul Iman</option>
                                            <option value="Sabah" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Sabah' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Sabah' ) selected @endif @endif>Sabah</option>
                                            <option value="Sarawak" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Sarawak' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Sarawak' ) selected @endif @endif>Sarawak</option>
                                            <option value="W.P Kuala Lumpur" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'W.P Kuala Lumpur' ) selected @endif @endforeach @else @if($datas['negeri'] == 'W.P Kuala Lumpur' ) selected @endif @endif>W.P Kuala Lumpur</option>
                                            <option value="W.P Labuan" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'W.P Labuan' ) selected @endif @endforeach @else @if($datas['negeri'] == 'W.P Labuan' ) selected @endif @endif>W.P Labuan</option>
                                            <option value="W.P Putrajaya" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'W.P Putrajaya' ) selected @endif @endforeach @else @if($datas['negeri'] == 'W.P Putrajaya' ) selected @endif @endif>W.P Putrajaya</option>
                                            <option value="Lain-lain" @if (is_array($datas['negeri'])) @foreach($datas['negeri'] as $data) @if($data == 'Lain-lain' ) selected @endif @endforeach @else @if($datas['negeri'] == 'Lain-lain' ) selected @endif @endif>Lain-lain</option>
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
                                        <textarea class="form-control" id="label-textarea" name="catatan" rows="4" placeholder="">{{$datas['catatan']}}</textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-3 offset-sm-9">
                                <a href="{{ route('PusatTemudugaTable') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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