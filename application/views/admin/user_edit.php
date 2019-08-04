  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <form class="form-horizontal" id="userDiv" method="POST"  enctype="multipart/form-data" action="<?php echo base_url().'admin/user/save' ?>"><!-- form start -->
        <div class="box-header with-border">
          <h3 class="box-title"><?=$this->lang->line('form_title_useredit')?></h3>
          <?php $this->view('admin/alert_message');?>
          <div class="btn-toolbar pull-right">
            <button id="saveButton" type="submit" class="btn btn-primary" name="saveUser" value="saveUser"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?> </button>
            <button id="deleteButton" type="button" class="btn btn-default" onclick="location.href='<?=base_url('admin/user/delete/'.$user->id) ?>';"><i class="fa fa-trash"></i> <?=$this->lang->line('button_delete')?></button>
          </div>
        </div>   
        <div class="box-body">
          <div class="row">
            <div class="timeline-body">
              <div class="col-sm-2">
                <label class="cabinet center-block">
                  <figure>
                    <img src="<?php if($user->image) echo $user->image->url?>" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                    <figcaption><i class="fa fa-camera"></i></figcaption>
                  </figure>
                  <input type="file" class="item-img file center-block" name="file_photo"/>
                    </label>
              </div>
              <input type='hidden' id="userid" name="userid" value="<?=$user->id ?>" />
              <div class="col-sm-10">
                <h2><?=$user->username?></h2> (User ID: <?=$user->id?>) (Registration Date: <?=date_format(date_create($user->created_at), "m/d/Y")?>) 
                

                <?php 
                  if($user->status == 'disable')
                  {
                    $btn_id = 'enableButton';
                    $btn_icon = 'fa fa-check';
                    $lbl = $this->lang->line('button_enable');
                  }
                  else if($user->status == 'active')
                  {
                    $btn_id = 'disableButton';
                    $btn_icon = 'fa fa-ban';
                    $lbl = $this->lang->line('button_disable');
                  } 
                  else {
                    $btn_id = 'disableButton';
                    $btn_icon = 'fa fa-ban';
                    $lbl = $this->lang->line('button_disable');
                  }


                  echo '<button type="submit" class="btn btn-default pull-right" id="'.$btn_id.'" name="'.$btn_id.'" value="'.$btn_id.'"><i class="'.$btn_icon.'"></i>'.$lbl.'</button>';
              ?>

                <p>(User Type: <?=ucfirst($user->user_type->name)?>) (Account Status: <?=ucfirst($user->status)?>) </p>
              </div>
            </div><!-- timeline-body -->
          </div><!-- row -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_username')?></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="username" name="username" value="<?=$user->username?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userfirstname')?></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$user->first_name?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userlastname')?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->last_name?>">
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usertype');?></label>
              <div class="col-sm-4">
                <select class="form-control" name="usertype" readonly>
                  <option value="<?=$user->user_type->id?>"><?=$user->user_type->name?></option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useremail')?></label>
              <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" value="<?=$user->email?>" readonly>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usergender')?></label>
              <div class="col-sm-4">
                <select class="form-control" name="gender">
                  <option <?php if(!$user->gender) echo 'selected';?>></option>
                  <option value="M" <?php if($user->gender == 'm') echo 'selected';?>>Male</option>
                  <option value="F" <?php if($user->gender == 'f') echo 'selected';?>>Female</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userdob')?></label>
              <div class="date col-sm-4">
                <div class="input-group date">
                  <input type="text" class="form-control pull-right" id="datepicker" value="<?=date_format(date_create($user->birth_date), "m/d/Y")?>" name="dob">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usermobile')?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$user->mobile_phone?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useraddress')?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="address" name="address" value="<?=$user->address?>">
              </div>
          </div>
          <?php if($user->user_type_id == 3) {?>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <fieldset class="formfieldset col-sm-8">
              <legend class="fieldsetLegend"><?=$this->lang->line('lbl_userretailer_userinfo')?></legend>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usershopid')?></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shop_id" name="shop_id" value="<?php if($user->shop) echo $user->shop->id;?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usershopname')?></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_en" name="shopname_en" value="<?php if($user->shop) echo $user->shop->name_en;?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_sc" name="shopname_sc" value="<?php if($user->shop) echo $user->shop->name_sc;?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_tc" name="shopname_tc" value="<?php if($user->shop) echo $user->shop->name_tc;?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-info btn-block" disabled><?=$this->lang->line('button_gotoshop')?></button>
                    </div>
                </div>
              </fieldset>
            </div>
            <?php } ?>
            <?php if($user->user_type_id == 4) {?>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <fieldset class="formfieldset col-sm-8">
              <legend class="fieldsetLegend"><?=$this->lang->line('lbl_userconsumer_userinfo')?></legend>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <table class="table table-condensed">
                        <tr>
                          <th><?=$this->lang->line('tbl_col_userorderid')?></th>
                          <th><?=$this->lang->line('tbl_col_userproducttitle')?></th>
                          <th><?=$this->lang->line('tbl_col_userproductid')?></th>
                          <th><?=$this->lang->line('tbl_col_usershoptitle')?></th>
                          <th><?=$this->lang->line('tbl_col_userstatus')?></th>
                          <th><?=$this->lang->line('tbl_col_userprice')?></th>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                    </div>
                </div>
            </fieldset>
          </div>
          <?php } ?> 
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
        </div> <!-- box-body -->
      </form>
    </div> <!-- box-info -->
  </section><!-- /.content -->

  