@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

@php  

$roles = auth()->user()->role;

@endphp
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

@if($roles == 'admin')

  <!-- Miscellaneous Charts -->
<div class="row match-height">

  <!--/ Line Chart -->
  <div class="col-lg-12 col-12">
    <div class="card card-statistics border-primary">

      <div class="card-header bg-light-primary">
        <h4 class="card-title">Statistik Permohonan Kemasukan Pelajar Baharu</h4>
        
        <div class="heading-elements">
        <div class="btn-group">
          <button
            type="button"
            class="btn btn-primary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            2022
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">2020</a>
            <a class="dropdown-item" href="#">2021</a>
            <a class="dropdown-item" href="#">2022</a>
            <a class="dropdown-item" href="#">2023</a>
            <a class="dropdown-item" href="#">2024</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a> -->
          </div>
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
                  <h4 class="fw-bolder mb-0">43</h4>
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
                  <h4 class="fw-bolder mb-0">13</h4>
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
                  <h4 class="fw-bolder mb-0">20</h4>
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
                  <h4 class="fw-bolder mb-0">10</h4>
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
                  <h4 class="fw-bolder mb-0">13</h4>
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
                  <h4 class="fw-bolder mb-0">7</h4>
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
                  <h4 class="fw-bolder mb-0">2</h4>
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
                  <h4 class="fw-bolder mb-0">4</h4>
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
                  <h4 class="fw-bolder mb-0">150</h4>
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
                  <h4 class="fw-bolder mb-0">125</h4>
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
                  <h4 class="fw-bolder mb-0">10</h4>
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
                  <h4 class="fw-bolder mb-0">15</h4>
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
                  <h4 class="fw-bolder mb-0">40</h4>
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
                  <h4 class="fw-bolder mb-0">32</h4>
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
                  <h4 class="fw-bolder mb-0">2</h4>
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
                  <h4 class="fw-bolder mb-0">6</h4>
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
                  <h4 class="fw-bolder mb-0">5</h4>
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
                  <h4 class="fw-bolder mb-0">4</h4>
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
                  <h4 class="fw-bolder mb-0">0</h4>
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
                  <h4 class="fw-bolder mb-0">1</h4>
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
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Pendaftaran baharu</h6>
                  <span class="timeline-event-time me-1">2 Jul 2022</span>
                </div>
                <p>Dihantar pada 2:12pm</p>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Permohonan disahkan </h6>
                  <span class="timeline-event-time me-1">10 Jul 2022</span>
                </div>
                <p>Disahkan pada 10:15am</p> oleh <strong>Dr. Ahmad Nifsu</strong>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Terima Process Temuduga</h6>
                  <span class="timeline-event-time me-1">10 Jul 2022</span>
                </div>
                <p>Diterima pada 10:15am</p> oleh <strong>Wan Zuraida</strong>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Temuduga Berjalan</h6>
                  <span class="timeline-event-time me-1">12 Jul 2022</span>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Tawaran diterima</h6>
                  <span class="timeline-event-time me-1">15 Jul 2022</span>
                </div>
                <p class="mb-0">Surat Tawaran</p>
                <div class="d-flex flex-row align-items-center mt-50">
                  <img class="me-1" src="{{asset('images/icons/pdf.png')}}" alt="data.json" height="25" />
                  <h6 class="mb-0">Surat_Tawaram.pdf</h6>
                </div>
              </div>
            </li>
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
