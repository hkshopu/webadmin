<section class="content"><!-- Main content -->
  <div class="box box-primary"> <!-- Horizontal Form -->
    <form class="form-horizontal" id="productForm"><!-- form start -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_productinfo')?></h3>
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
                    }  

                    echo '<img src="'.$imgUrls[0].'" alt="..." class="margin" style="height:100px;width:150px;">';   
                  } else {
                    $imgUrls = false;
                  }
                ?>
              </div>
            <div class="col-sm-10">
              <h2><?=$product->name_en?></h2> (<?=$product->id?>)
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productname')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_en" name="productname_en" value="<?=$product->name_en?>" disabled>
                    </div>
                    <label class="col-sm-2">(English)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_tc" name="productname_tc" value="<?=urldecode($product->name_tc)?>" disabled>
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="productname_sc" name="productname_sc" value="<?=urldecode($product->name_sc)?>" disabled>
                    </div>
                    <label class="col-sm-4">(Simplified Chinese)</label>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productcategory')?></label>
                    <div class="col-sm-4">
                      <select class="form-control" id="productcategory" name="productcategory" disabled>
                        <option value="<?php if($product->category) echo $product->category->id; else echo'';?>"><?=$product->category ? $product->category->name : ''; ?></option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productstatus')?></label>
                    <div class="col-sm-4">
                      <select class="form-control" id="status" name="status" disabled>
                        <option><?=$product->status?></option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productoriginalprice')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="origprice" name="origprice" value="<?=$product->price_original?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdiscountprice')?></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="discountprice" name="discountprice" value="<?=$product->price_discounted?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_productdescription')?></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_en" name="description_en" value="<?=$product->description_en?>" disabled><?=$product->description_en?></textarea>
                    </div>
                    <label class="col-sm-4">(English)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_tc" name="description_tc" value="<?=urldecode($product->description_tc)?>" disabled><?=urldecode($product->description_tc)?></textarea>
                    </div>
                    <label class="col-sm-4">(Traditional Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="3" id="description_sc" name="description_sc" value="<?=urldecode($product->description_sc)?>" disabled><?=urldecode($product->description_sc)?></textarea>
                    </div>
                    <label class="col-sm-4">(Simplified Chinese)</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Shipment Price</label>
                    <div class="col-sm-2">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" <?php if($product->shipping_price == 0) echo 'checked'; ?> disabled>
                        <label>Free Shipment</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" <?php if($product->shipping_price != 0) echo 'checked'; ?> disabled>
                      <label>Each</label>
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="shipmentprice" id="shipmentprice" value="<?php if($product->shipping_price != 0) echo $product->shipping_price; ?>" disabled>
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
                        <input type="text" class="form-control" id="updateuser" name="updateuser" value="<?=$product->created_by_user->username?>" disabled>
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
                      <!--<button type="button" class="btn btn-primary addButton col-sm-2" disabled><i class="fa fa-plus"></i> <?=$this->lang->line('button_add')?></button>-->
                    </div>
                    <?php $count = 1; foreach($product->attributes as $attrib) { ?>
                    <div class="row">
                      <div class="col-sm-2">
                       <?php if($attrib->size){ ?>
                        <input type="text" class="form-control" id="size" name="size[]" value="<?=$attrib->size->name?>" disabled>
                      <?php } else {echo '<input type="text" class="form-control" id="size" name="size[]" value="" disabled>';}  ?>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="color" name="color[]" value="<?=$attrib->color->name?>" disabled>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="other" name="other[]" value="<?=$attrib->other?>" disabled>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="stock" name="stock[]" value="<?=$attrib->stock?>" disabled>
                      </div>
                      <div class="col-sm-4">
                        <div class="btn-toolbar">
                          <?php if($count++ > 1) {?>
                         <!-- <button type="button" class="btn btn-primary editButton" disabled><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-danger removeButton" disabled><i class="fa fa-trash"></i></button> -->
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <h4><?=$this->lang->line('lbl_productimage')?> (<?php if($imgUrls) {echo count($imgUrls);}?>/10)</h4>
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
                </fieldset>
            </div>
          </div><!--timeline body-->
        </div><!--row-->
      </div><!--boxbody-->
    </div>
  </form>
  <script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){

  var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

  $("#mydropzone").dropzone({
   paramName: "image",
   addRemoveLinks: true,
   autoProcessQueue: true,
   createImageThumbnails: true,
   url: '../upload/',
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

         myDropzone.disable();
      }
});
});
</script>
  </div>
</section><!-- /.content -->

  