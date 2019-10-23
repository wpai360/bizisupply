<h1 class="o-order">Draft offer list</h1>
<a class="btn btn-outline-secondary " role="button" href="<?php echo base_url('supplier/dashboard'); ?>" data-intro='Here is the new order you recevied' style="font-size:18px;">New Offers</a><span> | </span><a class="btn btn-primary" role="button" href="<?php echo base_url('supplier/draftOffers'); ?>"> Draft Offers</a>

<?php if ($this->session->flashdata('message')) { ?>
  <?php echo $this->session->flashdata('message') ?>
<?php } ?>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr class="ref">
      <th scope="col">S.no</th>
      <th scope="col">Order Id</th>
      <th scope="col">Offer Id</th>
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
 ?>

        <tr>
          <td><?php echo  $i; ?></td>
          <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->order_random_id)) {
                                                echo   $supplierOfferlist[$i]->order_random_id;
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
                                              <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->random_offer_id)) {
                                                echo $supplierOfferlist[$i]->random_offer_id;
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
          <td style="text-align:center;"><?php for($j = 1; $j < 10; $j++){
                if(!empty($supplierOfferlist[$i]->{'order_name_'.$j})){
                  echo   $supplierOfferlist[$i]->{'order_name_'.$j};
                }

                if(!empty($supplierOfferlist[$i]->{'order_name_'.($j + 1)})){
                  echo ',';
                }
          } ?></td>
          
          <td style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->prefer_delivery_data)) {
                                                echo $supplierOfferlist[$i]->prefer_delivery_data;
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
          <!-- <td  style="text-align:center;"><?php if (!empty($supplierOfferlist[$i]->payment_terms)) {
                                                      echo $supplierOfferlist[$i]->payment_terms;
                                                    } else {
                                                      echo 'N/A';
                                                    } ?></td>-->
          <td style="text-align:center;"><a href="<?php echo base_url('supplier/PublishOffer/' . $supplierOfferlist[$i]->offer_id); ?>">Publish</a> | <a href='javascript:;' onclick="deleteDraft('<?php echo $supplierOfferlist[$i]->offer_id; ?>')"> Delete</a></td>
        </tr>
      <?php } ?>

    <?php } ?>

  </tbody>

</table>

<script>
  $(document).ready(function() {
    $("#example").DataTable({});
  });

  const deleteDraft = (id) => {
    swal({
        title: "Are you sure to delete this draft offer?",
        text: '',
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          // if delete success, swal 
          $.ajax({
            type: 'POST',
            datatype:'json',
            url:'/HawkiWeb/supplier/deleteDraftOffer/'+id,
            success:function(msg){
              console.log(msg);
              swal("The draft offer has been deleted", {
              icon: "success",
            }).then((confirm) => {
                location.reload();
            });
            },
            error:function(){
              swal("Something is wrong, please try it again later", {
              icon: "warning",
            })
            }
          });
          
        }
      });
  };
</script>