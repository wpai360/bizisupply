<!--<a href="<?php //echo base_url('buyer/buyerOrderDashboard');
              ?>">BACK</a>-->
<?php if ($this->session->flashdata('message')) { ?>
  <?php echo $this->session->flashdata('message') ?>
<?php }

$controller = $this->uri->segment(1); // controller
$action  = $this->uri->segment(2);
$stsegment =  $this->uri->segment(3); // 1stsegment
$id = $this->uri->segment(4);
$url =  base_url();
$geturl = "$url$controller/$action/$stsegment/$id";


?>
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
    content: "ï€†";
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
    content: "\f006";
    /*padding-right: 5px;*/
  }

  .user-rating input:hover+span.star:before,
  .user-rating input:hover+span.star~span.star:before,
  .user-rating input:checked+span.star:before,
  .user-rating input:checked+span.star~span.star:before {
    color: #ffd100;
    content: "\f005";
  }

  .selected-rating {
    color: #ffd100;
    font-weight: bold;
    font-size: 3em;
  }

  .checked {
    color: orange;
  }

  span.hh {
    color: #00b7e3;
  }
</style>
<div class="custom_container custm_label">
  <?php

  //echo "<pre>";
  //pr($viewOffer);
  //die;
  //$viewOrder =$viewOffer;
  if (!empty($viewOffer)) {

    foreach ($viewOffer as $viewOrder) {
      ?>
      <a class="btn btn-primary custom_btn" href="<?php echo base_url('/supplier/profile/'); ?><?php echo $viewOrder->supplier_user_id; ?>/<?php echo $viewOrder->offer_id_fk; ?>" style="float: right;">Supplier Profile</a>


      <div class="">
        <label>Order Id</label>
        <p><?php if (!empty($viewOrder->order_random_id)) {
                  echo $viewOrder->order_random_id;
                } else {
                  echo 'N/A';
                } ?></p><br>
        <label>Offer Id </label>
        <p><?php if (!empty($viewOrder->order_random_id)) {
                  echo $viewOrder->random_offer_id;
                } else {
                  echo 'N/A';
                } ?></p><br>
        <label>Supplier Name</label>
        <p><?php if (!empty($viewOrder->name)) {
                  echo $viewOrder->name;
                } else {
                  echo 'N/A';
                } ?></p><br>

        <?php for ($i = 1; $i < 10; $i++) {

              // normal quote
              if ($viewOrder->{'product' . $i . '_status'} == 3) {
                ?>
            <div class="row">

              <div class="col-lg-2">
                <label>Product Name</label>
                <p><?php if (!empty($viewOrder->{'order_name_' . $i})) {
                              echo $viewOrder->{'order_name_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Quantity</label>
                <p><?php if (!empty($viewOrder->{'quantity_' . $i})) {
                              echo $viewOrder->{'quantity_' . $i};
                            } else {
                              echo 'N/A';
                            }; ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Brand Name</label>
                <p><?php if (!empty($viewOrder->{'brand_name_' . $i})) {
                              echo $viewOrder->{'brand_name_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Part Number</label>
                <p><?php if (!empty($viewOrder->{'part_number_' . $i})) {
                              echo $viewOrder->{'part_number_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Product Price</label>
                <p><?php if (!empty($viewOrder->{'product' . $i . '_quote'})) {
                              echo '$';
                              echo $viewOrder->{'product' . $i . '_quote'};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>

              <div class="col-lg-2">
                <label>Total Price</label>
                <p><?php if (!empty($viewOrder->{'product' . $i . '_quote'})) {
                              echo '$';
                              echo $viewOrder->{'product' . $i . '_quote'} * $viewOrder->{'quantity_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>

            </div>
          <?php }
                // quantity quote
                if ($viewOffer[0]->{'product' . $i . '_status'} == 5) {
                  ?>
            <div class="row">

              <div class="col-lg-2">
                <label>Product Name</label>
                <p><?php if (!empty($viewOrder->{'order_name_' . $i})) {
                              echo $viewOrder->{'order_name_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Quantity</label>
                <p><?php if (!empty($viewOrder->{'product' . $i . '_quantity_no'})) {
                              echo $viewOrder->{'product' . $i . '_quantity_no'};
                            } else {
                              echo 'N/A';
                            }; ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Brand Name</label>
                <p><?php if (!empty($viewOrder->{'brand_name_' . $i})) {
                              echo $viewOrder->{'brand_name_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Part Number</label>
                <p><?php if (!empty($viewOrder->{'part_number_' . $i})) {
                              echo $viewOrder->{'part_number_' . $i};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>
              <div class="col-lg-2">
                <label>Product Price</label>
                <p><?php if (!empty($viewOrder->{'product' . $i . '_quantity_price'})) {
                              echo '$';
                              echo $viewOrder->{'product' . $i . '_quantity_price'};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>

              <div class="col-lg-2">
                <label>Total Price</label>
                <p><?php if (!empty($viewOrder->{'product' . $i . '_quantity_price'})) {
                              echo '$';
                              echo $viewOrder->{'product' . $i . '_quantity_price'} * $viewOrder->{'product' . $i . '_quantity_no'};
                            } else {
                              echo 'N/A';
                            } ?></p><br>
              </div>

            </div>
        <?php }
            } ?>
        <label>Prefer Delivery Date</label>
        <p><?php if (!empty($viewOrder->prefer_delivery_data)) {
                  echo $viewOrder->prefer_delivery_data;
                } else {
                  echo 'N/A';
                } ?></p><br>
      </div>


      <label>Tracking Information </label>
      <p><?php if (!empty($viewOrder->traking_Info)) {
                echo $viewOrder->traking_Info;
              } else {
                echo 'N/A';
              } ?></p><br>

      <label>Carrier</label>
      <p><?php if (!empty($viewOrder->logistic)) {
                echo $viewOrder->logistic;
              } else {
                echo 'N/A';
              } ?></p><br>
      <?php
          // use strops to check if the payment term is avaliable
          if (strpos($viewOrder->payment_term, '1') !== false) { ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Pay with Paypal</button>
      <?php } ?>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pay with paypal</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>


            </div>
            <div class="modal-body">
              <p>PayPal Account(Email or Phone number)-<span class="hh"><?php echo $viewOrder->paypalEmail;  ?> </span> </p>
            </div>

            <div class="modal-footer">

            </div>
          </div>

        </div>
      </div>
      <?php if (strpos($viewOrder->payment_term, '2') !== false) { ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pay with Bpay</button>
      <?php } ?>
      <!-- Modal -->
      <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pay with Bpay</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pay with Bpay</h4>
            </div>
            <div class="modal-body">

              <p>Bpay Account(Biller code)-<span class="hh"><? echo $viewOrder->billerCode; ?></span> </p>


            </div>


            <div class="modal-footer">

            </div>
          </div>

        </div>
      </div>

      <?php if (strpos($viewOrder->payment_term, '3') !== false) { ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Pay with payId</button>
      <?php } ?>
      <!-- Modal -->
      <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pay with pay Id</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">



              <p> Business PayID(ABN numer)- <span class="hh"><?php echo $viewOrder->abnNumber; ?></span> </p>


            </div>


            <div class="modal-footer">

            </div>
          </div>

        </div>
      </div>
      <?php if (strpos($viewOrder->payment_term, '4') !== false) { ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal4">Pay with bank transfer</button>
      <?php } ?>
      <!-- Modal -->
      <div id="myModal4" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pay with bank transfer</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

              <p> BSB number -<span class="hh"><?php echo $viewOrder->bsbNumber; ?> </span></p>

              <p> Bank accounnt- <span class="hh"><?php echo $viewOrder->bankAccount; ?></span></p>
            </div>


            <div class="modal-footer">

            </div>
          </div>

        </div>
      </div>

  <?php }
  } ?>

  <h4><b>Payment Status:</b></h4>
  <?php
  if ($viewOffer[0]->buyer_payment_mark_paid) {
    echo "<p>Payment Success</p>";
  } else { ?>
    <p>Waiting for Payment</p>
    <?php
      echo form_open('buyer/mark_as_paid/' . $viewOffer[0]->marked_offer_id . '/' . $viewOffer[0]->offer_id_fk); ?>
    <button type='submit' class='btn btn-primary submitBtn'>Mark as paid</button>
  <?php echo form_close();
  } ?>


  <h4><b>Delivery status :</b></h4>

  <?php
  if ($viewOffer[0]->buyer_delivery_transit_status) {
    echo "<p>Delivery Success</p>";
  } else { ?>
    <p>Waiting for Delivery</p>

    <?php
      echo form_open('buyer/transit_mark_as_recieved/' . $viewOffer[0]->marked_offer_id . '/' . $viewOffer[0]->offer_id_fk); ?>
    <button type='submit' class='btn btn-primary submitBtn'>Mark as received</button>
  <?php echo form_close();
  } ?>

  <?Php

  $this->db->where('user_id', $viewOffer[0]->supplier_user_id);
  $this->db->where('offer_id', $viewOffer[0]->offer_id);
  $query = $this->db->get('buyer_feedback');
  $result = $query->result();
  $num_rows = $query->row();
  if ($num_rows) { ?>
    <h4><b>Feedback <b></h4>
    <?php
      echo $num_rows->description . '<br>';
      $average = $num_rows->average;

      $round = round($average);
      //if(){}

      if ($round == 1) {

        echo '<span class="fa fa-star checked"></span><span class="fa fa-star" ></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
      } elseif ($round == 2) {

        echo '<span class="fa fa-star checked"></span><span class="fa fa-star"  checked></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
      } elseif ($round == 3) {

        echo '<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>';
      } elseif ($round == 4) {

        echo '<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star"></span>';
      } elseif ($round == 5) {

        echo '<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star checked"></span> 
		 <span class="fa fa-star checked"></span>';
      }

      echo  "(" . $round . ")";
    } elseif (empty($num_rows)) {



      if ($viewOffer[0]->buyer_delivery_transit_status &&  $viewOffer[0]->buyer_payment_mark_paid) {
        ?>


      <h2> Rate the Supplier</h2>
      <?php
      echo form_open_multipart('buyer/save/rate', 'id = "user-rating-form"'); ?>


        <div class="form-group">
          <label for="inputName" class="col-sm-2 control-label">Communication</label>

          <div class="col-sm-10">
            <span class="user-rating">
              <input type="radio" name="attitute" value="5"><span class="star"></span>
              <input type="radio" name="attitute" value="4"><span class="star"></span>
              <input type="radio" name="attitute" value="3"><span class="star"></span>
              <input type="radio" name="attitute" value="2"><span class="star"></span>
              <input type="radio" name="attitute" value="1"><span class="star"></span>
            </span>

          </div>
        </div>

        <div class="form-group">
          <label for="inputName" class="col-sm-2 control-label">Goods quality</label>

          <div class="col-sm-10">
            <span class="user-rating">
              <input type="radio" name="good_quality" value="5"><span class="star"></span>
              <input type="radio" name="good_quality" value="4"><span class="star"></span>
              <input type="radio" name="good_quality" value="3"><span class="star"></span>
              <input type="radio" name="good_quality" value="2"><span class="star"></span>
              <input type="radio" name="good_quality" value="1"><span class="star"></span>
            </span>
            <input type="hidden" name="offer_id" value="<?php echo $viewOffer[0]->offer_id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $viewOffer[0]->supplier_user_id; ?>">
            <input type="hidden" name="url" value="<?php echo  $geturl; ?>">

          </div>
        </div>

        <div class="form-group">
          <label for="inputName" class="col-sm-2 control-label">Delivery speed</label>

          <div class="col-sm-10">
            <span class="user-rating">
              <input type="radio" name="delivery_speed" value="5"><span class="star"></span>
              <input type="radio" name="delivery_speed" value="4"><span class="star"></span>
              <input type="radio" name="delivery_speed" value="3"><span class="star"></span>
              <input type="radio" name="delivery_speed" value="2"><span class="star"></span>
              <input type="radio" name="delivery_speed" value="1"><span class="star"></span>
            </span>

          </div>
        </div>



        <div class="form-group">
          <label class="col-sm-2 control-label">How Well did we do?</label>
          <textarea type="text" name="description" value="" required></textarea>


        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success submit">Submit</button>
          </div>
        </div>
        <?php echo form_close();?>





  <?php  }
  }

  ?>
  <br>




</div>




<!-- check more start --->
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



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
          </div>
          <div class="form-group">
            <label for="inputName">Supplier</label>
            <p id="supplier_name"></p>
          </div>
          <div class="form-group">
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
          </div>
          <div class="form-group">
            <label for="inputName">payment terms </label>
            <p id="payment_terms"></p>
          </div>
          <div class="form-group">
            <label for="inputName">description</label>
            <p id="description"></p>
          </div>

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
  function testFunction(id) {

    $.ajax({
      type: 'GET',
      datatype: 'json',
      url: '/HawkiWeb/buyer/viewCheckOrder/' + id,
      success: function(msg) {

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




  function acceptOffer() {
    var offer_no = $("#offer_no").text();


    $.ajax({
      type: 'GET',
      datatype: 'json',
      url: '/HawkiWeb/buyer/acceptOffer/' + offer_no,
      success: function(msg) {
        alert('Offer is accepted ,and futher work is under working');
        // var array = JSON.parse("[" + msg + "]");
        //  var array = JSON.parse(msg);
        // alert(msg);
        // console.log(msg);


      }
    });



  }

  function submitContactForm() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if (name.trim() == '') {
      alert('Please enter your name.');
      $('#inputName').focus();
      return false;
    } else if (email.trim() == '') {
      alert('Please enter your email.');
      $('#inputEmail').focus();
      return false;
    } else if (email.trim() != '' && !reg.test(email)) {
      alert('Please enter valid email.');
      $('#inputEmail').focus();
      return false;
    } else if (message.trim() == '') {
      alert('Please enter your message.');
      $('#inputMessage').focus();
      return false;
    } else {
      $.ajax({
        type: 'POST',
        url: 'submit_form.php',
        data: 'contactFrmSubmit=1&name=' + name + '&email=' + email + '&message=' + message,
        beforeSend: function() {
          $('.submitBtn').attr("disabled", "disabled");
          $('.modal-body').css('opacity', '.5');
        },
        success: function(msg) {
          if (msg == 'ok') {
            $('#inputName').val('');
            $('#inputEmail').val('');
            $('#inputMessage').val('');
            $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
          } else {
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
if (isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])) {

  // Submitted form data
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $message = $_POST['message'];

  /*
     * Send email to admin
     */
  $to     = 'admin@example.com';
  $subject = 'Contact Request Submitted';

  $htmlContent = '
    <h4>Contact request has submitted at CodexWorld, details are given below.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Name:</th><td>' . $name . '</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>' . $email . '</td>
        </tr>
        <tr>
            <th>Message:</th><td>' . $message . '</td>
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
  $(document).ready(function() {
    $('.delete').click(function() {
      var checkstr = confirm('are you sure you want to delete this?');
      if (checkstr == true) {
        // do your code
      } else {
        return false;
      }
    });
  });
</script>



<script>
  $(document).ready(function() {
    $("#example").DataTable({
      // "sPaginationType": "bootstrap",
    });
  });
</script>

<script>
  $('#user-rating-form').on('change', '[name="rating"]', function() {
    $('#selected-rating').text($('[name="rating"]:checked').val());
  });
</script>