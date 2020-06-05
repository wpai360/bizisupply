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
      echo $num_rows->rate . '<br>';
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
        echo "<br> <button onclick='addToPrefer({$viewOffer[0]->supplier_user_id})' class='btn btn-primary prefer-btn
          '>Add to Preferred Supplier</button>";
      } elseif ($round == 5) {
        echo '<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star checked"></span> 
		 <span class="fa fa-star checked"></span>';
     echo "<br> <button onclick='addToPrefer({$viewOffer[0]->supplier_user_id})' class='btn btn-primary prefer-btn'>Add to Preferred Supplier</button>";
      }
?>
      <img src="<?echo base_url();?>assets/images/loading.gif" class='loading d-none'style="width:10%;"></img>

<?
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
  $('#user-rating-form').on('change', '[name="rating"]', function() {
    $('#selected-rating').text($('[name="rating"]:checked').val());
  });

  $( document ).ajaxStart(function() {
    $('.prefer-btn').text('Please wait');
    $('.loading').removeClass('d-none');
  });

  $( document ).ajaxComplete(function() {
    $('.prefer-btn').text('Add to prefer supplier');
    $('.loading').addClass('d-none');
  });

</script>
