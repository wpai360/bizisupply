<?php 
  if($this->session->flashdata('message')){
    echo '<p class="text-danger">'.$this->session->flashdata('message').'</p>';
  }
?>
<h1 class="o-order">Requests For Quotes</h1>
	<table class="table table1">
		<thead>
		  <tr>
			 <th class="processed" colspan="5">Quotes to be processed</th>
		  </tr>
	   </thead>
	  <thead>
		<tr  class="ref">
      <th scope="col">Sr.</th>
      <th scope="col">Serial No</th>
      <th scope="col">ITEM</th>
      <th scope="col">Description</th>
      <th scope="col">Buyer</th>      
      <th scope="col">Status</th>      
    </tr>
    </thead>
    <tbody>
      <?php //pr($RequestQuotesPr); ?>
      <?php if(!empty($RequestQuotesPr)){ ?>
      <?php $count ='1'; ?>
      <?php foreach( $RequestQuotesPr as $key =>$RequestQuotesValue): ?> 
      <?php 
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
          <?php echo $UserData->zipCode; ?>"><?php echo $UserData->name; ?></span></td>
        
  
              
        <td><?php if($RequestQuotesValue->status == 'processed'): ?>
              <p><a href="javascript:void(0);<?php //echo base_url('supplier/response-to-quote/'.$RequestQuotesValue->id);?>">Respond to Request</a></p>                        
            <?php endif; ?>
        </td>
      </tr>
      <?php $count++; ?>
      <?php endforeach; ?>
      <tr>
        <td class="see-all"><a  href="javascript:void(0);<?php //echo base_url('supplier/view-requestQuotes/processed');?>">see all</a></td>
      </tr>
      <?php } else { ?>
      <tr>
        <td colspan="6" style="text-align:center;"><h2>There is no Record..</h2></td>
      </tr>
      <?php } ?>  
    </tbody>
	</table>





