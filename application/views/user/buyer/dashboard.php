<h1 class="o-order">Pending Order Requests</h1>
  <table class="table table1">
    <thead>
      <tr>
       <th class="processed" colspan="5">A list of items/services being pending</th>
      </tr>
     </thead>
    <thead>
    <tr  class="ref">
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
    </tr>
    </thead>
    <tbody>
      <?php //pr($RequestQuotesPr); ?>
      <?php if(!empty($RequestQuotesP)){ ?>
      <?php $count ='1'; ?>
      <?php foreach( $RequestQuotesP as $key =>$RequestQuotesValue): ?> 
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
              <?php endif; ?>
              </td>
            </tr>
      <?php $count++; ?>
          <?php endforeach; ?>
          <tr>
           <td class="see-all"><a  href="<?php echo base_url('buyer/view-requestQuotes/pending');?>">see all</a></td>
          </tr>
      <?php } else { ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php } ?>  
    </tbody>
  </table>
<h1 class="o-order">Processed Order Requests</h1>
	<table class="table table1">
		<thead>
		  <tr>
			 <th class="processed" colspan="5">A list of items/services being processed</th>
		  </tr>
	   </thead>
	  <thead>
		<tr  class="ref">
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
		</tr>
	  </thead>
	  <tbody>
      <?php //pr($RequestQuotesPr); ?>
      <?php if(!empty($RequestQuotesPr)){ ?>
      <?php $count ='1'; ?>
      <?php foreach( $RequestQuotesPr as $key =>$RequestQuotesValue): ?> 
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
              <?php if($RequestQuotesValue->status == 'processed'): ?>
                  <span class="label label-info">Processed</span>                        
              <?php endif; ?>
              </td>
            </tr>
      <?php $count++; ?>
          <?php endforeach; ?>
          <tr>
           <td class="see-all"><a  href="<?php echo base_url('buyer/view-requestQuotes/processed');?>">see all</a></td>
          </tr>
      <?php } else { ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php } ?>  
	  </tbody>
	</table>

  <h1 class="o-order1">Ordered Order Requests</h1>
<table class="table table1">
    <thead>
      <tr>
         <th class="processed"  colspan="6">A list of orders listed to ordered</th>
      </tr>
   </thead>
  <thead>
    <tr  class="ref">
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
      <th scope="col">Contact</th>      
    </tr>
  </thead>
  <tbody>
      <?php //pr($RequestQuotesC); ?>
      <?php if(!empty($RequestQuotesOr)){ ?>
      <?php $count ='1'; ?>
      <?php foreach( $RequestQuotesOr as $key =>$RequestQuotesValue): ?> 
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
              <?php if($RequestQuotesValue->status == 'ordered'): ?>
                  <span class="label label-info">Ordered</span>                        
              <?php endif; ?>
              </td>
              <td><a target="blank" href="<?php echo base_url('buyer/chat/'.$RequestQuotesValue->user_id.'/'.$RequestQuotesValue->id);?>"><span class="label label-info">Message</span></a></td>
            </tr>
      <?php $count++; ?>
          <?php endforeach; ?>
          <tr>
           <td class="see-all"><a  href="<?php echo base_url('buyer/view-requestQuotes/ordered');?>">see all</a></td>
          </tr>
      <?php } else { ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php } ?>  
    </tbody>
</table>


<h1 class="o-order1">Completed Order Requests</h1>
<table class="table table1">
    <thead>
      <tr>
         <th class="processed"  colspan="6">A list of orders completed</th>
      </tr>
   </thead>
  <thead>
    <tr  class="ref">
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
    </tr>
  </thead>
  <tbody>
      <?php //pr($RequestQuotesC); ?>
      <?php if(!empty($RequestQuotesC)){ ?>
      <?php $count ='1'; ?>
      <?php foreach( $RequestQuotesC as $key =>$RequestQuotesValue): ?> 
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
              <?php if($RequestQuotesValue->status == 'completed'): ?>
                  <span class="label label-info">Completed</span>                        
              <?php endif; ?>
              </td>
            </tr>
      <?php $count++; ?>
          <?php endforeach; ?>
          <tr>
           <td class="see-all"><a  href="<?php echo base_url('buyer/view-requestQuotes/completed');?>">see all</a></td>
          </tr>
      <?php } else { ?>
            <tr><td colspan="12" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
        <?php } ?>  
    </tbody>
</table>