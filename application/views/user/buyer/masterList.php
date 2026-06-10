<?php  if ($this->session->flashdata('message')) {
    ?>        
<?php print_r( $this->session->flashdata('message'))?>
<?php
} ?>

<style>
.checked {color:orange}
.form-control{margin-bottom: 20px;}
</style>

<!-- Add master product actions layout -->
<div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 30px; flex-wrap: wrap; background: #ffffff; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
  <div>
    <h5 style="margin-top: 0; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; font-size: 12px;">Manual Entry</h5>
    <button type="button" data-intro='Click this button to add any product that you repeatedly buy' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#masterModal" style="border-radius: 8px; font-weight: 600;">
      <i class="fa fa-plus"></i> Add Single Product
    </button>
  </div>
  
  <div style="border-left: 1px solid #e2e8f0; height: 60px; align-self: center;" class="hidden-xs"></div>

  <div style="flex: 1; min-width: 280px;">
    <h5 style="margin-top: 0; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; font-size: 12px;">Bulk Import via CSV</h5>
    <?php echo form_open_multipart('buyer/import-master-csv', 'class="form-inline" style="display: flex; gap: 10px; flex-wrap: wrap;"'); ?>
      <div class="form-group" style="margin-bottom: 0;">
        <input type="file" name="csv_file" accept=".csv" required class="form-control" style="margin-bottom: 0; height: auto; padding: 6px 12px; border-radius: 8px; border: 1px solid #cbd5e1;">
      </div>
      <button type="submit" class="btn btn-success" style="border-radius: 8px; font-weight: 600; padding: 8px 16px;">
        <i class="fa fa-upload"></i> Upload CSV
      </button>
      <div style="margin-top: 6px; font-size: 11px; color: #64748b; width: 100%;">
        Format: <code>Category Name, Product Name, Brand Name, Item Code</code> (Header row is skipped).
      </div>
    <?php echo form_close(); ?>
  </div>
</div>

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
      <input class="form-control mr-sm-2 item" name="item" type="text" placeholder="Product Id/Serial/Model Number" >
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


<div class="table-responsive">
	<table data-intro='You can manage your existing master list here'id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
			
    <tr class="ref">
      <th scope="col">Master ID</th>
			<th data-intro="You can sort your list by click each column's sort icon " scope="col">Category Name</th>
			<th scope="col">Product Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Product Id/Serial/Model Number</th> 
      <th data-intro='This column will always record the last price you were quoted for this product' scope="col">Last Price & Date</th>    
      <th scope="col">Measurement/Volume/weight</th>
      <th scope="col">Actions</th>  
      <th scope="col">Last Updated Date</th>  
    </tr>
    </thead>

    <tbody>

    <?php
      $prefer_list = array();
      foreach($supplier_list as $supplier){
        array_push($prefer_list, $supplier->prefer_id);
      }
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
      
      <td style="text-align:center;">N/A</td>
      <td style="text-align:center;">
      1Kg
      </td>
      <td  style="text-align:center;">

	  <a class= "btn btn-outline-info" data-toggle="modal" data-target="#editModal" href="" onclick= 'editMaster(<?php print_r( $master->master_id)?>,<?php print_r( $i)?>)'>Edit</a> 
      <a class= "btn btn-outline-info" href="<?php print_r( base_url('buyer/deleteMaster/'.$master->master_id)); ?>" class="delete">Delete</a>
    
	  <a class= "btn btn-outline-info" data-toggle="modal" data-target="#preferredModal" onclick='setMaster(<?php echo $master->master_id?>,<?php echo json_encode($prefer_list)?>)' href="">Manage Preferred Suppliers</a>
    </td>

    <!-- created date -->
    <!-- updated date -->
    <td style="text-align:center;"><?php $updateDate=new DateTime($master->updated_at) ;print_r($updateDate->format('d-m-Y'));?></td>
		  
	  </tr>

     <?php
           }
       } ?>  
   
        
    </tbody>
</table>
      </div>

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
                                    <?php 
                                     $linkedProduct = json_encode(array_map('intval', explode(',', $supplier->linked_master_product)));
                                    ?>

  <button type="button" class="btn btn-primary link-btn" id="s_<?php echo $supplier->prefer_id; ?>" onclick="linkSupplier(<?php echo $supplier->prefer_id;?>)">link</td>
 <?php     }
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

let currentMaster;
let supplierBtns;
const setMaster = (masterId, preferIdList) => {
  currentMaster = masterId;
  $.ajaxSetup({
    data: csrfData
  });

  $.ajax({
    type:'POST',
    url: '<?php echo base_url();?>buyer/checkProductLinkWithMaster',
    data: {
      masterId: masterId,
      preferIdList: preferIdList,
    },
    success: function(data) {
      const linkedSuppliers = JSON.parse(data);
      supplierBtns = linkedSuppliers;
      linkedSuppliers.forEach((e, index, linkedSuppliers) =>{ 
        if(!Object.is(linkedSuppliers.length-1, index)) {
          let linkButton = document.getElementById('s_'+e);
          linkButton.innerHTML = 'unlink';
          linkButton.setAttribute('onclick', `unlinkSupplier(${e})`)
        }});
        csrfData['csrf_test_name'] = linkedSuppliers.pop();
    }
    
  })

};

const linkSupplier = (preferId) => {
  $.ajaxSetup({
    data: csrfData
  });

  $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>buyer/linkSupplierAndMaster',
    data: {
      masterId: currentMaster,
      preferId: preferId,
    },
    success: function(data) {
      const obj = JSON.parse(data);
      swal({
        icon: 'success',
        title: 'You linked this product with a preferred supplier'
      })
      // refresh csrf code
      csrfData['csrf_test_name'] = obj.csrfHash;

    },
    error: function(data, textStatus, jqXHR) {
      swal({
        icon: 'error',
        title: 'Something is wrong, please try again later'
      })
      csrfData['csrf_test_name'] = obj.csrfHash;
    }

  });

};

const unlinkSupplier = (preferId) => {
  $.ajaxSetup({
    data:csrfData
  });
  //ajax unlink supplier with current Master
  
  $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>buyer/unlinkSupplierAndMaster',
    data: {
      masterId: currentMaster,
      preferId: preferId,
    },
    success: function(data) {
      const obj = JSON.parse(data);
      swal({
        icon: 'success',
        title: 'You unlinked this product with a preferred supplier'
      })
      // refresh csrf code
      csrfData['csrf_test_name'] = obj.csrfHash;

    },
    error: function(data, textStatus, jqXHR) {
      swal({
        icon: 'error',
        title: 'Something is wrong, please try again later'
      })
      csrfData['csrf_test_name'] = obj.csrfHash;
    }

  });

};

$(document).ready(function(){


  $("#masterTable").DataTable({
    // "sPaginationType": "bootstrap",
  });

  $('.modal').on('hidden.bs.modal', function(e)
    {
      supplierBtns.forEach((e, index, supplierBtns) =>{          
        let supplierBtn = document.getElementById('s_'+e);
        supplierBtn.innerHTML = 'link';
        supplierBtn.setAttribute('onclick', `linkSupplier(${e})`)
        });
      document.getElementById('s_28').innerHTML = 'link';
     }) ;
});
    </script>
  
    





   
 
  


