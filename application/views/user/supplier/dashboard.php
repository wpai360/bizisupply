<style>
  span.sent_button {
    cursor: pointer;
  }
</style>

<?php
//  a warning tell use to fill the payment info


if ($user->payment_term === null) {
  echo '<div class="alert alert-warning text-center"><strong> </strong>Please setup your accept payment method before make quote in <a href="';
  echo base_url('supplier/profile');;
  echo '">here</a></div>';
}

if ($this->session->flashdata('message')) { ?>
  <p id="load_limit"> <?php echo $this->session->flashdata('message') ?> </p>
<?php } ?>
<form action="<?php echo base_url('supplier/allactiOnOffer'); ?>" method="post">
<div class="table-responsive">
  <table id="example" data-intro='you check the order detail and make offer in here' class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr class="ref-sup">
        <th scope="col">S.no</th>
        <th scope="col">Order Id</th>
        <th scope="col">Orders</th>

        <th scope="col">Prefer Delivery Date</th>
        <!--<th scope="col">Payment terms</th>-->
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


      <?php  //pr($supplierOfferlist); 
      ?>
      <?php if (!empty($supplierOfferlist)) {
        for ($i = 0; $i < count($supplierOfferlist); $i++) {
          $productCount = 0;
          for ($v = 1; $v < 11; $v++) {
            $order_name = 'order_name_' . $v;
            if ($supplierOfferlist[$i]->$order_name != '') {
              $productCount++;
            }
          }; ?>

          <tr>
            <td><?php echo   $i; ?></td>
            <!-- <td style="text-align:center;"><?php //if(!empty($supplierOfferlist[$i]->order_id)){ echo   $supplierOfferlist[$i]->order_id;} else {echo 'N/A';}
                                                    ?></td> -->
            <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->order_random_id)) {
                                                  echo   $supplierOfferlist[$i]->order_random_id;
                                                } else {
                                                  echo 'N/A';
                                                } ?></td>

            <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->order_name_1)) {
                                                  if ($productCount > 1) {
                                                    for ($j = 1; $j < $productCount; $j++) {
                                                      echo $supplierOfferlist[$i]->{'order_name_' . $j};
                                                      echo ", ";
                                                    }
                                                    echo $supplierOfferlist[$i]->{'order_name_' . $productCount};
                                                  } else {
                                                    echo $supplierOfferlist[$i]->order_name_1;
                                                  }
                                                } else {
                                                  echo 'N/A';
                                                } ?></td>

            <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->prefer_delivery_data)) {
                                                $preferDate =  $supplierOfferlist[$i]->prefer_delivery_data;
                                                echo(date("d/m/Y", strtotime($preferDate)));
                                                } else {
                                                  echo 'N/A';
                                                } ?></td>
            <!-- <td  style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->payment_terms)) {
                                                        echo $supplierOfferlist[$i]->payment_terms;
                                                      } else {
                                                        echo 'N/A';
                                                      } ?></td>-->
            <!-- <td  style="text-align:center;"><a  href="<?php echo base_url('supplier/submitOffer/' . $supplierOfferlist[$i]->offer_id); ?>" >Make Offer for The Request</a> | <a  href="<?php echo base_url('supplier/ignoreOffer/' . $supplierOfferlist[$i]->offer_id); ?>" >Ignore</a><input type="hidden" name="gotOfferId[]"  value="<?php echo $supplierOfferlist[$i]->offer_id; ?>">
			</td>-->
            <td style="text-align:center;">
              <?php
                  $CI = &get_instance();
                  $CI->load->model('SupplierRequestModel');
                  $ViewofferList = $CI->SupplierRequestModel->check_Offer($supplierOfferlist[$i]->offer_id);
                  $checkCount = count($ViewofferList);
                  if ($checkCount) {
                    if ($ViewofferList[0]->form_status == 1) { ?>

                  <a href="<?php echo base_url('supplier/submitOffer/' . $supplierOfferlist[$i]->offer_id); ?>">
                    Manage offer</a> <?php } else {
                                              ?>
                  <a href="<?php echo base_url('supplier/submitOffer/' . $supplierOfferlist[$i]->offer_id); ?>">
                    Manage draft offer</a>
                <?php
                      } ?>
              <?php } else { ?>
                <a href="<?php echo base_url('supplier/submitOffer/' . $supplierOfferlist[$i]->offer_id); ?>">Make Offer for The Order</a> | <a href="javascript:void(0);" onclick="ignoreOrder(<?php echo $supplierOfferlist[$i]->offer_id; ?>)">Ignore</a><input type="hidden" name="gotOfferId[]" value="<?php echo $supplierOfferlist[$i]->offer_id; ?>">

              <?php } ?>


            </td>
          </tr>


      <?php }
      } ?>

    </tbody>



  </table>
    </div>
</form>







<script>
  $(document).ready(function() {
    $('.cancel').click(function() {
      var checkstr = confirm('are you sure you want to cancel this order?');
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
    $("#load_limit").slideUp(1500, function() {
      $("#load_limit").delay(5000).slideDown(500);
    });

    $("#example").DataTable({
      // "sPaginationType": "bootstrap",
    });

    $("#example1").DataTable({
      // "sPaginationType": "bootstrap",
    });
    $("#example2").DataTable({
      // "sPaginationType": "bootstrap",
    });
  });
</script>
