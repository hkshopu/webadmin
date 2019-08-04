$(document).ready(function(){

/*$("#userfile").change(function () {
    filePreview(this);
});

function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#UserPic').attr('src', e.target.result).height(100).width(150);
        }
        reader.readAsDataURL(input.files[0]);
    }
}*/

// Start upload preview image
var id = $('#userid').val();
if($(".gambar").attr('src') == "")
{
  $(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
} 
            var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;
            function readFile(input) {
              if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                  $('.upload-demo').addClass('ready');
                  $('#cropImagePop').modal('show');
                        rawImg = e.target.result;
                      }
                      reader.readAsDataURL(input.files[0]);
                  }
                  else {
                    swal("Sorry - you're browser doesn't support the FileReader API");
                }
            }

            $uploadCrop = $('#upload-demo').croppie({
              viewport: {
                width: 250,
                height: 250,
              },
              enforceBoundary: false,
              enableExif: true
            });
            $('#cropImagePop').on('shown.bs.modal', function(){
              // alert('Shown pop');
              $uploadCrop.croppie('bind', {
                    url: rawImg
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
            });

            $('.item-img').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();
                                                     $('#cancelCropBtn').data('id', imageId); readFile(this); });
            $('#cropImageBtn').on('click', function (ev) {
              $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                size: {width: 250, height: 250}
              }).then(function (resp) {
                $.ajax({
                  url:"profile/upload/" + id,
                  type: "POST",
                  data:{"image": resp},
                  success:function(data)
                  {
                    $('#item-img-output').attr('src', resp);
                    $('#cropImagePop').modal('hide');
                  }
                });
                
              });
            });
        // End upload preview image


        $("#password").keyup(function(e){  
          data = $('#password').val();
          var len = data.length;
        
        if(len < 6) {
           $("#validateText").show();
        } else {
          $("#validateText").hide();
        }

      });

        $("#cpassword").keyup(function(e){  

          if($("#password").val() != $("#cpassword").val() ){
              $("#matchText").show()
          }
          else{
              $("#matchText").hide();
              }
      }); 

        $("#addUser").click(function(e) {
          
          var password = $("#password").val();
          var cpassword = $("#cpassword").val();
          
          if ((password == '' || cpassword == '')) {
            e.preventDefault();
          } 

          if($("#password").val() != $("#cpassword").val() ){
              e.preventDefault();
          }
        });

})

