<h1 class="o-order">New Order</h1>

<a href="<?php echo base_url('buyer/orderRequest');?>" class="btn btn-primary">New Order</a>   

<h1 class="o-order">Draft Order</h1>
<a href="<?php echo base_url('buyer/draftOrder');?>" class="btn btn-default"> Draft Order(<?php echo  count($draftOrder);?>)</a>

<h1 class="o-order">Order Submitted</h1>


<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
	<tr class="ref">
          <th scope="col">S.no</th>
          <th scope="col" >Bundle.no</th>
          <th scope="col">Order no.</th>
          <th scope="col">Products</th>
		  <!-- <th scope="col">Order Status</th> -->
          <th scope="col">Products breif</th>
          <th scope="col">Prefer Delivery Date</th>
          <th scope="col">Offer from supplier</th>     
          <th scope="col">Action</th>     
        </tr>


    </thead>
    <tbody>

 <?php	//pr($savedtOrder); ?>
        <?php if(!empty($savedtOrder)){
          
        for($i=0;$i< count($savedtOrder); $i++){  
          $productCount = 0;

          if(count($savedtOrder[$i]) == 1){

          ?>
        <tr>

      <!-- bundle order, show mutliple order number in the cell with a bundle id -->
      
      <td><?php echo $i;?></td>
      <td style="text-align:center;"><?php if(!empty($savedtOrder[$i][0]['bundle_id'])){ echo $savedtOrder[$i][0]['bundle_id'];} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($savedtOrder[$i][0]['order_random_id'])){ echo $savedtOrder[$i][0]['order_random_id'];} else {echo 'N/A';}?></td>
      <td style="text-align:center;"><?php for($v = 1; $v<51;$v++){$order_name = 'order_name_'.$v;if ($savedtOrder[$i][0][$order_name]!='') {$productCount++;}};if ($productCount>1){
          echo $productCount;
          echo' products';
      }else{echo $productCount;
        echo' product';}?></td>
      <!-- <td> <?php if($savedtOrder[$i]->is_Request_order_again==1){echo 'Re-Order';} else {echo 'New-Order';}?>    </td> -->
      <td style="text-align:center;"><?php if($productCount>2){
        echo $savedtOrder[$i][0]['order_name_1']; 
        echo ', '; 
        echo $savedtOrder[$i][0]['order_name_2'];
        echo' etc';}
        elseif($productCount = 2  ){
          echo $savedtOrder[$i][0]['order_name_1']; 
          echo ', '; 
          echo $savedtOrder[$i][0]['order_name_2']; 
          }else{
            echo $savedtOrder[$i][0]['order_name_1'];}?></td>
      <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i][0]['prefer_delivery_data'])){ echo $savedtOrder[$i][0]['prefer_delivery_data'];} else {echo 'N/A';}?>    </td>
      <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->sent_number_ofSupplier_request !=0)){ echo $savedtOrder[$i]->sent_number_ofSupplier_request;} else {echo '0'.' '.'Offers';}?>  </td>
      <td  style="text-align:center;"><a  href="<?php echo base_url('buyer/viewOrder/'.$savedtOrder[$i][0]['order_id']);?>" >Order details</a> | <a class="cancel" href="<?php echo base_url('buyer/cancelOrder/'.$savedtOrder[$i]->order_id);?>" class="delete">Cancel</a></td>
        </tr>
        <?php }
        
      
        if(count($savedtOrder[$i]) > 1){

        ?>
      <tr>

    <!-- bundle order, show mutliple order number in the cell with a bundle id -->
    
    <td><?php echo $i;?></td>
    <td style="text-align:center;"><?php if(!empty($savedtOrder[$i][0]['bundle_id'])){ echo $savedtOrder[$i][0]['bundle_id'];} else {echo 'N/A';}?></td>
    <td style="text-align:center;"><?php for($v =0; $v<count($savedtOrder[$i]);$v++){echo $savedtOrder[$i][$v]['order_random_id'];echo' ';}?></td>
    <td style="text-align:center;"><?php for($v = 1; $v<11; $v++){$order_name = 'order_name_'.$v;
      for($j = 0; $j<count($savedtOrder[$i]);$j++){if ($savedtOrder[$i][$j][$order_name]!=''){$productCount++;}}};echo $productCount;echo' products';
?></td>
    <!-- <td> <?php if($savedtOrder[$i]->is_Request_order_again==1){echo 'Re-Order';} else {echo 'New-Order';}?>    </td> -->
    <td style="text-align:center;"><?php if($productCount>2){
        echo $savedtOrder[$i][0]['order_name_1']; 
        echo ', '; 
        echo $savedtOrder[$i][0]['order_name_2'];
        echo' etc';}
        elseif($productCount = 2  ){
          echo $savedtOrder[$i][0]['order_name_1']; 
          echo ', '; 
          echo $savedtOrder[$i][0]['order_name_2']; 
          }else{
            echo $savedtOrder[$i][0]['order_name_1'];}?></td>
    <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i][0]['prefer_delivery_data'])){ echo $savedtOrder[$i][0]['prefer_delivery_data'];} else {echo 'N/A';}?>    </td>
    <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->sent_number_ofSupplier_request !=0)){ echo $savedtOrder[$i]->sent_number_ofSupplier_request;} else {echo '0'.' '.'Offers';}?>  </td>
    <td  style="text-align:center;"><a  href="<?php echo base_url('buyer/viewOrder/'.$savedtOrder[$i][0]['order_id']);?>" >Order details</a> | <a class="cancel" href="<?php echo base_url('buyer/cancelOrder/'.$savedtOrder[$i]->order_id);?>" class="delete">Cancel</a></td>
      </tr>
      <?php } }
    } 
  ?>

    </tbody>
<!--</table>
  <h1 class="o-order">Order in Supply</h1>
           <table id="dtatbl" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
       <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no.</th>
      <th scope="col">Requests</th>
      <th scope="col">Quantity</th>
      <th scope="col">Prefer Delivery Date</th>
      <th scope="col">Price($)</th>     
      <th scope="col">Supplier</th>     
      <th scope="col">Payment Status</th>     
      <th scope="col">Delivery Status</th>     
      <th scope="col">Payments Terms</th>     
    </tr>
    </thead>

        <tbody>
      <?php //pr($RequestQuotesPr); ?>
       <?php if(!empty($RequestQuotesP)){ ?>
      <tr><td colspan="12" style="text-align:center;">1</td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <tr><td colspan="12" style="text-align:center;"></td></tr>
      <?php } else { ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php } ?>  
   
        
    </tbody>
</table>
-->

</table>
  <h1 class="o-order">Order in Supply</h1>
	<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no</th>
      <th scope="col">Order</th>
      <th scope="col">Quantity</th>
      <th scope="col">Prefer Delivery Date</th>
      <th scope="col">Supplier</th>
      <th scope="col">Price($)</th>         
      <th scope="col">Payment Status</th>     
      <th scope="col">Delivery Status</th>      
         
    </tr>
    </thead>

        <tbody>
      <?php  ?>
       <?php 
	   $requestInSupply =$orderInSupply;
      // echo "<pre>"; print_r($requestInSupply); die;  
	   if(!empty($requestInSupply)){
	 // pr($requestInSupply);
	  $i=0;
	   foreach($requestInSupply as $requestInSupply){
		  // echo "<pre>"; print_r($requestInSupply); die; 
		   
	    ?>
      <tr>
	  
		  <td  style="text-align:center;"><?php echo $i++;?></td>
		<!-- <td  style="text-align:center;"><?php //if(!empty($requestInSupply->marked_offer_id)){ echo $requestInSupply->marked_offer_id;} else {echo 'N/A';}?></td>-->
		   <td  style="text-align:center;"><a href="<?php echo base_url('buyer/processOrder/'.$requestInSupply->offer_id_fk);?>"><?php if(!empty($requestInSupply->order_random_id)){ echo $requestInSupply->order_random_id;} else {echo 'N/A';}?></a></td>
		  
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
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
    </script>
  
    





   
 
  


