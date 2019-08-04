$(document).ready(function(){
  
  $('#adtitle_check').change(function () {
      $("#adtitle").prop("disabled", this.checked);
  });

  $('#adcontent_check').change(function () {
      $("#content").prop("disabled", this.checked);
  });

  $('#product_check').change(function () {
      $("#product").prop("disabled", this.checked);
  });

  $('#upload_check').change(function () {
      $("#uploadButton").prop("disabled", this.checked);
      $("#uploadFile").prop("disabled", this.checked);
  });

});