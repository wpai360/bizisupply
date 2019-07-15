<?php //http://jsfiddle.net/lemonkazi/re8e2yov/?>
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
textarea#description {
    width: 72%;
    height: 170px;
    font-size: 16px;
    text-transform: capitalize;
    padding: 5px;

}

select#master_list {
    width: 100%!important;
    line-height: 31px!important;
    padding-left: 10px!important;
    border: 1px solid white!important;
    border-radius: 3px !important;
    margin-bottom: 10px !important;
    padding: 11px!important;
    font-size: 20px!important;
}
div#xxx {
    font-size: 20px;
} 

</style>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
} ?>

<!-- <div class="row row-audit-space-btn">
  <button class="btn btn-add-waste addProduct">
    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i>Add Product</button>   
</div> -->


<div class="sg-select-container" id="xxx" style="color: green;"></div>
<label for="state" class="control-label custom_control_label">Master Listing:</label>
    <div class="sg-select-container">
    <select name="master_list" required id="master_list" onchange="myFunction()">
	<option value ="">Select Product</option>
	<?php
    if (!empty($master_list)) {
        foreach ($master_list as $master_listValue) {
            ?>
	<option <?php echo set_select('buyer_orders', $master_listValue->order_id); ?> value ="<?php echo $master_listValue->order_id; ?>"><?php echo $master_listValue->order_name; ?>
	</option>
	<?php
        }
    }
    ?>            
	</select>
</div>


<form  action=""  method="post"  enctype="multipart/form-data" novalidate>

<div class="row-outdoor-container width-100">
  <div class=" row width-100 padding-left-15">
    <div class="form-group custom_boxshadow col-md-12" style="margin:auto;">
   
    <label for="state" class="control-label custom_control_label">Category:</label>
    <div class="sg-select-container">
    <select name="category[]" required id="Category">
	<option value ="">Select Category</option>
	<?php
    if (!empty($category)) {
        foreach ($category as $categoryValue) {
            ?>
	<option <?php echo set_select('category', $categoryValue->id); ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
	</option>
	<?php
        }
    }
    ?>            
	</select>
<!-- beign of a product row -->
    <div class = "row productrow">
        <div class="col-sm-2">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_1[]" class="product1 custom_input"  placeholder="product" id="product_1"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
                </div>
	
	<?php
       $this->db->from('buyer_orders');
       $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
       $this->db->select('buyer_orders.order_name_1, category.name');
       $querys = $this->db->get()->result();
       
      ?>
            <div class="sg-select-container" id="ct" style="color: red;"></div>
        </div>
	

    <div class="col-sm-2">

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_1[]"  placeholder="Brand name" id="brand_name_1" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-sm-2">
        <label for="state" class="control-label custom_control_label">Part Number</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="part Number" class="custom_input"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-sm-2">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
      <!-- a product row  -->
	  
	  
	   <div class="sg-select-container">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product" value="1"  /> 
	    <p><h4>Save it to your master list?</h4></p>
       </div>

    </div>
<!-- second product row  -->
    <div class = "row productrow">
        <div class="col-sm-2">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_2[]" class="product1 custom_input"  placeholder="product" id="product_1"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
                </div>
	
	<?php
       $this->db->from('buyer_orders');
       $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
       $this->db->select('buyer_orders.order_name_1, category.name');
       $querys = $this->db->get()->result();
       
      ?>
            <div class="sg-select-container" id="ct" style="color: red;"></div>
        </div>
	

    <div class="col-sm-2">

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_2[]"  placeholder="Brand name" id="brand_name_1" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-sm-2">
        <label for="state" class="control-label custom_control_label">Part Number</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_2[]" id="partNumber_1" placeholder="part Number" class="custom_input"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-sm-2">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_2[]" id="quantity_1" placeholder="quantity" class="custom_input"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
      <!-- a product row  -->
	  
	  
	   <div class="sg-select-container">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product" value="1"  /> 
	    <p><h4>Save it to your master list?</h4></p>
       </div>

    </div>

	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" id="prefer_delivery_date" name="prefer_delivery_date[]" class="date1 custom_input" placeholder="prefer_delivery_date"/>
	   
	   <div class="sg-select-container" id="dt" style="
    color: red;
">
      </div>
      </div>
	  
	  <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <textarea  required type="text" name="description[]" id="description" placeholder="description" class="custom_input"/></textarea>
      </div>
	   <div class="sg-select-container" id="de" style="
    color: red;">
      </div>
	  
	   <div>
	   <div class="row">
	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		 
		<label  for="state" class="control-label">1-Image</label> 
		<input class="supplier-image" type="file" name="image1" value="" id='1' >
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br>
		</div>
		   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">2-Image</label>
		<input class="supplier-image" type="file" name="image2" value="" id='2'>
		<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
		</div>
		</div>
		<div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">3-Image</label>
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
		<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">4-Image</label>
		<input class="supplier-image" type="file" name="image4" value=""  id='4' >
		<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">5-Image</label>
		<input class="supplier-image" type="file" name="image5" value="" id='5' >
		<img    id="cu5"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">6-Image</label>
		<input class="supplier-image" type="file" name="image6" value=""  id='6' >
		<img  id="cu6" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">7-Image</label>
		<input class="supplier-image" type="file" name="image7" value="" id='7' >
		<img    id="cu7"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">8-Image</label>
		<input class="supplier-image" type="file" name="image8" value=""  id='8' >
		<img  id="cu8" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">9-Image</label>
		<input class="supplier-image" type="file" name="image9" value="" id='9' >
		<img    id="cu9"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">10-Image</label>
		<input class="supplier-image" type="file" name="image10" value=""  id='10' >
		<img  id="cu10" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
		</div>
		</div>
	   
	 <!-- <label for="state" class="control-label">Select images:</label>
      <div class="sg-select-container">
      <input type="file" name="product_image[]" class="file-2" multiple>
      </div>-->
    <!-- end col -->

    <div class="form-group col-md-4 choose-outdoor-is-hidden" style="display: none;">
      <label for="other-textfield" class="control-label">Other</label>
      <input type="text" class="form-control form-input-field" name="other-textfield" value=""  placeholder="">
      <span class="help-block"></span>
    </div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title custom_title"   >Preview</h4>
        </div>
        <div class="modal-body">
 <div class="border">
      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname" >
      </div>
</div>
 <div class="border">
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname" >
      </div> 
</div>
 <div class="border">
	   <label for="state" class="control-label">Part number</label>
      <div class="sg-select-container" id="partname" >
      </div> 
</div>
 <div class="border">
	  <label for="state" class="control-label">Categary</label>
      <div class="sg-select-container" id="cate" >
      </div> 
</div>
 <div class="border">
	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q" >
      </div> 
</div>
 <div class="border">
	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container" id="date" >
      </div>
</div>
 <div class="border">
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container" id="dis" >
      </div>
	  </div>
	   <label for="state" class="control-label">Image</label>
      <div class="sg-select-container" id="" >
	   <img id="pop1" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100" />
      </div>
	  <div class="sg-select-container" id="" >
	   <img id="pop2" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100" />
      </div>
	  <div class="sg-select-container" id="" >
	   <img id="pop3" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
	  <div class="sg-select-container" id="" >
	   <img id="pop4" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop5" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop6" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop7" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop8" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop9" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   <img id="pop10" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
	   
        </div>
        <div class="modal-footer">
  <input type="submit" class="btn_custom_btn"name="Save_As_Draft" value="Save As Draft"> 
		   <input type="submit" name="submit" value="confirm" class='btn btn-default custom_btn_color'>
          <button type="button" class="btn btn-default custom_btn" data-dismiss="modal">Close</button>
        </div>

      
      </div>
      
    </div>
  </div>
  
  <!-- start of product limit modal -->
  <div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title custom_title"   >Warning</h4>
        </div>

        <div class="modal-body">
        You can only order 10 products in an order</div>
    </div>
  </div>
</div>
  <!-- end of product limit modal -->
 <input type="submit" name="submit" value="submit" style="display:none;">
    <button type="button" class="btn btn-info btn-lg abc" data-toggle="modal" data-target="#myModal" id="Preview">Preview</button>

    <a style="margin-top: 17px;" class="btn btn-primary btn-lg" href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>
</div>
	
	</div>

  </div><!-- row audit -->
</div>

</form>
 <div style="clear:both"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
// add product row
$(document).ready(function(){

    $(".addProduct").click(function(){
        var productRow = $('.add-row-outdoor').length;
        console.log(productRow);
        if (productRow < 8){
            var newTxtHtml = "<div class='col-sm-2'><label for='state' class='control-label custom_control_label'>Product</label><div class='sg-select-container' id='productabc'><input required type='text' name='product[]' class='product1 custom_input'  placeholder='product' id='product_2'/><div class='sg-select-container' id='pr' style='color: red;'></div><div class='sg-select-container' id='disProduct' ></div></div><?php
            $this->db->from('buyer_orders');
            $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
            $this->db->select('buyer_orders.order_name_2, category.name');
            $querys = $this->db->get()->result();
        ?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-sm-2'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name[]'  placeholder='Brand name' id='brand_name_2' class='custom_input brandname'/><div class='sg-select-container' id='bn' style='color: red;' ></div></div> </div> <div class='col-sm-2'><label for='state' class='control-label custom_control_label'>Part Number</label><div class='sg-select-container'><input  required type='text' name='partNumber[]' id='partNumber_2' placeholder='part Number' class='custom_input'/><div class='sg-select-container' id='pn' style='color: red;' ></div></div></div> <div class='col-sm-2'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity[]' id='quantity_2' placeholder='quantity' class='custom_input'/><div class='sg-select-container' id='qt' style='color: red;'></div></div></div><div class='sg-select-container'><label for='state' class='control-label'>Master List</label><input  required type='checkbox' name='master_list_product' value='1'  /> <p><h4>Save it to your master list?</h4></p></div>"; 

        var newTxt = $('<div class="add-row-outdoor row width-100 padding-left-15"> '+newTxtHtml+'<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-add-waste removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove</button> </div> </div><!-- row audit -->');
    //$(".row-outdoor-container").attach(newTxt); 
        $(".productrow").append($(newTxt));
     }else{$('#productModal').modal('show');}
});

$("body").on('click' , '.removeOutdoor' , function(){
      var curRow = $(this).parents('div.add-row-outdoor');
      curRow.remove();
});

// the selection functionality - does not work for other divs
$('.productrow').on("change", '.choose-outdoor', function (e) {
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

$("#image1").click(function(){
document.getElementById("1").value = null;
$("#cu1").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image2").click(function(){
document.getElementById("2").value = null;
$("#cu2").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image3").click(function(){
document.getElementById("3").value = null;
$("#cu3").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image4").click(function(){
document.getElementById("4").value = null;
$("#cu4").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image5").click(function(){
document.getElementById("5").value = null;
$("#cu5").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image6").click(function(){
document.getElementById("6").value = null;
$("#cu6").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image7").click(function(){
document.getElementById("7").value = null;
$("#cu7").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image8").click(function(){
document.getElementById("8").value = null;
$("#cu8").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image9").click(function(){
document.getElementById("9").value = null;
$("#cu9").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image10").click(function(){
document.getElementById("10").value = null;
$("#cu10").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
</script>



<script> 
function getcategory(order_name,category,product_assign_category){
	// alert(order_name);
	// alert(category); 
	// alert(product_assign_category);
	
	  order_namestr = order_name.replace(/[_]/g, " "); 
	  categorystr = category.replace(/[_]/g, " "); 
	  
	  //alert(categorystr);
	
	 $('input[type=text]#product').val(order_namestr);
	 
	 $('#Category :selected').text(categorystr);
	 $('#Category :selected').val(product_assign_category);
	 $('.rg').hide();
	  
	//$order_name = str_replace(' ','_',$categoryValue->order_name);
	//$('#product').val(order_name);

 }
</script> 
<script> 


 
 $(function() {
   $('input[type=file]').change(function(){
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.')+1).toLowerCase()){
        case 'jpg' : 
        case 'png' : showimagepreview(this); break;
        case 'gif' :
        case 'jpeg' : showimagepreview(this); break;
        default : $('#errorimg').html("Invalid Photo"); break;
        }
    });

    function showimagepreview(input) {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function(e) {
                $('#cu'+input.id).attr('src', e.target.result);
				//alert(e.target.result);
				//alert(input.id);
				
                $('#pop'+input.id).attr('src', e.target.result);
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
});

 $('#Preview').click(function(){
    
	$("#bn").text("");
	$('#pr').text("");
	$('#pn').text("");
	 $('#qt').text("");
	 $('#dt').text("");
	 $('#de').text("");
	  $('#ct').html("");	
	
	var Category1 =$("#Category").val();
	var brand_name = $('#brand_name_1').val();
	var product = $('#product_1').val();
	var partname = $('#partNumber_1').val();
	var quantity1 = $('#quantity_1').val();
	var prefer_delivery_date = $('#prefer_delivery_date').val();
	var description = $('#description').val();
    var Category = $("#Category option:selected").text();
	//var Category1 = $("#Category option:selected").val();
	
    var valid;
	if(brand_name == ""){
	
	$('.abc').attr('data-target','');	
	$("#bn").text("Brand name is required");
	valid = false;
	
	}
	 if(product == ""){
	$('.abc').attr('data-target','');	
	$('#pr').text("Product name is required");
	valid = false;
	}
	if(partname == ""){
	
	$('.abc').attr('data-target','');
    $('#pn').text("Part Number is required");	
	valid = false;
	}
	 if(quantity1 == ""){
	
	$('.abc').attr('data-target','');
    $('#qt').text("Quantity field is required");		
	valid = false;
	}
	if(prefer_delivery_date == ""){
	
	$('.abc').attr('data-target','');	
	 $('#dt').text("Prefer delivery date field is required");	
	 valid = false;
	}
	 if(description == ""){
	
	$('.abc').attr('data-target','');	
	$('#de').text("Description field is required");
	valid = false;
	}
	if(Category1 == "" || Category1 == null){
   
	$('.abc').attr('data-target','');
    $('#ct').text("Category field is required");	
        valid = false;
	}
	
		
	if(valid !== false){	
		
	$('#bname').text(brand_name);
	$('#pname').text(product);
	$('#cate').text(Category);
	$('#partname').text(partname);
	$('#q').text(quantity1);
	$('#date').text(prefer_delivery_date);
	$('#dis').text(description);
	$('.abc').attr('data-target','#myModal');
	}
	//$("#quantity").append(quantity);

}
);

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});



$("#categoryName").click(function(){

 var newCategory = $("input[name='newCategory']").val();
    var valid
	

 if(newCategory == ""){
   $('#newCate').text("Category name is required");
	return false;
	}


//  alert(newCategory);
$.ajax({
           url: '<?php echo site_url(); ?>/buyer/newCategory',
           type: 'POST',
           data: {newCategory: newCategory},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
			   
				
                $("#Category").html(data);
				
				$('#myModals').modal('toggle'); //or  $('#IDModal').modal('hide');
                return false;
				
			
           }
        });
		});


$(".product1").keyup(function(){  
      
	var Category1 = $("#product").val();	
	
	// if(Category1 == ""){
	 // $(".tt").hide();  
	// }
	
	
	//alert(Category1); 
	
	 $.ajax({
         type: "POST",
		 url: '<?php echo site_url(); ?>buyer/product/Category',
		 data: {Category1: Category1},
         error: function() {
              alert('Something is wrong');
           },
         success: 
              function(data){
				 //$("#disProduct").empty();   
				//$(".productabc").append(data);
               // $(data).insertAfter( ".productabc" );
				  $("#disProduct").html(data);
				
				  
               // alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;	
		
		
    });
	
function myFunction() {
  
  var product = document.getElementById("master_list").value;
 // alert(product);
  
   $.ajax({
	     url: '<?php echo site_url(); ?>buyer/product/MasterList',
         datatype: 'json',
		 type: "POST",
		 data: {product: product},
         success: 
              function(data){
			var obj = JSON.parse(data);	  
			//console.log(obj);
			//console.log(obj.brand_name);
		
            $("#product").val(obj.order_name);
			$('#Category :selected').val(obj.product_assign_category);
			$('#Category :selected').text(obj.category_name);
			$("#brand_name").val(obj.brand_name);
			$("#partNumber").val(obj.part_number);
			
              }
          });

}	
	
	
	
	
 
</script>

