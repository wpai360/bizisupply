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

.disabledText{
	color:grey;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
textarea#comment{
	resize:none;
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
/* i {
    position: relative;
    top: -28px;
    font-size: 15px !important;
    left: -16px;
	
}
 */



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

<label for="validationTooltip01" class="prod-label">Order number <?php echo $viewOfferOrder[0]->order_random_id;?></label>
<div class="offer_form">
<form  action="" method="post" enctype="multipart/form-data">
<!-- begin of product row -->
<?php 

for($i=1;$i<11;$i++){
	if($viewOfferOrder[0]->{'order_name_'.$i}){
    ?>
<div class="row">


			<div class="col-md-3 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Product Name <?php echo $i;?>:</label>
			  <input type="text" class="form-control prod-input" id="validationTooltip01" placeholder="" value="<?php echo (isset($viewOfferOrder[0]->{'order_name_'.$i}))? $viewOfferOrder[0]->{'order_name_'.$i} : "" ; ?>" disabled>
			</div>

			<div class="col-md-3 mb-3 prod-name">
			<label for="brand_name"class="prod-label">Brand name:</label>
			<input type="text" class="form-control prod-input" id="brand_name" placeholder="" disabled value="<?php echo (isset($viewOfferOrder[0]->{'brand_name_'.$i}))? $viewOfferOrder[0]->{'brand_name_'.$i} : "" ; ?>">
		</div>
		<div class="col-md-3 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Id/Serial/Model No.</label>
			  
			  	<!--<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number'); ?></span>
			  -->
			   <input type="text" class="form-control prod-input" name="part_number"  id="validationTooltip02"  value="<?php echo (isset($viewOfferOrder[0]->{'part_number_'.$i}))? $viewOfferOrder[0]->{'part_number_'.$i} : "" ; ?>"  readonly>
			</div>

			<div class="col-md-3 mb-3 prod-name">
			  <label for="quantity"class="prod-label">Quantity:</label>
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="" disabled value="<?php echo (isset($viewOfferOrder[0]->{'quantity_'.$i}))? $viewOfferOrder[0]->{'quantity_'.$i} : "" ; ?>">
			</div>

			
			
</div>

<div class="row">

	<div class="col-md-6 prod-name">
		<label for="note"class="prod-label">Note</label>
		<input type="text" class="form-control prod-input" id="note_1" placeholder="" disabled value="<?php echo (isset($viewOfferOrder[0]->{'note_'.$i}))? $viewOfferOrder[0]->{'note_'.$i} : "" ; ?>">
	</div>

<label class="radio-inline"><input type="checkbox" class="can_supply" id="option_3_<?php echo $i;?>" name="option_A_<?php echo $i;?>" value=2> Can supply</label>
<label class="radio-inline"><input type="checkbox" class="no_supply" id="option_1_<?php echo $i;?>" name="option_A_<?php echo $i;?>" value=0> Can not supply</label>
<label class="radio-inline"><input type="checkbox" class="more_time" id="option_2_<?php echo $i;?>" name="option_A_<?php echo $i;?>" value=1> Can back order</label>

			
</div>

<div class="row quoteContainer hidden">

	<div class="col-md-3 prod-name priceContainer">
		<label for="price"class="prod-label">Quote Price</label>
		<input type="number" class="form-control prod-input price" id="price_<?php echo $i;?>" placeholder="" name="price_<?php echo $i;?>" >
	</div>

	<div class="col-md-3 prod-name priceContainer">
	<button type="button" class="btn btn-info qtyBtn">Add Quantity Price</button>
	</div>

	<div class="col-md-5 prod-name hidden quantityPriceContainer">
	<label for="price"class="prod-label qtyNo">Quantity need</label>
	<input type="number" class="form-control prod-input price" id="qty_no_<?php echo $i;?>" placeholder="" name="qty_no_<?php echo $i;?>" >
	<label for="price"class="prod-label qtyPr">Quantity Price</label>
	<input type="number" class="form-control prod-input price" id="qty_price_<?php echo $i;?>" placeholder="" name="qty_price_<?php echo $i;?>" >
	<i class="fa fa-trash delete_qty" aria-hidden="true" id="" style="font-size:30px;color:red;" ></i>
	</div>

	<div class="col-md-4 prod-name hidden reasonContainer">
		<label for="reason"class="prod-label">Reason for delay</label>
		<input type="text" class="form-control prod-input reason" id="reason_<?php echo $i;?>" placeholder="" name="reason_<?php echo $i;?>" >
	</div>

		
</div>



<?php
}}?>
<!-- end of product row -->
		
	<div class="row">
			
			
			<div class="col-md-6 mb-3 prod-name">
			  <label for="prefer_delivery_data"class="prod-label">Prefer delivery data:</label>
			  <input type="text" class="form-control prod-input" id="prefer_delivery_data" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->prefer_delivery_data))? $viewOfferOrder[0]->prefer_delivery_data : "" ; ?>">
			</div>
			<div class="col-md-6 mb-3 prod-name">
		  <label for="zipCode"class="prod-label">Buyer's Postcode</label>
		  <input type="text" class="form-control prod-input" id="zipCode" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->zipCode))? $viewOfferOrder[0]->zipCode : "" ; ?>">
	</div>
			
		</div>	
		
	<div class="row">
		
			
	
      	<div class="col-md-6 mb-3 prod-name">
			<label for="comment" class="prod-label">Description:</label>
			<input type="hidden" placeholder="description" name="description" value="<?php if(!empty($viewOfferOrder[0]->order_description)) { echo $viewOfferOrder[0]->order_description;} else { echo 'N/A';}?>">
		 	<span class="error" style="color:red;" ><?php echo form_error('description');?></span> 
			<textarea class="form-control is-valid prod-text" rows="4" id="comment" disabled placeholder=""><?php echo (isset($viewOfferOrder[0]->order_description))? $viewOfferOrder[0]->order_description : "" ; ?></textarea>
		</div>	

		<div class="col-md-6 mb-3 prod-name delayContainer hidden">
			<label for="delay_date" class="prod-label">Delay Date:</label>
			<input  type="date" id="prefer_delivery_date" name="delay_date" class="date1 custom_input" placeholder="prefer_delivery_date"/>
	   		<div class="sg-select-container" id="dt" style="color: red;"></div>

		</div>			
	</div>
		
	<div class="row">
		<label for="name"class="prod-label">Buyer's Images:</label>
		<div class="col-md-6 mb-3 prod-name" style="display:none;">	 
			  <input type="text" class="form-control prod-input" id="quantity" placeholder="6" disabled value="<?php echo (isset($viewOfferOrder[0]->name))? $viewOfferOrder[0]->name : "" ; ?>">
			  </div>
			  <?php
  if($viewOfferOrder[0]->image1){ 

          $src1=base_url('uploads/'.$viewOfferOrder[0]->image1);  
  ?>
<img id="myImg" src="<?php echo $src1;?>" class="" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)" />
  
  <?php } ?>

<?php
  if($viewOfferOrder[0]->image2){ 

          $src2=base_url('uploads/'.$viewOfferOrder[0]->image2);  
  ?>
  <img id="myImg" src="<?php echo $src2;?>" class="" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
  
   <?php
  if($viewOfferOrder[0]->image3){ 

          $src3=base_url('uploads/'.$viewOfferOrder[0]->image3);  
  ?>
  <img id="myImg" src="<?php echo $src3;?>" class="" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
  <?php
  if($viewOfferOrder[0]->image4){ 

          $src4=base_url('uploads/'.$viewOfferOrder[0]->image4);  
  ?>
  <img id="myImg"  src="<?php echo $src4;?>" class="" alt="User Image" style="width: 100px;height: 100px;" onclick="onClick(this)"/>
  
  <?php } ?>
			  
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
  <img id="img01" style="max-width:100%">
  </div>
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
			<!-- <div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip01" class="prod-label">Price:</label>
			  <input type="text" class="form-control prod-input" placeholder="price" name="price" id="validationTooltip01" placeholder="Barbed Wire" value="">
			  <span class="error" style="color:red;" ><?php echo form_error('price');?></span>
			</div> -->

			<!-- <div class="col-md-6 mb-3 prod-name">
			  <label for="validationTooltip02" class="prod-label">Insurance:</label>
			   -->
			  	<!--<input type="test" placeholder="part number" name="part_number">
			<span class="error" style="color:red;" ><?php echo form_error('part_number');?></span>
			  -->
			  <!-- <input type="text" class="form-control prod-input" name="insurance"  id="validationTooltip02" placeholder="y Or N" value=" " placeholder="Y or N">
			  <span class="error" style="color:red;" ><?php echo form_error('insurance');?></span>
			</div> -->



			<div class="input_fields_wrap" >
		 		<?php echo form_open_multipart('welcome/do_upload');?>
				<label for="comment" class="prod-label">Image 1:</label> 
				<input class="supplier-image" type="file" name="image1" value="" id='1' >
				<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br>
			</div>

			<div class="input_fields_wrap" >
		 		<?php echo form_open_multipart('welcome/do_upload');?>
				<label for="comment" class="prod-label">Image 2:</label>
				<input class="supplier-image" type="file" name="image2" value="" id='2'>
				<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
			</div>
		
			<div class="input_fields_wrap" >
		 	<?php echo form_open_multipart('welcome/do_upload');?>
			<label for="comment" class="prod-label">Image 3:</label>
			<input class="supplier-image" type="file" name="image3" value="" id='3' >
			<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
			<div class="input_fields_wrap" >
		 	<?php echo form_open_multipart('welcome/do_upload');?>
			<label for="comment" class="prod-label">Image 4:</label>
			<input class="supplier-image" type="file" name="image4" value=""  id='4' >
			<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
			<div class="input_fields_wrap" >
			<?php echo form_open_multipart('welcome/do_upload');?>
			<label for="comment" class="prod-label">Image 5:</label>
			<input class="supplier-image" type="file" name="image5" value=""  id='5' >
			<img  id="cu5" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image5" style="font-size:30px;color:red;"></i><br>

		</div>
			<!-- <input type="hidden" placeholder="payment status"  value="0" name="payment_status"> -->
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
$("#image5").click(function(){
document.getElementById("5").value = null;
$("#cu5").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
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

<script>

// can not supply function 
  $(function(){
   $('.no_supply').click(function(){
	   let checked = $(this).is(':checked');

	   if(checked){
	   		$(this).closest('label').next().find('.more_time').attr("disabled",true);
	   		$(this).closest('label').prev().find('.can_supply').attr("disabled",true);
			
			$(this).closest('label').next().addClass('disabledText');
			$(this).closest('label').prev().addClass('disabledText');
			}else{
		    $(this).closest('label').next().find('.more_time').attr("disabled",false);
	   		$(this).closest('label').prev().find('.can_supply').attr("disabled",false);
			$(this).closest('label').next().removeClass('disabledText');
			$(this).closest('label').prev().removeClass('disabledText');
	   }
   });    
//    need delay option
   $('.more_time').click(function(){
	   let checked = $(this).is(':checked');
	   if(checked){
		   $(this).closest('label').prev('label').prev().find('.can_supply').attr("disabled",true);
		   $(this).closest('label').prev().find('.no_supply').attr("disabled",true);
		   
		   $(this).closest('label').prev('label').prev().addClass('disabledText');
		   $(this).closest('label').prev().addClass('disabledText');

		   $(this).closest('div').next().find('.reasonContainer ').removeClass('hidden');
		   $('.delayContainer').removeClass('hidden');
		   $(this).closest('div').next('div').removeClass('hidden');
	   }else{
		   $(this).closest('label').prev('label').prev().find('.can_supply').attr("disabled",false);
		   $(this).closest('label').prev().find('.no_supply').attr("disabled",false);

		   $(this).closest('label').prev('label').prev().removeClass('disabledText');
		   $(this).closest('label').prev().removeClass('disabledText');



		   $(this).closest('div').next().find('.reasonContainer ').addClass('hidden');
		   $(this).closest('div').next().find('.price').val('');
			//hide next row
		   $(this).closest('div').next('div').addClass('hidden');
		   $(this).closest('div').next().find('.reason').val('');
		   //hide quantity price & show quantity button
		   $(this).closest('div').next('div').find('.priceContainer').removeClass('hidden');
		   $(this).closest('div').next('div').find('.quantityPriceContainer').addClass('hidden');


		   if(!$('.more_time').is(':checked')){
			$('#prefer_delivery_date').val('');
			$('.delayContainer').addClass('hidden');
		   }
	   }

   })

	// can supply option

   $('.can_supply').click(function(){
	   let checked = $(this).is(':checked');
	   if(checked){
		   $(this).closest('label').next().find('.no_supply').attr("disabled",true);
		   $(this).closest('label').next('label').next().find('.more_time').attr("disabled",true);

		   $(this).closest('label').next().addClass('disabledText');
		   $(this).closest('label').next('label').next().addClass('disabledText');

		   $(this).closest('div').next('div').removeClass('hidden');



	   }else{
		   $(this).closest('label').next().find('.no_supply').attr("disabled",false);
		   $(this).closest('label').next('label').next().find('.more_time').attr("disabled",false);

		   $(this).closest('label').next().removeClass('disabledText');
		   $(this).closest('label').next('label').next().removeClass('disabledText');

		   $(this).closest('div').next().find('.price').val('');
		   //hide next row
		   $(this).closest('div').next('div').addClass('hidden');
		   //hide quantity price & show quantity button
		   $(this).closest('div').next('div').find('.priceContainer').removeClass('hidden');
		   $(this).closest('div').next('div').find('.quantityPriceContainer').addClass('hidden');

	   }
   })

   $('.qtyBtn').click(function(){
		console.log('123');
		$(this).closest('div').addClass('hidden');
		$(this).closest('div').next().removeClass('hidden');
	});

	$('.delete_qty').click(function(){
		$(this).closest('div').addClass('hidden');
		$(this).closest('.price').val('');
		$(this).closest('div').prev().removeClass('hidden');
	})

                        
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

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
    </script>
  

    