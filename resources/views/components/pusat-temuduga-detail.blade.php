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
                    <form action="/update_pusat" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">{!! __('locale.Code') !!}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="code" class="form-control" name="code_center" value="{{$datas['code_center']}}" disabled />
                                    </div>
                                </div>
                            </div>

                            <input hidden type="text" id="code" class="form-control" name="center_id" value="{{encrypt($datas['center_id'])}}"/>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">{!! __('locale.Name') !!}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="name_center" value="{{$datas['name_center']}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="label-textarea">{!! __('locale.Address') !!}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="label-textarea" name="address_center_1" rows="4" placeholder="....">{{$datas['address_center_1']}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">Tels:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="tel_no_center" value="{{$datas['tel_no_center']}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">Faks:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="fax_no_center" value="{{$datas['fax_no_center']}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">Pegawai</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="officer_center" value="{{$datas['officer_center']}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="name">Jawatan</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" name="position_officer_center" value="{{$datas['position_officer_center']}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="label-textarea">Catatan</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="label-textarea" name="description_center" rows="4" placeholder="....">{{$datas['description_center']}}</textarea>
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