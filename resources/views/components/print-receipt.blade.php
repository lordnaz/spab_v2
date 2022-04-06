@extends('layouts/contentLayoutMaster')
@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">
        <div class="card">
        <div class="card-header">
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                              <h4>
                                <i class="fa fa-globe"></i> ASWARA
                                <small class="float-right">Date: 6/4/2022</small>
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                              From
                              <address>
                                <strong>ASWARA</strong><br>
                                464, Jalan Tun Ismail,<br>
                                Kuala Lumpur, 50480 Kuala Lumpur,<br>
                                Wilayah Persekutuan Kuala Lumpur<br>
                                Phone: 03-2778 5999<br>
                                Email: info@aswara.edu.my
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              To
                              <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: 012-12345678<br>
                                Email: john.doe@example.com
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              <b>Invoice #007612</b><br>
                              <br>
                              <b>Order ID:</b> 4F3S8J<br>
                              <b>Payment Due:</b> 12/4/2022<br>
                              <b>Account:</b> 968-34567
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Fees</th>
                                  <th>Description</th>
                                  <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Registration Fee</td>
                                  <td>-</td>
                                  <td>RM 100.00</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Computer Collateral</td>
                                  <td>Pay for 1 semester only</td>
                                  <td>RM 50.00</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Student Insurance</td>
                                  <td>3 years x RM 53.00</td>
                                  <td>RM 159.00</td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>Education Fee</td>
                                  <td>90 credit hours x RM 50.00</td>
                                  <td>RM 4500.00</td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <br>
                          <!-- /.row -->

                          <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                              <p class="lead">Payment Methods:</p>
                              <img src="https://seeklogo.com/images/V/visa-logo-6F4057663D-seeklogo.com.png" width="10%" alt="Visa" margin-right="20px">
                              <img src="https://seeklogo.com/images/M/mastercard-logo-473B8726A9-seeklogo.com.png" width="10%" alt="Mastercard">
                              <img src="https://seeklogo.com/images/P/paypal-logo-481A2E654B-seeklogo.com.png" width="5%" alt="Paypal">

                              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                              Online payment methods may include credit or debit card options, prepaid cards, gift cards, 
                              a direct transfer from a bank account, payment processors, and more. 
                              </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                              <p class="lead">Amount Due 2/22/2014</p>

                              <div class="table-responsive">
                                <table class="table">
                                  <tbody><tr>
                                    <th style="width:50%">Total:</th>
                                    <td>RM 4809.00</td>
                                  </tr>
                                </tbody></table>
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                            <div class="col-12">
                              <a href="" onclick="window.print()" class="btn btn-outline-secondary me-1"><i class="fa fa-print"></i>{!! __('locale.Print') !!}</a>
                              <a href="{{ route('pendaftaranpelajar') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>                          
                            </div>
                          </div>

                        </div>
                        <!-- /.invoice -->
                      </div>

                      </div>
        </div>
    </div>
    </div>


@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection