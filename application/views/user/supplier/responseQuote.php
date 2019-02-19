<?php 
	if($this->session->flashdata('msg')){
		echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
	}

?>
<div class="forn-respond">
	<form class="needs-validation" method="post" name="reponse_quote" id="reponse_quote">
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Product Name:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip01" placeholder="Barbed Wire" value="<?php echo (isset($RequestQuoteData->product_name))? $RequestQuoteData->product_name : "" ;   ?>" disabled>
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Serial Number:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip02" placeholder="689-691" value="<?php echo (isset($RequestQuoteData->serial_no))? $RequestQuoteData->serial_no : "" ; ?>"disabled>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip03" class="prod-label">Size:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip03" placeholder="18.5mm*500mm" disabled value="<?php echo (isset($RequestQuoteData->size))? $RequestQuoteData->size : "" ; ?>">
			</div>
			<div class="col-md-6 pt-3 prod-name">
				<label for="validationServer04" class="prod-label">Color:</label>
					<select class="custom-select is-valid color prod-input" id="validationServer04" disabled>
					<option value="1" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='1'){ ?> selected="selected" <?php } ?>>Blue</option>
	              	<option value="2" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='2'){ ?> selected="selected" <?php } ?>>Red</option>
	              	<option value="3" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='3'){ ?> selected="selected" <?php } ?>>Green</option>
	              	<option value="4" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='4'){ ?> selected="selected" <?php } ?>>Yellow</option>             
	              	<option value="5" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='5'){ ?> selected="selected" <?php } ?>>Pink</option>
	              	<option value="6" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='6'){ ?> selected="selected" <?php } ?>>Black</option>
	              	<option value="7" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='7'){ ?> selected="selected" <?php } ?>>White</option>
	              	<option value="8" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='8'){ ?> selected="selected" <?php } ?>>Orange</option>
	              	<option value="9" <?php if(isset($RequestQuoteData) && !empty($RequestQuoteData->color) && $RequestQuoteData->color=='9'){ ?> selected="selected" <?php } ?>>Grey</option>
					</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="quantity"class="prod-label">Quantity:</label>
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($RequestQuoteData->quantity))? $RequestQuoteData->quantity : "" ; ?>">
			</div>
			<div class="col-md-6 mb-3 prod-name">

			</div>
		</div>
		<div class="row">
            <div class="col-md-12  mb-3 prod-name">
				<label for="comment" class="prod-label">Description:</label>
				<textarea class="form-control is-valid prod-text" rows="4" id="comment" disabled placeholder="Build responsive, mobile-first projects on the web with the world's most popular front-end component library."><?php echo (isset($RequestQuoteData->description))? $RequestQuoteData->description : "" ; ?></textarea>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Date Required:</label>
			  <input type="date" class="form-control prod-input" id="validationTooltip01" placeholder="Barbed Wire" disabled value="<?php echo (isset($RequestQuoteData->date))? $RequestQuoteData->date : "" ;?>">
			</div>
			<div class="col-md-6 mb-3 prod-name">

			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
				<?php 

        			$CI =& get_instance();
        			$CI->load->model('user'); 
        			$UserData = $CI->user->get_user((isset($RequestQuoteData->user_id) && !empty($RequestQuoteData->user_id))? $RequestQuoteData->user_id : "" ); 
        			//pr($UserData);    
      			?>
			  <label for="validationTooltip01" class="prod-label">Buyer:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip01" placeholder="Fred's Farm" disabled value="<?php echo (isset($UserData->name))? $UserData->name : "" ;?>">
			</div>
			<div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Location:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip02" placeholder="Fig TreePocket,4069QLD" disabled value="<?php echo isset($UserData->address) && !empty($UserData->address) ? $UserData->address : '' .', '.isset($UserData->city) && !empty($UserData->city) ? $UserData->city : ''.','.isset($UserData->state) && !empty($UserData->state) ? $UserData->state : ''.', '.isset($UserData->country) && !empty($UserData->country) ? $UserData->country : '' .', '.isset($UserData->zipCode) && !empty($UserData->zipCode) ? $UserData->zipCode : ''; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3 prod-name">
			  <label for="quote_value" class="prod-label">Quote Value:</label>
			  <input type="number" class="form-control prod-input" id="quote_value" placeholder="Enter Quote Value Per Quantity" required value="">
			</div>
			<div class="col-md-6 mb-3 prod-name">

			</div>
		</div>
		
		<div class="row prod-table-row">
			<div class="col-md-12 mb-3 prod-name">
			    <label for="validationTooltip02" class="prod-label1">Items:</label>
				<table class="table prod-table">	
				    <thead class="prod-head">
						<tr>
						  <th scope="col">Serial No.</th>
						  <th scope="col">Iteam Description</th>
						  <th scope="col">Quantity</th>
						  <th scope="col">Size</th>
						  <th scope="col">Brand</th>
						</tr>
					 </thead>
					<tbody  class="prod-body">	
						<tr>
						  <th><?php echo (isset($RequestQuoteData->serial_no))? $RequestQuoteData->serial_no : "" ; ?></th>
						  <th><?php echo (isset($RequestQuoteData->description))? $RequestQuoteData->description : "" ; ?></th>
						  <th><?php echo (isset($RequestQuoteData->quantity))? $RequestQuoteData->quantity : "" ; ?></th>
						  <th><?php echo (isset($RequestQuoteData->size))? $RequestQuoteData->size : "" ; ?></th>
						  <th>Waratah</th>
						</tr>
					 </tbody>
				</table>
			</div>
		</div>
		<div class="row prod-table-row1">
			<div class="col-md-12 mb-3 prod-name1">
			    <label for="validationTooltip02" class="prod-label1">Quote:</label>
				<table class="table prod-table">	
				    <thead class="prod-head">
						<tr>
						  <th colspan="4" class="qt">Quantity</th>
						  <th>Price ea</th>
						  <th>Total Price</th>
						</tr>
					 </thead>
					<tbody class="prod-body">	
						<tr>
						  <th colspan="4" class="qt"><?php echo (isset($RequestQuoteData->quantity))? $RequestQuoteData->quantity : "" ; ?></th>
						  <th id="single_quantity_value"></th>
						  <th id="total_quantity_value"></th>
						</tr>
					 </tbody>
				</table>
			</div>
		</div>
		<div class="sub-t">
			<button class="btn btn-sub" type="submit">SUBMIT QUOTES</button>
			<button class="btn btn-quotes" data-toggle="modal" data-target="#rejectStatus" type="button">NO QUOTES</button>
	    </div>
	</form>
</div>
<!-- Modal -->
<div class="modal fade" id="rejectStatus" tabindex="-1" role="dialog" aria-labelledby="rejectStatusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form method="post" name="status_rejected" id="status_rejected">
	    <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<p id="reply_status_msg"></p>
	       		<input type="hidden" name="RequestQuoteID" id="RequestQuoteID" value="<?php echo !empty($RequestQuoteData->id) ? $RequestQuoteData->id : '' ; ?>">
	       		<input type="hidden" name="user_id" id="user_id" value="<?php echo !empty($RequestQuoteData->user_id) ? $RequestQuoteData->user_id : ''; ?>">
	            <div class="col-md-12  mb-3 prod-name">
					<label for="comment" class="prod-label">Reject Reason:</label>
					<textarea class="form-control is-valid prod-text" rows="4" name="rejected_reason" id="rejected_reason" placeholder="Please justify your reason, why do you want to reject?" required></textarea>
				</div>			
		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sub" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-quotes">Reject</button>
	      </div>
	    </div>
	</form>
  </div>
</div>
