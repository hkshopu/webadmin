
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$this->session->userdata('img')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('username')?></p>
          <p><?=ucfirst($this->session->userdata('usertype'))?></p>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?=base_url('admin/dashboard') ?>">
            <i class="fa fa-home"></i>
            <span><?=$this->lang->line('menu_dashboard');?></span>
          </a>
        </li>
        <?php if($this->session->userdata('level_id') != 3) {?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span><?=$this->lang->line('menu_usermanagement');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/user') ?>"><?=$this->lang->line('submenu_userlist');?></a></li>
            <li><a href="<?=base_url('admin/user/add') ?>"><?=$this->lang->line('submenu_addnewuser');?></a></li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if($this->session->userdata('level_id') == 3) {?>
          <li>
            <?php if($this->session->userdata('user_shop_id')) {?>
              <a href="<?=base_url('admin/shop/edit/'.$this->session->userdata('user_shop_id')) ?>">
            <?php } else {?>
              <a href="<?=base_url('admin/shop/add/')?>">
            <?php } ?>
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->lang->line('menu_shopmanagement');?></span>
          </a>
        </li>
        <?php } else {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->lang->line('menu_shopmanagement');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?=base_url('admin/shop') ?>"><?=$this->lang->line('submenu_shoplist');?></a></li>
          </ul>
        </li>
      <?php } ?>
      <?php if($this->session->userdata('level_id') == 3) {?>
        <li>
          <a href="<?=base_url('admin/product')?>">
          <i class="fa fa-cube"></i>
          <span><?=$this->lang->line('menu_productmanagement');?></span>
          </a>
        </li>
      <?php } else {?>
        <li class="treeview">
          <a href="#">
              <i class="fa fa-cube"></i>
            <span><?=$this->lang->line('menu_productmanagement');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/product') ?>"><?=$this->lang->line('submenu_productlist');?></a></li>
            <li><a href="<?=base_url('admin/productcategory') ?>"><?=$this->lang->line('submenu_productcategory');?></a></li>
          </ul>
        </li>
      <?php } ?>
        <li>
          <a href="<?=base_url('admin/order') ?>">
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->lang->line('menu_ordermanagement');?></span>
          </a>
        </li>
      
      <?php if($this->session->userdata('level_id') == 3) {?>
        <li>
          <a href="<?=base_url('admin/adorder')?>">
          <i class="fa fa-bullhorn"></i>
          <span><?=$this->lang->line('menu_admanagement');?></span>
          </a>
        </li>
      <?php } else {?>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-bullhorn"></i>
            <span><?=$this->lang->line('menu_admanagement');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/adorder') ?>"><?=$this->lang->line('submenu_adbuyerlist');?></a></li>
            <li><a href="<?=base_url('admin/adorderfee') ?>"><?=$this->lang->line('submenu_adfeesetting');?></a></li>
          </ul>
        </li>
      <?php } ?>
        
      <!--<?php if($this->session->userdata('level_id') == 3) {?>
        <li>
          <a href="<?=base_url('admin/blog')?>">
          <i class="fa fa-commenting-o"></i>
          <span><?=$this->lang->line('menu_blogmanagement');?></span>
          </a>
        </li>
      <?php } else {?>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-commenting-o"></i>
            <span><?=$this->lang->line('menu_blogmanagement');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/blog') ?>"><?=$this->lang->line('submenu_bloglist');?></a></li>
            <li><a href="<?=base_url('admin/blog/add') ?>"><?=$this->lang->line('submenu_addnewblog');?></a></li>
            <li><a href="<?=base_url('admin/blogcategory') ?>"><?=$this->lang->line('submenu_blogcategory');?></a></li>
            <li><a href="<?=base_url('admin/blogcategory/add') ?>"><?=$this->lang->line('submenu_addnewblogcategory');?></a></li>
          </ul>
        </li>
      <?php } ?> -->
      <?php if($this->session->userdata('level_id') == 3) {?> 
        <li>
          <a href="<?=base_url('admin/profile')?>">
          <i class="fa fa-user"></i>
          <span><?=$this->lang->line('submenu_profile');?></span>
          </a>
        </li>
      <?php } else {?>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-gear"></i>
            <span><?=$this->lang->line('menu_settings');?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/profile') ?>"><?=$this->lang->line('submenu_profile');?></a></li>
          </ul>
        </li>
      <?php } ?>   
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>