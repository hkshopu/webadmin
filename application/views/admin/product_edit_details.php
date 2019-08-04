<div class="row">
<div class="col-sm-2">
  <?php print_r($imgUrls);?>
    <img src="<?=$imgUrls[0]?>" alt="..." class="margin" style="height:150px;width:150px;">        
</div>
<div class="col-sm-10">
  <h2><?=$product->name_en?> (<?=$product->id?>)</h2> 
  <input type="hidden" id="sku" name="sku" value="<?=$product->sku?>">
  <input type="hidden" id="product_id" name="product_id" value="<?=$product->id?>">

  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productname')?></label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="productname_en" name="productname_en" value="<?=$product->name_en?>" required>
    </div>
    <label class="col-sm-2">(English)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="productname_tc" name="productname_tc" value="<?=urldecode($product->name_tc)?>" >
    </div>
    <label class="col-sm-4">(Traditional Chinese)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="productname_sc" name="productname_sc" value="<?=urldecode($product->name_sc)?>">
    </div>
    <label class="col-sm-4">(Simplified Chinese)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcategory')?></label>
    <div class="col-sm-4">
      <select class="form-control" id="productcategory" name="productcategory">
        <?php 
          if($product->category == NULL || $product->category == 0) 
          { 
            echo '<option value=""></option>';
              foreach($productcategory as $cat) 
              {
                echo '<option value="'.$cat->category->id.'">'.$cat->category->name.'</option>';
              }
          } else {         
            foreach($productcategory as $cat) 
              { ?>
                <option value="<?=$cat->category->id?>" 
                  <?php if($product->category->id == $cat->category->id) echo " selected";?>
                        ><?=$cat->category->name?></option>
              <?php } }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productstatus')?></label>
    <div class="col-sm-4">
      <select class="form-control" id="status" name="status">
        <?php foreach($statuses as $status) {?>
          <option value="<?=$status->id?>" <?php if($product->status == $status->name) echo " selected";?> ><?=ucfirst($status->name)?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productoriginalprice')?></label>
    <div class="col-sm-4">
      <input type="number" min="0" step="any" class="form-control" id="originalprice" name="originalprice" value="<?=$product->price_original?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdiscountprice')?></label>
    <div class="col-sm-4">
      <input type="number" min="0" step="any" class="form-control" id="discountprice" name="discountprice" value="<?=$product->price_discounted?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdescription')?></label>
    <div class="col-sm-4">
      <textarea class="form-control" rows="3" id="description_en" name="description_en"><?=$product->description_en?></textarea>
    </div>
    <label class="col-sm-4">(English)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
      <textarea class="form-control" rows="3" id="description_tc" name="description_tc"><?=urldecode($product->description_tc)?></textarea>
    </div>
    <label class="col-sm-4">(Traditional Chinese)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-4">
      <textarea class="form-control" rows="3" id="description_sc" name="description_sc"><?=urldecode($product->description_sc)?></textarea>
    </div>
    <label class="col-sm-4">(Simplified Chinese)</label>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Shipment Price</label>
    <div class="col-sm-2">
      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" <?php if($product->shipping_price == 0) echo 'checked'; ?>>
      <label>Free Shipment</label>
    </div>
    <div class="col-sm-2">
      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" <?php if($product->shipping_price != 0) echo 'checked'; ?>>
      <label>Each</label>
    </div>
    <div class="col-sm-2">
       <input type="number" min="0" step="any" class="form-control" name="shipmentprice" id="shipmentprice" value="<?php if($product->shipping_price != 0) echo $product->shipping_price; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcreateuser')?></label>
    <div class="date col-sm-3">
      <input type="text" class="form-control" id="createuser" name="createuser" value="<?=$product->created_by_user->username?>" disabled>
    </div>
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcreatedate')?></label>
    <div class="date col-sm-3">
      <div class="input-group date">
        <input type="text" class="form-control" id="datepicker1" name="datepicker1" value="<?=date_format(date_create($product->created_at), "m/d/Y")?>" disabled>
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productupdateuser')?></label>
    <div class="date col-sm-3">
      <input type="text" class="form-control" id="updateuser" name="updateuser" value="<?=$product->updated_by_user->username?>" disabled>
    </div>
    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productupdatedate')?></label>
    <div class="date col-sm-3">
      <div class="input-group date">
         <input type="text" class="form-control" id="datepicker3" name="datepicker3" value="<?=date_format(date_create($product->updated_at), "m/d/Y")?>" disabled>
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-8">
      <table class="table">
        <tr>
          <td><i class="fa fa-eye"></i></td>
          <td align="left"><?=$product->views?></i></td>
          <td><i class="fa fa-heart"></i></td>
          <td><?=$product->views?></i></td>
          <td><i class="fa fa-money"></i></td>
          <td><?=$product->views?></i></td>
          <td><i class="fa fa-clock-o"></i></td>
          <td><?=$product->views?></i></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div> <!-- form group -->
</div><!-- col sm 10 -->
</div>