



<?php  if ($this->session->flashdata('message')) {
    ?>        
<?php print_r( $this->session->flashdata('message'))?>
<?php
} ?>

<style>

.modal{

}

</style>

<!-- Add master product-->
<button type="button"  data-intro='Any product that you <u>repeatedly</u> purchase, click here to add to your masterlist'class="btn btn-primary" data-toggle="modal" data-target="#masterModal">
  Add Product to MasterList
</button>

<!-- Master product modal -->
<div class="modal fade" id="masterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center">
<?php print_r( form_open('buyer/addMaster', 'class="form-inline"'));?>
<select style="border-radius:25px" class="form-control col-md-3 mr-sm-2 category" name="category" required >
	<option value ="">Select Category</option>
	<?php
    if (!empty($category)) {
        foreach ($category as $categoryValue) {
            ?>
	<option <?php print_r( set_select('category', $categoryValue->id)); ?> value ="<?php print_r( $categoryValue->id); ?>"><?php print_r( $categoryValue->name); ?>
	</option>
	<?php
        }
    } ?>            
    </select> 

      <input class="form-control mr-sm-2 product" name="product" type="text" placeholder="Product Name" required >
      <input class="form-control mr-sm-2 brand" name="brand" type="text" placeholder="Brand Name ">
      <input class="form-control mr-sm-2 item" name="item" type="text" placeholder="Item Number" >
      <input class="form-control mr-sm-2 masterE d-none" name="redirect"  value="1"type="text" placeholder="MasterId" >
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-product">Save Product</button>
      </div>
      <?php print_r( form_close()); ?>
    </div>
  </div>
</div>


<!-- update product Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center">
<?php print_r(form_open('buyer/editMaster', 'class="form-inline"'));?>
<select style="border-radius:25px" class="form-control col-md-3 mr-sm-2 categoryE" name="categoryE" required >
	<option value ="">Select Category</option>
	<?php
    if (!empty($category)) {
        foreach ($category as $categoryValue) {
            ?>
	<option <?php print_r( set_select('category', $categoryValue->id)); ?> value ="<?php print_r( $categoryValue->id); ?>"><?php print_r( $categoryValue->name); ?>
	</option>
	<?php
        }
    } ?>            
    </select> 

      <input class="form-control mr-sm-2 productE" name="productE" type="text" placeholder="Product Name" required >
      <input class="form-control mr-sm-2 brandE" name="brandE" type="text" placeholder="Brand Name ">
      <input class="form-control mr-sm-2 itemE" name="itemE" type="text" placeholder="Item Number" >
      <input class="form-control mr-sm-2 masterE d-none" name="masterE" type="text" placeholder="MasterId" >

     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-product">Save Change</button>
      </div>
      <?php print_r( form_close()); ?>
    </div>
  </div>
</div>



	<table data-intro='You can manage your existing master list here'id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
			
    <tr class="ref">
      <th scope="col">Master ID</th>
			<th data-intro='You can sort your list by click each column' scope="col">Category Name</th>
			<th scope="col">Product Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Item/Serial/Id Number</th> 
      <th data-intro='This column will always record the best price you have received for this product' scope="col">Received Best Price</th>    
      <th data-intro='You can link your preffered supplier with your master product here' scope="col">Related preferred suppliers</th>
      <th scope="col">Actions</th>  
      <th scope="col">Created Date</th>  
      <th scope="col">Last Updated Date</th>  
    </tr>
    </thead>

    <tbody>
      <?php

 //pr($allOrderHistory);?>
    <?php
       if (!empty($masterList)) {
           $i=0;
           foreach ($masterList as $master) {
            
               $i++; ?>
      <tr>
		  <td  style="text-align:center;" id="master_<?php print_r( $i);?>"><?php if (!empty($master->master_id)) {
                   print_r( $i);
               } else {
                   print_r( 'N/A');
               }; ?></td>
               <!-- category name -->
		  <td  style="text-align:center;" id="category_<?php print_r( $i);?>"><?php if (!empty($master->name)) {
                   print_r( $master->name);
               } else {
                   print_r( 'N/A');
               } ?></td>
               <!-- product name -->
		  <td style="text-align:center;" id="product_<?php print_r( $i);?>"><?php if (!empty($master->order_name)) {
                   print_r( $this->encryption->decrypt($master->order_name));
               } else {
                   print_r( 'N/A');
               } ?>
      </td>
              <!--brand name  -->
		  <td style="text-align:center;" id="brand_<?php print_r( $i);?>"><?php if (!empty($master->brand_name)) {
                   print_r( $this->encryption->decrypt($master->brand_name));
               } else {
                   print_r( 'N/A');
               } ?>
		  </td>
               <!-- item number -->
			<td style="text-align:center;" id="item_<?php print_r( $i);?>"><?php if (!empty($master->part_number)) {
                   print_r( $this->encryption->decrypt($master->part_number));
               } else {
                   print_r( 'N/A');
               } ?></td>
      
      <td style="text-align:center;"></td>
      <td style="text-align:center;">
	  <a class= "btn btn-outline-info" data-toggle="modal" data-target="#preferredModal" href="" onclick= 'preferredSupplier(<?php print_r( $master->master_id)?>,<?php print_r( $i)?>)'>Manage</a>
      </td>
      <td  style="text-align:center;">

	  <a class= "btn btn-outline-info" data-toggle="modal" data-target="#editModal" href="" onclick= 'editMaster(<?php print_r( $master->master_id)?>,<?php print_r( $i)?>)'>Edit</a> 
      <a class= "btn btn-outline-info" href="<?php print_r( base_url('buyer/deleteMaster/'.$master->master_id)); ?>" class="delete">Delete</a>
    
    </td>

    <!-- created date -->
    <td style="text-align:center;"><?php $createDate=new DateTime($master->created_at) ;print_r($createDate->format('Y-m-d'));?></td>
    <!-- updated date -->
    <td style="text-align:center;"><?php $updateDate=new DateTime($master->updated_at) ;print_r($updateDate->format('Y-m-d'));?></td>
		  
	  </tr>

     <?php
           }
       } ?>  
   
        
    </tbody>
</table>

<div class="modal fade" id="preferredModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Manage your preferred suppliers for this master product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="masterTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                        <tr class="ref">
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Supply Category</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Description</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
<?php
      if (!empty($supplier_list)) {
        foreach ($supplier_list as $supplier) {
                  $supply_categories = explode("," , $supplier->supplier_categories);
?>
                 <tr class="ref text-black preferrred">
<?php 
                  echo '<td>', $supplier->username, '</td>';
                  echo '<td>';
                    foreach($supply_categories as $value){
                       foreach($category as $category_value){
                         if($category_value->id == $value){
                          print_r($category_value->name);
                            print_r('<br>');}}};
                  echo '</td>';
                  echo '<td>',  '
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span> 
                   <span class="fa fa-star checked"></span>
                   </td>';
                  echo '<td>', $supplier->description, '</td>';
                  echo '<td>', $supplier->note, '</td>'; ?>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="s_<?php echo $supplier->supplier_id; ?>" onclick="selectSupplier(<?php echo $supplier->supplier_id;echo ',s_';echo $supplier->supplier_id;?>)">Select</td>
<?php }
      } ?>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.cancel').click(function(){
var checkstr =  confirm('are you sure you want to cancel this order?');
if(checkstr == true){
  // do your code
}else{
return false;
}
});
});
</script>

<script>

const editMaster = (masterId,masterNo)=>{
let category = $.trim($('#category_'+masterNo).text());
let product = $('#product_'+masterNo).text();
let brand  = $('#brand_'+masterNo).text();
let item = $('#item_'+masterNo).text();


$('.categoryE').find('option').each(function() {
  if(category == $.trim($(this).text())){
    $('.categoryE').val($(this).val());
  };
});
$('.productE').val(product);
$('.masterE').val(masterId);
$('.brandE').val(brand);
$('.itemE').val(item);
};

</script>

 

    <script>
      $(document).ready(function(){
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
    </script>
  
    





   
 
  


