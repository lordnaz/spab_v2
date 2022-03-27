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
                    <h4 class="card-title">{!! __('locale.Interview Setting') !!}</h4>
                </div>

                <!--Search Form -->
                <div class="card-body mt-2">


                    <form class="dt_adv_search" action="/pemprosesanTawaran" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                        @csrf
                        <div class="row">
                        <input hidden type="text" id="code" class="form-control" name="proses" value="{{($code)}}"/>
                            <div class="col-md-4">
                                <label class="form-label">Pusat Temuduga:</label>
                                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
                                    <option value="{{ route('PenawaranPermohonan') }}">Semua</option>

                                    <option value="{{ route('Penawaranpermohonan', 'Johor Darul Takzim') }}" @if($code=='Johor Darul Takzim' ) selected @endif>Johor Darul Takzim</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Kedah Darul Aman') }}" @if($code=='Kedah Darul Aman' ) selected @endif>Kedah Darul Aman</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Kelantan Darul Naim') }}" @if($code=='Kelantan Darul Naim' ) selected @endif>Kelantan Darul Naim</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Melaka') }}" @if($code=='Melaka' ) selected @endif>Melaka</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Negeri Sembilan Darul Khusus') }}" @if($code=='Negeri Sembilan Darul Khusus' ) selected @endif>Negeri Sembilan Darul Khusus</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Pahang Darul Makmur') }}" @if($code=='Pahang Darul Makmur' ) selected @endif>Pahang Darul Makmur</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Pulau Pinang') }}" @if($code=='Pulau Pinang' ) selected @endif>Pulau Pinang</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Perak Darul Ridzuan') }}" @if($code=='Perak Darul Ridzuan' ) selected @endif>Perak Darul Ridzuan</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Perlis Indra Kayangan') }}" @if($code=='Perlis Indra Kayangan' ) selected @endif>Perlis Indra Kayangan</option>
                                    <option value="{{ route('Penawaranpermohonan', 'JSelangor Darul Ehsan') }}" @if($code=='Selangor Darul Ehsan' ) selected @endif>Selangor Darul Ehsan</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Terengganu Darul Iman') }}" @if($code=='Terengganu Darul Iman' ) selected @endif>Terengganu Darul Iman</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Sabah') }}" @if($code=='Sabah' ) selected @endif>Sabah</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Sarawak') }}" @if($code=='Sarawak' ) selected @endif>Sarawak</option>
                                    <option value="{{ route('Penawaranpermohonan', 'W.P Kuala Lumpur') }}" @if($code=='W.P Kuala Lumpur' ) selected @endif>W.P Kuala Lumpur</option>
                                    <option value="{{ route('Penawaranpermohonan', 'W.P Labuan') }}" @if($code=='W.P Labuan' ) selected @endif>W.P Labuan</option>
                                    <option value="{{ route('Penawaranpermohonan', 'W.P Putrajaya') }}" @if($code=='W.P Putrajaya' ) selected @endif>W.P Putrajaya</option>
                                    <option value="{{ route('Penawaranpermohonan', 'Lain-lain') }}" @if($code=='Lain-lain' ) selected @endif>Lain-lain</option>
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

                                            @foreach ($ditawar And $cadang1ditawar And $cadang2ditawar And $programditawar as $ditawarr)

                                            @php
                                            $total = count($ditawarr['program']);

                                            @endphp
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$ditawarr['nric']}}</td>
                                                <td>{{$ditawarr['name']}}</td>
                                                <td>{{$ditawarr['type_program_applied']}}</td>
                                                <td>{{$ditawarr['state']}}</td>
                                                @if ($total == '2')
                                                @foreach ($ditawarr as $ditawarrr)

                                                @if($loop->first)
                                                @if ($ditawarr['kelulusan1'] == 'L' || $ditawarr['kelulusan1'] == 'G' )
                                                <td>{{$ditawarrr['program']}}-{{$ditawarr['kelulusan1']}}</td>
                                                @else
                                                <td>{{$ditawarrr['program']}}-N{{$ditawarr['kelulusan1']}}</td>
                                                @endif
                                                @else
                                                @if ($ditawarr['kelulusan2'] == 'L' || $ditawarr['kelulusan2'] == 'G')
                                                <td>{{$ditawarrr['program']}}-{{$ditawarr['kelulusan2']}}</td>
                                                @else
                                                <td>{{$ditawarrr['program']}}-N{{$ditawarr['kelulusan2']}}</td>
                                                @endif

                                                @endif
                                                @endforeach
                                                @else
                                                @if ($ditawarr['kelulusan1'] == 'L' || $ditawarr['kelulusan1'] == 'G')
                                                <td>{{$ditawarrr['program']}}-{{$ditawarr['kelulusan1']}}</td>
                                                @else
                                                <td>{{$ditawarrr['program']}}-N{{$ditawarr['kelulusan1']}}</td>
                                                @endif
                                                <td></td>
                                                @endif
                                                <td>{{$ditawarr['cert_related_program']}}</td>
                                                <td>{{$ditawarr['code_center']}}</td>
                                                <td>{{$ditawarr['sesi']}}</td>
                                                <td>{{$ditawarr['cadang1code']}}</td>
                                                <td>{{$ditawarr['cadang2code']}}</td>
                                                <td>{{$ditawarr['markah']}}</td>
                                                <td>{{$ditawarr['programtawar']}}</td>
                                                <td>{{$ditawarr['sem']}}</td>
                                                <td>{{$ditawarr['tarikh_tawar'] ? Carbon\Carbon::parse($ditawarr['tarikh_tawar'])->format('Y-m-d') : ' '}}</td>
                                                <td>
                                                    <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                                                    <a href="" class="btn-sm btn-warning">Temuduga</a>
                                                    <a href="" class="btn-sm btn-warning">KIV</a>
                                                    <a href="" class="btn-sm btn-warning">Tolak</a>
                                                    <a href="" class="btn-sm btn-danger">
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

                                            @foreach ($kiv And $cadang1kiv And $cadang2kiv And $programkiv as $kivv)

                                            @php
                                            $total = count($kivv['program']);

                                            @endphp
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$kivv['nric']}}</td>
                                                <td>{{$kivv['name']}}</td>
                                                <td>{{$kivv['type_program_applied']}}</td>
                                                <td>{{$kivv['state']}}</td>
                                                @if ($total == '2')
                                                @foreach ($kivv as $kivvv)

                                                @if($loop->first)
                                                @if ($kivv['kelulusan1'] == 'L' || $kivv['kelulusan1'] == 'G' )
                                                <td>{{$kivvv['program']}}-{{$kivv['kelulusan1']}}</td>
                                                @else
                                                <td>{{$kivvv['program']}}-N{{$kivv['kelulusan1']}}</td>
                                                @endif
                                                @else
                                                @if ($kivv['kelulusan2'] == 'L' || $kivv['kelulusan2'] == 'G')
                                                <td>{{$kivvv['program']}}-{{$kivv['kelulusan2']}}</td>
                                                @else
                                                <td>{{$kivvv['program']}}-N{{$kivv['kelulusan2']}}</td>
                                                @endif

                                                @endif
                                                @endforeach
                                                @else
                                                @if ($kivv['kelulusan1'] == 'L' || $kivv['kelulusan1'] == 'G')
                                                <td>{{$kivvv['program']}}-{{$kivv['kelulusan1']}}</td>
                                                @else
                                                <td>{{$kivvv['program']}}-N{{$kivv['kelulusan1']}}</td>
                                                @endif
                                                <td></td>
                                                @endif
                                                <td>{{$kivv['cert_related_program']}}</td>
                                                <td>{{$kivv['code_center']}}</td>
                                                <td>{{$kivv['sesi']}}</td>
                                                <td>{{$kivv['cadang1code']}}</td>
                                                <td>{{$kivv['cadang2code']}}</td>
                                                <td>{{$kivv['markah']}}</td>
                                                <td>{{$kivv['programtawar']}}</td>
                                                <td>{{$kivv['sem']}}</td>
                                                <td>{{$kivv['tarikh_tawar'] ? Carbon\Carbon::parse($kivv['tarikh_tawar'])->format('Y-m-d') : ' '}}</td>
                                                <td>
                                                    <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                                                    <a href="" class="btn-sm btn-warning">Temuduga</a>
                                                    <a href="" class="btn-sm btn-warning">Tolak</a>
                                                    <a href="" class="btn-sm btn-danger">
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

                                            @foreach ($ditolak And $cadang1ditolak And $cadang2ditolak And $programditolak as $ditolakk)

                                            @php
                                            $total = count($ditolakk['program']);

                                            @endphp
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$ditolakk['nric']}}</td>
                                                <td>{{$ditolakk['name']}}</td>
                                                <td>{{$ditolakk['type_program_applied']}}</td>
                                                <td>{{$ditolakk['state']}}</td>
                                                @if ($total == '2')
                                                @foreach ($ditolakk as $ditolakkk)

                                                @if($loop->first)
                                                @if ($ditolakk['kelulusan1'] == 'L' || $ditolakk['kelulusan1'] == 'G' )
                                                <td>{{$ditolakkk['program']}}-{{$ditolakk['kelulusan1']}}</td>
                                                @else
                                                <td>{{$ditolakkk['program']}}-N{{$ditolakk['kelulusan1']}}</td>
                                                @endif
                                                @else
                                                @if ($ditolakk['kelulusan2'] == 'L' || $ditolakk['kelulusan2'] == 'G')
                                                <td>{{$ditolakkk['program']}}-{{$ditolakk['kelulusan2']}}</td>
                                                @else
                                                <td>{{$ditolakkk['program']}}-N{{$ditolakk['kelulusan2']}}</td>
                                                @endif

                                                @endif
                                                @endforeach
                                                @else
                                                @if ($ditolakk['kelulusan1'] == 'L' || $ditolakk['kelulusan1'] == 'G')
                                                <td>{{$ditolakkk['program']}}-{{$ditolakk['kelulusan1']}}</td>
                                                @else
                                                <td>{{$ditolakkk['program']}}-N{{$ditolakk['kelulusan1']}}</td>
                                                @endif
                                                <td></td>
                                                @endif
                                                <td>{{$ditolakk['cert_related_program']}}</td>
                                                <td>{{$ditolakk['code_center']}}</td>
                                                <td>{{$ditolakk['sesi']}}</td>
                                                <td>{{$ditolakk['cadang1code']}}</td>
                                                <td>{{$ditolakk['cadang2code']}}</td>
                                                <td>{{$ditolakk['markah']}}</td>
                                                <td>{{$ditolakk['programtawar']}}</td>
                                                <td>{{$ditolakk['sem']}}</td>
                                                <td>{{$ditolakk['tarikh_tawar'] ? Carbon\Carbon::parse($ditolakk['tarikh_tawar'])->format('Y-m-d') : ' '}}</td>
                                                <td>
                                                    <a href="" class="btn-sm btn-warning">{!! __('locale.Details') !!}</a>
                                                    <a href="" class="btn-sm btn-warning">Temuduga</a>
                                                    <a href="" class="btn-sm btn-warning">KIV</a>
                                                    <a href="" class="btn-sm btn-danger">
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

                                            @foreach ($hadir And $cadang1hadir And $cadang2hadir And $programhadir as $hadirr)

                                            @php
                                            $total = count($hadirr['program']);

                                            @endphp
                                            <tr class="text-center">
                                                <td>{{$count++}}</td>
                                                <td>{{$hadirr['nric']}}</td>
                                                <td>{{$hadirr['name']}}</td>
                                                <td>{{$hadirr['type_program_applied']}}</td>
                                                <td>{{$hadirr['state']}}</td>
                                                @if ($total == '2')
                                                @foreach ($hadirr as $hadirrr)

                                                @if($loop->first)
                                                @if ($hadirr['kelulusan1'] == 'L' || $hadirr['kelulusan1'] == 'G' )
                                                <td>{{$hadirrr['program']}}-{{$hadirr['kelulusan1']}}</td>
                                                @else
                                                <td>{{$hadirrr['program']}}-N{{$hadirr['kelulusan1']}}</td>
                                                @endif
                                                @else
                                                @if ($hadirr['kelulusan2'] == 'L' || $hadirr['kelulusan2'] == 'G')
                                                <td>{{$hadirrr['program']}}-{{$hadirr['kelulusan2']}}</td>
                                                @else
                                                <td>{{$$hadirrr['program']}}-N{{$hadirr['kelulusan2']}}</td>
                                                @endif

                                                @endif
                                                @endforeach
                                                @else
                                                @if ($hadirr['kelulusan1'] == 'L' || $hadirr['kelulusan1'] == 'G')
                                                <td>{{$hadirrr['program']}}-{{$hadirr['kelulusan1']}}</td>
                                                @else
                                                <td>{{$hadirrr['program']}}-N{{$hadirr['kelulusan1']}}</td>
                                                @endif
                                                <td></td>
                                                @endif
                                                <td>{{$hadirr['cert_related_program']}}</td>
                                                <td>{{$hadirr['code_center']}}</td>
                                                <td>{{$hadirr['sesi']}}</td>
                                                <td>{{$hadirr['cadang1code']}}</td>
                                                <td>{{$hadirr['cadang2code']}}</td>
                                                <td>{{$hadirr['markah']}}</td>
                                                <td>{{$hadirr['programtawar']}}</td>
                                                <td>{{$hadirr['sem']}}</td>
                                                <td>{{$hadirr['tarikh_tawar'] ? Carbon\Carbon::parse($hadirr['tarikh_tawar'])->format('Y-m-d') : ' '}}</td>
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