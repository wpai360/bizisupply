&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:red;" class="custom_back_btn"href="<?php echo base_url('buyer/buyerOrderDashboard');?>">Back</a>
<?php  if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
}

?> 
<style>
.product-detail{
    border-bottom:1px double ;
background-color:white;
margin:5px;
}
.content-header {
    margin-bottom: 27px!important;
}
.user-rating {
    direction: rtl;
    font-size: 20px;
    unicode-bidi: bidi-override;
    padding: 10px 30px;
    display: inline-block;
}
.user-rating input {
    opacity: 0;
    position: relative;
    left: -15px;
    z-index: 2;
    cursor: pointer;
}
.user-rating span.star:before {
    color: #777777;
    content:"ï€†";
    /*padding-right: 5px;*/
}
.user-rating span.star {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    position: relative;
    z-index: 1;
}
.user-rating span {
    margin-left: -15px;
}
.user-rating span.star:before {
    color: #777777;
    content:"\f006";
    /*padding-right: 5px;*/
}
.user-rating input:hover + span.star:before, .user-rating input:hover + span.star ~ span.star:before, .user-rating input:checked + span.star:before, .user-rating input:checked + span.star ~ span.star:before {
    color: #ffd100;
    content:"\f005";
}

.selected-rating{
    color: #ffd100;
    font-weight: bold;
    font-size: 3em;
}
.orderLabel
{
color: #00b7e3;
font-weight: normal!important;
}
.labelTitle
{ width: 30%!important}
.orderAlign
{margin: 0px 0px 14px 0px;}
.ProductImg{    float: left;
    margin: 0px 20px 26px 0px;}
	a.custom_back_btn {
    background: #00b7e3;
    padding: 14px 38px;
    border-radius: 5px;
    color: white!important;
    font-size: 17px;
    font-weight: 700;
}

.modal {
overflow:auto !important;
}

.modal-lg {
    max-width: 80% !important;
}

.close {
text-decoration:none;
float:right;
font-size:24px;
font-weight:bold;
color:white
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
<?php //echo "<pre>"; print_r($viewOrder); die;?>






<div class="custom_container custm_label">

 <?php if (!empty($viewOrder)) {
    ?>
 <?php //echo "<pre>"; print_r($viewOrder); die;?>
<!--<label>Order Id</label> <p><?php //if(!empty($viewOrder[0]->order_id)){ echo $viewOrder[0]->order_id; } else { echo 'N/A';}?></p><br>-->
<div class="row">
    <div class="col-lg-12">
        <div class="orderAlign">
        <label class="labelTitle">Order Id :  <label class="orderLabel"><?php if (!empty($viewOrder[0]->order_random_id)) {
        echo $viewOrder[0]->order_random_id;
    } else {
        echo 'N/A';
    } ?></label> </label>
        </div>
    </div>

    <?php
   $productnumber = 0;
    for ($j=1; $j<11; $j++) {
        if ($viewOrder[0]->{'order_name_'.$j}!='') {
            $productnumber++;
        }
    } ?>

    <?php for ($i = 1; $i <=$productnumber; $i++) {
        ?>
    <div class="col-lg-12 product-detail">
    <label for="state" class="control-label">Product <?php echo $i; ?></label>
    <div class="row">
        <div class="col-lg-3">

        <label class="" >Name : <label id="product<?php echo $i; ?>_name"><?php if (!empty($viewOrder[0]->{'order_name_'.$i})) {
            echo $viewOrder[0]->{'order_name_'.$i};
        } else {
            echo 'N/A';
        } ?></label></label>
        </div>
        <div class="col-lg-3">
        <label class="" id='<?php echo'quantity_';
        echo $i; ?>' > <?php if (!empty($viewOrder[0]->{'quantity_'.$i})) {
            ?>  <?php
            $qtyStatus = 0;
            foreach ($viewOrder as $element) {
                if ($element->{'product'.$i.'_status'}==='2' || $element->{'product'.$i.'_status'}==='5') {
                    echo 'Discount Quantity: <label id="product';
                    echo $i;
                    echo '_qty">';
                    echo $element->{'product'.$i.'_quantity_no'};

                    $qtyStatus++;
                } elseif ($element->{'product'.$i.'_status'}==='1') {
                    echo 'Quantity: <label id="product';
                    echo $i;
                    echo '_qty">';
                    echo $element->{'quantity_'.$i};
                    $qtyStatus++;
                }
            }
            // show
            if ($qtyStatus == 0) {
                echo 'Quantity: <label id="product';
                echo $i;
                echo '_qty">';
                echo $viewOrder[0]->{'quantity_'.$i};
            }
        } else {
            echo 'N/A';
        }; ?></label></label>
        </div>
        <div class="col-lg-3">
        <label class=""> Brand Name : <label id="product<?php echo $i; ?>_brand"><?php if (!empty($viewOrder[0]->{'brand_name_'.$i})) {
            echo $viewOrder[0]->{'brand_name_'.$i};
        } else {
            echo 'N/A';
        }; ?></label></label>
        </div>
        <div class="col-lg-3">
        <label class="" > Part Number :<label id="product<?php echo $i; ?>_part"><?php if (!empty($viewOrder[0]->{'part_number_'.$i})) {
            echo $viewOrder[0]->{'part_number_'.$i};
        } else {
            echo 'N/A';
        }; ?></label></div>

        <div class="col-lg-12">
<label for="note">Note for supplier: <?php echo (!empty($viewOrder[0]->{'note_'.$i}))?$viewOrder[0]->{'note_'.$i}:'None'; ?></label>

        </div>

        <div class="col-lg-12">

        


<?php $productStatus = 0;
        for ($j=0;$j<count($viewOrder);$j++) {
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber

            if ($viewOrder[$j]->{'product'.$i.'_status'} === '1' or $viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                echo "<label class='pro_status' > Product Price:";
                echo "<label id='price_";
                echo $i ;
                echo "'style=''>$";
                echo $viewOrder[$j]->{'product'.$i.'_quote'} ;
                echo "/product, $";
                echo $viewOrder[$j]->{'product'.$i.'_quote'} * $viewOrder[$j]->{'quantity_'.$i} ;
                echo " in total</label>";
                $productStatus ++;
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '4') {
                echo "<label class='pro_status' > Product Price:";
                echo "<label id='price_";
                echo $i ;
                echo "'style='color:#e74c3c;'>N/A</label>";
                $productStatus++;
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5' or $viewOrder[$j]->{'product'.$i.'_status'} === '2') {
                echo "<label class='pro_status' > Product QTY Price:";
                echo "<label id='price_";
                echo $i ;
                echo "'style=''>$";
                echo $viewOrder[$j]->{'product'.$i.'_quantity_price'} ;
                echo "/product, $";
                echo $viewOrder[$j]->{'product'.$i.'_quantity_price'} * $viewOrder[$j]->{'product'.$i.'_quantity_no'} ;
                echo " in total</label>";
                $productStatus++;
            }
        }
 
        if ($productStatus == 0) {
            echo "<label id='price_";
            echo $i ;
            echo "'style='color:#f1c40f;'></label>";
        } ?>
</label></div>
        <div class="col-lg-12">

        
        <label class="pro_status" > <img style="width:60px;
    height: 50px;" src=" <?php echo base_url("assets/images/smallhawk.png"); ?>">Product Status:
        <?php
        
        $quoteRecevied = 0;
        foreach ($viewOrder as $value) {
            if(($value->form_status) == 1){
            if ($value->{'product'.$i.'_quote'}!='') {
                $quoteRecevied++;
            }}
        };
        
        $productStatus = 0;
        for ($j=0;$j<count($viewOrder);$j++) {
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber

            if ($viewOrder[$j]->{'product'.$i.'_status'} === '1' or $viewOrder[$j]->{'product'.$i.'_status'} === '2') {
                echo "<label id='pros_";
                echo $i ;
                echo "'style='color:#e74c3c;'>wait supplier response, offer no:</label><label id='offer_no_";
                echo"$i";
                echo "'>";
                echo $viewOrder[$j]->random_offer_id;
                echo "</label>";
                $productStatus ++;
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                echo "<label id='pros_";
                echo $i ;
                echo "'style='color:#2ecc71;'>supplier agree to keep supply, offer no:</label><label id='offer_no_";
                echo"$i";
                echo "'>";
                echo $viewOrder[$j]->random_offer_id;
                echo "</label>";
                $productStatus++;
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '4') {
                echo "<label id='pros_";
                echo $i ;
                echo "'style='color:#e74c3c;'>supplier reject to keep supply, please select a new supplier </label>";
                $productStatus++;
                echo ' <button onclick="viewQuote(';
                echo $i;
                echo ')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#productQuote">Compare quotes for this product (';
                echo $quoteRecevied;
                echo ' quotes recevied)</button>';
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5') {
                echo "<label id='pros_";
                echo $i ;
                echo "'style='color:#2ecc71;'>supplier agree to keep supply with new quantity, offer no:</label><label id='offer_no_";
                echo"$i";
                echo "'>";
                echo $viewOrder[$j]->random_offer_id;
                echo "</label>";
                $productStatus++;
            }
        }
 
       

        if ($productStatus == 0) {
            echo "<label id='pros_";
            echo $i ;
            echo "'style='color:#f1c40f;'>Not select any quote yet</label><br>";
            echo ' <button onclick="viewQuote(';
            echo $i;
            echo ')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#productQuote">Compare quotes for this product (';
            echo $quoteRecevied;
            echo ' quotes recevied)</button>';
        } ?>
        </label></div> 

<div class="col-lg-12">

<?php $productStatus = 0;
        for ($j=0;$j<count($viewOrder);$j++) {
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber
            $OfferId = $viewOrder[$j]->offer_id;

            if ($viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                echo '<a href="/HawkiWeb/buyer/processOrder/'.$OfferId.'" class="btn btn-success btn-lg mb-3" >Check More</a>';
            } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5') {
                echo '<a href="/HawkiWeb/buyer/processOrder/'.$OfferId.'" class="btn btn-success btn-lg mb-3" >Check More</a>';
            }
        } ?>
 




</div>
    </div>
    </div>

    <?php
    } ?>

    
 </div>
<div class="row">
<div class="col-lg-12">
<div class="orderAlign">
        <label class="labelTitle">Prefer Delivery Date :  <label id="prefer_date"><?php if (!empty($viewOrder[0]->prefer_delivery_data)) {
        echo $viewOrder[0]->prefer_delivery_data;
    } else {
        echo 'N/A';
    } ?></label></label>
        </div>
<div class="orderAlign custom_img_class"><label class="labelTitle">Uploaded Image:</label></div>
<div class="orderAlign">


<?php

if ($viewOrder[0]->image1) {
        ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image1); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
    } ?>



<?php

if ($viewOrder[0]->image2) {
    ?>

<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image2); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>




<?php

if ($viewOrder[0]->image3) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image3); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>




<?php

if ($viewOrder[0]->image4) {
    ?>
	
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image4); ?>" width="200" height="100" ></img>
<?php
} ?>

<?php

if ($viewOrder[0]->image5) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image5); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<?php

if ($viewOrder[0]->image6) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image6); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<?php

if ($viewOrder[0]->image7) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)"  id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image7); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<?php

if ($viewOrder[0]->image8) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image8); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<?php

if ($viewOrder[0]->image9) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image9); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<?php

if ($viewOrder[0]->image10) {
    ?>
<img class="ProductImg" onclick="zoomImage(this)" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image10); ?>" width="200" height="100" ></img><div style="clear:both;"></div>&nbsp;
<?php
} ?>

<div style="clear:both;"></div>
<?php
} ?>

</div>
</div>
</div>
</div>




        <!-- <h1 class="o-order">Offer List</h1>

        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr class="ref">
            <th scope="col">Offer.no</th>
            <th scope="col">Supplier Name</th>
            <th scope="col">price($)</th>
            <th scope="col">Date for Delivery</th>

            <th scope="col">Payment Term</th>
            <th scope="col">Action</th>     
            </tr>
            </thead>
            <tbody>
        <?php


            if (!empty($offerList)) {
                for ($j=0;$j< count($offerList); $j++) {
                    $checkAction[] = $offerList[$j]->request_wait_response;
                }
            }
        // check if any offer has been selected
        
        $counts = array_count_values($checkAction);
        $count_checkAction =$counts["1"];
        /*

        $counts = array_count_values($checkAction);

        pr($checkAction); */
        


            if (!empty($offerList)) {
                for ($i=0;$i< count($offerList); $i++) {
                    ?>
                <tr>
                    <td style="text-align:center;"><?php if (!empty($offerList[$i]->random_offer_id)) {
                        echo   $offerList[$i]->random_offer_id;
                    } else {
                        echo 'N/A';
                    } ?>
                    </td>
                    <td style="text-align:center;"><?php if (!empty($offerList[$i]->name)) {
                        echo   $offerList[$i]->username;
                    } else {
                        echo 'N/A';
                    } ?>
                    </td>
                    <td  style="text-align:center;"><?php if (!empty($offerList[$i]->price_offer)) {
                        echo '$'.$offerList[$i]->price_offer;
                    } else {
                        echo 'N/A';
                    } ?>  </td>

                    <td  style="text-align:center;"><?php if (!empty($offerList[$i]->prefer_delivery_data)) {
                        echo $offerList[$i]->prefer_delivery_data;
                    } else {
                        echo 'N/A';
                    } ?>  </td>
                   
                    <td  style="text-align:center;"><?php if (!empty($offerList[$i]->payment_terms)) {
                        echo $offerList[$i]->payment_terms;
                    } else {
                        echo 'N/A';
                    } ?>  </td>
                 
                    <td>
                    <?php
                    $thisOne =$offerList[$i]->offer_id;
                    
                    echo '<button onclick="viewOffer('.$offerList[$i]->marked_offer_id.')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">Check More</button>'; ?>
                    </td>
                </tr> 
                <?php
                }
            } ?>  
            </tbody>
        </table> -->




<!-- Button to trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Check offer</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				
				<div role="form">
				
				<div class="form-group">
                         <label for="inputName">Offer No: </label>
                      <label id="offer_number"></label>
                </div>

                <div class="form-group">
                         <label for="inputName">Supplier Name:</label>
                      <label id="supplier_name"></label>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div>-->
                <!-- offer list -->
                <table id="offerTable" class="table table-striped table-bordered no-footer">
                    <thead>
                    <tr class="ref">
                        <th >Product Number</th>
                        <th >Product Name</th>
                        <th >Brand Name</th>
                        <th >Quantity</th>
                        <th >Part Number</th>
                        <th >Supplier note</th>
                        <th >Supplier's Quote Price</th>
                        <th >Supplier's QTY Discount</th>
                        <th >Action</th>
                    </tr>
                    </thead>

                   <!-- <h3 style="color:#e74c3c" class="selected-notice"> you've already responsed this offer, please wait supplier to response</h3> -->
                    <tbody id="offer_detail" class="offer-table">
                  

                    </tbody>
                
                
                </table>
				
				<div class="form-group">
                        <label for="inputName">Total Price($)</label>
                        <p id="price"></p>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Date for delivery</label>
                        <p id="Date_for_delivery"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">delivery type</label>
						<p id="delivery_type"></p>-->
                </div>
				<div class="form-group">
                        <label for="inputName">Payment terms </label>
                      <p id="payment_terms">Pre-Pay</p>
                      <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="70" height="auto"/>
                      <img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png')?>" width="70" height="auto">
                      <img src="<?php echo base_url('images/ML008_PayID.png')?>" width="70" height="auto">
                      <img src="<?php echo base_url('images/transfer.png')?>" width="45" height="auto">
                </div>

				<div class="form-group">
                        <label for="inputName">Description</label>
                      <p id="description">Description text</p>
                </div>
				
				
            </div>
			
			
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            
                <button type="button" class="btn btn-primary submitBtn" id="accept_offer_btn" onclick="acceptOffer()">Accept Offer</button>
                <button  data-dismiss="modal" class="btn btn-success btn-lg" data-toggle="modal" data-target="#productQuote">Back</button>
            </div>
        </div>
    </div>
</div>



<!-- product quote  -->
<!-- Modal -->
<div class="modal fade" id="productQuote" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				
				<div role="form" id="quoteForm">
				<!--<div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div>-->
                <!-- offer list -->
                <table id="quoteTable" class="table table-striped table-bordered  no-footer">
                    <thead>
                    <tr class="ref">
                        <th >Offer No</th>
                        <th >Supplier Name</th>
                        <th  onclick="sortTable(0)">Quote Price</th>
                        <th >Discount Price Quantity</th>
                        <th >Discount Price</th>
                        <th >Supplier Note</th>
                        <th >Payment Accepted</th>
                        <th >Images</th>
                        <th >Delivery date</th>
                        <th >Action</th>
                    </tr>
                    </thead>


                    <tbody id="quote_detail" class="">
                  
                    </tbody>
            
                
                </table>
				
				<div class="form-group">

                        <p id="price"></p>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Date for delivery</label>
                        <p id="Date_for_delivery"></p>
                </div>
				<div class="form-group">
                        <label for="inputName">delivery type</label>
						<p id="delivery_type"></p>-->
                </div>
			

			
				
				
            </div>
			
			
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            

                    <button type="button" class="btn btn-default" data-dismiss="modal">See  for other product</button>
            </div>
        </div>
    </div>
</div>
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
  <img id="img01" style="max-width:100%">
  </div>
</div>



<!-- product quote end -->
<script>
function zoomImage(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}; 


function redirect(id){
alert(id);
}

function viewQuote(productNo){
var orderId = $('.orderLabel').text();
let productName = $('#product'+ productNo +'_name').text();
let productQty = $('#product' + productNo + '_qty').text();
let preferDate = $('#prefer_date').text();
let productQuote = 'product' + productNo + '_quote';
let productQtyNo = 'product' + productNo + '_quantity_no';
let productQtyQuote = 'product' + productNo + '_quantity_price';
let productStatus = 'product' + productNo + '_status';
let paypal;
let bpay ;
let payId;
let bank;
let date;
let spImage;



let productDetail = '	<div class="form-group" id="quote_info"><label for="inputName" > Product No: <label id="productNo">'+productNo+'</label>  </label> <br><label for="inputName">Product Name: '+productName +'</label> <br><label for="inputName">Product Quantity: '+productQty +'</label> <br> <label for="inputName">Preferd Delivery Date: '+preferDate+'</label> <br></div>';
let modalHeader = '<h4 class="modal-title" id="myModalLabel">Compare quotes for ' +productName+'</h4>';

$.ajax({
    type:'GET',
    datatype:'json',
    url:'/HawkiWeb/buyer/viewProductQuote/'+orderId,
    success:function(msg){
        $('#quote_detail').empty();
        $('#quote_info').empty();
        $('.modal-header').empty();
        $('.modal-header').append(modalHeader);
        $('#quoteForm').prepend(productDetail);
        var array=JSON.parse(msg);
        let j = 0
        array.forEach((i)=>{
            j ++;

            // payment method
            if(i.bankAccount != ''){
                    bank = '<img src="<?php echo base_url('images/transfer.png')?>" width="45" height="auto">';
                }else{bank = ''};

            if(i.paypalEmail != ''){
                    paypal = '<img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="70" height="auto"/>';
                }else{paypal = ''};
            
            if(i.billerCode != ''){
                    bpay = '<img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png')?>" width="70" height="auto">';
                }else{bpay = ''};
            
                if(i.abnNumber != ''){
                    payId = '<img src="<?php echo base_url('images/ML008_PayID.png')?>" width="70" height="auto">';
                }else{payId = ''};
            spImage = ['','','','',''];
            if(i.sp_image1){spImage[0] = '<img src="<?php echo base_url('uploads/');?>'+ i.sp_image1 + '" onclick="zoomImage(this)" width="70" height="auto">'};
            if(i.sp_image2){spImage[1] ='<img src="<?php echo base_url('uploads/');?>'+ i.sp_image2 + '" onclick="zoomImage(this)" width="70" height="auto">'};
            if(i.sp_image3){spImage[2] ='<img src="<?php echo base_url('uploads/');?>'+ i.sp_image3 + '"onclick="zoomImage(this)" width="70" height="auto">'};
            if(i.sp_image4){spImage[3] ='<img src="<?php echo base_url('uploads/');?>'+ i.sp_image4 + '"onclick="zoomImage(this)" width="70" height="auto">'};
            if(i.sp_image5){spImage[4] ='<img src="<?php echo base_url('uploads/');?>'+ i.sp_image5 + '" onclick="zoomImage(this)"width="70" height="auto">'};

            // delivery date if delay
            if(i.delay_date!="0000-00-00"){
                date = i.delay_date + '(delay)';

            }else{
                date = preferDate;
            }
            if(i[productQuote]!=''){
            //if the order has a quantity price
                if(i[productQtyQuote]!=''){
                    let htmlContent = '<tr><td class="offer_no">'+ i.random_offer_id+'</td><td>'+ i.username +'</td><td>'
                    + i[productQuote] + '</td><td id="requireqty_'+i.random_offer_id+'">' + i[productQtyNo] + '</td><td>' + i[productQtyQuote] + '</td><td>' + i.extra_notes + '</td><td id="payment_'+ j +
                    '">' + paypal + bpay + payId + bank+ '</td><td>'+ spImage[0] + spImage[1] + spImage[2] + spImage[3] + spImage[4] + '</td><td>'+ date + '</td><td>' + '<button onclick="acceptQuote('+ "'"+i.random_offer_id+ "'" +')">Accept the quote</button>'+ ' |' + '  <button onclick="acceptQtyQuote('+ "'"+i.random_offer_id+ "'" +')">Accept the quantity quote</button>|'+ '<label><input class=" newQty" id="newqty_'+i.random_offer_id +'" type="number" placeholder="More than '+ i[productQtyNo] + '" min="'+i[productQtyNo] +'">'+'</label><button onclick="viewOffer('+i.marked_offer_id+')" data-dismiss="modal" class="" data-toggle="modal" data-target="#modalForm">'+ "Check the supplier's other quotes for this order</button>" + '</td></tr>' ;
                    $('#quote_detail').append(htmlContent)}
                else{  
                    let htmlContent = '<tr><td class="offer_no">'+ i.random_offer_id+'</td><td>'+ i.username +'</td><td>'
                    + i[productQuote] + '</td><td>' + i[productQtyNo] + '</td><td>' + i[productQtyQuote] + '</td><td>' + i.extra_notes + '</td><td id="payment_'+ j +'">'+ paypal + bpay + payId + bank+ '</td><td>' + spImage[0] + spImage[1] + spImage[2] + spImage[3] + spImage[4] + '</td><td>'+ date + '</td><td>' + '<button onclick="acceptQuote('+ "'"+i.random_offer_id+ "'" +')">Accept the quote</button>'+ ' |'+
                    '<button onclick="viewOffer('+i.marked_offer_id+')" data-dismiss="modal" class="" data-toggle="modal" data-target="#modalForm">'+ 
                    "Check the supplier's other quotes for this order</button>" + '</td></tr>' ;
                    $('#quote_detail').append(htmlContent)
                }

            }

            
            
        });

                
    }
});

}

function viewOffer(id){

	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/HawkiWeb/buyer/viewCheckOrder/'+id,
		success:function(msg){
                // supplier id
			    var arrayf = JSON.parse("[" + msg + "]");

                $('#offer_detail').empty();
			    var array = JSON.parse(msg);
                console.log(array);

                $('#offer_number').text(array[0].random_offer_id);
				$('#supplier_name').text(array[0].username);
				$('#Date_for_delivery').text(array[0].date_for_delivery);
			    $('#delivery_type').text(array[0].delivery_type);
				$('#description').text(array[0].description);
				$('#payment_terms').text(array[0].payment_terms);
				
                // pass the data to here
                // generate offer rows
                for(var i=1; i<=10;i++){
                    // if the offer has a quote for the product
                    if( array[0]['order_name_'+i]!=null){
                        if(array[0]['product'+i+'_quote']!=''){
                        // if the product already selected a quote
                            if($.trim($('#pros_'+i).text())=="wait supplier response, offer no:" || $.trim($('#pros_'+i).text())=="supplier agree to keep supply, offer no:" || $.trim($('#pros_'+i).text())=="supplier agree to keep supply with new quantity, offer no:"){
                                // if the selectd quote belons to this supplier

                                
                                if($('#offer_no_'+i).text() == $('#offer_number').text()){
                                    // if the selected qty price

                                    if($('#quantity_' + i ).text().includes('Discount')){
                                        // show qty checked and newquantity
                                        let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] 
                            +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>QTY PRICE <br>"+ array[0]['product'+i+'_quantity_no'] + "    X    $"+ array[0]['product'+i+'_quantity_price'] +"</td><td id='status_"+i+"'> <label><input disabled class='selectQuote' id='quote_" + i + "'type='checkbox' value='1'>Select the quote</label> <label><input class='selectDiscount' type='checkbox' id='dis_quote_" + i 
                            + "' value='2' checked disabled>You've already selected the discount quote </label> <label><input disabled class='newQty' id='new_qty_"+i+"' type='number' value='"+$('#product'+ i +'_qty' ).text()+"' </label></td></tr>";
                            $('#offer_detail').append(htmlContent); 
                                }else{
                                    let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] 
                        +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>"+ array[0]['product'+i+'_quantity_price'] +"</td><td id='status_"+i+"'> <label><input class='selectQuote' id='quote_" + i + "'type='checkbox' value='1' checked disabled>You've already selected this quote</label> </td></tr>";
                        $('#offer_detail').append(htmlContent);
                                }
                                    
                                }else{let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>QTY PRICE <br>" + array[0]['product'+i+'_quantity_no'] + "    X    $"+ array[0]['product'+i+'_quantity_price'] +"</td> <td id='status_"+i+"'>You've already selected another supplier's quote for this product</td></tr>";
                            $('#offer_detail').append(htmlContent);};

                            }
                        // if the product hasn't select any quote or rejected by the supplier
                        else if($.trim($('#pros_'+i).text())=="Not select any quote yet" || 
                        $.trim($('#pros_'+i).text())=="supplier reject to keep supply, please select a new supplier")
                        {
                            // if the quote has a discount price
                            if(array[0]['product'+i+'_quantity_price']!=''){
                            let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] 
                            +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>QTY PRICE <br>"+ array[0]['product'+i+'_quantity_no'] + "    X    $"+ array[0]['product'+i+'_quantity_price'] +"</td><td id='status_"+i+"'> <label><input class='selectQuote' id='quote_" + i + "'type='checkbox' value='1'>Select the quote</label> <label><input class='selectDiscount' type='checkbox' id='dis_quote_" + i 
                            + "' value='2'>Select the discount quote </label> <label><input class='hidden newQty' id='new_qty_"+i+"' type='number' placeholder='More than "+ array[0]['product'+i+'_quantity_no']+ "' min='"+ array[0]['product'+i+'_quantity_no']+"'></label></td></tr>";
                            $('#offer_detail').append(htmlContent); }else{
                        let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] 
                        +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>"+ array[0]['product'+i+'_quantity_price'] +"</td><td id='status_"+i+"'> <label><input class='selectQuote' id='quote_" + i + "'type='checkbox' value='1'>Select the quote</label> </td></tr>";
                        $('#offer_detail').append(htmlContent);}
                        }}
                        
                        if(array[0]['product' + i + '_quote']==''){
                        let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] +"</td><td>N/A"+ array[0]['product'+i+'_quote'] +"</td><td>QTY PRICE <br>" + array[0]['product'+i+'_quantity_no'] + " N/A"+ array[0]['product'+i+'_quantity_price'] +"</td> <td id='status_"+i+"'>This Supplier cannot supply this product</td></tr>";
                        $('#offer_detail').append(htmlContent);
                        }

                        }

                                              
                };
				
				$('#link').prepend('<a class="btn btn-primary"  href="<?php echo base_url('/supplier/profile/'); ?>'+arrayf[0].userId+'"" >Supplier Profile</a>');
			
				
					
		}
	});

}
// enable and disable the selece quote function
$(document).on('click', '.selectQuote', function(){
        let checked = $(this).is(':checked');

        if(checked){
            $(this).closest('label').next().find('.selectDiscount').attr('disabled',true);}else{
            $(this).closest('label').next().find('.selectDiscount').attr('disabled',false);
            }
    });

$(document).on('click', '.selectDiscount', function(){
        let checked = $(this).is(':checked');

        if(checked){
            $(this).closest('label').prev().find('.selectQuote').attr('disabled',true);
            $(this).closest('label').next().find('.newQty').removeClass('hidden');}else{
                $(this).closest('label').next().find('.newQty').val('');
            $(this).closest('label').next().find('.newQty').addClass('hidden');
            $(this).closest('label').prev(1026).find('.selectQuote').attr('disabled',false);
            }
    });


// accept single quote
function acceptQuote(offerNo){
    let productStatus = "product" + $('#productNo').text() +'_status';
    $.ajaxSetup({
        data: csrfData
     });
    $.ajax({
		url:'/HawkiWeb/buyer/acceptQuote/' + offerNo,
        data:{
            "product" : productStatus
        },
        type:'post',
        dataType:'text',
		success:function(msg){
            location.reload();
		}
	});

}

// accept quantity quote with a new qty
function acceptQtyQuote(offerNo){
    let productStatus = "product" + $('#productNo').text() +'_status';
    let requireQty = $("#requireqty_" + offerNo).text();
    let newQty = $("#newqty_" + offerNo).val();
    if( requireQty > newQty){alert('Please input more than the minimum requirement')}else{
        $.ajaxSetup({
        data: csrfData
     });
        $.ajax({
		url:'/HawkiWeb/buyer/acceptQtyQuote/' + offerNo,
        data:{
            "productStatus" : productStatus,
            "newQty" : newQty,
            "productNo" : $('#productNo').text()
        },
        type:'post',
        dataType:'text',
		success:function(msg){
            location.reload();
		}
	});
    }
   

}

// Accept action for an Offer(includes multiple quotes)
function acceptOffer(){
	var offer_no =$("#offer_number").text();
    let status = [];
    let new_qty = [];


    for(var i = 0; i<10;i++){
        if($("#quote_"+i).is(':checked')){
            status[i] = 1;
    }

        if($("#dis_quote_"+i).is(':checked')){
            status[i] = 2;
            new_qty[i] =  $("#new_qty_" + i).val();
    }
    }
    $.ajaxSetup({
        data: csrfData
     });
	$.ajax({
		url:'/HawkiWeb/buyer/acceptOffer/' + offer_no,
        data:{
            "p1":status[1],
            "p2":status[2],
            "p3":status[3],
            "p4":status[4],
            "p5":status[5],
            "p6":status[6],
            "p7":status[7],
            "p8":status[8],
            "p9":status[9],
            "p10":status[10],
            "p1_qty":new_qty[1],
            "p2_qty":new_qty[2],
            "p3_qty":new_qty[3],
            "p4_qty":new_qty[4],
            "p5_qty":new_qty[5],
            "p6_qty":new_qty[6],
            "p7_qty":new_qty[7],
            "p8_qty":new_qty[8],
            "p9_qty":new_qty[9],
            "p10_qty":new_qty[10]
        },
        type:'post',
        dataType:'text',
		success:function(msg){
				location.reload();
		}
	});
	
	
	
}





function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("quoteTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>







  
    