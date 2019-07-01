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


textarea#description {
    width: 72%;
    height: 170px;
    font-size: 16px;
    text-transform: capitalize;
    padding: 5px;
}

.modal {

display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8)
}

div#modal01 .modal-content {
    margin: auto;
    display: block;
    position: absolute !important;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,0.2)!important;
    width: 60%;
}
div#modal01 .modal-content img {
    height: 500px;
    width: 100%;
}

.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden
}


.close {
text-decoration:none;
float:right;
font-size:24px;
font-weight:bold;
color:white
}
.container1 {
width:200px;
display:inline-block;
}
.modal-content, #caption {   
  -webkit-animation-name: zoom;
  animation-name: zoom;
   
}


@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
.close {
    float: right;
    font-size: 42px !important;
    font-weight: 700;
    line-height: 1;
    color: #fff !important;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1 !important;
}


</style>

<?php //echo "<pre>"; print_r($getOrderDetails); die;    ?>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php }?>
<form  id="form" action="" Method="post" enctype="multipart/form-data"> 

<div class="row-outdoor-container width-100">
   <div class="add-row-outdoor row width-100 padding-left-15">
   
    <div class="form-group custom_boxshadow col-md-6" style="margin:auto;">
     <input type="hidden" name="order_id" value= "<?php echo $getOrderDetails[0]->order_id;?>">

	  <label for="state" class="control-label custom_control_label">Brand Name</label>
      <div class="sg-select-container">
       <input required type="text" name="brand_name"  placeholder="Brand name" value="<?php echo $getOrderDetails[0]->brand_name;?>"   id="brand_name" class="custom_input">
	   <div class="sg-select-container" id="bn" style="
    color: red;
" ></div>
      </div> 
	 
  <label for="state" class="control-label custom_control_label">Product</label>
      <div class="sg-select-container">
       <input required type="text" name="product"  value="<?php echo $getOrderDetails[0]->order_name;?>" placeholder="product"  id="product" class="custom_input" / >
	    <div class="sg-select-container" id="pr" style="
    color: red;
"></div>
<div class="sg-select-container" id="disProduct" >
      </div>
	  
	   <label for="state" class="control-label custom_control_label">Part Number</label>
      <div class="sg-select-container">
       <input  required type="text" name="partNumber"  value="<?php echo $getOrderDetails[0]->part_number;?>" id="partNumber" placeholder="partNumber" class="custom_input"/>
	   
	     <div class="sg-select-container" id="pn" style="
    color: red;
" >
      </div> 
	  
	  <label for="state" class="control-label custom_control_label">Category:</label>
      <div class="sg-select-container">
			<select name="category"class="custom_control_label" required id="Category">
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
			<div class="sg-select-container" id="ct" style="
    color: red;
">
      </div>
	  
	  
	   <label for="state" class="control-label custom_control_label">Quantity</label>
      <div class="sg-select-container">
       <input required type="number" name="quantity" value="<?php echo $getOrderDetails[0]->quantity;?>" id="quantity" placeholder="quantity"  class="custom_input"/>
      </div>
	  
	   <label for="state" class="control-label custom_control_label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" name="prefer_delivery_date" value="<?php echo $getOrderDetails[0]->prefer_delivery_data;?>"  class="date1 custom_control_label custom_input" placeholder="prefer_delivery_date"/>
      </div>
	   
	 <?php  if($getOrderDetails[0]->image1){  ?>
	  <label for="state" class="control-label">Image 1</label>
	  
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image1); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php } ?>
	 
	  <?php  if($getOrderDetails[0]->image2){  ?>
	   <label for="state" class="control-label">Image 2</label>
	  <image id="myImg"  src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image2); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php } ?>
	 
	  <?php  if($getOrderDetails[0]->image3){  ?>
	  <label for="state" class="control-label">Image 3</label>
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image3); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php } ?>

	 <?php  if($getOrderDetails[0]->image4){  ?>
	  	  <label for="state" class="control-label">Image 4</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image4); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php } ?>
	 
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>
	 
	 
	 
	 
	 
	 <div class="row">
	   <div class="col-lg-6">
	  
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">1-Image</label> 
		<input class="supplier-image" type="file" name="image1" value="" id='1' >
		<input class="supplier-image" type="hidden" name="oldimage1" value="<?php echo $getOrderDetails[0]->image1; ?>" id='1' >
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br>
		</div>
		
	 <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">2-Image</label>
		<input class="supplier-image" type="file" name="image2" value="" id='2'>
		<input class="supplier-image" type="hidden" name="oldimage2" value="<?php echo $getOrderDetails[0]->image2; ?>" id='1' >
		<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
		</div>
		</div>
		<div class="row">
	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">3-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage3" value="<?php echo $getOrderDetails[0]->image3; ?>" id='1' >
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
		<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		 
		
	   <div class="col-lg-6">
	   <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">4-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage4" value="<?php echo $getOrderDetails[0]->image4; ?>" id='1' >
		<input class="supplier-image" type="file" name="image4" value=""  id='4' >
		<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
		</div>
	  
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <textarea  required type="text" name="description"  value="<?php echo $getOrderDetails[0]->order_description;?>"id="description" placeholder="description"  class="custom_input"/></textarea>
      </div>
    </div><!-- end col -->
	
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
      <label for="state" class="control-label custom_label">Brand Name</label>
      <div class="sg-select-container custom_brand_name" id="bname" >
      </div>
	  </div>
	  <div class="border">
     <label for="state" class="control-label custom_label">Product Name</label>
      <div class="sg-select-container custom_brand_name" id="pname" >
      </div> 
	  </div>
	  <div class="border">
	   <label for="state" class="control-label custom_label">Part number</label>
      <div class="sg-select-container custom_brand_name" id="partname" >
      </div> 
	  </div>
	  <div class="border">
	  <label for="state" class="control-label custom_label">Categary</label>
      <div class="sg-select-container custom_brand_name" id="cate" >
      </div> 
	  </div>
	  <div class="border">
	   <label for="state" class="control-label custom_label">Quantity</label>
      <div class="sg-select-container custom_brand_name" id="q" >
      </div> 
	  </div>
	  <div class="border">
	   <label for="state" class="control-label custom_label">Prefer Delivery date</label>
      <div class="sg-select-container custom_brand_name" id="date" >
      </div>
	  </div>
	  <div class="border">
	   <label for="state" class="control-label custom_label">Discription</label>
      <div class="sg-select-container custom_brand_name" id="dis" >
      </div>
	  </div>
	   <label for="state" class="control-label custom_label">image</label>
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
	   
        </div>
        <div class="modal-footer">
		   <input type="submit" name="submit" value="confirm" class='btn btn-default custom_btn_color'>
		   <button type="button" class="btn btn-default custom_btn" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
</div>
	
	
<input type="submit" name="submit" value="submit" style="display:none;">
    <button type="button" class="btn btn-info btn-lg abc" data-toggle="modal" data-target="#myModal" id="Preview">Preview</button>

    <a style="margin-top: 19px!important ;margin-left: 5px !important;" class="btn btn-primary btn-lg " href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>
  </div><!-- row audit -->
</div>
</form>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
function getcategory(order_name,category,product_assign_category){
	// alert(order_name);
	// alert(category); 
	 //alert(product_assign_category);
	
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













$("#product").keyup(function(){  
      
	var Category1 = $("#product").val();	
	//alert(Category1);
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
	













$('#Preview').click(function(){
    
	$("#bn").text("");
	$('#pr').text("");
	$('#pn').text("");
	 $('#qt').text("");
	 $('#dt').text("");
	 $('#de').text("");
	  $('#ct').html("");	
	
	var Category1 =$("#Category").val();
	var brand_name = $('#brand_name').val();
	var product = $('#product').val();
	var partname = $('#partNumber').val();
	var quantity1 = $('#quantity').val();
	var prefer_delivery_date = $('.date1').val();
	
	//alert(prefer_delivery_date); 
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


function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>
