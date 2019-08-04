  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3> 
        <?php $this->view('admin/alert_message');?>
        <!--<button type="button" class="btn btn-primary pull-right" disabled><i class="fa fa-print"></i></button> -->
      </div><!-- /.box-header -->
      <form class="form-horizontal" id="orderForm" method="POST" action="<?php echo base_url().'admin/order/save' ?>"><!-- form start -->
        <div class="box-body">
          <div class="box-header with-border">
            <h3 class="box-title"><?=$order->id ?></h3> (User: <?=$order->user->username?>) (Shop: <?=$order->shop->name_en?>)(Status: <?=ucfirst($order->order_status)?>) (Payment Status: <?=ucfirst($order->payment_status)?>)
          </div>
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_user')?></label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" id="orderid" name="orderid" value="<?=$order->id?>">
                  <input type="text" class="form-control" id="user" name="user" value="<?=$order->user->username?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_shop')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="shop" name="shop" value="<?=$order->shop->name_en?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_status')?></label>
                <div class="col-sm-8">
                  <!--<input type="text" class="form-control" id="orderstatus" name="orderstatus" value="<?=$order->order_status?>"> -->
                  <select class="form-control" id="orderstatus" name="orderstatus">
                    <?php foreach($orderstatus as $ostatus) {?>
                      <option value="<?=$ostatus->id?>" <?php if($order->order_status == $ostatus->name) echo " selected";?> ><?=ucfirst($ostatus->name)?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary pull-right" name="orderOnHold" value="orderOnHold" <?php if($order->order_status == 'on hold') echo 'disabled';?>><?=$this->lang->line('button_onhold')?></button>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_paymentstatus')?></label>
                <div class="col-sm-10">
                  <!--<input type="text" class="form-control" id="paymentstatus" name="paymentstatus" value="<?=ucfirst($order->payment_status)?>"> -->
                  <select class="form-control" id="paymentstatus" name="paymentstatus">
                    <?php foreach($paymentstatus as $pstatus) {?>
                      <option value="<?=$pstatus->id?>" <?php if($order->payment_status == $pstatus->name) echo " selected";?> ><?=ucfirst($pstatus->name)?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_totalprice')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="totalprice" name="totalprice" value="<?=$order->shop_order_total?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_time')?></label>
                <div class="date col-sm-3">
                  <input type="text" class="form-control" id="ordertime" name="ordertime" value="<?=date_format(date_create($order->order_date), "m/d/Y H:i:s")?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <table class="table table-condensed">
                  <tr>
                    <th><?=$this->lang->line('tbl_col_orderitem')?></th>
                    <th><?=$this->lang->line('tbl_col_orderproducttitle')?></th>
                      <th><?=$this->lang->line('tbl_col_ordersize')?></th>
                      <th><?=$this->lang->line('tbl_col_ordercolor')?></th>
                      <th style="text-align:right"><?=$this->lang->line('tbl_col_orderpcs')?></th>
                      <th style="text-align:right"><?=$this->lang->line('tbl_col_orderprice')?></th>
                      <th style="text-align:right"><?=$this->lang->line('tbl_col_ordersubtotal')?></th>
                  </tr>
                  <?php 
                    foreach($order->shop_order->product as $item) {  ?>
                  <tr>
                    <td><?=$item->product_id?></td>
                    <td><?=$item->name_en?></td>
                    <td><?=$item->attribute->size->name ? $item->attribute->size->name : ''?></td>
                    <td><?=$item->attribute->color ? $item->attribute->color->name : ''?></td>
                    <td align="right"><?=$item->quantity?></td>
                    <td align="right"><?=number_format($item->price, 2)?></td>
                    <td align="right"><?=number_format($item->total_price, 2)?></td>
                  </tr>
                <?php  }?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Shipment</td>
                    <td align="right"><?=number_format($order->shipment_fee_override, 2)?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td align="right"><?=number_format($order->shop_order_total, 2)?></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-2"><?=$this->lang->line('lbl_order_shipmentinfo')?></h4>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_shipmentaddress')?></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="shipmentaddress" name="shipmentaddress" value="<?=$order->shipment_address?>">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_receiver')?></label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="receiver" name="receiver" value="<?=$order->shipment_receiver?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Shipment Fee</label>
              <div class="col-sm-6">
                <input type="number" min="0" step="any" onkeypress="return event.charCode <= 57" class="form-control" id="shipmentfee" name="shipmentfee" value="<?=number_format($order->shipment_fee_override, 2)?>">
              </div>
            </div>
            <hr class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-6"></div>
              <div class="col-sm-2">
                <!--<select class="form-control" name="paymentstatus">
                  <option <?php if($order->payment_status == 'paid') echo 'selected';?>>Paid</option>
                  <option <?php if($order->payment_status == 'pending') echo 'selected';?>>Pending</option>
                  <option <?php if($order->payment_status == 'processed') echo 'selected';?>>Processed</option>
                </select> -->
              </div>
              <div class="col-sm-2">
                <!-- <select class="form-control" name="orderstatus">
                  <option <?php if($order->order_status == 'process') echo 'selected';?>>Process</option>
                  <option <?php if($order->order_status == 'pending') echo 'selected';?>>Pending</option>
                </select> -->
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-primary pull-right" name="saveOrder" value="saveOrder"><i class="fa fa-check"></i> <?=$this->lang->line('button_submit')?></button>
              </div>
            </div>
          </div><!-- /.box-body -->               
        </div><!-- /.box-body -->
      </form>
    </div>    
  </section><!-- /.content -->
  