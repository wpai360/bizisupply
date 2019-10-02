


<?php  if ($this->session->flashdata('message')) {
    ?>        
<?php echo $this->session->flashdata('message')?>
<?php
} ?>
</table>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
	  <th scope="col">Order no.</th>
	  <th scope="col">Offer no.</th>
      <th scope="col">Orders</th> 
      <th scope="col">Order date</th>
      <th scope="col">Supplier</th>      
     
      <th scope="col">Action</th>      
    </tr>
    </thead>

    <tbody>
      <?php

 //pr($allOrderHistory);?>
    <?php
       if (!empty($allOrderHistory)) {
           $i=0;
           foreach ($allOrderHistory as $requestInSupply) {
?>
      <tr>
		  <td  style="text-align:center;"><?php echo $i++; ?></td>
		  <td  style="text-align:center;"><?php if (!empty($requestInSupply->order_random_id)) {
                   echo $requestInSupply->order_random_id;
               } else {
                   echo 'N/A';
			   } ?></td>
			   
			   <td  style="text-align:center;"><?php if (!empty($requestInSupply->random_offer_id)) {
                   echo $requestInSupply->random_offer_id;
               } else {
                   echo 'N/A';
               } ?></td>
		  
		 <!-- <td  style="text-align:center;"><?php //if(!empty($requestInSupply->order_id)){ echo $requestInSupply->order_id;} else {echo 'N/A';}?></td> -->
		  
		 <!-- todo: display all order name -->
		 
		  <td  style="text-align:center;"><?php

			echo !empty($requestInSupply->order_name_1)?$requestInSupply->order_name_1:'';
               for ($j=2; $j<10; $j++) {
                   echo !empty($requestInSupply->{'order_name_'.$j})?', ':'';
                   echo !empty($requestInSupply->{'order_name_'.$j})?$requestInSupply->{'order_name_'.$j}:'';
               } ?></td>
		  <td  style="text-align:center;"><?php if (!empty($requestInSupply->prefer_delivery_data)) {
                   echo $requestInSupply->prefer_delivery_data;
               } else {
                   echo 'N/A';
               } ?></td>
		  <td style="text-align:center;"><?php if (!empty($requestInSupply->name)) {
                   echo $requestInSupply->username;
               } else {
                   echo 'N/A';
               } ?></td>
		  
		  
		  
		  
		  <td style="text-align:center;">
		  <!-- <form action="<?php echo base_url('buyer/orderRequest');?>" method="post" enctype="multipart/form-data" novalidate="">
	
		
		
	<input required type="hidden" name="brand_name_1[]" placeholder="product"  value="<?php if (!empty($requestInSupply->brand_name_1)) {
                   echo $requestInSupply->brand_name_1;
               } else {
                   echo '';
               } ?>">
	
	
	<input required type="hidden" name="product_1[]" placeholder="product"  value="<?php if (!empty($requestInSupply->order_name_1)) {
                   echo $requestInSupply->order_name_1;
               } else {
                   echo '';
               } ?>">
	<input required="" type="hidden" name="partNumber_1[]" id="partNumber" placeholder="partNumber" value="<?php if (!empty($requestInSupply->part_number_1)) {
                   echo $requestInSupply->part_number_1;
               } else {
                   echo 'N/A';
               } ?>" >
	<input required="" type="hidden" name="category[]" id="category" placeholder="category" value="<?php if (!empty($requestInSupply->product_assign_category)) {
                   echo $requestInSupply->product_assign_category;
               } else {
                   echo '';
               } ?>">
	<input required="" type="hidden" name="quantity_1[]" id="quantity" placeholder="quantity"  value="<?php if (!empty($requestInSupply->quantity_1)) {
                   echo $requestInSupply->quantity_1;
               } else {
                   echo 'N/A';
               } ?>"  >
	<input required="" type="hidden" name="prefer_delivery_date[]" class="date1" placeholder="prefer_delivery_date" value="<?php if (!empty($requestInSupply->prefer_delivery_data)) {
                   echo $requestInSupply->prefer_delivery_data;
               } else {
                   echo '';
               } ?>"  >
	<input required="" type="hidden" name="description[]"  id="description" placeholder="description" value="<?php if (!empty($requestInSupply->order_description)) {
                   echo $requestInSupply->order_description;
               } else {
                   echo '';
               } ?>">   

	<input type="submit" name="Order_Again" value="Order Again"> 
</form> -->
<a  href="<?php echo base_url('buyer/orderAgain/'.$requestInSupply->order_id); ?>" >Order Again</a> |
<a  href="<?php echo base_url('buyer/viewOrder/'.$requestInSupply->order_id); ?>" >Order Details</a> </td>
		  
	  </tr>

     <?php
           }
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
  
    





   
 
  


