/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/scripts.js ***!
  \****************************************/
(function (window, undefined) {
  'use strict';
  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

  var baseURL = 'http://127.0.0.1:8000/'

  $('.deleteProgram').on('click', function (event) {

    let program_id = event.currentTarget.attributes["program-id"].value;

    let data = {
      'program_id' : program_id
    }

    var tokenString = 'fzvIEL5BFUDaGaeuPbuB7PmbfVF87MHYnZMfT3CZ'

    $.ajax({
      url: "api/delete_program",
      dataType: 'json',
      type: 'POST',
      data: data,
      success: function(data, status) {
        console.log("The returned data", data);

        if(data.code == '000'){
          location.reload(true);
        }

      },
      beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + tokenString ); } //set tokenString before send
    });

    // navigator.clipboard.writeText(event.currentTarget.attributes["trx-id"].value)
    //   .then(() => {
    //     copyToClipboardToast()
    //     // alert('Text copied to clipboard');
    //   })
    //   .catch(err => {
    //     errorCopyToClipboardToast(err)
    //     // alert('Error in copying text: ', err);
    //   });
    
  });

})(window);
/******/ })()
;