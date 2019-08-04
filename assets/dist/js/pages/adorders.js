$(document).ready(function(){
  //show_adorders();
  $('.adorders').DataTable({
    dom:  "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
          "<'row'<'col-md-6'><'col-md-6'>>" +
          "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
    buttons: [
                'csv', 'pdf', 'print'
            ]
    })

  $('#editButton').click(function(){
       $('#shop,#orderstatus,#requestedamount,#bonuspoint,#remains,#amountused,#datepicker1,#datepicker2,#adtitle_check,#adcontent_check,#product_check,#upload_check').prop('disabled',false);
       $('#editButton').hide();
       $("#saveButton").toggleClass('invisible ');
       $("#cancelButton").toggleClass('invisible ');
       $("#cancelOrder").prop('disabled', true);
       $("#displayOrder").prop('disabled', true);
    });

  $('#cancelButton').click(function(){
       $('#shop,#orderstatus,#requestedamount,#bonuspoint,#remains,#amountused,#datepicker1,#datepicker2,#adtitle_check,#adcontent_check,#product_check,#upload_check').prop('disabled',true);
       $("#saveButton").toggleClass(' invisible');
       $('#editButton').show();
       $('#editButton').prop('disabled', false);
       $('#cancelButton').prop('disabled', true); 
       $("#cancelOrder").prop('disabled', false);
       $("#displayOrder").prop('disabled', false);
    });

  $('#adtitle_check').change(function () {
      $("#adtitle").prop("disabled", !this.checked);
  });

  $('#adcontent_check').change(function () {
      $("#content").prop("disabled", !this.checked);
  });

  $('#product_check').change(function () {
      $("#product").prop("disabled", !this.checked);
  });

  $('#upload_check').change(function () {
      $("#uploadButton").prop("disabled", !this.checked);
      $("#uploadFile").prop("disabled", !this.checked);
  });

});

