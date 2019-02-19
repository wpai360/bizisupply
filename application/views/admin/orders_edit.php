<?php 
    if($this->session->flashdata('msg')){
      echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
    }
    //pr($Order);
?>
<div class="forn-respond">
	<form class="form-horizontal formPost prod-form" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="row">
		        <div class="col-md-6 mb-3 prod-name">
		          <label for="validationTooltip01" class="prod-label">Product Name:</label>
		          <p> <?php echo $Order->product_name; ?></p>
		        </div>
	        	<div class="col-md-6 mb-3 prod-name">
		        	<label for="validationTooltip02" class="prod-label">Serial Number:</label>         
		          	<p> <?php echo $Order->serial_no; ?></p>
	        	</div>
	    	</div>
	    	<div class="row">
		      	<div class="col-md-6 mb-3 prod-name">
		        	<label for="validationTooltip03" class="prod-label">Size:</label>
		         	<p> <?php echo $Order->size; ?></p>
		    	</div>
      		  	<div class="col-md-6 pt-3 prod-name">
        			<label for="validationServer04" class="prod-label">Color:</label>
        			<p>        				
        				<?php
		                	if($Order->color=='1'){
		                    	echo "Blue";
		                  	}elseif($Order->color=='2'){
		                    	echo "Red";
		                  	}elseif($Order->color=='3'){
		                    	echo "Green";
		                  	}elseif($Order->color=='4'){
		                    	echo "Yellow";
		                  	}elseif($Order->color=='5'){
		                    	echo "Pink";
		                  	}elseif($Order->color=='6'){
		                    	echo "Black";
		                  	}elseif($Order->color=='7'){
		                    	echo "White";
		                  	}elseif($Order->color=='8'){
		                    	echo "Orange";
		                  	}elseif($Order->color=='9'){
		                    	echo "Grey";
		                  	} 
		                ?>
        			</p>
      			</div>
    		</div>
    		<div class="row">
		      <div class="col-md-6 mb-3 prod-name">
		        <label for="validationTooltip05" class="prod-label">Quantity:</label>
		         <p> <?php echo $Order->quantity; ?></p>
		      </div>
		      <div class="col-md-6 pt-3 prod-name">
		        <label for="validationServer06" class="prod-label">Brands:</label>
		        <p>  <?php 
			          $brandExp = explode(',', $Order->brand);
	                  $brand ="";
	                  if (in_array("1", $brandExp)){
	                    $brand .= "Cyclone,";                 
	                  }if(in_array("2", $brandExp)){
	                    $brand .= "Herdsman,";
	                  }if(in_array("3", $brandExp)){
	                    $brand .= "OK,";
	                  }if(in_array("4", $brandExp)){
	                    $brand .= "Redbrand,";
	                  }if(in_array("5", $brandExp)){
	                    $brand .= "Sheffield,";
	                  }if(in_array("6", $brandExp)){
	                    $brand .= "Waratah";
	                  }
	                  echo $brand; 
                  ?></p>
		      </div>
		    </div>
    		<div class="row">   
      			<div class="col-md-6 pt-3 prod-name">
			        <label for="validationServer07" class="prod-label">Category:</label>
			         <p><?php echo $category->name; ?> </p>
			    </div>
		      	<div class="col-md-6 pt-3 prod-name">
		        <label for="validationServer08" class="prod-label">Types:</label>
		        <p><?php echo $type->name;  ?> </p> 
		      </div>
    		</div>
    		<div class="row">
		        <div class="col-md-6 mb-3 prod-name">
		          <label for="validationTooltip09" class="prod-label">Description:</label>
		          <p> <?php echo $Order->description; ?></p>
		        </div>
	        	<div class="col-md-6 mb-3 prod-name">
		        	<label for="validationTooltip10" class="prod-label">Date :</label>         
		          	<p> <?php echo date("d M Y", strtotime($Order->date)); ?></p>
	        	</div>
	    	</div>
	    	<div class="row">
		        <div class="col-md-6 mb-3 prod-name">
		          <label for="validationTooltip09" class="prod-label">Supplier:<br><p><?php  echo (isset($supplier_msg) && !empty($supplier_msg))? $supplier_msg : "";?></p></label>
		            <select name="supplier" class="form-control custom-select is-valid color prod-input" id="validationServer11">
			            <option value ="">Select Supplier</option>
			            <?php			          
			            foreach ($UserNames as $key => $UserNameVal) { ?>
			            <option value ="<?php echo $UserNameVal->id; ?>" <?php 
			            	if(($Order->status=='processed') && ($Order->admin_assign_supplier==$UserNameVal->id)){ ?> selected="selected" <?php } ?> ><?php echo $UserNameVal->name; ?></option> 
			          <?php } ?>
			        </select>
			          <?php echo form_error('supplier');?>
		        </div>
	        	<div class="col-md-6 mb-3 prod-name">
		        	
	        	</div>
	    	</div>
	    	<div class="row">
		        <div class="col-md-6 mb-3 prod-name">
		          <div class="sub-t">        
          			<button type="submit" name="OrderProcessed" class="btn btn-sub">Add Supplier</button>      
        		  </div>
		        </div>
	    	</div>
	    </div>
  	</form>
</div>