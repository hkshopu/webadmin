
  
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <button type="button" id="printButton" class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i></button> 
      <br><br>
      <div class="col-xs-12">
        <h2 class="page-header">
          HK Shop U
          <small class="pull-right">Date: <?=date_format(date_create($order->order_date), "m/d/Y H:i:s")?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong><?=$order->shop->name?></strong><br>
          Address: N/A<br>
          Phone: N/A<br>
          Email: N/A
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?=$order->shipment_receiver ? $order->shipment_receiver : 'N/A'?></strong><br>
          Address: <?=$order->shipment_address ? $order->shipment_address : 'N/A'?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?=$order->id?></b><br>
        <br>
        <b>Order ID:</b> <?=$order->id?><br>
        <b>Payment Status:</b> <?=$order->payment_status?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
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
                <?php }?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <!--<img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express"> -->
        <img src="<?=base_url()?>assets/dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?php foreach($order->shop_order->payment_method as $pay) {echo $pay->name .' / '.$pay->account_info .'<br>';;}?>
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <!--<p class="lead">Amount Due 2/22/2014</p>-->

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td align="right">$<?=number_format($order->shop_cart_gross, 2)?></td>
            </tr>
            <tr>
              <th>Tax</th>
              <td align="right">$0.00</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td align="right">$<?=number_format($order->shipment_fee_override,2)?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td align="right">$<?=number_format($order->shop_order_total,2)?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
