<?php //http://jsfiddle.net/lemonkazi/re8e2yov/?>
<style>
/* #ui-datepicker-div { font-size: 12px; }   */
body {
    padding: 20px;
}

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

<!-- <div class="row row-audit-space-btn">
  <button class="btn btn-add-waste addProduct">
    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i>Add Product</button>   
</div> -->

<!-- master list select -->

<div class="sg-select-container" id="xxx" style="color: green;"></div>
<label for="state" class="control-label custom_control_label">Master Listing:</label>
    <div class="sg-select-container">
    <select name="master_list" required id="master_list" onchange="masterlist()">
	<option value ="">Select Product</option>
	<?php
    if (!empty($master_list)) {
        foreach ($master_list as $master_listValue) { 
        ?>
	<option <?php echo set_select('buyer_orders', $master_listValue->master_id); ?> value ="<?php echo $master_listValue->master_id; ?>"><?php echo $master_listValue->order_name?> ------- <?php echo $master_listValue->name ?>
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
    <select name="category[]" required id="Category">
	<option value ="">Select Category</option>
	<?php
    if (!empty($category)) {
        foreach ($category as $categoryValue) {
            ?>
	<option <?php echo set_select('category', $categoryValue->id); ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
	</option>
	<?php
        }
    }
    ?>            
	</select>
<!-- beign of a product row -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_1[]" class="product custom_input"  placeholder="product" id="product_1"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_1[]"  placeholder="Brand name" id="brand_name_1" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>

	  
	  
	   <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_1" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>
<!-- second product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_2[]" class="product custom_input"  placeholder="product" id="product_2"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_2[]"  placeholder="Brand name" id="brand_name_2" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_2" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- third product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_3[]" class="product custom_input"  placeholder="product" id="product_3"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_3[]"  placeholder="Brand name" id="brand_name_3" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_3" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- fourth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_4[]" class="product custom_input"  placeholder="product" id="product_4"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_4[]"  placeholder="Brand name" id="brand_name_4" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_4" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- fifth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_5[]" class="product custom_input"  placeholder="product" id="product_5"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_5[]"  placeholder="Brand name" id="brand_name_5" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_5" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- sixth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_6[]" class="product custom_input"  placeholder="product" id="product_6"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_6[]"  placeholder="Brand name" id="brand_name_6" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_6" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- seventh product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_7[]" class="product custom_input"  placeholder="product" id="product_7"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_7[]"  placeholder="Brand name" id="brand_name_7" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_7" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- eightth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_8[]" class="product custom_input"  placeholder="product" id="product_8"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_8[]"  placeholder="Brand name" id="brand_name_8" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_8" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- ninth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_9[]" class="product custom_input"  placeholder="product" id="product_9"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_9[]"  placeholder="Brand name" id="brand_name_9" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_9" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- tenth product row  -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product</label>
                <div class="sg-select-container" id="productabc">
                    <input required type="text" name="product_10[]" class="product custom_input"  placeholder="product" id="product_10"/>
	                <div class="sg-select-container" id="pr" style="color: red;"></div>
	                <div class="sg-select-container" id="disProduct" ></div>
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

	    <label for="state" class="control-label">Brand Names</label>
        <div class="sg-select-container">
            <input required type="text" name="brand_name_10[]"  placeholder="Brand name" id="brand_name_10" class="custom_input brand_name"/>
	        <div class="sg-select-container" id="bn" style="color: red;" ></div></div> 
    </div> 

    <div class="col-lg-3">
        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
        <div class="sg-select-container">
            <input  required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no"/>
	        <div class="sg-select-container" id="pn" style="color: red;" ></div>
        </div>
    </div> 
	  <div class="col-lg-3">
        <label for="state" class="control-label">Quantity</label>
        <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no"/>
	        <div class="sg-select-container" id="qt" style="color: red;"></div>
        </div>
      </div>
	  
	  
      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
	    <input  required type="checkbox" name="master_list_product_10" value="1"  /> 
	    <p><h4>save this product to your master list?</h4></p>
       </div>

    </div>

    <!-- end of product rows -->

	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" id="prefer_delivery_date" name="prefer_delivery_date[]" class="date1 custom_input" placeholder="prefer_delivery_date"/>
	   
	   <div class="sg-select-container" id="dt" style="
    color: red;
">
      </div>
      </div>
	  
	  <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <textarea  required type="text" name="description[]" id="description" placeholder="description" class="custom_input"/></textarea>
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
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br>
		</div>
		   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">2-Image</label>
		<input class="supplier-image" type="file" name="image2" value="" id='2'>
		<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
		</div>
		</div>
		<div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">3-Image</label>
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
		<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">4-Image</label>
		<input class="supplier-image" type="file" name="image4" value=""  id='4' >
		<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">5-Image</label>
		<input class="supplier-image" type="file" name="image5" value="" id='5' >
		<img    id="cu5"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">6-Image</label>
		<input class="supplier-image" type="file" name="image6" value=""  id='6' >
		<img  id="cu6" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">7-Image</label>
		<input class="supplier-image" type="file" name="image7" value="" id='7' >
		<img    id="cu7"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">8-Image</label>
		<input class="supplier-image" type="file" name="image8" value=""  id='8' >
		<img  id="cu8" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label custom_label_img">9-Image</label>
		<input class="supplier-image" type="file" name="image9" value="" id='9' >
		<img    id="cu9"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		<div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">10-Image</label>
		<input class="supplier-image" type="file" name="image10" value=""  id='10' >
		<img  id="cu10" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title custom_title"   >Preview</h4>
        </div>
        <div class="modal-body">

        <div class="border">
	  <label for="state" class="control-label">Categary</label>
      <div class="sg-select-container" id="cate" >
      </div> 
</div>


<div class="border">

<label for="state" class="control-label">Product 1</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_1" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_1" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_1" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_1" >
      </div> 
</div>



<div class="border hidden"  id="preview_2">
<label for="state" class="control-label">Product 2</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_2" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_2" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_2" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_2" >
      </div> 
</div>

<div class="border hidden"  id="preview_3">
<label for="state" class="control-label">Product 3</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_3" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_3" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_3" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_3" >
      </div> 
</div>

<div class="border hidden"  id="preview_4">
<label for="state" class="control-label">Product 4</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_4" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_4" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_4" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_4" >
      </div> 
</div>

<div class="border hidden"  id="preview_5">
<label for="state" class="control-label">Product 5</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_5" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_5" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_5" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_5" >
      </div> 
</div>

<div class="border hidden"  id="preview_6">
<label for="state" class="control-label">Product 6</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_6" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_6" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_6" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_6" >
      </div> 
</div>

<div class="border hidden"  id="preview_7">
<label for="state" class="control-label">Product 7</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_7" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_7" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_7" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_7" >
      </div> 
</div>

<div class="border hidden"  id="preview_8">
<label for="state" class="control-label">Product 8</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_8" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_8" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_8" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_8" >
      </div> 
</div>

<div class="border hidden"  id="preview_9">
<label for="state" class="control-label">Product 9</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_9" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_9" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_9" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_9" >
      </div> 
</div>

<div class="border hidden"  id="preview_10">
<label for="state" class="control-label">Product 10</label>
     <label for="state" class="control-label">Product Name</label>
      <div class="sg-select-container" id="pname_10" >
      </div> 



      <label for="state" class="control-label">Brand Name</label>
      <div class="sg-select-container" id="bname_10" >
      </div>

 

	   <label for="state" class="control-label">id/serial/model no.</label>
      <div class="sg-select-container" id="partname_10" >
      </div> 

 

	   <label for="state" class="control-label">Quantity</label>
      <div class="sg-select-container" id="q_10" >
      </div> 
</div>

 <div class="border">
	   <label for="state" class="control-label">Prefer Delivery date</label>
      <div class="sg-select-container" id="date" >
      </div>
</div>
 <div class="border">
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container" id="dis" >
      </div>
	  </div>
	   <label for="state" class="control-label">Image</label>
      <div class="sg-select-container" id="" >
       <img id="pop1" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100" />
       <img id="pop2" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100" />
       <img id="pop3" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop4" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop5" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
       <img id="pop6" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop7" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop8" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop9" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
       <img id="pop10" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image" alt="your image" height="100" width="100"/>
      </div>
      <div class="sg-select-container" id="" >
	   
      </div>
      <div class="sg-select-container" id="" >
	   
      </div>
      <div class="sg-select-container" id="" >
	   
      </div>
      <div class="sg-select-container" id="" >
	   
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title custom_title"   >Warning</h4>
        </div>

        <div class="modal-body">
        You can only order 10 products in an order</div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
// add product row
$(document).ready(function(){

    $(".addProduct").click(function(){
        var productRow = $('.add-row-outdoor').length;
        console.log(productRow);
        if (productRow < 8){
            var newTxtHtml = "<div class='col-lg-3'><label for='state' class='control-label custom_control_label'>Product</label><div class='sg-select-container' id='productabc'><input required type='text' name='product[]' class='product1 custom_input'  placeholder='product' id='product_2'/><div class='sg-select-container' id='pr' style='color: red;'></div><div class='sg-select-container' id='disProduct' ></div></div><?php
            $this->db->from('buyer_orders');
            $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
            $this->db->select('buyer_orders.order_name_2, category.name');
            $querys = $this->db->get()->result();
        ?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-lg-3'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name[]'  placeholder='Brand name' id='brand_name_2' class='custom_input brandname'/><div class='sg-select-container' id='bn' style='color: red;' ></div></div> </div> <div class='col-lg-3'><label for='state' class='control-label custom_control_label'>id/serial/model no.</label><div class='sg-select-container'><input  required type='text' name='partNumber[]' id='partNumber_2' placeholder='id/serial/model no.' class='custom_input'/><div class='sg-select-container' id='pn' style='color: red;' ></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity[]' id='quantity_2' placeholder='quantity' class='custom_input'/><div class='sg-select-container' id='qt' style='color: red;'></div></div></div><div class='sg-select-container'><label for='state' class='control-label'>Master List</label><input  required type='checkbox' name='master_list_product_3' value='1'  /> <p><h4>save this product to your master list?</h4></p></div>"; 

        var newTxt = $('<div class="add-row-outdoor row width-100 padding-left-15"> '+newTxtHtml+'<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-add-waste removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove</button> </div> </div><!-- row audit -->');
    //$(".row-outdoor-container").attach(newTxt); 
        $(".productrow").append($(newTxt));
     }else{$('#productModal').modal('show');}
});

$("body").on('click' , '.removeOutdoor' , function(){
      var curRow = $(this).parents('div.add-row-outdoor');
      curRow.remove();
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
$("#cu1").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image2").click(function(){
document.getElementById("2").value = null;
$("#cu2").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image3").click(function(){
document.getElementById("3").value = null;
$("#cu3").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image4").click(function(){
document.getElementById("4").value = null;
$("#cu4").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image5").click(function(){
document.getElementById("5").value = null;
$("#cu5").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image6").click(function(){
document.getElementById("6").value = null;
$("#cu6").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image7").click(function(){
document.getElementById("7").value = null;
$("#cu7").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image8").click(function(){
document.getElementById("8").value = null;
$("#cu8").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image9").click(function(){
document.getElementById("9").value = null;
$("#cu9").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
});
$("#image10").click(function(){
document.getElementById("10").value = null;
$("#cu10").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
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
    
	$("#bn").text("");
	$('#pr').text("");
	$('#pn').text("");
	$('#qt').text("");
	$('#dt').text("");
	$('#de').text("");
	$('#ct').html("");	
	
	var Category =$("#Category").val();
	var prefer_delivery_date = $('#prefer_delivery_date').val();
	var description = $('#description').val();
    var Category1 = $("#Category option:selected").text();
    //var Category1 = $("#Category option:selected").val();
    
    var product_1 = $('#product_1').val();
    var brand_name_1 = $('#brand_name_1').val();
	var partname_1 = $('#partNumber_1').val();
    var quantity_1 = $('#quantity_1').val();


    var product_2 = $('#product_2').val();
    var brand_name_2 = $('#brand_name_2').val();
	var partname_2 = $('#partNumber_2').val();
    var quantity_2 = $('#quantity_2').val();

    var product_3 = $('#product_3').val();
    var brand_name_3 = $('#brand_name_3').val();
	var partname_3 = $('#partNumber_3').val();
    var quantity_3 = $('#quantity_3').val();

    var product_4 = $('#product_4').val();
    var brand_name_4 = $('#brand_name_4').val();
	var partname_4 = $('#partNumber_4').val();
    var quantity_4 = $('#quantity_4').val();

    var product_5 = $('#product_5').val();
    var brand_name_5 = $('#brand_name_5').val();
	var partname_5 = $('#partNumber_5').val();
    var quantity_5 = $('#quantity_5').val();

    var product_6 = $('#product_6').val();
    var brand_name_6 = $('#brand_name_6').val();
	var partname_6 = $('#partNumber_6').val();
    var quantity_6 = $('#quantity_6').val();

    var product_7 = $('#product_7').val();
    var brand_name_7 = $('#brand_name_7').val();
	var partname_7 = $('#partNumber_7').val();
    var quantity_7 = $('#quantity_7').val();

    var product_8 = $('#product_8').val();
    var brand_name_8 = $('#brand_name_8').val();
	var partname_8 = $('#partNumber_8').val();
    var quantity_8 = $('#quantity_8').val();

    var product_9 = $('#product_9').val();
    var brand_name_9 = $('#brand_name_9').val();
	var partname_9 = $('#partNumber_9').val();
    var quantity_9 = $('#quantity_9').val();

    var product_10 = $('#product_10').val();
    var brand_name_10 = $('#brand_name_10').val();
	var partname_10 = $('#partNumber_10').val();
    var quantity_10 = $('#quantity_10').val();
    
    var valid;
	if(brand_name_1 == ""){
	
	$('.abc').attr('data-target','');	
	$("#bn").text("Brand name is required");
	valid = false;
	
	}
	 if(product_1 == ""){
	$('.abc').attr('data-target','');	
	$('#pr').text("Product name is required");
	valid = false;
	}
	if(partname_1 == ""){
	
	$('.abc').attr('data-target','');
    $('#pn').text("id/serial/model no. is required");	
	valid = false;
	}
	 if(quantity_1 == ""){
	
	$('.abc').attr('data-target','');
    $('#qt').text("Quantity field is required");		
	valid = false;
	}
	if(prefer_delivery_date == ""){
	
	$('.abc').attr('data-target','');	
	 $('#dt').text("Prefer delivery date field is required");	
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
    

    // product 2

    if(product_2 !==""){
        if(brand_name_2 == ""){
	valid = false;
	
	}
	 if(product_2 == ""){
	valid = false;
	}
	if(partname_2 == ""){
	valid = false;
	}
	 if(quantity_2 == ""){	
	valid = false;
	} 
    }

    if(product_3 !==""){
        if(brand_name_3 == ""){
	valid = false;
	
	}
	 if(product_3 == ""){
	valid = false;
	}
	if(partname_3 == ""){
	valid = false;
	}
	 if(quantity_3 == ""){	
	valid = false;
	} 
    }

    if(product_4 !==""){
        if(brand_name_4 == ""){
	valid = false;
	
	}
	 if(product_4 == ""){
	valid = false;
	}
	if(partname_4 == ""){
	valid = false;
	}
	 if(quantity_4 == ""){	
	valid = false;
	} 
    }

    if(product_5 !==""){
        if(brand_name_5 == ""){
	valid = false;
	
	}
	 if(product_5 == ""){
	valid = false;
	}
	if(partname_5 == ""){
	valid = false;
	}
	 if(quantity_5 == ""){	
	valid = false;
	} 
    }

    if(product_6 !==""){
        if(brand_name_6 == ""){
	valid = false;
	
	}
	 if(product_6 == ""){
	valid = false;
	}
	if(partname_6 == ""){
	valid = false;
	}
	 if(quantity_6 == ""){	
	valid = false;
	} 
    }

    if(product_7 !==""){
        if(brand_name_7 == ""){
	valid = false;
	
	}
	 if(product_7 == ""){
	valid = false;
	}
	if(partname_7 == ""){
	valid = false;
	}
	 if(quantity_7 == ""){	
	valid = false;
	} 
    }

    if(product_8 !==""){
        if(brand_name_8 == ""){
	valid = false;
	
	}
	 if(product_8 == ""){
	valid = false;
	}
	if(partname_8 == ""){
	valid = false;
	}
	 if(quantity_8 == ""){	
	valid = false;
	} 
    }

    if(product_9 !==""){
        if(brand_name_9 == ""){
	valid = false;
	
	}
	 if(product_9 == ""){
	valid = false;
	}
	if(partname_9 == ""){
	valid = false;
	}
	 if(quantity_9 == ""){	
	valid = false;
	} 
    }

    if(product_10 !==""){
        if(brand_name_10 == ""){
	valid = false;
	
	}
	 if(product_10 == ""){
	valid = false;
	}
	if(partname_10 == ""){
	valid = false;
	}
	 if(quantity_10 == ""){	
	valid = false;
	} 
    }
	
		
	if(valid !== false){	
    
    $('#cate').text(Category1);	
	$('#bname_1').text(brand_name_1);
	$('#pname_1').text(product_1);
	$('#partname_1').text(partname_1);
    $('#q_1').text(quantity_1);

    if(product_2 !==""){
        $('#bname_2').text(brand_name_2);
	    $('#pname_2').text(product_2);
	    $('#partname_2').text(partname_2);
        $('#q_2').text(quantity_2); 
        $('#preview_2').removeClass('hidden');
    }else{ 
        $('#preview_2').addClass('hidden');

    }

    if(product_3 !==""){
        $('#bname_3').text(brand_name_3);
	    $('#pname_3').text(product_3);
	    $('#partname_3').text(partname_3);
        $('#q_3').text(quantity_3); 
        $('#preview_3').removeClass('hidden');
    }else{ 
        $('#preview_3').addClass('hidden');

    }

    if(product_4 !==""){
        $('#bname_4').text(brand_name_4);
	    $('#pname_4').text(product_4);
	    $('#partname_4').text(partname_4);
        $('#q_4').text(quantity_4); 
        $('#preview_4').removeClass('hidden');
    }else{ 
        $('#preview_4').addClass('hidden');

    }

    if(product_5 !==""){
        $('#bname_5').text(brand_name_5);
	    $('#pname_5').text(product_5);
	    $('#partname_5').text(partname_5);
        $('#q_5').text(quantity_5); 
        $('#preview_5').removeClass('hidden');
    }else{ 
        $('#preview_5').addClass('hidden');

    }

    if(product_6 !==""){
        $('#bname_6').text(brand_name_6);
	    $('#pname_6').text(product_6);
	    $('#partname_6').text(partname_6);
        $('#q_6').text(quantity_6); 
        $('#preview_6').removeClass('hidden');
    }else{ 
        $('#preview_6').addClass('hidden');

    }

    if(product_7 !==""){
        $('#bname_7').text(brand_name_7);
	    $('#pname_7').text(product_7);
	    $('#partname_7').text(partname_7);
        $('#q_7').text(quantity_7); 
        $('#preview_7').removeClass('hidden');
    }else{ 
        $('#preview_7').addClass('hidden');

    }

    if(product_8 !==""){
        $('#bname_8').text(brand_name_8);
	    $('#pname_8').text(product_8);
	    $('#partname_8').text(partname_8);
        $('#q_8').text(quantity_8); 
        $('#preview_8').removeClass('hidden');
    }else{ 
        $('#preview_8').addClass('hidden');

    }

    if(product_9 !==""){
        $('#bname_9').text(brand_name_9);
	    $('#pname_9').text(product_9);
	    $('#partname_9').text(partname_9);
        $('#q_9').text(quantity_9); 
        $('#preview_9').removeClass('hidden');
    }else{ 
        $('#preview_9').addClass('hidden');

    }

    if(product_10 !==""){
        $('#bname_10').text(brand_name_10);
	    $('#pname_10').text(product_10);
	    $('#partname_10').text(partname_10);
        $('#q_10').text(quantity_10); 
        $('#preview_10').removeClass('hidden');
    }else{ 
        $('#preview_10').addClass('hidden');

    }
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

