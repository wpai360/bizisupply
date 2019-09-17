


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->



<!-- FastClick -->
<script src="<?= base_url();?>assets/theme/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/theme/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url();?>assets/theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?= base_url();?>assets/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url();?>assets/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url();?>assets/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url();?>assets/theme/bower_components/chart.js/Chart.js"></script>
<!-- Sweet alertjs-->
<script src="<?= base_url();?>assets/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>assets/theme/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script>
$('#validationServer06').multiselect({
    columns: 1,
    placeholder: 'Select Brands'
});
</script>
<script>
  $(function () {
    //$("#requestQuotes_listingTable").DataTable({iDisplayLength: 20, responsive: true, "autoWidth": false});

    $('#requestQuotes_listingTable').dataTable({
    	"autoWidth": true,
    	"aoColumns": [
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' } 
            ]

    });

    $('#requestQuotes_listingTable2').dataTable();

  });
</script>
<script type="text/javascript">
	$(function () {
  		$('#supplier_tooltip').tooltip({html:true});
  		$('#supplier_tooltip2').tooltip({html:true});
  		$('#supplier_tooltip3').tooltip({html:true});
	});
</script>
<script type="text/javascript">
  $(function () {
    $('#status_rejected').submit( function (e){
      e.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        type: 'POST',
        url : "<?php echo base_url('user/users/insertRejectReason');?>",
        data : form_data,
        dataType: 'json',
        success : function (data){
          console.log(data); 
          if(data.status=="1"){
            $('#reply_status_msg').html(data.msg);
            setTimeout(function(){window.location.href = data.redirect_url;},3000);
            
          }

        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){ 
    /*$('#quote_value').change(function(){
      alert("test");
    });*/
    $('#quote_value').bind('keyup change', function() {
      var quantity_value = $('#quote_value').val();
      var quantity = $('#quantity').val();
     
      var total = quantity*quantity_value;
      if(quantity_value !=""){
        $('#single_quantity_value').html('$'+quantity_value);
        $('#total_quantity_value').html('$'+total);
      }

      
    });
  });
</script>