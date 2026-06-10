<?php 

if($this->session->flashdata('msg')){
  echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
}

?>
<section class="content">
  <div class="row">
    <div class="post-search-panel">
      <span class="btn btn-sm btn-default btn-flat pull-right width_m">
        <div class="input-group">
          <input type="text" id="keywords" placeholder="Search..." class="form-control" onkeyup="searchFilter()"/>
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </span>


      <span class="btn btn-sm btn-default btn-flat pull-left">
        <div class="form-group">   
         <select id="sortBy" class="form-control" onchange="searchFilter()">
          <option value="">Sort By</option>
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
      </span>
    </div>
  </div>

  <p class="pull-left">
    <a href="<?php echo base_url('admin/addUser')?>" class="">
     <button type="button" class="btn btn-success">Add New</button>
   </a>
 </p>

</div>


<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of All Users</h3>

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
            <th>Sr.No</th>
            <th>Business Name</th>
            <th>Name</th>
            <th>Email </th>
            <th>Phone </th>
            <th>ABN </th>
            <th>Address </th>
            <th>Status</th>
            <th>Created</th>
            <th>Action</th>   
          </tr>
        </thead>

        <tbody>

          <?php if(!empty($users)): 
          $i =1;
          foreach($users as $user): ?>

          

          <tr class="t_<?php echo $user['id']; ?>">
            <td><?php echo $i ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['phone']; ?></td>
            <td><?php echo $user['ABN']; ?></td>
            <td><?php echo $user['address']; ?></td>
            <td>

             <?php if($user['verify']): ?>
              <a class="staus" attrStatus ="cancel" attrId ="<?php echo $user['id'];?>"> <span class="label label-success">Active</span></a>
            <?php else: ?>
              <a class="staus" attrStatus ="active" attrId ="<?php echo $user['id'];?>"><span class="label label-warning">Pending</span></a>
            <?php endif; ?>
          </td>

          <td><?php echo time_elapsed_string($user['created_at'], true);?></td>
          <td><a target ="blank"  href="<?php echo base_url('admin/user/profile/'.$user['id']);?>"><i class="fa fas fa-eye" aria-hidden="true"></i></a> / <a href="<?php echo base_url('admin/user/edit/'.$user['id']);?>" target ="blank" ><i class="fa fa-edit" aria-hidden="true"></i></a> / <a attrId="<?php echo $user['id'];?>" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

        </tr>

        <?php $i++; endforeach; else: ?>
        <tr><td colspan ="6">User not Found...</td> </tr>
      <?php endif; ?>

    </tbody>
  </table>

  <span href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right"> <?php echo $this->ajax_pagination->create_links(); ?></span>

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

  $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>admin/UserStatus',        
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