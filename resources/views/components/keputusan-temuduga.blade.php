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
                    <h4 class="card-title">Keputusan Temuduga</h4>
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

                        @foreach ($displayTable as $displayTablee)
              @php
             
              $too = 0;           
             @endphp
                <tr class="text-center" >
                    <td>{{$count++}}</td>
                  <td>{{$displayTablee['nric']}}&nbsp;<a href="{{ route('butiran', Crypt::encrypt($displayTablee['nric'])) }}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTablee['name']}}</td>
                  <td>{{$displayTablee['study_mode']}}</td>
                  <td>{{$displayTablee['state']}}</td>
                
                  @foreach ($program as $Program)
                
                @if ($Program['nric'] == $displayTablee['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($displayTablee['kelulusan1'] == 'L' || $displayTablee['kelulusan1'] == 'G')
                <td>{{$Program['code']}}-{{$displayTablee['kelulusan1']}}</td>
                @else
                <td>{{$Program['code']}}-N{{$displayTablee['kelulusan1']}}</td>
                @endif
                @else
                @if ($displayTablee['kelulusan2'] == 'L' || $displayTablee['kelulusan2'] == 'G')
                <td>{{$Program['code']}}-{{$displayTablee['kelulusan2']}}</td>
                @else
                <td>{{$Program['code']}}-N{{$displayTablee['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                  <td>{{$displayTablee['cert_related_program']}}</td>
                  @if(!empty($cadang1))
                  @foreach ($cadang1 as $Cadang1)
                  @if($Cadang1['nric'] == $displayTablee['nric'])
                  <td>{{$Cadang1['code']}}</td>
                  @else
                  <td></td>
                  @endif
                  @endforeach
                  @else
                  <td></td>
                  @endif
                  
                  @if(!empty($cadang2))
                  @foreach($cadang2 as $Cadang2)
                  @if($Cadang2['nric'] == $displayTablee['nric'])
                  <td>{{$Cadang2['code']}}</td>
                  @else
                  <td></td>
                  @endif
                  @endforeach
                  @else
                  <td></td>
                  @endif

                  <td>{{$displayTablee['markah']}}</td>
                  <td>{{$displayTablee['status_temuduga']}}</td>
                  
                  <td>

                  <div class="btn-group">
                <button class="btn btn-sm btn-outline-danger">Pilihan</button>
                <button
                  type="button"
                  class="btn btn-sm btn-outline-danger dropdown-toggle dropdown-toggle-split"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('butiran', Crypt::encrypt($displayTablee['nric'])) }}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('hadirTemuduga', Crypt::encrypt($displayTablee['nric'])) }}">Hadir</a>
                  <a class="dropdown-item" href="{{ route('TidakhadirTemuduga', Crypt::encrypt($displayTablee['nric'])) }}">Tidak Hadir</a>     
                  <a class="dropdown-item" href="{{ route('batalTemuduga', Crypt::encrypt($displayTablee['nric'])) }}">Batal</a>               
                </div>
              </div>
                  <!-- <a href="{{ route('hadirTemuduga', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-warning">Hadir</a>
                  <a href="{{ route('TidakhadirTemuduga', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-warning">Tidak Hadir</a>
                  <a href="{{ route('batalTemuduga', Crypt::encrypt($displayTablee['nric'])) }}" class="btn-sm btn-danger"> 
                      Batal
                    </a> -->
                 
                    
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