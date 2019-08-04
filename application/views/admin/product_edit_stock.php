<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">
	<div class="form-group input_fields_wrap">
        <h4><?=$this->lang->line('lbl_productstockinfo')?></h4>
        <hr class="col-sm-10">
        <div class="row">
          <label class="col-sm-2"><?=$this->lang->line('lbl_productsize')?></label>
          <label class="col-sm-2"><?=$this->lang->line('lbl_productcolor')?></label>
          <label class="col-sm-2"><?=$this->lang->line('lbl_productother')?></label>
          <label class="col-sm-2"><?=$this->lang->line('lbl_productstock')?></label>
          <button type="button" class="btn btn-primary addButton col-sm-2"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
        </div>
        <?php $count = 1; foreach($product->attributes as $attrib) { ?>
        <div class="row stockattrib">
           <input type="hidden" id="row_id" name="row_id[]" value="<?=$attrib->id?>">
           <div class="col-sm-2"> 
	            <?php if($attrib->size){ ?>
	             <select class="form-control" id="size" name="size[]">
	               <?php foreach($sizes as $size) {?>
	               <option id="size" name="size[]" value="<?=$size->id?>" <?php if ($attrib->size->id == $size->id) echo 'selected';?>><?=$size->name?></option>
	               <?php } ?> 
	             </select>
	             <?php } else {?>
	             <select class="form-control" id="size" name="size[]">
	               <?php foreach($sizes as $size) {?>
	               <option id="size" name="size[]" value="<?=$size->id?>"><?=$size->name?></option>
	               <?php } ?>
	             </select>
	           	<?php } ?>
           </div>
           <div class="col-sm-2">
              <select class="form-control" id="color" name="color[]">
              <?php if($attrib->color) {?>
                <?php foreach($colors as $color) {?>
                <option id="color" name="color[]" value="<?=$color->id?>" <?php if ($attrib->color->id == $color->id) echo 'selected';?>><?=$color->name?></option>
                <?php } } else { foreach($colors as $color) {?>
                  <option id="color" name="color[]" value="<?=$color->id?>"><?=$color->name?></option>
                 <?php } } ?>
              </select>
           </div>
            <div class="col-sm-2">
             	<input type="text" class="form-control" id="other" name="other[]" value="<?=$attrib->other?>">
            </div>
            <div class="col-sm-2">
               <input type="text" class="form-control" id="stock" name="stock[]" value="<?=$attrib->stock?>" required>
               <input type="hidden" id="orig_stock" name="orig_stock[]" value="<?=$attrib->stock?>">
            </div>
            <div class="col-sm-4">
              <div class="btn-toolbar">
                <?php if($count++ > 1) {?>
                  <button type="button" class="btn btn-danger removeButton" value="<?=$attrib->id?>"><i class="fa fa-trash"></i></button>
                <?php } ?>
              </div>
            </div>
        </div>
    	<?php } ?>
   </div>
  </div>
</div>