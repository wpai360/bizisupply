<style>
  input#phone {
    padding-left: 47px !important;
  }
</style>
<style type="text/css">
  #hiddenRecaptcha {
    visibility: hidden;
  }

  .master_info {
    position: relative;
    display: inline-block;
    /* If you want dots under the hoverable text */
  }

  /* Tooltip text */
  .master_info .info_detail {
    visibility: hidden;
    width: 120px;
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
  }

  /* Show the tooltip text when you mouse over the tooltip container */
  .master_info:hover .info_detail {
    visibility: visible;
  }
</style>


<section class="Register-form-sec">
  <div class="container">
    <div class="form-row">
      <div class="login-section-heading-register">
<?php
echo form_open();
echo '<p class="success" style="text-align:center">';

if ($this->session->flashdata('msg')) {
  echo $this->session->flashdata('msg');
}
echo '</p>';
?>
        <div class="main_register_form">
          <h2 class="admin-register-section">Become a Buyer</h2>
          <h5 class="admin-register-section" style="text-align:center">ALL YOUR INFORMATION IS CONFIDENTIAL IN OUR PLATFORM</h5>

          <div class="register_top">
<?php
if ($error) {
  echo '<p class="error">' . $error . '</p>';
}
?>
            <!-- first form-row -->

            <div class="form-row">
              <div class="form-group col-md-6">
<?php

echo form_input(array('name' => 'username', 'placeholder' => 'Business Name', 'value' => set_value('username')));

?>
              </div>


              <div class="form-group col-md-6">
                <select id="bsntype" name="bsntype" class='form-control'>
                  <option value="">Select Business Type</option>
                  <option value="SoleTrader">Sole Trader</option>
                  <option value="Company">Company</option>
                  <option value="Partnership">Partnership </option>
                  <option value="Trust">Trust </option>
                </select>

              </div>
            </div>
            <!-- end of first form-row -->
            <!-- second form-row -->
            <div class="form-row">
              <div class="form-group col-md-6">
<?php
echo form_input(array('name' => 'name', 'placeholder' => 'Name', 'value' => set_value('name')));


?>
              </div>
              <div class="form-group col-md-6">
<?php
echo form_input(array('name' => 'title', 'placeholder' => 'Title'));
?>
              </div>
            </div>

            <!--end of second form-row -->
            <div class="form-row">
              <div class="form-group col-md-6">
<?php
echo form_input(array('name' => 'email',  'placeholder' => 'Email', 'value' => set_value('email')));


?>
              </div>
              <div class="form-group col-md-6">
<?php
echo form_input(array('name' => 'ABN', 'class' => "abn", 'placeholder' => 'ABN/ACN', 'id' => 'abn1', 'value' => set_value('ABN')));


?>
                <p class="err abnErr"></p>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
<?php
echo "<span toggle='#password-field' style='position:absolute; top:20px;right:20px;' class='fa fa-fw fa-eye field_icon toggle-password'></span>
";
echo form_password(array('name' => 'password', 'class' => 'password', 'placeholder' => 'Password', 'id' => 'password', 'value' => set_value('password')));

?>



                <p class="pwdErr"></p>
              </div>


              <div class="form-group col-md-6">

<?php
echo "<span toggle='#r-password-field' style='position:absolute; top:20px;right:20px;' class='fa fa-fw fa-eye field_icon toggle-password2'></span>
";
echo form_password(array('name' => 'Rpassword', 'class' => 'password', 'placeholder' => 'Re-enter Password', 'id' => 'password2'));

?>




              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
<?php

echo form_input(array(
  'name'        => 'tPhone',
  'id'          => 'Telphone',
  'type'        => 'tel',
  'placeholder' => 'Telephone',
  'style'       => 'width:100%',
  'value' => set_value('phone')
));


?>
              </div>



              <div class="form-group col-md-6">

<?php

echo form_input(array(
  'name'        => 'mPhone',
  'id'          => 'mobilephone',
  'type'          => 'tel',
  'placeholder' => 'Mobile phone',
  'style'       => 'width:100%',
  'value' => set_value('phone')
));



?>


              </div>
            </div>

            <div class=" adress-sec">
<?php
echo form_input(array(
  'name'        => 'address',
  'id'          => 'address',
  'placeholder' => 'Address',
  'value'       => set_value('address')
));


?>
            </div>
            <!-- country -->
            <div class="form-row">
              <div class=' form-group col-md-6'>

                <select id="state" name="state" value='<?php echo set_value('state'); ?>' class='form-control'>
                  <option value="">Select State</option>
                  <option value="NSW">New South Wales</option>
                  <option value="QLD">Queensland </option>
                  <option value="SA">South Australia </option>
                  <option value="TSM">Tasmania </option>
                  <option value="VCT">Victoria </option>
                  <option value="WA">Western Australia </option>
                  <option value="NT">Northern Territory</option>
                  <option value="ACL">Australian Capital Territory </option>
                </select>
              </div>
              <!-- region -->
              <!-- city -->

              <div class="form-group col-md-6 ">
<?php
echo form_input(array('name' => 'city',  'placeholder' => 'City/Town/Area', 'class' => 'form-control', 'value' => set_value('city')));


?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
<?php
echo form_input(array('name' => 'zipCode', 'class' => "zipCode form-control", 'placeholder' => 'Post Code',  'value' => set_value('zipCode')));


?>
              </div>
            </div>


            <div class="col-md-12">

              <select id="farm" name="farm" class='form-control' style="">
                <option value="">Select Your Farm/Business Type</option>
                <option value="1">Animal products(Beef, Lamb, Pork) </option>
                <option value="2">Crops </option>
                <option value="3">Cotton </option>
                <option value="4">Dairy </option>
                <option value="5">Fisheries </option>
                <option value="6">Fruit and Nuts </option>
                <option value="7">Horticulture</option>
                <option value="8">Seaweeds </option>
                <option value="9">Viticulture </option>
                <option value="10"> Wool</option>
              </select>

            </div>




            <!-- start of master list div -->
            <div class="master_list" style="display:none">
              <div style="text-align:center;" class="form-row city-z">
                <label for="">Create your master list</label>
                <i class="fas fa-info-circle master_info">
                  <span class="info_detail">What is master list: </span>
                </i>

              </div>
<?php for ($i = 1; $i <= 10; $i++) {
?>
                <div class="form-row">


                  <div class="form-group col-md-3"><select style="border-radius:25px" class="form-control" name="category_<?php echo $i ?>">
                      <option value="">Select Category</option>
<?php
if (!empty($category)) {
  foreach ($category as $categoryValue) {
?>
                          <option <?php echo set_select('category', $categoryValue->id); ?> value="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
                          </option>
<?php
  }
};

?>
                    </select> </div>

                    <div class="form-group col-md-3"><?php

echo form_input(array('style' => 'border-radius:25px', 'name' => 'product_' . $i, 'placeholder' => 'Product Name'));
?> </div>

  <div class="form-group col-md-3"><?php

echo form_input(array('style' => 'border-radius:25px', 'name' => 'brand_' . $i, 'placeholder' => 'Brand Name')); ?> </div>

  <div class="form-group col-md-3"><?php

  echo form_input(array('style' => 'border-radius:25px', 'name' => 'itemno_' . $i, 'placeholder' => 'Item/Serial Number')); ?> </div>

  </div><?php
} ?>

            </div>
            <!-- end of master list div -->
          </div>

          <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo $key; ?>"></div>

          <input type="text" class="hiddenRecaptcha required" name="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">


          <div class="sub_to">
<?php
  echo form_submit(array('type' => 'submit', 'value' => 'Register', 'class' => 'submit'));
?>
          </div>
        </div>

<?php
echo form_close();
?>
      </div>
    </div>
  </div>
</section>

<script>
let acnValidate = false;
$(function() {
  $("#farm").change(function() {
    $('.master_list').fadeIn();
  });
});

$(document).on('click', '.toggle-password', function() {

  $(this).toggleClass("fa-eye fa-eye-slash");

  var input = $("#password");
  input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
});

$(document).on('click', '.toggle-password2', function() {

  $(this).toggleClass("fa-eye fa-eye-slash");

  var input = $("#password2");
  input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
});

function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};

function acnAjaxCall(acn) {
  $.ajaxSetup({
  data: csrfData
});
$.ajax({

url: "https://abr.business.gov.au/json/AbnDetails.aspx?abn=" + acn + "&guid=f43417c6-f163-4db0-987f-becb873c84d7",
  dataType: "jsonp",
  success: function(result) {
    if (result.Message == '') {
      acnValidate = true;
    } else {
      acnValidate = false
    };
  }


})
}


$(document).ready(function() {
  var errGot;
  //regular expression validation for the password
  $.validator.addMethod('password', function(value, element) {
    return this.optional(element) || (value.match(/[a-z]/) && value.match(/[A-Z]/) && value.match(/[0-9]/) && value.match(/[!@#$%&*()_+=-|<>?{}~]/));
  },
    'Password must contain at least one numeric and one uppercase letter and one lowercase letter  and one special character and at least 8 min length.');

  //regular expression validation for the landline telphone number
  $.validator.addMethod('tPhone', function (value) {
    return /^\(?(?:\+?61|0)(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}$/.test(value);
  }, 'Please enter a valid telephone number');


  //reular expression validation for the mobilephone number

  $.validator.addMethod('mPhone', function (value) {
    return /^(?:\+?61|0)4 ?(?:(?:[01] ?[0-9]|2 ?[0-57-9]|3 ?[1-9]|4 ?[7-9]|5 ?[018]) ?[0-9]|3 ?0 ?[0-5])(?: ?[0-9]){5}$/.test(value);
  }, 'Please enter a valid mobile phone number');


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
    tPhone: {
    required: true,
    tPhone: true
  },
    title: {
    required: true
  },
    bsntype: {
    required: true
  },
    mPhone: {
    required: true,
    mPhone:true
  },
    username: {
    required: true
  },
    name: {
    required: true
  },
    ABN: {
    required: true,
      number: true,

  },
    email: {
    required: true,
      email: true,
      remote: "check_email_exists"
  },
    address: {
    required: true
  },
    password: {
    required: true,
      minlength: 8,
      password: true
  },
    Rpassword: {
    required: true,
      equalTo: "#password"
  },
    farm: {
    required: true,
  },
    category_1: {
    required: true
  },
    category_2: {
    required: true
  },
    category_3: {
    required: true
  },
    category_4: {
    required: true
  },
    category_5: {
    required: true
  },
    product_1: {
    required: true
  },
    product_2: {
    required: true
  },
    product_3: {
    required: true
  },
    product_4: {
    required: true
  },
    product_5: {
    required: true
  },
    hiddenRecaptcha: {
    required: function() {
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
    required: "Postcode is required"
  },
    state: {
    required: "State is required"
  },
    bsntype: {
    required: "Business type is required"
  },
    title: {
    required: "Title is required"
  },
    city: {
    required: "City is required"
  },
    phone: {
    required: "TelPhone is required"
  },
    mPhone: {
    required: "MobilePhone is required"
  },
    username: {
    required: "Business Name is required"
  },
    name: {
    required: "Name is required"
  },
    ABN: {
    required: "ABN/ACN is required"
  },
    email: {
    required: "Phone is required",
      email: "E-mail formate is not valid",
      remote: "E-mail already exists."
  },
    address: {
    required: "Address is required"
  },
    password: {
    required: "Password is required",
      minlength: "Password should be at least {0} characters long"
  },
    Rpassword: {
    equalTo: "Please re-enter the same password again"
  },
    hiddenRecaptcha: {
    required: "The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?"
  },
    farm: {
    required: "Farm is required",
  },
    category_1: {
    required: "Please select a category"
  },
    category_2: {
    required: "Please select a category"
  },
    category_3: {
    required: "Please select a category"
  },
    category_4: {
    required: "Please select a category"
  },
    category_5: {
    required: "Please select a category"
  },
    product_1: {
    required: "Please input a product name"
  },
    product_2: {
    required: "Please input a product name"
  },
    product_3: {
    required: "Please input a product name"
  },
    product_4: {
    required: "Please input a product name"
  },
    product_5: {
    required: "Please input a product name"
  },


  }
  });


  $('.abn').on('keyup', function() {
    var val = $('.abn').val();

    $.ajaxSetup({
    data: csrfData
    });
    $.ajax({

    url: "https://abr.business.gov.au/json/AbnDetails.aspx?abn=" + val + "&guid=f43417c6-f163-4db0-987f-becb873c84d7",
      dataType: "jsonp",
      success: function(result) {



        var val = $('.abn').val();
        if (result) {
          if (val != '' || val != null) {

            if (val.length == 11 && result.Message == '') {
              $('.abnErr').text('');
              return true;
            } else if (val.length == 9) {
              let acn = val.replace(/^/, '88');
              acnAjaxCall(acn);

              setTimeout(function() {
                if (acnValidate == true) {
                  $('.abnErr').text('');
                } else($('.abnErr').text('please enter a correct ABN/ACN number'));

                return false;
              }, 500);



            } else {
              $('.abnErr').text('please enter a correct ABN/ACN number');
              return false;
            }


          } else {
            $('.abnErr').text('please enter a correct ABN/ACN number');
            return false;
          }
        }
      }
    });
  });


});
</script>
