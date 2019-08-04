  <section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3> 
        <button type="button" class="btn btn-primary pull-right"><i class="fa fa-print"></i></button>
      </div><!-- /.box-header -->
      <form class="form-horizontal"><!-- form start -->
        <div class="box-body">
          <div class="box-header with-border">
            <h3 class="box-title">Order ID</h3>(User: <?=$order->user->username?>) (Shop: <?=$order->shop->name?>)(Status: <?=ucfirst($order->order_status)?>) (Payment Status: <?=ucfirst($order->payment_status)?>)
          </div>
          <div class="box-body">
            <input type="hidden" class="form-control" id="orderid" name="orderid" value="<?=$order->id?>">
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_user')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user" name="user" value="<?=$order->user->username?>" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_shop')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="shop" name="shop" value="" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_status')?></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="orderstatus" name="orderstatus" value="<?=$order->shop->name?>" disabled>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary pull-right" disabled>On Hold</button>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_paymentstatus')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="paymentstatus" name="paymentstatus" value="<?=ucfirst($order->payment_status)?>" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_totalprice')?></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="totalprice" name="totalprice" value="<?=$order->shop_order_total?>" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_time')?></label>
                <div class="date col-sm-3">
                  <input type="text" class="form-control" id="ordertime" name="ordertime" value="<?=date_format(date_create($order->order_date), "m/d/Y H:i:s")?>" disabled>
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
                  <?php if(!$cart->shop) {$totalamount = 0; $totalshipment = 0;} foreach($cart->shop as $prod) {
                    $totalamount = $prod->shop_cart_total ? $prod->shop_cart_total : 0;
                    $totalshipment = $prod->shipment_fee_computed ? $prod->shipment_fee_computed : 0;
                    
                    foreach($prod->product as $item) {?>
                  <tr>
                    <td><?=$item->product_id?></td>
                    <td><?=$item->name_en?></td>
                    <td><?=$item->attribute->size->name?></td>
                    <td><?=$item->attribute->color->name?></td>
                    <td align="right"><?=$item->quantity?></td>
                    <td align="right"><?=number_format($item->price, 2)?></td>
                    <td align="right"><?=number_format($item->total_price, 2)?></td>
                  </tr>
                <?php } }?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Shipment</td>
                    <td align="right"><?=number_format($totalshipment, 2)?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td align="right"><?=number_format($totalamount, 2)?></td>
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
                  <input type="text" class="form-control" id="shipmentaddress" value="<?=$order->shipment_address?>" disabled>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><?=$this->lang->line('lbl_order_receiver')?></label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="receiver" value="<?=$order->shipment_receiver?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Shipment Fee</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="shipmentfee" value="<?=number_format($totalshipment, 2)?>" disabled>
              </div>
            </div>
          </div><!-- /.box-body -->               
        </div><!-- /.box-body -->
      </form>
    </div>    
  </section><!-- /.content -->
  