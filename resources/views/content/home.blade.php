@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

@php  

$test = Session::get('display');

$roles = auth()->user()->role;

@endphp
@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

<!-- Kick start -->
<!-- <div class="card border-danger">
  <div class="card-header">
    <h4 class="card-title">{!! __('locale.Announcements') !!} 🚀</h4>
    <div class="heading-elements">
      <ul class="list-inline mb-0">
        <li>
          <a data-action="collapse"><i data-feather="chevron-down"></i></a>
        </li>
        <li>
          <a data-action="reload"><i data-feather="rotate-cw"></i></a>
        </li>
        <li>
          <a data-action="close"><i data-feather="x"></i></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="card-content collapse show">
    <div class="card-body">
      <div class="card-text">

        @if($roles == 'admin')
          <div class="alert alert-warning" role="alert">
            <div class="alert-body">
              System currently in development mode. Most of the features will be available in future releases.
            </div>
          </div>

          <div class="alert alert-danger" role="alert">
            <div class="alert-body">
              {!! __('locale.KYC_alert') !!}
            </div>
            
          </div>

          <div class="alert alert-warning" role="alert">
            <div class="alert-body">
              {!! __('locale.trade_acc_alert') !!}
            </div>
          </div>
        @else

          <div class="alert alert-warning" role="alert">
            <div class="alert-body">
              System currently in development mode. Most of the features will be available in future releases.
            </div>
          </div>

        @endif

      </div>
    </div>
  </div>
  
</div> -->
<!--/ Kick start -->
{{$test}}
@if($roles == 'admin')

  <!-- Miscellaneous Charts -->
<div class="row match-height">

  <!--/ Line Chart -->
  <div class="col-lg-12 col-12">
    <div class="card card-statistics border-primary">

      <div class="card-header bg-light-primary">
        <h4 class="card-title">Statistik Permohonan Kemasukan Pelajar Baharu</h4>
        
        <div class="heading-elements">
        <div class="form-group">
            
            <select class="custom-select" id="myselect">
              <option @if($display == "2020") selected @endif value="2020">2020</option>
              <option @if($display == "2021") selected @endif value="2021">2021</option>
              <option @if($display == "2022") selected @endif value="2022">2022</option>
             
            </select>
          </div>
      
          <ul class="list-inline mb-0">
            <!-- <li>
              <a data-action="collapse"><i data-feather="chevron-down"></i></a>
            </li> -->
            <!-- <li>
              <a data-action="reload"><i data-feather="rotate-cw"></i></a>
            </li> -->
            <!-- <li>
              <a data-action="close"><i data-feather="x"></i></a>
            </li> -->
          </ul>
        </div>
      </div>

      <div class="card-content collapse show">
        <div class="card-body statistics-body">
          <div class="row">

            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="layers" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$asasi}}</h4>
                  <p class="card-text font-small-3 mb-0">ASASI SENI KREATIF</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="dollar-sign" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$asasite}}</h4>
                  <p class="card-text font-small-3 mb-0">Berjaya</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$asasito}}</h4>
                  <p class="card-text font-small-3 mb-0">Ditolak</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-warning me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="message-circle" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$asasip}}</h4>
                  <p class="card-text font-small-3 mb-0">Dalam Proses</p>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="layers" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$diploma}}</h4>
                  <p class="card-text font-small-3 mb-0">DIPLOMA</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="dollar-sign" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$diplomate}}</h4>
                  <p class="card-text font-small-3 mb-0">Berjaya</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$diplomato}}</h4>
                  <p class="card-text font-small-3 mb-0">Ditolak</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-warning me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="message-circle" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$diplomap}}</h4>
                  <p class="card-text font-small-3 mb-0">Dalam Proses</p>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="layers" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanamuda}}</h4>
                  <p class="card-text font-small-3 mb-0">IJAZAH SARJANA MUDA</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="dollar-sign" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanamudate}}</h4>
                  <p class="card-text font-small-3 mb-0">Berjaya</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanamudato}}</h4>
                  <p class="card-text font-small-3 mb-0">Ditolak</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-warning me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="message-circle" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanamudap}}</h4>
                  <p class="card-text font-small-3 mb-0">Dalam Proses</p>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="layers" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjana}}</h4>
                  <p class="card-text font-small-3 mb-0">IJAZAH SARJANA</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="dollar-sign" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanate}}</h4>
                  <p class="card-text font-small-3 mb-0">Berjaya</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanato}}</h4>
                  <p class="card-text font-small-3 mb-0">Ditolak</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-warning me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="message-circle" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sarjanap}}</h4>
                  <p class="card-text font-small-3 mb-0">Dalam Proses</p>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="layers" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$doktor}}</h4>
                  <p class="card-text font-small-3 mb-0">IJAZAH KEDOKTORAN</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="dollar-sign" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$doktorte}}</h4>
                  <p class="card-text font-small-3 mb-0">Berjaya</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$doktorto}}</h4>
                  <p class="card-text font-small-3 mb-0">Ditolak</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-warning me-2">
                  <div class="avatar-content">
                    <!-- <i data-feather="message-circle" class="avatar-icon"></i> -->
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$doktorp}}</h4>
                  <p class="card-text font-small-3 mb-0">Dalam Proses</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@else

<div class="row">
  <div class="col-md-8 col-sm-6 col-12 mb-2 mb-md-0">
      <!-- Activity Timeline -->
      <div class="card">
        <h4 class="card-header">Penjejak Permohonan</h4>
        <div class="card-body pt-1">
          <ul class="timeline ms-50">

          @if($status == 'Tiada')

          @else
          @if($status['all_status'] == 'BELUM DISAHKAN')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Pendaftaran Baharu</h6>
                  <span class="timeline-event-time me-1">{{$status['submit_permohonan'] ? Carbon\Carbon::parse($status['submit_permohonan'])->format('d/m/y'): ''}}</span>
                </div>
                <p>Dihantar pada {{$status['submit_permohonan'] ? Carbon\Carbon::parse($status['submit_permohonan'])->format('h:i A'): ''}}</p>
              </div>
            </li>
            @endif
            @if($status['status_validation'] == 'SAH' || $status['status_validation'] == 'Temuduga')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Permohonan Disahkan </h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($status['updated_date_validation'])->format('d/m/y')}}</span>
                </div>
                <p>Disahkan pada {{Carbon\Carbon::parse($status['updated_date_validation'])->format('h:i A')}}</p>
              </div>
            </li>
            @elseif($status['status_validation'] == 'TOLAK')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Permohonan Ditolak </h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($status['updated_date_validation'])->format('d/m/y')}}</span>
                </div>
                <p>Ditolak pada {{Carbon\Carbon::parse($status['updated_date_validation'])->format('h:i A')}}</p> 
              </div>
            </li>
            @endif
            @if($status['status_temuduga'] == 'Temuduga' || $status['status_temuduga'] == 'Hadir' || $status['status_temuduga'] == 'Tidak Hadir' || $status['status_temuduga'] == 'Ditawarkan' || $status['status_temuduga'] == 'Kiv' || $status['status_temuduga'] == 'Ditolak')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Process Permohonan Terima Temuduga</h6>
                  <span class="timeline-event-time me-1">{{$status['TarikhProses'] ? Carbon\Carbon::parse($status['TarikhProses'])->format('d/m/y'): ''}}</span>
                </div>
                <p>Diterima pada {{$status['TarikhProses'] ? Carbon\Carbon::parse($status['TarikhProses'])->format('h:i A'): ''}}</p> 
              </div>
            </li>
            @elseif($status['status_temuduga'] == 'Tolak')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Process Permohonan Ditolak</h6>
                  <span class="timeline-event-time me-1">{{$status['updated_date_offer'] ? Carbon\Carbon::parse($status['updated_date_offer'])->format('d/m/y'): ''}}</span>
                </div>
                <p>Ditolak pada {{$status['updated_date_offer'] ? Carbon\Carbon::parse($status['updated_date_offer'])->format('h:i A'): ''}}</p>
              </div>
            </li>
            @endif
            @if($status['status_temuduga'] == 'Temuduga' || $status['status_temuduga'] == 'Hadir' || $status['status_temuduga'] == 'Tidak Hadir' || $status['status_temuduga'] == 'Ditawarkan' || $status['status_temuduga'] == 'Kiv' || $status['status_temuduga'] == 'Ditolak')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Temuduga Berjalan</h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($iv['updated_at'])->format('d/m/y')}}</span>    
                </div>
                <p>Maklumat Temuduga </p>
                  <p>Tarikh : {{$iv['TarikhHadir'] ? Carbon\Carbon::parse($iv['TarikhHadir'])->format('d/m/y') : ' '}} </p>
                  <p>Masa : {{$iv['MasaFrom'] ? Carbon\Carbon::parse($iv['MasaFrom'])->format('h:i A') : ' '}} - {{$iv['MasaTo'] ? Carbon\Carbon::parse($iv['MasaTo'])->format('h:i A') : ' '}} </p>
                  @if ($status['status_temuduga'] == 'Hadir' || $status['status_temuduga'] == 'Ditawarkan' || $status['status_temuduga'] == 'Kiv' || $status['status_temuduga'] == 'Ditolak')
                  <strong>Hadir Temuduga</strong>
                  @elseif ($status['status_temuduga'] == 'Tidak Hadir')
                  <strong>Tidak Hadir Temuduga</strong>
                  @endif
              </div>
            </li>
            @endif
            @if($status['status_offer'] == 'Ditawarkan' || $status['status_offer'] == 'TERIMA TAWARAN' || $status['status_offer'] == 'TOLAK TAWARAN')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Tawaran Diterima</h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($status['TarikhTawar'])->format('d/m/y')}}</span>
                </div>
               
                <p class="mb-0">Surat Tawaran</p>
                <div class="d-flex flex-row align-items-center mt-50">
                  <img class="me-1" src="{{asset('images/icons/pdf.png')}}" alt="data.json" height="25" />
                  <h6 class="mb-0">Surat_Tawaram.pdf</h6>
                </div>
              </div>
            </li>
            @elseif ($status['status_offer'] == 'Dalam Pemerhatian (KIV)')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Dalam Pemerhatian (KIV)</h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($status['TarikhTawar'])->format('d/m/y')}}</span>
                </div>
               
              </div>
            </li>
            @elseif ($status['status_offer'] == 'Ditolak')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Tawaran Ditolak</h6>
                  <span class="timeline-event-time me-1">{{Carbon\Carbon::parse($status['TarikhTawar'])->format('d/m/y')}}</span>
                </div>
               
              </div>
            </li>
            @endif
            @if($status['balasan_calon'] == 'TERIMA TAWARAN' || $status['balasan_calon'] == 'DAFTAR')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Calon Menerima Tawaran</h6>
                  <span class="timeline-event-time me-1">{{$status['tarikh_balasan'] ? Carbon\Carbon::parse($status['tarikh_balasan'])->format('d/m/y'): ''}}</span>
                </div>
           <p> Menerima tawaran pada {{$status['tarikh_balasan'] ? Carbon\Carbon::parse($status['tarikh_balasan'])->format('h:i A'): ''}}</p>
              </div>
            </li>
            @elseif ($status['balasan_calon'] == 'TOLAK TAWARAN')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Calon Menolak Tawaran</h6>
                  <span class="timeline-event-time me-1">{{$status['tarikh_balasan'] ? Carbon\Carbon::parse($status['tarikh_balasan'])->format('d/m/y'): ''}}</span>
                </div>
                <p> Tawaran ditolak pada {{$status['tarikh_balasan'] ? Carbon\Carbon::parse($status['tarikh_balasan'])->format('h:i A'): ''}}</p>
              </div>
            </li>
            @endif
            @if($status['status_pendaftaran'] == 'DAFTAR')
            <li class="timeline-item">
              <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Calon Didaftar Sebagai Pelajar</h6>
                  <span class="timeline-event-time me-1">{{ Carbon\Carbon::parse($status['tarikh_pendaftaran'])->format('d/m/y')}}</span>
                </div>
                <p>Didaftar pada {{ Carbon\Carbon::parse($status['tarikh_pendaftaran'])->format('h:i A')}}</p>
          
              </div>
            </li>
            @endif
            @endif
          </ul>
        </div>
      </div>
      <!-- /Activity Timeline -->
  </div>

  <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
      <!-- Plan Card -->
      <div class="card border-primary">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <span class="badge bg-light-primary">Yuran Pendaftaran Pelajar</span>
            <div class="d-flex justify-content-center">
              <sup class="h5 pricing-currency text-primary mt-1 mb-0">RM</sup>
              <span class="fw-bolder display-5 mb-0 text-primary">155</span>
              <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2"></sub>
            </div>
          </div>
          <ul class="ps-1 mb-2">
            <li class="mb-50">Bayar sebelum tamat tempoh bagi mengelakkan denda.</li>
            <li class="mb-50">Bayaran diterima secara dalam talian dan tunai.</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
            <span>Tamat Tempoh : 24 Jul 2022</span>
            <!-- <span>Tamat Tempoh : 24 Jul 2022</span> -->
          </div>
          <div class="progress mb-50" style="height: 8px">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 80%"
              aria-valuenow="65"
              aria-valuemax="100"
              aria-valuemin="80"
            ></div>
          </div>
          <span>4 hari lagi</span>
          <div class="d-grid w-100 mt-2">
            <button class="btn btn-warning" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
              Bayar Yuran Online
            </button>
          </div>
        </div>
      </div>
      <!-- /Plan Card -->
  </div>

</div>



@endif
<script>

$(document).ready(function(){
  $('#myselect').change(function(){  
    setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);
                        var presence = $(this).val();  
                        $.ajax({  
                            url:"/displayajax",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   
    
   }
                        });  
                    });  

})

  </script>


<!-- Page layout -->
<!-- <div class="card">
  <div class="card-header">
    <h4 class="card-title">What is page layout?</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <p>
        Starter kit includes pages with different layouts, useful for your next project to start development process
        from scratch with no time.
      </p>
      <ul>
        <li>Each layout includes required only assets only.</li>
        <li>
          Select your choice of layout from starter kit, customize it with optional changes like colors and branding,
          add required dependency only.
        </li>
      </ul>
      <div class="alert alert-primary" role="alert">
        <div class="alert-body">
          <strong>Info:</strong> Please check the &nbsp;<a
            class="text-primary"
            href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layouts.html#layout-collapsed-menu"
            target="_blank"
            >Layout documentation</a
          >&nbsp; for more layout options i.e collapsed menu, without menu, empty & blank.
        </div>
      </div>
    </div>
  </div>
</div> -->
<!--/ Page layout -->
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
