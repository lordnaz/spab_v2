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
      'kin_address_1' : $('.kin_address_1').val()
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

    let data = {
      'nric' : $('.nric').val(),
      'type_program_applied' : $('.type_program_applied').val(),
      'program_one' : $('.program_one').val(),
      'program_two' : $('.program_two').val()
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
      'kin_address_1' : $('.kin_address_1').val()
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
    let data = {
      'nric' : $('.nric').val(),
      'type_program_applied' : $('.type_program_applied').val(),
      'program_one' : $('.program_one').val(),
      'program_two' : $('.program_two').val()
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
          house_no: {
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
          partner_no_phonehouse: {
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
          guardian_no_phonehouse: {
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
          kin_no_phonehouse: {
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
