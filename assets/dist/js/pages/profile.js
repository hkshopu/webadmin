$(document).ready(function(){

  var inputBox = document.getElementById("mobile");

var invalidChars = [
  "-",
  "+",
  "e",
];

inputBox.addEventListener("input", function() {
  this.value = this.value.replace(/[e\+\-]/gi, "");
});

inputBox.addEventListener("keydown", function(e) {
  if (invalidChars.includes(e.key)) {
    e.preventDefault();
  }
});

  $("[data-hide]").on("click", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });

$("#newpassword").keyup(function(e){  
          data = $('#newpassword').val();
          var len = data.length;
        
        if(len < 6) {
           $("#validateNewPassword").show();
        } else {
          $("#validateNewPassword").hide();
        }

      });

$("#cnewpassword").keyup(function(e){  

          if($("#newpassword").val() != $("#cnewpassword").val() ){
              $("#validatePassword").show()
          }
          else{
              $("#validatePassword").hide();
              }

          data = $('#cnewpassword').val();
          var len = data.length;
        
        if(len < 6) {
           $("#validateConfirmPassword").show();
        } else {
          $("#validateConfirmPassword").hide();
        }
      }); 


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


        $('#modal-default').on('click', '.modbutton', function(){

    var id = $('#userid').val();
    var newpassword = $('#newpassword').val();
    var currentpassword = $('#currentpassword').val();
    var cnewpassword = $('#cnewpassword').val();

    var current = $('#validatePassword').is(":hidden"); 
    var newpass = $('#validateNewPassword').is(":hidden"); 
    
    
    if(newpassword == cnewpassword)
    { if (current && newpass) {
      $.ajax({
      type: 'POST', 
      url:  'profile/updatePassword',
      dataType: 'json',
      async: false,
      data: {id : id, currentpassword : currentpassword, newpassword : newpassword},
      success: function(data){
       var msg = JSON.parse(data['response']);
      
        if(msg['success'] == 'false')
        {
          alert("Password not updated. " +msg['message'])
        } else {
         if(!alert('Password successfully updated')){window.location.reload();}
          //alert("Password successfully updated");
        }
      },
      error:function(){//remove gif}
      }
    });
    } else {
      alert('Password could not be saved due to errors.');
    }
    } else {
          alert("Password unmatched.");
    }
    
    
});


});




function changePassword()
{


  
    
}   