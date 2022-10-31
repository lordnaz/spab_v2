
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
          <h4 class="card-title">{!! __('locale.Interview Setting') !!}</h4>
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
            <span class="bs-stepper-title">Tiada Balasan</span>
            <span class="bs-stepper-subtitle">Tiada Balasan</span>
          </span>
        </button>
      </div>
      <div class="line">
       |
      </div>
      <div class="step" data-target="#personal-info-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="user" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Terima</span>
            <span class="bs-stepper-subtitle">Terima</span>
          </span>
        </button>
      </div>
      <div class="line">
        |
      </div>
      <div class="step" data-target="#address-step-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="map-pin" class="font-medium-3"></i>
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
          <h5 class="mb-0">Tiada Balasan</h5>
          
        </div>
        
        <div class="card-datatable">
        
          <table class="dt-advanced-search-2 table">
          
            <thead>
              <tr class="text-center">
                <th></th>
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>Jenis</th>
                <th>Program</th>
                <th>Status</th>
                <th>Tarikh</th>
                <th>Mohon Asrama</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            @php  
                $count = 1;
              @endphp
              
            <tbody>
             

              @foreach ($displayTawar as $displayTawars)
              @php
            
                           
             @endphp
                <tr class="text-center" >
                  <td>{{$count++}}</td>
                  <td>{{$displayTawars['nric']}}&nbsp;<a href="butiran/{{Crypt::encrypt($displayTawars['nric'])}}/{{Crypt::encrypt($displayTawars['job_id'])}}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTawars['name']}}</td>
                  <td>{{$displayTawars['study_mode']}}</td>
                  <td>{{$displayTawars['status_offer']}}</td>
                  <td>{{$displayTawars['status_offer']}}</td>
                  <td>{{$displayTawars['updated_date_offer']}}</td>
                  <td>{{$displayTawars['type_program_applied']}}</td>
            
                  <td>
                  <div class="btn-group">

                  
                  <a href="{{route('details_balasancalonbynricTerima', Crypt::encrypt($displayTawars['nric'])) }}" class="btn-sm btn-success">Terima</a>&nbsp;
                  <a href="{{route('details_balasancalonbynricTolak', Crypt::encrypt($displayTawars['nric'])) }}" class="btn-sm btn-danger">Tolak</a>
</div>
                    
                  </td>
                 
                </tr>
             @endforeach

            
            </tbody>
            
            
          </table>
         
        </div>
       
      </div>
      <div id="personal-info-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Terima</h5>
          
        </div>
        <div class="card-datatable">
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>Jenis</th>
                <th>Program</th>
                <th>Status</th>
                <th>Tarikh</th>
                <th>Mohon Asrama</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($displayTerima as $displayTerimas)
              @php
            
                           
             @endphp
                <tr class="text-center">
                <td>{{$count++}}</td>
                  <td>{{$displayTerimas['nric']}}&nbsp;<a href="butiran/{{Crypt::encrypt($displayTerimas['nric'])}}/{{Crypt::encrypt($displayTerimas['job_id'])}}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTerimas['name']}}</td>
                  <td>{{$displayTerimas['type_program_applied']}}</td>
                  <td>{{$displayTerimas['status_offer']}}</td>
                  <td>{{$displayTerimas['status_offer']}}</td>
                  <td>{{$displayTerimas['updated_date_offer']}}</td>
                  <td>{{$displayTerimas['type_program_applied']}}</td>
             
                  <td>
                  @if($roles == 'admin')
                  <div class="btn-group">
                
                  <a href="{{route('details_balasancalonbynricTolak', Crypt::encrypt($displayTerimas['nric'])) }}" class="btn-sm btn-danger">Tolak</a>&nbsp;
                    <a href="{{route('details_balasancalonbynricBatal', Crypt::encrypt($displayTerimas['nric'])) }}" class="btn-sm btn-danger "> 
                      Batal
                    </a>
</div>
@else
<div class="btn-group">
                
                <a href="{{route('details_balasancalonbynricTolak', Crypt::encrypt($displayTerimas['nric'])) }}" class="btn-sm btn-danger nav-link disabled">Tolak</a>&nbsp;
                  <a href="{{route('details_balasancalonbynricBatal', Crypt::encrypt($displayTerimas['nric'])) }}" class="btn-sm btn-danger nav-link disabled"> 
                    Batal
                  </a>
</div>
@endif
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
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>Jenis</th>
                <th>Program</th>
                <th>Status</th>
                <th>Tarikh</th>
                <th>Mohon Asrama</th>
                <th>{!! __('locale.Action') !!}</th>
                
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($displayTolak as $displayTolaks)
              @php
           
                           
             @endphp
                <tr class="text-center">
                <td>{{$count++}}</td>
                  <td>{{$displayTolaks['nric']}}&nbsp;<a href="butiran/{{Crypt::encrypt($displayTolaks['nric'])}}/{{Crypt::encrypt($displayTolaks['job_id'])}}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTolaks['name']}}</td>
                  <td>{{$displayTolaks['type_program_applied']}}</td>
                  <td>{{$displayTolaks['status_offer']}}</td>
                  <td>{{$displayTolaks['status_offer']}}</td>
                  <td>{{$displayTolaks['updated_date_offer']}}</td>
                  <td>{{$displayTolaks['type_program_applied']}}</td>
              
                  <td>
                  @if($roles == 'admin')
                  <div class="btn-group">
                  
                  <a href="{{route('details_balasancalonbynricTerima', Crypt::encrypt($displayTolaks['nric'])) }}" class="btn-sm btn-success">Terima</a>&nbsp;
                    <a href="{{route('details_balasancalonbynricBatal', Crypt::encrypt($displayTolaks['nric'])) }}" class="btn-sm btn-danger "> 
                      Batal
                    </a>
                    </div>
                    @else
                    <div class="btn-group">
                  
                  <a href="{{route('details_balasancalonbynricTerima', Crypt::encrypt($displayTolaks['nric'])) }}" class="btn-sm btn-success nav-link disabled">Terima</a>
                    <a href="{{route('details_balasancalonbynricBatal', Crypt::encrypt($displayTolaks['nric'])) }}" class="btn-sm btn-danger nav-link disabled "> 
                      Batal
                    </a>
                    </div>
                    @endif
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
