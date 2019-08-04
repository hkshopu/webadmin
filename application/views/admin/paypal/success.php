<html>
<head>
	<title><?=$title?></title>
</head>
<section class="content"><!-- Main content -->
    <div class="box box-primary"><!-- Horizontal Form -->
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div><!-- /.box-header -->
        <div class="box-body">
          <h4 class="success">Thank you! Your payment was successful.</h4>
          	<a href="<?php echo base_url('admin/adorder')?>">Back to Top Up</a>
		    <p>Payer Email: <?=$data['payer_email']?></p>
			<p>Payer ID: <?=$data['payer_id']?></p>
			<p>Payer Status: <?=$data['payer_status']?></p>
			<p>First Name: <?=$data['first_name']?></p>
			<p>Last Name: <?=$data['last_name']?></p>
			<p>Address Name: <?=$data['address_name']?></p>
			<p>Address Street: <?=$data['address_street']?></p>
			<p>City: <?=$data['address_city']?></p>
			<p>Address Country Code: <?=$data['address_country_code']?></p>
			<p>Residence Country: <?=$data['residence_country']?></p>
			<p>TXN ID: <?=$data['txn_id']?></p>
			<p>Currency: <?=$data['mc_currency']?></p>
			<p>Gross: <?=$data['mc_gross']?></p>
			<p>Protection Eligibility: <?=$data['protection_eligibility']?></p>
			<p>Gross Payment: <?=$data['payment_gross']?></p>
			<p>Payment Status: <?=$data['payment_status']?></p>
			<p>Pending Reason: <?php if(isset($data['pending_reason'])) echo $data['pending_reason'];?></p>
			<p>Payment Type: <?=$data['payment_type']?></p>
			<p>Item Name: <?=$data['item_name']?></p>
			<p>Quantity: <?=$data['quantity']?></p>
			<p>TXN Type: <?=$data['txn_type']?></p>
			<p>Payment Date: <?=$data['payment_date']?></p>
			<p>Business: <?=$data['business']?></p>
			<p>Receiver ID: <?=$data['receiver_id']?></p>
			<p>Notify version: <?=$data['notify_version']?></p>
			<p>Custom: <?=$data['custom']?></p>
			<p>Verify sign: <?=$data['verify_sign']?></p> 
			<div id="orderID"><?=$order->order_id?></div>
			<?php $orderid = $order->order_id;?>
			<script>

				var orderid = <?php echo json_encode($orderid); ?>;
				window.location.href = window.location.href + "#" + orderid;
  window.postMessage(orderid);
</script>
	    
        </div><!-- /.box-body -->
    </div><!-- /.box-info -->
  </section><!-- /.content -->


  


    


  


    
