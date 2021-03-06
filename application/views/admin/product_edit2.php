  <section class="content"><!-- Main content -->
    <div class="box box-primary"> <!-- Horizontal Form -->
      <form class="form-horizontal" id="productForm" method="POST" action="<?php echo base_url().'admin/product/save' ?>"><!-- form start -->
        <div class="box-header with-border">
          <h3 class="box-title"><?=$this->lang->line('form_title_productedit')?></h3>
          <?php
        if($this->session->flashdata())
        {
          $msg_class = ($this->session->flashdata('message_type') == 'Success') ? 'success' : 'danger';
          $msg_icon = ($this->session->flashdata('message_type') == 'Success') ? 'check' : 'ban';
         
          $html_message = '';
          $html_message .= '<div class="alert alert-'.$msg_class.' alert-dismissible">';
          $html_message .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          $html_message .= '<h4><i class="icon fa fa-'.$msg_icon.'"></i>';
          $html_message .= $this->session->flashdata('message_type');
          $html_message .= '</h4>';
          $html_message .= $this->session->flashdata('message');
          $html_message .= '</div>';
          echo $html_message;
        }                
    ?>


            <div class="btn-toolbar pull-right">
              <button type="submit" class="btn btn-primary" id="saveButton" name="saveProduct" value="saveProduct"> <?=$this->lang->line('button_save')?></button>
              <?php 
                  if($product->status == 'disable')
                  {
                    $btn_id = 'enableButton';
                    $btn_icon = 'fa fa-check';
                    $lbl = $this->lang->line('button_enable');
                  }
                  else if($product->status == 'active')
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


                  echo '<button type="button" class="btn btn-default" id="'.$btn_id.'"><i class="'.$btn_icon.'"></i>'.$lbl.'</button>';
              ?>
              
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="timeline-body">
              <div class="col-sm-2">
                <?php 
                  if($product->image)
                  {
                    foreach($product->image as $img)
                    {
                      $imgUrls[] = $img->url;
                      if($img->type == 'primary')
                        echo '<img src="'.$img->url.'" alt="..." class="margin" style="height:100px;width:150px;">';
                    }


                    
                  } /*else {
                    echo '<img src="http://placehold.it/150x100" alt="..." class="margin">';
                  }*/
                ?>
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
                      <input type="text" class="form-control" id="productname_tc" name="productname_tc" value="<?=$product->name_tc?>" >
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_sc" name="productname_sc" value="<?=$product->name_sc?>">
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
                        <option value="1" <?php if($product->status == 'active') echo " selected";?> >Active</option>
                        <option value="0" <?php if($product->status == 'disable') echo " selected";?> >Disabled</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productoriginalprice')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="originalprice" name="originalprice" value="<?=$product->price_original?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdiscountprice')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="discountprice" name="discountprice" value="<?=$product->price_discounted?>">
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
                      <textarea class="form-control" rows="3" id="description_tc" name="description_tc"><?=$product->description_tc?></textarea>
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_sc" name="description_sc"><?=$product->description_sc?></textarea>
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
                      <input type="text" class="form-control" name="shipmentprice" id="shipmentprice" value="<?php if($product->shipping_price != 0) echo $product->shipping_price; ?>">
                    </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcreateuser')?></label>
                      <div class="date col-sm-3">
                          <input type="text" class="form-control" id="createuser" name="createuser" disabled>
                      </div>
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcreatedate')?></label>
                      <div class="date col-sm-3">
                        <div class="input-group date">
                          <input type="text" class="form-control" id="datepicker1" name="datepicker1" 
                          value="<?=date_format(date_create($product->created_at), "m/d/Y")?>" disabled>
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productupdateuser')?></label>
                      <div class="date col-sm-3">
                          <input type="text" class="form-control" id="updateuser" name="updateuser" disabled>
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
                  </div>
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
                        <input type="text" class="form-control" id="size" name="size[]" value="<?=$attrib->size->name?>">
                      </div>
                      <div class="col-sm-2">
                        <?php if($attrib->color) {?>
                        <select class="form-control" id="color" name="color[]">
                          <option id="color" name="color[]" value="1" <?php if ($attrib->color->id == 1) echo 'selected';?>>White</option>
                          <option id="color" name="color[]" value="2" <?php if ($attrib->color->id == 2) echo 'selected';?>>Gray</option>
                          <option id="color" name="color[]" value="3" <?php if ($attrib->color->id == 3) echo 'selected';?>>Silver</option>
                          <option id="color" name="color[]" value="4" <?php if ($attrib->color->id == 4) echo 'selected';?>>Black</option>
                        </select>
                      <?php } else echo '<select class="form-control" id="color" name="color[]"><option id="color" name="color[]">White</option><option id="color" name="color[]">Gray</option><option id="color" name="color[]">Silver</option><option id="color" name="color[]">Black</option></select>';?>
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
                          <button type="button" class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                   <div class="form-group">
                    <div class="col-sm-12">
                      <h4><?=$this->lang->line('lbl_productimage')?> (8/10)</h4>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="dropzone col-sm-12" id="mydropzone">
                      
                    </div>
                  </div>
                 
                  
              </div><!-- col-sm-10 -->
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <fieldset class="formfieldset col-sm-8">
                  <legend class="fieldsetLegend"><?=$this->lang->line('lbl_productsellrecord')?></legend>
                    <div class="col-sm-12">
                      <table class="table table-condensed">
                        <tr>
                          <th><?=$this->lang->line('lbl_productdate')?></th>
                          <th><?=$this->lang->line('lbl_productorderid')?></th>
                          <th><?=$this->lang->line('lbl_producttitle')?></th>
                          <th><?=$this->lang->line('lbl_productoriginalid')?></th>
                          <th><?=$this->lang->line('lbl_productstatus')?></th>
                          <th><?=$this->lang->line('lbl_productprice')?></th>
                          <th><?=$this->lang->line('lbl_productpcs')?></th>
                        </tr>
                        <tr>
                          <td>ORD000001</td>
                          <td>Samsung J1</td>
                          <td>P00001</td>
                          <td>Samsung</td>
                          <td>Active</td>
                          <td>$35.00</td>
                          <td>$35.00</td>
                        </tr>
                      </table>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){

  var id = $('#product_id').val();
  var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

  $("#mydropzone").dropzone({
   addRemoveLinks: true,
   autoProcessQueue: true,
   createImageThumbnails: true,
   url: '../upload/' + id,
   init: function () {
        var myDropzone = this;
       
        //Populate any existing thumbnails
        if (thumbnailUrls) {
            for (var i = 0; i < thumbnailUrls.length; i++) {
                var mockFile = { 
                   // name: "Jellyfish.jpg", 
                    size: 12345, 
                    type: 'image/jpeg', 
                    status: Dropzone.ADDED, 
                    url:  thumbnailUrls[i],
                    accepted: true
                };

                // Call the default addedfile event handler
                myDropzone.emit("addedfile", mockFile);

                // And optionally show the thumbnail of the file:
                myDropzone.emit("thumbnail", mockFile, thumbnailUrls[i]);

                myDropzone.files.push(mockFile);
                myDropzone.emit("complete", mockFile);
                myDropzone.createThumbnailFromUrl(mockFile, thumbnailUrls[i], function() {
                  myDropzone.emit("complete", mockFile);
                }, "anonymous");
            }
        }
      },
   removedfile: function(file) {
    var name = file.name; 

      $.ajax({
        type: 'POST',
        url: '../upload/' + id,
        data: {name: name,request: 2},
        sucess: function(data){
          console.log('success: ' + data);
        }
      });

      var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
   }
});

/*$('#saveButton').click(function(){
     dp.processQueue();
});*/
});
</script>
    </div>
  </section><!-- /.content -->

  