<?php 
    if($this->session->flashdata('message')){
      echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    }    
?>
      
<a class="btn btn-info" href="<?php echo base_url('buyer/requestQuotes');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New RequestQuotes</a><p>&nbsp;</p>
<table id="requestQuotes_listingTable">
  <thead>
		<tr class="ref">     
      <th scope="col">Sr.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Serial No</th>
      <th scope="col">Size</th>
      <th scope="col">Color</th>
      <th scope="col">Quantity</th>
      <th scope="col">Brand</th>
      <th scope="col">Category</th>
      <th scope="col">Types</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th> 
    </tr>   
	</thead>
  <tbody>
	<?php if(!empty($RequestQuotes)){ ?>
	<?php $count ='1'; ?>
	<?php foreach( $RequestQuotes as $key =>$RequestQuotesValue): ?>
	<?php 
      $brandExp = explode(',', $RequestQuotesValue->brand);
      $CI =& get_instance();
			$CI->load->model('type'); 
			$TypeName = $CI->type->getTypesByID($RequestQuotesValue->types);
			$CI->load->model('category'); 
			$CatName = $CI->category->getCategoryByID($RequestQuotesValue->category);
	?>
    <tr>
		  <td><?php echo $count; ?></td>
              <td><?php echo $RequestQuotesValue->product_name; ?></td>
              <td><?php echo $RequestQuotesValue->serial_no; ?></td>
              <td><?php echo $RequestQuotesValue->size; ?></td>
              <td><?php
                  if($RequestQuotesValue->color=='1'){
                    echo "Blue";
                  }elseif($RequestQuotesValue->color=='2'){
                    echo "Red";
                  }elseif($RequestQuotesValue->color=='3'){
                    echo "Green";
                  }elseif($RequestQuotesValue->color=='4'){
                    echo "Yellow";
                  }elseif($RequestQuotesValue->color=='5'){
                    echo "Pink";
                  }elseif($RequestQuotesValue->color=='6'){
                    echo "Black";
                  }elseif($RequestQuotesValue->color=='7'){
                    echo "White";
                  }elseif($RequestQuotesValue->color=='8'){
                    echo "Orange";
                  }elseif($RequestQuotesValue->color=='9'){
                    echo "Grey";
                  } ?></td>
              <td><?php echo $RequestQuotesValue->quantity; ?></td>
              <td><?php 
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
              <td><?php echo (isset($CatName->name))? $CatName->name : "" ;   ?> </td>
              <td><?php echo (isset($TypeName->name))? $TypeName->name : "" ;   ?></td>
              <td><?php echo $RequestQuotesValue->description; ?></td>          
              <td><?php echo date("d M Y", strtotime($RequestQuotesValue->date)); ?></td>
              <td>
              <?php if($RequestQuotesValue->status == 'pending'): ?>
                  <span class="label label-info">Pending</span>
              <?php elseif($RequestQuotesValue->status == 'processed'): ?>
                <span class="label label-info">Processed</span>
              <?php elseif($RequestQuotesValue->status == 'ordered'): ?>
                <span class="label label-info">Ordered</span>
              <?php else: ?>
                <span class="label label-info">Completed</span>           
              <?php endif; ?>
              </td>             
              <td>
                <?php if($RequestQuotesValue->status == 'pending'): ?>
                <a href="<?php echo base_url('buyer/update-requestQuotes/'.$RequestQuotesValue->id.''); ?>"><span class="label label-primary"><i class="fa fa-fw fa-edit"></i></span></a>
                
                <a href="<?php echo base_url('buyer/delete-requestQuotes/'.$RequestQuotesValue->id.''); ?>"><span class="label label-danger" onclick="return confirm('Are you sure want to delete this RequestQuotes ?')" ><i class="fa fa-trash-o"></i></span></a>
                <?php endif; ?>
              </td>						
		</tr>
  <?php $count++; ?>
	<?php endforeach; ?>
	<?php } ?>
						
				<?php  ?>		
	</tbody> 
	<tfoot>
    <tr class="ref">     
      <th scope="col">Sr.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Serial No</th>
      <th scope="col">Size</th>
      <th scope="col">Color</th>
      <th scope="col">Quantity</th>
      <th scope="col">Brand</th>
      <th scope="col">Category</th>
      <th scope="col">Types</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th> 
    </tr>   
  </tfoot>
</table>            