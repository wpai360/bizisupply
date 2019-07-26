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


.modal {

display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8)
}

div#modal01 .modal-content {
    margin: auto;
    display: block;
    position: absolute !important;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,0.2)!important;
    width: 60%;
}
div#modal01 .modal-content img {
    height: 500px;
    width: 100%;
}

.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden
}


.close {
text-decoration:none;
float:right;
font-size:24px;
font-weight:bold;
color:white
}
.container1 {
width:200px;
display:inline-block;
}
.modal-content, #caption {   
  -webkit-animation-name: zoom;
  animation-name: zoom;
   
}


@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
.close {
    float: right;
    font-size: 42px !important;
    font-weight: 700;
    line-height: 1;
    color: #fff !important;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1 !important;
}


</style>

<?php //echo "<pre>"; print_r($getOrderDetails); die;?>
<!--<a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">BACK</a> -->
<?php  if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
}?>

<div class="row-outdoor-container">
  <button class="btn btn-add-waste addProduct">
    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i> Add Product</button>   
</div>

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

<form  id="form" action="" Method="post" enctype="multipart/form-data"> 

<div class="row-outdoor-container width-100">
   <div class="add-row-outdoor row width-100 padding-left-15">
   
    <div class="form-group custom_boxshadow col-md-12" style="margin:auto;">

    <label for="state" class="control-label custom_control_label">Category:</label>
        <div class="sg-select-container">
			<select name="category"class="custom_control_label" required id="Category">
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

        <!-- begin of a product row -->
    <div class = "row productrow">
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Product 1</label>
            <div class="sg-select-container">
                <input required type="text" name="product_1[]"  value="<?php echo $getOrderDetails[0]->order_name_1;?>" placeholder="product"  id="product_1" class="custom_input product" />
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
	        <label for="state" class="control-label custom_control_label">Brand Name</label>
            <div class="sg-select-container">
                <input required type="text" name="brand_name_1[]"  placeholder="Brand name" value="<?php echo $getOrderDetails[0]->brand_name_1;?>"   id="brand_name_1" class="custom_input brand_name">
	            <div class="sg-select-container bn" id="bn" style="color: red;" ></div>
            </div> 
        </div>

        <div class="col-lg-3">
	        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
            <div class="sg-select-container">
                <input  required type="text" name="partNumber_1[]"  value="<?php echo $getOrderDetails[0]->part_number_1;?>" id="partNumber" placeholder="id/serial/model no." class="custom_input model_no"/>
	            <div class="sg-select-container pn" id="pn" style="color: red;" ></div> 
            </div>
        </div>
	  
	  
        <div class="col-lg-3">
            <label for="state" class="control-label custom_control_label">Quantity</label>
            <div class="sg-select-container">
            <input required type="number" name="quantity_1[]" value="<?php echo $getOrderDetails[0]->quantity_1;?>" id="quantity_1" placeholder="quantity"  class="custom_input quantity_no"/>
            <div class="sg-select-container qt" id="qt" style="color: red;" ></div> 
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
      for ($v = 1; $v<51;$v++) {
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
      <!--end of a product row  -->

      


	   <label for="state" class="control-label custom_control_label">Prefer Delivery date</label>
      <div class="sg-select-container">
       <input  required type="date" name="prefer_delivery_date" value="<?php echo $getOrderDetails[0]->prefer_delivery_data;?>"  class="date1 custom_control_label custom_input" placeholder="prefer_delivery_date"/>
      </div>
	   
	 <?php  if ($getOrderDetails[0]->image1) {
          ?>
	  <label for="state" class="control-label">Image 1</label>
	  
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image1); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>
	 
	  <?php  if ($getOrderDetails[0]->image2) {
          ?>
	   <label for="state" class="control-label">Image 2</label>
	  <image id="myImg"  src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image2); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>
	 
	  <?php  if ($getOrderDetails[0]->image3) {
          ?>
	  <label for="state" class="control-label">Image 3</label>
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image3); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>

	 <?php  if ($getOrderDetails[0]->image4) {
          ?>
	  	  <label for="state" class="control-label">Image 4</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image4); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
     <?php
      } ?>
     
     <?php  if ($getOrderDetails[0]->image5) {
          ?>
	  	  <label for="state" class="control-label">Image 5</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image5); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
     <?php
      } ?>
     
     <?php  if ($getOrderDetails[0]->image6) {
          ?>
	  	  <label for="state" class="control-label">Image 6</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image6); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>
     
     <?php  if ($getOrderDetails[0]->image7) {
          ?>
	  	  <label for="state" class="control-label">Image 7</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image7); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
     <?php
      } ?>
     
     <?php  if ($getOrderDetails[0]->image8) {
          ?>
	  	  <label for="state" class="control-label">Image 8</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image8); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>
     
     
     <?php  if ($getOrderDetails[0]->image9) {
          ?>
	  	  <label for="state" class="control-label">Image 9</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image9); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
     <?php
      } ?>
     
     <?php  if ($getOrderDetails[0]->image10) {
          ?>
	  	  <label for="state" class="control-label">Image 10</label> 
	  <image id="myImg" src="<?php echo base_url('uploads/'.$getOrderDetails[0]->image9); ?>"  style="
    height: 100px;
    width: 100px;" onclick="onClick(this)">
	 <?php
      } ?>
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>
	 
	 
	 
	 
	 
	 <div class="row">
	   <div class="col-lg-6">
	  
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">1-Image</label> 
		<input class="supplier-image" type="file" name="image1" value="" id='1' >
		<input class="supplier-image" type="hidden" name="oldimage1" value="<?php echo $getOrderDetails[0]->image1; ?>" id='1' >
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i><br>
		</div>
		
	 <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">2-Image</label>
		<input class="supplier-image" type="file" name="image2" value="" id='2'>
		<input class="supplier-image" type="hidden" name="oldimage2" value="<?php echo $getOrderDetails[0]->image2; ?>" id='1' >
		<img   id="cu2" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;" ></i><br>
		</div>
		</div>
		<div class="row">

	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">3-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage3" value="<?php echo $getOrderDetails[0]->image3; ?>" id='1' >
		<input class="supplier-image" type="file" name="image3" value="" id='3' >
		<img    id="cu3"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image3"style="font-size:30px;color:red;"></i><br>
		</div>
		 
		
	   <div class="col-lg-6">
	   <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">4-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage4" value="<?php echo $getOrderDetails[0]->image4; ?>" id='1' >
		<input class="supplier-image" type="file" name="image4" value=""  id='4' >
		<img  id="cu4" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image4" style="font-size:30px;color:red;"></i><br>
        </div>
        
        </div>
        
        <div class="row">
            
	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">5-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage5" value="<?php echo $getOrderDetails[0]->image5; ?>" id='1' >
		<input class="supplier-image" type="file" name="image5" value="" id='5' >
		<img    id="cu5"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image5"style="font-size:30px;color:red;"></i><br>
		</div>
		 
		
	   <div class="col-lg-6">
	   <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">6-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage6" value="<?php echo $getOrderDetails[0]->image6; ?>" id='1' >
		<input class="supplier-image" type="file" name="image6" value=""  id='6' >
		<img  id="cu6" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image6" style="font-size:30px;color:red;"></i><br>
        </div>
        
        </div>
        
        <div class="row">
            
	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">7-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage3" value="<?php echo $getOrderDetails[0]->image7; ?>" id='1' >
		<input class="supplier-image" type="file" name="image7" value="" id='7' >
		<img    id="cu7"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image7"style="font-size:30px;color:red;"></i><br>
		</div>
		 
		
	   <div class="col-lg-6">
	   <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">8-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage8" value="<?php echo $getOrderDetails[0]->image8; ?>" id='1' >
		<input class="supplier-image" type="file" name="image8" value=""  id='8' >
		<img  id="cu8" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image8" style="font-size:30px;color:red;"></i><br>
        </div>
        
        </div>
        
        <div class="row">
            
	   <div class="col-lg-6">
		 <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">9-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage3" value="<?php echo $getOrderDetails[0]->image9; ?>" id='1' >
		<input class="supplier-image" type="file" name="image9" value="" id='9' >
		<img    id="cu9"  width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image9"style="font-size:30px;color:red;"></i><br>
		</div>
		 
		
	   <div class="col-lg-6">
	   <?php echo form_open_multipart('welcome/do_upload');?>
		<label  for="state" class="control-label">10-Image</label>
		<input class="supplier-image" type="hidden" name="oldimage10" value="<?php echo $getOrderDetails[0]->image10; ?>" id='1' >
		<input class="supplier-image" type="file" name="image10" value=""  id='10' >
		<img  id="cu10" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image">  <i class="fa fa-trash" aria-hidden="true" id="image10" style="font-size:30px;color:red;"></i><br>
        </div>
        
		</div>
	  
	   <label for="state" class="control-label">Description</label>
      <div class="sg-select-container">
       <textarea  required type="text" name="description"  id="description" placeholder="description"  class="custom_input"><?php echo $getOrderDetails[0]->order_description;?></textarea>
      </div>

      <div class="sg-select-container" id="de" style="
    color: red;">
      </div>
    </div><!-- end col -->
	
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
	  <label for="state" class="control-label">Category</label>
      <div class="sg-select-container" id="cate" >
      </div> 
        </div>

        <!-- preview product will shows be add in this div -->
        <div class="previewBorder">
</div>
      
      
	  <div class="border">
	   <label for="state" class="control-label custom_label">Prefer Delivery date</label>
      <div class="sg-select-container custom_brand_name" id="date" >
      </div>
	  </div>
	  <div class="border">
	   <label for="state" class="control-label custom_label">Discription</label>
      <div class="sg-select-container custom_brand_name" id="dis" >
      </div>
	  </div>
	   <label for="state" class="control-label custom_label">image</label>
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
	   
        </div>
        <div class="modal-footer">
           <input type="submit" name="submit" value="confirm" class='btn btn-default custom_btn_color'>
           <input type="button" name="close" value="close" data-dismiss="modal" class='btn btn-default custom_btn_color'>

        </div>
      </div>
      
    </div>
  </div>
 
</div>
	
	
<input type="submit" name="submit" value="submit" style="display:none;">
    <button type="button" class="btn btn-info btn-lg abc" data-toggle="modal" data-target="#myModal" id="Preview">Preview</button>

    <a style="margin-top: 19px!important ;margin-left: 5px !important;" class="btn btn-primary btn-lg " href="<?php echo base_url('buyer/buyerOrderDashboard');?>" class="cancel">Cancel</a>
  </div><!-- row audit -->
</div>
</form>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
function getcategory(order_name,category,product_assign_category){
	// alert(order_name);
	// alert(category); 
	 //alert(product_assign_category);
	
	  order_namestr = order_name.replace(/[_]/g, " "); 
	  categorystr = category.replace(/[_]/g, " "); 
	  
	  //alert(categorystr);
	
	 $('input[type=text]#product').val(order_namestr);
	 
	 $('#Category :selected').text(categorystr);
	 $('#Category :selected').val(product_assign_category);
	 $('.rg').hide();
	  
	//$order_name = str_replace(' ','_',$categoryValue->order_name);
	//$('#product').val(order_name);

 }













$("#product").keyup(function(){  
      
	var Category1 = $("#product").val();	
	//alert(Category1);
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
				  $("#disProduct").html(data);
				
				  
               // alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;	
		
		
		
		
		
    });
	













$('#Preview').click(function(){
    $(".previewBorder").empty();
	$(".bn").text("");
	$('.pr').text("");
	$('.pn').text("");
	$('.qt').text("");
	$('#dt').text("");
	$('#de').text("");
	$('#ct').html("");	
	
	var Category =$("#Category").val();
	var prefer_delivery_date = $('#prefer_delivery_date').val();
	var description = $('#description').val();
    var Category1 = $("#Category option:selected").text();
    //var Category1 = $("#Category option:selected").val();
    var valid;
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

    for (var z = 1; z<51; z++){
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
    console.log(productCount);
    for(var i = 0; i<51;i++){
        if($(".product").eq(i).val()!=undefined){
            console.log($("#product_" + j).val());
            var newProductPreview = "<label for='state' class='control-label'>Product " + j + "</label><label for='state' class='control-label'>Product Name</label><div class='sg-select-container' id='pname_" + j + "' >" + "</div> <label for='state' class='control-label'>Brand Name</label><div class='sg-select-container' id='bname_" + j + "' >" + "</div><label for='state' class='control-label'>id/serial/model no.</label><div class='sg-select-container' id='partname_" + j + "' >"  + "</div> <label for='state' class='control-label'>Quantity</label><div class='sg-select-container' id='q_" + j + "' >" +  "</div> "; 
            var newPreview = $('<div class="border">'+newProductPreview+'</div>');
    //$(".row-outdoor-container").attach(newTxt);   
            $(".previewBorder").append($(newPreview));
            $('#pname_'+j).text($("#product_" + j).val());
            $('#bname_'+j).text($("#brand_name_"+j).val());
            $('#partname_'+j).text($("#partNumber_"+j).val());
            $('#q_'+j).text($("#quantity_" +j ).val());
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






$(document).ready(function(){

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
                
            }
        },
        messages: {
            "product": {
                required: "Please, enter a product name"
            },
			"partNumber": {
                required: "Please, enter a Part Number"
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
			var serializeForm= $(form).serializeArray() 
			console.log(serializeForm);
	var url ='<?php base_url('/buyer/updateOrder')?>';
	 /*  $.ajax({
           type: "POST",
           url: url,
           data: serializeForm, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         }); */

    e.preventDefault(); // avoid to execute the actual submit of the form. */
			
		   return false; // for demo
        }
    }); 
 


});


function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}


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
            $(".quantity_no").eq(i).val(obj.quantity_number);
            }else{$(".product").next().val(obj.order_name_1);}}
        
        }
          });

}	


// add product row
$(document).ready(function(){
    var n = 1+ $('.product').length;
    $(".addProduct").click(function(){
        var productRow = $('.add-row-outdoor').length;
        console.log(productRow);
        if (productRow < 49){
            var newTxtHtml = "<div class='col-lg-3'><label for='state' class='control-label custom_control_label'>Product " + n + "</label><div class='sg-select-container' id='productabc'><input required type='text' name='product_" + n + "[]' class='product custom_input'  placeholder='product' id='product_" + n + "'/><div class='sg-select-container pr' id='pr' style='color: red;'></div><div class='sg-select-container' id='disProduct" + n + "' ></div></div><?php
            $this->db->from('buyer_orders');
            $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
            $this->db->select('buyer_orders.order_name_2, category.name');
            $querys = $this->db->get()->result();
        ?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-lg-3'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name_" + n + "[]'  placeholder='Brand name' id='brand_name_" + n + "' class='custom_input brand_name'/><div class='sg-select-container bn' id='bn' style='color: red;' ></div></div> </div> <div class='col-lg-3'><label for='state' class='control-label custom_control_label'>id/serial/model no.</label><div class='sg-select-container'><input  required type='text' name='partNumber_" + n + "[]' id='partNumber_" + n + "' placeholder='id/serial/model no.' class='custom_input model_no'/><div class='sg-select-container pn' id='pn' style='color: red;' ></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity_" + n + "[]' id='quantity_" + n + "' placeholder='quantity' class='custom_input quantity_no'/><div class='sg-select-container qt' id='qt' style='color: red;'></div></div></div><div class='sg-select-container col-lg-12'><label for='state' class='control-label'>Master List</label><input  required type='checkbox' name='master_list_product_" + n + "' value='1'  /> <p><h4>save this product to your master list?</h4></p></div>"; 

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
	else {
		$el.hide();
	}
});
});
	
</script>
