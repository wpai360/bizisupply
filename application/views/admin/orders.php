<?php 

if($this->session->flashdata('msg')){
  echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
}

?>
<section class="content">
<!-- pending -->
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of Pending Order</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive" id="userList">
      <table class="table no-margin">
        <thead>
          <tr>
           <th>No.</th>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Color </th>
            <th>Quantity </th>
            <th>Brand </th>
            <th>Category </th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>   
              <th>Action</th>   
          </tr>
        </thead>
        <tbody>
          <?php 
          //pr($pendingOrder); ?>
          <?php if(!empty($pendingOrder)): 
          $i =1;
          foreach($pendingOrder as $order): ?>
          <tr>
            <td><?php echo $i ?></td>
           <td><?php echo $order->serial_no ?></td>
            <td><?php echo $order->product_name; ?></td>
            <td><?php echo $order->size; ?></td>
            <td>
              <?php
                if($order->color=='1'){
                    echo "Blue";
                  }elseif($order->color=='2'){
                    echo "Red";
                  }elseif($order->color=='3'){
                    echo "Green";
                  }elseif($order->color=='4'){
                    echo "Yellow";
                  }elseif($order->color=='5'){
                    echo "Pink";
                  }elseif($order->color=='6'){
                    echo "Black";
                  }elseif($order->color=='7'){
                    echo "White";
                  }elseif($order->color=='8'){
                    echo "Orange";
                  }elseif($order->color=='9'){
                    echo "Grey";
                  } 
              ?>
            </td>
            <td><?php echo $order->quantity; ?></td>
            <td><?php 
                    $brandExp = explode(',', $order->brand);
                    $brand ="";
                    if (in_array("1", $brandExp)){
                      $brand .= "Cyclone,";                 
                    }if(in_array("2", $brandExp)){
                      $brand .= "Herdsman,";
                    }if(in_array("3", $brandExp)){
                      $brand .= "OK,";
                    }if(in_array("4", $brandExp)){
                      $brand .= "Redbrand,";
                    }if(in_array("5", $brandExp)){
                      $brand .= "Sheffield,";
                    }if(in_array("6", $brandExp)){
                      $brand .= "Waratah";
                    }
                    echo $brand; 
                  ?></td>
              <td>
               <?php  
                      $CI =& get_instance();
                      $CI->load->model('category'); 
                      $CatName = $CI->category->getCategoryByID($order->category);
                      $CI->load->model('type'); 
                      $TypeName = $CI->type->getTypesByID($order->types);
                ?>

             <?php echo $CatName->name; ?></td>
             <td><?php echo $TypeName->name;  ?></td>
             <td><?php echo time_elapsed_string($order->date, true);?></td>   
             <td><?php echo $order->status; ?></td>
         

         
          <td>
            <a href="<?php echo base_url('admin/orders/edit/'.$order->id);?>">Assign Supplier</a> 
           <!--  <a target ="blank"  href="<?php echo base_url('admin/user/profile/'.$order->id);?>"><i class="fa fas fa-eye" aria-hidden="true"></i></a> /  -->
            
            <!-- <a attrId="<?php echo $order->id;?>" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
          </td>

        </tr>

        <?php $i++; endforeach; else: ?>
        <tr><td colspan ="6">No Pending Order Found...</td> </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
</div>

<!--   Prcessed -->

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of Processing Order</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive" id="userList">
      <table class="table no-margin">
        <thead>
          <tr>
           <th>No.</th>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Color </th>
            <th>Quantity </th>
            <th>Brand </th>
            <th>Category </th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>   
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($processOrder)): 
          $i =1;
          foreach($processOrder as $order): ?>
          <tr>
            <td><?php echo $i ?></td>
           <td><?php echo $order->serial_no ?></td>
            <td><?php echo $order->product_name; ?></td>
            <td><?php echo $order->size; ?></td>
            <td><?php
                if($order->color=='1'){
                    echo "Blue";
                  }elseif($order->color=='2'){
                    echo "Red";
                  }elseif($order->color=='3'){
                    echo "Green";
                  }elseif($order->color=='4'){
                    echo "Yellow";
                  }elseif($order->color=='5'){
                    echo "Pink";
                  }elseif($order->color=='6'){
                    echo "Black";
                  }elseif($order->color=='7'){
                    echo "White";
                  }elseif($order->color=='8'){
                    echo "Orange";
                  }elseif($order->color=='9'){
                    echo "Grey";
                  } 
              ?>
            </td>
            <td><?php echo $order->quantity; ?></td>
            <td><?php 
                    $brandExp = explode(',', $order->brand);
                    $brand ="";
                    if (in_array("1", $brandExp)){
                      $brand .= "Cyclone,";                 
                    }if(in_array("2", $brandExp)){
                      $brand .= "Herdsman,";
                    }if(in_array("3", $brandExp)){
                      $brand .= "OK,";
                    }if(in_array("4", $brandExp)){
                      $brand .= "Redbrand,";
                    }if(in_array("5", $brandExp)){
                      $brand .= "Sheffield,";
                    }if(in_array("6", $brandExp)){
                      $brand .= "Waratah";
                    }
                    echo $brand; 
                  ?></td>
              <td>
               <?php  
                      $CI =& get_instance();
                      $CI->load->model('category'); 
                      $CatName = $CI->category->getCategoryByID($order->category);
                      $CI->load->model('type'); 
                      $TypeName = $CI->type->getTypesByID($order->types);
                ?>

             <?php echo $CatName->name; ?></td>
             <td><?php echo $TypeName->name;  ?></td>
             <td><?php echo time_elapsed_string($order->date, true);?></td>   
             <td><?php echo $order->status; ?></td>
         

         
          <td>
            <a href="<?php echo base_url('admin/orders/edit/'.$order->id);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>

        </tr>

        <?php $i++; endforeach; else: ?>
        <tr><td colspan ="6">No Processing Order Found...</td> </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
</div>

<!--   Ordered -->

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of Ordered Order</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive" id="userList">
      <table class="table no-margin">
        <thead>
          <tr>
           <th>No.</th>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Color </th>
            <th>Quantity </th>
            <th>Brand </th>
            <th>Category </th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>   
            <!--   <th>Action</th> -->   
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($Ordered)): 
          $i =1;
          foreach($Ordered as $order): ?>
          <tr>
            <td><?php echo $i ?></td>
           <td><?php echo $order->serial_no ?></td>
            <td><?php echo $order->product_name; ?></td>
            <td><?php echo $order->size; ?></td>
            <td>
              <?php
                if($order->color=='1'){
                    echo "Blue";
                  }elseif($order->color=='2'){
                    echo "Red";
                  }elseif($order->color=='3'){
                    echo "Green";
                  }elseif($order->color=='4'){
                    echo "Yellow";
                  }elseif($order->color=='5'){
                    echo "Pink";
                  }elseif($order->color=='6'){
                    echo "Black";
                  }elseif($order->color=='7'){
                    echo "White";
                  }elseif($order->color=='8'){
                    echo "Orange";
                  }elseif($order->color=='9'){
                    echo "Grey";
                  } 
              ?>
            </td>
            <td><?php echo $order->quantity; ?></td>
            <td><?php 
                    $brandExp = explode(',', $order->brand);
                    $brand ="";
                    if (in_array("1", $brandExp)){
                      $brand .= "Cyclone,";                 
                    }if(in_array("2", $brandExp)){
                      $brand .= "Herdsman,";
                    }if(in_array("3", $brandExp)){
                      $brand .= "OK,";
                    }if(in_array("4", $brandExp)){
                      $brand .= "Redbrand,";
                    }if(in_array("5", $brandExp)){
                      $brand .= "Sheffield,";
                    }if(in_array("6", $brandExp)){
                      $brand .= "Waratah";
                    }
                    echo $brand; 
                  ?></td>
              <td>
               <?php  
                      $CI =& get_instance();
                      $CI->load->model('category'); 
                      $CatName = $CI->category->getCategoryByID($order->category);
                      $CI->load->model('type'); 
                      $TypeName = $CI->type->getTypesByID($order->types);
                ?>

             <?php echo $CatName->name; ?></td>
             <td><?php echo $TypeName->name;  ?></td>
             <td><?php echo time_elapsed_string($order->date, true);?></td>   
             <td><?php echo $order->status; ?></td>
         

         
         <!--  <td><a target ="blank"  href="<?php echo base_url('admin/user/profile/'.$order->id);?>"><i class="fa fas fa-eye" aria-hidden="true"></i></a> / <a href="<?php echo base_url('admin/user/edit/'.$order->id);?>" target ="blank" ><i class="fa fa-edit" aria-hidden="true"></i></a> / <a attrId="<?php echo $order->id;?>" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->

        </tr>

        <?php $i++; endforeach; else: ?>
        <tr><td colspan ="6">No Ordered Order Found...</td> </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
</div>

<!--   Completed -->

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of Completed Order</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive" id="userList">
      <table class="table no-margin">
        <thead>
          <tr>
           <th>No.</th>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Color </th>
            <th>Quantity </th>
            <th>Brand </th>
            <th>Category </th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>   
            <!-- <th>Action</th>  -->  
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($Completed)): 
          $i =1;
          foreach($Completed as $order): ?>
          <tr>
            <td><?php echo $i ?></td>
           <td><?php echo $order->serial_no ?></td>
            <td><?php echo $order->product_name; ?></td>
            <td><?php echo $order->size; ?></td>
            <td>
              <?php
                if($order->color=='1'){
                    echo "Blue";
                  }elseif($order->color=='2'){
                    echo "Red";
                  }elseif($order->color=='3'){
                    echo "Green";
                  }elseif($order->color=='4'){
                    echo "Yellow";
                  }elseif($order->color=='5'){
                    echo "Pink";
                  }elseif($order->color=='6'){
                    echo "Black";
                  }elseif($order->color=='7'){
                    echo "White";
                  }elseif($order->color=='8'){
                    echo "Orange";
                  }elseif($order->color=='9'){
                    echo "Grey";
                  } 
              ?>
              

            </td>
            <td><?php echo $order->quantity; ?></td>
            <td>
                <?php 
                    $brandExp = explode(',', $order->brand);
                    $brand ="";
                    if (in_array("1", $brandExp)){
                      $brand .= "Cyclone,";                 
                    }if(in_array("2", $brandExp)){
                      $brand .= "Herdsman,";
                    }if(in_array("3", $brandExp)){
                      $brand .= "OK,";
                    }if(in_array("4", $brandExp)){
                      $brand .= "Redbrand,";
                    }if(in_array("5", $brandExp)){
                      $brand .= "Sheffield,";
                    }if(in_array("6", $brandExp)){
                      $brand .= "Waratah";
                    }
                    echo $brand; 
                  ?>
            </td>
             <td>
               <?php  
                      $CI =& get_instance();
                      $CI->load->model('category'); 
                      $CatName = $CI->category->getCategoryByID($order->category);
                      $CI->load->model('type'); 
                      $TypeName = $CI->type->getTypesByID($order->types);
                ?>

             <?php echo $CatName->name; ?></td>
             <td><?php echo $TypeName->name;  ?></td>
             <td><?php echo time_elapsed_string($order->date, true);?></td>   
             <td><?php echo $order->status; ?></td>
         <!--  <td><a target ="blank"  href="<?php echo base_url('admin/user/profile/'.$order->id);?>"><i class="fa fas fa-eye" aria-hidden="true"></i></a> / <a href="<?php echo base_url('admin/user/edit/'.$order->id);?>" target ="blank" ><i class="fa fa-edit" aria-hidden="true"></i></a> / <a attrId="<?php echo $order->id;?>" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
        </tr>

        <?php $i++; endforeach; else: ?>
        <tr><td colspan ="6">No Complete Order Found...</td> </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
</div>

</section>


<script>
  function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajaxSetup({
        data: csrfData
     });
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>admin/ajaxPaginationData/'+page_num,
      data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
      beforeSend: function () {
           // $('.loading').show();
         },
         success: function (html) {
          $('#userList').html(html);
         //   $('.loading').fadeOut("slow");
       }
     });
  }
// delete user
function resultdelete(id){
  $.ajaxSetup({
        data: csrfData
     });

 $.ajax({
  type: 'POST',
  url: '<?php echo base_url(); ?>admin/UserDelete',        
  data:'id='+id,
  success: function(data){
   $('.t_'+id).remove();
   searchFilter();
 }
});

}

// change user status
function resultSend(state,id){
  $.ajaxSetup({
        data: csrfData
     });

  $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>admin/orderstatus',        
    data:'state='+state+'&id='+id,
    success: function(data){

      if(state == 'active'){
        $('a.staus[attrId='+id+']').attr('attrStatus','cancel');
        $('a.staus[attrId='+id+']').find('span').attr('class','label label-success');
        $('a.staus[attrId='+id+']').find('span').text('Active');
      }else{
        
        $('a.staus[attrId='+id+']').attr('attrStatus','active');
        $('a.staus[attrId='+id+']').find('span').attr('class','label label-warning');
        $('a.staus[attrId='+id+']').find('span').text('Pending');
      }
      
    }
  });


}

$(document).ready( function (){

  $('.staus').click( function (){
   
    var state = $(this).attr('attrStatus');
    var id = $(this).attr('attrId');
    
    if(state == 'active'){
      swal({
        title: "Are you sure ??",
        text: 'Now User will login.', 
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Request will send for activate the User", {
            icon: "success",
          });
          resultSend(state,id);
        } else {
          swal("Request is cancel for activate the User!");
        }
      });
    }else{
     
     swal({
      title: "Are you sure ??",
      text: 'Now User will deactivate.', 
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
     .then((willDelete) => {
      if (willDelete) {
        swal("Request will send for deactivate the User", {
          icon: "success",
        });
        resultSend(state,id);
      } else {
        swal("Request is cancel for deactivate the User!");
      }
    });
   }
 });
  
});

  //delete user
  $('.delete').click( function (){
   
    var id = $(this).attr('attrId');
    
    swal({
      title: "Are you sure ??",
      text: 'User will delete.', 
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Request will send for delete the User", {
          icon: "success",
        });
        resultdelete(id);
      } else {
        swal("Request is cancel for delete the User!");
      }
    });
  });


</script>

<?php
function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
    );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>