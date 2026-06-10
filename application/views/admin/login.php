
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title;?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">

</head>
<body>
<div class="login-section-heading">
    <h2 class="admin-login-section"><?= $header;?></h2>

    <?php 
      echo form_open(); 
   echo '<p class="success" style="text-align:center">';
  
     if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
     }

    echo '</p>';

	?>

	<div class="main_t">
	<?php
    echo form_label('Email Address', 'email');
    echo form_input(array('name' => 'email', 'value' => set_value('email')));
    echo form_error('email');
    echo form_label('Password', 'password');
    echo form_password(array('name' => 'password', 'value' => set_value('password')));
    echo form_error('password');

      if($error):
       echo '<p>'.$error.'</p>';
      endif;

    echo form_submit(array('type' => 'submit', 'value' => 'Login', 'class' =>'submit'));

    echo anchor('admin/forgot', 'Forgot Password', 'class="link-class"');

   ?>

</div>
<?
echo form_close();
?>

</body>
</html>