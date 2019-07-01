<style>
span.sent_button {
    cursor: pointer;
}
</style>
<h1 class="o-order">Orders Wait Response</h1>
<a href="<?php echo base_url('supplier/dashboard');?>" style="font-size:18px; color:black;" >New Orders and Marked offers</a><span> | </span><a href="<?php echo base_url('supplier/draftOffers');?>"> Draft Offers</a>

<?php  if($this->session->flashdata('message')){?>        
        <p id="load_limit">  <?php echo $this->session->flashdata('message')?> </p>
<?php } ?>
<form action="<?php echo base_url('supplier/allactiOnOffer');?>" method="post">

      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
		<tr class="ref">
			<th scope="col">S.no</th>
			<th scope="col">Order Id</th>
			<th scope="col">Orders</th>
			<th scope="col">Quantity</th>
			<th scope="col">Prefer Delivery Date</th>
			<!--<th scope="col">Payment terms</th>-->     
			<th scope="col">Action</th>     
        </tr>
    </thead>
    <tbody>
	

 <?php  //pr($supplierOfferlist); ?>
         <?php if(!empty($supplierOfferlist)){
        for($i=0;$i< count($supplierOfferlist); $i++){  ?>
              
        <tr>
            <td><?php echo   $i;?></td>
           <!-- <td style="text-align:center;"><?php //if(!empty($supplierOfferlist[$i]->order_id)){ echo   $supplierOfferlist[$i]->order_id;} else {echo 'N/A';}?></td> -->
		   <td style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->order_random_id)){ echo   $supplierOfferlist[$i]->order_random_id;} else {echo 'N/A';}?></td>
		   <td style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->order_name)){ echo   $supplierOfferlist[$i]->order_name;} else {echo 'N/A';}?></td>
            <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->quantity)){ echo $supplierOfferlist[$i]->quantity;} else {echo 'N/A';}?>    </td>
            <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->prefer_delivery_data)){ echo $supplierOfferlist[$i]->prefer_delivery_data;} else {echo 'N/A';}?></td>
           <!-- <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->payment_terms)){ echo $supplierOfferlist[$i]->payment_terms;} else {echo 'N/A';}?></td>-->
             <!-- <td  style="text-align:center;"><a  href="<?php echo base_url('supplier/submitOffer/'.$supplierOfferlist[$i]->offer_id);?>" >Make Offer for The Request</a> | <a  href="<?php echo base_url('supplier/ignoreOffer/'.$supplierOfferlist[$i]->offer_id);?>" >Ignore</a><input type="hidden" name="gotOfferId[]"  value="<?php echo $supplierOfferlist[$i]->offer_id; ?>">
			</td>-->
			<td  style="text-align:center;">
		   <?php
			$CI =& get_instance();
			$CI->load->model('SupplierRequestModel'); 
			$ViewofferList = $CI->SupplierRequestModel->check_Offer($supplierOfferlist[$i]->offer_id);
			$checkCount = count($ViewofferList);
			if($checkCount){?>
				<a  href="<?php echo base_url('supplier/submitOffer/'.$supplierOfferlist[$i]->offer_id);?>" >
				Manage offer</a> 

			 <?php }else{?>
				<a  href="<?php echo base_url('supplier/submitOffer/'.$supplierOfferlist[$i]->offer_id);?>" >Make Offer for The Order</a> | <a  href="<?php echo base_url('supplier/ignoreOffer/'.$supplierOfferlist[$i]->offer_id);?>" >Ignore</a><input type="hidden" name="gotOfferId[]"  value="<?php echo $supplierOfferlist[$i]->offer_id; ?>">
		
			 <?php } ?> 
			
		
			</td>
        </tr>
	
		
	  <?php }
	  } ?>

     </tbody>	

	<tr>
			<td style="text-align:center;"></td>
			<td style="text-align:center;"></td>
			<td  style="text-align:center;">  </td>
			<td  style="text-align:center;"></td>
			<td  style="text-align:center;"></td>
			<td  style="text-align:center;"><input type="submit" value="Make Offer for All" name="make_offer_for_all"> | <input type="submit" value="Ignore All" name="Ignore_all"></td>
		</tr>

</table>
</form>

	
  <h1 class="o-order">Offer Sent</h1>
           <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Offer id</th>
      <th scope="col">Order</th>
      <th scope="col">Quantity</th>
      <th scope="col">Prefer Delivery Date</th>
     <th scope="col">Payment Term</th> 
      <th scope="col">Price($)</th>         
      <th scope="col">Offer Status</th>         
    </tr>
    </thead>

        <tbody>
    
	<?php 
	
	 /* echo "<pre>";
	print_r($OfferSentList); */ ?>
    <?php if(!empty($OfferSentList)){ 
	    for($i=0;$i< count($OfferSentList); $i++){ 
	?>
	
    <tr>
		<td style="text-align:center;"><?php echo $i;?></td>
		<!--<td  style="text-align:center;"><?php// echo $OfferSentList[$i]->offer_id;?></td>-->
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->order_random_id)){ echo   $OfferSentList[$i]->order_random_id;} else {echo 'N/A';}?></td>
		
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->order_name)){ echo   $OfferSentList[$i]->order_name;} else {echo 'N/A';}?></td>
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->quantity)){ echo $OfferSentList[$i]->quantity;} else {echo 'N/A';}?></td>
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->prefer_delivery_data)){ echo $OfferSentList[$i]->prefer_delivery_data;} else {echo 'N/A';}?></td>
		<!--<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->postcode)){ echo $OfferSentList[$i]->postcode;} else {echo 'N/A';}?></td>-->
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->payment_terms)){ echo $OfferSentList[$i]->payment_terms;} else {echo 'N/A';}?></td>
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->price_offer)){ echo '$'.$OfferSentList[$i]->price_offer;} else {echo 'N/A';}?></td>
		<td  style="text-align:center;"><?php if(!empty($OfferSentList[$i]->request_wait_response && $OfferSentList[$i]->request_wait_response==1)) { echo "<span class='sent_button'><a href=".base_url('supplier/submitOffer/'.$OfferSentList[$i]->offer_id).">".'Selected Wait Agree'."</a></span>";} else if(!empty($OfferSentList[$i]->request_wait_response && $OfferSentList[$i]->request_wait_response==2)) { echo 'Rejected';} else {echo "<span class='sent_button'>".'Waiting Buyer Response'."</span>";}?></td>
		
	</tr>
     <?php }
	 } ?>      
    </tbody>
</table>
  <h1 class="o-order">Order in Supply</h1>
	<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Offer id</th>
      <th scope="col">Order</th>
      <th scope="col">Quantity</th>
      <th scope="col">Prefer Delivery Date</th>
      <th scope="col">Buyer</th>
      <th scope="col">Price($)</th>         
      <th scope="col">Payment Status</th>     
      <th scope="col">Delivery Status</th>         
    </tr>
    </thead>

        <tbody>
      <?php  ?>
       <?php if(!empty($requestInSupply)){
	  //pr($requestInSupply);
	  $i=0;
	   foreach($requestInSupply as $requestInSupply){
	    ?>
      <tr>
		  <td  style="text-align:center;"><?php echo $i++;?></td>
		 <!-- <td  style="text-align:center;"><?php// if(!empty($requestInSupply->marked_offer_id)){ echo $requestInSupply->marked_offer_id;} else {echo 'N/A';}?></td>-->
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->random_offer_id)){ echo $requestInSupply->random_offer_id;} else {echo 'N/A';}?></td>
		  
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_name)){ echo $requestInSupply->order_name;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->quantity)){ echo $requestInSupply->quantity;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->prefer_delivery_data)){ echo $requestInSupply->prefer_delivery_data;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->price_offer)) { echo '$'.$requestInSupply->price_offer;}  else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->buyer_payment_mark_paid)){ echo 'Success';} else {echo 'Pending';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->buyer_delivery_transit_status)){ echo 'Success';} else {echo 'Pending';}?></td>
		  
	  </tr>
         
     <?php }
	 
	 } ?>  
  
    </tbody>
</table>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('.cancel').click(function(){
	var checkstr =  confirm('are you sure you want to cancel this order?');
	if(checkstr == true){
	// do your code
	}else{
	return false;
	}
	});
});
</script>
 <script src='https://code.jquery.com/jquery-1.12.3.js'></script>
   <script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" charset="utf-8"></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

 

    <script>
$(document).ready(function(){	  
  $("#load_limit").slideUp(1500, function() {
     $("#load_limit").delay(5000).slideDown(500);
  }); 

	  
	  
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#example1").DataTable({
    // "sPaginationType": "bootstrap",
  });
  $("#example2").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
</script>