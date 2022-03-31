@extends('layouts/contentLayoutMaster')



@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection


@section('page-style')
{{-- Page Css files --}}

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Advanced Search -->
<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Penjadualan Temuduga</h4>
                </div>

                <!--Search Form -->
                <div class="card-body mt-2">


                    <form class="dt_adv_search" action="/pemprosesanTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                        @csrf
                        <div class="row">

                        <div class="col-md-4">
                                <label class="form-label">Pusat Temuduga:</label>
                                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
                                    @foreach($DataCenter as $DataCenterr)
                                    
                                    <option value="{{ route('KeputusanTemuduga', $DataCenterr['asas_id']) }}" @if($FirstCenter['asas_id'] == $DataCenterr['asas_id'] ) selected @endif>{{$DataCenterr['code_center']}}-{{$DataCenterr['name_center']}}</option>
                                
                                    @endforeach

                                </select>
                            </div>




                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
                    <table class="dt-advanced-search-2 table">
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>No.KP</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Negeri</th>
                                <th>P1</th>
                                <th>P2</th>
                                <th>Sijil</th>
                                <th>Panel 1</th>
                                <th>Panel 2</th>
                                <th>Markah</th>
                                <th>Status</th>
                                <th>Pilihan</th>
                            </tr>

                        </thead>
                        <tbody>
                        @php  
                $count = 1;
              @endphp

              @foreach ($displayTable And $cadang1 And $cadang2 as $displayTablee)
              @php
             $total = count($displayTablee['program_applid']);
                           
             @endphp
                <tr class="text-center" >
                    <td>{{$count++}}</td>
                  <td>{{$displayTablee['nric']}}</td>
                  <td>{{$displayTablee['name']}}</td>
                  <td>{{$displayTablee['type_program_applied']}}</td>
                  <td>{{$displayTablee['state']}}</td>
                  @if ($total == '2')
                  @foreach ($displayTablee as $displayTableee)

                  @if($loop->first)
                  @if ($displayTablee['kelulusan1'] == 'L' || $displayTablee['kelulusan1'] == 'G' )
                  <td>{{$displayTableee['program']}}-{{$displayTablee['kelulusan1']}}</td>
                  @else
                  <td>{{$displayTableee['program']}}-N{{$displayTablee['kelulusan1']}}</td>
                  @endif
                  @else
                  @if ($displayTablee['kelulusan2'] == 'L' || $displayTablee['kelulusan2'] == 'G')
                  <td>{{$displayTableee['program']}}-{{$displayTablee['kelulusan2']}}</td>
                  @else
                  <td>{{$displayTableee['program']}}-N{{$displayTablee['kelulusan2']}}</td>
                  @endif

                  @endif
                  @endforeach
                  @else
                  @if ($displayTablee['kelulusan1'] == 'L' || $displayTablee['kelulusan1'] == 'G')
                  <td>{{$displayTableee['program']}}-{{$displayTablee['kelulusan1']}}</td>
                  @else
                  <td>{{$displayTableee['program']}}-N{{$displayTablee['kelulusan1']}}</td>
                  @endif
                  <td></td>
                  @endif
                  <td>{{$displayTablee['cert_related_program']}}</td>
                  <td>{{$displayTablee['cadang1code']}}</td>
                  <td>{{$displayTablee['cadang2code']}}</td>
                  <td>{{$displayTablee['markah']}}</td>
                  <td>{{$displayTablee['status_temuduga']}}</td>
                  
                  <td>
                  <a href="{{ route('hadirTemuduga', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-warning">Hadir</a>
                  <a href="{{ route('TidakhadirTemudugar', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-warning">Tidak Hadir</a>
                  <a href="{{ route('batalTemuduga', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-danger"> 
                    
                  </td>
                 
                </tr>
             @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection


@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection