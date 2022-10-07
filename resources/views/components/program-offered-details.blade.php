@extends('layouts/contentLayoutMaster')

@section('vendor-style')
  {{-- vendor css files --}}
  
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

@endsection

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        
        <div class="card-body">

          

          <h4 class="card-title">{!! __('locale.Offer Details') !!}</h4>
          <form action="/update_offered_program" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
          {{@csrf_field()}}
            <div class="row">

            <p hidden id="status">{{$datas['status_aktif']}}</p>
            <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Status') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" id="aktif" value="aktif">{!! __('locale.Active') !!}</option>
                        <option data-avatar="3-small.png" id="tidak aktif" value="tidak aktif">{!! __('locale.Not Active') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">Program:</label>
                  </div>
                  <div class="col-sm-10">
                  @php $id = $datas['program_id']; @endphp
                    <select class="select2 form-select" id="type" name="program_id">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        @foreach ($datass as $data)
                        @php $idd = $data['program_id']; @endphp
                        @if($id == $idd)
                        <option data-avatar="1-small.png" value="{{$data['program_id']}}" selected true>{{$data['code']}} - {{$data['program']}}</option>
                        @else
                        <option data-avatar="1-small.png" value="{{$data['program_id']}}">{{$data['code']}} - {{$data['program']}}</option>
                        @endif
                       @endforeach
                    </select>
                  </div>
                </div>
              </div>
              
              <input hidden type="text" id="name" class="form-control" name="offerid" value="{{Crypt::encrypt($datas['id'])}}"/>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">{!! __('locale.Type') !!}</label>
                  </div>
                  <div class="col-sm-10">
                  @php $index = $datas['mode']; @endphp
                  @if($index == 'Sepenuh Masa')
                    <input type="radio" id="subfield"  name="mode" value="Sepenuh Masa" checked/>
                    <label class="col-form-label" for="subfield" >Sepenuh Masa</label>
                    <input type="radio" id="subfield"  name="mode" value="Separuh Masa"/>
                    <label class="col-form-label" for="subfield">Separuh Masa</label>
                  @else
                  <input type="radio" id="subfield"  name="mode" value="Sepenuh Masa"/>
                    <label class="col-form-label" for="subfield" >Sepenuh Masa</label>
                    <input type="radio" id="subfield"  name="mode" value="Separuh Masa" checked/>
                    <label class="col-form-label" for="subfield">Separuh Masa</label>
                    @endif
                  </div>
                  
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="field">Kuota</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" id="field" class="form-control" name="quota" value="{{$datas['quota']}}" />
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">Catatan</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="notes" rows="4">{{$datas['notes']}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">Tarikh Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    
                    <input type="text" id="registration_date" name="registration_date" class="form-control flatpickr-basic date_of_birth" value="{{$datas['registration_date']}}" placeholder="YYYY-MM-DD" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="subfield">Masa Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    
                    <input type="text" id="registration_date" name="registration_time" class="form-control flatpickr-time date_of_birth" value="{{$datas['registration_time']}}" placeholder="00:00" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">Tempat Daftar</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="registration_venue" rows="4" placeholder="....">{{$datas['registration_date']}}</textarea>
                  </div>
                </div>
              </div>



              
            </div>
         


          <br>
          <hr>
          <br>
          <!-- form repeater  -->
          <h4 class="card-title">{!! __('locale.Minimum Qualification') !!}</h4>

           <!-- loop  -->
           <div class="invoice-repeater">
           <div data-repeater-list="update" >
           @php $i = 0; @endphp
             @foreach($datasss as $data)
             <input hidden type="text" class="form-control" name="qualification[{{$i}}]" value="{{Crypt::encrypt($data['qualificationid']) }}">
             @php $i++; @endphp
             <p hidden id="subjek{{$i}}">{{$data['subj_name']}}</p>
             
            <div data-repeater-item>
              <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="type">Subjek</label>
                    <select class="select2 form-select" id="type" name="subjek">
                      <option selected disabled>Sila Pilih</option>
                      <option id="Mathematic{{$i}}" value="Mathematic">Mathematic</option>
                      <option id="Bahasa Inggeris{{$i}}" value="Bahasa Inggeris">Bahasa Inggeris</option>
                      <option data-avatar="1-small.png" id="Bahasa Melayu{{$i}}" value="Bahasa Melayu">Bahasa Melayu</option>
                      <option data-avatar="3-small.png" id="Bahasa Inggeris{{$i}}" value="Bahasa Inggeris">Bahasa Inggeris</option>
                      <option data-avatar="3-small.png" id="Pendidikan Islam {{$i}}" value="Pendidikan Islam ">Pendidikan Islam </option>
                      <option data-avatar="3-small.png" id="Sains{{$i}}" value="Sains">Sains</option>
                      <option data-avatar="3-small.png" id="Sejarah{{$i}}" value="Sejarah">Sejarah</option>
                      <option data-avatar="3-small.png" id="Matematik{{$i}}" value="Matematik">Matematik</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 col-12">
                      <div class="mb-1">
                      <p hidden id="grade{{$i}}">{{$data['val_grade']}}</p>
                        <label class="form-label" for="itemcost">Gred</label>
                        <select class="select2 form-select" id="type" name="grade">
                          <option selected disabled>Sila Pilih</option>
                          <option data-avatar="1-small.png" id="10{{$i}}" value="10">A+</option>
                          <option data-avatar="3-small.png" id="9{{$i}}" value="9">A</option>
                          <option data-avatar="3-small.png" id="8{{$i}}" value="8">A-</option>
                          <option data-avatar="3-small.png" id="7{{$i}}" value="7">B+</option>
                          <option data-avatar="3-small.png" id="6{{$i}}" value="6">B</option>
                          <option data-avatar="3-small.png" id="5{{$i}}" value="5">C+</option>
                          <option data-avatar="3-small.png" id="4{{$i}}" value="4">C</option>
                          <option data-avatar="3-small.png" id="3{{$i}}" value="3">D</option>
                          <option data-avatar="3-small.png" id="2{{$i}}" value="2">E</option>
                          <option data-avatar="3-small.png" id="1{{$i}}" value="1">G</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 col-12">
                      <div class="mb-1">
                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                          <i data-feather="x" class="me-25">

                          </i><span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr/>
                </div>
                @endforeach
                <input hidden type="text" id="current" class="form-control" name="totalup" value="{{$i}}">
                <p hidden id="totalall">{{$i}}</p>
            </div>
</div>

          <div class="invoice-repeater">
           
                <!-- append  -->
            <div data-repeater-list="data">
           
                <div id="view">
             
             </div>
            </div>
            

            <div class="row">
              <div class="col-4">
                <button id="btn1" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add New</span>
                </button>
                
              </div>

              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('offered_program') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                              
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>Kemaskini</span>
                </button>
                

              </div>
            </div>
            <input hidden type="text" id="currentt" class="form-control" name="total">
            </form>

</div>



         
          <!-- end of form repeater -->
        </div>
      </div>
    </div>
    
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
     function myFunction() {

      var ggg = $("#status").html();
      document.getElementById(ggg).selected = "true";

      var grade = $("#totalall").html();
      for(let i = 1; i <= grade; i++){
            var g = $("#subjek"+i+"").html();
            var gg = $("#grade"+i+"").html();

            document.getElementById(""+gg+i+"").selected = "true";
            document.getElementById(""+g+i+"").selected = "true";

        }

 

     }
       $(document).ready(function() {
    
        
        var v = 0;
    
    $("#btn1").click(function() {     
      
      $("#view").append('<div data-repeater-item><div class="row d-flex align-items-end"><div class="col-md-4 col-12"><div class="mb-1"><label class="form-label" for="itemname">Subje  k</label><select class="select2 form-select" id="type" name="subjek"><option selected disabled>Sila Pilih</option><option data-avatar="1-small.png" value="Bahasa Melayu">Bahasa Melayu</option><option data-avatar="3-small.png" value="Bahasa Inggeris">Bahasa Inggeris</option><option data-avatar="3-small.png" value="Pendidikan Islam">Pendidikan Islam</option><option data-avatar="3-small.png" value="Sains">Sains</option><option data-avatar="3-small.png" value="Sejarah">Sejarah</option><option data-avatar="3-small.png" value="Matematik">Matematik</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><label class="form-label" for="itemcost">Gred</label><select class="select2 form-select" id="type" name="grade"><option selected disabled>Sila Pilih</option><option data-avatar="1-small.png" value="10">A+</option><option data-avatar="3-small.png" value="9">A</option><option data-avatar="3-small.png" value="8">A-</option><option data-avatar="3-small.png" value="7">B+</option><option data-avatar="3-small.png" value="6">B</option><option data-avatar="3-small.png" value="5">C+</option><option data-avatar="3-small.png" value="4">C</option><option data-avatar="3-small.png" value="3">D</option><option data-avatar="3-small.png" value="2">E</option><option data-avatar="3-small.png" value="1">G</option></select></div></div><div class="col-md-2 col-12"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div></div><hr/></div>').fadeIn();;

      v = v + 1;
      document.getElementById("currentt").value = v;
      
    });
    
    
    
  });

  
    </script>
</section>
<!-- Basic Horizontal form layout section end -->


@endsection


@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection


