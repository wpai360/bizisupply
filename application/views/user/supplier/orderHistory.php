<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>
</table>
	<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no.</th>
      <th scope="col">Requests</th>
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
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_id)){ echo $requestInSupply->order_id;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_name)){ echo $requestInSupply->order_name;} else {echo 'N/A';}?></td>
		<td  style="text-align:center;"><?php if(!empty($requestInSupply->price_offer)) { echo '$'.$requestInSupply->price_offer;}  else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->prefer_delivery_data)){ echo $requestInSupply->prefer_delivery_data;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		
		<td style="text-align:center;">
		  <?php



		/* if($requestInSupply->request_wait_response==1 AND $requestInSupply->supplier_accepted_buyer_offer==1){ 
		  
				echo 'Success';
				
		}
		else if($requestInSupply->request_wait_response==0 AND $requestInSupply->supplier_accepted_buyer_offer==0){ 
		  
			echo 'Waiting  Buyer  Response ';
				
		}
				
		  else{
			echo 'Failure';
		  } */

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
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
</script>