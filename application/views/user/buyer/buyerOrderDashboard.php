<h1 class="o-order">New Order </h1>
<a href="<?php echo base_url('buyer/orderRequest');?>"  data-intro='1. Click here to make an order with <u>master list</u> or order <u>new products</u>' class="btn btn-primary">New Order</a>   

<h1 class="o-order">Draft Order</h1>
<a href="<?php echo base_url('buyer/draftOrder');?>"  data-intro='Click here to manage(i.e edit, hold or send) your draft order' class="btn btn-default"> Draft Order(<?php echo  count($draftOrder);?>)</a>

<h1 class="o-order">Order Sent To Supplier</h1>


<?php  if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
} ?>
      <table id="orderTable" data-intro='Displays the order you sent' class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
	<tr class="ref">
          <th scope="col">S.no</th>
          <th scope="col">Order no.</th>
          <th scope="col">Products</th>
		  <!-- <th scope="col">Order Status</th> -->
          <th scope="col">Products breif</th>
          <th scope="col">Prefer Delivery Date</th>
          <th scope="col" >Offer from supplier</th>     
          <th scope="col" data-intro='You can manage your order or delete it in here'>Action</th>     
        </tr>


    </thead>
    <tbody>

        <?php if (!empty($savedtOrder)) {
        for ($i=0;$i< count($savedtOrder); $i++) {
            $productCount = 0; ?>
       
      
        <tr>
            <td ><?php echo   $i; ?></td>
           <!-- <td style="text-align:center;"><?php //if(!empty($savedtOrder[$i]->order_id)){ echo   $savedtOrder[$i]->order_id;} else {echo 'N/A';}?></td>-->
		   
		  <td style="text-align:center;"><?php if (!empty($savedtOrder[$i]->order_random_id)) {
                echo   $savedtOrder[$i]->order_random_id;
            } else {
                echo 'N/A';
            } ?></td>
		  <td style="text-align:center;"><?php for ($v = 1; $v<11;$v++) {
                // echo"<pre>"; print_r(${'product_'.$v});
                $order_name = 'order_name_'.$v;
                if ($savedtOrder[$i]->$order_name!='') {
                    // echo "<pre>"; print_r(${'product_'.$v});
                    $productCount++;
                }
            };
            echo $productCount;
            echo' products'; ?></td>
<!-- <td  style="text-align:center;"><?php if ($savedtOrder[$i]->is_Request_order_again==1) {
                echo 'Re-Order';
            } else {
                echo 'New-Order';
            } ?>    </td> -->
      <td style="text-align:center;"><?php if ($productCount>2) {
                echo $savedtOrder[$i]->order_name_1;
                echo ', ';
                echo $savedtOrder[$i]->order_name_2;
                echo' etc';
            } elseif ($productCount>1) {
                echo $savedtOrder[$i]->order_name_1;
                echo ', ';
                echo $savedtOrder[$i]->order_name_2;
            } else {
                echo $savedtOrder[$i]->order_name_1;
            } ?></td>
      <td  style="text-align:center;"><?php if (!empty($savedtOrder[$i]->prefer_delivery_data)) {
                echo $savedtOrder[$i]->prefer_delivery_data;
            } else {
                echo 'N/A';
            } ?>    </td>
      <!-- offer from supplier -->
      <td  style="text-align:center;" ><?php if (!empty($savedtOrder[$i]->sent_number_ofSupplier_request !=0)) {
          $offerNumber = 0;
          for($j=0; $j<count($offerCount);$j++){
            if(intval($offerCount[$j]->order_id) === intval($savedtOrder[$i]->order_id)){
              if($offerCount[$j]->form_status == 1){$offerNumber++;}
              
            }
          }
            echo $offerNumber;
         
            } else {
                echo '0'.' '.'Offers';
            } ?>  </td>
      <td  style="text-align:center;"><a  href="<?php echo base_url('buyer/viewOrder/'.$savedtOrder[$i]->order_id); ?>" >Order details</a> | <a  onclick="cancelOrder(<?php echo $savedtOrder[$i]->order_id; ?>)" href="javascript:void(0);" class="delete">Cancel</a></td>
        </tr>
      <?php
        }
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
      <?php //pr($RequestQuotesPr);?>
       <?php if (!empty($RequestQuotesP)) {
      ?>
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
      <?php
  } else {
      ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php
  } ?>  
   
        
    </tbody>
</table>
-->

</table>
    <script>
      $(document).ready(function(){
  $("#orderTable").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
    </script>
  
    





   
 
  


