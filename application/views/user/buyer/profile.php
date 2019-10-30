<style>
  .hidenFields {
    display: none;
  }

  input[type="file"] {
    display: block;
  }

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

    z-index: 1;
  }

  /* Show the tooltip text when you mouse over the tooltip container */
  .master_info:hover .info_detail {
    visibility: visible;
  }


  textarea {
    resize: vertical;
    min-height: 100px;
  }

  #bp_popup {
    width: 160px;
    text-align: center;
    background-color: #555;
    color: #fff;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
  }
</style>



<!-- Main content -->
<section class="content">









  <div class="tab-pane" id="profile">

    <?php

    if ($this->session->flashdata('msg')) {
      echo '<p class="text-success">' . $this->session->flashdata('msg') . '</p>';
    }


    $this->db->from('users');
    $this->db->select('users.buyer_image');
    $this->db->where("users.id = $user->id");
    $querys = $this->db->get()->result();
    //$querys[0]->buyer_image; 


    ?>

    <div class="row mt-3">

      <div class="col-sm-4">

        <div class="pull-right image">
          <?php
          $src = base_url('assets/theme/dist/img/user2-160x160.jpg');
          if ($querys[0]->buyer_image) {
            $src = base_url('uploads/' . $querys[0]->buyer_image);
          } ?>

          <img src="<?php echo $src; ?>" class="rounded-circle" alt="User Image" style="width: 134px;height: 125px;" id="myImg" />

          <!-- <img src="<?= $src; ?>" class="rounded-circle" alt="User Image" style="width: 150px;">-->

        </div>
      </div>


      <div class="col-sm-8">

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <form id="addCat">
                <div class="modal-body">
                  <p><label>Name :</label> <input type="text" class="categoryName form-control" onkeyup="checkCategoryStatus(this)" name="cat" style="text-transform:uppercase" required="required" /></p>
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
          <?php echo form_open_multipart('welcome/do_upload'); ?>
          <div class="form-group">
            <label for="comment" class=" control-labelprod-label">Profile image:</label>
            <input type="hidden" name="old_buyer_image" value="<?php echo $querys[0]->buyer_image; ?>">
            <input class="supplier-image" type="file" name="image1" value="" id='1'>
            <img id="cu1" width="100" height="80" src=" https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image1" style="font-size:30px;color:red;"></i>
          </div>

          <div class="form-group">
            <label for="inputName" class="col-sm-4 control-label">Business Name</label>

            <div class="col-sm-8">
              <input autocomplete="off" type="text" value="<?php echo $user->username; ?>" class="form-control" placeholder="username" name="username">
              <?php echo form_error('username'); ?>
            </div>
          </div>


          <div class="form-group">
            <label for="inputName" class="col-sm-4 control-label">Name</label>

            <div class="col-sm-8">
              <input autocomplete="off" type="text" value="<?php echo $user->name; ?>" class="form-control" placeholder="Name" name="name">
              <?php echo form_error('name'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-8">
              <?php echo $user->email; ?>
            </div>
          </div>

          <!-- <div class="form-group">
        <label for="inputName" class="col-sm-4 control-label">Password</label>

        <div class="col-sm-8">
          <input type="password" name="password" id="password" class="form-control"  value="password" autocomplete="off">
           <?php echo form_error('password'); ?>
        </div>
      </div> -->

          <div class="form-group">
            <label for="inputName" class="col-sm-4 control-label">ABN/ACN</label>

            <div class="col-sm-8">
              <input type="text" value="<?php echo $user->ABN; ?>" class="form-control abn" placeholder="ABN" name="ABN" autocomplete="off">
              <?php echo form_error('ABN'); ?>
              <p class="err abnErr"></p>
            </div>


          </div>

          <div class="form-group">

            <i class="fas fa-info-circle master_info">
              <span class="info_detail">What is business phone: </span>
            </i>


            <label for="inputName" class="col-sm-4 control-label">Mobile Phone</label>

            <div class="col-sm-8">
              <input autocomplete="off" type="tel" name="Mphone" class="form-control" id="" value="<?php echo $user->Mphone; ?>">
              <!-- invalid number message -->
              <div class="aps"></div>
              <?php echo form_error('Mphone'); ?>
            </div>


          </div>

          <div class="form-group">



            <label for="inputName" class="col-sm-4 control-label">TelePhone</label>

            <div class="col-sm-8">
              <input autocomplete="off" type="tel" name="Tphone" class="form-control" id="Tphone" value="<?php echo $user->Tphone; ?>">
              <!-- invalid number message -->
              <div class="aps"></div>
              <?php echo form_error('Tphone'); ?>
            </div>


          </div>


          <div class="form-group">



            <label for="inputName" class="col-sm-4 control-label">Business Type</label>

            <div class="col-sm-8">
              <select id="bsntype" name="bsntype" class='form-control'>
                <option value="<?php echo $user->Bsntype; ?>"> <?php echo $user->Bsntype; ?> </option>
                <option value="SoleTrader">Sole Trader</option>
                <option value="Company">Company</option>
                <option value="Partnership">Partnership </option>
                <option value="Trust">Trust </option>
                <?php echo form_error('bsntype'); ?>
              </select>



            </div>



          </div>

          <label for="inputName" class="col-sm-4 control-label">Title</label>

          <div class="col-sm-8">
            <input autocomplete="off" type="text" name="title" class="form-control" id="title" value="<?php echo $user->title; ?>">
            <?php echo form_error('title'); ?>
            <!-- invalid number message -->


          </div>


          <div class="input_fields_wrap">

            <br>


            <div class="form-group">
              <div class="col-sm-8">
                <label for="InputFile" class="col-sm-4 control-label">Logo</label>
                <div class="col-sm-8">
                  <input id="InputFile" name="logo" type="file" />
                  <label for="username" class="error wrong_file"></label>
                </div>
                <?php

                if ($this->session->flashdata('imageErr')) {
                  echo '<p class="text-danger">' . $this->session->flashdata('imageErr') . '</p>';
                }

                ?>
              </div>
              <!--     
     <input type="hidden" name="HideCountry" value="<?php echo $user->country; ?>" class="HideCountry" /> -->

              <div class="col-sm-4">
                <?php if ($user->buyer_logo) { ?>
                  <img src="<?php echo base_url('assets/uploads/profile/' . $user->buyer_logo); ?>" width="100px" height="70px" />
                <?php } ?>
              </div>
            </div>



            <input type="hidden" name="contry" id="contry" value="<?php echo $user->cn; ?>">

            <div class="row">
              <div class="col-md-6">
                <div class="col-md-11">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input autocomplete="off" type="text" name="address" class="form-control" value="<?php echo $user->address; ?>">
                    <?php echo form_error('address'); ?>
                  </div>

                  <!-- <div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                 <select autocomplete="off" id="country" name= "country" value ="<?php echo $user->country; ?>" class='form-control' ><option value="<?php echo $user->country; ?>"><?php echo $user->country; ?></option></select>

           <?php echo form_error('country'); ?>
                </div> -->


                  <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
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



                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" id="city" name="city" class="form-control" value="<?php echo $user->city; ?>" autocomplete="off">
                  <?php echo form_error('city'); ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Postcode</label>
                  <?php
                  echo form_input(array(
                    'name'        => 'zipCode',
                    'id'          => 'zipCode',
                    'type'          => 'text',
                    'placeholder' => 'Postcode',
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



            <div class="form-group">
              <div class="col-md-11">

                <label for="">Website</label>
                <input type="text" id="website" placeholder="website" name="website" class="form-control" value="<?php echo $user->website; ?>" autocomplete="off">
                <?php echo form_error('website'); ?>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-11">
                <label for="">Description</label>
                <textarea type="text" maxlength="500" name="description" class="form-control" placeholder="Describe about your business" id="description">
          <?php if (!is_null($user->description)) {
            echo trim($user->description);
          } ?>
          </textarea>
                <h6 id="count_message"></h6>
              </div>
            </div>


          </div>






          <!--new code  end 3/8/2018-->
          <div class="form-group">
            <div class=" col-sm-8">
              <button type="submit" class="btn btn-success submit">Submit</button>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script>
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
    };

    $("#image1").click(function() {
      document.getElementById("1").value = null;
      $("#cu1").attr("src", "https://dummyimage.com/300x200/000/fff.jpg&text=no+image");
    });
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
            //remote: "check_email_exists"
          },
          title: {
            required: true,
            title: true,
            //remote: "check_email_exists"
          },
          bsntype: {
            required: true,
            bsntype: true,
            //remote: "check_email_exists"
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
            remote: "E-mail already exists."
          },

          hiddenRecaptcha: {
            required: "The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?"
          },
          bsntype {
            required: "please select a business type"
          },
          title {
            required: "please input a title"
          }
        }
      });

      $('form').submit(function(e) {

        var valid = $("form").valid();
        if (valid) {

          var isValid = $("#phone").intlTelInput("isValidNumber");
          if (!isValid) {

            $('.aps').html('<p class="err">InValid Number</p>');
            return false;
          } else {

            $('.aps').html('<p class="success">Valid Number</p>');

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
            console.log(result.Message);
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
                    } else {
                      $('.abnErr').text('please enter a correct ABN/ACN number')
                    };

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


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
  </script>

  <!-- text remaining -->
  <script>
    let text_max = 500;
    $('#description').keyup(function() {

      let text_length = $('#description').val().length;
      let text_remaining = text_max - text_length;
      $('#count_message').html(text_remaining + ' remaining');

    });
  </script>
</section>