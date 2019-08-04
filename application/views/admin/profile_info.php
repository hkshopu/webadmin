  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <form class="form-horizontal" id="profileDiv" method="POST" enctype="multipart/form-data" action="<?php echo base_url().'admin/profile/save' ?>"><!-- form start -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>
        <?php $this->view('admin/alert_message');?>
        <div class="btn-toolbar pull-right">
          <button type="submit" class="btn btn-primary" id="saveButton" name="saveProfile" value="saveProfile"> <?=$this->lang->line('button_save')?> </button>
        </div>
      </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="timeline-body">
              <div class="col-sm-2">
                <!--<img src="http://placehold.it/150x100" alt="Profile Picture" class="margin" id="UserPic" style="height: 100px; width: 150px;">
                <input type='file' id="imgInp" name="userfile"/>-->
            
                  <label class="cabinet center-block">
                  <figure>
                    <img src="<?php if($user->image) echo $user->image->url?>" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                    <figcaption><i class="fa fa-camera"></i></figcaption>
                  </figure>
                  <input type="file" class="item-img file center-block" name="file_photo"/>
                    </label>
                
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_username')?></label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="userid" name="userid" value="<?=$user->id?>">
                    <input type="text" class="form-control" id="username" name="username" value="<?=$user->username?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usertype')?></label>
                  <div class="col-sm-8">
                    <select class="form-control" id="usertype" name="usertype" readonly>
                      <option value="<?=$user->user_type->id?>"><?=$user->user_type->name?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userstatus')?></label>
                  <div class="col-sm-8">
                    <select class="form-control" id="userstatus" name="userstatus">
                      <?php foreach($userstatus as $ustatus) {?>
                      <option value="<?=$ustatus->id?>" <?php if($user->status) {if($ustatus->name == $user->status) echo "selected";}?>><?=ucfirst($ustatus->name)?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userfirstname')?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$user->first_name?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userlastname')?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->last_name?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useremail')?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$user->email?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userdob')?></label>
                    <div class="date col-sm-8">
                      <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="datepicker" name="dob" value="<?=date_format(date_create($user->birth_date), "m/d/Y")?>">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usergender')?></label>
                  <div class="col-sm-8">
                    <select class="form-control" name="gender">
                      <option></option>
                      <option value="m" <?php if($user->gender == 'm') echo "selected";?>>Male</option>
                      <option value="f" <?php if($user->gender == 'f') echo "selected";?>>Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usermobile')?></label>
                  <div class="col-sm-8">
                    <input type="text" pattern="[0-9]*" class="form-control" id="mobile" name="mobile" value="<?=$user->mobile_phone?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useraddress')?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address" value="<?=$user->address?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userpassword')?></label>
                  <div class="col-sm-8">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" name="password"><?=$this->lang->line('button_changepass')?></button>
                  </div> 
                </div>
                <!-- /.modal -->    
                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?=$this->lang->line('lbl_changepass')?></h4>
                      </div>
                      <div class="modal-body">

                        <div class="form-group">
                          <label class="col-sm-4 control-label"><?=$this->lang->line('lbl_currentpass')?></label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label"><?=$this->lang->line('lbl_newpass')?></label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="newpassword" name="newpassword">
                            <span class="error" id="validateNewPassword" style="color:red;display:none;">Mininum password length is 6 characters.</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label"><?=$this->lang->line('lbl_confirmnewpass')?></label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="cnewpassword" name="cnewpassword">
                            <span class="error" id="validatePassword" style="color:red;display:none;">Password does not match.</span>
                            <span class="error" id="validateConfirmPassword" style="color:red;display:none;">Mininum password length is 6 characters.
                          </div>
                        </div>
                      </div><!-- /.modal-body -->
                        <div class="modal-footer">
                          <div class="btn-toolbar pull-right">
                          <button type="button" class="btn btn-default pull-left" id="cancel" data-dismiss="modal"><?=$this->lang->line('button_cancel')?></button>
                          <button type="button" id="load" class="btn btn-primary modbutton" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing" ><?=$this->lang->line('button_submit')?></button>
                        </div>
                        </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                          Edit Photo</h4>
                      </div>
                      <div class="modal-body">
                        <div id="upload-demo" class="center-block"></div>
                      </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div><!--col-sm-6-->
            </div><!--timeline-body-->
          </div><!--row-->
        </div><!--box-body-->
      </form>
    </div><!--box-info-->
  </section><!-- /.content -->

  