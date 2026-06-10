
<!-- Main content -->
<section class="content">

<script src="<?= base_url();?>assets/tel/js/intlTelInput.js"></script>
<script src="<?= base_url();?>assets/tel/js/utils.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/tel/css/intlTelInput.css">

 <div class="tab-pane" id="profile">


  <?php 

     if($this->session->flashdata('msg')){
    echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
     }

    ?>
<div class="row">

  <div class="col-sm-2">
    <div class="pull-right image">
    <?php if($user->image){
        $src=base_url('assets/uploads/profile/'.$user->image);
    
    }else{
   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
    }
?>
      <img src="<?= $src;?>" class="rounded-circle" alt="User Image" style="width: 150px;">
    
    </div>
  </div>
  <div class="col-sm-10">

 <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Username</label>

        <div class="col-sm-10">
          <input type="text" value="<?php echo $user->username;?>" class="form-control" id="inputName" placeholder="username" name="username" autocomplete="off">
           <?php echo form_error('username');?>
        </div>
      </div>


      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
          <input type="text" value="<?php echo $user->name;?>" class="form-control" id="inputName" placeholder="Name" name="name" autocomplete="off">
           <?php echo form_error('name');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" value="<?php echo $user->email;?>" class="form-control" name="email" autocomplete="off" id="inputEmail" placeholder="Email">
           <?php echo form_error('email');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="inputName" value="password" autocomplete="off">
           <?php echo form_error('password');?>
        </div>
      </div>

     <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">ABN</label>

        <div class="col-sm-10">
          <input type="text" value="<?php echo $user->ABN;?>" class="form-control abn" id="inputName" placeholder="ABN" name="ABN" autocomplete="off">
           <?php echo form_error('ABN');?>
            <p class="err abnErr"></p>
        </div>
       
      </div>

       <div class="form-group">
        <label for="InputFile" class="col-sm-2 control-label">Profile Image</label>
        <div class="col-sm-10">
          <input id="InputFile" name="image" type="file" />
        </div>
          <?php 

     if($this->session->flashdata('imageErr')){
      echo '<p class="text-danger">'.$this->session->flashdata('imageErr').'</p>';
     }

    ?>
      </div>


       <div class="form-group">
        <label for="InputFile" class="col-sm-2 control-label">Logo</label>
        <div class="col-sm-10">
          <input id="InputFile" name="logo" type="file" />
        </div>
          <?php 

     if($this->session->flashdata('imageErr')){
      echo '<p class="text-danger">'.$this->session->flashdata('imageErr').'</p>';
     }

    ?>
      </div>

  <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Address</label>

        <div class="col-sm-10">
          <textarea name="address" class="form-control" id="inputName" autocomplete="off"><?php echo $user->address;?> </textarea> 
           <?php echo form_error('address');?>
        </div>
      </div>

 <div class="form-group">

   <input type="hidden" name="country" id="country" value="<?php echo $user->country;?>">
      <?php echo form_error('country');?>
        <label for="inputName"  class="col-sm-2 control-label">Phone</label>

          <input type="tel" name="phone" class="form-control" id="phone"  autocomplete="off" value="<?php echo $user->phone;?>">
           <?php echo form_error('phone');?>
           <div class="aps"></div>
</div>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success submit">Submit</button>
            <a href="<?php echo base_url('admin/users');?>"> <button type="button" class="btn btn-danger">Back</button></a> 
         </div>
      </div>
    </form>
  </div>
  </div>
</div>


<script>

   $(document).ready( function (){
    var errGot;
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
$("form").submit();
   if($('.abnErr').text() == '' && errGot){
        $("form").submit();
   }else{
     $('.abn').val('');
     $('.abn').focus();
   }
   // $('.aps').html('');
 }
}
});
  });
</script>

</section>