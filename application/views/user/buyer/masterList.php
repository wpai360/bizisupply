

<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>

<button type="button" class="btn btn-primary">Add product to master list</button>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
			
    <tr class="ref">
      <th scope="col">Master ID</th>
			<th scope="col">Category Name</th>
			<th scope="col">Product Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Item Number</th> 
      <th scope="col">Received Best Price</th>    
      <th scope="col">Actions</th>  
    </tr>
    </thead>

    <tbody>
      <?php 	 

 //pr($allOrderHistory); ?>
    <?php 
	   if(!empty($masterList)){
	  $i=0;
	   foreach($masterList as $requestInSupply){

	    ?>
      <tr>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->master_id)){ echo $requestInSupply->master_id;} else {echo 'N/A';};?></td>
		  <td  style="text-align:center;"><?php if(!empty($requestInSupply->name)){ echo $requestInSupply->name;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->order_name)){echo $requestInSupply->order_name;} else {echo 'N/A';}?>
		  </td>
		  <td style="text-align:center;"><?php if(!empty($requestInSupply->brand_name)){echo $requestInSupply->brand_name;} else {echo 'N/A';}?>
		  </td>
		  
			<td style="text-align:center;"><?php if(!empty($requestInSupply->part_number)){echo $requestInSupply->part_number;} else {echo 'N/A';}?></td>
      
      <td style="text-align:center;"></td>
      <td  style="text-align:center;">
	  <a  href="<?php echo base_url('buyer/editOrder/'.$draftOrder[$i]->order_id);?>"   >Edit</a> | 
      <a href="<?php echo base_url('buyer/cancelOrder/'.$draftOrder[$i]->order_id);?>" data-id="<?php echo $draftOrder[$i]->order_id; ?>" class="delete">Delete</a></td>
		  
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
  
    





   
 
  


