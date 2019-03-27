<!--<a href="<?php //echo base_url('buyer/buyerOrderDashboard');?>">BACK</a>-->
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } ?>

<div class="container">
 <?php
 //echo "<pre>";
// pr($viewOffer);
 
//$viewOrder =$viewOffer;
 if(!empty($viewOffer)){
 foreach($viewOffer as $viewOrder){
 
 ?>
<label>Order </label> <p><?php if(!empty($viewOrder->order_id)){ echo $viewOrder->order_id; } else { echo 'N/A';} ?></p><br>
<label>Buyer Name</label> <p><?php if(!empty($viewOrder->name)){ echo $viewOrder->name; } else { echo 'N/A';} ?></p><br>
<label>Product Name</label> <p><?php if(!empty($viewOrder->order_name)){ echo $viewOrder->order_name; } else { echo 'N/A';} ?></p><br>

<label>Quantity</label> <p><?php if(!empty($viewOrder->order_name)){ echo $viewOrder->order_name; } else { echo 'N/A';}; ?></p><br>
<label>Brand Name</label> <p><?php if(!empty($viewOrder->brand_name)){ echo $viewOrder->brand_name; } else { echo 'N/A';} ?></p><br>
<label>Part Number</label> <p><?php if(!empty($viewOrder->order_name)){ echo $viewOrder->order_name; } else { echo 'N/A';} ?></p><br>
<label>Price</label> <p><?php if(!empty($viewOrder->price_offer)){ echo $viewOrder->price_offer; } else { echo 'N/A';} ?></p><br>
<label>Prefer Delivery Date</label> <p><?php if(!empty($viewOrder->prefer_delivery_data)){ echo $viewOrder->prefer_delivery_data; } else { eCho 'N/A';} ?></p><br>
<?php }

} ?>




<h4><b>Accept offer:</b></h4>

<?php  if($viewOffer[0]->supplier_accepted_buyer_offer){
   echo "<p>Supplier Agree with buyer</p>";
}
else{

?>


<form method='post' action='/hawki/supplier/supplier_accept_offer/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Accept Offer</button></form>





<h4><b>Decline Offer:</b></h4>

<?php  if($viewOffer[0]->supplier_reject_buyerOffer_accepted){
   echo "<p>Buyer offer has been Declined</p>";
}
else{

?>


<form method='post' action='/hawki/supplier/reject_offer/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Decline Offer</button></form>
<?php }} ?>


<h4>
<b>Payment Status:</b></h4>

<?php 
if($viewOffer[0]->buyer_payment_mark_paid){
	echo "Buyer has done payment to you";
}


 
	if($viewOffer[0]->supplier_payment_mark_received){
		echo "<p>Payment Success</p>";
			}
		else{?>
		<p>buyer Waiting for Payment Confirmation</p><form method='post' action='/hawki/supplier/marks_as_paid/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Mark As Paid</button></form>
			<?php }
		?>





</div>

<h4><b>Delivery status:</b></h4>

		<?php 
		
		if($viewOffer[0]->buyer_delivery_transit_status){
					echo "<p>order delivery  success to buyer</p>";
			}
			else{
			echo "<p>order deliver  in procees </p>";
			}
		
			if($viewOffer[0]->supplier_delivery_transit_status){
					echo "<p>Delivery Success</p>";
			}
	else{?>
		<p>Waiting for Payment</p><form method='post' action='/hawki/supplier/transits_mark_as_recieved/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Mark as delivered</button></form>
			<?php }
		?>





</div>







<!-- check more start --->
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<!-- Button to trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
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
                </div><div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div><div class="form-group">
                        <label for="inputName">Price($)</label>
                        <p id="price"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">Date for delivery</label>
                        <p id="Date_for_delivery"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">delivery type</label>
						<p id="delivery_type"></p>
                </div><div class="form-group">
                        <label for="inputName">payment terms </label>
                      <p id="payment_terms"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">description</label>
                      <p id="description"></p>
                </div>
				
				</div>
				
				
               <!-- <form role="form">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message</label>
                        <textarea class="form-control" id="inputMessage" placeholder="Enter your message"></textarea>
                    </div>
                </form>-->
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
function testFunction(id){

	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/hawki/buyer/viewCheckOrder/'+id,
		success:function(msg){
		
			 // var array = JSON.parse("[" + msg + "]");
			  var array = JSON.parse(msg);
			  //alert(msg);
			  //console.log(msg);
			/* 	 console.log(array[0].offer_id);
				alert(array[0].offer_id); */			
				$('#offer_no').text(array[0].marked_offer_id);
				$('#supplier_name').text(array[0].username);
				$('#price').text(array[0].price_offer);
				$('#Date_for_delivery').text(array[0].date_for_delivery);
				$('#delivery_type').text(array[0].delivery_type);
				$('#description').text(array[0].description);
				$('#payment_terms').text(array[0].payment_terms);
					
		}
	});

}




function acceptOffer(){
	var offer_no =$("#offer_no").text();
		
	
	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/hawki/buyer/acceptOffer/'+offer_no,
		success:function(msg){
				alert('Offer is accepted ,and futher work is under working');
			 // var array = JSON.parse("[" + msg + "]");
			//  var array = JSON.parse(msg);
			 // alert(msg);
			 // console.log(msg);
			
					
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
    </script>
  
    