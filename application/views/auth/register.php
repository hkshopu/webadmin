<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HKShopU | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- jQuery 3 -->
  <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){

        $('.captcha-refresh').on('click', function(){
            $.get('<?php echo base_url().'auth/auth/refresh';?>', function(data){
              $('#image_captcha').html(data);
            });
        });

        $("input#username").on({
          keydown: function(e) {
            if (e.which === 32)
              return false;
          },
          change: function() {
            this.value = this.value.replace(/\s/g, "");
          }
        });

        $('#firstname').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z ]/i,'') ); }
);

        $('#lastname').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z ]/i,'') ); }
);

       /*$('#lastname').keypress(function(e) {
            var keyCode = (e.keyCode ? e.keyCode : e.which);
            if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){
                e.preventDefault();
            }
        });*/

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
          data = $('#cpassword').val();
          var len = data.length;
        
        if(len < 6) {
           $("#validateCText").show();
        } else {
          $("#validateCText").hide();
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

        $("#shop_name_en").keyup(function(e){                               
          $("#shopname").hide();
        }); 

        $("#shop_name_tc").keyup(function(e){                               
          $("#shopname").hide();
        }); 

        $("#shop_name_sc").keyup(function(e){                               
          $("#shopname").hide();
        }); 

        $("#register").click(function(e) {
          
          var name_en = $("#shop_name_en").val();
          var name_tc = $("#shop_name_tc").val();
          var name_sc = $("#shop_name_sc").val();
          var firstname = $("#firstname").val();
          var lastname = $("#lastname").val();
          var email = $("#email").val();
           passlen = $('#password').val();
           newpasslen = $('#cpassword').val();

          var len1 = passlen.length;
          var len2 = newpasslen.length;
        
        if(len1 < 6) {
           e.preventDefault();
        } 
        if(len2 < 6) {
          e.preventDefault();
        }

          var first = /^[a-zA-Z\s]*$/;
          var last = /^[a-zA-Z\s]*$/;
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;

          if(regex.test(email))
          {
           $("#validateEmail").hide();
          } else {
             $("#validateEmail").show();
            e.preventDefault();
            
          }

          if(first.test(firstname))
          {
            $("#validateFirstname").hide();
          } else {
            $("#validateFirstname").show();
            e.preventDefault();
            
          }

          if(last.test(lastname))
          {
            $("#validateLastname").hide();
          } else {
            
            $("#validateLastname").show();
            e.preventDefault();
          }

          if ((name_en == '' && name_tc == '' && name_sc == '')) {
            e.preventDefault();
            $("#shopname").show();
          } else {
            $("#shopname").hide();
          }

          if($("#password").val() != $("#cpassword").val() ){
              e.preventDefault();
              $("#matchText").show()
          }
        });
    });
  </script>

</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="row">
      <div class="col-sm-6">
        <h3>Welcome to HKShopU Web Admin</h3>
          <ul class="list-unstyled" style="line-height: 2; font-size: 20px;">
            <li><span class="fa fa-check text-success"></span> See all your orders</li>
            <li><span class="fa fa-check text-success"></span> Fast re-order</li>
            <li><span class="fa fa-check text-success"></span> Save your favorites</li>
            <li><span class="fa fa-check text-success"></span> Fast checkout</li>
            <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
            <li><a class="btn-transparent btn btn-block " href="<?php echo base_url();?>"><u>Back to Login Page</u></a></li>
          </ul>
      </div>
      <div class="col-sm-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
        
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?=base_url('auth/auth/register')?>">
              <div class="box-body">
                <?php

                  if($this->session->flashdata())
                  {
                    $msg_class = ($this->session->flashdata('message_type') == 'Success') ? 'success' : 'danger';
                    $msg_icon = ($this->session->flashdata('message_type') == 'Success') ? 'check' : 'ban';
                   
                    $html_message = '';
                    $html_message .= '<div class="alert alert-'.$msg_class.' alert-dismissible">';
                    $html_message .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    $html_message .= '<h4><i class="icon fa fa-'.$msg_icon.'"></i>';
                    $html_message .= $this->session->flashdata('message_type');
                    $html_message .= '</h4>';
                    $html_message .= $this->session->flashdata('message');
                    $html_message .= '</div>';
                    echo $html_message;
                  }                
                ?>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" value="<?=$this->session->flashdata('username')?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">First Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$this->session->flashdata('firstname')?>" required>
                    <span class="error" id="validateFirstname" style="color:red;display:none;">Cannot have invalid characters</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Last Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$this->session->flashdata('lastname')?>" required>
                    <span class="error" id="validateLastname" style="color:red;display:none;">Cannot have invalid characters</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" value="<?=$this->session->flashdata('email')?>" required>
                    <span class="error" id="validateEmail" style="color:red;display:none;">Invalid email format</span>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-4 control-label">Password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="password" name="password" required>
                  <span class="error" id="validateText" style="color:red;display:none;">Mininum password length is 6 characters.</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Confirm Password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                  <span class="error" id="matchText" style="color:red;display:none;">Password does not match.</span>
                  <span class="error" id="validateCText" style="color:red;display:none;">Mininum password length is 6 characters.</span>
                </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Shop Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="shop_name_en" name="shop_name_en" value="<?=$this->session->flashdata('shop_name_en')?>">
                    <span id="shopname" style="color:red;display:none;">At least one shop name is required.</span>
                  </div>
                   <div class="col-sm-2">
                    (En)
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="shop_name_tc" name="shop_name_tc" value="<?=$this->session->flashdata('shop_name_tc')?>">
                  </div>
                   <div class="col-sm-2">
                    (Tc)
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="shop_name_sc" name="shop_name_sc" value="<?=$this->session->flashdata('shop_name_sc')?>">
                  </div>
                   <div class="col-sm-2">
                    (Sc)
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Shop Category</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="shopcategory" required>
                      <?php foreach($shopcategory as $category) {?>
                        <option value="<?=$category->id?>"><?=$category->name?></option>
                      <?php } ?>
                  </select>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Verify</label>
                  <div class="col-sm-6">
                    <p id="image_captcha"><?php echo $captchaImg; ?></p>
                  </div>
                  <div class="col-sm-1 ">
                    <a href="javascript:void(0);" class="captcha-refresh"><i class="fa fa-refresh"></i></a>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="captcha" name="captcha" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-custom btn-block" name="register" id="register" value="register">Create Account</button>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                    By clicking "Create Account", you agree to the Terms & Privacy Policy.
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</body>
</html>
