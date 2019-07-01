  <link href="https://libraries.cdnhttps.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="https://raw.githubusercontent.com/lipis/bootstrap-sweetalert/master/dist/sweetalert.js" ></script>
<h1 class="o-order">Draft Orders</h1>
<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order no.</th>
      <th scope="col">Orders</th>
      <th scope="col">Delivery Date</th>
      <th scope="col">Action</th>     
    </tr>
    </thead>
    <tbody>
  <?php if(!empty($draftOrder)){
    for($i=0;$i< count($draftOrder); $i++){  ?>
     
    
      <tr><td ><?php echo   $i;?></td>
     <!-- <td style="text-align:center;"><?php //if(!empty($draftOrder[$i]->order_id)){ echo   $draftOrder[$i]->order_id;} else {echo 'N/A';}?></td>-->
	<td style="text-align:center;"><?php if(!empty($draftOrder[$i]->order_random_id)){ echo   $draftOrder[$i]->order_random_id;} else {echo 'N/A';}?></td>
    <td style="text-align:center;"><?php if(!empty($draftOrder[$i]->order_name)){ echo   $draftOrder[$i]->order_name;} else {echo 'N/A';}?></td>
      <td  style="text-align:center;"><?php if(!empty($draftOrder[$i]->prefer_delivery_data)){ echo $draftOrder[$i]->prefer_delivery_data;} else {echo 'N/A';}?>  </td>
      <td  style="text-align:center;">
	  <a  href="<?php echo base_url('buyer/editOrder/'.$draftOrder[$i]->order_id);?>"   >Edit</a> | 
      
	  <a href="<?php echo base_url('buyer/PublishOrder/'.$draftOrder[$i]->order_id);?>/<?php echo $draftOrder[$i]->product_assign_category ?>" >Publish</a> | <a href="<?php echo base_url('buyer/cancelOrder/'.$draftOrder[$i]->order_id);?>" data-id="<?php echo $draftOrder[$i]->order_id; ?>" class="delete">Delete</a></td></tr>
      <?php }
  } 
  else 
  { ?>
       <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
<?php } ?>  
    </tbody>
</table>


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 
$(document).ready(function(){
    $('.delete').on('click', function(e){
        e.preventDefault(); //cancel default action
         var id = $(this).data('id');
		 //alert(id);
		 
		 
        //Recuperate href value
      //  var href = $(this).attr('href');
         var message = $(this).data('confirm');

        //pop up
        swal({
            title: "Are you sure to delete this draft order/offer?",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
         if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
	  
    });
	
		$.ajax({
		url: "<?php echo site_url(); ?>/buyer/cancelOrder",
		type: "post",
		data: {  "id": id,
		"_token": "{{ csrf_token() }}"} ,
		dataType: 'json' ,
			success: function (respons) {
				if(respons){
					
					//alert(respons);
					
					swal({
					text: "Deleted Successfull !!",
					type: "success",
					icon: "success"
					}).then(function() {
						
					window.location.reload();
					});

				}

			}
	});
	
	
	
  } 
        });
    });
});
 

// $(document).ready(function(){
    // $('.delete').click(function(){
		
// var checkstr =  confirm('are you sure you want to delete this?');
// if(checkstr == true){
 // do your code
  
  // alert('hhhhh');
  
  
// }else{
// return false;
// }
// });
// });
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
});
    </script>
  
    