<a href="<?php echo base_url('supplier/dashboard');?>">BACK</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } 

//pr($viewOfferOrder);

?>
<h2>Make Offer for all order request</h2>
<div class="container">
</div>

<div class="offer_form">
<form  action="<?php echo base_url('/supplier/markedsAllOffer')?>" method="post">
	<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Price:</label>
			  <input type="hidden" name="offerids" value="<?php echo $string;?>" >
			  
			  <input type="text" class="form-control prod-input" placeholder="price" name="price" id="validationTooltip01" placeholder="Barbed Wire" value="">
			 <span class="error" style="color:red;" ><?php echo form_error('price');?></span>
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Insurance:</label>
			  
			  	<!--<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number');?></span>
			  -->
			
		
			  <input type="text" class="form-control prod-input" name="insurance"  id="validationTooltip02" placeholder="y Or N" value=" " placeholder="Y or N">
			  		<span class="error" style="color:red;" ><?php echo form_error('insurance');?></span>
			</div>
		</div>
	
		<input type="hidden" placeholder="payment status"  value="0" name="payment_status">
			<!--<span class="error" style="color:red;" ><?php echo form_error('payment_status');?></span>-->
		
		<div class="row">
            <div class="col-md-12  mb-3 prod-name">
				<label for="comment" class="prod-label">Payment term:</label>
				
			<select class="form-control prod-input" name="payment_term">
				  <option value="Pre-pay">Pre-pay</option>
				  <option value="Pay & Collect">Pay & Collect</option>
				  <option value="Pay & Delivery">Pay & Delivery</option>
			</select>
		 <span class="error" style="color:red;" ><?php echo form_error('payment_term');?></span>
			</div>			
		</div>
		
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="quantity" class="prod-label">Apply Offer:</label>
		
<input class="btn btn-primary submitBtn"  type="submit"  name="submit" placeholder="submit" style="width:25%;padding:8px 12px ;">
			  
			  
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Apply Offer Save as draft:</label>
			  <input type="submit"  class="btn btn-primary submitBtn" name="submit_as_draft" value="save as draft" placeholder="">
			<a href="cancel"></a>
			</div>
		</div>	
	
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
  
    