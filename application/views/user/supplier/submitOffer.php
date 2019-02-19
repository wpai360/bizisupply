<a href="<?php echo base_url('supplier/dashboard');?>">BACK</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>

<div class="container">
 <?php  if(!empty($viewOrder)){
      ?>
<label>Product Name</label> <p><?php if(!empty($viewOrder[0]->order_name)){ echo $viewOrder[0]->order_name; } else { echo 'N/A';} ?></p><br>

<label>Quantity</label> <p><?php if(!empty($viewOrder[0]->order_name)){ echo $viewOrder[0]->order_name; } else { echo 'N/A';}; ?></p><br>
<label>Brand Name</label> <p><?php if(!empty($viewOrder[0]->brand_name)){ echo $viewOrder[0]->brand_name; } else { echo 'N/A';} ?></p><br>
<label>Part Number</label> <p><?php if(!empty($viewOrder[0]->order_name)){ echo $viewOrder[0]->order_name; } else { echo 'N/A';} ?></p><br>
<label>Prefer Delivery Date</label> <p><?php if(!empty($viewOrder[0]->prefer_delivery_data)){ echo $viewOrder[0]->prefer_delivery_data; } else { eCho 'N/A';} ?></p><br>


<?php } ?>


</div>
<?php //echo validation_errors(); ?>
<div class="offer_form">
<form  action="" method="post">

			<input type="test" placeholder="price" name="price">
			<span class="error" style="color:red;" ><?php echo form_error('price');?></span>
			<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number');?></span>
			<input type="hidden" placeholder="payment status"  value="0" name="payment_status">
			<!--<span class="error" style="color:red;" ><?php echo form_error('payment_status');?></span>-->
			<input type="test" placeholder="insurance" name="insurance">
			<span class="error" style="color:red;" ><?php echo form_error('insurance');?></span>
			<select name="payment_term">
				  <option value="Pre-pay">Pre-pay</option>
				  <option value="Pay & Collect">Pay & Collect</option>
				  <option value="Pay & Delivery">Pay & Delivery</option>
			</select>
			
			<span class="error" style="color:red;" ><?php echo form_error('payment_term');?></span>
			<input type="test" placeholder="description" name="description">
			<span class="error" style="color:red;" ><?php echo form_error('description');?></span>
			<input type="submit"  name="submit" placeholder="submit">
			<input type="submit"  name="submit_as_draft" value="save as draft" placeholder="save as draft">
			<a href="cancel"></a>



</form>
</div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.delete').click(function(){
var checkstr =  confirm('are you sure you want to delete this?');
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
});
    </script>
  
    