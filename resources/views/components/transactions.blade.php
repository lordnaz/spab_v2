
@extends('layouts/contentLayoutMaster')

@section('title', 'Transactions')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- <div class="row">
  <div class="col-12">
    <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
  </div>
</div> -->

<!-- Alert Message -->
@php 

$status= session('msgg'); 

@endphp

@if ($status=='success')
<div class="submitToastAlert">
</div>
@endif
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic-2 table">
          <thead>
            <tr>
              <!-- <th></th>
              <th></th> -->
              <th>No</th>
              <th>Order No</th>
              <th>Amount (MYR)</th>
              <th>Amount (USD)</th>
              <th>Trading No</th>
              <th>Receipt</th>
              <th>Request</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php  
              $count = 1;
            @endphp

            @foreach ($all_trx as $data)
              <tr>
                <td>{{$count++}}</td>
                <td><span id="trx-id-clipboard">{{$data->trx_id}}</span> <a href="javascript:;" class="copyClipboard" trx-id="{{$data->trx_id}}"><i data-feather='copy'></i></a></td>
                <td>{{$data->amount_sent}}</td>
                <td>{{$data->amount_receive}}</td>
                <td>{{$data->trading_no}}</td>
                <td><a href="{{ url($data->receipt_url) }}" target="_blank" rel="noopener noreferrer"> <i data-feather='external-link'></i> View</a></td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</td>
                <td>
                  @if($data->notified == false)
                  <button type="button" class="btn btn-outline-danger">
                    <i data-feather="bell" class="me-25"></i>
                    <span>Notify</span>
                  </button>
                  @else  
                  <button type="button" class="btn btn-flat-success">
                    <i data-feather="check" class="me-25"></i>
                    <span>Notified</span>
                  </button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
      <!-- <form class="add-new-record modal-content pt-0"> -->
      <form 
      method="POST" 
      action="{{ route('request_trx') }}" 
      class="add-new-record modal-content pt-0"
      enctype="multipart/form-data" 
      accept-charset='UTF-8'>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">New Order</h5>
        </div>
        <div class="modal-body flex-grow-1">
          
        {{@csrf_field()}}

          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
            <input
              type="text"
              name="fullname"
              class="form-control dt-full-name"
              id="basic-icon-default-fullname"
              placeholder="John Doe"
              aria-label="John Doe"
              value="{{auth()->user()->name}}"
              readonly
            />
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-email">Email</label>
            <input
              type="text"
              name="email"
              id="basic-icon-default-email"
              class="form-control dt-email"
              placeholder="john.doe@example.com"
              aria-label="john.doe@example.com"
              value="{{auth()->user()->email}}"
              readonly
            />
            <!-- <small class="form-text"> You can use letters, numbers & periods </small> -->
          </div>

          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-fullname">Account Trading No.</label>
            <input
              type="text"
              name="trade_no"
              class="form-control"
              id="basic-icon-default-fullname"
              placeholder="MT4/MT5 trading account no."
              aria-label="John Doe"
              required
            />
          </div>
          
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-salary">MYR Transfered</label>
            <div class="input-group">
              <span class="input-group-text">MYR</span>
              <input 
              type="text" 
              name="ringgit"
              class="form-control ringgit" 
              placeholder="Amount Transfered" 
              aria-label="Amount (to the nearest dollar)" 
              required />
              <!-- <span class="input-group-text">.00</span> -->
            </div>
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-salary">USD Receive</label>
            <div class="input-group">
              <span class="input-group-text">USD</span>
              <input 
              type="text" 
              name="usdollar"
              class="form-control" 
              id="usdollar" 
              placeholder="Amount Receives" 
              aria-label="Amount (to the nearest dollar)" 
              readonly
              required />
              <!-- <span class="input-group-text">.00</span> -->
            </div>
          </div>

          <div class="mb-1">
            <label for="formFile" class="form-label">Payment Receipt</label>
            <input 
            class="form-control" 
            type="file" 
            name="formFile"
            id="formFile" 
            required />
            <small class="form-text"> As payment proof for transfer process </small>
          </div>
        
          <!-- <button type="button" class="btn btn-primary data-submit me-1">Submit</button> -->
          <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        
      </form>
    </div>
  </div>
</section>

@endsection

<!-- @php 
$status= session('msgg'); 
$json = json_encode($status);
@endphp -->

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection



