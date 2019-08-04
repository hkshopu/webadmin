<section class="content"><!-- Main content -->
  <div class="box box-primary"> <!-- Horizontal Form -->
    <form class="form-horizontal" id="productForm" method="POST" action="<?php echo base_url().'admin/product/save' ?>"><!-- form start -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_productedit')?></h3>
        <?php $this->view('admin/alert_message');?>
        <div class="btn-toolbar pull-right">
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
                  echo '<button type="submit" class="btn btn-default" id="'.$btn_id.'" name="'.$btn_id.'" value="'.$btn_id.'"><i class="'.$btn_icon.'"></i>'.$lbl.'</button>';
              ?>
              
            </div>
      </div><!-- /.box-header -->
      <?php 
        if($product->image)
        {
          foreach($product->image as $img)
            {
              $imgUrls[] = $img->url;
            }  
        } else {
          $imgUrls = false;
        }


      ?>
      <div class="box-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active tab" id="details_li"><a href="#details" data-toggle="tab">Details</a></li>
              <li class="tab" id="stock_li"><a href="#stock" data-toggle="tab">Stock</a></li>
              <li><a href="#image" data-toggle="tab">Image</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="details">
                <div class="row">
                <div class="col-sm-2">
                    <img src="<?php if($imgUrls[0]) echo $imgUrls[0]; ?>" alt="..." class="margin" id="productimage" style="height:150px;width:150px;">        
                </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary pull-right" id="saveButton" name="saveProduct" value="saveProduct"> <?=$this->lang->line('button_save')?></button>
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
                          if(!$product->category) 
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
                      <input type="number" min="1" step="any" class="form-control" id="originalprice" name="originalprice" onkeypress="return event.charCode <= 57" value="<?=$product->price_original?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdiscountprice')?></label>
                    <div class="col-sm-4">
                      <input type="number" min="0" step="any" class="form-control" id="discountprice" name="discountprice" onkeypress="return event.charCode <= 57" value="<?=$product->price_discounted?>">
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
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="free" <?php if($product->shipping_price == 0) echo 'checked'; ?>>
                      <label>Free Shipment</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="each" <?php if($product->shipping_price != 0) echo 'checked'; ?>>
                      <label>Each</label>
                    </div>
                    <div class="col-sm-2">
                       <input type="number" min="1" step="any" class="form-control" name="shipmentprice" id="shipmentprice" value="<?php if($product->shipping_price != 0) echo $product->shipping_price; ?>">
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="stock">
                <div class="row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                  <div class="form-group input_fields_wrap">
                    <button type="submit" class="btn btn-primary pull-right" id="saveStock" name="saveStock" value="saveStock"> <?=$this->lang->line('button_save')?></button>
                        <h4><?=$this->lang->line('lbl_productstockinfo')?></h4>
                        <hr class="col-sm-10">
                        <div class="row">
                          <label class="col-sm-2"><?=$this->lang->line('lbl_productsize')?></label>
                          <label class="col-sm-2"><?=$this->lang->line('lbl_productcolor')?></label>
                          <label class="col-sm-2"><?=$this->lang->line('lbl_productother')?></label>
                          <label class="col-sm-2"><?=$this->lang->line('lbl_productstock')?></label>
                          <button type="button" class="btn btn-primary addButton col-sm-2"><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>
                        </div>
                        <input type="hidden" id="toremove" name="toremove">
                        <?php $count = 1; foreach($product->attributes as $attrib) { ?>
                        <div class="row stockattrib">
                           <input type="hidden" id="row_id" name="row_id[]" value="<?=$attrib->id?>" required>
                           <div class="col-sm-2"> 
                              <?php if($attrib->size){ ?>
                               <select class="form-control" id="size" name="size[]" required>
                                 <?php foreach($sizes as $size) {?>
                                 <option id="size" name="size[]" value="<?=$size->id?>" <?php if ($attrib->size->id == $size->id) echo 'selected';?>><?=$size->name?></option>
                                 <?php } ?> 
                               </select>
                               <?php } else {?>
                               <select class="form-control" id="size" name="size[]" required>
                                 <?php foreach($sizes as $size) {?>
                                 <option id="size" name="size[]" value="<?=$size->id?>"><?=$size->name?></option>
                                 <?php } ?>
                               </select>
                              <?php } ?>
                           </div>
                           <div class="col-sm-2">
                              <select class="form-control" id="color" name="color[]" required>
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="image">
                <div class="form-group">
                  <div class="col-sm-12">
                    <h4><?=$this->lang->line('lbl_productimage')?>(<span id="imageCount"><?php if($imgUrls) {echo count($imgUrls);}?></span>/10)</h4>
                  </div>
              </div>
              <div class="form-group">
                  <div class="dropzone col-sm-12" id="mydropzone">
                  </div>
              </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </form>
    <script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){
//Dropzone.autoDiscover = false;
  var id = $('#product_id').val();
  var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;
  var imageCount = thumbnailUrls.length;

  $("#mydropzone").dropzone({
   paramName: "image",
   maxFiles: 10,
   addRemoveLinks: true,
   autoProcessQueue: true,
   createImageThumbnails: true,
   url: '../upload/'+id,
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
      success: function(file, response){
                imageCount++;
                $("#imageCount").text(imageCount);
            },
   removedfile: function(file) {

    var url = file.url;

      $.ajax({
        type: 'POST',
        url: '../deleteImage/',
        dataType: "json",
        data: {id: id, img_url: url,request: 2},
        sucess: function(data){
          console.log('success: ' + data);
          alert(data);
        }
      });

      imageCount--;
      $("#imageCount").text(imageCount);

      var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
   },
   maxfilesexceeded: function(file) {
    this.removeAllfiles();
    this.addFile(file);
   } 
});

/*$('#saveButton').click(function(){
     dp.processQueue();
});*/
});
</script>
  </div>
</section><!-- /.content -->

  