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

                echo form_error('username');
                ?>
              </div>


              <div class="form-group col-md-6">
                <select id="bsntype" name="bsntype" class='form-control'>
                  <option value="">Select Business Type</option>
                  <option value="SoleTrader">Sole Trader</option>
                  <option value="Company">Company</option>
                  <option value="Partnership">Partnership </option>
                  <option value="Trust">Trust </option>
                  <?php echo form_error('bsntype'); ?>
                </select>

              </div>
            </div>
            <!-- end of first form-row -->
            <!-- second form-row -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <?php
                echo form_input(array('name' => 'name', 'placeholder' => 'Name', 'value' => set_value('name')));

                echo form_error('name');
                ?>
              </div>
              <div class="form-group col-md-6">
                <?php
                echo form_input(array('name' => 'title', 'placeholder' => 'Title'));

                echo form_error('title');
                ?>
              </div>
            </div>

            <!--end of second form-row -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <?php
                echo form_input(array('name' => 'email',  'placeholder' => 'Email', 'value' => set_value('email')));

                echo form_error('email');
                ?>
              </div>
              <div class="form-group col-md-6">
                <?php
                echo form_input(array('name' => 'ABN', 'class' => "abn", 'placeholder' => 'ABN/ACN', 'id' => 'abn1', 'value' => set_value('ABN')));

                echo form_error('ABN');
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


                <?php
                echo form_error('password');
                ?>
                <p class="pwdErr"></p>
              </div>


              <div class="form-group col-md-6">

                <?php
                echo "<span toggle='#r-password-field' style='position:absolute; top:20px;right:20px;' class='fa fa-fw fa-eye field_icon toggle-password2'></span>
";
                echo form_password(array('name' => 'Rpassword', 'class' => 'password', 'placeholder' => 'Re-enter Password', 'id' => 'password2'));

                ?>

                <?php
                echo form_error('password');
                ?>



              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <?php

                echo form_input(array(
                  'name'        => 'Tphone',
                  'id'          => 'Telphone',
                  'type'          => 'tel',
                  'placeholder' => 'Telephone',
                  'style'       => 'width:100%',
                  'value' => set_value('phone')
                ));

                ?>
              </div>



              <div class="form-group col-md-6">

                <?php

                echo form_input(array(
                  'name'        => 'Mphone',
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

              echo form_error('address');
              ?>
            </div>


            <!-- country -->


            <!-- <div class='col-md-6 form-group col-md-6 '>
					<select id="country" name= "country" value = '<?php echo set_value('country'); ?>' class='form-control'><option value="">-- Country --</option></select>
          </div>
          <p> 
					<?php echo form_error('country'); ?></p> -->
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

              <?php echo form_error('state'); ?>



              <!-- region -->
              <!-- city -->

              <div class="form-group col-md-6 ">
                <?php
                echo form_input(array('name' => 'city',  'placeholder' => 'City/Town/Area', 'class' => 'form-control', 'value' => set_value('city')));

                echo form_error('city');
                ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <?php
                echo form_input(array('name' => 'zipCode', 'class' => "zipCode form-control", 'placeholder' => 'Post Code',  'value' => set_value('zipCode')));

                echo form_error('zipCode');
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
              <?php for ($i = 1; $i <= 5; $i++) {
                ?>
                <div class="form-row">


                  <div class="form-group col-md-3"><select style="border-radius:25px" class="form-control" name="category_<?php echo $i ?>" required>
                      <option value="">Select Category</option>
                      <?php
                        if (!empty($category)) {
                          foreach ($category as $categoryValue) {
                            ?>
                          <option <?php echo set_select('category', $categoryValue->id); ?> value="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?>
                          </option>
                      <?php
                          }
                        } ?>
                    </select> </div>

                  <div class="form-group col-md-3"><?php

                                                      echo form_input(array('style' => 'border-radius:25px', 'name' => 'product_' . $i, 'placeholder' => 'Product Name', 'required' => 'required'));

                                                      echo form_error('username'); ?> </div>

                  <div class="form-group col-md-3"><?php

                                                      echo form_input(array('style' => 'border-radius:25px', 'name' => 'brand_' . $i, 'placeholder' => 'Brand Name'));

                                                      echo form_error('username'); ?> </div>

                  <div class="form-group col-md-3"><?php

                                                      echo form_input(array('style' => 'border-radius:25px', 'name' => 'itemno_' . $i, 'placeholder' => 'Item/Serial Number'));

                                                      echo form_error('username'); ?> </div>

                </div><?php
                      } ?>

            </div>
            <!-- end of master list div -->
          </div>

          <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo $key; ?>"></div>

          <input type="text" class="hiddenRecaptcha required" name="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">

          <?php
          echo form_error('g-recaptcha-response', '<div class="recapcha-section" style="color:red;">', '</div>');
          ?>
          <div class="sub_to">
            <?php
            echo form_submit(array('type' => 'submit', 'value' => 'Register', 'class' => 'submit'));
            ?>
          </div>

          <!-- <?php
                echo anchor('login', 'Login', 'class="link-class"');
                ?> -->
        </div>
        <input type="hidden" name="HideCountry" value="<?php echo set_value('HideCountry'); ?>" class="HideCountry" />
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
        Tphone: {
          required: true
        },
        title: {
          required: true
        },
        bsntype: {
          required: true
        },
        Mphone: {
          required: true
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
        form: {
          required: true,

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
        Mphone: {
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
        form: {

          required: "Form is required",

        }

      }
    });


    $('.abn').on('keyup', function() {
      var val = $('.abn').val();


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



