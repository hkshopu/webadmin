<script type="text/javascript">
$(".dz-hidden-input").prop("disabled",true);
</script>
<section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->lang->line('form_title_shopinfo')?></h3> 
      </div>
      <form class="form-horizontal" method="POST" action="<?php echo base_url().'admin/shop/save' ?>"><!-- form start -->
        <div class="box-body">      
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom"><!-- Custom Tabs -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab"><?=$this->lang->line('tab_title_shopinfo')?></a></li>
                  <li><a href="#product" data-toggle="tab"><?=$this->lang->line('tab_title_shopproduct')?></a></li>
                  <li><a href="#order" data-toggle="tab"><?=$this->lang->line('tab_title_shoporder')?></a></li>
                  <!--<li><a href="#comment" data-toggle="tab"><?=$this->lang->line('tab_title_shopcomment')?></a></li>-->
                  <li><a href="#blog" data-toggle="tab"><?=$this->lang->line('tab_title_shopblog')?></a></li>
                  <li><a href="#ad" data-toggle="tab"><?=$this->lang->line('tab_title_shopad')?></a></li>
                  <li><a href="#payment" data-toggle="tab"><?=$this->lang->line('tab_title_shoppaymentmethod')?></a></li>
                  <li><a href="#shipment" data-toggle="tab"><?=$this->lang->line('tab_title_shopshipment')?></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="info">
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title"><?=$shop->name_en?></h3>(<?=$shop->id?>) (<?=ucfirst($shop->status)?>)(<?=$shop->created_at?>)
                        <!--<div class="btn-toolbar pull-right">
                          <button type="submit" class="btn btn-primary" id="saveButton" value="saveShop"><i class="fa fa-save"></i> Save</button>
                          <button type="button" class="btn btn-danger" id="disableButton"><i class="fa fa-ban"></i> Disable</button>
                        </div>-->
                      </div>
                      <div class="box-body">
                        <input type="hidden" id="shop_id" name="shop_id" value="<?=$shop->id?>">
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_en')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_en" name="shopname_en" value = "<?=$shop->name_en?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_tc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_tc" value="<?=$shop->name_tc?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopname_sc')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="shopname_tc" name="shopname_sc" value="<?=$shop->name_sc?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopcategory')?></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="shopcategory" name="shopcategory" disabled>
                                <option><?=$shop->category->name?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopowner')?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="owner" name="owner" value="<?=$shop->owner ? $shop->owner->first_name.' '.$shop->owner->last_name : ''?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_en')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_en" name="description_en" disabled><?=$shop->description_en?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_tc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_tc" name="description_tc" disabled><?=$shop->description_tc?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_shopdescription_sc')?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="description_sc" name="description_sc" disabled><?=$shop->description_sc?></textarea>
                          </div>
                        </div>
                        <hr class="col-sm-12"> 
                        <h4>Shop Profile Image</h4>
                        <div class="form-group">
                          <div class="form-group">
                            <div class="dropzone col-sm-12" id="mydropzone" disabled>
                            </div>
                          </div>
                        </div>
                        <hr class="col-sm-12"> 
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
                  } 
                ?>
                  <div class="tab-pane" id="product">
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
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="order">
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
                  <div class="tab-pane" id="comment">
                    <?php $this->view('admin/comments_list');?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="blog">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_blog')?></h3> 
                      <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/blog/view') ?>';">Add</button>
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
                  <div class="tab-pane" id="ad">
                    <div class="form-group">
                      <h3 class="box-title"><?=$this->lang->line('tbl_name_ad')?></h3> 
                      <button type="button" class="btn btn-primary pull-right" onclick="location.href='<?=base_url('admin/adorder/add') ?>';">Add</button>
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
                              <input type="text" class="form-control" id="accountinfo_<?=$method->code?>" name="accountinfo_<?=$method->code?>" value="<?php if($pmethod && array_key_exists($method->code, $pmethod)) echo $pmethod[$method->code]['accountinfo']; else echo '';?>" disabled>
                              <!--<p style="color:red;"><?=$method->name?> sample: xxx-xx-xxxx-xxx</p>-->
                            </div>
                        </div>
                        <?php if($method->code != 'paypal') {?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_remarks')?></label>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="3" id="remarks_<?=$method->code?>" name="remarks_<?=$method->code?>" disabled><?php if($pmethod && array_key_exists($method->code, $pmethod)) echo $pmethod[$method->code]['remarks']; else echo '';?></textarea>

                            </div>
                        </div>
                        <?php } }?>
                        
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="shipment">
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
                    </div><!--form group-->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom --> 
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.box-body -->
      </form><!-- /.form -->
    </div> <!-- /.box-info -->   
    <script type="text/javascript">
      Dropzone.autoDiscover = false;
      $(document).ready(function(){

        var thumbnailUrls = <?php echo json_encode($imgUrls); ?>;

        $("#mydropzone").dropzone({
         autoProcessQueue: false,
         createImageThumbnails: true,
         url: '../upload/',
         clickable: false,
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
                  // Add optionally show the thumbnail of the file:
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
</section><!-- /.content -->
 