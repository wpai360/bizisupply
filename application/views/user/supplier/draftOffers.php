<h1 class="o-order">Draft order list</h1>
<a class="btn btn-outline-secondary " role="button" href="<?php echo base_url('supplier/dashboard');?>" data-intro='Here is the new order you recevied' style="font-size:18px;" >New Offers</a><span> | </span><a class="btn btn-primary" role="button" href="<?php echo base_url('supplier/draftOffers');?>"> Draft Offers</a>

<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>
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
            <td style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->order_random_id)){ echo   $supplierOfferlist[$i]->order_random_id;} else {echo 'N/A';}?></td>
            <td style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->order_name)){ echo   $supplierOfferlist[$i]->order_name;} else {echo 'N/A';}?></td>
            <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->quantity)){ echo $supplierOfferlist[$i]->quantity;} else {echo 'N/A';}?>    </td>
            <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->prefer_delivery_data)){ echo $supplierOfferlist[$i]->prefer_delivery_data;} else {echo 'N/A';}?></td>
           <!-- <td  style="text-align:center;"><?php if(!empty($supplierOfferlist[$i]->payment_terms)){ echo $supplierOfferlist[$i]->payment_terms;} else {echo 'N/A';}?></td>-->
               <td  style="text-align:center;"><a  href="<?php echo base_url('supplier/PublishOffer/'.$supplierOfferlist[$i]->offer_id);?>" >Publish</a></td>
        </tr>
      <?php }?>
		
	  <?php } ?>

    </tbody>
	<tr>	
		<td style="text-align:center;"></td>
		<td style="text-align:center;"></td>
		<td  style="text-align:center;">  </td>
		<td  style="text-align:center;"></td>
		<td  style="text-align:center;"></td>
	</tr>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.cancel').click(function(){
var checkstr =  confirm('are you sure to cancel this order?');
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
	$("#example").DataTable({});
});
</script>