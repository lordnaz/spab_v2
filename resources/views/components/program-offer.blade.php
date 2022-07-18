
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
          <h4 class="card-title">Penawaran Program</h4>
        </div>
        
        <!--Search Form -->
        <div class="card-body mt-2">
          <div class="row g-1 md-1">
            <div class="col-md-4">
              <a href="{{ route('offered_program_add') }}" class="btn btn-success"> 
                <i data-feather="plus-circle" class="me-25"></i>
                <!-- <span>{!! __('locale.New Program') !!}</span> -->
                <span>Penawaran Baru</span>
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
                <th>{!! __('locale.Code') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Type') !!}</th>
                <th>{!! __('locale.Quota') !!}</th>
                <th>Status</th>
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
                  <td>{{$data['code']}}</td>
                  <td>{{$data['program']}}</td>
                  <td>{{$data['mode']}}</td>
                  <td>{{$data['quota']}}</td>
                  <td>
                    @if($data['status_aktif'] == 'aktif')
                    <span class="badge rounded-pill btn-outline-success">{{$data['status_aktif']}}</span>
                    @else
                    <span class="badge rounded-pill btn-outline-danger">{{$data['status_aktif']}}</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('details_offered_program', Crypt::encrypt($data['id'])) }}" class="btn-sm btn-warning"> <i data-feather='external-link'></i>{!! __('locale.Details') !!}</a>
                    <a href="{{ route('delete_offered_program', Crypt::encrypt($data['id'])) }}" class="btn-sm btn-danger deleteProgram"> 
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
