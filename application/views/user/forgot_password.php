  <section class="banner-section-login">
    <div class="container">
     <div class="row">
       <div class="banner-login-text">
         <h2><?php echo strtoupper($title);?></h2>
       </div>
     </div> 
    </div>
  </section>


	<div class="login-section-heading">
		<p><a href="<?php echo site_url('login'); ?>">Login</a></p>

		<?php 
		if($success){
			echo '<p class="success">Thank you. We have sent you an email with further instructions on how to reset your password. Thank you.<br/><a href="'.site_url('login').'">Click here for go back..</a></p>';
		} else {
			echo form_open(); 
			?>
			<div class="main_t">
				<?php
				echo form_label('Email Address', 'email'); ?>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons"></i>
					</span>
					<div class="form-line">
						<?php
						echo form_input(array('name' => 'email', "required"=>"required",'value' => set_value('Email')));
						?>

					</div>
				</div>
				<?php
				echo form_error('email');
				echo form_submit(array('type' => 'submit', 'value' => 'Reset Password','class' =>'submit'));
				?>
			</div>
			<?php
			echo form_close();
		}
		?>
	</div>
