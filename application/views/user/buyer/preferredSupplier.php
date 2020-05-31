<?php  if ($this->session->flashdata('message')) {
    ?>        
<?php print_r( $this->session->flashdata('message'))?>
<?php
} ?>

<style>

.checked{
  color: orange;
}

</style>

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


<!-- update note Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center">
<?php print_r(form_open('buyer/updateNote', 'class="form-inline"'));?>
      <textarea style="min-width: 100%" class="form-control note" id="note" name="note" type="text"  required ></textarea>
      <input class="form-control mr-sm-2 d-none" id="buyerId" name="buyerId" type="text" placeholder="buyer">
      <input class="form-control mr-sm-2 d-none" id="supplierId" name="supplierId" type="text" placeholder="supplier" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-product">Save Change</button>
      </div>
      <?php print_r( form_close()); ?>
    </div>
  </div>
</div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
			
    <tr class="ref">
      <th scope="col">S.no</th>
			<th scope="col">Supplier Name</th>
			<th scope="col">Category</th>
      <th scope="col">Rating</th>
      <th scope="col">Description</th> 
      <th scope="col">Note</th>    
      <th scope="col">Actions</th>  
    </tr>
    </thead>

    <tbody>
    <?php
       if (!empty($supplierList)) {
           $i=0;
           foreach ($supplierList as $supplier) {
               $i++; ?>
      <tr>
		  <td  style="text-align:center;" ><?php if (!empty($supplier->supplier_id)) {
                   print_r( $i);
               } else {
                   print_r( 'N/A');
               }; ?></td>
		  <td  style="text-align:center;" id="supplier_<?php print_r( $i);?>"><?php if (!empty($supplier->supplier_id)) {
                   print_r( $supplier->username);
               } else {
                   print_r( 'N/A');
               }; ?></td>
               <!-- category name -->
		  <td  style="text-align:center;" id="category_<?php print_r( $i);?>"><?php if (!empty($supplier->supplier_categories)) {
                  $supply_categories = explode("," , $supplier->supplier_categories);
                  foreach($supply_categories as $value){
                    foreach($category as $category_value){
                      if($category_value->id == $value){
                        print_r($category_value->name);
                        print_r('<br>');
                      }
                    }
                  }
                  print_r($category[0]->name);
               } else {
                   print_r( 'N/A');
               } ?></td>
               <!-- product name -->
		  <td style="text-align:center;" id="rate_<?php print_r( $i);?>"> <?php 
        echo '<span class="fa fa-star checked"></span>
		          <span class="fa fa-star checked"></span>
		          <span class="fa fa-star checked"></span>
		          <span class="fa fa-star checked"></span> 
		          <span class="fa fa-star checked"></span>';                       
               ?>
      </td>
              <!--brand name  -->
		  <td style="text-align:center;" id="desc_<?php print_r( $i);?>"><?php if (!empty($supplier->description)) {
                   print_r($supplier->description);
               } else {
                   print_r( 'N/A');
               } ?>
		  </td>
               <!-- item number -->
			<td style="text-align:center;" id="note_<?php print_r( $i);?>"><?php if (!empty($supplier->note)) {
                   print_r($supplier->note);
               } else {
                   print_r( 'N/A');
               } ?>
      </td>
      <td  style="text-align:center;">
      <a class= "btn btn-outline-info" data-toggle="modal" data-target="#editModal" href="" onclick= 'editSupplier(<?php print_r( $supplier->buyer_id)?>,<?php print_r( $supplier->supplier_id)?>, <?php print_r($i) ?>)'>Edit Note</a> 
        <a class= "btn btn-outline-info" href="<?php print_r( base_url('buyer/deletePreferredSupplier/'.$supplier->supplier_id)); ?>" class="delete">Delete</a>
      </td>
	  </tr>
     <?php
           }
       } ?>  
    </tbody>
</table>
    <script>
const editSupplier = (buyerId,supplierId, i)=>{
  const note = $('#note_'+ i).text();
  document.getElementById('note').value = note;
  document.getElementById('buyerId').value = buyerId;
  document.getElementById('supplierId').value =supplierId;
};

       $(document).ready(function(){
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $("#dtatbl").DataTable({
    // "sPaginationType": "bootstrap",
  });
});
    </script>
