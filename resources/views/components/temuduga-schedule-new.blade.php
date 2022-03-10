
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
          <h4 class="card-title">{!! __('locale.Interview Schedule') !!}</h4>
        </div>
        <div class="card-body mt-2">    
          <form class="dt_adv_search" method="POST">
            <div class="row g-1 mb-md-1">
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

        <!--Search Form -->
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.No.KP') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Program') !!}</th>
                <th>{!! __('locale.Session') !!}</th>
                <th>{!! __('locale.Date') !!}</th>
                <th>{!! __('locale.Start Time') !!}</th>
                <th>{!! __('locale.End Time') !!}</th>
              </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>                  
                  </td>               
                </tr>       
            </tbody>
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
