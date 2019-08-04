<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$header_title?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="login-page">
  <div class="login-box"> 
    <div class="row">
      <div class="col-sm-6">
        <h3>Welcome to HKShopU Web Admin</h3>
          <ul class="list-unstyled" style="line-height: 2; font-size: 20px;">
            <li><span class="fa fa-check text-success"></span> See all your orders</li>
            <li><span class="fa fa-check text-success"></span> Fast re-order</li>
            <li><span class="fa fa-check text-success"></span> Save your favorites</li>
            <li><span class="fa fa-check text-success"></span> Fast checkout</li>
            <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
            
          </ul>
        <p><a href="<?php echo base_url().'auth/register';?>" class="btn btn-block btn-transparent">Yes please, register now!</a></p>   
      </div>
      <div class="col-sm-6 line-separator">
       
        <!-- Horizontal Form -->
          <div class="box box-info">
             <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?=base_url('auth/auth/login')?>">
              <div class="box-body">
                <img class="login-logo" src = "<?=base_url()?>/assets/dist/img/logo.png">
                <?php if($this->session->flashdata('msg')) {?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error</h4>
                    <?php echo $this->session->flashdata('msg');?>
                </div>
              <?php }?>
              <?php if(validation_errors()) {?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error</h4>
                    <?php echo validation_errors(); ?>
                </div>
              <?php }?>
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                  </div> 
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-unlock-alt"></i>
                      </div>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div> 
                </div>
                <div class="form-group">
                  <div class="col-sm-6">
                    <button type="submit" name="login" class="btn btn-info pull-left btn-block" value="login">Login</button>
                  </div>
                  <div class="col-sm-6">
                    <u><a href="#" class="forgotpass_link">Forgot Password?</a></u>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <p class="fancy"><span>Do not have an account?</span></p>
                <input class="btn btn-custom btn-block" type="button" onclick="location.href='<?=base_url('auth/register') ?>';" value="Create an account" />
              </div>
              <div class="box-footer">
                <img id="shopping_bag" src = "<?=base_url()?>/assets/dist/img/shopping_bag.jpg" style='height: 100%; width: 100%; object-fit: contain'>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
