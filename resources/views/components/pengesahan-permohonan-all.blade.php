
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
@php  

$roles = auth()->user()->role;

@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Advanced Search -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">{!! __('locale.Application Confirmation') !!}</h4>
        </div>
        
        
        <div id="program_list"class="card-body mt-2" >
          

    
                 

                  
    
          <div id="program_list" class="col-sm-10">
          <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
            <!-- <select class="select2 form-select" id="program_list" name="program_list"> -->
                <option value="{{ route('display_pengesahan_permohonan') }}" selected>Semua</option>
                @foreach ($datas2 as $datas22)
                <option data-avatar="1-small.png" value="{{ route('display_pengesahan_permohonan') }}">{{$datas22['code']}} - {{$datas22['program']}}</option>
               @endforeach
            </select>
          </div>
  
             
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
            <span class="bs-stepper-title">Belum Proses</span>
            <span class="bs-stepper-subtitle">Belum Proses</span>
          </span>
        </button>
      </div>
      <div class="line">
       |
      </div>
      <div class="step" data-target="#personal-info-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="file-text" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Sah</span>
            <span class="bs-stepper-subtitle">Sah</span>
          </span>
        </button>
      </div>
      <div class="line">
        |
      </div>
      <div class="step" data-target="#address-step-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="file-text" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Tolak</span>
            <span class="bs-stepper-subtitle">Tolak</span>
          </span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      
      <div id="account-details-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Belum Proses</h5>
          
        </div>
        
        <div class="card-datatable">
        
        <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Date_Application') !!}</th>
                <th>{!! __('locale.Series_No') !!}</th>
                <th>{!! __('locale.nric') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
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
                
                  <td>{{Carbon\Carbon::parse($data['created_at'])->format('Y-m-d')}}</td>
                  <td>{{$data['no_siri']}}</td>
                  <td>{{$data['nric']}}&nbsp;<a href="{{ route('butiran', Crypt::encrypt($data['nric'])) }}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$data['name']}}</td>
              <td>{{$data['status_validation']}}</td>
              
              <td>
              

              <!-- Bila dah sah/tolak, boleh tekan batal je untuk ubah status permohonan  -->
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
                <a class="dropdown-item" href="{{ route('butiran', Crypt::encrypt($data['nric'])) }}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('sahkan_permohonan_id', Crypt::encrypt($data['nric'])) }}">Sahkan</a>
                  <a class="dropdown-item" href="{{ route('tolak_permohonan_id', Crypt::encrypt($data['nric'])) }}">Tolak</a>
                  <a class="dropdown-item" href="{{ route('draft_permohonan', Crypt::encrypt($data['nric'])) }}">Draft</a>
                  <a class="dropdown-item" href="{{ route('batal_permohonan', Crypt::encrypt($data['nric'])) }}">Batal</a>
                </div>
              </div>
                      <!-- <a href="" class="btn-sm btn-warning"> <i data-feather='external-link'></i></a> -->
                      <!-- <a href="{{ route('sahkan_permohonan_id', Crypt::encrypt($data['nric'])) }}" class="btn-sm btn-success" > <i data-feather='external-link'></i>{!! __('locale.Confirm') !!}</a>
                      <a href="{{ route('tolak_permohonan_id', Crypt::encrypt($data['nric'])) }}" class="btn-sm btn-danger" > <i data-feather='external-link'></i>{!! __('locale.Reject') !!}</a>
                      <a href="{{ route('batal_permohonan', Crypt::encrypt($data['nric'])) }}" class="btn btn-sm btn-outline-primary"><i data-feather='external-link'></i>{!! __('locale.Cancel') !!}</a> -->
              
              
             



              </td>
                 
                </tr>
              @endforeach
            </tbody>
          </table>
         
        </div>
       
      </div>
      <div id="personal-info-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Sah</h5>
          
        </div>
        <div class="card-datatable">
        <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Date_Application') !!}</th>
                <th>{!! __('locale.Series_No') !!}</th>
                <th>{!! __('locale.nric') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Status') !!}</th>             
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($sah as $sahh)
                <tr class="text-center">
                  <td>{{$count++}}</td>
                
                  <td>{{Carbon\Carbon::parse($sahh['created_at'])->format('Y-m-d')}}</td>
                  <td>{{$sahh['no_siri']}}</td>
                  <td>{{$sahh['nric']}}&nbsp;<a href="{{ route('butiran', Crypt::encrypt($sahh['nric'])) }}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$sahh['name']}}</td>
              <td>{{$sahh['status_validation']}}</td>
              
              <td>
              

              <!-- Bila dah sah/tolak, boleh tekan batal je untuk ubah status permohonan  -->
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
                <a class="dropdown-item" href="{{ route('butiran', Crypt::encrypt($sahh['nric'])) }}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('tolak_permohonan_id', Crypt::encrypt($sahh['nric'])) }}">Tolak</a>
                  <a class="dropdown-item" href="{{ route('batal_permohonan', Crypt::encrypt($sahh['nric'])) }}">Batal</a>
                </div>
              </div>
                    


              </td>
                 
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        </div>

      <div id="address-step-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Tolak</h5>
          
        </div>
         <div class="card-datatable">
         <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Date_Application') !!}</th>
                <th>{!! __('locale.Series_No') !!}</th>
                <th>{!! __('locale.nric') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Status') !!}</th>             
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($tolak as $tolakk)
                <tr class="text-center">
                  <td>{{$count++}}</td>
                
                  <td>{{Carbon\Carbon::parse($tolakk['created_at'])->format('Y-m-d')}}</td>
                  <td>{{$tolakk['no_siri']}}</td>
                  <td>{{$tolakk['nric']}}&nbsp;<a href="{{ route('butiran', Crypt::encrypt($tolakk['nric'])) }}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$tolakk['name']}}</td>
              <td>{{$tolakk['status_validation']}}</td>
              
              <td>
              

              <!-- Bila dah sah/tolak, boleh tekan batal je untuk ubah status permohonan  -->
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
                <a class="dropdown-item" href="{{ route('butiran', Crypt::encrypt($tolakk['nric'])) }}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('sahkan_permohonan_id', Crypt::encrypt($tolakk['nric'])) }}">Sahkan</a>
                  <a class="dropdown-item" href="{{ route('batal_permohonan', Crypt::encrypt($tolakk['nric'])) }}">Batal</a>
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
<!-- /Modern Horizontal Wizard -->
        
        <hr class="my-0" />
        
      </div>
    </div>
  </div>
</section>
<!--/ Advanced Search -->
<script>
  //ajaxtemuduga
$(document).ready(function(){
    $('#ajax').change(function(){  
                        var presence = this.value;  
                        $.ajax({  
                            url:"/ajaxtemuduga",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   $("#displaytemuduga").html(response);
    
   }
                        });  
                    });  

})

//ajaxtolak
$(document).ready(function(){
    $('#ajax').change(function(){  
                        var presence = this.value;  
                        $.ajax({  
                            url:"/ajaxtolak",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   $("#displaytolak").html(response);
    
   }
                        });  
                    });  

})

//ajaxproses
$(document).ready(function(){
    $('#ajax').change(function(){  
                        var presence = this.value;  
                        $.ajax({  
                            url:"/ajaxproses",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   $("#displayproses").html(response);
    
   }
                        });  
                    });  

})

</script>

<script>
$(document).ready(function(){
    $('#program_list').click(function(){  
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
   $("#all_student").html(response);
    
   }
                        });  
                    });  

})</script>

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
