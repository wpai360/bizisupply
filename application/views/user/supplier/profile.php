<style type="text/css">
  .hidenFields{display: none;}
  input[type="file"] {
  display: block;
}
  
  
</style>
<!-- Main content -->
<section class="content">

<script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>
<script src="<?= base_url();?>assets/tel/js/utils.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/tel/css/intlTelInput.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 

<script type= "text/javascript" src = "<?= base_url();?>assets/js/countries.js"></script>

 
 <script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>

<div class="row">
    <a class="pull-right" target="blank" href="<?php echo base_url('supplier/category');?>"><button type="button" class="btn btn-success">Change Services</button></a> 
 </div>

 <div class="tab-pane" id="profile">

  <?php 

     if($this->session->flashdata('msg')){
    echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
     }
//echo $this->session->all_userdata('suppler_image');

       $this->db->from('users');
       $this->db->select('users.supplier_image');
	   $this->db->where("users.id = $user->id");
	   $querys = $this->db->get()->result(); 

    ?>

<div class="row mt-3">
                            
  <div class="col-sm-2">
     <div class="pull-right image">
       <?php if($querys[0]->supplier_image){

          $src=base_url('uploads/'.$querys[0]->supplier_image);  

			  ?>
          
			
  <?php }else{
	  
	   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
	  
  }?>
       <img src="<?php echo $src;?>" class="img-circle" alt="User Image"  style="width: 134px;height: 125px;"/>
    
    </div>
  </div>

<div class="col-sm-10">

  <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Add New Category</h4>
          </div>
          <form id ="addCat">
            <div class="modal-body">
              <p><label>Name :</label> <input type="text" class="categoryName form-control"  onkeyup="checkCategoryStatus(this)" name="cat" style="text-transform:uppercase" required ="required"/></p>
              <span class="errCat"></span>
              <div class="modal-footer d-flex justify-content-center">
                <input type="hidden" class="addH">
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

  <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data" autocomplete="off"> 

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Username</label>

        <div class="col-sm-10">
          <input autocomplete="off" type="text" value="<?php echo $user->username;?>" class="form-control"  placeholder="username" name="username">
           <?php echo form_error('username');?>
        </div>
      </div>


      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
          <input autocomplete="off" type="text" value="<?php echo $user->name;?>" class="form-control"  placeholder="Name" name="name" >
           <?php echo form_error('name');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input autocomplete="off" type="email" value="<?php echo $user->email;?>" class="form-control" name="email"  id="inputEmail" placeholder="Email">
           <?php echo form_error('email');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" name="password" id="password" class="form-control"  value="password" autocomplete="off">
           <?php echo form_error('password');?>
        </div>
      </div>

     <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">ABN</label>

        <div class="col-sm-10">
          <input type="text" value="<?php echo $user->ABN;?>" class="form-control abn"  placeholder="ABN" name="ABN" autocomplete="off">
           <?php echo form_error('ABN');?>
            <p class="err abnErr"></p>
        </div>
       
      </div>

      <div class="input_fields_wrap" >
		<?php echo form_open_multipart('welcome/do_upload');?>
		<label for="comment" class="col-sm-2 control-labelprod-label">Profile image:</label> 
		<input class="supplier-image" type="file" name="image2" value="" id='1' >
		<input type="hidden" name="old_supplier_Image" value="<?php echo $querys[0]->supplier_image;?>"  >
		<img   id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=upload+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;" ></i>
<br>



       <div class="form-group">
       <div class="col-sm-8">
        <label for="InputFile" class="col-sm-2 control-label">Logo</label>
        <div class="col-sm-10">
          <input id="InputFile" name="logo" type="file" />
          <label for="username" class="error wrong_file"></label>
        </div>
          <?php 

     if($this->session->flashdata('imageErr')){
      echo '<p class="text-danger">'.$this->session->flashdata('imageErr').'</p>';
     }

    ?>
    </div>
     <input type="hidden" name="HideCountry" value="<?php echo $user->country; ?>" class="HideCountry" />

     <div class="col-sm-4">
     <?php if($user->supplier_logo){ ?>
     <img src="<?php echo base_url('assets/uploads/profile/'.$user->supplier_logo );?>" width = "100px" height="70px" />
     <?php } ?>
     </div>
      </div>

 

         <input type="hidden" name="contry" id="contry" value="<?php echo $user->cn;?>">

    <div class="row">
    <div class="col-md-6">
        <div class="col-md-11">

            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input autocomplete="off" type="text" name="address" class="form-control"  value="<?php echo $user->address;?>">
                <?php echo form_error('address');?>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <select autocomplete="off" id="country" name= "country" value ="<?php echo $user->country;?>" class='form-control' ><option value="<?php echo $user->country;?>"><?php echo $user->country;?></option></select>

                <?php echo form_error('country');?>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <select autocomplete="off" id="state" name= "state" value ="<?php echo $user->state;?>" class='form-control' ><option value="<?php echo $user->state;?>"><?php echo $user->state;?></option></select>

                <?php echo form_error('state');?>
            </div>
                   
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text"  id="city" name="city" class="form-control"  value="<?php echo $user->city;?>" autocomplete="off">
            <?php echo form_error('city');?>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Pin</label>
            <?php   
                echo form_input(array(
                'name'        => 'zipCode',
                'id'          => 'zipCode',
                'type'          => 'text',
                'placeholder'=>'Zip Code',
                'class'     => 'form-control',
                'style'       => 'width:100%',
                'value' =>   $user->zipCode
                ));

                echo form_error('zipCode'); 
            ?>
        </div>


      <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input autocomplete="off" type="tel" name="phone" class="form-control" id="phone"  value="<?php echo $user->phone;?>">
          <div class="aps"></div>
          <?php echo form_error('phone');?>
      </div>
				
			
				
    </div>
    <div class="row">
      <div class="col-md-6">

        
      </div>      
    </div>
    <div class="row">
      <div class="col-md-12">
          <?php $payment = $user->payment_term ;
      
                  $payments = explode(',', $payment);
                 
            ?>
             

        <div class="form-group">
            <label for="exampleInputEmail1">Payment method</label><br><br>    

            <input type="checkbox" id="paypalEmailPhone" onchange="valueChanged()" name="payment_term[]" value="1"  <?php if (in_array("1", $payments))
                {
                echo "checked";
                }
                else
                {
                echo "";
                } ?> <?php echo set_checkbox('payment_term', '1'); ?>> <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="70" height="auto"/><br><br>    
        </div>    

        <div class="form-group hidenFields  paypalFields">
            <label for="exampleInputEmail1"> PayPal Account(Email or Phone number) </label>
            <input type="text"  name="paypalEmail"  class="form-control" id="paypalEmail" placeholder="e.g. seamaszhou@gmail.com or 0451951026" value="<?php echo $user->paypalEmail;?>">
            <?php echo form_error('paypalEmail');?>
        </div> 


        <div class="form-group">
           <input type="checkbox" id="bpayBillerCode" onchange="valueChanged()" name="payment_term[]" value="2" <?php if (in_array("2", $payments))
                {
                echo "checked";
                }
                else
                {
                echo "";
                } ?> <?php echo set_checkbox('payment_term', '2'); ?>> <img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png')?>" width="50" height="auto"><br>    

              
        </div>
        <div class="form-group hidenFields BpayFields">
            <label for="exampleInputEmail1">Bpay Account(Biller code)</label>
            <input type="text"  name="billerCode"  class="form-control" id="billerCode" placeholder="e.g. 959197" value="<?php echo $user->billerCode;?>">
            <?php echo form_error('billerCode');?>
        </div>

        <div class="form-group">
                
            <input type="checkbox" id="payidABN" onchange="valueChanged()" name="payment_term[]" value="3" <?php if (in_array("3", $payments))
            {
            echo "checked";
            }
            else
            {
            echo "";
            } ?> <?php echo set_checkbox('payment_term', '3'); ?>> <img src="<?php echo base_url('images/ML008_PayID.png')?>" width="70" height="auto"><br>

        </div>


        <div class="form-group hidenFields ABNNumber">
            <label for="exampleInputEmail1">Business PayID(ABN numer)</label>
            <input type="text"  name="abnNumber"  class="form-control" id="abnNumber" placeholder="e.g. 959197" value="<?php echo $user->abnNumber;?>">
            <?php echo form_error('abnNumber');?>
        </div>


        <div class="form-group">
            <input type="checkbox" id="bankTransfer" onchange="valueChanged()" name="payment_term[]" value="4" <?php if (in_array("4", $payments))
            {
            echo "checked";
            }
            else
            {
            echo "";
            } ?> <?php echo set_checkbox('payment_term', '4'); ?>> <img src="<?php echo base_url('images/transfer.png')?>" width="45" height="auto">
        </div>
      <!-- =================== 'Bank transfer' ========================== -->
        <div class="form-group hidenFields bankTransferField">
            <label for="exampleInputEmail1">BSB number</label>
            <input type="text"  name="bsbNumber"  class="form-control" id="bsbNumber" placeholder="e.g. 064184" value="<?php echo $user->bsbNumber;?>">
            <?php echo form_error('bsbNumber');?>
        </div>

        <div class="form-group hidenFields bankTransferField">
            <label for="exampleInputEmail1">Bank accounnt</label>
            <input type="text"  name="bankAccount"  class="form-control" id="bankAccount" placeholder="e.g. 10912222" value="<?php echo $user->bankAccount ;?>">
            <?php echo form_error('bankAccount');?>
        </div>
      <!-- =============================================================== -->

      </div>
    </div>  

    </div>

<!--new code  end 3/8/2018-->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success submit">Submit</button>
        </div>
      </div>
  </form>

  </div>
  </div>
</div>

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
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
});
$("#image1").click(function(){
document.getElementById("1").value = null;
$("#cu1").attr("src","https://dummyimage.com/300x200/000/fff.jpg&text=upload+image");
});
   
   
</script>




<script type="text/javascript">
function valueChanged()
{
    if($('#paypalEmailPhone').is(":checked"))   
      $(".paypalFields").show();
    else
      $(".paypalFields").hide();

    if($('#bpayBillerCode').is(":checked"))   
      $(".BpayFields").show();
    else
      $(".BpayFields").hide();  

    if($('#payidABN').is(":checked"))   
      $(".ABNNumber").show();
    else
      $(".ABNNumber").hide();   

    if($('#bankTransfer').is(":checked"))   
      $(".bankTransferField").show();
    else
      $(".bankTransferField").hide();   

}
$(document).ready(function(){

    if ($('#paypalEmailPhone').is(':checked')) {
        $('.paypalFields').show();
    } else {
        $('.paypalFields').hide();
    }

    if ($('#bpayBillerCode').is(':checked')) {
        $('.BpayFields').show();
    } else {
        $('.BpayFields').hide();
    }

    if ($('#payidABN').is(':checked')) {
        $('.ABNNumber').show();
    } else {
        $('.ABNNumber').hide();
    }

    if ($('#bankTransfer').is(':checked')) {
        $('.bankTransferField').show();
    } else {
        $('.bankTransferField').hide();
    }

})
</script>

<script>

function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};

 $(document).ready( function (){
  var errGot;


$('.toggler').on('click',function(){
  $(this).parent().children().toggle();  //swaps the display:none between the two spans
  $(this).parent().parent().find('.toggled_content').slideToggle();  //swap the display of the main content with slide action

});



$('#country').on('change', function (){

var newOne = $( "#country option:selected" ).text();
$('.HideCountry').val(newOne);

});

/************************************************/
   


 $("form").validate({
        rules: {
            zipCode: {
                required: true
            },
              state: {
                required: true
            },
              city: {
                required: true
            },
              country: {
                required: true
            },
            phone: {
                required: true
            },
             username: {
                required: true
            },
            name: {
                required: true
            },
            ABN: {
                required: false
            },
            email: {
                required: true,
                email: true,
                //remote: "check_email_exists"
            },
            paypalEmail:{
                required: true,
                email: true,
            }
        
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
              }
        },
        messages: {
             zipCode: {
                required: "Pin is required"
            },
              state: {
                required: "State is required"
            },
              city: {
                required: "City is required"
            },
              country: {
                required: "Country is required"
            },
            phone: {
                required: "Phone is required"
            },
             username: {
                required: "Business Name is required"
            },
             name: {
                required: "Name is required"
            },
             ABN: {
                required: "ABN is required"
            },
             email: {
                required: "Phone is required",
                email: "E-mail formate is not valid",
                remote:"E-mail already exists."
            },
            paypalEmail:{
                required: "Email is required",
                email: "E-mail formate is not valid",
            }

            hiddenRecaptcha:{
              required : "The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?"
            }

        }
    });

$('form').submit( function (e){

var valid = $("form").valid();
if(valid){

if($('#password').val() != 'password'){
      $.validator.addMethod('password', function(value, element) {
            return this.optional(element) || (value.match(/[a-z]/) && value.match(/[A-Z]/) && value.match(/[0-9]/) && value.match(/[!@#$%&*()_+=-|<>?{}~]/));
        },
        'Password must contain at least one numeric and one uppercase letter and one lowercase letter  and one special character and at least 8 min length.');
 $("form").validate({
        rules: {
            password: {
                password: true
            }
          }
        });

}

   var isValid = $("#phone").intlTelInput("isValidNumber");
    if(!isValid){
    
     $('.aps').html('<p class="err">InValid Number</p>');
     return false;
   }else{
 
     $('.aps').html('<p class="success">Valid Number</p>');

   /*if($('.abnErr').text() == '' && errGot){  
   }else{
    
     $('.abn').val('');
     $('.abn').focus();
     return false;
   }*/
    
 }
}
});
/**************************************************/



  setTimeout( function (){
    var initialCountry = $("#contry").val();
    if(initialCountry){
      $("#phone").intlTelInput("setCountry", initialCountry);
    }
  },2000);
  $("#phone").intlTelInput();

  $("#phone").on("countrychange", function(e, countryData) {
    $('#contry').val(countryData['iso2']);
    if($("#phone").val()){
     var isValid = $("#phone").intlTelInput("isValidNumber");
     if(!isValid){
      $('.aps').html('<p class="err">InValid Number</p>');
    }else{
     $('.aps').html('<p class="success">Valid Number</p>');
     $('.aps').html('');
   }
 }
});


  $("#phone").on("keyup", function(e, countryData) {
    if($("#phone").val()){
     var isValid = $("#phone").intlTelInput("isValidNumber");
     if(!isValid){
       $('.aps').html('<p class="err">InValid Number</p>');
     }else{
       $('.aps').html('<p class="success">Valid Number</p>');
    $('.aps').html('');
 }
}
});



 $('.abn').on('keyup', function (){
  var val = $(this).val();
    $.ajax({url: "https://abr.business.gov.au/json/AbnDetails.aspx?abn="+val,
    dataType: "jsonp",
     success: function(result){
        console.log(result);
        if(result){
          if(result.Abn == ''){
            errGot = false;
            var msg = result.Message;
            $('.abnErr').text(msg);
          }else{
            $('.abnErr').text('');
            errGot = true;
          }
        }
    }});
 });
  

});

</script>


<script>

$(document).ready(function() {
  $('#country').on('change', function (){

var newOne = $( "#country option:selected" ).text();
$('.HideCountry').val(newOne);

});
    $("#zipCode").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

$(document).ready(function() {
  populateCountries("country", "state","<?php echo $user->country;?>");
});
</script>
<script>
 $(document).ready(function() {
    $('input[type="file"]').change(function() {
      var file = $(this).val();
      var exts = ['jpg','jpeg','gif','png'];
      
      // first check if file field has any value
      if ( file ) {
        // split file name at dot
        var get_ext = file.split('.');
        // reverse name to check extension
        get_ext = get_ext.reverse();
        
        // check file type is valid as given in 'exts' array
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          // alert( 'Allowed extension!' );
           $(this).next('.wrong_file').html('').hide();
        } else {
          // alert( 'Invalid file!' );
          $(this).val('');
          $(this).next('.wrong_file').html('Please select valid extention(jpg/jpeg/gif/png).').show();
        }
      }
    });
  });
</script>


</section>