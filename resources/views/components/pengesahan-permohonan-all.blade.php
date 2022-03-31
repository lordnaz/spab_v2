
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
          <h4 class="card-title">{!! __('locale.Application Confirmation') !!}</h4>
        </div>


        <div id="program_list"class="card-body mt-2" >
          

    
                 

                  
    
                  <div id="program_list" class="col-sm-10">
                  <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
                    <!-- <select class="select2 form-select" id="program_list" name="program_list"> -->
                        <option value="{{ route('display_pengesahan_permohonan') }}" selected>{!! __('locale.Please Choose') !!}</option>
                        @foreach ($datas2 as $datas22)
                        <option data-avatar="1-small.png" value="{{ route('filterByProgram',  Crypt::encrypt($datas22['program_id'])) }}">{{$datas22['code']}} - {{$datas22['program']}}</option>
                       @endforeach
                    </select>
                  </div>
          
                     
        </div>












        
        <!--Search Form -->

        <hr class="my-0" />
        <div id="all_student">
        <div class="card-datatable" id="all_student" >
          <table class="dt-advanced-search-2 table">
            <thead>
              <tr class="text-center">
                <th></th>
                <th>{!! __('locale.Date_Application') !!}</th>
                <th>{!! __('locale.Series_No') !!}</th>
                <th>{!! __('locale.nric') !!}</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>{!! __('locale.Status') !!}</th>
                <th>{!! __('locale.Date_Acceptance') !!}</th>
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
                
                  <td>{{$data['date_application']}}</td>
                  <td>{{$data['no_siri']}}</td>
                  <td>{{$data['nric']}}&nbsp;<a href="" class=""> <i data-feather='search'></i></a></td>
                  <td>{{$data['name']}}</td>
              <td>{{$data['status_validation']}}</td>
              <td>{{$data['date_acceptance']}}</td>
              <td>
              

            
                      <!-- <a href="" class="btn-sm btn-warning"> <i data-feather='external-link'></i></a> -->
                      <a href="{{ route('sahkan_permohonan_id', Crypt::encrypt($data['nric'])) }}" class="btn-sm btn-success" > <i data-feather='external-link'></i>{!! __('locale.Confirm') !!}</a>
                      <a href="{{ route('tolak_permohonan_id', Crypt::encrypt($data['nric'])) }}" class="btn-sm btn-danger" > <i data-feather='external-link'></i>{!! __('locale.Reject') !!}</a>
                      <a href="{{ route('batal_permohonan', Crypt::encrypt($data['nric'])) }}" class="btn btn-sm btn-outline-primary"><i data-feather='external-link'></i>{!! __('locale.Cancel') !!}</a>
              
              
             



              </td>
                 
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
</div>
      </div>
    </div>
  </div>
</section>
<!--/ Advanced Search -->

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

})



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


