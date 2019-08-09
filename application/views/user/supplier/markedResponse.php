<!--<a href="<?php //echo base_url('buyer/buyerOrderDashboard');?>">BACK</a>-->
<?php

      $controller = $this->uri->segment(1); // controller
      $action  = $this->uri->segment(2);
      $stsegment =  $this->uri->segment(3); // 1stsegment
      $id = $this->uri->segment(4);
      $url=  base_url();
     $geturl = "$url$controller/$action/$stsegment/$id" ;
     
     //echo "<pre>"; print_r($geturl); die;
     
   if ($this->session->flashdata('message')) {
       ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
   } ?>

<style>
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

.imah1 {
    display: flex;
    align-items: center;
}
.oneimage {
    margin: 0 30px 0px 11px;
}
.imah1 i {
    position: relative;
    top: -24px;
}
</style>



 <?php

$orderId =[];
 $r=[];
 if (!empty($viewOffer)) {

//echo "<pre>"; print_r($viewOffer);
     foreach ($viewOffer as $viewOrder) {
         $orderId[]= $viewOrder->order_id;
         //if($viewOffer->request_wait_response == 1 && $viewOffer->supplier_reject_buyerOffer_accepted == 0){
        
         $r[]=$viewOrder->user_id	; ?>
 
 <?php if ($viewOffer[0]->supplier_accepted_buyer_offer) {
             ?>
	
 <a class="custom_buyer"  href="<?php echo base_url('/buyer/profile'); ?>/<?php echo $viewOrder->user_id; ?>" style="">Buyer Profile</a><br>

<?php
         } ?>

 <!--<label>Order </label> <p><?php //if(!empty($viewOrder->order_id)){ echo $viewOrder->order_id; } else { echo 'N/A';}?></p>-->
<?php 	//}?>
<div class="custm_label">
<label>Orders ID</label> <p><?php if (!empty($viewOrder->order_random_id)) {
             echo $viewOrder->order_random_id;
         } else {
             echo 'N/A';
         } ?></p><br>
<label> Offer ID </label> <p><?php if (!empty($viewOrder->random_offer_id)) {
             echo $viewOrder->random_offer_id;
         } else {
             echo 'N/A';
         } ?></p><br>
<?php  if ($viewOffer->request_wait_response == 1 && $viewOffer->supplier_reject_buyerOffer_accepted == 0) {
             ?>
<label>Buyer Name</label> <p><?php if (!empty($viewOrder->name)) {
                 echo $viewOrder->name;
             } else {
                 echo 'N/A';
             } ?></p><br> 
<?php
         } ?>
<div class="col-lg-12">
<!-- offer product list -->
    <?php for ($i = 0; $i < 10; $i++) {
             if ($viewOrder->{'order_name_'.$i}!='' && $viewOrder->{'product'.$i.'_quote'}!='') {
                 ?>
    <div class="col-lg-2">
    <label>Product Name<?php echo$i; ?></label> <p><?php if (!empty($viewOrder->order_name)) {
                     echo $viewOrder->order_name;
                 } else {
                     echo 'N/A';
                 } ?></p></div>
    <div class="col-lg-2">
    <label>Quantity</label> <p><?php if (!empty($viewOrder->order_name)) {
                     echo $viewOrder->order_name;
                 } else {
                     echo 'N/A';
                 }; ?></p></div>
    <div class="col-lg-2">
    <label>Brand Name</label> <p><?php if (!empty($viewOrder->brand_name)) {
                     echo $viewOrder->brand_name;
                 } else {
                     echo 'N/A';
                 } ?></p></div>

    <div class="col-lg-2">
    <label>Part Number</label> <p><?php if (!empty($viewOrder->order_name)) {
                     echo $viewOrder->order_name;
                 } else {
                     echo 'N/A';
                 } ?></p></div>

    <div class="col-lg-2">
    <label>Quote Price</label> <p><?php if (!empty($viewOrder->price_offer)) {
                     echo $viewOrder->price_offer;
                 } else {
                     echo 'N/A';
                 } ?></p></div>
<div class="col-lg-2">
<label>Status</label> <p><?php if (!empty($viewOrder->price_offer)) {
                     echo $viewOrder->price_offer;
                 } else {
                     echo 'N/A';
                 } ?></p></div>
<?php
             }
         } ?>

</div>


<?php
     }
 }
?>
<div class="col-lg-12">
<label>Prefer Delivery Date</label> <p><?php if (!empty($viewOrder->prefer_delivery_data)) {
    echo $viewOrder->prefer_delivery_data;
} else {
    echo 'N/A';
} ?></p></div> 

<?php if ($viewOffer[0]->request_wait_response == 1 && $viewOffer[0]->supplier_reject_buyerOffer_accepted == 0) {
    ?>
<div class="col-lg-12">
<h4><b>Accept offer:</b></h4>

<?php  if ($viewOffer[0]->supplier_accepted_buyer_offer) {
        echo "<p>Supplier Agree with buyer</p>";
    } else {
        ?>
<form method='post' action='/hawki/supplier/supplier_accept_offer/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Accept Offer</button></form>
<h4><b>Decline Offer:</b></h4>

<?php  if ($viewOffer[0]->supplier_reject_buyerOffer_accepted) {
            echo "<p>Buyer offer has been Declined</p>";
        } else {
            ?>
<form method='post' action='/hawki/supplier/reject_offer/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Decline Offer</button></form>
<?php
        }
    }
}?>
</div>

<div class="col-lg-12">

<h4><b>Product Image:</b></h4>

<?php $imahe1=$viewOffer[0]->image1;
if ($viewOffer[0]->image1) {
    ?>
<h3> images 1</h3>

<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image1); ?>" width="200" height="100"></img>
<?php
} ?>



<?php $imahe2=$viewOffer[0]->image2;

if ($viewOffer[0]->image2) {
    ?>
<h3>images 2</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image2); ?>" width="200" height="100"></img>
<?php
}

?>

<?php $imahe2=$viewOffer[0]->image3;

if ($viewOffer[0]->image3) {
    ?>
<h3>images 3</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image3); ?>" width="200" height="100"></img>
<?php
}

?>

<?php $imahe4=$viewOffer[0]->image4;

if ($viewOffer[0]->image4) {
    ?>
<h3> images 4</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image4); ?>" width="200" height="100"></img>
<?php
}

?>


<!-- <?php

    if ($result) {
        $r= explode(',', $result);
        foreach ($r as $s) {
            ?>
	     
	    <i class="fa fa-trash" aria-hidden="true" onclick="imagedelete('<?php echo $result; ?>','<?php echo $viewOffer[0]->offer_id_fk; ?>','<?php echo $s; ?>')">
              </i>
	   <img height="100" width="100" id="img1"  src="<?php echo base_url()?>uploads/<?php echo $s; ?>" class="img-responsive d oneimage"  data-img="<?php echo $s; ?>" >   
	<?php
        }
    } ?> -->
</div>


<div class="col-lg-12">
<h4><b>Payment Status:</b></h4>

<?php
if ($viewOffer[0]->buyer_payment_mark_paid) {
        echo "Buyer has done payment to you";
    }
    if ($viewOffer[0]->supplier_payment_mark_received) {
        echo "<p>Payment Success</p>";
    } else {
        ?>
		<p>buyer Waiting for Payment Confirmation</p><form method='post' action='/hawki/supplier/marks_as_paid/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Mark As Paid</button></form>
			<?php
    }$user_id = $this->session->userdata('user_supplier_session');
    $userId =$user_id->id;
     //print_r($userId);
    $this->db->where('user_id', $userId);
    $this->db->where('order_id', $orderId[0]);
    $query=$this->db->get('feedback');
    $result=$query->result();
    $num_rows=$query->row();
    $status=$num_rows->status;
        if ($num_rows) {
            ?>
		<h4><b>Feed Back <b></h4>	
	<?php 	echo $num_rows->description;
        } elseif (empty($num_rows)) {
            ?>

<?php if ($viewOffer[0]->supplier_payment_mark_received && $viewOffer[0]->supplier_accepted_buyer_offer) {
                $user_id = $this->session->userdata('user_buyer_session');
                $userId =$user_id->id;

                // $this->db->where('user_id',$userId);
                $this->db->where('order_id', $orderId[0]);
                $query=$this->db->get('feedback');
                $result=$query->result();
                $num_rows=$query->row();
                $status=$num_rows->status; ?>
	<h2>Submit Your Review</h2>
	
	<form class="form-horizontal formPost" method="POST" enctype="multipart/form-data" autocomplete="off"
	action="<?php echo site_url(); ?>supplier/save/rate" id="user-rating-form"> 
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Star rating</label>

        <div class="col-sm-10"  >
         <span class="user-rating">
         <input type="radio" name="star_rating" value="5"><span class="star"></span>
         <input type="radio" name="star_rating" value="4"><span class="star"></span>
		 <input type="radio" name="star_rating" value="3"><span class="star"></span>
		 <input type="radio" name="star_rating" value="2"><span class="star"></span>
         <input type="radio" name="star_rating" value="1"><span class="star"></span>
        </span>
        <input type="hidden" name="order_id" value="<?php echo $orderId[0]; ?>">
		<input type="hidden" name="url" value="<?php echo  $geturl; ?>">
		
		
        </div>
      </div>

      <div class="form-group">
       <label  class="col-sm-2 control-label">Description</label>
	   <textarea type="text"  name="description" value="" required></textarea>
      </div>
	<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success submit">Submit</button>
            </div>
    </div>
    </form>
</div>
<!-- end of col12 -->
<?php
            }
        }?>
</div>





<h4><b>Delivery status:</b></h4>

		<?php
        if ($viewOffer[0]->buyer_delivery_transit_status) {
            echo "<p>order delivery  success to buyer</p>";
        } else {
            echo "<p>order deliver  in procees </p>";
        }
        if ($viewOffer[0]->supplier_delivery_transit_status) {
            echo "<p>Delivery Success</p>";
        } else {
            echo "<p>Waiting for Payment</p><button type='button' class='btn btn-primary submitBtn' data-toggle='modal' data-target='#myModal'>Mark as delivered</button>" ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mark as delivered</h4>
      </div>
	  <form method='post' action='/hawki/supplier/transits_mark_as_recieved/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'>
      
      <div class="modal-body">
	     <div>
            <label >Tracking information</label>
		    <textarea type="text" name="traking_Info" required ></textarea>
		</div>

		<label >Logistic</label>
		<select name="logistic">
		<option value="AuPost">AuPost</option>
		<option value="StarTrack">StarTrack</option>
		<option value="DHL">DHL</option>
		<option   value="No tracking number">No tracking number</option>
	    </select>
      </div>

      <div class="modal-footer">
	  <button type='submit' class='btn btn-primary submitBtn'>Mark as delivered </button></form>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
        }?>
		

</div>



<!-- check more start --->
<!-- Latest minified bootstrap css -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<!-- Button to trigger modal -->


<!-- Modal -->




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

$('#user-rating-form').on('change','[name="star_rating"]',function(){
	$('#selected-rating').text($('[name="star_rating"]:checked').val());
});


</script>


<?php
if (isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])) {
    
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
            if (mail($to, $subject, $htmlContent, $headers)) {
                $status = 'ok';
            } else {
                $status = 'err';
            }
    
            // Output status
            echo $status;
            die;
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

function imagedelete(all_image,offer_id,particular_image){
	//alert(particular_image);
	
	
	var url ="<?php echo site_url();?>supplier/deletes/"+particular_image+"/"+offer_id;
	
    swal({
      title: "Are you sure to delete this Image?",
      text: "Once you deleted, can not recover again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }
        )
      .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        }
            );
        $.ajax({
          url: url,
          type: "get",
          dataType: 'json' ,
          success: function (respons) {
            if(respons){
				alert(respons);
				
              swal({
                text: "Deleted Successfull !!",
                type: "success",
                icon: "success"
              }
                  ).then(function() {
                window.location.reload();
              }
                        );
            }
          }
        }
              );
      }
    }
           );
    
  }
</script>


    