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

    .checked {
    color:orange;
}
    button {
        display: block;
        margin-top: 20px;
    }
    #mapid { height: 500px; }

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
        padding: 5px;

    }

    textarea.note {
        resize: none;
        width: 100%;
    }

    select#master_list {
        width: 100% !important;
        line-height: 31px !important;
        padding-left: 10px !important;
        border: 1px solid white !important;
        border-radius: 3px !important;
        margin-bottom: 10px !important;
        padding: 11px !important;
        font-size: 20px !important;
    }

    div#xxx {
        font-size: 20px;
    }


</style>


<?php if ($this->session->flashdata('message')) {
?>
    <?php echo $this->session->flashdata('message') ?>
<?php
    } ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/mapdata.js"></script>	
<script type="text/javascript" src="<?= base_url();?>assets/js/australiamap.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/select.js"></script>

<!-- master list select -->

<div class="sg-select-container">
    <button type="button" class="btn btn-primary mb-2 addProduct">
        <i class="fa fa-plus-circle o-btn-add" aria-hidden="true"></i> Add Product</button>
    <button type="button" data-toggle="modal" data-target="#masterModal" data-intro="The quickest and most accurate way to make a new order by keeping your master list up to date" class="btn btn-primary mb-2">Select a product from master list:</button>
<?php if(!empty($supplier_list)){?>
                <button type="button" data-toggle="modal" id="select_prefeer" data-target="#preferredModal" class="btn btn-primary mb-2">Select Preferred Suppliers</button>
                <input class="d-none preferred-supplier" name="preferred_supplier"/> 
                <?php }?>
    <p class="productCount text-info"></p>
</div>




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
                <div class="table-responsive">
                <table id="masterTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                        <tr class="ref">
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Item Number</th>
                            <?php if(!empty($supplier_list)){?>
                            <th scope="col">Select Related Preferred supplier</th>
                            <?php }?>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
<?php
      if (!empty($master_list)) {
        foreach ($master_list as $master_listValue) {
?>
                                <tr class="ref text-black masterProduct">
<?php
          echo '<td>', $master_listValue->name, '</td>';
          echo '<td>', $this->encryption->decrypt($master_listValue->order_name), '</td>';
          echo '<td>', $this->encryption->decrypt($master_listValue->brand_name), '</td>';
          echo '<td>', $this->encryption->decrypt($master_listValue->part_number), '</td>';
          if(!empty($supplier_list)){ ?>
          
          <td><button type="button" data-toggle="modal" id="select_prefeer" data-target="#preferredModal" class="btn btn-success mb-2">Select Preferred Suppliers</button></td>
          <?php }?>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="master_<?php echo $master_listValue->master_id; ?>" onclick="masterListSelect(<?php echo $master_listValue->master_id; ?>)">Add to order</button>
                                    </td>
                                    
<?php }
      } ?>
                                </tr>
                    </tbody>
                </table>
    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="preferredModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Select your preferred suppliers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <div class="table-responsive">
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
</div>

<div class="modal fade" id="regionModal" tabindex="-1" role="dialog" aria-labelledby="regionModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regionModalLabel">Select your supply region</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 100%;">
<!-- CSSMap - Australia -->

<!-- END OF THE CSSMap - Australia -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="">
<form action="" method="post" enctype="multipart/form-data" novalidate>

    <div class="row-outdoor-container width-100">
        <div class=" row width-100 padding-left-15">
            <div class="form-group custom_boxshadow col-md-12" style="margin:auto;">
                <label for="state" class="control-label custom_control_label">Category:</label>
                <div class="sg-select-container" data-intro="Select the category that you matches your request. You can order up to 10 products under 1 category. Can't find a logical category? Click here to tell us what's missing. Help us help you.">
                    <select name="category[]" required id="Category">
                        <option value="">Select Category</option>
<?php
      if (!empty($category)) {
        foreach ($category as $categoryValue) {
?>
                                <option <?php echo set_select('category', $categoryValue->id); ?> value="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
                                </option>
<?php
        }
      }
?>
                    </select>
                    <div class="sg-select-container" id="ct" style="color: red;"></div>
                </div>
                <!-- beign of a product row -->
                <div class="row productrow border-bottom border-info">
                    <div class="col-lg-3">
                        <label for="state" class="control-label custom_control_label">Product 1</label>
                        <div class="sg-select-container" id="productabc">
                            <input required type="text" name="product_1[]" class="product custom_input" placeholder="product" id="product_1" />
                            <div class="sg-select-container pr" id="pr" style="color: red;"></div>
                            <div class="sg-select-container searchResult"></div>
                        </div>
                <?php
                        $this->db->from('buyer_orders');
                        $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
                        $this->db->select('buyer_orders.order_name_1, category.name');
                        $querys = $this->db->get()->result();
                ?>

                    </div>


                    <div class="col-lg-3">

                        <label for="state" class="control-label">Brand Name</label>
                        <div class="sg-select-container">
                        
                            <input required type="text" name="brand_name_1[]" placeholder="Brand name" id="brand_name_1" class="custom_input brand_name" />
                            <div class="sg-select-container bn" id="bn" style="color: red;"></div>
                            <input type="checkbox"  name="other_brand[]" value="1" > Accept other brands
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="state" class="control-label custom_control_label">id/serial/model no.</label>
                        <div class="sg-select-container">
                            <input required type="text" name="partNumber_1[]" id="partNumber_1" placeholder="id/serial/model no." class="custom_input model_no" />
                            <div class="sg-select-container pn" id="pn" style="color: red;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for="state" class="control-label">Quantity</label>
                        <div class="sg-select-container">
                            <input required type="number" name="quantity_1[]" id="quantity_1" placeholder="quantity" class="custom_input quantity_no" />
                            <div class="sg-select-container qt" id="qt" style="color: red;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for="state" class="control-label">Measurement/Volume</label>
                        <div class="sg-select-container">
                            <input required type="text" name="volume_1[]" id="volume_1" placeholder="Measurement/Volume" class="custom_input volume_no" />
                            <div class="sg-select-container vl" id="vl" style="color: red;"></div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <label for="state" class="control-label">Product Note</label>
                        <div class="sg-select-container">
                            <textarea required type="text" name="note_1[]" id="note_1" placeholder="describe more about the product? e.g. options, color... Any constructive information that will be help to define the products you are looking for" class="custom_input note"></textarea>
                            <div class="sg-select-container nt" id="nt" style="color: red;"></div>
                        </div>
                    </div>

                        <div class="col-lg-3">
                            <label for="state" class="control-label">Image</label>
                            <?php echo form_open_multipart('upload/do_upload');?>
                            <input data-intro="We all know the saying:' A picture is worthing a thousand words.' 2 pictures allowed. You can upload the photo you take or screenshot from your mobile or computer " class="supplier-image" type="file" name="image1" value="" id='1'>
                            <img id="cu1" width="100" height="80" src="<?= base_url(); ?>assets/images/camera.png">
                            <i class="fas fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;"></i>
                            <br>
                        </div>
                      
                        <div class="col-lg-3">
                            <label for="state" class="control-label">Image</label>
                            <input data-intro="<a target='_blank' href='www.google.com'>Click here to see how to upload the photos from your phone</a>" class="supplier-image" type="file" name="image2" value="" id='2'>
                            <img id="cu2" width="100" height="80" src="<?= base_url(); ?>assets/images/camera.png">
                            <i class="fas fa-trash" aria-hidden="true" id="image2" style="font-size:30px;color:red;"></i>
                            <br>
                        </div>

                        
                    <div class="sg-select-container col-lg-12">
                        <button type="button" onclick="checkMaster(this)" data-intro="click the button below to save a new product into the master list for next time, save time and make your master list more smarter" class="mb-2 btn btn-primary master-save">Send to Masterlist</button>
                    </div>

                </div>



                <!-- end of product rows -->
                

                <label for="state" class="control-label">Delivery Options</label>
                <div class="sg-select-container" data-intro="Buyer select the most properly delivery system, but be aware your supplier might offer some alternative time." style="margin-bottom:25px;">
                    <select name="delivery_method" >
                        <option value="collect">Click and collect</option>
                        <option value="buyer">Buyer arranges delivery</option>
                        <option value="supplier">Supplier arranges delivery</option>
                    </select>
                </div>
                <label for="state" class="control-label">Preferred delivery date</label>
                <div class="sg-select-container">
                    <input min="<?php echo date("Y-m-d"); ?>" required type="date" id="prefer_delivery_date" name="prefer_delivery_date[]"
                    class="date1 custom_input" placeholder="prefer_delivery_date" />
                    <br>

                    <div style="color: red; font-size:24px;" data-intro="Urgent delivery are only for urgent matters, e.g machinery breakdown" >
                        <input type="checkbox"  name="urgent[]" value="1" /> urgent order ASAP(*conditions apply)
                    </div>
                    
                    <div class="sg-select-container" id="dt" style="color: red;">
                    </div>
                </div>
            <div id="map-app">
                <label for="region" class="control-label">Supply Region</label>
                <select name="delivery_method" v-model="selected" id="region-select">
                        <option v-for="option in options" :value="option.id" :key="option.value">{{option.value}}</option>
                </select>
                <div v-if="selected === 1">
                    
                    <div class="" id="distance-select" style="display:inline-flex">
                    <button name="data" type="button" onclick="changeRadius(10)">10km</button>
                    <button name="data" type="button" onclick="changeRadius(25)">25km</button>
                    <button name="data" type="button" onclick="changeRadius(50)">50km</button>
                    <button name="data" type="button" onclick="changeRadius(100)">100km</button>
                    </div>
                    <div id="mapid"></div>
                </div>
                    <div v-if="selected === 2">
                        <iframe id="region-map" src="http://3.106.136.97/map.html" width="800" height="500" frameborder="0"></iframe>
                    </div>
                    <div v-if="selected === 3" id="map-australia" >
                        <map-component ></map-component> 
                    </div>

                <input class="d-none preferred-region" name="preferred_region"/> 
            </div>
                <label for="state" class="control-label">Information for suppliers</label>
                <div class="sg-select-container">
                    <textarea required type="text" name="description[]" id="description" placeholder="Information for suppliers" class="custom_input" /></textarea>
                </div>
                <div class="sg-select-container" id="de" style="color: red;">
                </div>

                <!-- end col -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Preview</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="border-bottom">
                                    <label for="state" class="control-label">Category</label>
                                    <div class="sg-select-container" id="cate">
                                    </div>
                                </div>
                                <!-- preview product will be add in this div -->
                                <div class="previewBorder">
                                </div>
                                <div class="border-bottom">
                                    <label for="state" class="control-label">Preferred date of supply</label>
                                    <div class="sg-select-container" id="date">
                                    </div>
                                </div>
                                <div class="border-bottom">
                                    <label for="state" class="control-label">Information for suppliers</label>
                                    <div class="sg-select-container" id="dis">
                                    </div>
                                </div>
                                <!-- <label for="state" class="control-label">Image</label> -->
                                <div class="sg-select-container" id="">
                                    <img id="pop1" class="imagen d-none" src=""  height="100" width="100" />
                                    <img id="pop2" class="imagen d-none" src=""  height="100" width="100" />
                                    <img id="pop3" class="imagen d-none" src=""  height="100" width="100" />
                                    <img id="pop4" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                    <img id="pop5" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                </div>
                                <div class="sg-select-container" id="">
                                    <img id="pop6" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                    <img id="pop7" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                    <img id="pop8" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                    <img id="pop9" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                    <img id="pop10" class="imagen d-none" src="" alt="your image" height="100" width="100" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn_custom_btn" name="Save_As_Draft" value="Save As Draft">
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
                <button type="button" class="btn btn-primary btn-lg abc" data-toggle="modal" data-target="#myModal" id="Preview">Preview</button>

                <a style="margin-top: 17px;" class="btn btn-primary btn-lg" href="<?php echo base_url('buyer/buyerOrderDashboard'); ?>" class="cancel">Cancel</a>
               


            </div>

        </div>

    </div>
    </div>

</form>
</div>
<div style="clear:both"></div>
</div>


                        <script>
                        // add product row
                        var n = 2;
                        let imageNo = 3;
                        $(".addProduct").click(function() {

                          var productRow = $('.add-row-outdoor').length;

                          if (productRow < 9) {
                            $('.productCount').text("you can add " + (10 - n) + " more products");
                            var newTxtHtml = "<div class='col-lg-3'><label for='state' class='control-label custom_control_label'>Product " + n + "</label><div class='sg-select-container' id='productabc'><input required type='text' name='product_" + n + "[]' class='product custom_input'  placeholder='product' id='product_" + n + "'/><div class='sg-select-container pr' id='pr' style='color: red;'></div><div class='sg-select-container searchResult'  ></div></div><?php
                        $this->db->from('buyer_orders');
                        $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
                        $this->db->select('buyer_orders.order_name_2, category.name');
                        $querys = $this->db->get()->result();
?><div class='sg-select-container' id='ct' style='color: red;'></div></div><div class='col-lg-3'><label for='state' class='control-label'>Brand Names</label><div class='sg-select-container'><input required type='text' name='brand_name_" + n + "[]'  placeholder='Brand name' id='brand_name_" + n + "' class='custom_input brand_name'/><div class='sg-select-container bn' id='bn' style='color: red;' ></div> <input type='checkbox'  name='other_brand[]' value='"+n+"' > Accept other brands</div></div> <div class='col-lg-3'><label for='state' class='control-label custom_control_label'>id/serial/model no.</label><div class='sg-select-container'><input  required type='text' name='partNumber_" + n + "[]' id='partNumber_" + n + "' placeholder='id/serial/model no.' class='custom_input model_no'/><div class='sg-select-container pn' id='pn' style='color: red;' ></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Quantity</label><div class='sg-select-container'><input required type='number' name='quantity_" + n + "[]' id='quantity_" + n + "' placeholder='quantity' class='custom_input quantity_no'/><div class='sg-select-container qt' id='qt' style='color: red;'></div></div></div> <div class='col-lg-3'><label for='state' class='control-label'>Measurement/Volume</label><div class='sg-select-container'><input required type='text' name='volume_"+n+"[]' id='volume_"+n+"' placeholder='Measurement/Volume' class='custom_input volume_no' /> <div class='sg-select-container vl' id='vl' style='color: red;'></div></div></div><div class='col-lg-8'><label for='state' class='control-label'>Product Note</label> <div class='sg-select-container'><textarea required type='text' name='note_" + n + "[]' id='note_" + n + "' placeholder='note' class='custom_input note'></textarea><div class='sg-select-container nt' id='nt' style='color: red;'></div></div> </div><div class='col-lg-3'><label for='state' class='control-label'>Image</label><input class='supplier-image' type='file' name='image"+imageNo+"' value='' id='"+imageNo+"'><img id='cu"+imageNo+"' width='100' height='80' src='<?= base_url(); ?>assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image"+imageNo+"' style='font-size:30px;color:red;'></i><br></div> <div class='col-lg-3'> <label for='state' class='control-label'>Image</label>  <input  class='supplier-image' type='file' name='image"+(imageNo+1)+"' value='' id='"+(imageNo+1)+"'> <img id='cu"+(imageNo+1)+"' width='100' height='80' src='<?= base_url(); ?>assets/images/camera.png'><i class='fas fa-trash' aria-hidden='true' id='image"+(imageNo+1)+"' style='font-size:30px;color:red;'></i> <br></div><div class='sg-select-container col-lg-12'><button type='button' onclick='checkMaster(this)' class='mb-2 btn btn-primary master-save'>Save this product to the master list</button></div>";

var newTxt = $('<div class="add-row-outdoor border-top row width-100" style="padding-left:15px;"> ' + newTxtHtml + '<!-- end col --> <div class="choose-outdoor-is-hidden form-group col-md-4" style="display: none;"> <label for="other-textfield" class="control-label">Other</label> <input type="text" class="form-control form-input-field" name="other-textfield" value="" required="" placeholder=""> <span class="help-block"></span> </div> <div class="col-md-2 remove-btn-audit form-space-top-35"> <button class="btn btn-primary removeOutdoor"><i class="fa fa-minus-circle o-btn-add" aria-hidden="true"></i>Remove product</button> </div> </div><!-- row audit -->');
//$(".row-outdoor-container").attach(newTxt);
$(".productrow").append($(newTxt));
n++;
imageNo +=2;
                          } else {
                            $('#productModal').modal('show');
                            $('.productCount').text("you've reached the product limit for an order");
                          }
                        });

// CSSMap;

function selectAu(type){
    var nodes = document.getElementsByClassName("map-au");
    var arr = Array.prototype.slice.call(nodes);
    if(type == 1){
    arr.forEach( function(node) {
      node.classList.add ("active-region");
    });}else{
        arr.forEach( function(node) {
      node.classList.remove ("active-region");
    }); 
    }
}
function changeRadius(km) {
      circle.setRadius(km*1000);
    }

const { createApp } = Vue;

const app = new  Vue( {
  data(){
    return{
    options:[{id:1, value:"Local Supply"},{id:2, value:"Regional Supply"},{id:3, value:"State to Australia wide"} ],
    selected:1,
    }
  },
});


Vue.component('map-component', {
	template: '<div><div id="map"></div></div>',
	mounted: function(){
        simplemaps_australiamap.load();
	},
	computed: {
		simplemaps_australiamap: function () {return window.simplemaps_australiamap;}
	},
	methods: {
		
	}
})



app.$mount("#map-app");

var mymap = L.map('mapid').setView([-27.4319, 153.058], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2VhbWFzIiwiYSI6ImNrbHNyZm5raTAxbTUycHF4bmViYXBvZG0ifQ.I1iXMbLLB3dCped4zA0-yg', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 11,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);
var circle = L.circle([-27.4319,  153.058], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 10000
}).addTo(mymap);


</script>

<script type="text/javascript" src="../assets/js/order.js"/>

