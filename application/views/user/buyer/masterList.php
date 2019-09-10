

<?php  if($this->session->flashdata('message')){?>        
<?php echo $this->session->flashdata('message')?>
<?php } ?>

<style>

.modal{

}

</style>

<!-- Add master product-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#masterModal">
  Add Product to MasterList
</button>

<!-- Modal -->
<div class="modal fade" id="masterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center">
      <input type="text" placeholder="Category">
      <input type="text" placeholder="Product Name">
      <input type="text" placeholder="Brand Name ">
      <input type="text" placeholder="Item Number">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Product</button>
      </div>
    </div>
  </div>
</div>


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
	   foreach($masterList as $master){
      $i++;
	    ?>
      <tr>
		  <td  style="text-align:center;"><?php if(!empty($master->master_id)){ echo $i;} else {echo 'N/A';};?></td>
		  <td  style="text-align:center;"><?php if(!empty($master->name)){ echo $master->name;} else {echo 'N/A';}?></td>
		  <td style="text-align:center;"><?php if(!empty($master->order_name)){echo $master->order_name;} else {echo 'N/A';}?>
		  </td>
		  <td style="text-align:center;"><?php if(!empty($master->brand_name)){echo $master->brand_name;} else {echo 'N/A';}?>
		  </td>
		  
			<td style="text-align:center;"><?php if(!empty($master->part_number)){echo $master->part_number;} else {echo 'N/A';}?></td>
      
      <td style="text-align:center;"></td>
      <td  style="text-align:center;">
	  <a  href="<?php echo base_url('buyer/editMaster/'.$master->master_id);?>"   >Edit</a> | 
      <a href="<?php echo base_url('buyer/deleteMaster/'.$master->master_id);?>" class="delete">Delete</a></td>
		  
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
  
    





   
 
  


