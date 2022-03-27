
                <div class="row">

                    
                   
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label for="basicSelect" name="session_id" id="select">Sesi</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="myselect">
                                <option value="" disabled>Pilih Sesi</option>
                                    @foreach($Sesi as $Sesii)
                                    <option value="{{$Sesii['session_id']}}" @if($FirstSesi['number_session'] == $Sesii['number_session']) selected @endif>{{$Sesii['number_session']}}</option>
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

                                <input type="date" id="TarikhHadir" name="TarikhHadir" @if(!empty($FirstSesi['DateFrom']) == 'null') value="{{Carbon\Carbon::parse($FirstSesi['DateFrom'])->format('Y-m-d')}}" min="{{Carbon\Carbon::parse($FirstSesi['DateFrom'])->format('Y-m-d')}}" max="{{Carbon\Carbon::parse($FirstSesi['DateTo'])->format('Y-m-d')}}" @endif>
                            </div>

                           

                        </div>
                    </div>

                    <div class="col-12">

                        <div class="mb-1 row">
                            <div class="col-sm-2">

                                <label class="col-form-label" for="name">Masa</label>
                            </div>
                            <div class="col-sm-1">

                                <input type="time" id="MasaFrom" name="MasaFrom" @if(!empty($FirstSesi['TarikhFrom'])) value="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" min="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" max="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" @else value="08:00"@endif>

                            </div>

                            
                            <div style="padding-left:7px;" class="col-sm-2">
                            -
                                <input type="time" id="MasaTo" name="MasaTo" @if(!empty($FirstSesi['TarikhTo'])) value="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" min="{{Carbon\Carbon::parse($FirstSesi['TarikhFrom'])->format('H:i:s')}}" max="{{Carbon\Carbon::parse($FirstSesi['TarikhTo'])->format('H:i:s')}}" @else value="08:00"@endif>
                            </div>

                        </div>
                    </div>
                    



                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="label-textarea">Catatan</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="catatan" name="catatan_temuduga" rows="4" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 offset-sm-9">
                        <a id="kosong" class="btn btn-outline-secondary me-1">Kosongkan</a>


                        <button type="submit" id="firstbut" class="btn btn-success">

                            <i data-feather="plus-circle" class="me-25"></i>
                            <span>{!! __('locale.Add') !!}</span>
                        </button>


                    </div>

                </div>
            

            <script>

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

//ajaxpostsesi
$(document).ready(function(){
    $('button[type="submit"]').click(function(){  
                      var presence = [];
                      var sesi = $('#myselect').val();
                      var catatan = $('#catatan').val();
                      var Tarikh = $('#TarikhHadir').val();
                      var Masa1 = $('#MasaFrom').val();
                      var Masa2 = $('#MasaTo').val();
                      $.each($("input[id='checkbox']:checked"), function(){
                presence.push($(this).val());

                      
            });
                        $.ajax({  
                            url:"/JadualSesi",  
                            method:"POST", 
                            dataType:"html", 
                            data:{
                                "_token": "{{ csrf_token() }}",
                                  checkbox:presence,
                                  session_id:sesi,
                                  catatan_temuduga:catatan,
                                  TarikhHadir:Tarikh,
                                  MasaFrom:Masa1,
                                  MasaTo:Masa2
                                  },  
                            
                            success:function(response)
   {
    return response;
   
    
   }
                        });  
                    });  

})

//ajaxkosongkan
$(document).ready(function(){
    $('#kosong').click(function(){  
                      var presence = [];
                      var sesi = $('#myselect').val();
                      $.each($("input[id='checkbox']:checked"), function(){
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
    return response;
   
    
   }
                        });  
                    });  

})
</script>