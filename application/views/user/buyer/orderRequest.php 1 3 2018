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
input.file-2 {
    display: block !important;
    z-index: 1;
    position: relative;
    background: transparent;
    padding: 0;
    opacity: 1 !important;
    cursor: pointer;
    width: 100% !important;
    height: 17px;
    top: -5px;
}
</style>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>
<form  action=""  method="post"  enctype="multipart/form-data" novalidate>

<div class="row-outdoor-container width-100">
  <div class="add-row-outdoor row width-100 padding-left-15">
    <div class="form-group col-md-4">
     

  <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container">
       <input required type="text" name="brand_name[]"  placeholder="Brand name"/>
      </div> 
	  
	  <label for="state" class="control-label">Product</label>
      <div class="sg-select-container">
       <input required type="text" name="product[]"  placeholder="product"/>
      </div>
	  
	   <label for="state" class="control-label">Part Number</label>
      <div class="sg-select-container">
       <input  required type="text" name="partNumber[]" id="partNumber" placeholder="partNumber"/>
      </div> 
	  
	  <label for="state" class="control-label">Category:</label>
      <div class="sg-select-container">
			<select name="category[]" required>
				<option value ="">Select Category</option>
					<?php
					if(!empty($category)){
					foreach ($category as $categoryValue) { ?>
					<option <?php echo set_select('category', $categoryValue->id); ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
				</option>
			<?php }
			}
			?>            
			</select>
      </div>
	  
	  
	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container">
       <input required type="text" name="quantity[]" id="quantity" placeholder="quantity"/>
      </div>
	  
	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" name="prefer_delivery_date[]" class="date1" placeholder="prefer_delivery_date"/>
      </div>
	  
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <input  required type="text" name="description[]" id="description" placeholder="description"/>
      </div>
	 <!-- <label for="state" class="control-label">Select images:</label>
      <div class="sg-select-container">
      <input type="file" name="product_image[]" class="file-2" multiple>
      </div>-->
    </div><!-- end col -->

    <div class="form-group col-md-4 choose-outdoor-is-hidden" style="display: none;">
      <label for="other-textfield" class="control-label">Other</label>
      <input type="text" class="form-control form-input-field" name="other-textfield" value=""  placeholder="">
      <span class="help-block"></span>
    </div>
<input type="submit" name="submit" value="submit">
<input type="submit" name="Save_As_Draft" value="Save As Draft">
    <a href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>
  </div><!-- row audit -->
</div>
</form>

<div class="row row-audit-space-btn">
  <button class="btn btn-add-waste adRowOutdoor">
    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i>Add Request</button>
   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){

 $(".adRowOutdoor").click(function(){
 var newTxtHtml = " <label for='state' class='control-label'>Brand Name</label><div class='sg-select-container'><input required type='text' name='brand_name[]'  placeholder='product'/></div> <label for='state' class='control-label'>Product</label><div class='sg-select-container'><input  required class='' type='text' name='product[]' id='product' placeholder='product'/></div><label for='state' class='control-label'>Category:</label><div class='sg-select-container'><select name='category[]'><option value =''>Select Category</option><?php if(!empty($category)){ foreach ($category as $categoryValue) { ?><option <?php echo set_select('category', $categoryValue->id); ?> value ='<?php echo $categoryValue->id; ?>'><?php echo $categoryValue->name; ?></option><?php }}?></select></div><label for='state' class='control-label'>Part Number</label><div class='sg-select-container'><input  required class='' type='text' name='partNumber[]' id='partNumber' placeholder='partNumber'/></div><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input  required class='' type='text' name='quantity[]' id='quantity' placeholder='quantity'/></div><label for='state' class='control-label'>Prefer Delivery date</label> <div class='sg-select-container'><input  required class=''  type='date' name='prefer_delivery_date[]' class='date1ss' placeholder='prefer_delivery_date'/></div><label for='state' class='control-label'>Description</label><div class='sg-select-container'><input required class='' type='text' name='description[]' id='description' placeholder='description'/></div>"; 
var newTxt = $('<div class="add-row-outdoor row width-100 padding-left-15"> '+newTxtHtml+'<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-add-waste removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove</button> </div> </div><!-- row audit -->');
    //$(".row-outdoor-container").attach(newTxt); 
    $(".row-outdoor-container").append($(newTxt));
});
$("body").on('click' , '.removeOutdoor' , function(){
      var curRow = $(this).parents('div.add-row-outdoor');
      curRow.remove();
});

// the selection functionality - does not work for other divs
$('.row-outdoor-container').on("change", '.choose-outdoor', function (e) {
	var val = $(this).val();
  $el = $(this).closest(".add-row-outdoor").find('.choose-outdoor-is-hidden');
	if (val == 'other') {
  	$el.show();
	} 
	// Hide complete sub type div
	else {
		$el.hide();
	}
});


  
     /*  $('.date1').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "m/d/yy"
}); */

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

/* 
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
                email: true
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
            return false; // for demo
        }
    }); 
 */


});
</script>
