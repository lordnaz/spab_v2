
@extends('layouts/contentLayoutMaster')



@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
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
          

          <form class="dt_adv_search" method="POST">
              <div class="row">
              <div class="col-md-4">
                <label class="form-label">Negeri:</label>
                <select class="select2 form-select" id="addMemberSelect">
                    <option selected>Semua</option>
                    
                    <option value="Johor Darul Takzim">Johor Darul Takzim</option>
                                            <option value="Kedah Darul Aman">Kedah Darul Aman</option>
                                            <option value="Kelantan Darul Naim">Kelantan Darul Naim</option>
                                            <option value="Melaka">Melaka</option>
                                            <option value="Negeri Sembilan Darul Khusus">Negeri Sembilan Darul Khusus</option>
                                            <option value="Pahang Darul Makmur">Pahang Darul Makmur</option>
                                            <option value="Pulau Pinang">Pulau Pinang</option>
                                            <option value="Perak Darul Ridzuan">Perak Darul Ridzuan</option>
                                            <option value="Perlis Indra Kayangan">Perlis Indra Kayangan</option>
                                            <option value="Selangor Darul Ehsan">Selangor Darul Ehsan</option>
                                            <option value="Terengganu Darul Iman">Terengganu Darul Iman</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                                            <option value="W.P Labuan">W.P Labuan</option>
                                            <option value="W.P Putrajaya">W.P Putrajaya</option>
                                            <option value="Lain-lain">Lain-lain</option>
                </select>
              </div>

              <div class="col-sm-4 pt-2">
                                <button type="submit" class="btn btn-success">
                                    <i data-feather="plus-circle" class="me-25"></i>
                                    <span>Proses</span>
                                </button>
              </div>

                            
              </div>
          </form>
        </div>

        <!-- Modern Horizontal Wizard -->
<section class="modern-horizontal-wizard">
  <div class="bs-stepper wizard-modern modern-wizard-example">
    <div class="bs-stepper-header">
      <div class="step" data-target="#account-details-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="file-text" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Temuduga</span>
            <span class="bs-stepper-subtitle">Temuduga</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#personal-info-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="user" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Tolak</span>
            <span class="bs-stepper-subtitle">Tolak</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#address-step-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="map-pin" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Belum Proses</span>
            <span class="bs-stepper-subtitle">Belum Proses</span>
          </span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <div id="account-details-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Temuduga</h5>
          
        </div>
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Code') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

             
                <tr class="text-center">
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
      <div id="personal-info-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Tolak</h5>
          
        </div>
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Code') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

             
                <tr class="text-center">
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

      <div id="address-step-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Belum Proses</h5>
          
        </div>
         <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Code') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

             
                <tr class="text-center">
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
<!-- /Modern Horizontal Wizard -->

        <hr class="my-0" />
        
      </div>
    </div>
  </div>
</section>
<!--/ Advanced Search -->
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){  
                        var presence = $(this).val();  
                        $.ajax({  
                            url:"/ajaxpost",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   $("#main").html(response);
    
   }
                        });  
                    });  

})

</script>


@endsection


@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection
