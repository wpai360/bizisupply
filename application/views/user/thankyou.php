
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
  <p><br/><a href='<?php echo site_url('login');?>'>Click here for go back..</a></p>
  </div>
  </div>
  </div>
  </section>