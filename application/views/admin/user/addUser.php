

<!-- Main content -->
<section class="content">

<script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>
<script src="<?= base_url();?>assets/tel/js/utils.js"></script>

<link rel="stylesheet" href="<?= base_url();?>assets/tel/css/intlTelInput.css">
<script type= "text/javascript" src = "<?= base_url();?>assets/js/countries.js"></script>

 <div class="tab-pane" id="userProfile">


  <?php 

     if($this->session->flashdata('msg')){
    echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
     }

    ?>

  <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Business Name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" placeholder="Business Name" value="<?php echo set_value('username');?>" name="username" autocomplete="off">
           <?php echo form_error('username');?>
        </div>
      </div>


      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputName" placeholder="name" value="<?php echo set_value('name');?>" name="name" autocomplete="off">
           <?php echo form_error('name');?>
        </div>
      </div>



      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo set_value('email');?>" id="inputEmail" placeholder="Email">
           <?php echo form_error('email');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="password" autocomplete="off">
           <?php echo form_error('password');?>
        </div>
      </div>

         <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">ABN</label>

        <div class="col-sm-10">
          <input type="text" name="ABN" class="form-control abn" id="ABN" autocomplete="off" value="<?php echo set_value('ABN');?>">
           <?php //echo form_error('ABN');?>
            <p class="err abnErr"></p>
        </div>
      </div>

  <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Address</label>

        <div class="col-sm-10">
          <textarea name="address" class="form-control" id="address" autocomplete="off"> <?php echo set_value('address');?></textarea> 
           <?php echo form_error('address');?>
        </div>
      </div>
     
     <div class="form-group">
     <!-- <input type="hidden" name="country" id="country" value="<?php echo set_value('country');?>"> -->
     <input type="hidden" name="HideCountry" value="<?php echo set_value('HideCountry');?>" class="HideCountry" />
     
        <label for="inputName"  class="col-sm-2 control-label">Phone</label>
         <div class="col-sm-10">
          <input type="tel" name="phone" class='form-control' id="phone" class="phone" autocomplete="off" value="<?php echo set_value('phone');?>">
           <?php echo form_error('phone');?>
           <div class="aps"></div>
          </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Country</label>

        <div class="col-sm-10">
          <select id="country" name= "country" value = '<?php echo set_value('country');?>' class='form-control'><option value="">-- Country --</option></select>
           <?php echo form_error('country');?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">State</label>

        <div class="col-sm-10">
          <select id="state" name= "state" value = '<?php echo set_value('state');?>' class='form-control'><option value="">-- State --</option></select>
           <?php echo form_error('state');?>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">City</label>

        <div class="col-sm-10">
          <?php
              echo form_input(array('name' => 'city',  'placeholder'=>'City' , 'class'=>'form-control', 'value' => set_value('city')));

              echo form_error('city');
              ?>
        </div>
      </div>     
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">zipCode</label>

        <div class="col-sm-10">
          <?php
            echo form_input(array('name' => 'zipCode', 'class'=>"zipCode form-control", 'placeholder'=>'zip Code' ,  'value' => set_value('zipCode')));  

            echo form_error('zipCode');
            ?>
        </div>
      </div>     
       

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger submit">Submit</button>
        </div>
      </div>
    </form>
  </div>


  <script>

   $(document).ready( function (){
    var errGot;

    $('#country').on('change', function (){
      var newOne = $( "#country option:selected" ).text();
      $('.HideCountry').val(newOne);
    });


    setTimeout( function (){
      var initialCountry = $("#country").val();
      if(initialCountry){
        $("#phone").intlTelInput("setCountry", initialCountry);
      }
    },2000);
    $("#phone").intlTelInput();

    $("#phone").on("countrychange", function(e, countryData) {
      $('#country').val(countryData['iso2']);
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
  $.ajaxSetup({
        data: csrfData
     });
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

 })

 $(".submit").click(function(e) {
    e.preventDefault();
if($("#phone").val()=='' && $('.aps').html() == ''){
$("form").submit();
}else{

    var isValid = $("#phone").intlTelInput("isValidNumber");
    if(!isValid){
     $('.aps').html('<p class="err">InValid Number</p>');
   }else{
     $('.aps').html('<p class="success">Valid Number</p>');

   if($('.abnErr').text() == '' && errGot){
        $("form").submit();
   }else{
     $('.abn').val('');
     $('.abn').focus();
   }
    $('.aps').html('');
 }
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

</section>