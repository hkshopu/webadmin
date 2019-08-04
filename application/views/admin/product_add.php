  <section class="content"><!-- Main content -->
    <div class="box box-primary"> <!-- Horizontal Form -->
      <form class="form-horizontal" id="productForm" method="POST" action="<?php echo base_url().'admin/product/save' ?>"><!-- form start -->
        <div class="box-header with-border">
          <h3 class="box-title"><?=$this->lang->line('form_title_productadd')?></h3>
          <?php $this->view('admin/alert_message');?>
            <div class="btn-toolbar pull-right">
              <button type="submit" class="btn btn-primary" id="saveButton" name="addProduct" value="addProduct"> <?=$this->lang->line('button_save')?></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="timeline-body">
              <div class="col-sm-2">
                
              </div>
              <div class="col-sm-10">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" style="display:none;"><?=$this->lang->line('lbl_productsku')?></label>
                    <div class="col-sm-4">
                      <input type="hidden" class="form-control" id="sku" name="sku" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productname')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_en" name="productname_en" required>
                    </div>
                    <label class="col-sm-2">(English)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_tc" name="productname_tc">
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_sc" name="productname_sc">
                    </div>
                    <label class="col-sm-4">(Simplified Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcategory')?></label>
                    <div class="col-sm-4">
                      <select class="form-control" id="productcategory" name="productcategory" required>
                        <?php 
                     
                            foreach($productcategory as $cat) 
                            {
                              echo '<option value="'.$cat->category->id.'">'.$cat->category->name.'</option>';
                            }
                          
                       ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productstatus')?></label>
                    <div class="col-sm-4">
                      <select class="form-control" id="status" name="status" required>
                        <?php foreach($statuses as $status) {?>
                          <option value="<?=$status->id?>"><?=ucfirst($status->name)?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productoriginalprice')?></label>
                    <div class="col-sm-4">
                      <input type="number" min="1" step="any" class="form-control" id="originalprice" name="originalprice" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdiscountprice')?></label>
                    <div class="col-sm-4">
                      <input type="number" min="0" step="any" class="form-control" id="discountprice" name="discountprice">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdescription')?></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_en" name="description_en" required></textarea>
                    </div>
                    <label class="col-sm-4">(English)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_tc" name="description_tc"></textarea>
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_sc" name="description_sc"></textarea>
                    </div>
                    <label class="col-sm-4">(Simplified Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Shipment Price</label>
                    <div class="col-sm-2">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                        <label>Free Shipment</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                      <label>Each</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="number" min="0" step="any" class="form-control" name="shipmentprice" id="shipmentprice">
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

  