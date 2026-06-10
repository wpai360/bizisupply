<style type="text/css">
  .hidenFields {
    display: none;
  }

  input[type="file"] {
    display: block;
  }

  .master_info {
    position: relative;
    display: inline-block;
  }


  .master_info .info_detail {
    visibility: hidden;
    width: 120px;
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
    z-index: 1;
  }
  /* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 20%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
</style>
<!-- Main content -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/user/avatar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.css" integrity="sha512-/lf2y2d7SFJau+G4TGgXCWJOAUxyDmJD+Tb35CdqoMZAQ8eNX0sgDKISlcxCtGpEAuyb1Q5vGPfB1XMettf0FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.css" integrity="sha512-QwSfZXX2w9SDWSNBKpEos673LXajTJpYKwtG+zJNP9zHsgRrWtNSx1gKVyB6qWUP4wJ0Hfnk9KJzrB6IKrXmEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="content">





  <div class="tab-pane" id="profile">

    <?php

    if ($this->session->flashdata('msg')) {
      echo '<p class="text-success">' . $this->session->flashdata('msg') . '</p>';
    }
    //echo $this->session->all_userdata('suppler_image');

    $this->db->from('users');
    $this->db->select('users.supplier_image');
    $this->db->where("users.id = $user->id");
    $querys = $this->db->get()->result();

    ?>

      <div class="col-md-8 text-center">
        <div class="image">
          <?php 
          if ($querys[0]->supplier_image) {
            $src = base_url('uploads/' . $querys[0]->supplier_image);
           } else {
            $src = base_url('assets/theme/dist/img/user2-160x160.jpg');
           }
          ?>
        </div>
        <a href="javascript:document.querySelector('input#img').click()" aria-label="Change Profile Picture">
                    <input type="file" id="img" name="img" accept="image/*" style="display:none;" onchange="loadFile(event)">
                    <div class="profile-pic" id="avatarImg" style="background-image: url('<?php echo $src?>')" >
                        <span class="glyphicon glyphicon-camera"></span>
                        <span>Upload a new avatar</span>
                    </div>
        </a>
      </div>

    <div class="row mt-3">



      <div class="col-10">

        <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="profile-image d-none">

            <?php echo form_open_multipart('welcome/do_upload'); ?>
            <label for="inputName" class="control-label">Profile Image</label>
            <input class="supplier-image" type="file" name="image2" value="" id='1'>
            <input type="hidden" name="old_supplier_Image" value="<?php echo $querys[0]->supplier_image; ?>">
            <img id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=upload+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;"></i>
          </div>
          <div class="form-group row row">

            <div class="col-md-6">

            <label for="inputName" class="control-label">Business name</label>
              <input autocomplete="off" type="text" value="<?php echo $user->username; ?>" class="form-control" placeholder="username" name="username">
              <?php echo form_error('username'); ?>
            </div>




           <div class="col-md-6">

            <label for="inputName" class=" control-label">ABN/ACN</label>
              <input type="text" value="<?php echo $user->ABN; ?>" class="form-control abn" placeholder="ABN" name="ABN" autocomplete="off">
              <?php echo form_error('ABN'); ?>
              <p class="err abnErr"></p>
            </div>
          </div>


        

          <div class="form-group row">

            <div class="col-md-6">

            <label for="inputEmail" class=" control-label">Business Email</label>
              <input autocomplete="off" type="email" value="<?php echo $user->email; ?>" class="form-control" name="email" id="inputEmail" placeholder="Email">
              <?php echo form_error('email'); ?>
            </div>
            

           
            
            <div class="col-md-6">

            <label for="inputName" class=" control-label">Business Type</label>
              <select id="bsntype" name="bsntype" class='form-control'>
                <option value="<?php echo $user->bsn_type; ?>"> <?php echo $user->bsn_type; ?> </option>
                <option value="SoleTrader">Sole Trader</option>
                <option value="Company">Company</option>
                <option value="Partnership">Partnership </option>
                <option value="Trust">Trust </option>
                <?php echo form_error('bsntype'); ?>
              </select>



            </div>
          </div>


          <div class="form-group row">



          <div class="col-md-6">
           <label for="inputName" class=" control-label">Name</label>
              <input autocomplete="off" type="text" value="<?php echo $user->name; ?>" class="form-control" placeholder="Name" name="name">
              <?php echo form_error('name'); ?>
            </div>

           <div class="col-md-6">

            <label for="inputName" class=" control-label">Title</label>
              <input autocomplete="off" type="text" name="title" class="form-control" id="title" value="<?php echo $user->title; ?>">
              <?php echo form_error('title'); ?>
              <!-- invalid number message -->


            </div>


          </div>


          <div class="form-group row">
            <div class="col-md-6">
            <label for="inputName" class="  control-label">Address</label>
              <input autocomplete="off" type="text" name="address" class="form-control" value="<?php echo $user->address; ?>">
              <?php echo form_error('address'); ?>
            </div>

          <div class="col-md-6">
              <label for="inputName" class=" control-label">City</label>
              <input type="text" id="city" name="city" class="form-control" value="<?php echo $user->city; ?>" autocomplete="off">
              <?php echo form_error('city'); ?>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="inputName" class="control-label">State</label>
              <select id="state" name="state" value='' class='form-control'>
                <option value="<?php echo $user->state; ?>"><?php echo $user->state; ?></option>
                <option value="NSW">New South Wales</option>
                <option value="QLD">Queensland </option>
                <option value="SA">South Australia </option>
                <option value="TSM">Tasmania </option>
                <option value="VCT">Victoria </option>
                <option value="WA">Western Australia </option>
                <option value="NT">Northern Territory</option>
                <option value="ACL">Australian Capital Territory </option>
              </select>

              <?php echo form_error('state'); ?>
            </div>




            <div class="col-md-6">
              <label for="inputName" class=" control-label">PostCode</label>
              <?php
              echo form_input(array(
                'name'        => 'zipCode',
                'id'          => 'zipCode',
                'type'          => 'text',
                'placeholder' => 'Postcode',
                'class'     => 'form-control',
                'style'       => 'width:100%',
                'value' =>   $user->postcode
              ));

              echo form_error('zipCode');
              ?>

            </div>

        </div>


          <div class="form-group row">
            <div class="col-md-6">

              <label for="inputName" class=" control-label">Mobile Phone</label>

                <input autocomplete="off" type="tel" name="Mphone" class="form-control" id="" value="<?php echo $user->mob_phone; ?>">
                <!-- invalid number message -->
                <div class="aps"></div>
                <?php echo form_error('Mphone'); ?>
            </div>

               

            <div class="col-md-6">
             <label for="inputName" class=" control-label">Business TelePhone</label>

                <div class="">
                  <input autocomplete="off" type="tel" name="Tphone" class="form-control" id="Tphone" value="<?php echo $user->tel_phone; ?>">
                  <!-- invalid number message -->
                  <div class="aps"></div>
                  <?php echo form_error('Tphone'); ?>
                </div>
            </div>
          
            </div>

            <div class="form-group row">
              <div class="col-md-6">



              <label for="inputName" class=" control-label">Website</label>
              <input type="text" id="website" placeholder="website" name="website" class="form-control" value="<?php echo $user->businessWeb; ?>" autocomplete="off">
              <?php echo form_error('website'); ?>

            </div>
              <div class="col-md-6">

              <label for="inputName" class=" control-label">Years in Business</label>
              <input type="number" id="website" placeholder="Years in business" name="website" class="form-control" value="<?php echo $user->businessWeb; ?>" autocomplete="off">
              <?php echo form_error('website'); ?>

            </div>
            </div>

          <div class="form-group row">
 




<div class="col-md-12">
                <?php $payment = $user->payment_term;

                $payments = explode(',', $payment);

                ?>


                <div class="form-group ">
                  <label for="inputName" class=" control-label">Accept Payment Method</label><br><br>

                  <input type="checkbox" id="paypalEmailPhone" onchange="valueChanged()" name="payment_term[]" value="1" <?php if (in_array("1", $payments)) {
                                                                                                                            echo "checked";
                                                                                                                          } else {
                                                                                                                            echo "";
                                                                                                                          } ?> <?php echo set_checkbox('payment_term', '1'); ?>> <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/26_Grey_PayPal_Pill_Button.png" alt="PayPal" width="70" height="auto" /><br><br>
                </div>

                <div class="form-group  hidenFields  paypalFields">


                  <label for="exampleInputEmail1"> PayPal Account(Email or Phone number) </label>
                  <input type="text" name="paypalEmail" class="form-control" id="paypalEmail" placeholder="e.g. seamaszhou@gmail.com or 0451951026" value="<?php echo $user->paypalEmail; ?>">
                  <?php echo form_error('paypalEmail'); ?>
                </div>


                <div class="form-group ">
                  <input type="checkbox" id="bpayBillerCode" onchange="valueChanged()" name="payment_term[]" value="2" <?php if (in_array("2", $payments)) {
                                                                                                                          echo "checked";
                                                                                                                        } else {
                                                                                                                          echo "";
                                                                                                                        } ?> <?php echo set_checkbox('payment_term', '2'); ?>> <img src="<?php echo base_url('images/BPAY_2012_LAND_BLUE.png') ?>" width="50" height="auto"><br>


                </div>
                <div class="form-group  hidenFields BpayFields">
                  <label for="exampleInputEmail1">Bpay Account(Biller code)</label>
                  <input type="text" name="billerCode" class="form-control" id="billerCode" placeholder="e.g. 959197" value="<?php echo $user->billerCode; ?>">
                  <?php echo form_error('billerCode'); ?>
                </div>

                <div class="form-group ">

                  <input type="checkbox" id="payidABN" onchange="valueChanged()" name="payment_term[]" value="3" <?php if (in_array("3", $payments)) {
                                                                                                                    echo "checked";
                                                                                                                  } else {
                                                                                                                    echo "";
                                                                                                                  } ?> <?php echo set_checkbox('payment_term', '3'); ?>> <img src="<?php echo base_url('images/ML008_PayID.png') ?>" width="70" height="auto"><br>

                </div>


                <div class="form-group  hidenFields ABNNumber">
                  <label for="exampleInputEmail1">Business PayID</label>
                  <input type="text" name="abnNumber" class="form-control" id="abnNumber" placeholder="e.g. 959197" value="<?php echo $user->abnNumber; ?>">
                  <?php echo form_error('abnNumber'); ?>
                </div>


                <div class="form-group ">
                  <input type="checkbox" id="bankTransfer" onchange="valueChanged()" name="payment_term[]" value="4" <?php if (in_array("4", $payments)) {
                                                                                                                        echo "checked";
                                                                                                                      } else {
                                                                                                                        echo "";
                                                                                                                      } ?> <?php echo set_checkbox('payment_term', '4'); ?>> <img src="<?php echo base_url('images/transfer.png') ?>" width="70" height="auto">
                </div>
                <!-- =================== 'Bank transfer' ========================== -->
                <div class="form-group  hidenFields bankTransferField">
                  <label for="exampleInputEmail1">BSB number</label>
                  <input type="text" name="bsbNumber" class="form-control" id="bsbNumber" placeholder="e.g. 064184" value="<?php echo $user->bsbNumber; ?>">
                  <?php echo form_error('bsbNumber'); ?>
                </div>

                <div class="form-group  hidenFields bankTransferField">
                  <label for="exampleInputEmail1">Bank accounnt</label>
                  <input type="text" name="bankAccount" class="form-control" id="bankAccount" placeholder="e.g. 10912222" value="<?php echo $user->bankAccount; ?>">
                  <?php echo form_error('bankAccount'); ?>
                </div>


              </div>
          <div class="col-md-12">
              <div class="">


                <label for="inputName" class=" control-label">About your business</label>
                <textarea type="text" maxlength="500" name="description" class="form-control" placeholder="Describe about your business" id="description">
          <?php if (!is_null($user->description)) {
            echo trim($user->description);
          } ?>
          </textarea>
                <h6 id="count_message"></h6>
              </div>
            </div>
</div>



            <div class="form-group row">
              <div class="col-offset-2 col-10">
                <button type="submit" class="btn btn-success submit">Update Your Profile</button>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
              <div class="row">
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Snow" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>  
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>  
              <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Belarus_3022.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
              </div>  
            </div>

<div class="container">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js" integrity="sha512-2R4VJGamBudpzC1NTaSkusXP7QkiUYvEKhpJAxeVCqLDsgW4OqtzorZGpulE3eEA7p++U0ZYmqBwO3m+R2hRjA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js" integrity="sha512-SxO0cwfxj/QhgX1SgpmUr0U2l5304ezGVhc0AO2YwOQ/C8O67ynyTorMKGjVv1fJnPQgjdxRz6x70MY9r0sKtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(function() {
      $('input[type=file]').change(function() {
        var val = $(this).val();
        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
          case 'jpg':
          case 'png':
            showimagepreview(this);
            break;
          case 'gif':
          case 'jpeg':
            showimagepreview(this);
            break;
          default:
            $('#errorimg').html("Invalid Photo");
            break;
        }
      });

      function showimagepreview(input) {
        if (input.files && input.files[0]) {
          var filerdr = new FileReader();
          filerdr.onload = function(e) {
            $('#cu' + input.id).attr('src', e.target.result);
          };
          filerdr.readAsDataURL(input.files[0]);
        }
      }
    });
    $("#image1").click(function() {
      document.getElementById("1").value = null;
      $("#cu1").attr("src", "https://dummyimage.com/300x200/000/fff.jpg&text=upload+image");
    });
  </script>




  <script type="text/javascript">
    function valueChanged() {
      if ($('#paypalEmailPhone').is(":checked"))
        $(".paypalFields").show();
      else
        $(".paypalFields").hide();

      if ($('#bpayBillerCode').is(":checked"))
        $(".BpayFields").show();
      else
        $(".BpayFields").hide();

      if ($('#payidABN').is(":checked"))
        $(".ABNNumber").show();
      else
        $(".ABNNumber").hide();

      if ($('#bankTransfer').is(":checked"))
        $(".bankTransferField").show();
      else
        $(".bankTransferField").hide();

    }
    $(document).ready(function() {

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

    $(document).ready(function() {
      var errGot;


      $('.toggler').on('click', function() {
        $(this).parent().children().toggle(); //swaps the display:none between the two spans
        $(this).parent().parent().find('.toggled_content').slideToggle(); //swap the display of the main content with slide action

      });



      $('#country').on('change', function() {

        var newOne = $("#country option:selected").text();
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
          username: {
            required: true
          },
          name: {
            required: true
          },
          ABN: {
            required: false
          },
          paypalEmail: {
            email: true,
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
            required: "Pin is required"
          },
          state: {
            required: "State is required"
          },
          city: {
            required: "City is required"
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
          paypalEmail: {
            required: "Email is required",
            email: "E-mail formate is not valid",
          },

          hiddenRecaptcha: {
            required: "The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?"
          }

        }
      });

      $('form').submit(function(e) {

        var valid = $("form").valid();
        if (valid) {

          if ($('#password').val() != 'password') {
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


        }
      });
      /**************************************************/






      $('.abn').on('keyup', function() {
        var val = $(this).val();
        var guid = 'f43417c6-f163-4db0-987f-becb873c84d7';
        $.ajax({
          url: "https://abr.business.gov.au/json/AbnDetails.aspx?abn=" + val + "&callback=callback&guid=" + guid,
          dataType: "jsonp",
          success: function(result) {
            console.log(val);
            console.log(result);
            if (result) {
              if (result.Abn == '') {
                errGot = false;
                var msg = result.Message;
                $('.abnErr').text(msg);
              } else {
                $('.abnErr').text('');
                errGot = true;
              }
            }
          }
        });
      });


    });
  </script>
  <script>
    $(document).ready(function() {
      $('input[type="file"]').change(function() {
        var file = $(this).val();
        var exts = ['jpg', 'jpeg', 'gif', 'png'];

        // first check if file field has any value
        if (file) {
          // split file name at dot
          var get_ext = file.split('.');
          // reverse name to check extension
          get_ext = get_ext.reverse();

          // check file type is valid as given in 'exts' array
          if ($.inArray(get_ext[0].toLowerCase(), exts) > -1) {
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
