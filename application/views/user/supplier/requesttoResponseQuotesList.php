<?php 
    if($this->session->flashdata('message')){
      echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    }    
?>

<table id="requestQuotes_listingTable2">
  <thead>
		<tr class="ref">
      <th scope="col">Sr.</th>
      <th scope="col">Serial No</th>
      <th scope="col">ITEM</th>
      <th scope="col">Description</th>
      <th scope="col">Buyer</th>      
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
			$CI->load->model('user'); 
      $UserData = $CI->user->get_user($RequestQuotesValue->user_id);
	?>
    <tr>
		  <td><?php echo $count; ?></td>
      <td><?php echo $RequestQuotesValue->serial_no; ?></td>
      <td><?php echo $RequestQuotesValue->product_name; ?></td>              
      <td><?php echo $RequestQuotesValue->description; ?></td>
      <td><span id="supplier_tooltip" data-toggle="tooltip" data-placement="bottom" title="
          <strong><?php echo $UserData->name; ?></strong><br>
          <strong>Phone : </strong><?php echo $UserData->phone; ?><br>
          <strong>Address : </strong><?php echo $UserData->address; ?><br>
          <?php echo $UserData->city; ?><br>
          <?php echo $UserData->state; ?><br>
          <?php echo $UserData->country; ?><br>
          <?php echo $UserData->zipCode; ?>"><?php echo $UserData->name; ?></span>
      </td>
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
        <?php if($RequestQuotesValue->status == 'processed'): ?>
          <a href="<?php echo base_url('supplier/response-to-quote/'.$RequestQuotesValue->id); ?>"><span class="label label-primary"><i class="fa fa-fw fa-edit"></i></span></a>                
          <a href="<?php echo base_url('supplier/delete-response-to-quote/'.$RequestQuotesValue->id); ?>"><span class="label label-danger" onclick="return confirm('Are you sure want to Reject this RequestQuotes ?')" ><i class="fa fa-trash-o"></i></span></a>
        <?php endif; ?>
      </td>						
		</tr>
  <?php $count++; ?>
	<?php endforeach; ?>
	<?php } ?>
	</tbody> 
	<tfoot>
    <tr  class="ref">
      <th scope="col">Sr.</th>
      <th scope="col">Serial No</th>
      <th scope="col">ITEM</th>
      <th scope="col">Description</th>
      <th scope="col">Buyer</th>      
      <th scope="col">Status</th>
      <th scope="col">Action</th>      
    </tr>   
  </tfoot>
</table>            