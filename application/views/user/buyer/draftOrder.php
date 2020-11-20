<a href="<?php echo base_url('buyer/buyerOrderDashboard'); ?>">BACK</a>
<?php if ($this->session->flashdata('message')) { ?>
  <?php echo $this->session->flashdata('message') ?>
<?php } ?>
<table data-intro="Draft order is a part order waiting for more info or a completed purchase order/quote for project on hold or A completed purchase order/quote for project on hold. Draft orders will be held in the system for 90 days, you can extend the expire date." id="example" class="table tablestriped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr class="ref">
      <th scope="col">No</th>
      <th scope="col">Order no.</th>
      <th scope="col">Category</th>
      <th scope="col">Orders</th>
      <th scope="col">Prefer Delivery Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($draftOrder)) {
      for ($i = 0; $i < count($draftOrder); $i++) {
        ?>
        <tr>
          <td><?php echo $i;?></td>
          <td style="text-align:center;"><?php if (!empty($draftOrder[$i]->order_random_id)) {
                                                echo   $draftOrder[$i]->order_random_id;
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
          <td style="text-align:center;"><?php if (!empty($draftOrder[$i]->order_random_id)) {
                                                echo   $draftOrder[$i]-> name;
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
          <td style="text-align:center;"><?php if (!empty($draftOrder[$i]->order_name_1)) {
                                                echo   $draftOrder[$i]->order_name_1;
                                                for ($j = 2; $j < 9; $j++) {
                                                  if ($draftOrder[$i]->{'order_name_' . $j} != NULL) {
                                                    echo ', ';
                                                    echo   $draftOrder[$i]->{'order_name_' . $j};
                                                  }
                                                }
                                              } else {
                                                echo 'N/A';
                                              } ?></td>
          <td style="text-align:center;"><?php if (!empty($draftOrder[$i]->prefer_delivery_data)) {
                                                echo $draftOrder[$i]->prefer_delivery_data;
                                              } else {
                                                echo 'N/A';
                                              } ?> </td>
          <td style="text-align:center;">
            <a href="<?php echo base_url('buyer/editOrder/' . $draftOrder[$i]->order_id); ?>">Edit</a>
 | <a onClick="cancelOrder(<?php echo $draftOrder[$i]->order_id; ?>)"  href="javascript:void(0);" rel="noopener noreferrer" >Delete</a></td>
        </tr>
      <?php }
      } else { ?>
      <tr>
        <td colspan="12" style="text-align:center;">
          <h2>There is no Record..</h2>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $('.delete').on('click', function(e) {
      var id = $(this).data('id');

      var message = $(this).data('confirm');
      //pop up	
      $.ajaxSetup({
        data: csrfData
     });
      $.ajax({
        url: "<?php echo site_url(); ?>buyer/cancelOrder/id",
        type: "post",
        data: {
          "id": id,
          "_token": "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(respons) {
          if (respons) {
            swal({
              text: "Deleted Successfull !!",
              type: "success",
              icon: "success"
            }).then(function() {
              window.location.reload();
            });
          }
        }
      });
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
