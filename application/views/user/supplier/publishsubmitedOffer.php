<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } 

//pr($viewOffer);
$viewOfferOrder=$viewOffer;
?>
<div class="container">
</div>
<div class="offer_form">
<form  action="" method="post">
<div class="row">
			 <div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Product Name:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip01" placeholder="Barbed Wire" value="<?php echo (isset($viewOfferOrder[0]->order_name))? $viewOfferOrder[0]->order_name : "" ;   ?>" disabled>
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Part Number:</label>
			  
			  	<!--<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number');?></span>
			  -->
			  <input type="text" class="form-control prod-input" name="part_number"  id="validationTooltip02"  value="<?php echo (isset($viewOfferOrder[0]->part_number))? $viewOfferOrder[0]->part_number : "" ; ?>"  readonly>
			</div>
		</div>
		
	<div class="row">
		<div class="col-md-6 mb-3 prod-name">
			  <label for="quantity"class="prod-label">Quantity:</label>
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->quantity))? $viewOfferOrder[0]->quantity : "" ; ?>">
	</div>
			
	<div class="col-md-6 mb-3 prod-name">
			  <label for="prefer_delivery_data"class="prod-label">Prefer delivery data:</label>
			  <input type="text" class="form-control prod-input" id="prefer_delivery_data" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->prefer_delivery_data))? $viewOfferOrder[0]->prefer_delivery_data : "" ; ?>">
	</div>
	</div>	
			
	<div class="row">
		<div class="col-md-6 mb-3 prod-name">
		  <label for="brand_name"class="prod-label">Brand name:</label>
		  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->brand_name))? $viewOfferOrder[0]->brand_name : "" ; ?>">
	</div>
			
    <div class="col-md-6 mb-3 prod-name">
				<label for="comment" class="prod-label">Description:</label>
				
					<input type="hidden" placeholder="description" name="description" value="<?php if(!empty($viewOfferOrder[0]->order_description)) { echo $viewOfferOrder[0]->order_description;} else { echo 'N/A';}?>">
		 <span class="error" style="color:red;" ><?php echo form_error('description');?></span> 
				<textarea class="form-control is-valid prod-text" rows="4" id="comment" disabled placeholder="Build responsive, mobile-first projects on the web with the world's most popular front-end component library."><?php echo (isset($viewOfferOrder[0]->order_description))? $viewOfferOrder[0]->order_description : "" ; ?></textarea>
			</div>			
		</div>
		
	<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="name"class="prod-label">Buyer name:</label>
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->name))? $viewOfferOrder[0]->name : "" ; ?>">
			</div>
			
			<div class="col-md-6 mb-3 prod-name">
			  <label for="city"class="prod-label">City</label>
			  <input type="text" class="form-control prod-input" id="city" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->city))? $viewOfferOrder[0]->city : "" ; ?>">
			</div>
			
		</div>	
		
		
<?php   if($viewOfferOrder[0]->request_wait_response==1 AND $viewOfferOrder[0]->supplier_accepted_buyer_offer==1){?>

		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="state"class="prod-label">State:</label>
			  <input type="text" class="form-control prod-input" id="state" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->state))? $viewOfferOrder[0]->state : "" ; ?>">
			</div>
			
			<div class="col-md-6 mb-3 prod-name">
			  <label for="country"class="prod-label">Country</label>
			  <input type="text" class="form-control prod-input" id="city" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->country))? $viewOfferOrder[0]->country : "" ; ?>">
			</div>
			
		</div>	
		
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="address"class="prod-label">Address:</label>
			  <input type="text" class="form-control prod-input" id="address" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->address))? $viewOfferOrder[0]->address : "" ; ?>">
			</div>
			
			<div class="col-md-6 mb-3 prod-name">
			  <label for="phone"class="prod-label">phone</label>
			  <input type="text" class="form-control prod-input" id="city" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->phone))? $viewOfferOrder[0]->phone : "" ; ?>">
			</div>
			
		</div>

		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="email"class="prod-label">Buyer Email:</label>
			  <input type="text" class="form-control prod-input" id="email" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->email))? $viewOfferOrder[0]->email : "" ; ?>">
			</div>
			
			<div class="col-md-6 mb-3 prod-name">
			  <label for="ABN"class="prod-label">ABN</label>
			  <input type="text" class="form-control prod-input" id="city" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->ABN))? $viewOfferOrder[0]->ABN : "" ; ?>">
			</div>
			
	</div> 
<?php } ?>
	<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Price:</label>
			  
			  
			  <input type="text" class="form-control prod-input" placeholder="price" name="price" id="validationTooltip01" placeholder="Barbed Wire" value="<?php echo (isset($viewOfferOrder[0]->price_offer))? $viewOfferOrder[0]->price_offer : "" ; ?>">
			 <span class="error" style="color:red;" ><?php echo form_error('price');?></span>
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Insurance:</label>
			  
			  	<!--<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number');?></span>
			  -->
			
		
			  <input type="text" class="form-control prod-input" name="insurance"  id="validationTooltip02" placeholder="y Or N" value="<?php echo (isset($viewOfferOrder[0]->insurance))? $viewOfferOrder[0]->insurance : "" ; ?>" placeholder="Y or N">
			  		<span class="error" style="color:red;" ><?php echo form_error('insurance');?></span>
			</div>
		</div>
	
		<input type="hidden" placeholder="payment status"  value="0" name="payment_status">
			<!--<span class="error" style="color:red;" ><?php echo form_error('payment_status');?></span>-->
		
		<div class="row">
            <div class="col-md-12  mb-3 prod-name">
				<label for="comment" class="prod-label">Payment term:</label>
				
			<select class="form-control prod-input" name="payment_term">
				  <option <?php echo (isset($viewOfferOrder[0]->payment_terms) && $viewOfferOrder[0]->payment_terms=='Pre-pay' )? 'selected' : "" ; ?>value="Pre-pay">Pre-pay</option>
				  <option value="Pay & Collect" <?php echo (isset($viewOfferOrder[0]->payment_terms) && $viewOfferOrder[0]->payment_terms=='Pay & Collect' )? 'selected' : "" ; ?>>Pay & Collect</option>
				  <option value="Pay & Delivery" <?php echo (isset($viewOfferOrder[0]->payment_terms) && $viewOfferOrder[0]->payment_terms=='Pay & Collect' )? 'selected' : "" ; ?>>Pay & Delivery</option>
			</select>
		 <span class="error" style="color:red;" ><?php echo form_error('payment_term');?></span>
			</div>			
		</div>
		
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="quantity" class="prod-label">Publish Offer:</label>
		
<input class="btn btn-primary submitBtn"  type="submit"  value="Publish Offer" name="submit" placeholder="submit" style="width:25%;padding:8px 12px ;">
			  
			  
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Cancel:</label>
			<a  class="btn btn-primary submitBtn"  href="<?php echo base_url('supplier/draftOffers');?>">Cancel</a>
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
  
    