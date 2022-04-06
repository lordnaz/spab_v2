@extends('layouts/contentLayoutMaster')



@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection


@section('page-style')
{{-- Page Css files --}}

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Advanced Search -->
<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Penjadualan Temuduga</h4>
                </div>

                <!--Search Form -->
                <div class="card-body mt-2">


                    <form class="dt_adv_search" action="/pemprosesanTemuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <label class="form-label">Pusat Temuduga:</label>
                                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="select2 form-select" id="ajax">
                                    @foreach($DataCenter as $DataCenterr)
                                    
                                    <option value="{{ route('PenjadualanTemuduga', $DataCenterr['asas_id']) }}" @if($FirstCenter['asas_id'] == $DataCenterr['asas_id'] ) selected @endif>{{$DataCenterr['code_center']}}-{{$DataCenterr['name_center']}}</option>
                                
                                    @endforeach

                                </select>
                            </div>




                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <form action="/JadualSesi" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                @csrf
                <div class="card-datatable">
                    <table class="dt-advanced-search-2 table">
                        <thead>
                            <tr class="text-center">
                                <th style="padding-right:20px"><input type="checkbox" name="select-all" id="select-all" /></th>
                                <th>No.KP</th>
                                <th>Nama</th>
                                <th>P1</th>
                                <th>P2</th>
                                <th>Sesi</th>
                                <th>Tarikh</th>
                                <th>Masa Mula</th>
                                <th>Masa Tamat</th>
                                <th>Pilihan</th>
                            </tr>

                        </thead>
                        <tbody>


                        @foreach ($displayTable as $displayTablee)
              @php
           
              $too = 0;
                           
             @endphp
                <tr class="text-center" >
                  <td><input type="checkbox" name="checkbox" value="{{$displayTablee['nric']}}" /></td>
                  <td>{{$displayTablee['nric']}}</td>
                  <td>{{$displayTablee['name']}}</td>
                 
                  @foreach ($program as $Program)
                
                @if ($Program['nric'] == $displayTablee['nric'])
                @php 
                $too = $too + 1;
                @endphp
                @if($loop->first)
                @if ($displayTablee['kelulusan1'] == 'L' || $displayTablee['kelulusan1'] == 'G')
                <td>{{$Program['program']}}-{{$displayTablee['kelulusan1']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$displayTablee['kelulusan1']}}</td>
                @endif
                @else
                @if ($displayTablee['kelulusan2'] == 'L' || $displayTablee['kelulusan2'] == 'G')
                <td>{{$Program['program']}}-{{$displayTablee['kelulusan2']}}</td>
                @else
                <td>{{$Program['program']}}-N{{$displayTablee['kelulusan2']}}</td>
                @endif

                @endif
                @endif

                @endforeach
                @if ($too == 1)
                <td></td>
                @endif
                  <td>{{$displayTablee['number_session']}}</td>
                  <td>{{$displayTablee['TarikhHadir'] ? Carbon\Carbon::parse($displayTablee['TarikhHadir'])->format('Y-m-d') : ' '}}
            
                  </td>
                  <td>{{$displayTablee['MasaFrom'] ? Carbon\Carbon::parse($displayTablee['MasaFrom'])->format('H:i:s') : ' '}}</td>
                  <td>{{$displayTablee['MasaTo'] ? Carbon\Carbon::parse($displayTablee['MasaTo'])->format('H:i:s') : ' '}}</td>
                  
                  <td>
                 
                    
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


<section id="pick-a-time">
    <div class="card">

        <div class="card-body">
        <div id="Sesi">
            
                <div class="row">

                    
                    
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label for="basicSelect" id="select">Sesi</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="session_id" id="myselect">
                                <option value="" disabled>Pilih Sesi</option>
                                    @foreach($Sesi as $Sesii)
                                    <option value="{{$Sesii['session_id']}}">{{$Sesii['number_session']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">

                        <div class="mb-1 row">
                            <div class="col-sm-2">

                                <label class="col-form-label" for="name">Tarikh</label>
                            </div>
                            <div class="col-sm-4">

                                <input type="date" id="DateFrom" name="TarikhHadir" @if(!empty($FirstSesi['DateFrom']) == 'null') value="{{Carbon\Carbon::parse($FirstSesi['DateFrom'])->format('Y-m-d')}}" min="{{Carbon\Carbon::parse($FirstSesi['DateFrom'])->format('Y-m-d')}}" max="{{Carbon\Carbon::parse($FirstSesi['DateTo'])->format('Y-m-d')}}" @endif>
                            </div>

                           

                        </div>
                    </div>

                    <div class="col-12">

                        <div class="mb-1 row">
                            <div class="col-sm-2">

                                <label class="col-form-label" for="name">Masa</label>
                            </div>
                            <div class="col-sm-1">

                                <input type="time" id="TarikhFrom" name="MasaFrom" @if(!empty($FirstSesi['TarikhFrom']) == 'null') value="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" min="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" max="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" @else value="08:00"@endif>

                            </div>

                            
                            <div style="padding-left:7px;" class="col-sm-2">
                            -
                                <input type="time" id="TarikhTo" name="MasaTo" @if(!empty($FirstSesi['TarikhTo']) == 'null') value="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" min="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" max="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" @else value="08:00"@endif>
                            </div>

                        </div>
                    </div>
                    



                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="label-textarea">Catatan</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="label-textarea" name="catatan_temuduga" rows="4" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 offset-sm-9">
                    <a id="kosong" class="btn btn-outline-secondary me-1">Kosongkan</a>


                        <button id="firstbut" type="submit" class="btn btn-success">

                            <i data-feather="plus-circle" class="me-25"></i>
                            <span>{!! __('locale.Add') !!}</span>
                        </button>


                    </div>

                </div>
            </form>
        </div>
        </div>
    </div>
</section>


<!--/ Advanced Search -->
<script>
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });

      //ajaxtemuduga
$(document).ready(function(){
    $('#myselect').change(function(){  
                        var presence = this.value;  
                        $.ajax({  
                            url:"/AjaxSesi",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  type:presence,
                                  },  
                            
                            success:function(response)
   {
   console.log(response);
   $("#Sesi").html(response);
  feather.replace()
    
   }
                        });  
                    });  

})

//ajaxkosongkan
$(document).ready(function(){
    $('#kosong').click(function(){  
                      var presence = [];
                      var sesi = $('#myselect').val();
                      $.each($("input[name='checkbox']:checked"), function(){
                presence.push($(this).val());                
            });
                        $.ajax({  
                            url:"/KosongkanSesi",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  checkbox:presence,
                                  session_id:sesi,
                                  },  
                            
                            success:function(response)
   {
   
    console.log(response);
   
    
   }
                        });  
                        table.ajax.reload();
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

<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection