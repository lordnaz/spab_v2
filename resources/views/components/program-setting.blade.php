
@extends('layouts/contentLayoutMaster')



@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
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
          <h4 class="card-title">{!! __('locale.Programme Setting') !!}</h4>
        </div>
        
        <!--Search Form -->
        <div class="card-body mt-2">
          <div class="row g-1 mb-md-1">
            <div class="col-md-4">
              <button type="button" class="btn btn-success">
                <i data-feather="plus-circle" class="me-25"></i>
                <span>{!! __('locale.New Program') !!}</span>
              </button>
            </div>
          </div>

          <form class="dt_adv_search" method="POST">
            <div class="row g-1 mb-md-1">
              <div class="col-md-4">
                <label class="form-label">{!! __('locale.Program Name') !!}:</label>
                <input
                  type="text"
                  class="form-control dt-input dt-full-name"
                  data-column="1"
                  placeholder="Alaric Beslier"
                  data-column-index="0"
                />
              </div>
              <div class="col-md-4">
                <label class="form-label">{!! __('locale.Program Code') !!}:</label>
                <select id="choosePlan" name="email" class="form-select" aria-label="Choose Plan">
                    <option selected disabled>Pilih Kod</option>
                    <option value="standard">kocrevy0@thetimes.co.uk</option>
                    <option value="exclusive">Exclusive - $249/month</option>
                    <option value="Enterprise">Enterprise - $499/month</option>
                </select>
                <!-- <input
                  type="text"
                  class="form-control dt-input"
                  data-column="2"
                  placeholder="demo@example.com"
                  data-column-index="1"
                /> -->
              </div>
              <div class="col-md-4">
                <label class="form-label">{!! __('locale.Faculty') !!}:</label>
                <select class="select2 form-select" id="addMemberSelect">
                    <option selected disabled>Pilih Fakulti</option>
                    <option data-avatar="1-small.png" value="Jane Foster">Jane Foster</option>
                    <option data-avatar="3-small.png" value="Donna Frank">Donna Frank</option>
                    <option data-avatar="5-small.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                    <option data-avatar="7-small.png" value="Lori Spears">Lori Spears</option>
                    <option data-avatar="9-small.png" value="Sandy Vega">Sandy Vega</option>
                    <option data-avatar="11-small.png" value="Cheryl May">Cheryl May</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <hr class="my-0" />
        <div class="card-datatable">
          <table class="dt-advanced-search table">
            <thead>
              <tr>
                <th></th>
                <th>{!! __('locale.Code') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Type') !!}</th>
                <th>{!! __('locale.Faculty') !!}</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <!-- <tfoot>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Post</th>
                <th>City</th>
                <th>Date</th>
                <th>Salary</th>
              </tr>
            </tfoot> -->
          </table>
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
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
@endsection
