<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>
<div class="table-responsive">
  <table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref-sup">
      <th scope="col">S.no</th>
	  <th scope="col">Order no.</th>
	  <th scope="col">Offer no.</th>
      <th scope="col">Orders</th>
	  <th scope="col">Accepted Quote</th> 
	  <th scope="col">Unaccepted Quote</th> 
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
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->random_offer_id)){ echo $requestInSupply->random_offer_id;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php

echo !empty($requestInSupply->order_name_1)?$requestInSupply->order_name_1:'';

   for ($j=2; $j<10; $j++) {
	   echo !empty($requestInSupply->{'order_name_'.$j})?', ':'';
	   echo !empty($requestInSupply->{'order_name_'.$j})?$requestInSupply->{'order_name_'.$j}:'';
   } ?></td>
		<td  style="text-align:center;"><?php

   for ($j=1; $j<10; $j++) {
	   if(!empty($requestInSupply->{'product'.$j.'_quote'})){
		   if($requestInSupply->{'product'.$j.'_status'} == 3 || $requestInSupply->{'product'.$j.'_status'} == 5){
			echo ' Quote For ', $requestInSupply->{'order_name_'.$j}, ' : ', $requestInSupply->{'product'.$j.'_quote'};
			echo '<br>';
		   }
			
	   }

   } ?></td>
   <td  style="text-align:center;"><?php

for ($j=1; $j<10; $j++) {
	if(!empty($requestInSupply->{'product'.$j.'_quote'})){
		if($requestInSupply->{'product'.$j.'_status'} == 0 || $requestInSupply->{'product'.$j.'_status'} == 4){
		 echo ' Quote For ',$requestInSupply->{'order_name_'.$j}, ' : ', $requestInSupply->{'product'.$j.'_quote'};
		 echo '<br>';
		}
		 
	}

} ?></td>
      <td  style="text-align:center;"><?php if(!empty($requestInSupply->prefer_delivery_data)){
                                                echo(date("d/m/Y", strtotime( $requestInSupply->prefer_delivery_data)));} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		
		<td style="text-align:center;">
		  <?php

		echo "Order Completed";?>
		 
		 </td>	  
	  </tr>

     <?php }
	 
	 } ?>  
   
     </tbody>
</table>
</div>
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
