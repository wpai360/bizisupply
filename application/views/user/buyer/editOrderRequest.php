<?php //http://jsfiddle.net/lemonkazi/re8e2yov/ ?>
<style>
/* #ui-datepicker-div { font-size: 12px; }   */
body {
    padding: 20px;
}

label {
    display: block;
}

input.error {
    border: 1px solid red;
}

label.error {
    font-weight: normal;
    color: red;
}

button {
    display: block;
    margin-top: 20px;
}
</style>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php }?>
<form  id="form" action="" Method="post" enctype="multipart/form-data"> 

<div class="row-outdoor-container width-100">
   <div class="add-row-outdoor row width-100 padding-left-15">
    <div class="form-group col-md-4">
     <input type="hidden" name="order_id" value= "<?php echo $getOrderDetails[0]->order_id;?>">

	  <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container">
       <input required type="text" name="brand_name"  placeholder="Brand name"/ value="<?php echo $getOrderDetails[0]->brand_name;?>">
      </div> 
	 
  <label for="state" class="control-label">Product</label>
      <div class="sg-select-container">
       <input required type="text" name="product"  value="<?php echo $getOrderDetails[0]->order_name;?>" placeholder="product"/>
      </div>
	  
	   <label for="state" class="control-label">Part Number</label>
      <div class="sg-select-container">
       <input  required type="text" name="partNumber"  value="<?php echo $getOrderDetails[0]->order_name;?>" id="partNumber" placeholder="partNumber"/>
      </div> 
	  
	  <label for="state" class="control-label">Category:</label>
      <div class="sg-select-container">
			<select name="category" required>
				<option value ="">Select Category</option>
					<?php
				
					
					if(!empty($category)){
					foreach ($category as $categoryValue) { ?>
					<option <?php echo set_select('category', $categoryValue->id); if($getOrderDetails[0]->product_assign_category ==$categoryValue->id) { echo 'selected';}?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
				</option>
			<?php }
			}
			?>            
			</select>
      </div>
	  
	  
	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container">
       <input required type="text" name="quantity" value="<?php echo $getOrderDetails[0]->order_name;?>" id="quantity" placeholder="quantity"/>
      </div>
	  
	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" name="prefer_delivery_date" value="<?php echo $getOrderDetails[0]->prefer_delivery_data;?>"  class="date1" placeholder="prefer_delivery_date"/>
      </div>
	  
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <input  required type="text" name="description"  value="<?php echo $getOrderDetails[0]->order_description;?>"id="description" placeholder="description"/>
      </div>
    </div><!-- end col -->
	 <input type="submit" name="submit" value="Publish Order">
<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>
  </div><!-- row audit -->
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){

 $('.cancel').click(function(){
var checkstr =  confirm('are you sure you want to cancel this?');
if(checkstr == true){
  // do your code
}else{
return false;
}
});


/* $('#form').validate({
        onclick: false, // <-- add this option
        rules: {
            product: "required"
        },
        messages: {
            product: {
                required: "The product is required!"
            }
        },
        errorPlacement: function (error, element) {
            alert(error.text());
        }
    });
 */


  $("#form").validate({
        rules: {
            "product": {
                required: true,
               // minlength: 5
            }, 
			"partNumber": {
                required: true,
               // minlength: 5
            },
			"category": {
                required: true,
               // minlength: 5
            },
			"prefer_delivery_date": {
                required: true,
               // minlength: 5
            },
			"description": {
                required: true,
               // minlength: 5
            },
            "quantity": {
                required: true,
                
            }
        },
        messages: {
            "product": {
                required: "Please, enter a product name"
            },
			"partNumber": {
                required: "Please, enter a Part Number"
            },
			"category": {
                required: "Please, enter a Category"
            },
			"prefer_delivery_date": {
                required: "Please, enter a prefer delivery date"
            },
			"description": {
                required: "Please, enter a description"
            },
            "quantity": {
                required: "Please, enter an email",
                quantity: "Email is invalid"
            }
        },
        submitHandler: function (form) { // for demo
            //alert('valid form submitted'); // for demo
			var serializeForm= $(form).serializeArray() 
			console.log(serializeForm);
	var url ='<?php base_url('/buyer/updateOrder')?>';
	 /*  $.ajax({
           type: "POST",
           url: url,
           data: serializeForm, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         }); */

    e.preventDefault(); // avoid to execute the actual submit of the form. */
			
			
			
			
			
			
			
			
			
			
            return false; // for demo
        }
    }); 
 


});
</script>
