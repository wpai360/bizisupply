
<style>
input#phone{
    padding-left: 47px !important;
}
</style>
<style type="text/css">
#hiddenRecaptcha {visibility: hidden;}
</style>
<script type= "text/javascript" src = "<?= base_url();?>assets/js/countries.js"></script>


  <section class="banner-section-login">
    <div class="container">
     <div class="row">
       <div class="banner-login-text">
         <h2><?php echo strtoupper($title);?></h2>
       </div>
     </div> 
    </div>
  </section>


<section class="Register-form-sec">
	<div class="container">
		<div class="row">
			<div class="login-section-heading-register">
				<?php 
				echo form_open(); 
				echo '<p class="success" style="text-align:center">';

				if($this->session->flashdata('msg')){
				echo $this->session->flashdata('msg');
				}
				echo '</p>';
				?>
					<div class="main_register_form">
						<h2 class="admin-register-section">Register</h2>
					<div class="register_top">
						<?php 
						if($error) echo '<p class="error">'. $error .'</p>';
						?>
						<div class="left-sec">
							<?php 

							echo form_input(array('name' => 'username', 'placeholder'=>'BusinessName' , 'value' => set_value('username')));

							echo form_error('username');
							?>
						</div>
						<div class="right-sec">
							<?php
							echo form_input(array('name' => 'name', 'placeholder'=>'Name' , 'value' => set_value('name')));

							echo form_error('name');
							?>
						</div>
						<div class="left-sec">
						<?php
							echo form_input(array('name' => 'email',  'placeholder'=>'Email' , 'value' => set_value('email')));

							echo form_error('email');
							?>
						</div>
						<div class="right-sec">
						<?php
						echo form_input(array('name' => 'ABN', 'class'=>"abn", 'placeholder'=>'ABN' , 'value' => set_value('ABN')));  

						echo form_error('ABN');
						?>
              <p class="err abnErr"></p>
						</div>

					
						<div class="left-sec">
						<?php

						echo form_password(array('name' => 'password', 'class'=>'password', 'placeholder'=>'Password' , 'value' => set_value('password')));

						?>

						<?php 
						echo form_error('password');
						?>
						</div>

						<p class="pwdErr"></p>
						<div class="right-sec">
						<?php 

						echo form_input(array(
						'name'        => 'phone',
						'id'          => 'phone',
						'type'          => 'tel',
						'placeholder'=>'Tel',
						'style'       => 'width:100%',
						'value' => set_value('phone')
						));

						echo form_error('phone'); ?>
                <div class="aps"></div>
						</div>

				
						<div class="left-sec adress-sec">
						<?php 
						echo form_input(array(
						'name'        => 'address',
						'id'          => 'address',
						'placeholder'=>'Address',
						'value'       => set_value('address')
						));

						echo form_error('address');
						?>
						</div>
						<?php 
						echo form_input(array(
						'name'        => 'contry',
						'id'          => 'contry',
						'type'          => 'hidden',
						'style'       => 'width:100%',
						'value' => set_value('contry')
						));

						?>
					</div>

					<!-- country -->
					<div class='row w3-margin-bottom country-section'>

					<div class='col-md-12 col-xs-12 left-sec'>
					<select id="country" name= "country" value = '<?php echo set_value('country');?>' class='form-control'><option value="">-- Country --</option></select>
					</div>
					<p> 
					<?php  echo form_error('country');?></p>
					</div> <!-- end country row -->
					<!-- region -->
					<div class='row w3-margin-bottom country-section'>

					<div class='col-md-12 col-xs-12'>
					<select id="state" name= "state" value = '<?php echo set_value('state');?>' class='form-control'><option value="">-- State --</option></select>
					</div>

					<div class="right-sec">
					<?php   echo form_error('state');?>
					</div>
					</div> <!-- end region row -->
					<!-- city -->
          <div class="col-xs-12 city-d">
            <div class="col-xs-6 city-c">
            <?php
              echo form_input(array('name' => 'city',  'placeholder'=>'City' , 'class'=>'form-control', 'value' => set_value('city')));

              echo form_error('city');
              ?>
            </div>
            <div class="col-xs-6 city-z">
            <?php
            echo form_input(array('name' => 'zipCode', 'class'=>"zipCode form-control", 'placeholder'=>'zip Code' ,  'value' => set_value('zipCode')));  

            echo form_error('zipCode');
            ?>
            </div>

				</div>

					<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo $key;?>"></div>

					<input type="text" class="hiddenRecaptcha required" name="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">

					<?php 
					echo form_error('g-recaptcha-response','<div class="recapcha-section" style="color:red;">','</div>');
					?>
					<div class="sub_to">
					<?php 
					echo form_submit(array('type' => 'submit', 'value' => 'Register','class'=>'submit'));
					?>
					</div>

					<?php 
					echo anchor('login', 'Login', 'class="link-class"');
					?>
				</div>
      <input type="hidden" name="HideCountry" value="<?php echo set_value('HideCountry');?>" class="HideCountry" />
				<?
				echo form_close();
				?>
			</div>
		</div>
	</div>
</section>
  
<script>

function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};

 $(document).ready( function (){
  var errGot;

$('#country').on('change', function (){

var newOne = $( "#country option:selected" ).text();
$('.HideCountry').val(newOne);

});


/************************************************/
    $.validator.addMethod('password', function(value, element) {
            return this.optional(element) || (value.match(/[a-z]/) && value.match(/[A-Z]/) && value.match(/[0-9]/) && value.match(/[!@#$%&*()_+=-|<>?{}~]/));
        },
        'Password must contain at least one numeric and one uppercase letter and one lowercase letter  and one special character and at least 8 min length.');


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
                required: true
            },
              email: {
                required: true,
                  email: true,
                  remote: "check_email_exists"
            },
            address : {
                required: true
            },
            password: {
                required: true,
                minlength: 8,
                password : true
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
               address : {
                 required: "Address is required"
               },
            password: {
                required: "Password is required",
                minlength: "Password should be at least {0} characters long"
            },
            hiddenRecaptcha:{
              required : "The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?"
            }

        }
    });

$('form').submit( function (e){

var valid = $("form").valid();
if(valid){

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

$(document).ready(function() {
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
</script>


<script>
$(document).ready(function() {
  //-------------------------------SELECT CASCADING-------------------------//
  var selectedCountry = (selectedRegion = selectedCity = "");
  // This is a demo API key that can only be used for a short period of time, and will be unavailable soon. You should rather request your API key (free)  from http://battuta.medunes.net/
  var BATTUTA_KEY = "8e05aa3b341b0e0b55301fe708c1b28b";
  // Populate country select box from battuta API
  url =
    "https://battuta.medunes.net/api/country/all/?key=" +
    BATTUTA_KEY +
    "&callback=?";
  // EXTRACT JSON DATA.
  $.getJSON(url, function(data) {
    console.log(data);
    $.each(data, function(index, value) {
      // APPEND OR INSERT DATA TO SELECT ELEMENT.
      $("#country").append(
        '<option value="' + value.code + '">' + value.name + "</option>"
      );
    });
  });
  // Country selected --> update region list .
  $("#country").change(function() {
    selectedCountry = this.options[this.selectedIndex].text;
    countryCode = $("#country").val();
    // Populate country select box from battuta API
    url =
      "https://battuta.medunes.net/api/region/" +
      countryCode +
      "/all/?key=" +
      BATTUTA_KEY +
      "&callback=?";
    $.getJSON(url, function(data) {
      $("#region option").remove();
      $.each(data, function(index, value) {
        // APPEND OR INSERT DATA TO SELECT ELEMENT.
        $("#region").append(
          '<option value="' + value.region + '">' + value.region + "</option>"
        );
      });
    });
  });
  // Region selected --> updated city list
  $("#region").on("change", function() {
    selectedRegion = this.options[this.selectedIndex].text;
    // Populate country select box from battuta API
    countryCode = $("#country").val();
    region = $("#region").val();
    url =
      "https://battuta.medunes.net/api/city/" +
      countryCode +
      "/search/?region=" +
      region +
      "&key=" +
      BATTUTA_KEY +
      "&callback=?";
    $.getJSON(url, function(data) {
      console.log(data);
      $("#city option").remove();
      $.each(data, function(index, value) {
        // APPEND OR INSERT DATA TO SELECT ELEMENT.
        $("#city").append(
          '<option value="' + value.city + '">' + value.city + "</option>"
        );
      });
    });
  });
  // city selected --> update location string
  $("#city").on("change", function() {
    selectedCity = this.options[this.selectedIndex].text;
   // $("#location").html(
      "Locatation: Country: " +
        selectedCountry +
        ", Region: " +
        selectedRegion +
        ", City: " +
        selectedCity
   // );
  });
});

$(document).ready(function() {
  populateCountries("country", "state","");
});
</script>
