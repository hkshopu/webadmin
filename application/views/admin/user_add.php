<section class="content"><!-- Main content -->
  <div class="box box-primary"><!-- Horizontal Form -->
    <div class="box-header with-border">
      <h3 class="box-title"><?=$this->lang->line('form_title_useradd')?></h3>
      <?php $this->view('admin/alert_message');?>
    </div><!-- /.box-header -->
    <form class="form-horizontal" method="POST" action="<?php echo base_url().'admin/user/save' ?>"><!-- form start -->
      <div class="box-body">
        <div class="row">
          <div class="timeline-body">
            <div class="col-sm-2">
             
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userfirstname')?></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="firstname" name="firstname">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userlastname')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_username')?></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userpassword')?></label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="password" name="password" required>
                  <span class="error" id="validateText" style="color:red;display:none;">Mininum password length is 6 characters.</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userconfirmpassword')?></label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                  <span class="error" id="matchText" style="color:red;display:none;">Password does not match.</span>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usercategory');?></label>
              <div class="col-sm-4">
                <select class="form-control" name="usertype" required>
                  <option></option>
                  <?php foreach($usertype as $utype) {?>
                  <option value="<?=$utype->id?>"><?=ucfirst($utype->name)?></option>
                <?php } ?>
                </select>
              </div>
              </div>
              <div class="form-group">
              <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usershop');?></label>
              <div class="col-sm-4">
                <select class="form-control" name="shopcategory">
                  <option></option>
                  <?php foreach($shopcategory as $shop) {?>
                  <option value="<?=$shop->id?>"><?=$shop->name?></option>
                <?php } ?>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useremail')?></label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <div class="btn-toolbar col-sm-4">
                  <button type="reset" class="btn btn-default"><?=$this->lang->line('button_cancel')?></button>
                  <button type="submit" name="addUser" id="addUser" class="btn btn-info" value="Submit"><?=$this->lang->line('button_submit')?></button>
                </div>
              </div>
            </div><!--col-sm-10 -->
          </div><!-- /.timeline-body -->
        </div><!--row-->
      </div><!-- /.box-body -->
    </form>
  </div><!-- /.box-info -->
</section><!-- /.content -->

  