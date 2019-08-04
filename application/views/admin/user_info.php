  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <form class="form-horizontal" id="userDiv" method="POST" action="<?php echo base_url().'admin/user/save' ?>"><!-- form start -->
        <div class="box-header with-border">
          <h3 class="box-title"><?=$this->lang->line('form_title_userinfo');?></h3>
          <!--<div class="btn-toolbar pull-right">
            <button id="saveButton" type="submit" class="btn btn-primary invisible" name="saveUser" value="saveUser"> Save </button>
            <button id="editButton" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
            <button id="deleteButton" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default" disabled>
              <i class="fa fa-trash"></i> Delete</button>
            <button id="cancelButton" type="button" class="btn btn-default" disabled>Cancel</button>
          </div> -->
        </div>   
        <div class="box-body">
          <div class="row">
            <div class="timeline-body">
              <div class="col-sm-2">
                <label class="cabinet center-block">
                  <figure>
                    <img src="<?php if($user->image) echo $user->image->url?>" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                    
                  </figure>
                    </label>
              </div>
              <div class="col-sm-10">
                <h2><?=$user->username?></h2> (User ID: <?=$user->id?>) (Registration Date: <?=date_format(date_create($user->created_at), "m/d/Y")?>) 
                <!--<button id="disableButton" type="button" class="btn btn-danger pull-right" disabled><i class="fa fa-ban"></i> Disable</button> -->
                <p>User Type: <?=ucfirst($user->user_type->name)?> Account Status: <?=ucfirst($user->status)?> </p>
              </div>
            </div><!-- timeline-body -->
          </div><!-- row -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_username')?></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="username" name="username" value="<?=$user->username?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userfirstname');?></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$user->first_name?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userlastname');?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->last_name?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usertype');?></label>
              <div class="col-sm-4">
                <select class="form-control" name="usertype" disabled>
                  <option></option>
                  <option <?php if($user->gender == 'M') echo 'selected';?>>Male</option>
                  <option <?php if($user->gender == 'F') echo 'selected';?>>Female</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useremail');?></label>
              <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" value="<?=$user->email?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usergender');?></label>
              <div class="col-sm-4">
                <select class="form-control" name="gender" disabled>
                  <option></option>
                  <option <?php if($user->gender == 'M') echo 'selected';?>>Male</option>
                  <option <?php if($user->gender == 'F') echo 'selected';?>>Female</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_userdob');?></label>
              <div class="date col-sm-4">
                <div class="input-group date">
                  <input type="text" class="form-control pull-right" id="datepicker" name="dob" value="<?=date_format(date_create($user->birth_date), "m/d/Y")?>" disabled>
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usermobile');?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$user->mobile_phone?>" disabled>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_useraddress');?></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="address" name="address" value="<?=$user->address?>" disabled>
              </div>
          </div>
          <?php if($user->user_type_id == 3) {?>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <fieldset class="formfieldset col-sm-8">
              <legend class="fieldsetLegend"><?=$this->lang->line('lbl_userretailer_userinfo');?></legend>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usershopid');?></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shop_id" name="shop_id" value="<?=$user->shop ? $user->shop->id : ''?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"><?=$this->lang->line('lbl_usershopname');?></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_en" name="shopname_en" value="<?=$user->shop ? $user->shop->name_en : ''?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_sc" name="shopname_sc" value="<?=$user->shop ? $user->shop->name_sc : ''?>"disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shopname_tc" name="shopname_tc" value="<?=$user->shop ? $user->shop->name_tc : ''?>"disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                      <?php if($user->shop) {?>
                      <button type="button" class="btn btn-info btn-block" onclick="location.href='<?=base_url('admin/shop/view/'.$user->shop->id) ?>';"><?=$this->lang->line('button_gotoshop');?></button>
                    <?php } ?>
                    </div>
                </div>
              </fieldset>
            </div>
            <?php } ?>
          <?php if($user->user_type_id == 4) {?>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <fieldset class="formfieldset col-sm-10">
              <legend class="fieldsetLegend"><?=$this->lang->line('lbl_userconsumer_userinfo');?></legend>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-12">
                      <table class="table table-condensed">
                        <tr>
                          <th><?=$this->lang->line('tbl_col_userorderid');?></th>
                          <th><?=$this->lang->line('tbl_col_userproducttitle');?></th>
                          <th><?=$this->lang->line('tbl_col_userproductid');?></th>
                          <th><?=$this->lang->line('tbl_col_usershoptitle');?></th>
                          <th><?=$this->lang->line('tbl_col_userstatus');?></th>
                          <th><?=$this->lang->line('tbl_col_userprice');?></th>
                        </tr>
                        <?php 
                        if($user->order) { 
                          foreach($user->order as $order) {
                            foreach($order->product_list as $prod) { ?>
                              <tr>
                                <td><?=$order->order_id?></td>
                                <td><?=$prod->product_name?></td>
                                <td><?=$prod->product_id?></td>
                                <td><?=$prod->shop_name?></td>
                                <td><?=$prod->order_item_status?></td>
                                <td><?=$prod->total_price?></td>
                                <?php } ?>
                              </tr>
                      <?php } }?>
                      </table>
                    </div>
                </div>
            </fieldset>
          </div>
          <?php } ?> 
          <!-- /.modal -->    
                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete User</h4>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this user?
                        
                      </div><!-- /.modal-body -->
                        <div class="modal-footer">
                          <div class="btn-toolbar pull-right">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?=$this->lang->line('button_cancel');?></button>
                          <button type="button" class="btn btn-primary"><?=$this->lang->line('button_yes');?></button>
                        </div>
                        </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- box-body -->
      </form>
    </div> <!-- box-info -->
  </section><!-- /.content -->

  