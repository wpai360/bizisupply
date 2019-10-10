<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title;?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">

</head>
<body>

	<div class="login-section-heading">
		<p><a href="<?php echo site_url('admin/login'); ?>">Login</a></p>

		<?php 
		if($success){
			echo '<p class="success">We have sent you an email with further instructions on how to reset your password. Thank you.<br/><a href="'.site_url('admin/login').'">Click here for go back..</a></p>';
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
</body>
</html>