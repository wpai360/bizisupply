&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:red;" class="custom_back_btn"href="<?php echo base_url('buyer/buyerOrderDashboard');?>">Back</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } 

?> 
<style>
.content-header {
    margin-bottom: 27px!important;
}
.user-rating {
    direction: rtl;
    font-size: 20px;
    unicode-bidi: bidi-override;
    padding: 10px 30px;
    display: inline-block;
}
.user-rating input {
    opacity: 0;
    position: relative;
    left: -15px;
    z-index: 2;
    cursor: pointer;
}
.user-rating span.star:before {
    color: #777777;
    content:"ï€†";
    /*padding-right: 5px;*/
}
.user-rating span.star {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    position: relative;
    z-index: 1;
}
.user-rating span {
    margin-left: -15px;
}
.user-rating span.star:before {
    color: #777777;
    content:"\f006";
    /*padding-right: 5px;*/
}
.user-rating input:hover + span.star:before, .user-rating input:hover + span.star ~ span.star:before, .user-rating input:checked + span.star:before, .user-rating input:checked + span.star ~ span.star:before {
    color: #ffd100;
    content:"\f005";
}

.selected-rating{
    color: #ffd100;
    font-weight: bold;
    font-size: 3em;
}
.orderLabel
{
color: #00b7e3;
font-weight: normal!important;
}
.labelTitle
{ width: 30%!important}
.orderAlign
{margin: 0px 0px 14px 0px;}
.ProductImg{    float: left;
    margin: 0px 20px 26px 0px;}
	a.custom_back_btn {
    background: #00b7e3;
    padding: 14px 38px;
    border-radius: 5px;
    color: white!important;
    font-size: 17px;
    font-weight: 700;
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

div#modal01 .modal-content {
    margin: auto;
    display: block;
    position: absolute !important;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,0.2)!important;
    width: 100%;
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
<?php //echo "<pre>"; print_r($viewOrder); die;  ?>

<!-- check more start --->
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<div class="custom_container custm_label">
 <?php  if(!empty($viewOrder)){ ?>
 <?php //echo "<pre>"; print_r($viewOrder); die;  ?>
<!--<label>Order Id</label> <p><?php //if(!empty($viewOrder[0]->order_id)){ echo $viewOrder[0]->order_id; } else { echo 'N/A';} ?></p><br>-->
<div class="row">
    <div class="col-lg-12">
        <div class="orderAlign">
        <label class="labelTitle">Order Ids : </label> <label class="orderLabel"><?php if(!empty($viewOrder[0]->order_random_id)){ echo $viewOrder[0]->order_random_id; } else { echo 'N/A';} ?></label>
        </div>
    </div>

    <?php 
   $productnumber = 0;
    for($j=1; $j<11; $j++){
        
        if($viewOrder[0]->{'order_name_'.$j}!=''){$productnumber++;}
    }?>

    <?php for($i = 1; $i <=$productnumber; $i++){
    ?>
    <div class="col-lg-12">
    <label for="state" class="control-label">Product <?php echo $i;?></label>
    <div class="row">
        <div class="col-lg-3">
        <label class="">Name : <?php if(!empty($viewOrder[0]->{'order_name_'.$i})){ echo $viewOrder[0]->{'order_name_'.$i}; } else { echo 'N/A';} ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Quantity: <?php if(!empty($viewOrder[0]->{'quantity_'.$i})){ echo $viewOrder[0]->{'quantity_'.$i}; } else { echo 'N/A';}; ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Brand Name : <?php if(!empty($viewOrder[0]->{'brand_name_'.$i})){ echo $viewOrder[0]->{'brand_name_'.$i}; } else { echo 'N/A';}; ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Part Number :<?php if(!empty($viewOrder[0]->{'part_number_'.$i})){ echo $viewOrder[0]->{'part_number_'.$i}; } else { echo 'N/A';}; ?></label></div>
    </div>
    </div>
    <?php } ?>

    
 </div>
<div class="row">
<div class="col-lg-12">
<div class="orderAlign">
        <label class="labelTitle">Prefer Delivery Date : </label> <label class="orderLabel"><?php if(!empty($viewOrder[0]->prefer_delivery_data)){ echo $viewOrder[0]->prefer_delivery_data; } else { eCho 'N/A';} ?></label>
        </div>
<div class="orderAlign custom_img_class"><label class="labelTitle">Product Images:</label></div>
<div class="orderAlign">


<?php 
if($viewOrder[0]->image1){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image1);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>



<?php 

if($viewOrder[0]->image2){ ?>

<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image2);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php }

?>




<?php 

if($viewOrder[0]->image3){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image3);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>




<?php

if($viewOrder[0]->image4){ ?>
	
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image4);?>" width="200" height="100" onclick="onClick(this)"></img>
<?php } ?>

<?php 

if($viewOrder[0]->image5){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image5);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image6){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image6);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image7){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image7);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image8){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image8);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image9){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image9);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image10){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image10);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<div style="clear:both;"></div>
<?php } ?>

</div>
</div>
</div>
</div>

<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>


<h1 class="o-order">Offer List</h1>

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="ref">
      <th scope="col">Offer.no</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">price($)</th>
      <th scope="col">Date for Delivery</th>
     <!-- <th scope="col">Delivery Type</th>-->
      <th scope="col">Payment Term</th>
      <th scope="col">Action</th>     
    </tr>
    </thead>
    <tbody>
  <?php 


	if(!empty($offerList)){
		for($j=0;$j< count($offerList); $j++){   
			$checkAction[] = $offerList[$j]->request_wait_response;
		}
    }
// check if any offer has been selected
   
$counts = array_count_values($checkAction);
$count_checkAction =$counts["1"];
/* 
 
$counts = array_count_values($checkAction);

   pr($checkAction); */
   
if($count_checkAction > 0) {

if(!empty($offerList)){
	for($i=0;$i< count($offerList); $i++){  ?>
		<tr><td style="text-align:center;"><?php if(!empty($offerList[$i]->random_offer_id)){ echo   $offerList[$i]->random_offer_id;} else {echo 'N/A';}?>
			</td>
			<td style="text-align:center;"><?php if(!empty($offerList[$i]->name)){ echo   $offerList[$i]->username;} else {echo 'N/A';}?>
			</td>
			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->price_offer)){ echo '$'.$offerList[$i]->price_offer;} else {echo 'N/A';}?>  </td>

			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->prefer_delivery_data)){ echo $offerList[$i]->prefer_delivery_data;} else {echo 'N/A';}?>  </td>
			<!--  <td  style="text-align:center;"><?php if(!empty($offerList[$i]->delivery_type)){ echo $offerList[$i]->delivery_type;} else {echo 'N/A';}?>  </td>-->
			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->payment_terms)){ echo $offerList[$i]->payment_terms;} else {echo 'N/A';}?>  </td>
			<!--<td  style="text-align:center;"><a href="<?php echo base_url('buyer/clickCheckMore/'.$offerList[$i]->order_id);?>" >Check  More</a> -->
			<td>
			<?php 
			$thisOne =$offerList[$i]->offer_id;
			if($offerList[$i]->request_wait_response){ 
			    if($offerList[$i]->supplier_accepted_buyer_offer==1){
				echo '<a href="/hawki/buyer/processOrder/'.$thisOne.'" class="btn btn-success btn-lg" >Supplier accepted </a>';
				}
				else{
					echo '<a href="/hawki/buyer/processOrder/'.$thisOne.'" class="btn btn-success btn-lg" >Awaiting supplier response</a>';
				}
					
			}
			else{
				echo '<button disabled  onclick="viewOffer('.$offerList[$i]->marked_offer_id.')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">In hold</button>';
			}
			?>
			</td>

		</tr> 
		<?php 
		
		

		
	}
} 


}  
else { 
	if(!empty($offerList)){
	for($i=0;$i< count($offerList); $i++){  ?>
		<tr><!--<td ><?php// echo  $i;?></td>-->
		     <td style="text-align:center;"><?php if(!empty($offerList[$i]->random_offer_id)){ echo   $offerList[$i]->random_offer_id;} else {echo 'N/A';}?>
			</td>
			<td style="text-align:center;"><?php if(!empty($offerList[$i]->name)){ echo   $offerList[$i]->username;} else {echo 'N/A';}?>
			</td>
			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->price_offer)){ echo '$'.$offerList[$i]->price_offer;} else {echo 'N/A';}?>  </td>

			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->prefer_delivery_data)){ echo $offerList[$i]->prefer_delivery_data;} else {echo 'N/A';}?>  </td>
			<!--  <td  style="text-align:center;"><?php if(!empty($offerList[$i]->delivery_type)){ echo $offerList[$i]->delivery_type;} else {echo 'N/A';}?>  </td>-->
			<td  style="text-align:center;"><?php if(!empty($offerList[$i]->payment_terms)){ echo $offerList[$i]->payment_terms;} else {echo 'N/A';}?>  </td>
			<!--<td  style="text-align:center;"><a href="<?php echo base_url('buyer/clickCheckMore/'.$offerList[$i]->order_id);?>" >Check  More</a> -->
			<td>
			<?php 
			$thisOne =$offerList[$i]->offer_id;
			if($offerList[$i]->request_wait_response){ 
				echo '<a href="/hawki/buyer/processOrder/'.$thisOne.'" class="btn btn-success btn-lg" >Check More</a>';
			}
			else{
				echo '<button onclick="viewOffer('.$offerList[$i]->marked_offer_id.')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">Check More</button>';
			}
			?>
			</td>
		</tr> 
		<?php 
	}
} 
	  
	 } ?>  
    </tbody>
</table>




<!-- Button to trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Check offer</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				
				<div role="form">
				
				<div class="form-group">
                         <label for="inputName">Offer No</label>
                      <p id="offer_no"></p>
                </div>

                <div class="form-group">
                         <label for="inputName">Supplier Name</label>
                      <p id="supplier_name"></p>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div>-->
                <!-- offer list -->
                <table class="table table-striped table-bordered dataTable no-footer">
                    <thead>
                    <tr class="ref">
                        <th class="col">Product Number</th>
                        <th class="col">Product Name</th>
                        <th class="col">Brand Name</th>
                        <th class="col">Quantity</th>
                        <th class="col">Part Number</th>
                        <th class="col">Supplier note</th>
                        <th class="col">Supplier's Quote Price</th>
                        <th class="col">Supplier's Discount Quote Price</th>
                        <th class="col">Action</th>
                    </tr>
                    </thead>

                    <tbody id="offer_detail">


                  

                    </tbody>
                
                
                </table>
				
				<div class="form-group">
                        <label for="inputName">Total Price($)</label>
                        <p id="price"></p>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Date for delivery</label>
                        <p id="Date_for_delivery"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">delivery type</label>
						<p id="delivery_type"></p>-->
                </div>
				<div class="form-group">
                        <label for="inputName">Payment terms </label>
                      <p id="payment_terms">Pre-Pay</p>
                      <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="70" height="auto"/>
                      <img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png')?>" width="70" height="auto">
                      <img src="<?php echo base_url('images/ML008_PayID.png')?>" width="70" height="auto">
                      <img src="<?php echo base_url('images/transfer.png')?>" width="45" height="auto">
                </div>

				<div class="form-group">
                        <label for="inputName">Description</label>
                      <p id="description">Description text</p>
                </div>
				
				
            </div>
			
			
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            
                <button type="button" class="btn btn-primary submitBtn" onclick="acceptOffer()">Accept Offer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">See Other Offer</button>
            </div>
        </div>
    </div>
</div>

<script>
function redirect(id){
alert(id);
}

function viewOffer(id){

	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/HawkiWeb/buyer/viewCheckOrder/'+id,
		success:function(msg){
		    
			    var arrayf = JSON.parse("[" + msg + "]");
			        //alert(array[0].marked_offer_id)    
                    $('#offer_detail').empty();
			    var array = JSON.parse(msg);
                // pass the data to here
                // generate offer rows
                for(var i=1; i<=9;i++){
                    if(array[0]['product'+i+'_quote']!=''){
                        let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] +"</td><td>"+ array[0]['product'+i+'_quote'] +"</td><td>"+ array[0]['product'+i+'_quantity_price'] +"</td><td> <label><input class='selectQuote' type='checkbox' value=''>Select the quote</label> <label><input class='selectDiscount' type='checkbox' value=''>Select the discount quote</label></td></tr>";
                        $('#offer_detail').append(htmlContent);
                        };
                };
                console.dir('data for offer' + array[0].random_offer_id + msg);
			    $('#offer_no').text(array[0].random_offer_id);
				$('#supplier_name').text(array[0].username);
				$('#Date_for_delivery').text(array[0].date_for_delivery);
			    $('#delivery_type').text(array[0].delivery_type);
				$('#description').text(array[0].description);
				$('#payment_terms').text(array[0].payment_terms);
				$('#image1').prepend('<img  src="<?php echo base_url('/uploads'); ?>'+ array[0].image1 + '"/>');
				
				if(array[0].image1 != null){
				
				$('#inputName1').text('image 1');
				$('#image1').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image1+'" width="200" height="100"/>');
				
				}
				if(array[0].image2 != null){
				
				$('#inputName2').text('image 2');
				$('#image2').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image2+'" width="200" height="100"/>');
				}
				if(array[0].image3 != null){
					
				$('#inputName3').text('image 3');	
				$('#image3').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image3+'" width="200" height="100"/>');
				}
				if(array[0].image4 != null){
				$('#inputName4').text('image 4');
				$('#image4').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image4+'" width="200" height="100"/>');
				}
                if(array[0].image5 != null){
				$('#inputName5').text('image 5');
				$('#image5').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image5+'" width="200" height="100"/>');
				}
                if(array[0].image6 != null){
				$('#inputName6').text('image 6');
				$('#image6').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image6+'" width="200" height="100"/>');
				}
                if(array[0].image7 != null){
				$('#inputName7').text('image 7');
				$('#image7').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image7+'" width="200" height="100"/>');
				}
                if(array[0].image8 != null){
				$('#inputName8').text('image 8');
				$('#image8').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image8+'" width="200" height="100"/>');
				}
                if(array[0].image9 != null){
				$('#inputName9').text('image 9');
				$('#image9').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image9+'" width="200" height="100"/>');
				}
                if(array[0].image10 != null){
				$('#inputName10').text('image 10');
				$('#image10').prepend('<img  src="<?php echo base_url('/uploads/'); ?>'+array[0].image10+'" width="200" height="100"/>');
				}
				$('#link').prepend('<a class="btn btn-primary"  href="<?php echo base_url('/supplier/profile/'); ?>'+arrayf[0].userId+'"" >Supplier Profile</a>');
			
				
					
		}
	});

}




function acceptOffer(){
	var offer_no =$("#offer_no").text();
		
	
	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/HawkiWeb/buyer/acceptOffer/'+offer_no,
		success:function(msg){
				location.reload();
		}
	});
	
	
	
}
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Please enter your email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Please enter your message.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>


<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])){
    
    // Submitted form data
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $message= $_POST['message'];
    
    /*
     * Send email to admin
     */
    $to     = 'admin@example.com';
    $subject= 'Contact Request Submitted';
    
    $htmlContent = '
    <h4>Contact request has submitted at CodexWorld, details are given below.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Name:</th><td>'.$name.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
            <th>Message:</th><td>'.$message.'</td>
        </tr>
    </table>';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Additional headers
    $headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";
    
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    
    // Output status
    echo $status;die;
}
?>

<!--- check more end --->




  
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



// Get the modal
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>


  
    