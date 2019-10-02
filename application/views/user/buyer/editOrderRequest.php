
<?php //http://jsfiddle.net/lemonkazi/re8e2yov/?>
<style>
/* #ui-datepicker-div { font-size: 12px; }   */


label {
    display: block;
}

input.error {
    border: 1px solid red;
}

label.error {
    font-weight: normal;
    color: red;
}

button {
    display: block;
    margin-top: 20px;
}
input.file-2 {
    display: block !important;
    z-index: 1;
    position: relative;
    background: transparent;
    padding: 0;
    opacity: 1 !important;
    cursor: pointer;
    width: 100% !important;
    height: 17px;
    top: -5px;
}
textarea#description {
    width: 72%;
    height: 170px;
    font-size: 16px;
    text-transform: capitalize;
    padding: 5px;
    
}

textarea.note{
    resize:none;
    width:100%;
}

select#master_list {
    width: 100%!important;
    line-height: 31px!important;
    padding-left: 10px!important;
    border: 1px solid white!important;
    border-radius: 3px !important;
    margin-bottom: 10px !important;
    padding: 11px!important;
    font-size: 20px!important;
}
div#xxx {
    font-size: 20px;
} 

</style>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
} ?>


<!-- master list select -->



 <div class="row-outdoor-container">
  <button class="btn btn-add-waste addProduct">
    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i> Add Product</button>   
</div>


<label for="state" class="control-label custom_control_label">Order Number:</label>
<div name="order_id"><?php echo $getOrderDetails[0]->order_random_id;?></div>


<label for="state" class="control-label custom_control_label">Master Listing:</label>
    <div class="sg-select-container">
    <select name="master_list" required id="master_list" onchange="masterlist()">
	<option value ="">Select Product</option>
	<?php
    if (!empty($master_list)) {
        foreach ($master_list as $master_listValue) { 
        ?>
	<option <?php echo set_select('buyer_orders', $master_listValue->master_id); ?> value ="<?php echo $master_listValue->master_id; ?>"><?php echo $this->encryption->decrypt($master_listValue->order_name)?> ------- <?php echo $master_listValue->name ?>
	</option>
	<?php
        }
    }
    ?>            
	</select>
    </div>


<form  action=""  method="post"  enctype="multipart/form-data" novalidate>

<div class="row-outdoor-container width-100">
  <div class=" row width-100 padding-left-15">
    <div class="form-group custom_boxshadow col-md-12" style="margin:auto;">
   
    <label for="state" class="control-label custom_control_label">Category:</label>
    <div class="sg-select-container">
			<select disabled name="category"class="custom_control_label" required id="Category">
				<option value ="">Select Category</option>
					<?php
                    if (!empty($category)) {
                        foreach ($category as $categoryValue) {
                            ?>
					<option <?php echo set_select('category', $categoryValue->id);
                            if ($getOrderDetails[0]->product_assign_category ==$categoryValue->id) {
                                echo 'selected';
                            } ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
				</option>
			<?php
                        }
                    }
            ?>            
			</select>
            <div class="sg-select-container" id="ct" style="color: red;"></div>
            
        </div>

<!-- beign of a product row -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product 1</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_1[]" class="product custom_input" value="<?php echo $getOrderDetails[0]->order_name_1;?>"
  placeholder="product" id="product_1"/>
	                <div class="sg-select-container pr" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct1" ></div>
                </div>
	
	<?php
       $this->db->from('buyer_orders');
       $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
       $this->db->select('buyer_orders.order_name_1, category.name');
       $querys = $this->db->get()->result();
       
      ?>
             <div class="sg-select-container" id="ct" style="color: red;"></div>  
        </div>
	

    <div class="col-lg-3">

	    <label for="state" class="control-label">Brand Name</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_1[]" value="<?php echo $getOrderDetails[0]->brand_name_1;?>"
  placeholder="Brand name" id="brand_name_1" class="custom_input brand_name"/>
	        <div class="sg-select-container bn" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" value="<?php echo $getOrderDetails[0]->part_number_1;?>"
 placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container pn" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" value="<?php echo $getOrderDetails[0]->quantity_1;?>"
 placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container qt" id="qt" style="color: red;"></div>
        </div>
      </div>

      <div class="col-lg-6">
        <label for="state" class="control-label">Note</label>
        <div class="sg-select-container">
            <textarea required type="text" name="note_1[]" id="note_1" placeholder="note"
 class="custom_input note"><?php echo $getOrderDetails[0]->note_1;?></textarea>
	        <div class="sg-select-container nt" id="nt" style="color: red;"></div>
        </div>
      </div>


      

       <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_1" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>
       <?php
      $productCount = 0;
      $j = 2;
      for ($v = 1; $v<11;$v++) {
          $check_var = $getOrderDetails[0]->{'order_name_'.$v};
          // echo"<pre>"; print_r(${'product_'.$v});
          if (!is_null($check_var)) {
              // echo "<pre>"; print_r(${'product_'.$v});
              $productCount++;
          }
      };?>
      <!-- dynamic product rows -->
      <?php for ($i=1; $i<$productCount; $i++) {
          ?>

<div class = "add-row-outdoor row width-100" style="padding-left:15px;">
            <div class="col-lg-3">
     <label for="state" class="control-label custom_control_label">Product<?php echo" ";
          echo $j; ?></label>
      <div class="sg-select-container">
       <input required type="text" name="product_<?php echo $j;
          echo"[]"; ?>"  value="<?php echo $getOrderDetails[0]->{'order_name_'.$j}; ?>" placeholder="product"  id="product_<?php echo $j; ?>" class="custom_input product" />
        <div class="sg-select-container pr" id="pr" style="color: red;"></div>
        <div class="sg-select-container" id="disProduct<?php echo $j; ?>" ></div>
    </div>

    <?php
       $this->db->from('buyer_orders');
          $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
          $this->db->select('buyer_orders.order_name_1, category.name');
          $querys = $this->db->get()->result(); ?>
      <div class="sg-select-container" id="ct" style="color: red;"></div>
    </div>


    <div class="col-lg-3">
	  <label for="state" class="control-label custom_control_label">Brand Name</label>
      <div class="sg-select-container">
       <input required type="text" name="brand_name_<?php echo $j;
          echo"[]"; ?>"  placeholder="Brand name" value="<?php echo $getOrderDetails[0]->{'brand_name_'.$j}; ?>"   id="brand_name_<?php echo $j; ?>" class="custom_input brand_name">
	   <div class="sg-select-container bn" id="bn" style="color: red;" ></div>
      </div> 
      </div>

      <div class="col-lg-3">
	   <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
    <div class="sg-select-container">
    
    <input  required type="text" name="partNumber_<?php echo $j;
          echo"[]"; ?>"  value="<?php echo $getOrderDetails[0]->{'part_number_'.$j}; ?>" id="partNumber_<?php echo $j; ?>" placeholder="partNumber" class="custom_input model_no"/>
	   
    <div class="sg-select-container pn" id="pn" style="color: red;" ></div> 
    </div>
    </div>
	  
	  
    <div class="col-lg-3">
	   <label for="state" class="control-label custom_control_label">Quantity</label>
      <div class="sg-select-container">
       <input required type="number" name="quantity_<?php echo $j;
          echo"[]"; ?>" value="<?php echo $getOrderDetails[0]->{'quantity_'.$j}; ?>" id="quantity_<?php echo $j; ?>" placeholder="quantity"  class="custom_input quantity_no"/>
    <div class="sg-select-container qt" id="qt" style="color: red;" ></div>   
    </div>    
    </div>

    <div class="col-lg-6">
        <label for="state" class="control-label">Note</label>
        <div class="sg-select-container">
            <textarea required type="text" name="note_<?php echo $j;
          echo"[]"; ?>]" id="note_<?php echo $j;
          echo"[]"; ?>" placeholder="note"
 class="custom_input note"><?php echo $getOrderDetails[0]->{'note_'.$j};?></textarea>
	        <div class="sg-select-container nt" id="nt" style="color: red;"></div>
        </div>
      </div>

    <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_<?php echo $j; ?>" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>
</div>

      <?php
          $j++;
      } ?>

      <!-- dynamic product rows end -->

    </div>



    <!-- end of product rows -->

   

	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required min="<?php echo date("Y-m-d");?>"  type="date" value="<?php echo $getOrderDetails[0]->prefer_delivery_data;?>" id="prefer_delivery_date" name="prefer_delivery_date[]" class="date1 custom_input" placeholder="prefer_delivery_date"/>
	   
	   <div class="sg-select-container" id="dt" style="
    color: red;
">
      </div>
      </div>
	  
	  <label for="state" class="control-label">Information for suppliers</label>
      <div class="sg-select-container">
       <textarea  required type="text" name="description[]" id="description" placeholder="Information for suppliers" class="custom_input"/>
       <?php echo $getOrderDetails[0]->order_description;?></textarea>
      </div>
	   <div class="sg-select-container" id="de" style="
    color: red;">
      </div>
	  
	   <div>
	   <div class="row">
      
       <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">1-Image</label> 
		<input class="supplier-image" type="file" name="image1" value="" id='1' >
        <?php if($getOrderDetails[0]->image1!=NULL){echo "<img id='cu1' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image1;echo "' <i class='fas fa-trash' aria-hidden='true' id='image1' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu1' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image1' style='font-size:30px;color:red;' ></i><br>";
        }?>
		<!-- <img   id="cu1" width="100" height="80" src="<?= base_url();?>uploads/camera.png"><i class="fas fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br> -->
		</div>
		   <div class="col-lg-6">
           <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">2-Image</label> 
		<input class="supplier-image" type="file" name="image2" value="" id='1' >
        <?php if($getOrderDetails[0]->image2!=NULL){echo "<img id='cu2' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image2;echo "' <i class='fas fa-trash' aria-hidden='true' id='image2' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu2' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image2' style='font-size:30px;color:red;' ></i><br>";
        }?>
	    </div>
    </div>
		<div class="row">
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">3-Image</label> 
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
        <?php if($getOrderDetails[0]->image3!=NULL){echo "<img id='cu3' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image3;echo "' <i class='fas fa-trash' aria-hidden='true' id='image3' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu3' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image3' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">4-Image</label> 
		<input class="supplier-image" type="file" name="image4" value="" id='4' >
        <?php if($getOrderDetails[0]->image4!=NULL){echo "<img id='cu4' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image4;echo "' <i class='fas fa-trash' aria-hidden='true' id='image4' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu4' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image4' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">5-Image</label> 
		<input class="supplier-image" type="file" name="image5" value="" id='5' >
        <?php if($getOrderDetails[0]->image5!=NULL){echo "<img id='cu5' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image5;echo "' <i class='fas fa-trash' aria-hidden='true' id='image5' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu5' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image5' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">6-Image</label> 
		<input class="supplier-image" type="file" name="image6" value="" id='6' >
        <?php if($getOrderDetails[0]->image6!=NULL){echo "<img id='cu6' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image6;echo "' <i class='fas fa-trash' aria-hidden='true' id='image6' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu6' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image6' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">7-Image</label> 
		<input class="supplier-image" type="file" name="image7" value="" id='7' >
        <?php if($getOrderDetails[0]->image7!=NULL){echo "<img id='cu7' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image7;echo "' <i class='fas fa-trash' aria-hidden='true' id='image7' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu7' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image7' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
		<div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">8-Image</label> 
		<input class="supplier-image" type="file" name="image8" value="" id='8' >
        <?php if($getOrderDetails[0]->image8!=NULL){echo "<img id='cu8' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image8;echo "' <i class='fas fa-trash' aria-hidden='true' id='image8' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu8' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image8' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">9-Image</label> 
		<input class="supplier-image" type="file" name="image9" value="" id='9' >
        <?php if($getOrderDetails[0]->image9!=NULL){echo "<img id='cu9' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image9;echo "' <i class='fas fa-trash' aria-hidden='true' id='image9' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu9' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image9' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
		<div class="col-lg-6">
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">10-Image</label> 
		<input class="supplier-image" type="file" name="image10" value="" id='10' >
        <?php if($getOrderDetails[0]->image10!=NULL){echo "<img id='cu10' width='100' height='80' src='";echo  base_url();echo  "uploads/" ;echo $getOrderDetails[0]->image10;echo "' <i class='fas fa-trash' aria-hidden='true' id='image10' style='font-size:30px;color:red;' ></i><br>";}else{
            echo "<img   id='cu10' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image10' style='font-size:30px;color:red;' ></i><br>";
        }?>
		</div>
		</div>
		</div>
	   
	 <!-- <label for="state" class="control-label">Select images:</label>
      <div class="sg-select-container">
      <input type="file" name="product_image[]" class="file-2" multiple>
      </div>-->
    <!-- end col -->

    <div class="form-group col-md-4 choose-outdoor-is-hidden" style="display: none;">
      <label for="other-textfield" class="control-label">Other</label>
      <input type="text" class="form-control form-input-field" name="other-textfield" value=""  placeholder="">
      <span class="help-block"></span>
    </div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title custom_title"   >Preview</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>
        <div class="modal-body">

        <div class="border">
	  <label for="state" class="control-label">Category</label>
      <div class="sg-select-container" id="cate" >
      </div> 
        </div>

        <!-- preview product will be add in this div -->
        <div class="previewBorder">
</div>



 <div class="border">
	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container" id="date" >
      </div>
</div>
 <div class="border">
	   <label for="state" class="control-label">Information for suppliers</label>
      <div class="sg-select-container" id="dis" >
      </div>
	  </div>
	   <label for="state" class="control-label">Image</label>
      <div class="sg-select-container" id="" >
       <img id="pop1" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100" />
       <img id="pop2" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100" />
       <img id="pop3" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop4" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop5" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
       <img id="pop6" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop7" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop8" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop9" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
       <img id="pop10" src="<?= base_url();?>assets/images/camera.png" alt="your image" height="100" width="100"/>
      </div>	   
</div>
        <div class="modal-footer">
           <input type="submit" class="btn_custom_btn"name="Save_As_Draft" value="Save As Draft"> 
		   <input type="submit" name="submit" value="confirm" class='btn btn-default custom_btn_color'>
           <input type="button" class="btn btn-default custom_btn_color" data-dismiss="modal" value="Close">
        </div>

      
      </div>
      
    </div>
  </div>
  
  <!-- start of product limit modal -->
  <div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
        <h4 class="modal-title custom_title"   >Warning</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>

        <div class="modal-body">
        You can only order 10 products in one category order</div>
    </div>
  </div>
</div>
  <!-- end of product limit modal -->
 <input type="submit" name="submit" value="submit" style="display:none;">
    <button type="button" class="btn btn-info btn-lg abc" data-toggle="modal" data-target="#myModal" id="Preview">Preview</button>

    <a style="margin-top: 17px;" class="btn btn-primary btn-lg" href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>


</div>
	
	</div>

  </div><!-- row audit -->
</div>

</form>
 <div style="clear:both"></div>
</div>




<script>
// add product row
$(document).ready(function(){
    var n = $('.product').length + 1;
    $(".addProduct").click(function(){
        var productRow = $('.add-row-outdoor').length;
        console.log(productRow);
        if (productRow < 9){
            
            var newTxtHtml = "<div class='col-lg-3'><label for='state' class='control-label custom_control_label'>Product " + n + "</label><div class='sg-select-container' id='productabc'><input required type='text' name='product_" + n + "[]' class='product custom_input'  placeholder='product' id='product_" + n + "'/><div class='sg-select-container pr' id='pr' style='color: red;'></div><div class='sg-select-container' id='disProduct" + n + "' ></div></div><?php
            $this->db->from('buyer_orders');
            $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
            $this->db->select('buyer_orders.order_name_2, category.name');
            $querys = $this->db->get()->result();
        ?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-lg-3'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name_" + n + "[]'  placeholder='Brand name' id='brand_name_" + n + "' class='custom_input brand_name'/><div class='sg-select-container bn' id='bn' style='color: red;' ></div></div> </div> <div class='col-lg-3'><label for='state' class='control-label custom_control_label'>id/serial/model no.</label><div class='sg-select-container'><input  required type='text' name='partNumber_" + n + "[]' id='partNumber_" + n + "' placeholder='id/serial/model no.' class='custom_input model_no'/><div class='sg-select-container pn' id='pn' style='color: red;' ></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity_" + n + "[]' id='quantity_" + n + "' placeholder='quantity' class='custom_input quantity_no'/><div class='sg-select-container qt' id='qt' style='color: red;'></div></div></div><div class='col-lg-6'><label for='state' class='control-label'>Note</label><div class='sg-select-container'><textarea required type='text' name='note_" + n + "[]' id='note_" + n + "' placeholder='note' class='custom_input note'></textarea><div class='sg-select-container nt' id='nt' style='color: red;'></div></div> </div><div class='sg-select-container col-lg-6'><label for='state' class='control-label'>Add image</label></div><div class='sg-select-container col-lg-12'><label for='state' class='control-label'>Master List</label><input  required type='checkbox' name='master_list_product_" + n + "' value='1'  /> <p><h4>save this product to your master list?</h4></p></div>"; 

        var newTxt = $('<div class="add-row-outdoor row width-100" style="padding-left:15px;"> '+newTxtHtml+'<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-add-waste removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove</button> </div> </div><!-- row audit -->');
    //$(".row-outdoor-container").attach(newTxt); 
        $(".productrow").append($(newTxt));
        n++;
     }else{$('#productModal').modal('show');}
});

$("body").on('click' , '.removeOutdoor' , function(){
      var curRow = $(this).parents('div.add-row-outdoor');
      curRow.remove();
      n--;
});

// the selection functionality - does not work for other divs
$('.productrow').on("change", '.choose-outdoor', function (e) {
	var val = $(this).val();
  $el = $(this).closest(".add-row-outdoor").find('.choose-outdoor-is-hidden');
	if (val == 'other') {
  	$el.show();
	} 
	// Hide complete sub type div
	else {
		$el.hide();
	}
});


  
     /*  $('.date1').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "m/d/yy"
}); */

   $('.cancel').click(function(){
var checkstr =  confirm('are you sure you want to cancel this?');
if(checkstr == true){
  // do your code
}else{
return false;
}
});


/* $('#form').validate({
        onclick: false, // <-- add this option
        rules: {
            product: "required"
        },
        messages: {
            product: {
                required: "The product is required!"
            }
        },
        errorPlacement: function (error, element) {
            alert(error.text());
        }
    });
 */

/* 
  $("#form").validate({
        rules: {
            "product": {
                required: true,
               // minlength: 5
            }, 
			"partNumber": {
                required: true,
               // minlength: 5
            },
			"category": {
                required: true,
               // minlength: 5
            },
			"prefer_delivery_date": {
                required: true,
               // minlength: 5
            },
			"description": {
                required: true,
               // minlength: 5
            },
            "quantity": {
                required: true,
                email: true
            }
        },
        messages: {
            "product": {
                required: "Please, enter a product name"
            },
			"partNumber": {
                required: "Please, enter a id/serial/model no."
            },
			"category": {
                required: "Please, enter a Category"
            },
			"prefer_delivery_date": {
                required: "Please, enter a prefer delivery date"
            },
			"description": {
                required: "Please, enter a description"
            },
            "quantity": {
                required: "Please, enter an email",
                quantity: "Email is invalid"
            }
        },
        submitHandler: function (form) { // for demo
            //alert('valid form submitted'); // for demo
            return false; // for demo
        }
    }); 
 */


});

$("#image1").click(function(){
document.getElementById("1").value = null;
$("#cu1").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image2").click(function(){
document.getElementById("2").value = null;
$("#cu2").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image3").click(function(){
document.getElementById("3").value = null;
$("#cu3").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image4").click(function(){
document.getElementById("4").value = null;
$("#cu4").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image5").click(function(){
document.getElementById("5").value = null;
$("#cu5").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image6").click(function(){
document.getElementById("6").value = null;
$("#cu6").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image7").click(function(){
document.getElementById("7").value = null;
$("#cu7").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image8").click(function(){
document.getElementById("8").value = null;
$("#cu8").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image9").click(function(){
document.getElementById("9").value = null;
$("#cu9").attr("src","<?= base_url();?>assets/images/camera.png");
});
$("#image10").click(function(){
document.getElementById("10").value = null;
$("#cu10").attr("src","<?= base_url();?>assets/images/camera.png");
});
</script>



<script> 
function getcategory(order_name,category,product_assign_category){
	// alert(order_name);
	// alert(category); 
	// alert(product_assign_category);
	
	  order_namestr = order_name.replace(/[_]/g, " "); 
	  categorystr = category.replace(/[_]/g, " "); 
	  
	  //alert(categorystr);
	
	 $('input[type=text]#product_1').val(order_namestr);
	 
	 $('#Category :selected').text(categorystr);
	 $('#Category :selected').val(product_assign_category);
	 $('.rg').hide();
	  
	//$order_name = str_replace(' ','_',$categoryValue->order_name);
	//$('#product').val(order_name);

 }
</script> 
<script> 


 
 $(function() {
   $('input[type=file]').change(function(){
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.')+1).toLowerCase()){
        case 'jpg' : 
        case 'png' : showimagepreview(this); break;
        case 'gif' :
        case 'jpeg' : showimagepreview(this); break;
        default : $('#errorimg').html("Invalid Photo"); break;
        }
    });

    function showimagepreview(input) {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function(e) {
                $('#cu'+input.id).attr('src', e.target.result);
				//alert(e.target.result);
				//alert(input.id);
				
                $('#pop'+input.id).attr('src', e.target.result);
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
});


$('#Preview').click(function(){
    $(".previewBorder").empty();
	$(".bn").text("");
	$('.pr').text("");
	$('.pn').text("");
	$('.qt').text("");
    $('.nt').text("");
	$('#dt').text("");
	$('#de').text("");
	$('#ct').html("");	
	
	var Category =$("#Category").val();
	var prefer_delivery_date = $('#prefer_delivery_date').val();
	var description = $('#description').val();
    var Category1 = $("#Category option:selected").text();
 
    var valid;

    var today = new Date();
    var date = today.getFullYear()+'-'+("0" + (today.getMonth()+1))+'-'+today.getDate();

    let d1 = Date.parse(date);
    let d2 = Date.parse(prefer_delivery_date);
	if(prefer_delivery_date == ""){
	
	$('.abc').attr('data-target','');	
	 $('#dt').text("Prefer delivery date field is required");	
	 valid = false;
    }

    // d1 today, d2 prefer date
    if(d1>d2){
        $('.abc').attr('data-target','');	
	 $('#dt').text("Please select a date after or equal today");	
	 valid = false;
    }


	 if(description == ""){
	
	$('.abc').attr('data-target','');	
	$('#de').text("Description field is required");
	valid = false;
	}
	if(Category1 == "" || Category1 == null){
   
	$('.abc').attr('data-target','');
    $('#ct').text("Category field is required");	
        valid = false;
    }

    for (var z = 1; z<11; z++){
        let c = z-1;
        if($('#product_' + z).val()==''){
            $('.abc').attr('data-target','');	
	        $('.pr').eq(c).text("Product name is required");
	        valid = false;
        }

        if($('#brand_name_' + z).val()==''){
	        $('.abc').attr('data-target','');	
	        $(".bn").eq(c).text("Brand name is required");
	        valid = false;
        }

        if($('#partNumber_' + z).val()==''){
            $('.abc').attr('data-target','');
            $('.pn').eq(c).text("id/serial/model no. is required");	
	        valid = false;
        }

        if($('#quantity_' + z).val()==''){
	        $('.abc').attr('data-target','');
            $('.qt').eq(c).text("Quantity field is required");		
	        valid = false;
        }
        
    }

    
		
	if(valid !== false){	
    let j = 1;
    var productCount = $('.product').length;
    for(var i = 0; i<11;i++){
        if($(".product").eq(i).val()!=undefined){
            console.log($("#product_" + j).val());
            var newProductPreview = "<label for='state' class='control-label'>Product " + j + "</label><label for='state' class='control-label'>Product Name</label><div class='sg-select-container' id='pname_" + j + "' >" + "</div> <label for='state' class='control-label'>Brand Name</label><div class='sg-select-container' id='bname_" + j + "' >" + "</div><label for='state' class='control-label'>id/serial/model no.</label><div class='sg-select-container' id='partname_" + j + "' >"  + "</div> <label for='state' class='control-label'>Quantity</label><div class='sg-select-container' id='q_" + j + "' >" +  "</div> " + "<label for='state' class='control-label'>Note</label><div class='sg-select-container' id='noteP_" + j + "' >" +  "</div> "; 
            var newPreview = $('<div class="border-bottom">'+newProductPreview+'</div>');
    //$(".row-outdoor-container").attach(newTxt);   
            $(".previewBorder").append($(newPreview));
            $('#pname_'+j).text($("#product_" + j).val());
            $('#bname_'+j).text($("#brand_name_"+j).val());
            $('#partname_'+j).text($("#partNumber_"+j).val());
            $('#q_'+j).text($("#quantity_" +j ).val());
            $('#noteP_'+j).text($("#note_" +j ).val());
            j++;
        }
    }


    $('#cate').text(Category1);
	$('#date').text(prefer_delivery_date);
	$('#dis').text(description);
	$('.abc').attr('data-target','#myModal');
	}
	//$("#quantity").append(quantity);

}
);

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});



$("#categoryName").click(function(){

 var newCategory = $("input[name='newCategory']").val();
    var valid
	

 if(newCategory == ""){
   $('#newCate').text("Category name is required");
	return false;
	}


//  alert(newCategory);
$.ajax({
           url: '<?php echo site_url(); ?>/buyer/newCategory',
           type: 'POST',
           data: {newCategory: newCategory},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
			   
				
                $("#Category").html(data);
				
				$('#myModals').modal('toggle'); //or  $('#IDModal').modal('hide');
                return false;
				
			
           }
        });
		});

// search feature
$(".product").keyup(function(){  
      
	var Category1 = $("#product_1").val();	
	
	// if(Category1 == ""){
	 // $(".tt").hide();  
	// }
	
	
	//alert(Category1); 
	
	 $.ajax({
         type: "POST",
		 url: '<?php echo site_url(); ?>buyer/product/Category',
		 data: {Category1: Category1},
         error: function() {
              alert('Something is wrong');
           },
         success: 
              function(data){
				 //$("#disProduct").empty();   
				//$(".productabc").append(data);
               // $(data).insertAfter( ".productabc" );
            //display the search result
			$("#disProduct1").html(data);
				
				  
               // alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;	
		
		
    });
	
function masterlist() {
  
  var product = document.getElementById("master_list").value;
 // alert(product);
  
   $.ajax({
	     url: '<?php echo site_url(); ?>buyer/product/MasterList',
         datatype: 'json',
		 type: "POST",
		 data: {product: product},
         success: 
              function(data){
			var obj = JSON.parse(data);	  
			// console.log(obj);
            //console.log(obj.brand_name);
            var countRow = $(".product").filter(function(){
                return $(this).val()!='';
                
            }).length;
            console.log ('test' + countRow);
            for(i= 0; i<=countRow;i++){
            if($(".product").eq(i).val()==''){
            $(".product").eq(i).val(obj.order_name_1);
            if($('#Category :selected').val()==''){
			$('#Category :selected').val(obj.product_assign_category);
			$('#Category :selected').text(obj.category_name);}
			$(".brand_name").eq(i).first().val(obj.brand_name_1);
			$(".model_no").eq(i).val(obj.part_number_1);
            }else{$(".product").next().val(obj.order_name_1);}}
        
        }
          });

}	
	
	
	
	
 
</script>

