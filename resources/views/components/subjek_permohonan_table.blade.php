
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
          <h4 class="card-title">Tetapan Subjek</h4>
        </div>
        
        <!--Search Form -->
        <form action="/add_new_subjek" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf  
        <div class="col-12">
        <div class="card-body mt-2">
          <div class="row g-1 md-1">
          <div class="col-sm-2">     
          <input type="text" id="nama_subjek" class="form-control" name="nama_subjek" placeholder="Nama Subjek" required/>
          </div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>Tambah Subjek</span>
                </button>
            </div>
          </div>
        </div>
        </div>
        </form>
        <!-- <hr class="my-0" /> -->
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Name') !!}</th> 
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($display as $data)
                <tr>
                  <td>{{$count++}}</td>
                  
                  <td>{{$data['nama_subjek']}}</td>
                  <td>

                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-danger">Pilihan</button>
                    <button
                      type="button"
                      class="btn btn-sm btn-outline-danger dropdown-toggle dropdown-toggle-split"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      
                      <a class="dropdown-item" href="{{ route('tolak_subjek', Crypt::encrypt($data['subjekp_id'])) }}">Padam</a>

                    </div>
                  </div>
                    
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
