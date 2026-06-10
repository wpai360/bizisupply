	<?php 

    $CI =& get_instance();
    $CI->load->model('category'); 
    $last_row = $CI->category->GetLastRow();
   // pr($last_row->id);


  ?>
  <tr attrClass="<?php echo strtoupper($category); ?>" id="<?php echo strtoupper($category); ?>">
	   <td><span><?php echo strtoupper($category); ?></span><a href="#"  attrId='<?php echo strtoupper($category); ?>' class="edit"><i class="fa fa-edit" aria-hidden="true"></i></a> / <a href="#" attrId='<?php echo strtoupper($category); ?>' class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

	   <?php if(count($type)){ 
		foreach ($type as $key => $value) { ?>
	    <td>

        <!-- <input type="checkbox" attrCat="<?php echo strtoupper($category); ?>" name="checkCat" id="checkCat" value="<?php echo $value->name;?>"> -->

        <input type="checkbox" attrCat="<?php echo strtoupper($category); ?>" class="<?php echo strtoupper($category); ?>" attrCatId=""  name="checkCat" id="checkCat"  attrTypeId ="<?php echo $value->id;?>" value="<?php echo $value->name;?>">
      </td>
	  <?php } } ?>
	</tr>

  
<script type="text/javascript">



$(document).ready( function (){
	 //delete user
  $('.delete').click( function (){
   
    var id = $(this).attr('attrId');
    swal({
      title: "Are you sure ??",
      text: 'This category will delete.', 
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Request is send for delete the Category", {
          icon: "success",
        });
$('tr[attrClass ="'+id).remove();
      } else {
        swal("Request is cancel for delete the Category!");
      }
    });
  });

  
  $('.edit').click( function (){  
     var id = $(this).attr('attrId');
     $('.categoryName').val(id);
     $('.addH').val(id);
       $('.errCat').text('');
       $('#myModal').modal('show');

  });
    });
  </script>