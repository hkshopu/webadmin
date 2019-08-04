<section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_shopadd')?></h3> 
        <?php $this->view('admin/alert_message');?>
      </div>
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url().'admin/shop/save' ?>"><!-- form start -->
        <div class="box-body">      
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom"><!-- Custom Tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab"><?=$this->lang->line('tab_title_shopinfo')?></a></li>
                  <!--<li><a href="#comment" data-toggle="tab"><?=$this->lang->line('tab_title_shopcomment')?></a></li>
                  <li><a href="#payment" data-toggle="tab"><?=$this->lang->line('tab_title_shoppaymentmethod')?></a></li>
                  <li><a href="#shipment" data-toggle="tab"><?=$this->lang->line('tab_title_shopshipment')?></a></li> -->
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane active" id="info">
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <div class="btn-toolbar pull-right">
                          <button type="submit" class="btn btn-primary" id="addShop" name="addShop" value="addShop"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?></button>
                          <!--<button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> <?=$this->lang->line('button_disable')?></button>-->
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_en')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_en" name="shopname_en" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_tc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_tc">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_sc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_sc">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopcategory')?></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="shopcategory" name="shopcategory" required>
                              <?php 

                            foreach($shopcategory as $cat) 
                            {
                              echo '<option value="'.$cat->id.'">'.$cat->name.'</option>';
                            }
                           ?>
                          </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shop_registerdate')?></label>
                            <div class="date col-sm-8">
                              <div class="input-group date">
                                <input type="text" class="form-control" id="datepicker1" name="datepicker1">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopstatus')?></label>
                          <div class="col-sm-4">
                            <select class="form-control" id="status" name="status" required>
                              <option value="1">Active</option>
                              <option value="0">Disabled</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_en')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_en" name="description_en" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_tc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_tc" name="description_tc"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_sc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_sc" name="description_sc"></textarea>
                          </div>
                        </div>
                      </div><!-- box-body -->
                    </div><!-- box-default -->
                  </div><!-- /.tab-pane -->
                  
                 <!-- 
                  <div class="tab-pane" id="comment">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_comment')?></h3> 
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <table id="datatable-buttons" class="comments table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th><?=$this->lang->line('tbl_col_user')?></th>
                              <th><?=$this->lang->line('tbl_col_comment')?></th>
                              <th><?=$this->lang->line('tbl_col_datetime')?></th>
                              <th><?=$this->lang->line('tbl_col_operate')?></th>
                            </tr>
                          </thead>
                          <tbody id="comments_table">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> --> <!-- /.tab-pane -->
                  <!--<div class="tab-pane" id="payment">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <?php foreach($paymentmethods as $method) {?>
                          <div class="col-sm-4">
                           <div class="checkbox">
                            <label>
                              <input type="checkbox" name="ischecked_<?=$method->code?>" id="ischecked_<?=$method->code?>">
                              <?=$method->name?>
                            </label>
                          </div>
                        </div>
                        <hr class="col-sm-10">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_accountinfo')?></label>
                            <div class="col-sm-8">
                              <input type="hidden" name="<?=$method->code?>_<?=$method->id?>" id="<?=$method->code?>_<?=$method->id?>" value="<?=$method->id?>">
                              <?=$method->name?>
                              <input type="text" class="form-control" id="accountinfo_<?=$method->code?>" name="accountinfo_<?=$method->code?>" >
                              <p style="color:red;"><?=$method->name?> sample: xxx-xx-xxxx-xxx</p>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_remarks')?></label>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="3" id="remarks_<?=$method->code?>" name="remarks_<?=$method->code?>"></textarea>

                            </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>--> <!-- /.tab-pane -->
                  <!--<div class="tab-pane" id="shipment">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_shipment')?></h3> 
                    </div>
                    <hr class="col-sm-12"> 
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              Normal
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                              All order fee shipment
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                              Fee shipment, If Order total price over:  <input type="text" class="form-control" id="feeshipment" name="feeshipment" disabled>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>--><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom --> 
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.box-body -->
      </form><!-- /.form -->
    </div> <!-- /.box-info -->   
  </section><!-- /.content -->
 