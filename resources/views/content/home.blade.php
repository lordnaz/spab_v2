@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

@php  

$roles = auth()->user()->role;

@endphp
<!-- Kick start -->
<div class="card border-danger">
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
  
</div>
<!--/ Kick start -->

<!-- Miscellaneous Charts -->
<div class="row match-height">

    <!--/ Line Chart -->
    <div class="col-lg-12 col-12">
      <div class="card card-statistics">

        <div class="card-header">
          <h4 class="card-title">Statistic</h4>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li>
                <a data-action="collapse"><i data-feather="chevron-down"></i></a>
              </li>
              <li>
                <a data-action="reload"><i data-feather="rotate-cw"></i></a>
              </li>
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
                      <i data-feather="trending-up" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="my-auto">
                    <h4 class="fw-bolder mb-0">43</h4>
                    <p class="card-text font-small-3 mb-0">Transaction</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                <div class="d-flex flex-row">
                  <div class="avatar bg-light-info me-2">
                    <div class="avatar-content">
                      <i data-feather="dollar-sign" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="my-auto">
                    <h4 class="fw-bolder mb-0">MYR 9745</h4>
                    <p class="card-text font-small-3 mb-0">Transaction Value</p>
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
                    <h4 class="fw-bolder mb-0">MYR 4.16</h4>
                    <p class="card-text font-small-3 mb-0">Rate / USD</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="d-flex flex-row">
                  <div class="avatar bg-light-success me-2">
                    <div class="avatar-content">
                      <a href="https://wa.link/gz22eh" class="href" target="_blank">
                        <i data-feather="message-circle" class="avatar-icon"></i>
                      </a>
                    </div>
                  </div>
                  <div class="my-auto">
                    <h4 class="fw-bolder mb-0">Contact Us!</h4>
                    <p class="card-text font-small-3 mb-0">via Whatsapp</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
