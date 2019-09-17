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
.product-detail{
border-bottom:1px double;

background-color:white;

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
 
 

<div class="custm_label">
<div class="col-lg-12">

<?php 
 $productCount = 0;
 for($i=0; $i<10;$i++){
     if ($viewOrder->{'product'.$i.'_status'}==0 || $viewOrder->{'product'.$i.'_status'}==4 ){
        $productCount++;
     }
 }
 
 if ($productCount <10) {
             ?>
<div id="buyer_profile">
 <a class="custom_buyer"   href="<?php echo base_url('/buyer/profile'); ?>/<?php echo $viewOrder->user_id; ?>" style="">Buyer Profile</a>
 </div>
<?php
         } ?>

<label>Order ID</label> <h4> <?php if (!empty($viewOrder->order_random_id)) {
             echo $viewOrder->order_random_id;
         } else {
             echo 'N/A';
         } ?></h4>

<label style="margin-left:10px;">Offer ID </label> <h4 id="offer_no"> <?php if (!empty($viewOrder->random_offer_id)) {
             echo $viewOrder->random_offer_id;
         } else {
             echo 'N/A';
         } ?>
         </h4>
</div>
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
         <?php for ($i = 0; $i < 10; $i++) {
             if ($viewOrder->{'order_name_'.$i}!='' && $viewOrder->{'product'.$i.'_quote'}!='') {
                 ?>
   
          <label>Product <?php echo$i; ?></label>
          </div>
<div class="col-lg-12 product-detail">
<!-- offer product list -->
    
    <div class="col-lg-2">
    <label>Product Name</label> <p><?php if (!empty($viewOrder->{'order_name_'.$i})) {
                     echo $viewOrder->{'order_name_'.$i};
                 } else {
                     echo 'N/A';
                 } ?></p></div>
    <div class="col-lg-2">
    <label>Quantity</label> <p><?php if (!empty($viewOrder->{'quantity_'.$i})) {
                    if ($viewOrder->{'product'.$i.'_status'}==2 || $viewOrder->{'product'.$i.'_status'}==5  ) {
                        echo $viewOrder->{'product'.$i.'_quantity_no'};
                    }else{echo $viewOrder->{'quantity_'.$i};}
                 } else {
                     echo 'N/A';
                 }; ?></p></div>
    <div class="col-lg-2">
    <label>Brand Name</label> <p><?php if (!empty($viewOrder->{'brand_name_'.$i})) {
                     echo $viewOrder->{'brand_name_'.$i};
                 } else {
                     echo 'N/A';
                 } ?></p></div>

    <div class="col-lg-2">
    <label>Part Number</label> <p><?php if (!empty($viewOrder->{'part_number_'.$i})) {
                     echo $viewOrder->{'part_number_'.$i};
                 } else {
                     echo 'N/A';
                 } ?></p></div>

    <div class="col-lg-2">
    <label>Quote Price</label> <p><?php if (!empty($viewOrder->{'product'.$i.'_quote'})) {
                     echo $viewOrder->{'product'.$i.'_quote'};
                 } else {
                     echo 'N/A';
                 } ?></p></div>
    
    <div class="col-lg-2">
    <label>Discount Price</label> <p><?php if (!empty($viewOrder->{'product'.$i.'_quantity_price'})) {
                     echo $viewOrder->{'product'.$i.'_quantity_price'};
                 } else {
                     echo 'N/A';
                 } ?></p></div>
<div class="col-lg-12" id="status<?php echo $i;?>">
<label>Status</label> 
<?php if($viewOrder->{'product'.$i.'_status'} ==0){
    echo "<h4 style='color:#f1c40f;'>Waiting Buyer's response</h4>";
}elseif($viewOrder->{'product'.$i.'_status'} == 1){echo "<h4 style='color:#2ecc71;'>Buyer selected the quote</h4><button type='submit' class='btn btn-primary submitBtn'  onclick='continueOffer($i)'>continue</button> <button type='submit' class='btn btn-primary submitBtn'  onclick='rejectOffer($i)'>reject</button>";}
elseif($viewOrder->{'product'.$i.'_status'}==2){echo "<h4 style='color:#2ecc71'>Buyer selected the discount quote and changed the quantity </h4> <button type='submit' class='btn btn-primary submitBtn'  onclick='continueOffer2($i)'>continue with new quantity</button> <button type='submit' class='btn btn-primary submitBtn'  onclick='rejectOffer($i)'>reject</button>";}
elseif($viewOrder->{'product'.$i.'_status'}==3){echo "<h4 style='color:#2ecc71'>Supplier accepted to continue supply this product</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==4){echo "<h4 style='color:#e74c3c'>Supplier rejected to continue supply this product</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==5){echo "<h4 style='color:#2ecc71'>Supplier accepted to continue supply this product with new quantity</h4>";}?></div>
<div class="col-lg-12" id="total_price_<?php echo $i;?>">
<label>Total Price</label> 
<?php if($viewOrder->{'product'.$i.'_status'} ==0){
    // print_r($viewOrder);die;
    echo "<h4 style='color:#f1c40f;'> Waiting Buyer's response";"</h4>";
}elseif($viewOrder->{'product'.$i.'_status'} == 1){echo "<h4 style='color:#2ecc71;'>$";echo $viewOrder->{'product'.$i.'_quote'} * $viewOrder->{'quantity_'.$i};echo "</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==2){echo "<h4 style='color:#2ecc71;'>$";echo $viewOrder->{'product'.$i.'_quantity_price'} * $viewOrder->{'product'.$i.'_quantity_no'};echo "</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==3){echo "<h4 style='color:#2ecc71;'>$";echo $viewOrder->{'product'.$i.'_quote'} * $viewOrder->{'quantity_'.$i};echo "</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==4){echo "<h4 style='color:#e74c3c'>Supplier rejected to continue supply this product</h4>";}
elseif($viewOrder->{'product'.$i.'_status'}==5){echo "<h4 style='color:#2ecc71;'>$";echo $viewOrder->{'product'.$i.'_quantity_price'} * $viewOrder->{'product'.$i.'_quantity_no'};echo "</h4>";}?></div>
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



<div class="col-lg-12">

<h4><b>Product Images:</b></h4>

<?php $imahe1=$viewOffer[0]->image1;
if ($viewOffer[0]->image1) {
    ?>
<h3> Image 1</h3>

<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image1); ?>" width="200" height="100"></img>
<?php
} ?>



<?php $imahe2=$viewOffer[0]->image2;

if ($viewOffer[0]->image2) {
    ?>
<h3>Image 2</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image2); ?>" width="200" height="100"></img>
<?php
}

?>

<?php $imahe2=$viewOffer[0]->image3;

if ($viewOffer[0]->image3) {
    ?>
<h3>Image 3</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image3); ?>" width="200" height="100"></img>
<?php
}

?>

<?php $imahe4=$viewOffer[0]->image4;

if ($viewOffer[0]->image4) {
    ?>
<h3> Image 4</h3>	
<img src="<?php echo base_url('uploads/'. $viewOffer[0]->image4); ?>" width="200" height="100"></img>
<?php
}

?>



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
		<p>buyer Waiting for Payment Confirmation</p><form method='post' action='/HawkiWeb/supplier/marks_as_paid/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'><button type='submit' class='btn btn-primary submitBtn'>Mark As Payment Recevied</button></form>
			<?php
    }$user_id = $this->session->userdata('user_supplier_session');
    $userId =$user_id->id;
     //print_r($userId);
    $this->db->where('user_id', $viewOffer[0]->buyer_user_id);
    $this->db->where('order_id', $orderId[0]);
    $query=$this->db->get('feedback');
    $result=$query->result();
    $num_rows=$query->row();
    $status=$num_rows->status;
        if ($num_rows) {
            ?>
		<h4><b>Feed Back <b></h4>	
	<?php 	echo $num_rows->rate;
        } elseif (empty($num_rows)) {
            ?>

<?php if ($viewOffer[0]->supplier_payment_mark_received) {

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
        <input type="hidden" name="buyer_id" value="<?php echo $viewOffer[0]->buyer_user_id; ?>">
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
            echo "<p>Waiting for Payment</p><button type='button' class='btn btn-primary submitBtn' data-toggle='modal' data-target='#myModal'>Mark as Dispatched</button>" ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mark as Dispatched</h4>
      </div>
	  <form method='post' action='/HawkiWeb/supplier/transits_mark_as_recieved/<?php echo $viewOffer[0]->marked_offer_id.'/'.$viewOffer[0]->offer_id_fk; ?>'>
      
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
	  <button type='submit' class='btn btn-primary submitBtn'>Mark as Dispatched </button></form>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
        }?>
		

</div>








<script>
function continueOffer(product_no){
    var offer_no =$("#offer_no").text().trim();
    var id = product_no;
    console.log(offer_no);
    console.log(id);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'/HawkiWeb/supplier/supplier_continue_offer/'+offer_no + '/' + id,
		success:function(msg){	
            //reload the div

            $( "#buyer_profile" ).load(" #buyer_profile" );
            $('#status' + id).load(' #status' + id);
            $('#total_price_' + id).load(' #total_price_'+id);	
		}
	});
	
}

function continueOffer2(product_no){
    var offer_no =$("#offer_no").text().trim();
    var id = product_no;
    console.log(offer_no);
    console.log(id);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'/HawkiWeb/supplier/supplier_continue_offer_qty/'+offer_no + '/' + id,
		success:function(msg){
            //reload the div	

            $( "#buyer_profile" ).load(" #buyer_profile" );
            $('#status' + id).load(' #status' + id);	
            $('#total_price_' + id).load(' #total_price_'+id);	
		}
	});
	
}

function rejectOffer(product_no){
    var offer_no =$("#offer_no").text().trim();
    var id = product_no;
    console.log(offer_no);
    console.log(id);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'/HawkiWeb/supplier/reject_offer/'+offer_no + '/' + id,
		success:function(msg){	

            $( "#buyer_profile" ).load(" #buyer_profile" );
            $('#status' + id).load(' #status' + id);	
            $('#total_price_' + id).load(' #total_price_'+id);	
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


    