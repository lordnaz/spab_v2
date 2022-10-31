
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="spinner" style="display:none">
<div style="display:flex; justify-content:center; align-items:center; background-color: black; position:fixed; top:0px; left:0px; z-index: 9999; width: 100%; height: 100%;
opacity:.75;">
<div class="la-ball-clip-rotate la-dark la-3x">
    <div></div>
</div>
</div>
</div>
<!-- Advanced Search -->
<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Penapisan Temuduga</h4>
        </div>
        
        <!--Search Form -->
        <div class="card-body mt-2">
          

          <form class="dt_adv_search" action="/pemprosesanTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
          @csrf
              <div class="row">
              <input hidden type="text" id="code" class="form-control" name="proses" value="Semua"/>
              <div class="col-md-4">
                <label class="form-label">Negeri:</label>
                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select " id="ajax">
                    <option value="{{ route('PenapisanTemuduga') }}" selected>Semua</option>
                    
                    <option value="{{ route('Penapisantemuduga', 'Johor') }}">Johor Darul Takzim</option>
                  
                  <option value="{{ route('Penapisantemuduga', 'Kedah') }}">Kedah Darul Aman</option>
                  <option value="{{ route('Penapisantemuduga', 'Kelantan') }}">Kelantan Darul Naim</option>
                  <option value="{{ route('Penapisantemuduga', 'Melaka') }}">Melaka</option>
                  <option value="{{ route('Penapisantemuduga', 'Negeri Sembilan') }}">Negeri Sembilan Darul Khusus</option>
                  <option value="{{ route('Penapisantemuduga', 'Pahang') }}">Pahang Darul Makmur</option>
                  <option value="{{ route('Penapisantemuduga', 'Pulau Pinang') }}">Pulau Pinang</option>
                  <option value="{{ route('Penapisantemuduga', 'Perak') }}">Perak Darul Ridzuan</option>
                  <option value="{{ route('Penapisantemuduga', 'Perlis') }}">Perlis Indra Kayangan</option>
                  <option value="{{ route('Penapisantemuduga', 'Selangor') }}">Selangor Darul Ehsan</option>
                  <option value="{{ route('Penapisantemuduga', 'Terengganu') }}">Terengganu Darul Iman</option>
                  <option value="{{ route('Penapisantemuduga', 'Sabah') }}">Sabah</option>
                  <option value="{{ route('Penapisantemuduga', 'Sarawak') }}">Sarawak</option>
                  <option value="{{ route('Penapisantemuduga', 'W.P Kuala Lumpur') }}">W.P Kuala Lumpur</option>
                  <option value="{{ route('Penapisantemuduga', 'W.P Labuan') }}">W.P Labuan</option>
                  <option value="{{ route('Penapisantemuduga', 'W.P Putrajaya') }}">W.P Putrajaya</option>
                  <option value="{{ route('Penapisantemuduga', 'Lain-lain') }}">Lain-lain</option>
                </select>
              </div>

              <div class="col-sm-4 pt-2">
                                <button type="submit" class="btn btn-success btn-page-block">
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
      <div class="step" data-target="#address-step-modern">
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
      |
      </div>
      <div class="step" data-target="#personal-info-modern">
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
          <h5 class="mb-0">Temuduga</h5>
          
        </div>
        
        <div class="card-datatable">
        
          <table class="dt-advanced-search-2 table">
          
            <thead>
              <tr class="text-center">
                <th></th>
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                
                <th>Negeri</th>
                <th>P1</th>
                
                
                <th>Pusat Temuduga</th>
                <th>T.Proses</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            @php  
                $count = 1;
              
              @endphp
              
            <tbody>
             

              @foreach ($displayTemuduga as $displayTemudugaa)
              @php  
               
               $too = 0;
             @endphp
                <tr class="text-center" >
                  <td>{{$count++}}</td>
                  <td>{{$displayTemudugaa['nric']}}&nbsp;<a href="butiran/{{Crypt::encrypt($displayTemudugaa['nric'])}}/{{Crypt::encrypt($displayTemudugaa['job_id'])}}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTemudugaa['name']}}</td>
                  <td>{{$displayTemudugaa['state']}}</td>
                  
                  @foreach ($tolak as $Tolak)
                
                @if ($Tolak['nric'] == $displayTemudugaa['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($displayTemudugaa['kelulusan1'] == 'L' || $displayTemudugaa['kelulusan1'] == 'G')
                <td>{{$Tolak['code']}}-{{$displayTemudugaa['kelulusan1']}}</td>
                @else
                <td>{{$Tolak['code']}}-N{{$displayTemudugaa['kelulusan1']}}</td>
                @endif
                @else

                @endif
                @endif

                @endforeach
               
                
                  <td>{{$displayTemudugaa['code_center']}}</td>
                  <td>{{$displayTemudugaa['TarikhProses']}}</td>
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
                <a class="dropdown-item" href="butiran/{{Crypt::encrypt($displayTemudugaa['nric'])}}/{{Crypt::encrypt($displayTemudugaa['job_id'])}}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('temudugaPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}">Temuduga</a>
                  <a class="dropdown-item" href="{{ route('tolakPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}">Tolak</a>
                  <a class="dropdown-item" href="{{ route('batalPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}">Batal</a>
                </div>
              </div>

                  <!-- <a href="{{ route('temudugaPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}" class="btn-sm btn-warning">Temuduga</a>
                  <a href="{{ route('tolakPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}" class="btn-sm btn-warning">Tolak</a>
                    <a href="{{ route('batalPenapisan', Crypt::encrypt($displayTemudugaa['nric'])) }}" class="btn-sm btn-danger"> 
                      Batal
                    </a> -->
                    
                  </td>
                 
                </tr>
             @endforeach
           
            
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
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                
                <th>Negeri</th>
                <th>P1</th>
                
                
                <th>Pusat Temuduga</th>
                <th>T.Proses</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
                
              @endphp
              

              @foreach ($displayTolak as $displayTolakk)
              @php  
               
                $to = 0;
              @endphp
                <tr class="text-center">
                  <td></td>
                  <td>{{$displayTolakk['nric']}}&nbsp;<a href="butiran/{{Crypt::encrypt($displayTolakk['nric'])}}/{{Crypt::encrypt($displayTolakk['job_id'])}}" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$displayTolakk['name']}}</td>
                  
                  <td>{{$displayTolakk['state']}}</td>
                 
                  @foreach ($tolak as $Tolak)
                
                  @if ($Tolak['nric'] == $displayTolakk['nric'])
                  @php 
                  $to = $to + 1;
                  @endphp
                  @if($loop->first)
                  @if ($displayTolakk['kelulusan1'] == 'L' || $displayTolakk['kelulusan1'] == 'G')
                  <td>{{$Tolak['code']}}-{{$displayTolakk['kelulusan1']}}</td>
                  @else
                  <td>{{$Tolak['code']}}-N{{$displayTolakk['kelulusan1']}}</td>
                  @endif
                  @else
                 

                  @endif
                  @endif

                  @endforeach
                  
                  
                  <td></td>
                  <td>{{$displayTolakk['TarikhProses']}}</td>
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
                <a class="dropdown-item" href="butiran/{{Crypt::encrypt($displayTolakk['nric'])}}/{{Crypt::encrypt($displayTolakk['job_id'])}}">Butiran</a>
                  <a class="dropdown-item" href="{{ route('temudugaPenapisan', Crypt::encrypt($displayTolakk['nric'])) }}">Temuduga</a>
                  <a class="dropdown-item" href="{{ route('batalPenapisan', Crypt::encrypt($displayTolakk['nric'])) }}">Batal</a>                  
                </div>
              </div>
<!--                 
                  <a href="{{ route('temudugaPenapisan', Crypt::encrypt($displayTolakk['nric'])) }}" class="btn-sm btn-warning">Temuduga</a>
                    <a href="{{ route('batalPenapisan', Crypt::encrypt($displayTolakk['nric'])) }}" class="btn-sm btn-danger deletePusatTemuduga"> 
                      Batal
                    </a> -->
                    
                  </td>
                 
                </tr>
             @endforeach
            
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
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
               
                <th>Negeri</th>
                <th>P1</th>
               
               
                <th>Pusat Temuduga</th>
                <th>T.Proses</th>
                
              </tr>

            </thead>
            <tbody>
              @php  
                $count = 1;
              @endphp

              @foreach ($displayBelumProses as $displayBelumProsess)
  
                <tr class="text-center">
                  <td></td>
                  <td>{{$displayBelumProsess['nric']}}</td>
                  <td>{{$displayBelumProsess['name']}}</td>
                  
                  <td>{{$displayBelumProsess['state']}}</td>
                  <td></td>
                            
                  
                  <td></td>
                  <td></td>
                
                 
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


  $(document).ready(function(){
    $('#ajax').change(function(){  
        setTimeout(
                  function() 
                  {
                    document.getElementById('spinner').style.display = "block";
                  }, 0001);    
                                         
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
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-blockui.js')) }}"></script>
  
@endsection
