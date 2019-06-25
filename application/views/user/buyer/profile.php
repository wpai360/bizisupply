
<!-- Main content -->
<section class="content">

<script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>
<script src="<?= base_url();?>assets/tel/js/utils.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/tel/css/intlTelInput.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 

<script type= "text/javascript" src = "<?= base_url();?>assets/js/countries.js"></script>

 
 <script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>

 <style>
 textarea{resize: vertical; min-height:100px;}

 </style>

 <div class="tab-pane" id="profile">

  <?php 

     if($this->session->flashdata('msg')){
    echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
     }

    ?>

<div class="row mt-3">

  <div class="col-sm-2">
    <div class="pull-right image">
    <?php if($user->image){
        $src=base_url('assets/uploads/profile/'.$user->image);
    
    }else{
   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
    }
?>
      <img src="<?= $src;?>" class="img-circle" alt="User Image" style="width: 150px;">
    
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

      <div class="form-group">
      <i class="fas fa-info-circle"></i>
        <label for="inputName" class="col-sm-2 control-label">Business Phone</label>

        <div class="col-sm-10">
          <input autocomplete="off" type="tel" name="phone" class="form-control" id="phone"  value="<?php echo $user->phone;?>">
          <!-- invalid number message -->
          <div class="aps"></div>
          <?php echo form_error('phone');?>
        </div>
       
      </div>

       <div class="form-group">
        <label  class="col-sm-2 control-label">Profile Image</label>
        <div class="col-sm-10">
          <input  name="image" type="file" />
          <label for="username" class="error wrong_file"></label>
        </div>
          <?php 

     if($this->session->flashdata('imageErr')){
      echo '<p class="text-danger">'.$this->session->flashdata('imageErr').'</p>';
     }

    ?>
      </div>


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
          <?php if($user->buyer_logo){ ?>
     <img src="<?php echo base_url('assets/uploads/profile/'.$user->buyer_logo );?>" width = "100px" height="70px" />
  <?php }?>
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
                  <label for="exampleInputEmail1">Postcode</label>
                  <?php   
          echo form_input(array(
          'name'        => 'zipCode',
          'id'          => 'zipCode',
          'type'          => 'text',
          'placeholder'=>'Postcode',
           'class'     => 'form-control',
          'style'       => 'width:100%',
          'value' =>   $user->zipCode
          ));

          echo form_error('zipCode'); 
          ?>
                </div>


                    
                </div>

</div>

<!--  -->
<div class="col-md-11">

    <div class="form-group">
                  <label for="exampleInputEmail1">Address2</label>
                   <input autocomplete="off" type="text" name="address" class="form-control"  value="<?php echo $user->address;?>">
           <?php echo form_error('address');?>
           <label for="exampleInputEmail1">City</label>
                       <input type="text"  id="city" name="city" class="form-control"  value="<?php echo $user->city;?>" autocomplete="off">
                         <?php echo form_error('city');?>
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Postcode</label>
                  <?php   
          echo form_input(array(
          'name'        => 'zipCode',
          'id'          => 'zipCode',
          'type'          => 'text',
          'placeholder'=>'Postcode',
           'class'     => 'form-control',
          'style'       => 'width:100%',
          'value' =>   $user->zipCode
          ));

          echo form_error('zipCode'); 
          ?>

    </div>

    

</div>


<div class="form-group">
          <div class="col-md-11">
            
          <label for="">Website</label>
          <input type="text"  id="website" placeholder="website" name="Website" class="form-control"  value="<?php echo $user->website;?>" autocomplete="off">
                         <?php echo form_error('website');?>
          </div>
</div>

<div class="form-group">
          <div class="col-md-11">
            
          <label for="">Social media</label>
          <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
          <?php echo form_error('website');?>
          <h6 id="facebook_name">Not bind with any Facebook account yet</h6>
          </div>
          
</div>

<div class="form-group">
          <div class="col-md-11">
          <label for="">Description</label>
          <textarea type="text" maxlength="500" class="form-control" placeholder="Describe about your business" id="description"></textarea>
          <h6 id="count_message"></h6>
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

<!-- text remaining -->
<script>
var text_max = 500;
$('#count_message').html(text_max + 'remaining');
$('#description').keyup(function(){
  var text_length = $('#description').val().length;
  var text_remaining = text_max - text_length;
  $('#count_message').html(text_remaining + ' remaining');

});

</script>

    


<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=862641754092529&autoLogAppEvents=1"></script>
<!-- Facebook -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '862641754092529',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.3'
    });

    FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    FB.api('/me', function(response) {
       console.log('Good to see you, ' + response.name + '.');
       $('#facebook_name').html('Facebook account binded with ' + response.name);
     });
    console.log(response.authResponse.accessToken);
  }
});


  };
  
  
</script>



</section>