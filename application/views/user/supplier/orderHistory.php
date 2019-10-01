<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>
</table>
	<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no.</th>
      <th scope="col">Orders</th>
      <th scope="col">Price($)</th> 
      <th scope="col">Order date</th>
      <th scope="col">Buyer</th>    
      <th scope="col">Offer Status</th>   
	  
    </tr>
    </thead>

        <tbody>
      <?php  ?>
    <?php 
	   if(!empty($allOrderHistory)){
	 //pr($allOrderHistory);
	  $i=0;
	   foreach($allOrderHistory as $requestInSupply){

	    ?>
      <tr>
		  <td  style="text-align:center;"><?php echo $i++;?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_random_id)){ echo $requestInSupply->order_random_id;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php

echo !empty($requestInSupply->order_name_1)?$requestInSupply->order_name_1:'';
   for ($j=2; $j<10; $j++) {
	   echo !empty($requestInSupply->{'order_name_'.$j})?', ':'';
	   echo !empty($requestInSupply->{'order_name_'.$j})?$requestInSupply->{'order_name_'.$j}:'';
   } ?></td>
		<td  style="text-align:center;"><?php
echo !empty($requestInSupply->product1_quote)?'Product1 quote:':'';
echo !empty($requestInSupply->product1_quote)?$requestInSupply->product1_quote:'';
   for ($j=2; $j<10; $j++) {
	   if(!empty($requestInSupply->{'product'.$j.'_quote'})){
			echo ' ,',' Product',$j, ' quote:', $requestInSupply->{'product'.$j.'_quote'};
	   }
   } ?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->prefer_delivery_data)){ echo $requestInSupply->prefer_delivery_data;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		
		<td style="text-align:center;">
		  <?php

		if($requestInSupply->request_wait_response==1 AND $requestInSupply->supplier_accepted_buyer_offer==1){ 
			echo 'Success';
		}
		else if($requestInSupply->request_wait_response==0 AND $requestInSupply->supplier_accepted_buyer_offer==1){ 
			echo 'Waiting  Buyer  Response';	
		}
		else if($requestInSupply->request_wait_response==1 AND $requestInSupply->supplier_accepted_buyer_offer==0){ 
			//echo 'yet not Supplier Accept this Offer';
				echo 'Waiting Buyer Response';	
		}
		else{
			//echo 'yet not Buyer Accept this Offer';
				echo 'Waiting Buyer Response';	
			
		}?>
		 
		 </td>	  
	  </tr>

     <?php }
	 
	 } ?>  
   
     </tbody>
</table>

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
<script>
      $(document).ready(function(){
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
</script>