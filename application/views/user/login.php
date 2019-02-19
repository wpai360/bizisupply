
  <section class="banner-section-login">
    <div class="container">
     <div class="row">
       <div class="banner-login-text">
         <h2><?php echo strtoupper($title);?></h2>
       </div>
     </div> 
    </div>
  </section>


<section class="login-form-sec">
  <div class="container">
    <div class="row">



<div class="login-section-heading">

    

    <?php 
      echo form_open(); 
   echo '<p class="success" style="text-align:center">';
  
     if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
     }

    echo '</p>';

	?>

	<div class="main_t">
	
	<h2 class="admin-login-section"><?= $header;?></h2>
	
	<?php
    echo form_input(array('name' => 'email', 'placeholder'=>'Email','value' => set_value('email')));
    echo form_error('email');
    echo form_password(array('name' => 'password', 'placeholder'=>'password', 'value' => set_value('password')));
    echo form_error('password');

      if($error):
       echo '<p>'.$error.'</p>';
      endif; ?>
   
   <select name="userType" required="required" width="100%"> 
<option value="" >Select User Type</option>
<option value="buyer">Buyer</option>
<option value="supplier">Supplier</option>
</select>

<?php 
    echo form_submit(array('type' => 'submit', 'value' => 'Login', 'class' =>'submit'));

    echo anchor('forgot', 'Forgot Password', 'class="link-class"');

   ?>
   <?php 
   echo anchor('register', 'Sign Up', 'class="link-class signup"');
?>

</div>
<?
echo form_close();
?>
</div>


  </div>
  </div>
</section>