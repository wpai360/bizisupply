

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>
</table>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no.</th>
      <th scope="col">Orders</th> 
      <th scope="col">Order date</th>
      <th scope="col">Supplier</th>      
      <th scope="col">Offer Status</th>      
      <th scope="col">Action</th>      
    </tr>
    </thead>

    <tbody>
      <?php 	 

 //pr($allOrderHistory); ?>
    <?php 
	   if(!empty($allOrderHistory)){

	  $i=0;
	   foreach($allOrderHistory as $requestInSupply){
	    ?>
      <tr>
		  <td  style="text-align:center;"><?php echo $i++;?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_random_id)){ echo $requestInSupply->order_random_id;} else {echo 'N/A';}?></td>
		  
		 <!-- <td  style="text-align:center;"><?php //if(!empty($requestInSupply->order_id)){ echo $requestInSupply->order_id;} else {echo 'N/A';}?></td> -->
		  
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->order_name)){ echo $requestInSupply->order_name;} else {echo 'N/A';}?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->prefer_delivery_data)){ echo $requestInSupply->prefer_delivery_data;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		  
		  
		  <td style="text-align:center;">
		  <?php

		if($requestInSupply->request_wait_response==1 AND $requestInSupply->supplier_accepted_buyer_offer==1){ 
			echo 'Success';
		}
		else if($requestInSupply->request_wait_response==1 AND $requestInSupply->supplier_accepted_buyer_offer==0){ 
			echo 'Waiting  supplier  Response ';	
		}
		else{
			echo 'yet not Buyer Accept this Offer';
		}?>
		 
		  </td>
		  
		  <td style="text-align:center;">
		  <form action="http://srv1.a1professionals.net/hawki/buyer/orderRequest" method="post" enctype="multipart/form-data" novalidate=">
	
		<input required="" type="text" name="brand_name[]" placeholder="Brand name" value="<?php if(!empty($requestInSupply->brand_name)){ echo  $requestInSupply->brand_name;} else {echo 'N/A';}?>">
		
		
	<input required type="hidden" name="brand_name[]" placeholder="product"  value="<?php if(!empty($requestInSupply->brand_name)){ echo $requestInSupply->brand_name;} else {echo '';}?>">
	
	
	<input required type="hidden" name="product[]" placeholder="product"  value="<?php if(!empty($requestInSupply->order_name)){ echo $requestInSupply->order_name;} else {echo '';}?>">
	<input required="" type="hidden" name="partNumber[]" id="partNumber" placeholder="partNumber" value="<?php if(!empty($requestInSupply->part_number)){ echo $requestInSupply->part_number;} else {echo 'N/A';}?>" >
	<input required="" type="hidden" name="category[]" id="category" placeholder="category" value="<?php if(!empty($requestInSupply->product_assign_category)){ echo $requestInSupply->product_assign_category;} else {echo '';}?>">
	<input required="" type="hidden" name="quantity[]" id="quantity" placeholder="quantity"  value="<?php if(!empty($requestInSupply->quantity)){ echo $requestInSupply->quantity;} else {echo 'N/A';}?>"  >
	<input required="" type="hidden" name="prefer_delivery_date[]" class="date1" placeholder="prefer_delivery_date" value="<?php if(!empty($requestInSupply->prefer_delivery_data)){ echo $requestInSupply->prefer_delivery_data;} else {echo '';}?>"  >
	<input required="" type="hidden" name="description[]"  id="description" placeholder="description" value="<?php if(!empty($requestInSupply->order_description)){ echo $requestInSupply->order_description;} else {echo '';}?>">   

	<input type="submit" name="Order_Again" value="Order Again">
</form></td>
		  
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
  
    





   
 
  


