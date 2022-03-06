@extends('layouts/contentLayoutMaster')



@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection


@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')


<!-- Advanced Search -->
<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">{{$displayasas['code_center']}} - {{$displayasas['name_center']}} </h4>
                </div>

                <!--Search Form -->
                <div class="card-body mt-2">


                    
                        <div class="row g-1 mb-md-1">


                            <div class="col-md-4">
                                <label class="form-label">Pusat Temuduga:</label>
                                <select class="select2 form-select" id="addMemberSelect">
                                    <option selected disabled>{{$displayasas['code_center']}} - {{$displayasas['name_center']}}</option>
                                </select>
                            </div>
                        </div>
                    
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
                    <table class="dt-advanced-search-2 table">
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>No. Sesi</th>
                                <th>Tarikh</th>
                                <th>Masa</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp

                            @foreach ($displaysession as $displaysessionn)
                            <tr class="text-center">
                                <td>{{$count++}}</td>
                                <td>{{$displaysessionn['number_session']}}</td>
                                <td>
                                    @if ($displaysessionn['TarikhFrom'] == $displaysessionn['TarikhTo'])

                                       {{$displaysessionn['TarikhFrom']}} 

                                       @else

                                       {{$displaysessionn['TarikhFrom']}} - {{$displaysessionn['TarikhTo']}} 
                            @endif
                            </td>
                                <td>{{$displaysessionn['DateFrom']}} - {{$displaysessionn['DateTo']}}  </td>

                                <td>

                                <a href="{{ route('details_temuduga', Crypt::encrypt($displaysessionn['asas_id'])) }}" class="btn-sm btn-warning"> <i data-feather='external-link'></i>{!! __('locale.Details') !!}</a>
                    <a href="{{ route('delete_temuduga', Crypt::encrypt($displaysessionn['asas_id'])) }}" class="btn-sm btn-danger deleteProgram"> 
                      <i data-feather='external-link'></i>{!! __('locale.Delete') !!}
                    </a>


                                </td>

                            </tr>
@endforeach
                        </tbody>
                    </table>
                    <div class="card-body">
                    @php
                            $total = count($displaysession);
                     @endphp
                    <form action="/AddSesiTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                    <div class="row">

                    <input hidden type="text" id="name" class="form-control" name="asas_id" value="{{Crypt::encrypt($displayasas['asas_id'])}}"/>
                    
                    <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">No Sesi</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="code" class="form-control" name="number_session" value="{{($count)}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Pusat Temuduga:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="panel[]" class="select2 form-select" id="select2-multiple" multiple>
                                    <optgroup label="Sila Pilih Panel">

                                    @foreach ($panel as $panels)
                                    
                                        <option value="{{$panels['panel_id']}}"> {{$panels['no_ic']}} - {{$panels['panel_name']}} - {{$panels['panel_position']}} </option>

                                    @endforeach
                                    </optgroup>

                                </select>
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
    </div>


</section>
<!--/ Advanced Search -->


@endsection


@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection