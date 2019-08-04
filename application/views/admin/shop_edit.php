
<section class="content"><!-- Main content -->
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url().'admin/shop/save' ?>"><!-- form start -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_shopedit')?></h3> 
        
        <div class="btn-toolbar pull-right">
                <?php 
                  if($shop->status == 'disable')
                  {
                    $btn_id = 'enableButton';
                    $btn_icon = 'fa fa-check';
                    $lbl = $this->lang->line('button_enable');
                  }
                  else if($shop->status == 'active')
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
      </div>
      <?php $this->view('admin/alert_message');?>
        <div class="box-body">      
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom"><!-- Custom Tabs -->
                <ul class="nav nav-tabs">
                  <li class="active tab" id="info_li"><a href="#info" data-toggle="tab""><?=$this->lang->line('tab_title_shopinfo')?></a></li>
                  <?php if($this->session->userdata('level_id') == 1) {?>
                    <!--<li class="tab" id="product_li"><a href="#product" data-toggle="tab"><?=$this->lang->line('tab_title_shopproduct')?></a></li>-->
                   <!-- <li class="tab" id="order_li"><a href="#order" data-toggle="tab""><?=$this->lang->line('tab_title_shoporder')?></a></li>
                  <?php } ?>
                    <!--<li><a href="#comment" data-toggle="tab"><?=$this->lang->line('tab_title_shopcomment')?></a></li>-->
                  <?php if($this->session->userdata('level_id') == 1) {?>
                    <!--<li class="tab" id="blog_li"><a href="#blog" data-toggle="tab""><?=$this->lang->line('tab_title_shopblog')?></a></li>-->
                    <!--<li class="tab" id="ad_li"><a href="#ad" data-toggle="tab""><?=$this->lang->line('tab_title_shopad')?></a></li>-->
                  <?php } ?>
                  <li class="tab" id="payment_li"><a href="#payment" data-toggle="tab""><?=$this->lang->line('tab_title_shoppaymentmethod')?></a></li>
                  <li class="tab" id="shipment_li"><a href="#shipment" data-toggle="tab"><?=$this->lang->line('tab_title_shopshipment')?></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="info">
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><?=$shop->name_en?></h3>(<?=$shop->id?>) (<?=ucfirst($shop->status)?>)(<?=$shop->created_at?>)
                        <button type="submit" class="btn btn-primary pull-right" id="saveShop" name="saveShop" value="saveShop"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?></button>
                      </div>
                      <div class="box-body">
                        <input type="hidden" id="shop_id" name="shop_id" value="<?=$shop->id?>">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_en')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_en" name="shopname_en" value = "<?=$shop->name_en?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_tc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_tc" value="<?=$shop->name_tc?>">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_sc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_sc" value="<?=$shop->name_sc?>">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopcategory')?></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="shopcategory" name="shopcategory">
                              <?php 
            
                          if(!$shop->category) 
                          { 
                            echo '<option value=""></option>';
                            foreach($shopcategory as $cat) 
                            {
                              echo '<option value="'.$cat->id.'">'.$cat->name.'</option>';
                            }
                          } else {

                             foreach($shopcategory as $cat) 
                             { ?>

                            <option value="<?=$cat->id?>" 
                          <?php if($shop->category->id == $cat->id) echo " selected";?>
                          ><?=$cat->name?></option>
                          <?php } }?>
                          </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopowner')?></label>
                            <div class="col-sm-10">
                            	<?php 
                            	if($shop->owner)
                            	{
                            		$fname = $shop->owner->first_name ? $shop->owner->first_name : ''; 
                            		$lname = $shop->owner->last_name ? $shop->owner->last_name : '';
                            	} else {
                            		$fname = '';
                            		$lname = '';
                            	}
                            	
                            	?>
                              <input type="text" class="form-control" id="owner" name="owner" value="<?=$fname.' '.$lname?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_en')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_en" name="description_en"><?=$shop->description_en?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_tc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_tc" name="description_tc"><?=$shop->description_tc?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_sc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_sc" name="description_sc"><?=$shop->description_sc?></textarea>
                          </div>
                        </div>
                        <hr class="col-sm-10">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <h5><?=$this->lang->line('lbl_shopprofileimage')?></h5>
                           
                              <div class="form-group">
                                <div class="dropzone col-sm-12" id="mydropzone">
                                  
                                </div>
                              </div>

                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <table>
                              <tr>
                                <td><h5><?=$this->lang->line('lbl_shopranking')?></h5></td>
                                <td><i class="fa fa-star"></i></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><?=$shop->rating->count?></td>
                              </tr>
                            </table>
                          </div>
                          <div class="col-sm-3">
                            <table>
                              <tr>
                                <td><h5><?=$this->lang->line('lbl_shopfollow')?></h5></td>
                                <td><i class="fa fa-heart"></i></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><?=$shop->followers?></td>
                              </tr>
                            </table>
                          </div>
                          <div class="col-sm-3">
                            <table>
                              <tr>
                                <td><h5><?=$this->lang->line('lbl_shoporder')?></h5></td>
                                <td><i class="fa fa-money"></i></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><?=$shop->orders?></td>
                              </tr>
                            </table>
                          </div>
                          <div class="col-sm-3">
                            <table>
                              <tr>
                                <td><h5><?=$this->lang->line('lbl_shopcomment')?></h5></td>
                                <td><i class="fa fa-comments-o"></i></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><?=$shop->comments?></td>
                              </tr>
                            </table>
                          </div>
                        </div><!-- fprm group -->
                      </div><!-- box-body -->
                    </div><!-- box-default -->
                  </div><!-- /.tab-pane -->
                  <?php 
                  if($shop->image)
                  {
                    foreach($shop->image as $img)
                    {
                      $imgUrls[] = $img->url;
                    }
                  } else {
                    $imgUrls = false;
                  }
                ?>
                  <!--<div class="tab-pane" id="product">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_productlist')?></h3> 
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <table id="products datatable-buttons" class="products table table-condensed">
                          <thead>
                            <tr>
                              <th><?=$this->lang->line('tbl_col_productid')?></th>
                              <th><?=$this->lang->line('tbl_col_producttitle')?></th>
                              <th><?=$this->lang->line('tbl_col_productoriginalprice')?></th>
                              <th><?=$this->lang->line('tbl_col_productdiscountprice')?></th>
                              <th><?=$this->lang->line('tbl_col_productsell')?></th>
                              <th><?=$this->lang->line('tbl_col_productstock')?></th>
                              <th><?=$this->lang->line('tbl_col_productstatus')?></th>
                            </tr>
                          </thead>
                          <tbody id="products_table">
                          </tbody>
                        </table>
                      </div>
                    </div><!--form group-->
                  <!--</div><!-- /.tab-pane -->
                  <!--<div class="tab-pane" id="order">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_orderlist')?></h3> 
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <table id="orders datatable-buttons" class="orders table table-condensed">
                          <thead>
                            <tr>
                              <th><?=$this->lang->line('tbl_col_orderdate')?></th>
                              <th><?=$this->lang->line('tbl_col_updatedate')?></th>
                              <th><?=$this->lang->line('lbl_productorderid')?></th>
                              <th><?=$this->lang->line('tbl_col_buyer')?></th>
                              <th><?=$this->lang->line('tbl_col_orderstatus')?></th>
                              <th><?=$this->lang->line('tbl_col_paymentstatus')?></th>
                              <th><?=$this->lang->line('lbl_productprice')?></th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <!--<div class="tab-pane" id="comment">
                    <?php $this->view('admin/comments_list');?>
                  </div><!-- /.tab-pane -->
                  <!--<div class="tab-pane" id="blog">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_blog')?></h3> 
                      <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/blog/view') ?>';"><?=$this->lang->line('button_add')?></button>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <table class="table table-condensed">
                          <tr>
                            <th><?=$this->lang->line('tbl_col_date')?></th>
                            <th><?=$this->lang->line('tbl_col_title')?></th>
                            <th><?=$this->lang->line('tbl_col_blogcategory')?></th>
                            <th><?=$this->lang->line('tbl_col_view')?></th>
                            <th><?=$this->lang->line('tbl_col_like')?></th>
                            <th><?=$this->lang->line('tbl_col_comment')?></th>
                            <th><?=$this->lang->line('tbl_col_operate')?></th>
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
                    </div>
                  </div><!-- /.tab-pane -->
                 <!-- <div class="tab-pane" id="ad">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_ad')?></h3> 
                      <div class="btn-toolbar pull-right"><button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('admin/adorder/add') ?>';"><?=$this->lang->line('button_add')?></button> </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <table class="table table-condensed">
                          <tr>
                            <th><?=$this->lang->line('tbl_col_date')?></th>
                            <th><?=$this->lang->line('tbl_col_title')?></th>
                            <th><?=$this->lang->line('tbl_col_requestedamount')?></th>
                            <th><?=$this->lang->line('tbl_col_amountused')?></th>
                            <th><?=$this->lang->line('tbl_col_view')?></th>
                            <th><?=$this->lang->line('tbl_col_operate')?></th>
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
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="payment">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right" id="savPaymentMethod" name="savPaymentMethod" value="savPaymentMethod"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?></button>
                        <?php foreach($paymentmethods as $method) {?>
                          <div class="col-sm-4">
                           <div class="checkbox">
                            <h4>
                              <?=$method->name?>
                            </h4>
                          </div>
                        </div>
                        <hr class="col-sm-10">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_accountinfo')?></label>
                            <div class="col-sm-8">
                              <input type="hidden" name="hasPaymentMethod_<?=$method->code?>" id="hasPaymentMethod" value="<?=array_key_exists($method->code, $pmethod) ? 1 : 0 ?>">
                              <input type="hidden" name="<?=$method->code?>_<?=$method->id?>" id="<?=$method->code?>_<?=$method->id?>" value="<?=$method->id?>">
                              
                              <input type="text" class="form-control" id="accountinfo_<?=$method->code?>" name="accountinfo_<?=$method->code?>" value="<?php if($pmethod && array_key_exists($method->code, $pmethod)) echo $pmethod[$method->code]['accountinfo']; else echo '';?>">
                              <!--<p style="color:red;"><?=$method->name?> sample: xxx-xx-xxxx-xxx</p>-->
                            </div>
                        </div>
                        <?php if($method->code != 'paypal') {?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_remarks')?></label>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="3" id="remarks_<?=$method->code?>" name="remarks_<?=$method->code?>"><?php if($pmethod && array_key_exists($method->code, $pmethod)) echo $pmethod[$method->code]['remarks']; else echo '';?></textarea>

                            </div>
                        </div>
                        <?php } }?>
                        
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="shipment">
                    <div class="form-group">
                      <div class="col-sm-4"><h3 class="box-title"><?=$this->lang->line('tbl_name_shipment')?></h3></div>
                       <button type="submit" class="btn btn-primary pull-right" id="saveShipment" name="saveShipment" value="saveShipment"><i class="fa fa-save"></i> <?=$this->lang->line('button_save')?></button>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <?php foreach($shipments as $shipment) {?>
                          <div class="radio">
                             <label class="col-sm-1 control-label"></label>
                            <label>
                              <input type="radio" name="shipment" id="<?=$shipment->name?>" value="<?=$shipment->id?>" <?php if($shop->shipment && $shop->shipment->id == $shipment->id) echo 'checked';?>>
                              <?=$shipment->label?>
                            </label>
                          </div>
                        <?php } ?>
                        <div class="form-group">
                          <label class="col-sm-1 control-label"></label>
                            <div class="col-sm-4">
                              <input type="number" min="1" step="any" class="form-control" id="shipment_fee" name="shipment_fee" value="<?=$shop->shipment?$shop->shipment->amount:'';?>">
                            </div>
                        </div>
                        </div>
                      </div>
                    </div><!--form group-->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom --> 
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.box-body -->
      
    </div> <!-- /.box-info -->   
    </form><!-- /.form -->
    <script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function(){
//Dropzone.autoDiscover = false;
  var id = $('#shop_id').val();
  var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

  $("#mydropzone").dropzone({
   paramName: "image",
   maxFiles: 1,
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
   removedfile: function(file) {
    
    var url = file.url;

      $.ajax({
        type: 'POST',
        url: '../deleteImage/',
        data: {id: id, img_url: url,request: 2},
        sucess: function(data){
          console.log('success: ' + data);
        }
      });

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
  </section><!-- /.content -->
 