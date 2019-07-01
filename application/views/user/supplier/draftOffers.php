<a href="<?php echo base_url('supplier/dashboard');?>">New Orders and Marked offers</a><span> | </span><a href="<?php echo base_url('supplier/draftOffers');?>" style="font-size:18px; color:black;"> Draft Offers</a>

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

<script src='https://code.jquery.com/jquery-1.12.3.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<script>
$(document).ready(function(){
	$("#example").DataTable({});
});
</script>