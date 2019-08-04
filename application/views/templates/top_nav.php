
    <!-- Logo -->
    <a href="<?=base_url()?>admin/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Shop U</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shop U Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><!--<h4><?=$this->lang->line('header_welcome');?></h4>--></li>
          <li>
            <select class="language-selector" onchange="javascript:window.location.href='<?php echo base_url(); ?>admin/LanguageSwitcher/switchLang/'+this.value;">
                <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                <option value="chinese" <?php if($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?>>Chinese</option>

                <?php echo $this->session->userdata('site_lang');?>
            </select>
            <p><?php echo $this->lang->line('welcome_message'); ?></p>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?=$this->session->userdata('totalorder')?></span>
            </a>
            <!--<ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?=base_url()?>/admin/message">See All Messages</a></li>
            </ul>-->
          </li> 
         
          <li>
            <a href="<?php echo base_url()?>auth/auth/logout"><i class="fa fa-sign-out"></i><?=$this->lang->line('header_logout');?></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

 