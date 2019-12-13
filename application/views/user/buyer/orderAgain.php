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
<?php  if ($this->session->flashdata('message')) {
?>
          <?php echo $this->session->flashdata('message')?>
<?php
} ?>

<div class="row-outdoor-container">
    <button class="btn btn-info btn-add-waste addProduct">
        <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i> Add Product</button>
    <p class="productCount text-info"></p>
</div>
<!--Master list modal start-->
<div class="modal fade" id="masterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select product from your master list</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row-outdoor-container">
                <button class="btn btn-info btn-add-waste addProduct">
                    <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i> Add Product</button>
                <p class="productCount text-info"></p>
            </div>
            <table id="masterTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>

                    <tr class="ref">
                        <th scope="col">Category Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Item Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
<?php
if (!empty($master_list)) {
foreach ($master_list as $master_listValue) {
?>
                            <tr class="ref text-black masterProduct">

                                <!--  -->
<?php
  echo '<td>', $master_listValue->name, '</td>';
  echo '<td>', $this->encryption->decrypt($master_listValue->order_name), '</td>';
  echo '<td>', $this->encryption->decrypt($master_listValue->brand_name), '</td>';
  echo '<td>', $this->encryption->decrypt($master_listValue->part_number), '</td>'; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" id="master_<?php echo $master_listValue->master_id; ?>" onclick="masterListSelect(<?php echo $master_listValue->master_id; ?>)">Add to order</button>
                                </td>

<?php
}
}
?>
                            </tr>
                </tbody>
            </table>

        </div>

    </div>
  </div>
</div>
<!--End of master list modal-->

<div class="sg-select-container">
    <button type="button" data-toggle="modal" data-target="#masterModal" class="btn btn-success mb-2">Select a product from master list:</button>
</div>

<form  action=""  method="post"  enctype="multipart/form-data" novalidate>
  <div class="row-outdoor-container width-100">
    <div class=" row width-100 padding-left-15">
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
    if ($orderList[0]->product_assign_category ==$categoryValue->id) {
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
                        <input required type="text" name="product_1[]" class="product custom_input" value="<?php echo $orderList[0]->order_name_1;?>"
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
                  <input required type="text" name="brand_name_1[]" value="<?php echo $orderList[0]->brand_name_1;?>"
        placeholder="Brand name" id="brand_name_1" class="custom_input brand_name"/>
                <div class="sg-select-container bn" id="bn" style="color: red;" ></div></div>
          </div>

          <div class="col-lg-3">
              <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
              <div class="sg-select-container">
                  <input  required type="text" name="partNumber_1[]" id="partNumber_1" value="<?php echo $orderList[0]->part_number_1;?>"
       placeholder="id/serial/model no." class="custom_input model_no"/>
                <div class="sg-select-container pn" id="pn" style="color: red;" ></div>
              </div>
          </div>
          <div class="col-lg-3">
              <label for="state" class="control-label">Quantity</label>
              <div class="sg-select-container">
                  <input required type="number" name="quantity_1[]" id="quantity_1" value="<?php echo $orderList[0]->quantity_1;?>"
       placeholder="quantity" class="custom_input quantity_no"/>
                <div class="sg-select-container qt" id="qt" style="color: red;"></div>
          </div>
      </div>

      <div class="col-lg-6">
        <label for="state" class="control-label">Note</label>
        <div class="sg-select-container">
          <textarea required type="text" name="note_1[]" id="note_1" placeholder="note"
          class="custom_input note"><?php echo $orderList[0]->note_1;?></textarea>
          <div class="sg-select-container nt" id="nt" style="color: red;"></div>
        </div>
      </div>

      <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
        <button type="button" onclick="checkMaster(this)" class="mb-2 btn btn-primary master-save">Save this product to the master list</button>
      </div>


<?php
$productCount = 0;
$j = 2;
for ($v = 1; $v<11;$v++) {
  $check_var = $orderList[0]->{'order_name_'.$v};
  if (!is_null($check_var)) {
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
        echo"[]"; ?>"  value="<?php echo $orderList[0]->{'order_name_'.$j}; ?>" placeholder="product"  id="product_<?php echo $j; ?>" class="custom_input product" />
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
        echo"[]"; ?>"  placeholder="Brand name" value="<?php echo $orderList[0]->{'brand_name_'.$j}; ?>"   id="brand_name_<?php echo $j; ?>" class="custom_input brand_name">
        <div class="sg-select-container bn" id="bn" style="color: red;" ></div>
      </div>
    </div>

    <div class="col-lg-3">
      <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
      <div class="sg-select-container">
        <input  required type="text" name="partNumber_<?php echo $j;
        echo"[]"; ?>"  value="<?php echo $orderList[0]->{'part_number_'.$j}; ?>" id="partNumber_<?php echo $j; ?>" placeholder="partNumber" class="custom_input model_no"/>
        <div class="sg-select-container pn" id="pn" style="color: red;" ></div>
      </div>
  </div>

    <div class="col-lg-3">
      <label for="state" class="control-label custom_control_label">Quantity</label>
      <div class="sg-select-container">
        <input required type="number" name="quantity_<?php echo $j;
        echo"[]"; ?>" value="<?php echo $orderList[0]->{'quantity_'.$j}; ?>" id="quantity_<?php echo $j; ?>" placeholder="quantity"  class="custom_input quantity_no"/>
        <div class="sg-select-container qt" id="qt" style="color: red;" ></div>
      </div>
    </div>

    <div class="col-lg-6">
      <label for="state" class="control-label">Note</label>
      <div class="sg-select-container">
        <textarea required type="text" name="note_<?php echo $j;
        echo"[]"; ?>]" id="note_<?php echo $j;
        echo"[]"; ?>" placeholder="note"
        class="custom_input note"><?php echo $orderList[0]->{'note_'.$j};?></textarea>
        <div class="sg-select-container nt" id="nt" style="color: red;"></div>
      </div>
    </div>

    <div class="sg-select-container col-lg-12">
        <label for="state" class="control-label">Master List</label>
        <button type="button" onclick="checkMaster(this)" class="mb-2 btn btn-primary master-save">Save this product to the master list</button>
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
      <input min="<?php echo date("Y-m-d");?>"   required type="date" value="" id="prefer_delivery_date" name="prefer_delivery_date[]" class="date1 custom_input" placeholder="prefer_delivery_date"/>
      <div class="sg-select-container" id="dt" style="color: red;"></div>
    </div>

    <label for="state" class="control-label">Information for suppliers</label>
    <div class="sg-select-container">
      <textarea  required type="text" name="description[]" id="description" placeholder="Information for suppliers" class="custom_input"/>
      <?php echo $orderList[0]->order_description;?></textarea>
    </div>

      <div class="sg-select-container" id="de" style="color: red;"></div>
    <!--Upload image start--> 
    <div>
      <div class="row">
        <div class="col-lg-6">
          <?php echo form_open_multipart('welcome/do_upload');?>
          <label  for="state" class="control-label">1-Image</label>
          <input class="supplier-image" type="file" name="image1" value="" id='1' >
          <?php echo "<img   id='cu1' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image1' style='font-size:30px;color:red;' ></i><br>";?>
        </div>
       <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">2-Image</label>
        <input class="supplier-image" type="file" name="image2" value="" id='2' >
        <?php echo "<img   id='cu2' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image2' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">3-Image</label>
        <input class="supplier-image" type="file" name="image3" value="" id='3' >
    <?php
    echo "<img   id='cu3' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image3' style='font-size:30px;color:red;' ></i><br>";
    ?>
      </div>
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">4-Image</label>
        <input class="supplier-image" type="file" name="image4" value="" id='4' >
        <?php echo "<img   id='cu4' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image4' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">5-Image</label>
        <input class="supplier-image" type="file" name="image5" value="" id='5' >
  <?php
  echo "<img   id='cu5' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image5' style='font-size:30px;color:red;' ></i><br>";
  ?>
      </div>
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">6-Image</label>
        <input class="supplier-image" type="file" name="image6" value="" id='6' >
        <?php echo "<img   id='cu6' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image6' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">7-Image</label>
        <input class="supplier-image" type="file" name="image7" value="" id='7' >
  <?php echo "<img   id='cu7' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image7' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">8-Image</label>
        <input class="supplier-image" type="file" name="image8" value="" id='8' >
  <?php echo "<img   id='cu8' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image8' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">9-Image</label>
        <input class="supplier-image" type="file" name="image9" value="" id='9' >
<?php echo "<img   id='cu9' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image9' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
      <div class="col-lg-6">
        <?php echo form_open_multipart('welcome/do_upload');?>
        <label  for="state" class="control-label">10-Image</label>
        <input class="supplier-image" type="file" name="image10" value="" id='10' >
<?php echo "<img   id='cu10' width='100' height='80' src='";echo base_url();echo "assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image10' style='font-size:30px;color:red;' ></i><br>";?>
      </div>
    </div>
  </div>
<!--End of image upload-->
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
        <div class="sg-select-container" id="cate" ></div>
        </div>
        <!-- preview product will be add in this div -->
        <div class="previewBorder"></div>
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
        <!-- save as draft -->
       <input type="submit" class="btn_custom_btn"name="Save_As_Draft" value="Save As Draft">
       <!-- submit -->
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
        <h4 class="modal-title custom_title">Warning</h4>
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
</div>

<script>
// add product row
var n = $('.product').length + 1;
$(".addProduct").click(function(){
  var productRow = $('.add-row-outdoor').length;
  console.log(productRow);
  if (productRow < 9){
    $('.productCount').text("you can add " + (10 - n) + " more products");
    var newTxtHtml = "<div class='col-lg-3'><label for='state' class='control-label custom_control_label'>Product " + n + "</label><div class='sg-select-container' id='productabc'><input required type='text' name='product_" + n + "[]' class='product custom_input'  placeholder='product' id='product_" + n + "'/><div class='sg-select-container pr' id='pr' style='color: red;'></div><div class='sg-select-container' id='disProduct" + n + "' ></div></div><?php
$this->db->from('buyer_orders');
$this->db->join('category', 'category.id = buyer_orders.product_assign_category');
$this->db->select('buyer_orders.order_name_2, category.name');
$querys = $this->db->get()->result();
?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-lg-3'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name_" + n + "[]'  placeholder='Brand name' id='brand_name_" + n + "' class='custom_input brand_name'/><div class='sg-select-container bn' id='bn' style='color: red;' ></div></div> </div> <div class='col-lg-3'><label for='state' class='control-label custom_control_label'>id/serial/model no.</label><div class='sg-select-container'><input  required type='text' name='partNumber_" + n + "[]' id='partNumber_" + n + "' placeholder='id/serial/model no.' class='custom_input model_no'/><div class='sg-select-container pn' id='pn' style='color: red;' ></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity_" + n + "[]' id='quantity_" + n + "' placeholder='quantity' class='custom_input quantity_no'/><div class='sg-select-container qt' id='qt' style='color: red;'></div></div></div><div class='col-lg-6'><label for='state' class='control-label'>Note</label><div class='sg-select-container'><textarea required type='text' name='note_" + n + "[]' id='note_" + n + "' placeholder='note' class='custom_input note'></textarea><div class='sg-select-container nt' id='nt' style='color: red;'></div></div> </div><div class='sg-select-container col-lg-12'><label for='state' class='control-label'>Master List</label><button type='button' onclick='checkMaster(this)' class='mb-2 btn btn-primary master-save'>Save this product to the master list</button></div>";

var newTxt = $('<div class="add-row-outdoor row width-100" style="padding-left:15px;"> '+newTxtHtml+'<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-add-waste removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove</button> </div> </div><!-- row audit -->');
//$(".row-outdoor-container").attach(newTxt);
$(".productrow").append($(newTxt));
n++;
  }else {
    $('#productModal').modal('show');
    $('.productCount').text("you've reached the product limit for an order");
  }
});
</script>

<script type='text/javascript' src='/Hawkiweb/assets/js/order.js'/>
