/*=========================================================================================
    File Name: form-wizard.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  if($('.status_marriage').val() == 'Married'){
    $("#married_section").show();
  }else{
    $("#married_section").hide();
  }

  //ASASI
  if($('.pengajian').val() == 'Asasi'){
    $("#asasi_section").show();
  }else{
    $("#asasi_section").hide();
  }

  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Asasi'){
      $("#asasi_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#asasi_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 

   //diploma
   if($('.pengajian').val() == 'Diploma'){
    $("#diploma_section").show();
  }else{
    $("#diploma_section").hide();
  }

  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Diploma'){
      $("#diploma_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#diploma_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 

  //sarjana muda
  if($('.pengajian').val() == 'Sarjana Muda'){
    $("#muda_section").show();
  }else{
    $("#muda_section").hide();
  }

  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Sarjana Muda'){
      $("#muda_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#muda_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 

  //sarjana
  if($('.pengajian').val() == 'Sarjana'){
    $("#sarjana_section").show();
  }else{
    $("#sarjana_section").hide();
  }

  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Sarjana'){
      $("#sarjana_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#sarjana_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 

  //doktor
  if($('.pengajian').val() == 'Kedoktoran'){
    $("#doktor_section").show();
  }else{
    $("#doktor_section").hide();
  }

  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Kedoktoran'){
      $("#doktor_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#doktor_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 
  
  
//TYPE PROGRAM FULL AND HALF

//ASASI
//asasi sepenuh
$("#pengajian").on('change', function (bp) {
  //asasi
  if($('.pengajian').val() != 'Asasi'){
    $("#asasi_sepenuh").hide();
    $("#asasi_separuh").hide();
  }
  else{
    if($('.asasi_type_program_applied').val() == 'Sepenuh Masa'){
    $("#asasi_sepenuh").fadeIn(500).show()
    }
    else{
      $("#asasi_sepenuh").fadeIn(500).show()
    }
  }

  //diploma
  if($('.pengajian').val() != 'Diploma'){
    $("#diploma_sepenuh").hide();
    $("#diploma_separuh").hide();
  }
  else{
    if($('.diploma_type_program_applied').val() == 'Sepenuh Masa'){
    $("#diploma_sepenuh").fadeIn(500).show()
    }
    else{
      $("#diploma_separuh").fadeIn(500).show()
    }
  }

  //sarjana muda
  if($('.pengajian').val() != 'Sarjana Muda'){
    $("#muda_sepenuh").hide();
    $("#muda_separuh").hide();
  }else{

    if($('.muda_type_program_applied').val() == 'Sepenuh Masa'){
    $("#muda_sepenuh").fadeIn(500).show()
    }
    else{
      $("#muda_separuh").fadeIn(500).show()
    }
  }

  //master
  if($('.pengajian').val() != 'Sarjana'){
    $("#master_sepenuh").hide();
    $("#master_separuh").hide();
  }
  else{
    if($('.master_type_program_applied').val() == 'Sepenuh Masa'){
    $("#master_sepenuh").fadeIn(500).show()
    }
    else{
      $("#master_separuh").fadeIn(500).show()
    }
  }

  //doktor
  if($('.pengajian').val() != 'Kedoktoran'){
    $("#doktor_sepenuh").hide();
    $("#doktor_separuh").hide();
  }
  else{
    if($('.doktor_type_program_applied').val() == 'Sepenuh Masa'){
    $("#doktor_sepenuh").fadeIn(500).show()
    }
    else{
      $("#doktor_separuh").fadeIn(500).show()
    }
  }

}); 


//asasi sepenuh
if($('.pengajian').val() == 'Asasi'){

if($('.asasi_type_program_applied').val() == 'Sepenuh Masa'){
  $("#asasi_sepenuh").show();
}else{
  $("#asasi_sepenuh").hide();
}
}
else{

  $("#asasi_sepenuh").hide();

}




//asasi penuh faculty
if($('.pengajian').val() == 'Asasi'){

  if($('.asasi_type_program_applied').val() == 'Sepenuh Masa'){
  var value = $('.asasi_program_one').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
 
}
 
  $("#asasi_program_one").on('change', function (bp) {
  
    var value = $('.asasi_program_one').val().split('|')

    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});  
    }
  
  }); 




  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Asasi'){
      
      var value = $('.asasi_program_one').val().split('|')
      
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"});   
      }
      }
      else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
  }); 
  
$("#asasi_type_program_applied").on('change', function (bp) {
  //asasi
 
  $("#asasi_sepenuhf").css({display: "none"}); 
  
    if($('.asasi_type_program_applied').val() == 'Sepenuh Masa'){
    var value = $('.asasi_program_one').val().split('|') 
    $("#asasi_sepenuh").fadeIn(500).show()
    $("#asasi_separuh").hide() 

    }  
    else{
      $("#asasi_sepenuh").hide() 
      $("#asasi_separuh").fadeIn(500).show()
      var value = $('.asasi_program_one2').val().split('|') 
    }
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
    
  
  }); 

  //asasi SEPARUH FACULTY

if($('.pengajian').val() == 'Asasi'){

  if($('.asasi_type_program_applied').val() == 'Separuh Masa'){
  var value = $('.asasi_program_one2').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
  
}

$("#asasi_program_one2").on('change', function (bp) {
  
  var value = $('.asasi_program_one2').val().split('|')

  if( value[1] == 'Muzik'){
    $("#asasi_sepenuhf").fadeIn(500).show()
  }else{
    $("#asasi_sepenuhf").css({display: "none"});  
  }

}); 


$("#pengajian").on('change', function (bp) {

  if($('.pengajian').val() == 'Asasi'){
    
    var value = $('.asasi_program_one2').val().split('|')
    
    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});   
    }
    }
    else{
      $("#asasi_sepenuhf").css({display: "none"}); 
    }
  
}); 
  
//asasi separuh
if($('.pengajian').val() == 'Asasi'){

if($('.asasi_type_program_applied').val() == 'Separuh Masa'){
  $("#asasi_separuh").show();
}else{
  $("#asasi_separuh").hide();
}
}
else{

  $("#asasi_separuh").hide();

}





//DIPLOMA
//diploma sepenuh

if($('.pengajian').val() == 'Diploma'){
if($('.diploma_type_program_applied').val() == 'Sepenuh Masa'){
  $("#diploma_sepenuh").show();
}else{
  $("#diploma_sepenuh").hide();
}
}else{
  $("#diploma_sepenuh").hide();
}



//diploma penuh faculty
if($('.pengajian').val() == 'Diploma'){

  if($('.diploma_type_program_applied').val() == 'Sepenuh Masa'){
  var value = $('.dip_program_one').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
 
}
 
  $("#dip_program_one").on('change', function (bp) {
  
    var value = $('.dip_program_one').val().split('|')

    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});  
    }
  
  }); 




  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Diploma'){
      
      var value = $('.dip_program_one').val().split('|')
      
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"});   
      }
      }
      else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
  }); 
  
$("#diploma_type_program_applied").on('change', function (bp) {
  //asasi
 
  $("#asasi_sepenuhf").css({display: "none"}); 
  
    if($('.diploma_type_program_applied').val() == 'Sepenuh Masa'){
    $("#diploma_sepenuh").fadeIn(500).show()
    $("#diploma_separuh").hide() 
    var value = $('.dip_program_one').val().split('|'); 
   
    

    }  
    else{
      $("#diploma_sepenuh").hide() 
      $("#diploma_separuh").fadeIn(500).show()
      var value = $('.dip_program_one2').val().split('|'); 
    }
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
    
  
  }); 

  //diploma SEPARUH FACULTY

if($('.pengajian').val() == 'Diploma'){

  if($('.diploma_type_program_applied').val() == 'Separuh Masa'){
  var value = $('.dip_program_one2').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
  
}

$("#dip_program_one2").on('change', function (bp) {
  
  var value = $('.dip_program_one2').val().split('|')

  if( value[1] == 'Muzik'){
    $("#asasi_sepenuhf").fadeIn(500).show()
  }else{
    $("#asasi_sepenuhf").css({display: "none"});  
  }

}); 


$("#pengajian").on('change', function (bp) {

  if($('.pengajian').val() == 'Diploma'){
    
    var value = $('.dip_program_one2').val().split('|')
    
    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});   
    }
    }
    else{
      $("#asasi_sepenuhf").css({display: "none"}); 
    }
  
}); 

//diploma separuh
if($('.pengajian').val() == 'Diploma'){
if($('.diploma_type_program_applied').val() == 'Separuh Masa'){
  $("#diploma_separuh").show();
}else{
  $("#diploma_separuh").hide();
}
}else{
  $("#diploma_separuh").hide();
}




//SARJANA MUDA
//sarjana muda sepenuh
if($('.pengajian').val() == 'Sarjana Muda'){
if($('.muda_type_program_applied').val() == 'Sepenuh Masa'){
  $("#muda_sepenuh").show();
}else{
  $("#muda_sepenuh").hide();
}
}else{
  $("#muda_sepenuh").hide();
}

//muda penuh faculty
if($('.pengajian').val() == 'Diploma'){

  if($('.muda_type_program_applied').val() == 'Sepenuh Masa'){
  var value = $('.muda_program_one').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
 
}
 
  $("#muda_program_one").on('change', function (bp) {
  
    var value = $('.muda_program_one').val().split('|')

    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});  
    }
  
  }); 




  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Sarjana Muda'){
      
      var value = $('.muda_program_one').val().split('|')
      
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"});   
      }
      }
      else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
  }); 
  
$("#muda_type_program_applied").on('change', function (bp) {
  //asasi
 
  $("#asasi_sepenuhf").css({display: "none"}); 
  
    if($('.muda_type_program_applied').val() == 'Sepenuh Masa'){
    $("#muda_sepenuh").fadeIn(500).show()
    $("#muda_separuh").hide() 
    var value = $('.muda_program_one').val().split('|'); 
   
    

    }  
    else{
      $("#muda_sepenuh").hide() 
      $("#muda_separuh").fadeIn(500).show()
      var value = $('.muda_program_one2').val().split('|'); 
    }
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
    
  
  }); 

  //muda SEPARUH FACULTY

if($('.pengajian').val() == 'Sarjana Muda'){

  if($('.muda_type_program_applied').val() == 'Separuh Masa'){
  var value = $('.muda_program_one2').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
  
}

$("#muda_program_one2").on('change', function (bp) {
  
  var value = $('.muda_program_one2').val().split('|')

  if( value[1] == 'Muzik'){
    $("#asasi_sepenuhf").fadeIn(500).show()
  }else{
    $("#asasi_sepenuhf").css({display: "none"});  
  }

}); 


$("#pengajian").on('change', function (bp) {

  if($('.pengajian').val() == 'Sarjana Muda'){
    
    var value = $('.muda_program_one2').val().split('|')
    
    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});   
    }
    }
    else{
      $("#asasi_sepenuhf").css({display: "none"}); 
    }
  
}); 



//sarjana muda separuh
if($('.pengajian').val() == 'Sarjana Muda'){
if($('.muda_type_program_applied').val() == 'Separuh Masa'){
  $("#muda_separuh").show();
}else{
  $("#muda_separuh").hide();
}
}else{
  $("#muda_separuh").hide();
}



//MASTER
//master sepenuh
if($('.pengajian').val() == 'Sarjana'){
if($('.master_type_program_applied').val() == 'Sepenuh Masa'){
  $("#master_sepenuh").show();
}else{
  $("#master_sepenuh").hide();
}
}else{
  $("#master_sepenuh").hide();
}


//master penuh faculty
if($('.pengajian').val() == 'Sarjana'){

  if($('.master_type_program_applied').val() == 'Sepenuh Masa'){
  var value = $('.master_program_one').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
 
}
 
  $("#master_program_one").on('change', function (bp) {
  
    var value = $('.master_program_one').val().split('|')

    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});  
    }
  
  }); 




  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Sarjana'){
      
      var value = $('.master_program_one').val().split('|')
      
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"});   
      }
      }
      else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
  }); 
  
$("#master_type_program_applied").on('change', function (bp) {
  //asasi
 
  $("#asasi_sepenuhf").css({display: "none"}); 
  
    if($('.master_type_program_applied').val() == 'Sepenuh Masa'){
    $("#master_sepenuh").fadeIn(500).show()
    $("#master_separuh").hide() 
    var value = $('.master_program_one').val().split('|'); 
   
    

    }  
    else{
      $("#master_sepenuh").hide() 
      $("#master_separuh").fadeIn(500).show()
      var value = $('.master_program_one2').val().split('|'); 
    }
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
    
  
  }); 

  //master SEPARUH FACULTY

if($('.pengajian').val() == 'Sarjana'){

  if($('.master_type_program_applied').val() == 'Separuh Masa'){
  var value = $('.master_program_one2').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
  
}

$("#master_program_one2").on('change', function (bp) {
  
  var value = $('.master_program_one2').val().split('|')

  if( value[1] == 'Muzik'){
    $("#asasi_sepenuhf").fadeIn(500).show()
  }else{
    $("#asasi_sepenuhf").css({display: "none"});  
  }

}); 


$("#pengajian").on('change', function (bp) {

  if($('.pengajian').val() == 'Sarjana'){
    
    var value = $('.master_program_one2').val().split('|')
    
    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});   
    }
    }
    else{
      $("#asasi_sepenuhf").css({display: "none"}); 
    }
  
}); 

//master separuh
if($('.pengajian').val() == 'Sarjana'){
if($('.master_type_program_applied').val() == 'Separuh Masa'){
  $("#master_separuh").show();
}else{
  $("#master_separuh").hide();
}
}else{
  $("#master_separuh").hide() 
}


//DOKTOR
//doktor sepenuh
if($('.pengajian').val() == 'Kedoktoran'){
if($('.doktor_type_program_applied').val() == 'Sepenuh Masa'){
  $("#doktor_sepenuh").show();
}else{
  $("#doktor_sepenuh").hide();
}
}else{
  $("#doktor_sepenuh").hide();
}



//master penuh faculty
if($('.pengajian').val() == 'Kedoktoran'){

  if($('.doktor_type_program_applied').val() == 'Sepenuh Masa'){
  var value = $('.doktor_program_one').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
 
}
 
  $("#doktor_program_one").on('change', function (bp) {
  
    var value = $('.doktor_program_one').val().split('|')

    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});  
    }
  
  }); 




  $("#pengajian").on('change', function (bp) {

    if($('.pengajian').val() == 'Kedoktoran'){
      
      var value = $('.doktor_program_one').val().split('|')
      
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"});   
      }
      }
      else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
  }); 
  
$("#doktor_type_program_applied").on('change', function (bp) {
  //asasi
 
  $("#asasi_sepenuhf").css({display: "none"}); 
  
    if($('.doktor_type_program_applied').val() == 'Sepenuh Masa'){
    $("#doktor_sepenuh").fadeIn(500).show()
    $("#doktor_separuh").hide() 
    var value = $('.master_program_one').val().split('|'); 
   
    

    }  
    else{
      $("#doktor_sepenuh").hide() 
      $("#doktor_separuh").fadeIn(500).show()
      var value = $('.doktor_program_one2').val().split('|'); 
    }
      if( value[1] == 'Muzik'){
        $("#asasi_sepenuhf").fadeIn(500).show()
      }else{
        $("#asasi_sepenuhf").css({display: "none"}); 
      }
    
    
  
  }); 

  //diploma SEPARUH FACULTY

if($('.pengajian').val() == 'Kedoktoran'){

  if($('.doktor_type_program_applied').val() == 'Separuh Masa'){
  var value = $('.doktor_program_one2').val().split('|')
  if(value[1] == 'Muzik'){
    $("#asasi_sepenuhf").show();
  }else{
    $("#asasi_sepenuhf").css({display: "none"});
  }
  }
  
}

$("#doktor_program_one2").on('change', function (bp) {
  
  var value = $('.doktor_program_one2').val().split('|')

  if( value[1] == 'Muzik'){
    $("#asasi_sepenuhf").fadeIn(500).show()
  }else{
    $("#asasi_sepenuhf").css({display: "none"});  
  }

}); 


$("#pengajian").on('change', function (bp) {

  if($('.pengajian').val() == 'Kedoktoran'){
    
    var value = $('.doktor_program_one2').val().split('|')
    
    if( value[1] == 'Muzik'){
      $("#asasi_sepenuhf").fadeIn(500).show()
    }else{
      $("#asasi_sepenuhf").css({display: "none"});   
    }
    }
    else{
      $("#asasi_sepenuhf").css({display: "none"}); 
    }
  
}); 

//doktor separuh
if($('.pengajian').val() == 'Kedoktoran'){
if($('.doktor_type_program_applied').val() == 'Separuh Masa'){
  $("#doktor_separuh").show();
}else{
  $("#doktor_separuh").hide();
}
}else{
  $("#doktor_separuh").hide();
}



//fakulti



  var isRtl = $('html').attr('data-textdirection') === 'rtl';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    select3 = $('.select3'),
    select4 = $('.select4'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example'),
    verticalWizard = document.querySelector('.vertical-wizard-example'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: 'Select value',
      dropdownParent: $this.parent()
    });
  });

  // Draft Submit
  $('.draftOne').on('click', function (event) {

    let data = {
      'nric' : $('.nric').val(),
      'name' : $('.name').val(),
      'short_name' : $('.short_name').val(),
      'email' : $('.email').val(),
      'date_of_birth' : $('.date_of_birth').val(),
      'place_of_birth' : $('.place_of_birth').val(),
      'address_1' : $('.address_1').val(),
      'race' : $('.race').val(),
      'state' : $('.state').val(),
      'gender' : $('.gender').val(),
      'birth_cert_no' : $('.birth_cert_no').val(),
      'nationality' : $('.nationality').val(),
      'phone_no' : $('.phone_no').val(),
      'house_no' : $('.house_no').val(),
      'dun' : $('.dun').val(),
      'parliament' : $('.parliament').val()
    }

    $.ajax({
      url: "draft_one",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftTwo').on('click', function (event) {

    let data = {
      'nric' : $('.nric').val(),
      'status_marriage' : $('.status_marriage').val(),
      'partner_name' : $('.partner_name').val(),
      'partner_no_tel' : $('.partner_no_tel').val(),
      'partner_no_phonehouse' : $('.partner_no_phonehouse').val(),
      'partner_address_1' : $('.partner_address_1').val(),
      'guardian_name' : $('.guardian_name').val(),
      'relationship_guardian' : $('.relationship_guardian').val(),
      'guardian_nric_old' : $('.guardian_nric_old').val(),
      'guardian_nric_new' : $('.guardian_nric_new').val(),
      'guardian_no_tel' : $('.guardian_no_tel').val(),
      'guardian_no_phonehouse' : $('.guardian_no_phonehouse').val(),
      'guardian_address_1' : $('.guardian_address_1').val(),
      'guardian_income' : $('.guardian_income').val(),
      'guardian_occupation' : $('.guardian_occupation').val(),
      'guardian_dependent' : $('.guardian_dependent').val(),
      'guardian_email' : $('.guardian_email').val(),
      'kin_name' : $('.kin_name').val(),
      'kin_relationship' : $('.kin_relationship').val(),
      'kin_no_tel' : $('.kin_no_tel').val(),
      'kin_no_phonehouse' : $('.kin_no_phonehouse').val(),
      'kin_email' : $('.kin_email').val(),
      'kin_address_1' : $('.kin_address_1').val(),
      'pendapatan_isi_rumah' : $('.pendapatan_isi_rumah').val()
    }

    $.ajax({
      url: "draft_two",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });


  $('.draftThree').on('click', function (event) {

    if($('.pengajian').val() == "Asasi"){

      var type_program_applied = $('.asasi_type_program_applied').val();
      if($('.asasi_type_program_applied').val() == 'Sepenuh Masa')
      {   
      var value = $('.asasi_program_one').val().split('|')
      var program_one = value[0];
      
      }

      else{

        var value = $('.asasi_program_one2').val().split('|')
        var program_one = value[0];
        

      }

    }
    else if($('.pengajian').val() == "Diploma"){

      var type_program_applied = $('.diploma_type_program_applied').val();
      if($('.diploma_type_program_applied').val() == 'Sepenuh Masa')
      {
        var value = $('.dip_program_one').val().split('|')  
        var program_one = value[0];
      
      }
      else{
        var value = $('.dip_program_one2').val().split('|')  
        var program_one = value[0];
        
      }

    }
    else if($('.pengajian').val() == "Sarjana Muda"){

      var type_program_applied = $('.muda_type_program_applied').val();
      if($('.muda_type_program_applied').val() == 'Sepenuh Masa')
      {
     
      var value = $('.muda_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.muda_program_one2').val().split('|')  
      var program_one = value[0];
       
      }

    }
    else if($('.pengajian').val() == "Sarjana"){

      var type_program_applied = $('.master_type_program_applied').val();
      if($('.master_type_program_applied').val() == 'Sepenuh Masa')
      {
      
      var value = $('.master_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.master_program_one2').val().split('|')  
      var program_one = value[0];
        
      }

    }
    else if($('.pengajian').val() == "Kedoktoran"){

      var type_program_applied = $('.doktor_type_program_applied').val();
      if($('.doktor_type_program_applied').val() == 'Sepenuh Masa')
      {
     
      var value = $('.doktor_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.doktor_program_one2').val().split('|')  
        var program_one = value[0]; 
      }

    }
    else{
         
      var program_one = NULL;
      
    }



    let data = {
      'nric' : $('.nric').val(),
      'type_program_applied' : type_program_applied,
      'pengajian' : $('.pengajian').val(),
      'program_one' : program_one,
      'AlatMuzik' :  $('.alat_muzik').val(),
    }

    $.ajax({
      url: "draft_three",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftEmpat').on('click', function (event) {

    //add
    var index = [];
    $.each($("input[name='index']"), function(){
      index.push($(this).val());
    });

    var institution_others_qc = [];
    $.each($("input[name='institution_others_qc']"), function(){
      institution_others_qc.push($(this).val());
    });

    var grade_others_qc = [];
    $.each($("input[name='grade_others_qc']"), function(){
      grade_others_qc.push($(this).val());
    });

    var specialization_others_qc = [];
    $.each($("input[name='specialization_others_qc']"), function(){
      specialization_others_qc.push($(this).val());
    });

    var year_others_qc = [];
    $.each($("input[name='year_others_qc']"), function(){
      year_others_qc.push($(this).val());
    });

    //update
    var id = [];
    $.each($("input[id='id']"), function(){
      id.push($(this).val());
    });

    var institusidisplay = [];
    $.each($("input[id='institusidisplay']"), function(){
      institusidisplay.push($(this).val());
    });

    var gradedisplay = [];
    $.each($("input[id='gradedisplay']"), function(){
      gradedisplay.push($(this).val());
    });

    var khususdisplay = [];
    $.each($("input[id='khususdisplay']"), function(){
      khususdisplay.push($(this).val());
    });

    var tahundisplay = [];
    $.each($("input[id='tahundisplay']"), function(){
      tahundisplay.push($(this).val());
    });

    let data = {
      'nric' : $('.nric').val(),
      'year_muet' : $('.year_muet').val(),
      'place_muet' : $('.place_muet').val(),
      'band' : $('.band').val(),
      'speaking_grade' : $('.speaking_grade').val(),
      'reading_grade' : $('.reading_grade').val(),
      'writing_grade' : $('.writing_grade').val(),
      'institution' : institution_others_qc,
      'grade' : grade_others_qc,
      'specialization' : specialization_others_qc,
      'year' : year_others_qc,
      'index' : index,
      'id' : id,
      'institusidisplay' : institusidisplay,
      'gradedisplay' : gradedisplay,
      'khususdisplay' : khususdisplay,
      'tahundisplay' : tahundisplay,
      'cert_related_program' : $('.cert_related_program').val(),
      'description_cert' : $('.description_cert').val(),
      'work_exp_related_program' : $('.work_exp_related_program').val(),
      'description_work_exp' : $('.description_work_exp').val(),
      
    }

    $.ajax({
      url: "draft_empat",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftLima').on('click', function (event) {

    //add pmr
    var index_pmr = [];
    $.each($("input[name='index_pmr']"), function(){
      index_pmr.push($(this).val());
    });

    var subject_pmr = [];
    $.each($("select[name='subject_pmr']"), function(){
      subject_pmr.push($(this).val());
    });

    var grade_pmr = [];
    $.each($("select[name='grade_pmr']"), function(){
      grade_pmr.push($(this).val());
    });

    //update pmr
    var id_pmr = [];
    $.each($("input[id='id_pmr']"), function(){
      id_pmr.push($(this).val());
    });

    var usubject_pmr = [];
    $.each($("select[id='usubject_pmr']"), function(){
      usubject_pmr.push($(this).val());
    });

    var ugrade_pmr = [];
    $.each($("select[id='ugrade_pmr']"), function(){
      ugrade_pmr.push($(this).val());
    });

    //add spm
    var index_spm = [];
    $.each($("input[name='index_spm']"), function(){
      index_spm.push($(this).val());
    });

    var subject_spm = [];
    $.each($("select[name='subject_spm']"), function(){
      subject_spm.push($(this).val());
    });

    var grade_spm = [];
    $.each($("select[name='grade_spm']"), function(){
      grade_spm.push($(this).val());
    });

    //update spm
    var id_spm = [];
    $.each($("input[id='id_spm']"), function(){
      id_spm.push($(this).val());
    });

    var usubject_spm = [];
    $.each($("select[id='usubject_spm']"), function(){
      usubject_spm.push($(this).val());
    });

    var ugrade_spm = [];
    $.each($("select[id='ugrade_spm']"), function(){
      ugrade_spm.push($(this).val());
    });

    //add stpm
    var index_stpm = [];
    $.each($("input[name='index_stpm']"), function(){
      index_stpm.push($(this).val());
    });

    var subject_stpm = [];
    $.each($("select[name='subject_stpm']"), function(){
      subject_stpm.push($(this).val());
    });

    var grade_stpm = [];
    $.each($("select[name='grade_stpm']"), function(){
      grade_stpm.push($(this).val());
    });

    //update stpm
    var id_stpm = [];
    $.each($("input[id='id_stpm']"), function(){
      id_stpm.push($(this).val());
    });

    var usubject_stpm = [];
    $.each($("select[id='usubject_stpm']"), function(){
      usubject_stpm.push($(this).val());
    });

    var ugrade_stpm = [];
    $.each($("select[id='ugrade_stpm']"), function(){
      ugrade_stpm.push($(this).val());
    });


    let data = {
      'nric' : $('.nric').val(),
      'year_pmr' : $('.year_pmr').val(),
      'index_pmr' : index_pmr,
      'subject_pmr' : subject_pmr,
      'grade_pmr' : grade_pmr,
      'id_pmr' : id_pmr,
      'usubject_pmr' : usubject_pmr,
      'ugrade_pmr' : ugrade_pmr,
      'year_spm' : $('.year_spm').val(),
      'index_spm' : index_spm,
      'subject_spm' : subject_spm,
      'grade_spm' : grade_spm,
      'id_spm' : id_spm,
      'usubject_spm' : usubject_spm,
      'ugrade_spm' : ugrade_spm,
      'year_stpm' : $('.year_stpm').val(),
      'index_stpm' : index_stpm,
      'subject_stpm' : subject_stpm,
      'grade_stpm' : grade_stpm,
      'id_stpm' : id_stpm,
      'usubject_stpm' : usubject_stpm,
      'ugrade_stpm' : ugrade_stpm,
      
    }

    $.ajax({
      url: "draft_lima",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftEnam').on('click', function (event) {

    //add form6
    var index_form6 = [];
    $.each($("input[name='index_form6']"), function(){
      index_form6.push($(this).val());
    });

    var area_involvement = [];
    $.each($("input[name='area_involvement']"), function(){
      area_involvement.push($(this).val());
    });

    var organizer = [];
    $.each($("input[name='organizer']"), function(){
      organizer.push($(this).val());
    });

    var year_involvement = [];
    $.each($("input[name='year_involvement']"), function(){
      year_involvement.push($(this).val());
    });

    //update form6
    var id_form6 = [];
    $.each($("input[id='id_form6']"), function(){
      id_form6.push($(this).val());
    });

    var uarea_involvement = [];
    $.each($("input[id='uarea_involvement']"), function(){
      uarea_involvement.push($(this).val());
    });

    var uorganizer = [];
    $.each($("input[id='uorganizer']"), function(){
      uorganizer.push($(this).val());
    });

    var uyear_involvement = [];
    $.each($("input[id='uyear_involvement']"), function(){
      uyear_involvement.push($(this).val());
    });

   


    let data = {
      'nric' : $('.nric').val(),
      'index_form6' : index_form6,
      'area_involvement' : area_involvement,
      'organizer' : organizer,
      'year_involvement' :  year_involvement,
      'id_form6' : id_form6,
      'uarea_involvement' : uarea_involvement,
      'uorganizer' : uorganizer,
      'uyear_involvement' :  uyear_involvement,
      
    }

    $.ajax({
      url: "draft_enam",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftTujuh').on('click', function (event) {

    let data = {
      'nric' : $('.nric').val(),
      'job_type' : $('.job_type').val(),
      'monthly_income' : $('.monthly_income').val(),
      'year_working' : $('.year_working').val(),
      'company_name' : $('.company_name').val(),
      'company_address' : $('.company_address').val(),
      'no_faks' : $('.no_faks').val()
    }

    $.ajax({
      url: "draft_tujuh",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftLapan').on('click', function (event) {

    //add form8
    var index_form8 = [];
    $.each($("input[name='index_form8']"), function(){
      index_form8.push($(this).val());
    });

    var course_taken = [];
    $.each($("input[name='course_taken']"), function(){
      course_taken.push($(this).val());
    });

    var course_organizer = [];
    $.each($("input[name='course_organizer']"), function(){
      course_organizer.push($(this).val());
    });

    var place_taken = [];
    $.each($("input[name='place_taken']"), function(){
      place_taken.push($(this).val());
    });

    var year_taken = [];
    $.each($("input[name='year_taken']"), function(){
      year_taken.push($(this).val());
    });

    //update form8
    var id_form8 = [];
    $.each($("input[id='id_form8']"), function(){
      id_form8.push($(this).val());
    });

    var ucourse_taken = [];
    $.each($("input[id='ucourse_taken']"), function(){
      ucourse_taken.push($(this).val());
    });

    var ucourse_organizer = [];
    $.each($("input[id='ucourse_organizer']"), function(){
      ucourse_organizer.push($(this).val());
    });

    var uplace_taken = [];
    $.each($("input[id='uplace_taken']"), function(){
      uplace_taken.push($(this).val());
    });

    var uyear_taken = [];
    $.each($("input[id='uyear_taken']"), function(){
      uyear_taken.push($(this).val());
    });

   


    let data = {
      'nric' : $('.nric').val(),
      'index_form8' : index_form8,
      'course_taken' : course_taken,
      'course_organizer' : course_organizer,
      'place_taken' :  place_taken,
      'year_taken' :  year_taken,
      'id_form8' : id_form8,
      'ucourse_taken' : ucourse_taken,
      'ucourse_organizer' : ucourse_organizer ,
      'uplace_taken' :  uplace_taken,
      'uyear_taken' :  uyear_taken,
      
    }

    $.ajax({
      url: "draft_lapan",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftSembilan').on('click', function (event) {

    let data = {
      'nric' : $('.nric').val(),
      'sponsorship' : $('.sponsorship').val(),
      'address_sponsorship' : $('.address_sponsorship').val(),
      'type_sponsorship' : $('.type_sponsorship').val(),
      'reference_no_spsp' : $('.reference_no_spsp').val(),
      'date_offer' : $('.date_offer').val(),
      'monthly_amount_spsp' : $('.monthly_amount_spsp').val()
    }

    $.ajax({
      url: "draft_sembilan",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  $('.draftSepuluh').on('click', function (event) {

    //add form10
    var index_form10 = [];
    $.each($("input[name='index_form10']"), function(){
      index_form10.push($(this).val());
    });

    var club = [];
    $.each($("input[name='club']"), function(){
      club.push($(this).val());
    });

    var role = [];
    $.each($("input[name='role']"), function(){
      role.push($(this).val());
    });

    var year_takenclub = [];
    $.each($("input[name='year_takenclub']"), function(){
      year_takenclub.push($(this).val());
    });

    //update form10
    var id_form10 = [];
    $.each($("input[id='id_form10']"), function(){
      id_form10.push($(this).val());
    });

    var uclub = [];
    $.each($("input[id='uclub']"), function(){
      uclub.push($(this).val());
    });

    var urole = [];
    $.each($("input[id='urole']"), function(){
      urole.push($(this).val());
    });

    var uyear_takenclub = [];
    $.each($("input[id='uyear_takenclub']"), function(){
      uyear_takenclub.push($(this).val());
    });

   


    let data = {
      'nric' : $('.nric').val(),
      'index_form10' : index_form10,
      'club' : club,
      'role' : role,
      'year_takenclub' :  year_takenclub,
      'id_form10' : id_form10,
      'uclub' : uclub,
      'urole' : urole,
      'uyear_takenclub' :  uyear_takenclub,
      
    }

    $.ajax({
      url: "draft_sepuluh",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          successToast(data.description)
        }else{
          errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
    
  });

  

  // formOne valid

  function formOneValid(){

    let data = {
      'nric' : $('.nric').val(),
      'name' : $('.name').val(),
      'short_name' : $('.short_name').val(),
      'email' : $('.email').val(),
      'date_of_birth' : $('.date_of_birth').val(),
      'place_of_birth' : $('.place_of_birth').val(),
      'address_1' : $('.address_1').val(),
      'race' : $('.race').val(),
      'state' : $('.state').val(),
      'gender' : $('.gender').val(),
      'birth_cert_no' : $('.birth_cert_no').val(),
      'nationality' : $('.nationality').val(),
      'phone_no' : $('.phone_no').val(),
      'house_no' : $('.house_no').val(),
      'dun' : $('.dun').val(),
      'parliament' : $('.parliament').val()
    }

    $.ajax({
      url: "draft_one",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        // console.log("The returned data", data);

        if(data.code == '000'){
          // successToast(data.description)
        }else{
          // errorToast(data.description)

        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
  }

  function formTwoValid(){
    let data = {
      'nric' : $('.nric').val(),
      'status_marriage' : $('.status_marriage').val(),
      'partner_name' : $('.partner_name').val(),
      'partner_no_tel' : $('.partner_no_tel').val(),
      'partner_no_phonehouse' : $('.partner_no_phonehouse').val(),
      'partner_address_1' : $('.partner_address_1').val(),
      'guardian_name' : $('.guardian_name').val(),
      'relationship_guardian' : $('.relationship_guardian').val(),
      'guardian_nric_old' : $('.guardian_nric_old').val(),
      'guardian_nric_new' : $('.guardian_nric_new').val(),
      'guardian_no_tel' : $('.guardian_no_tel').val(),
      'guardian_no_phonehouse' : $('.guardian_no_phonehouse').val(),
      'guardian_address_1' : $('.guardian_address_1').val(),
      'guardian_income' : $('.guardian_income').val(),
      'guardian_occupation' : $('.guardian_occupation').val(),
      'guardian_dependent' : $('.guardian_dependent').val(),
      'guardian_email' : $('.guardian_email').val(),
      'kin_name' : $('.kin_name').val(),
      'kin_relationship' : $('.kin_relationship').val(),
      'kin_no_tel' : $('.kin_no_tel').val(),
      'kin_no_phonehouse' : $('.kin_no_phonehouse').val(),
      'kin_email' : $('.kin_email').val(),
      'kin_address_1' : $('.kin_address_1').val(),
      'pendapatan_isi_rumah' : $('.pendapatan_isi_rumah').val()
    }

    $.ajax({
      url: "draft_two",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          // successToast(data.description)
        }else{
          // errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
  }

  function formThreeValid(){

    if($('.pengajian').val() == "Asasi"){

      var type_program_applied = $('.asasi_type_program_applied').val();
      if($('.asasi_type_program_applied').val() == 'Sepenuh Masa')
      {   
      var value = $('.asasi_program_one').val().split('|')
      var program_one = value[0];
      
      }

      else{

        var value = $('.asasi_program_one2').val().split('|')
        var program_one = value[0];
        

      }

    }
    else if($('.pengajian').val() == "Diploma"){

      var type_program_applied = $('.diploma_type_program_applied').val();
      if($('.diploma_type_program_applied').val() == 'Sepenuh Masa')
      {
        var value = $('.dip_program_one').val().split('|')  
        var program_one = value[0];
      
      }
      else{
        var value = $('.dip_program_one2').val().split('|')  
        var program_one = value[0];
        
      }

    }
    else if($('.pengajian').val() == "Sarjana Muda"){

      var type_program_applied = $('.muda_type_program_applied').val();
      if($('.muda_type_program_applied').val() == 'Sepenuh Masa')
      {
     
      var value = $('.muda_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.muda_program_one2').val().split('|')  
      var program_one = value[0];
       
      }

    }
    else if($('.pengajian').val() == "Sarjana"){

      var type_program_applied = $('.master_type_program_applied').val();
      if($('.master_type_program_applied').val() == 'Sepenuh Masa')
      {
      
      var value = $('.master_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.master_program_one2').val().split('|')  
      var program_one = value[0];
        
      }

    }
    else if($('.pengajian').val() == "Kedoktoran"){

      var type_program_applied = $('.doktor_type_program_applied').val();
      if($('.doktor_type_program_applied').val() == 'Sepenuh Masa')
      {
     
      var value = $('.doktor_program_one').val().split('|')  
      var program_one = value[0];
      }
      else{
        var value = $('.doktor_program_one2').val().split('|')  
        var program_one = value[0]; 
      }

    }
    else{
         
      var program_one = NULL;
      
    }



    let data = {
      'nric' : $('.nric').val(),
      'type_program_applied' : type_program_applied,
      'pengajian' : $('.pengajian').val(),
      'program_one' : program_one,
      'AlatMuzik' :  $('.alat_muzik').val(),
    }

    $.ajax({
      url: "draft_three",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          // successToast(data.description)
        }else{
          // errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
  }

  function formEmpatValid(){

     //add
     var index = [];
     $.each($("input[name='index']"), function(){
       index.push($(this).val());
     });
 
     var institution_others_qc = [];
     $.each($("input[name='institution_others_qc']"), function(){
       institution_others_qc.push($(this).val());
     });
 
     var grade_others_qc = [];
     $.each($("input[name='grade_others_qc']"), function(){
       grade_others_qc.push($(this).val());
     });
 
     var specialization_others_qc = [];
     $.each($("input[name='specialization_others_qc']"), function(){
       specialization_others_qc.push($(this).val());
     });
 
     var year_others_qc = [];
     $.each($("input[name='year_others_qc']"), function(){
       year_others_qc.push($(this).val());
     });
 
     //update
     var id = [];
     $.each($("input[id='id']"), function(){
       id.push($(this).val());
     });
 
     var institusidisplay = [];
     $.each($("input[id='institusidisplay']"), function(){
       institusidisplay.push($(this).val());
     });
 
     var gradedisplay = [];
     $.each($("input[id='gradedisplay']"), function(){
       gradedisplay.push($(this).val());
     });
 
     var khususdisplay = [];
     $.each($("input[id='khususdisplay']"), function(){
       khususdisplay.push($(this).val());
     });
 
     var tahundisplay = [];
     $.each($("input[id='tahundisplay']"), function(){
       tahundisplay.push($(this).val());
     });

    let data = {
      'nric' : $('.nric').val(),
      'year_muet' : $('.year_muet').val(),
      'place_muet' : $('.place_muet').val(),
      'band' : $('.band').val(),
      'speaking_grade' : $('.speaking_grade').val(),
      'reading_grade' : $('.reading_grade').val(),
      'writing_grade' : $('.writing_grade').val(),
      'institution' : institution_others_qc,
      'grade' : grade_others_qc,
      'specialization' : specialization_others_qc,
      'year' : year_others_qc,
      'index' : index,
      'id' : id,
      'institusidisplay' : institusidisplay,
      'gradedisplay' : gradedisplay,
      'khususdisplay' : khususdisplay,
      'tahundisplay' : tahundisplay,
      'cert_related_program' : $('.cert_related_program').val(),
      'description_cert' : $('.description_cert').val(),
      'work_exp_related_program' : $('.work_exp_related_program').val(),
      'description_work_exp' : $('.description_work_exp').val(),
    }

    $.ajax({
      url: "draft_empat",
      dataType: 'json',
      type: 'POST',
      data: data,
      headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          // successToast(data.description)
        }else{
          // errorToast(data.description)
        }
      }
      // ,
      // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });
  }

  function formLimaValid(){

    //add pmr
    var index_pmr = [];
    $.each($("input[name='index_pmr']"), function(){
      index_pmr.push($(this).val());
    });

    var subject_pmr = [];
    $.each($("select[name='subject_pmr']"), function(){
      subject_pmr.push($(this).val());
    });

    var grade_pmr = [];
    $.each($("select[name='grade_pmr']"), function(){
      grade_pmr.push($(this).val());
    });

    //update pmr
    var id_pmr = [];
    $.each($("input[id='id_pmr']"), function(){
      id_pmr.push($(this).val());
    });

    var usubject_pmr = [];
    $.each($("select[id='usubject_pmr']"), function(){
      usubject_pmr.push($(this).val());
    });

    var ugrade_pmr = [];
    $.each($("select[id='ugrade_pmr']"), function(){
      ugrade_pmr.push($(this).val());
    });

    //add spm
    var index_spm = [];
    $.each($("input[name='index_spm']"), function(){
      index_spm.push($(this).val());
    });

    var subject_spm = [];
    $.each($("select[name='subject_spm']"), function(){
      subject_spm.push($(this).val());
    });

    var grade_spm = [];
    $.each($("select[name='grade_spm']"), function(){
      grade_spm.push($(this).val());
    });

    //update spm
    var id_spm = [];
    $.each($("input[id='id_spm']"), function(){
      id_spm.push($(this).val());
    });

    var usubject_spm = [];
    $.each($("select[id='usubject_spm']"), function(){
      usubject_spm.push($(this).val());
    });

    var ugrade_spm = [];
    $.each($("select[id='ugrade_spm']"), function(){
      ugrade_spm.push($(this).val());
    });

    //add stpm
    var index_stpm = [];
    $.each($("input[name='index_stpm']"), function(){
      index_stpm.push($(this).val());
    });

    var subject_stpm = [];
    $.each($("select[name='subject_stpm']"), function(){
      subject_stpm.push($(this).val());
    });

    var grade_stpm = [];
    $.each($("select[name='grade_stpm']"), function(){
      grade_stpm.push($(this).val());
    });

    //update stpm
    var id_stpm = [];
    $.each($("input[id='id_stpm']"), function(){
      id_stpm.push($(this).val());
    });

    var usubject_stpm = [];
    $.each($("select[id='usubject_stpm']"), function(){
      usubject_stpm.push($(this).val());
    });

    var ugrade_stpm = [];
    $.each($("select[id='ugrade_stpm']"), function(){
      ugrade_stpm.push($(this).val());
    });

   let data = {
    'nric' : $('.nric').val(),
    'year_pmr' : $('.year_pmr').val(),
    'index_pmr' : index_pmr,
    'subject_pmr' : subject_pmr,
    'grade_pmr' : grade_pmr,
    'id_pmr' : id_pmr,
    'usubject_pmr' : usubject_pmr,
    'ugrade_pmr' : ugrade_pmr,
    'year_spm' : $('.year_spm').val(),
    'index_spm' : index_spm,
    'subject_spm' : subject_spm,
    'grade_spm' : grade_spm,
    'id_spm' : id_spm,
    'usubject_spm' : usubject_spm,
    'ugrade_spm' : ugrade_spm,
    'year_stpm' : $('.year_stpm').val(),
    'index_stpm' : index_stpm,
    'subject_stpm' : subject_stpm,
    'grade_stpm' : grade_stpm,
    'id_stpm' : id_stpm,
    'usubject_stpm' : usubject_stpm,
    'ugrade_stpm' : ugrade_stpm,
   }

   $.ajax({
     url: "draft_lima",
     dataType: 'json',
     type: 'POST',
     data: data,
     headers: { 
       'Content-Type': 'application/json',
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
       'X-Requested-With': 'XMLHttpRequest',
       'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
     },
     success: function(data, status) {
       console.log("The returned data", data);

       if(data.code == '000'){
         // successToast(data.description)
       }else{
         // errorToast(data.description)
       }
     }
     // ,
     // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
   });
 }

 function formEnamValid(){

  //add form6
  var index_form6 = [];
  $.each($("input[name='index_form6']"), function(){
    index_form6.push($(this).val());
  });

  var area_involvement = [];
  $.each($("input[name='area_involvement']"), function(){
    area_involvement.push($(this).val());
  });

  var organizer = [];
  $.each($("input[name='organizer']"), function(){
    organizer.push($(this).val());
  });

  var year_involvement = [];
  $.each($("input[name='year_involvement']"), function(){
    year_involvement.push($(this).val());
  });

  //update form6
  var id_form6 = [];
  $.each($("input[id='id_form6']"), function(){
    id_form6.push($(this).val());
  });

  var uarea_involvement = [];
  $.each($("input[id='uarea_involvement']"), function(){
    uarea_involvement.push($(this).val());
  });

  var uorganizer = [];
  $.each($("input[id='uorganizer']"), function(){
    uorganizer.push($(this).val());
  });

  var uyear_involvement = [];
  $.each($("input[id='uyear_involvement']"), function(){
    uyear_involvement.push($(this).val());
  });

 let data = {
  'nric' : $('.nric').val(),
  'index_form6' : index_form6,
  'area_involvement' : area_involvement,
  'organizer' : organizer,
  'year_involvement' :  year_involvement,
  'id_form6' : id_form6,
  'uarea_involvement' : uarea_involvement,
  'uorganizer' : uorganizer,
  'uyear_involvement' :  uyear_involvement,
 }

 $.ajax({
   url: "draft_enam",
   dataType: 'json',
   type: 'POST',
   data: data,
   headers: { 
     'Content-Type': 'application/json',
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
     'X-Requested-With': 'XMLHttpRequest',
     'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
   },
   success: function(data, status) {
     console.log("The returned data", data);

     if(data.code == '000'){
       // successToast(data.description)
     }else{
       // errorToast(data.description)
     }
   }
   // ,
   // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
 });
}

function formTujuhValid(){
  let data = {
    'nric' : $('.nric').val(),
    'job_type' : $('.job_type').val(),
    'monthly_income' : $('.monthly_income').val(),
    'year_working' : $('.year_working').val(),
    'company_name' : $('.company_name').val(),
    'company_address' : $('.company_address').val(),
    'no_faks' : $('.no_faks').val()
  }

  $.ajax({
    url: "draft_tujuh",
    dataType: 'json',
    type: 'POST',
    data: data,
    headers: { 
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'X-Requested-With': 'XMLHttpRequest',
      'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    success: function(data, status) {
      console.log("The returned data", data);

      if(data.code == '000'){
        // successToast(data.description)
      }else{
        // errorToast(data.description)
      }
    }
    // ,
    // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
  });
}

function formLapanValid(){

   //add form8
   var index_form8 = [];
   $.each($("input[name='index_form8']"), function(){
     index_form8.push($(this).val());
   });

   var course_taken = [];
   $.each($("input[name='course_taken']"), function(){
     course_taken.push($(this).val());
   });

   var course_organizer = [];
   $.each($("input[name='course_organizer']"), function(){
     course_organizer.push($(this).val());
   });

   var place_taken = [];
   $.each($("input[name='place_taken']"), function(){
     place_taken.push($(this).val());
   });

   var year_taken = [];
   $.each($("input[name='year_taken']"), function(){
     year_taken.push($(this).val());
   });

   //update form8
   var id_form8 = [];
   $.each($("input[id='id_form8']"), function(){
     id_form8.push($(this).val());
   });

   var ucourse_taken = [];
   $.each($("input[id='ucourse_taken']"), function(){
     ucourse_taken.push($(this).val());
   });

   var ucourse_organizer = [];
   $.each($("input[id='ucourse_organizer']"), function(){
     ucourse_organizer.push($(this).val());
   });

   var uplace_taken = [];
   $.each($("input[id='uplace_taken']"), function(){
     uplace_taken.push($(this).val());
   });

   var uyear_taken = [];
   $.each($("input[id='uyear_taken']"), function(){
     uyear_taken.push($(this).val());
   });


 let data = {
      'nric' : $('.nric').val(),
      'index_form8' : index_form8,
      'course_taken' : course_taken,
      'course_organizer' : course_organizer ,
      'place_taken' :  place_taken,
      'year_taken' :  year_taken,
      'id_form8' : id_form8,
      'ucourse_taken' : ucourse_taken,
      'ucourse_organizer' : ucourse_organizer ,
      'uplace_taken' :  uplace_taken,
      'uyear_taken' :  uyear_taken,
 }

 $.ajax({
   url: "draft_lapan",
   dataType: 'json',
   type: 'POST',
   data: data,
   headers: { 
     'Content-Type': 'application/json',
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
     'X-Requested-With': 'XMLHttpRequest',
     'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
   },
   success: function(data, status) {
     console.log("The returned data", data);

     if(data.code == '000'){
       // successToast(data.description)
     }else{
       // errorToast(data.description)
     }
   }
   // ,
   // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
 });
}

function formSembilanValid(){
  let data = {
    'nric' : $('.nric').val(),
    'sponsorship' : $('.sponsorship').val(),
    'address_sponsorship' : $('.address_sponsorship').val(),
    'type_sponsorship' : $('.type_sponsorship').val(),
    'reference_no_spsp' : $('.reference_no_spsp').val(),
    'date_offer' : $('.date_offer').val(),
    'monthly_amount_spsp' : $('.monthly_amount_spsp').val()
  }

  $.ajax({
    url: "draft_sembilan",
    dataType: 'json',
    type: 'POST',
    data: data,
    headers: { 
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'X-Requested-With': 'XMLHttpRequest',
      'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    success: function(data, status) {
      console.log("The returned data", data);

      if(data.code == '000'){
        // successToast(data.description)
      }else{
        // errorToast(data.description)
      }
    }
    // ,
    // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
  });
}

function formSepuluhValid(){

 //add form10
 var index_form10 = [];
 $.each($("input[name='index_form10']"), function(){
   index_form10.push($(this).val());
 });

 var club = [];
 $.each($("input[name='club']"), function(){
   club.push($(this).val());
 });

 var role = [];
 $.each($("input[name='role']"), function(){
   role.push($(this).val());
 });

 var year_takenclub = [];
 $.each($("input[name='year_takenclub']"), function(){
   year_takenclub.push($(this).val());
 });

 //update form10
 var id_form10 = [];
 $.each($("input[id='id_form10']"), function(){
   id_form10.push($(this).val());
 });

 var uclub = [];
 $.each($("input[id='uclub']"), function(){
   uclub.push($(this).val());
 });

 var urole = [];
 $.each($("input[id='urole']"), function(){
   urole.push($(this).val());
 });

 var uyear_takenclub = [];
 $.each($("input[id='uyear_takenclub']"), function(){
   uyear_takenclub.push($(this).val());
 });




 let data = {
   'nric' : $('.nric').val(),
   'index_form10' : index_form10,
   'club' : club,
   'role' : role,
   'year_takenclub' : year_takenclub,
   'id_form10' : id_form10,
   'uclub' : uclub,
   'urole' : urole,
   'uyear_takenclub' : uyear_takenclub,
   
 }


 $.ajax({
   url: "draft_sepuluh",
   dataType: 'json',
   type: 'POST',
   data: data,
   headers: { 
     'Content-Type': 'application/json',
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
     'X-Requested-With': 'XMLHttpRequest',
     'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
   },
   success: function(data, status) {
     console.log("The returned data", data);

     if(data.code == '000'){
       // successToast(data.description)
     }else{
       // errorToast(data.description)
     }
   }
   // ,
   // beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
 });
}

  $("#status_marriage").on('change', function (bp) {

    if($('.status_marriage').val() == 'Married'){
      $("#married_section").fadeIn(500).show()
      // $("#married_section").fadeIn(1000);
    }else{
      $("#married_section").hide()
      // $("#married_section")..fadeOut(1000);
    }

  }); 

  // On load Toast
  function successToast(desc){
    setTimeout(function () {
      toastr['success'](
        desc,
        'Success!',
        {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        }
      );
    }, 500);
  }

  function errorToast(desc){
    setTimeout(function () {
      toastr['success'](
        'ErrCode: ' + desc,
        'Error',
        {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        }
      );
    }, 500);
  }

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {

          //Permohonan
          nric: {
            required: true
          },
          name: {
            required: true
          },
          short_name: {
            required: true
          },
          date_of_birth: {
            required: true
          },
          place_of_birth: {
            required: true
          },
          address_1: {
            required: true
          },
          race: {
            required: true
          },
          state: {
            required: true
          },
          gender: {
            required: true
          },
          birth_cert_no: {
            required: true
          },
          nationality: {
            required: true
          },
          phone_no: {
            required: true
          },
          dun: {
            required: true
          },
          parliament: {
            required: true
          },


          // Personal
          status_marriage: {
            required: true
          },
          partner_name: {
            required: true
          },
          partner_no_tel: {
            required: true
          },
          partner_address_1: {
            required: true
          },

          guardian_name: {
            required: true
          },
          relationship_guardian: {
            required: true
          },
          guardian_nric_new: {
            required: true
          },
          guardian_no_tel: {
            required: true
          },
          guardian_address_1: {
            required: true
          },
          guardian_income: {
            required: true
          },
          guardian_occupation: {
            required: true
          },
          guardian_dependent: {
            required: true
          },
          guardian_email: {
            required: true
          },

          kin_name: {
            required: true
          },
          kin_relationship: {
            required: true
          },
          kin_no_tel: {
            required: true
          },
          kin_email: {
            required: true
          },
          kin_address_1: {
            required: true
          },


          //program
          type_program_applied: {
            required: true
          },
          program_one: {
            required: true
          },
          program_two: {
            required: true
          },


          // END
          
        }
      });
    });

    $(horizontalWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {

            var whichDraft = $(this).attr('data-draft');
            // alert(whichDraft)
            // return false;

            switch (whichDraft) {
              case 'draftOne':
                formOneValid()
                break;
              case 'draftTwo':
                formTwoValid()
                break;
              case 'draftThree':
                formThreeValid()
                break;
              case 'draftEmpat':
                formEmpatValid()
                break;
              case 'draftLima':
                formLimaValid()
                break;
              case 'draftEnam':
                formEnamValid()
                break;
              case 'draftTujuh':
                formTujuhValid()
                break;
              case 'draftLapan':
                  formLapanValid()
                  break;
              case 'draftSembilan':
                  formSembilanValid()
                  break;
              case 'draftSepuluh':
                  formSepuluhValid()
                  break;
              default:
                // alert('do nothing')
                break;
            }

            window.scrollTo({top: 0, behavior: 'smooth'});
            numberedStepper.next();
            
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find('.btn-prev')
      .on('click', function () {
        window.scrollTo({top: 0, behavior: 'smooth'});
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          alert('Submitted..!!');
        }
      });
  }

  // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    // var verticalStepper = new Stepper(verticalWizard, {
    //   linear: false
    // });

    // var numberedStepper = new Stepper(horizontalWizard),
    //   $form = $(horizontalWizard).find('form');
    // $form.each(function () {
    //   var $this = $(this);
    //   $this.validate({

    // alert('here')
    var verticalStepper = new Stepper(verticalWizard),
      $form = $(verticalWizard).find('form');
    $form.each(function () {
      // console.log($form)
      var $this = $(this);
      $this.validate({
        rules: {
          nric: {
            required: true
          },
          name: {
            required: true
          },
          

          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true
          },
          'confirm-password': {
            required: true,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'last-name': {
            required: true
          },
          address: {
            required: true
          },
          landmark: {
            required: true
          },
          country: {
            required: true
          },
          language: {
            required: true
          },
          twitter: {
            required: true,
            url: true
          },
          facebook: {
            required: true,
            url: true
          },
          google: {
            required: true,
            url: true
          },
          linkedin: {
            required: true,
            url: true
          }
        }
      });
    });

    $(verticalWizard)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper.next();
      });
    $(verticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        modernStepper.next();
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
      });

    $(modernWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
    var modernVerticalStepper = new Stepper(modernVerticalWizard, {
      linear: false
    });
    $(modernVerticalWizard)
      .find('.btn-next')
      .on('click', function () {
        modernVerticalStepper.next();
      });
    $(modernVerticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernVerticalStepper.previous();
      });

    $(modernVerticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }
});
