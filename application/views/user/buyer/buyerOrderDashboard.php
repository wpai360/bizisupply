<h1 class="o-order">New Order</h1>

<a href="<?php echo base_url('buyer/orderRequest');?>" class="btn btn-primary">New Order</a>   

<h1 class="o-order">Draft Order</h1>
<a href="<?php echo base_url('buyer/draftOrder');?>" class="btn btn-default"> Draft Order(<?php echo  count($draftOrder);?>)</a>

<h1 class="o-order">Order In Process</h1>


<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
	<tr class="ref">
          <th scope="col">S.no</th>
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
          $productCount = 0;?>
       
      
        <tr>
            <td ><?php echo   $i;?></td>
           <!-- <td style="text-align:center;"><?php //if(!empty($savedtOrder[$i]->order_id)){ echo   $savedtOrder[$i]->order_id;} else {echo 'N/A';}?></td>-->
		   
		  <td style="text-align:center;"><?php if(!empty($savedtOrder[$i]->order_random_id)){ echo   $savedtOrder[$i]->order_random_id;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php for($v = 1; $v<11;$v++){
            // echo"<pre>"; print_r(${'product_'.$v});
            $order_name = 'order_name_'.$v;
            if ($savedtOrder[$i]->$order_name!='') {
                // echo "<pre>"; print_r(${'product_'.$v});
                $productCount++;
            }
        };echo $productCount; echo' products';?></td>
<!-- <td  style="text-align:center;"><?php if($savedtOrder[$i]->is_Request_order_again==1){echo 'Re-Order';} else {echo 'New-Order';}?>    </td> -->
      <td style="text-align:center;"><?php if($productCount>2){echo $savedtOrder[$i]->order_name_1; echo ', '; echo $savedtOrder[$i]->order_name_2; echo' etc';}elseif($productCount>1){echo $savedtOrder[$i]->order_name_1; echo ', '; echo $savedtOrder[$i]->order_name_2;}else{echo $savedtOrder[$i]->order_name_1;}?></td>
      <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->prefer_delivery_data)){ echo $savedtOrder[$i]->prefer_delivery_data;} else {echo 'N/A';}?>    </td>
      <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->sent_number_ofSupplier_request !=0)){ echo $savedtOrder[$i]->sent_number_ofSupplier_request;} else {echo '0'.' '.'Offers';}?>  </td>
      <td  style="text-align:center;"><a  href="<?php echo base_url('buyer/viewOrder/'.$savedtOrder[$i]->order_id);?>" >Order details</a> | <a class="cancel" href="<?php echo base_url('buyer/cancelOrder/'.$savedtOrder[$i]->order_id);?>" class="delete">Cancel</a></td>
        </tr>
      <?php }
    } 
  ?>

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
  
    





   
 
  


