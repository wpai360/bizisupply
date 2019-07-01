<a href="<?php echo base_url('supplier/dashboard');?>">BACK</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } 

//pr($viewOfferOrder);

?>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
i {
    position: relative;
    top: -28px;
    font-size: 15px !important;
    left: -16px;
	
}

.modal {
z-index:1;
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

.modal-content {
    margin: auto;
    display: block;
    position: absolute !important;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* background-color: rgba(0,0,0,0.2)!important; */
    width: 70%;
    height: 50%;
}
img#img01 {
    width: 100%;
    height: 700px;
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
 

<?php //echo "<pre>"; print_r($viewOfferOrder[0]); die;   ?> 

<div class="container">
</div>

<div class="offer_form">
<form  action="" method="post" enctype="multipart/form-data">
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
		    <label for="name"class="prod-label">Images:</label>
			<div class="col-md-6 mb-3 prod-name" style="display:none;">
			 
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->name))? $viewOfferOrder[0]->name : "" ; ?>">
			  </div>
			  <?php
  if($viewOfferOrder[0]->image1){ 

          $src1=base_url('uploads/'.$viewOfferOrder[0]->image1);  
  ?>
<img id="myImg" src="<?php echo $src1;?>" class="img-circle" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)" />
  
  <?php } ?>

<?php
  if($viewOfferOrder[0]->image2){ 

          $src2=base_url('uploads/'.$viewOfferOrder[0]->image2);  
  ?>
  <img id="myImg" src="<?php echo $src2;?>" class="img-circle" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
  
   <?php
  if($viewOfferOrder[0]->image3){ 

          $src3=base_url('uploads/'.$viewOfferOrder[0]->image3);  
  ?>
  <img id="myImg" src="<?php echo $src3;?>" class="img-circle" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
  <?php
  if($viewOfferOrder[0]->image4){ 

          $src4=base_url('uploads/'.$viewOfferOrder[0]->image4);  
  ?>
  <img id="myImg"  src="<?php echo $src4;?>" class="img-circle" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
			  
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
  <img id="img01" style="max-width:100%">
  </div>
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
			<div class="input_fields_wrap" >
			
	  
		
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label for="comment" class="prod-label">Images1:</label> 
		<input class="supplier-image" type="file" name="image1" value="" id='1' >
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i>
<br>
		</div>
		<div class="input_fields_wrap" >
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label for="comment" class="prod-label">Images2:</label>
		<input class="supplier-image" type="file" name="image2" value="" id='2'>
		<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
		</div>
		
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label for="comment" class="prod-label">Images3:</label>
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
		<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label for="comment" class="prod-label">Images4:</label>
		<input class="supplier-image" type="file" name="image4" value=""  id='4' >
		<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		
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
		
		<div class="col-md-12 mb-3 prod-name" style="margin-left: -15px;">
				<label for="comment" class="prod-label">Extra notes:</label>
				<textarea class="form-control is-valid prod-text" rows="4" id="extra_notes" name="extra_notes"></textarea>
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
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
});
   
   
</script>
















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

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
    </script>
  
    