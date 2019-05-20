<h1 class="o-order">Order Submitted</h1>

<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
	<tr class="ref">
          <th scope="col">S.no</th>
          <th scope="col">Order no.</th>
          <th scope="col">Requests</th>
		   <th scope="col">Request Status</th>
          <th scope="col">Quantity</th>
          <th scope="col">Prefer Delivery Date</th>
          <th scope="col">All Sent Supplier Request</th>     
          <th scope="col">Action</th>     
        </tr>


    </thead>
    <tbody>

 <?php	//pr($savedtOrder); ?>
        <?php if(!empty($savedtOrder)){
        for($i=0;$i< count($savedtOrder); $i++){  ?>
       
      
        <tr>
            <td ><?php echo   $i;?></td>
            <td style="text-align:center;"><?php if(!empty($savedtOrder[$i]->order_id)){ echo   $savedtOrder[$i]->order_id;} else {echo 'N/A';}?></td>
            <td style="text-align:center;"><?php if(!empty($savedtOrder[$i]->order_name)){ echo   $savedtOrder[$i]->order_name;} else {echo 'N/A';}?></td>
          
            <td  style="text-align:center;"><?php if($savedtOrder[$i]->is_Request_order_again==1){echo 'Re-Order';} else {echo 'New-Order';}?>    </td>
			  <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->quantity)){ echo $savedtOrder[$i]->quantity;} else {echo 'N/A';}?>    </td>
            <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->prefer_delivery_data)){ echo $savedtOrder[$i]->prefer_delivery_data;} else {echo 'N/A';}?>    </td>
            <td  style="text-align:center;"><?php if(!empty($savedtOrder[$i]->sent_number_ofSupplier_request !=0)){ echo $savedtOrder[$i]->sent_number_ofSupplier_request;} else {echo '0'.' '.'Offers';}?>  </td>
               <td  style="text-align:center;"><a  href="<?php echo base_url('buyer/viewOrder/'.$savedtOrder[$i]->order_id);?>" >View offer</a> | <a class="cancel" href="<?php echo base_url('buyer/cancelOrder/'.$savedtOrder[$i]->order_id);?>" class="delete">Cancel</a></td>
        </tr>
      <?php }
    } 
  ?>

    </tbody>