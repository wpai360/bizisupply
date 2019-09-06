&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:red;" class="custom_back_btn"href="<?php echo base_url('buyer/buyerOrderDashboard');?>">Back</a>
<?php  if($this->session->flashdata('message')){?>        
          <?php echo $this->session->flashdata('message')?>
<?php } 

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
z-index:1;
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
    width: 100%;
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
<?php //echo "<pre>"; print_r($viewOrder); die;  ?>

<!-- check more start --->
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<div class="custom_container custm_label">

 <?php if(!empty($viewOrder)){ ?>
 <?php //echo "<pre>"; print_r($viewOrder); die;  ?>
<!--<label>Order Id</label> <p><?php //if(!empty($viewOrder[0]->order_id)){ echo $viewOrder[0]->order_id; } else { echo 'N/A';} ?></p><br>-->
<div class="row">
    <div class="col-lg-12">
        <div class="orderAlign">
        <label class="labelTitle">Order Id :  <label class="orderLabel"><?php if(!empty($viewOrder[0]->order_random_id)){ echo $viewOrder[0]->order_random_id; } else { echo 'N/A';} ?></label> </label>
        </div>
    </div>

    <?php 
   $productnumber = 0;
    for($j=1; $j<11; $j++){
        
        if($viewOrder[0]->{'order_name_'.$j}!=''){$productnumber++;}
    }?>

    <?php for($i = 1; $i <=$productnumber; $i++){
    ?>
    <div class="col-lg-12 product-detail">
    <label for="state" class="control-label">Product <?php echo $i;?></label>
    <div class="row">
        <div class="col-lg-3">

        <label class="">Name : <?php if(!empty($viewOrder[0]->{'order_name_'.$i})){ echo $viewOrder[0]->{'order_name_'.$i}; } else { echo 'N/A';} ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Quantity: <?php if(!empty($viewOrder[0]->{'quantity_'.$i})){ 
            $qtyStatus = 0;
            foreach($viewOrder as $element){
                if($element->{'product'.$i.'_status'}==='2' || $element->{'product'.$i.'_status'}==='5'){
                    echo $element->{'product'.$i.'_quantity_no'};
                    echo ('(Discount QTY)');
                    $qtyStatus++;
                }elseif($element->{'product'.$i.'_status'}==='1'){
                    echo $element->{'quantity_'.$i};
                    $qtyStatus++;
                }
            }
            // show
            if($qtyStatus == 0){
                echo $viewOrder[0]->{'quantity_'.$i};
            }

        } else { echo 'N/A';}; ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Brand Name : <?php if(!empty($viewOrder[0]->{'brand_name_'.$i})){ echo $viewOrder[0]->{'brand_name_'.$i}; } else { echo 'N/A';}; ?></label>
        </div>
        <div class="col-lg-3">
        <label class="">Part Number :<?php if(!empty($viewOrder[0]->{'part_number_'.$i})){ echo $viewOrder[0]->{'part_number_'.$i}; } else { echo 'N/A';}; ?></label></div>

        <div class="col-lg-12">

        


<?php $productStatus = 0; for($j=0;$j<count($viewOrder);$j++){
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber

                if ($viewOrder[$j]->{'product'.$i.'_status'} === '1' or $viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                    echo "<label class='pro_status' > Product Price:";
                    echo "<label id='price_";echo $i ;echo "'style=''>$";echo $viewOrder[$j]->{'product'.$i.'_quote'} ;echo "/product, $";echo $viewOrder[$j]->{'product'.$i.'_quote'} * $viewOrder[$j]->{'quantity_'.$i} ;echo " in total</label>";
                    $productStatus ++;
                }  elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '4') {
                    echo "<label class='pro_status' > Product Price:";
                    echo "<label id='price_";echo $i ;echo "'style='color:#e74c3c;'>N/A</label>";
                    $productStatus++;
                }elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5' or $viewOrder[$j]->{'product'.$i.'_status'} === '2') {
                    echo "<label class='pro_status' > Product QTY Price:";
                    echo "<label id='price_";echo $i ;echo "'style=''>$";echo $viewOrder[$j]->{'product'.$i.'_quantity_price'} ;echo "/product, $";echo $viewOrder[$j]->{'product'.$i.'_quantity_price'} * $viewOrder[$j]->{'product'.$i.'_quantity_no'} ;echo " in total</label>";
                    $productStatus++;
                }
        }
 
        if ($productStatus == 0) {echo "<label id='price_";echo $i ;echo "'style='color:#f1c40f;'>N/A</label>";}
        ?>
</label></div>
        <div class="col-lg-12">

        
        <label class="pro_status" > <img style="width:60px;
    height: 50px;" src=" <?php echo base_url("assets/images/smallhawk.png");?>">Product Status:
        <?php $productStatus = 0; for($j=0;$j<count($viewOrder);$j++){
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber

                if ($viewOrder[$j]->{'product'.$i.'_status'} === '1' or $viewOrder[$j]->{'product'.$i.'_status'} === '2') {
                    echo "<label id='pros_";echo $i ;echo "'style='color:#e74c3c;'>wait supplier response, offer no:</label><label id='offer_no_"; echo"$i";echo "'>";echo $viewOrder[$j]->random_offer_id;echo "</label>";
                    $productStatus ++;
                } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                    echo "<label id='pros_";echo $i ;echo "'style='color:#2ecc71;'>supplier agree to keep supply, offer no:</label><label id='offer_no_"; echo"$i";echo "'>";echo $viewOrder[$j]->random_offer_id;echo "</label>";
                    $productStatus++;
                } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '4') {
                    echo "<label id='pros_";echo $i ;echo "'style='color:#e74c3c;'>supplier reject to keep supply, please select a new supplier </label>";
                    $productStatus++;
                }elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5') {
                    echo "<label id='pros_";echo $i ;echo "'style='color:#2ecc71;'>supplier agree to keep supply with new quantity, offer no:</label><label id='offer_no_"; echo"$i";echo "'>";echo $viewOrder[$j]->random_offer_id;echo "</label>";
                    $productStatus++;
                }
        }
 
        $quoteRecevied = 0;
        foreach($viewOrder as $value){
            if($value->{'product'.$i.'_quote'}!=''){
                $quoteRecevied++;
            }
        }

        if ($productStatus == 0) {echo "<label id='pros_";echo $i ;echo "'style='color:#f1c40f;'>Not select any quote yet</label>";}
        echo ' <button onclick="viewQuote(';echo $i;echo ')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#productQuote">Compare the quotes for this product ('; echo $quoteRecevied;echo ' quotes recevied)</button>';
       

       ?>
        </label></div> 

<div class="col-lg-12">

<?php $productStatus = 0; for($j=0;$j<count($viewOrder);$j++){
            // 1 for general quote, 2 for quantity quote
            // status = 2, quantity number = supplier_marked_offer.qtynumber
            $OfferId = $viewOrder[$j]->offer_id;

                if ($viewOrder[$j]->{'product'.$i.'_status'} === '3') {
                    echo '<a href="/HawkiWeb/buyer/processOrder/'.$OfferId.'" class="btn btn-success btn-lg" >Check More</a>';

                } elseif ($viewOrder[$j]->{'product'.$i.'_status'} === '5') {
                    echo '<a href="/HawkiWeb/buyer/processOrder/8975'.$OfferId.'" class="btn btn-success btn-lg" >Check More</a>';

                }
        }
 

        ?>
 




</div>
    </div>
    </div>

    <?php } ?>

    
 </div>
<div class="row">
<div class="col-lg-12">
<div class="orderAlign">
        <label class="labelTitle">Prefer Delivery Date :  <label class=""><?php if(!empty($viewOrder[0]->prefer_delivery_data)){ echo $viewOrder[0]->prefer_delivery_data; } else { eCho 'N/A';} ?></label></label>
        </div>
<div class="orderAlign custom_img_class"><label class="labelTitle">Product Images:</label></div>
<div class="orderAlign">


<?php 
if($viewOrder[0]->image1){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image1);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>



<?php 

if($viewOrder[0]->image2){ ?>

<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image2);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php }

?>




<?php 

if($viewOrder[0]->image3){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image3);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>




<?php

if($viewOrder[0]->image4){ ?>
	
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image4);?>" width="200" height="100" onclick="onClick(this)"></img>
<?php } ?>

<?php 

if($viewOrder[0]->image5){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image5);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image6){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image6);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image7){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image7);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image8){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image8);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image9){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image9);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<?php 

if($viewOrder[0]->image10){?>
<img class="ProductImg" id="myImg" src="<?php echo base_url('uploads/'. $viewOrder[0]->image10);?>" width="200" height="100" onclick="onClick(this)"></img><div style="clear:both;"></div>&nbsp;
<?php } ?>

<div style="clear:both;"></div>
<?php } ?>

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


            if(!empty($offerList)){
                for($j=0;$j< count($offerList); $j++){   
                    $checkAction[] = $offerList[$j]->request_wait_response;
                }
            }
        // check if any offer has been selected
        
        $counts = array_count_values($checkAction);
        $count_checkAction =$counts["1"];
        /* 
        
        $counts = array_count_values($checkAction);

        pr($checkAction); */
        


            if(!empty($offerList)){
            for($i=0;$i< count($offerList); $i++){  ?>
                <tr>
                    <td style="text-align:center;"><?php if(!empty($offerList[$i]->random_offer_id)){ echo   $offerList[$i]->random_offer_id;} else {echo 'N/A';}?>
                    </td>
                    <td style="text-align:center;"><?php if(!empty($offerList[$i]->name)){ echo   $offerList[$i]->username;} else {echo 'N/A';}?>
                    </td>
                    <td  style="text-align:center;"><?php if(!empty($offerList[$i]->price_offer)){ echo '$'.$offerList[$i]->price_offer;} else {echo 'N/A';}?>  </td>

                    <td  style="text-align:center;"><?php if(!empty($offerList[$i]->prefer_delivery_data)){ echo $offerList[$i]->prefer_delivery_data;} else {echo 'N/A';}?>  </td>
                   
                    <td  style="text-align:center;"><?php if(!empty($offerList[$i]->payment_terms)){ echo $offerList[$i]->payment_terms;} else {echo 'N/A';}?>  </td>
                 
                    <td>
                    <?php 
                    $thisOne =$offerList[$i]->offer_id;
                    
                        echo '<button onclick="viewOffer('.$offerList[$i]->marked_offer_id.')" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">Check More</button>';

                    ?>
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
                         <label for="inputName">Offer No</label>
                      <p id="offer_no"></p>
                </div>

                <div class="form-group">
                         <label for="inputName">Supplier Name</label>
                      <p id="supplier_name"></p>
                </div>
				<!--<div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div>-->
                <!-- offer list -->
                <table class="table table-striped table-bordered dataTable no-footer">
                    <thead>
                    <tr class="ref">
                        <th class="col">Product Number</th>
                        <th class="col">Product Name</th>
                        <th class="col">Brand Name</th>
                        <th class="col">Quantity</th>
                        <th class="col">Part Number</th>
                        <th class="col">Supplier note</th>
                        <th class="col">Supplier's Quote Price</th>
                        <th class="col">Supplier's QTY Discount</th>
                        <th class="col">Action</th>
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
                <button onclick="" data-dismiss="modal" class="btn btn-success btn-lg" data-toggle="modal" data-target="#productQuote">Back</button>
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
                <h4 class="modal-title" id="myModalLabel">Compare quotes for 'Pump'</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				
				<div role="form">
				
				<div class="form-group">
                         <label for="inputName">Product No : 1</label> <br>
                         <label for="inputName">Product Name : Pump</label> <br>
                         <label for="inputName">Product Quantity : 12</label> <br>
                         <label for="inputName">Preferd Delivery Date: 12/Aug/2019</label> <br>
                </div>

               
				<!--<div class="form-group">
                        <label for="inputName">Supplier</label>
                        <p id="supplier_name"></p>
                </div>-->
                <!-- offer list -->
                <table class="table table-striped table-bordered dataTable no-footer">
                    <thead>
                    <tr class="ref">
                        <th class="col">Offer No</th>
                        <th class="col">Supplier Name</th>
                        <th class="col">Quote Price</th>
                        <th class="col">Discount Price Quantity</th>
                        <th class="col">Discount Price</th>
                        <th class="col">Supplier Note</th>
                        <th class="col">Payment Accepted</th>
                        <th class="col">Delivery date</th>
                        <th class="col">Action</th>
                    </tr>
                    </thead>


                    <tbody id="quote_detail" class="">
                  
                    <!-- <td class="col">SS319430561</td>
                        <td class="col">John Hawkins</td>
                        <td class="col">99$ per product</td>
                        <td class="col">More than 14</td>
                        <td class="col">88$ per product</td>
                        <td class="col">I can use au post</td>
                        <td class="col"><img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="35" height="auto"/>
                      <img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png')?>" width="35" height="auto">
                      <img src="<?php echo base_url('images/ML008_PayID.png')?>" width="35" height="auto">
                      <img src="<?php echo base_url('images/transfer.png')?>" width="22.5" height="auto"></td>
                        <td class="col">12/Aug/2019 </td>
                        <td class="col"><button>Accept the quote</button> | <button>Accept the quantity quote</button>| <button onclick="viewOffer('550')" data-dismiss="modal" class="" data-toggle="modal" data-target="#modalForm">Check the supplier's other quotes for this order</button></td> -->
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
            
                <button type="button" class="btn btn-primary submitBtn" id="accept_offer_btn" onclick="acceptOffer()">Accept Offer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">See the Quotes for other product</button>
            </div>
        </div>
    </div>
</div>

<!-- product quote end -->
<script>



function redirect(id){
alert(id);
}

function viewQuote(productNo){
var orderId = $('.orderLabel').text();
let productQuote = 'product' + productNo + '_quote';
let productQtyNo = 'product' + productNo + '_quantity_no' 
let productQtyQuote = 'product' + productNo + '_quantity_price' 
console.log(productQuote);
$.ajax({
    type:'GET',
    datatype:'json',
    url:'/HawkiWeb/buyer/viewProductQuote/'+orderId,
    success:function(msg){
        $('#quote_detail').empty();
        var array=JSON.parse(msg);
        console.log(array);
        array.forEach((i)=>{
            if(i[productQuote]!=''){
                let htmlContent = '<tr><td class="offer_no">'+ i.random_offer_id+'</td><td>'+ i.username +'</td><td>'
                + i[productQuote] + '</td><td>' + i[productQtyNo] + '</td><td>' + i[productQtyQuote] + '</td><td>' + i.extra_notes + '</td><td>payment'+ '</td><td>delivery date' + '</td><td>' + '<button>Accept the quote</button>'+ ' | <button>Accept the quantity quote</button>|'+
                '<button onclick="viewOffer('+i.marked_offer_id+')" data-dismiss="modal" class="" data-toggle="modal" data-target="#modalForm">'+ 
                "Check the supplier's other quotes for this order</button>" + '</td></tr>' ;
                $('#quote_detail').append(htmlContent)
                console.log(i[productQuote],i.random_offer_id,i.username);
            }
        });
        // 使用前端筛选出存在的quote
                
    }
});

}

function viewOffer(id){

	$.ajax({
		type:'GET',
		datatype:'json',
		url:'/HawkiWeb/buyer/viewCheckOrder/'+id,
		success:function(msg){
		    // $('.offer-table').removeClass('hidden');
            // $('.selected-notice').addClass('hidden');
            // $('#accept_offer_btn').text('Accept Offer');
			    var arrayf = JSON.parse("[" + msg + "]");
			        //alert(array[0].marked_offer_id)    
                    $('#offer_detail').empty();
			    var array = JSON.parse(msg);
                console.log(array[0]);
                // pass the data to here
                // generate offer rows
                for(var i=1; i<=10;i++){
                    // if the offer has a quote for the product
                    if( array[0]['order_name_'+i]!=null){
                        if(array[0]['product'+i+'_quote']!=''){
                        // if the product already selected a quote
                            if($.trim($('#pros_'+i).text())=="wait supplier response, offer no:" || $.trim($('#pros_'+i).text())=="supplier agree to keep supply, offer no:" || $.trim($('#pros_'+i).text())=="supplier agree to keep supply with new quantity, offer no:"){
                            let htmlContent = "<tr><td>"+ i + "</td><td>"+ array[0]['order_name_'+i] +"</td><td>"+ array[0]['brand_name_'+i] +"</td><td id='qty_" +i+"'>"+ array[0]['quantity_'+i] +"</td><td>"+ array[0]['part_number_'+i] +"</td><td>"+ array[0]['product'+i+'_reason'] +"</td><td>$"+ array[0]['product'+i+'_quote'] +"</td><td>QTY PRICE <br>" + array[0]['product'+i+'_quantity_no'] + "    X    $"+ array[0]['product'+i+'_quantity_price'] +"</td> <td id='status_"+i+"'>You've already selected another supplier's quote for this product</td></tr>";
                            $('#offer_detail').append(htmlContent);}
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
                // check if the offer has been selected
                

                console.dir('data for offer' + array[0].random_offer_id + msg);
			    $('#offer_no').text(array[0].random_offer_id);
				$('#supplier_name').text(array[0].username);
				$('#Date_for_delivery').text(array[0].date_for_delivery);
			    $('#delivery_type').text(array[0].delivery_type);
				$('#description').text(array[0].description);
				$('#payment_terms').text(array[0].payment_terms);
				$('#image1').prepend('<img  src="<?php echo base_url('/uploads'); ?>'+ array[0].image1 + '"/>');
				
                // check if the offer alredy been selected
                for(let j = 0; j<10;j++){
                    let exist_offer = $('#offer_no_' +j).text();
                    let current_offer = $('#offer_no').text();
                    if (exist_offer == current_offer) {
                        $('.selected-notice').removeClass('hidden');
                        $('.offer-table').addClass('hidden');
                        $('#accept_offer_btn').text('Cancel Offer');
                    }
                    } 

				
				$('#link').prepend('<a class="btn btn-primary"  href="<?php echo base_url('/supplier/profile/'); ?>'+arrayf[0].userId+'"" >Supplier Profile</a>');
			
				
					
		}
	});

}
// enable and disable the selece quote function
$(document).on('click', '.selectQuote', function(){
        let checked = $(this).is(':checked');
        console.log(123);
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



function acceptOffer(){
	var offer_no =$("#offer_no").text();
    let p1,p2,p3;
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
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Please enter your email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Please enter your message.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>


<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])){
    
    // Submitted form data
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $message= $_POST['message'];
    
    /*
     * Send email to admin
     */
    $to     = 'admin@example.com';
    $subject= 'Contact Request Submitted';
    
    $htmlContent = '
    <h4>Contact request has submitted at CodexWorld, details are given below.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Name:</th><td>'.$name.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
            <th>Message:</th><td>'.$message.'</td>
        </tr>
    </table>';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Additional headers
    $headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";
    
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    
    // Output status
    echo $status;die;
}
?>

<!--- check more end --->




  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.delete').click(function(){
var checkstr =  confirm('are you sure you want to delete this?');
if(checkstr == true){
  // do your code
}else{
return false;
}
});
});
</script>



<script src='https://code.jquery.com/jquery-1.12.3.js'></script>
   <script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" charset="utf-8"></script>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
         <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
   
 

    <script>
      $(document).ready(function(){
  $("#example").DataTable({
    // "sPaginationType": "bootstrap",
  });
});



// Get the modal
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>


  
    