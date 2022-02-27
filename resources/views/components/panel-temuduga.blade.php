
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
          <h4 class="card-title">{!! __('locale.Interview Setting') !!}</h4>
        </div>
        
        <!--Search Form -->
        <div class="card-body mt-2">
          <div class="row g-1 md-1">
            <div class="col-md-4">
              <a href="{{ route('page_new_temuduga') }}" class="btn btn-success"> 
                <i data-feather="plus-circle" class="me-25"></i>
                <span>{!! __('locale.New Panel') !!}</span>
              </a>
            </div>
          </div>
        </div>

        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.No.KP') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Faculty') !!}</th>
                <th>{!! __('locale.Status') !!}</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($datas as $data)
                <tr class="text-center">
                  <td>{{$count++}}</td>
                  <td>{{$data['no_ic']}}</td>
                  <td>{{$data['panel_name']}}</td>
                  <td>{{$data['panel_faculty']}}</td>
                  <td>{{$data['panel_status']}}</td>
                  <td>
                    <a href="{{ route('details_temuduga', Crypt::encrypt($data['no_ic'])) }}" class="btn-sm btn-warning"> <i data-feather='external-link'></i>{!! __('locale.Details') !!}</a>
                    <a href="{{ route('delete_temuduga', Crypt::encrypt($data['panel_id'])) }}" class="btn-sm btn-danger deleteProgram"> 
                      <i data-feather='external-link'></i>{!! __('locale.Delete') !!}
                    </a>
                    
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
