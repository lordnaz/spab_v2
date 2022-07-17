@extends('layouts/contentLayoutMaster')



@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection


@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Advanced Search -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Penawaran Permohonan</h4>
        </div>

        <!--Search Form -->
        <div class="card-body mt-2">


          <form class="dt_adv_search" action="/pemprosesanTawaran" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
            @csrf
            <div class="row">
              <input hidden type="text" id="code" class="form-control" name="proses" value="Semua"/>
              <div class="col-md-4">
                <label class="form-label">Pusat Temuduga:</label>
                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
                  <option value="{{ route('PenawaranPermohonan') }}" selected>Semua</option>

                  <option value="{{ route('Penawaranpermohonan', 'Johor') }}">Johor Darul Takzim</option>
                  
                  <option value="{{ route('Penawaranpermohonan', 'Kedah') }}">Kedah Darul Aman</option>
                  <option value="{{ route('Penawaranpermohonan', 'Kelantan') }}">Kelantan Darul Naim</option>
                  <option value="{{ route('Penawaranpermohonan', 'Melaka') }}">Melaka</option>
                  <option value="{{ route('Penawaranpermohonan', 'Negeri Sembilan') }}">Negeri Sembilan Darul Khusus</option>
                  <option value="{{ route('Penawaranpermohonan', 'Pahang') }}">Pahang Darul Makmur</option>
                  <option value="{{ route('Penawaranpermohonan', 'Pulau Pinang') }}">Pulau Pinang</option>
                  <option value="{{ route('Penawaranpermohonan', 'Perak') }}">Perak Darul Ridzuan</option>
                  <option value="{{ route('Penawaranpermohonan', 'Perlis') }}">Perlis Indra Kayangan</option>
                  <option value="{{ route('Penawaranpermohonan', 'Selangor') }}">Selangor Darul Ehsan</option>
                  <option value="{{ route('Penawaranpermohonan', 'Terengganu') }}">Terengganu Darul Iman</option>
                  <option value="{{ route('Penawaranpermohonan', 'Sabah') }}">Sabah</option>
                  <option value="{{ route('Penawaranpermohonan', 'Sarawak') }}">Sarawak</option>
                  <option value="{{ route('Penawaranpermohonan', 'W.P Kuala Lumpur') }}">W.P Kuala Lumpur</option>
                  <option value="{{ route('Penawaranpermohonan', 'W.P Labuan') }}">W.P Labuan</option>
                  <option value="{{ route('Penawaranpermohonan', 'W.P Putrajaya') }}">W.P Putrajaya</option>
                  <option value="{{ route('Penawaranpermohonan', 'Lain-lain') }}">Lain-lain</option>
                </select>
              </div>

              <div class="col-sm-4 pt-2">
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>Proses</span>
                </button>
              </div>


            </div>
          </form>
        </div>


        <!-- Modern Horizontal Wizard -->
        <section class="modern-horizontal-wizard">
          <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
              <div class="step" data-target="#account-details-modern">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-box">
                    <i data-feather="file-text" class="font-medium-3"></i>
                  </span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Tawar</span>
                    <span class="bs-stepper-subtitle">Tawar</span>
                  </span>
                </button>
              </div>
              <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
              </div>
              <div class="step" data-target="#personal-info-modern">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-box">
                    <i data-feather="user" class="font-medium-3"></i>
                  </span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-title">KIV</span>
                    <span class="bs-stepper-subtitle">KIV</span>
                  </span>
                </button>
              </div>
              <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
              </div>
              <div class="step" data-target="#address-step-modern">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-box">
                    <i data-feather="map-pin" class="font-medium-3"></i>
                  </span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Tolak</span>
                    <span class="bs-stepper-subtitle">Tolak</span>
                  </span>
                </button>
              </div>
              <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
              </div>
              <div class="step" data-target="#hadir-temuduga">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-box">
                    <i data-feather="user" class="font-medium-3"></i>
                  </span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Hadir Temuduga</span>
                    <span class="bs-stepper-subtitle">Hadir Temuduga</span>
                  </span>
                </button>
              </div>
            </div>
            <div class="bs-stepper-content">

              <div id="account-details-modern" class="content">
                <div class="content-header">
                  <h5 class="mb-0">Tawar</h5>

                </div>

                <div class="card-datatable">

                  <table class="dt-advanced-search-2 table">

                    <thead>
                      <tr class="text-center">
                        <th></th>
                        <th>No.KP</th>
                        <th>{!! __('locale.Name') !!}</th>
                        <th>Jenis</th>
                        <th>Negeri</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>Sijil</th>
                        <th>P.T'Duga</th>
                        <th>Sesi</th>
                        <th>Cdgn1</th>
                        <th>Cdgn2</th>
                        <th>Markah</th>
                        <th>Tawar</th>
                        <th>Sem</th>
                        <th>T.Tawar</th>
                        <th>{!! __('locale.Action') !!}</th>
                      </tr>

                    </thead>
                    @php
                    $count = 1;
                    @endphp

                    <tbody>

                      @foreach ($ditawar as $ditawarr)

                      @php
                      $too = 0; 

                      @endphp
                      <tr class="text-center">
                        <td>{{$count++}}</td>
                        <td>{{$ditawarr['nric']}}</td>
                        <td>{{$ditawarr['name']}}</td>
                        <td>{{$ditawarr['type_program_applied']}}</td>
                        <td>{{$ditawarr['state']}}</td>
                        @foreach ($program as $Program)
                
                @if ($Program['nric'] == $ditawarr['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($ditawarr['kelulusan1'] == 'L' || $ditawarr['kelulusan1'] == 'G')
                <td>{{$Program['program']}}-{{$ditawarr['kelulusan1']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$ditawarr['kelulusan1']}}</td>
                @endif
                @else
                @if ($ditawarr['kelulusan2'] == 'L' || $ditawarr['kelulusan2'] == 'G')
                <td>{{$Program['program']}}-{{$ditawarr['kelulusan2']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$ditawarr['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                <td>{{$ditawarr['cert_related_program']}}</td>
                        <td>{{$ditawarr['code_center']}}</td>
                        <td>{{$ditawarr['number_session']}}</td>

                        @if(!empty($cadang1ditawar))
                        @foreach ($cadang1ditawar as $Cadang1ditawar)
                        @if($Cadang1ditawar['nric'] == $ditawarr['nric'])
                        <td>{{$Cadang1ditawar['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif

                        @if(!empty($cadang2ditawar))
                        @foreach ($cadang2ditawar as $Cadang2ditawar)
                        @if($Cadang2ditawar['nric'] == $ditawarr['nric'])
                        <td>{{$Cadang2ditawar['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        
                        <td>{{$ditawarr['markah']}}</td>
                        
                        @if(!empty($programditawar))
                        @foreach ($programditawar as $Programditawar)
                        @if($Programditawar['nric'] == $ditawarr['nric'])
                        <td>{{$Programditawar['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        <td>{{$ditawarr['sem']}}</td>
                        <td>{{$ditawarr['TarikhTawar'] ? Carbon\Carbon::parse($ditawarr['TarikhTawar'])->format('Y-m-d') : ' '}}</td>
                        <td>
                          <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                          <a href="{{ route('display_penawarabynric', Crypt::encrypt($ditawarr['nric'])) }}" class="btn-sm btn-warning">Temuduga</a>
                          <a href="{{ route('KIV_penawaran', Crypt::encrypt($ditawarr['nric'])) }}" class="btn-sm btn-warning">KIV</a>
                          <a href="{{ route('tolak_penawaran', Crypt::encrypt($ditawarr['nric'])) }}" class="btn-sm btn-warning">Tolak</a>
                          <a href="{{ route('hadir_penawaran', Crypt::encrypt($ditawarr['nric'])) }}" class="btn-sm btn-danger">
                            Batal
                          </a>

                        </td>

                      </tr>
                      @endforeach


                    </tbody>


                  </table>

                </div>

              </div>
              <div id="personal-info-modern" class="content">
                <div class="content-header">
                  <h5 class="mb-0">KIV</h5>

                </div>
                <div class="card-datatable">
                  <table class="dt-advanced-search-2 table">
                    <thead>
                      <tr class="text-center">
                        <th></th>
                        <th>No.KP</th>
                        <th>{!! __('locale.Name') !!}</th>
                        <th>Jenis</th>
                        <th>Negeri</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>Sijil</th>
                        <th>P.T'Duga</th>
                        <th>Sesi</th>
                        <th>Cdgn1</th>
                        <th>Cdgn2</th>
                        <th>Markah</th>
                        <th>Tawar</th>
                        <th>Sem</th>
                        <th>T.Tawar</th>
                        <th>{!! __('locale.Action') !!}</th>
                      </tr>

                    </thead>
                    <tbody>
                      @php
                      $count = 1;
                      @endphp

                      @foreach ($kiv as $kivv)

                      @php
                      $too = 0; 

                      @endphp
                      <tr class="text-center">
                        <td>{{$count++}}</td>
                        <td>{{$kivv['nric']}}</td>
                        <td>{{$kivv['name']}}</td>
                        <td>{{$kivv['type_program_applied']}}</td>
                        <td>{{$kivv['state']}}</td>
                        @foreach ($program as $Program)
                
                @if ($Program['nric'] == $kivv['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($kivv['kelulusan1'] == 'L' || $kivv['kelulusan1'] == 'G')
                <td>{{$Program['program']}}-{{$kivv['kelulusan1']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$kivv['kelulusan1']}}</td>
                @endif
                @else
                @if ($kivv['kelulusan2'] == 'L' || $kivv['kelulusan2'] == 'G')
                <td>{{$Program['program']}}-{{$kivv['kelulusan2']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$kivv['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                <td>{{$kivv['cert_related_program']}}</td>
                        <td>{{$kivv['code_center']}}</td>
                        <td>{{$kivv['number_session']}}</td>

                        @if(!empty($cadang1kiv))
                        @foreach ($cadang1kiv as $Cadang1kiv)
                        @if($Cadang1kiv['nric'] == $kivv['nric'])
                        <td>{{$Cadang1kiv['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif

                        @if(!empty($cadang2kiv))
                        @foreach ($cadang2kiv as $Cadang2kiv)
                        @if($Cadang2kiv['nric'] == $kivv['nric'])
                        <td>{{$Cadang2kiv['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        
                        <td>{{$kivv['markah']}}</td>
                        
                        @if(!empty($programkiv))
                        @foreach ($programkiv as $Programkiv)
                        @if($Programkiv['nric'] == $kivv['nric'])
                        <td>{{$Programkiv['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        <td>{{$kivv['sem']}}</td>
                        <td>{{$kivv['TarikhTawar'] ? Carbon\Carbon::parse($kivv['TarikhTawar'])->format('Y-m-d') : ' '}} </td>
                        <td>
                          <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                          <a href="{{ route('display_penawarabynric', Crypt::encrypt($kivv['nric'])) }}" class="btn-sm btn-warning">Temuduga</a>
                          <a href="{{ route('tolak_penawaran', Crypt::encrypt($kivv['nric'])) }}" class="btn-sm btn-warning">Tolak</a>
                          <a href="{{ route('hadir_penawaran', Crypt::encrypt($kivv['nric'])) }}" class="btn-sm btn-danger">
                            Batal
                          </a>

                        </td>

                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>

              <div id="address-step-modern" class="content">
                <div class="content-header">
                  <h5 class="mb-0">Tolak</h5>

                </div>
                <div class="card-datatable">
                  <table class="dt-advanced-search-2 table">
                    <thead>
                      <tr class="text-center">
                        <th></th>
                        <th>No.KP</th>
                        <th>{!! __('locale.Name') !!}</th>
                        <th>Jenis</th>
                        <th>Negeri</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>Sijil</th>
                        <th>P.T'Duga</th>
                        <th>Sesi</th>
                        <th>Cdgn1</th>
                        <th>Cdgn2</th>
                        <th>Markah</th>
                        <th>Tawar</th>
                        <th>Sem</th>
                        <th>T.Tawar</th>
                        <th>{!! __('locale.Action') !!}</th>

                      </tr>

                    </thead>
                    <tbody>
                      @php
                      $count = 1;
                      @endphp

                      @foreach ($ditolak as $ditolakk)

                      @php
                      $too = 0; 

                      @endphp
                      <tr class="text-center">
                        <td>{{$count++}}</td>
                        <td>{{$ditolakk['nric']}}</td>
                        <td>{{$ditolakk['name']}}</td>
                        <td>{{$ditolakk['type_program_applied']}}</td>
                        <td>{{$ditolakk['state']}}</td>
                       
                        @foreach ($program as $Program)
                
                @if ($Program['nric'] == $ditolakk['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($ditolakk['kelulusan1'] == 'L' || $ditolakk['kelulusan1'] == 'G')
                <td>{{$Program['program']}}-{{$ditolakk['kelulusan1']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$ditolakk['kelulusan1']}}</td>
                @endif
                @else
                @if ($ditolakk['kelulusan2'] == 'L' || $ditolakk['kelulusan2'] == 'G')
                <td>{{$Program['program']}}-{{$ditolakk['kelulusan2']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$ditolakk['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                <td>{{$ditolakk['cert_related_program']}}</td>
                        <td>{{$ditolakk['code_center']}}</td>
                        <td>{{$ditolakk['number_session']}}</td>

                        @if(!empty($cadang1ditolak))
                        @foreach ($cadang1ditolak as $Cadang1ditolak)
                        @if($Cadang1ditolak['nric'] == $ditolakk['nric'])
                        <td>{{$Cadang1ditolak['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif

                        @if(!empty($cadang2ditolak))
                        @foreach ($cadang2ditolak as $Cadang2ditolak)
                        @if($Cadang2ditolak['nric'] == $ditolakk['nric'])
                        <td>{{$Cadang2ditolak['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        
                        <td>{{$ditolakk['markah']}}</td>
                        
                        @if(!empty($programditolak))
                        @foreach ($programditolak as $Programditolak)
                        @if($Programditolak['nric'] == $ditolakk['nric'])
                        <td>{{$Programditolak['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        <td>{{$ditolakk['sem']}}</td>
                        <td>{{$ditolakk['TarikhTawar'] ? Carbon\Carbon::parse($ditolakk['TarikhTawar'])->format('Y-m-d') : ' '}}</td>
                        <td>
                          <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                          <a href="{{ route('display_penawarabynric', Crypt::encrypt($ditolakk['nric'])) }}" class="btn-sm btn-warning">Temuduga</a>
                          <a href="{{ route('KIV_penawaran', Crypt::encrypt($ditolakk['nric'])) }}" class="btn-sm btn-warning">KIV</a>
                          <a href="{{ route('hadir_penawaran', Crypt::encrypt($ditolakk['nric'])) }}" class="btn-sm btn-danger">
                            Batal
                          </a>

                        </td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <div id="hadir-temuduga" class="content">
                <div class="content-header">
                  <h5 class="mb-0">Hadir Temuduga</h5>

                </div>
                <div class="card-datatable">
                  <table class="dt-advanced-search-2 table">
                    <thead>
                      <tr class="text-center">
                        <th></th>
                        <th>No.KP</th>
                        <th>{!! __('locale.Name') !!}</th>
                        <th>Jenis</th>
                        <th>Negeri</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>Sijil</th>
                        <th>P.T'Duga</th>
                        <th>Sesi</th>
                        <th>Cdgn1</th>
                        <th>Cdgn2</th>
                        <th>Markah</th>
                        <th>Tawar</th>
                        <th>Sem</th>
                        <th>T.Tawar</th>
                        <th>{!! __('locale.Action') !!}</th>

                      </tr>

                    </thead>
                    <tbody>
                      @php
                      $count = 1;
                      @endphp

                      @foreach ($hadir as $hadirr)

                      @php
                      $too = 0; 

                      @endphp
                      <tr class="text-center">
                        <td>{{$count++}}</td>
                        <td>{{$hadirr['nric']}}</td>
                        <td>{{$hadirr['name']}}</td>
                        <td>{{$hadirr['type_program_applied']}}</td>
                        <td>{{$hadirr['state']}}</td>
                       
                        @foreach ($program as $Program)
                
                @if ($Program['nric'] == $hadirr['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($hadirr['kelulusan1'] == 'L' || $hadirr['kelulusan1'] == 'G')
                <td>{{$Program['program']}}-{{$hadirr['kelulusan1']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$hadirr['kelulusan1']}}</td>
                @endif
                @else
                @if ($hadirr['kelulusan2'] == 'L' || $hadirr['kelulusan2'] == 'G')
                <td>{{$Program['program']}}-{{$hadirr['kelulusan2']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$hadirr['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                        <td>{{$hadirr['cert_related_program']}}</td>
                        <td>{{$hadirr['code_center']}}</td>
                        <td>{{$hadirr['number_session']}}</td>

                        @if(!empty($cadang1hadir))
                        @foreach ($cadang1hadir as $Cadang1hadir)
                        @if($Cadang1hadir['nric'] == $hadirr['nric'])
                        <td>{{$Cadang1hadir['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif

                        @if(!empty($cadang2hadir))
                        @foreach ($cadang2hadir as $Cadang2hadir)
                        @if($Cadang2hadir['nric'] == $hadirr['nric'])
                        <td>{{$Cadang2hadir['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif
                        
                        <td>{{$hadirr['markah']}}</td>
                        
                        @if(!empty($programhadir))
                        @foreach ($programhadir as $Programhadir)
                        @if($Programhadir['nric'] == $hadirr['nric'])
                        <td>{{$Programhadir['program']}}
                        @else
                        <td></td>
                        @endif
                        @endforeach
                        @else
                        <td></td>
                        @endif

                        <td>{{$hadirr['sem']}}</td>
                        <td>{{$hadirr['TarikhTawar'] ? Carbon\Carbon::parse($hadirr['TarikhTawar'])->format('Y-m-d') : ' '}}</td>
                        <td>
                          <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>


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
        <!-- /Modern Horizontal Wizard -->

        <hr class="my-0" />

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
<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>

@endsection