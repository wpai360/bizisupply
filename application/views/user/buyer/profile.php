<style>
  .hidenFields {
    display: none;
  }

  input[type="file"] {
    display: block;
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

          <button class="btn btn-primary" onclick="changeAvatar()">change your avatar</button>

        </div>


      </div>


      <div class="col-sm-8">


        <form id="form" class="form-horizontal formPost" method="POST" enctype="multipart/form-data" autocomplete="off">
          <?php echo form_open_multipart('welcome/do_upload'); ?>
          <div class="form-group d-none profile-image">
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

          <div class="form-group">
            <label for="inputName" class="col-sm-4 control-label">ABN/ACN</label>

            <div class="col-sm-8">
              <input type="text" value="<?php echo $user->ABN; ?>" class="form-control abn" placeholder="ABN" name="ABN" autocomplete="off">
              <?php echo form_error('ABN'); ?>
              <p class="err abnErr"></p>
            </div>


          </div>

          <div class="form-group">

            <label for="inputName" class="col-sm-4 control-label">Mobile Phone</label>

            <div class="col-sm-8">
              <input autocomplete="off" type="tel" name="Mphone" class="form-control Mphone" id="" value="<?php echo $user->Mphone; ?>">
              <!-- invalid number message -->
              <div class="aps"></div>
              <?php echo form_error('Mphone'); ?>
            </div>


          </div>

          <div class="form-group">



            <label for="inputName" class="col-sm-4 control-label">Telephone</label>

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

            <div class="row">
              <div class="col-md-6">
                <div class="col-md-11">

                  <div class="form-group">

                    <label for="inputName" class="control-label">Address</label>
                    <input autocomplete="off" type="text" name="address" class="form-control" value="<?php echo $user->address; ?>">
                    <?php echo form_error('address'); ?>
                  </div>


                  <div class="form-group">
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



                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputName" class="control-label">City</label>
                  <input type="text" id="city" name="city" class="form-control" value="<?php echo $user->city; ?>" autocomplete="off">
                  <?php echo form_error('city'); ?>
                </div>

                <div class="form-group">
                  <label for="inputName" class="control-label">PostCode</label>
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

            <div class="form-group">
              <div class="col-md-11">

                <label for="inputName" class="control-label">Website</label>
                <input type="text" id="website" placeholder="website" name="website" class="form-control" value="<?php echo $user->website; ?>" autocomplete="off">
                <?php echo form_error('website'); ?>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-11">
                <label for="inputName" class="control-label">Description</label>
                <textarea type="text" maxlength="500" name="description" class="form-control" placeholder="Describe about your business" id="description">
          <?php if (!is_null($user->description)) {
            print_r(trim($user->description));
          } ?>
          </textarea>
                <h6 id="count_message"></h6>
              </div>
            </div>


          </div>

          <div class="form-group">
            <div class=" col-sm-8">
              <button type="submit" class="btn btn-success submit">Update Your Profile</button>

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

    $(document).ready(function() {
      var errGot;

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

            $(this).val('');
            $(this).next('.wrong_file').html('Please select valid extention(jpg/jpeg/gif/png).').show();
          }
        }
      });

      $('.toggler').on('click', function() {
        $(this).parent().children().toggle(); //swaps the display:none between the two spans
        $(this).parent().parent().find('.toggled_content').slideToggle(); //swap the display of the main content with slide action

      });

      function acnAjaxCall(acn) {
        $.ajax({
          url: "https://abr.business.gov.au/json/AbnDetails.aspx?abn=" + acn + "&guid=f43417c6-f163-4db0-987f-becb873c84d7",
          dataType: "jsonp",
          success: function(result) {
            acnValidate = false;
            if (result.Message == '') {
              acnValidate = true;
            }
          }
        });
      }


      $("#form").validate({
        rules: {
          zipCode: {
            required: true,
            number: true
          },
          state: {
            required: true
          },
          city: {
            required: true
          },
          Mphone: {
            required: true,
            number: true
          },
          Tphone: {
            required: true,
            number: true
          },
          username: {
            required: true
          },
          name: {
            required: true
          },
          abn: {
            required: true,
            number: true
          },
          title: {
            required: true
          },
          bsntype: {
            required: true
          }
        },
        messages: {
          zipCode: {
            required: "Post Code is required"
          },
          state: {
            required: "State is required"
          },
          city: {
            required: "City is required"
          },
          Mphone: {
            required: "Mobile Phone is required"
          },
          Tphone: {
            required: "TelePhone is required"
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
          bsntype: {
            required: "please select a business type"
          },
          title: {
            required: "please input a title"
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
                      $('.abnErr').text('please enter a correct ABN/ACN number');
                    }

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
