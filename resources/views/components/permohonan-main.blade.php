
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
          <h4 class="card-title">Permohonan</h4>
        </div>
        
        <!--Search Form -->
        <div class="card-body mt-2">
          <div class="row g-1 md-1">
            <div class="col-md-4">
              <a href="{{ route('registration') }}" class="btn btn-success"> 
                <i data-feather="plus-circle" class="me-25"></i>
                <span>Permohonan Baru</span>
              </a>
            </div>
          </div>
        </div>
        <!-- <hr class="my-0" /> -->
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>ID Permohonan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Tarikh & Masa</th>
                <th></th>
              </tr>

            </thead>
            <tbody>
            
              @php  
                $count = 1;
              @endphp

              @foreach ($applications as $application)
                <tr class="text-center">
                  <td>{{$count++}}</td>
                  <td>{{$application['job_id']}}</td>
                  <td>Permohonan Baru</td>
                  <td>{{$application['status_validation']}}</td>
                  <td>{{ \Carbon\Carbon::parse($application['created_at'])}}</td>
                  <td>
                    <a href="{{ route('details_program', Crypt::encrypt($application['code'])) }}" class="btn-sm btn-warning"> <i data-feather='external-link'></i>{!! __('locale.Details') !!}</a>
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
