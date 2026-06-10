<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title;?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">

</head>
<body>
	<div class="login-section-heading">
		<h2 class="admin-login-section"><?= $header;?></h2>

		<p><a href="<?php echo site_url('admin/login'); ?>">Login</a></p>

		<?php 
		if($success){
			echo '<p>You have successfully reset your password.</p>';
		} else {
			echo form_open(); 
			?>
			<div class="main_t">
				<?php
				echo form_label('Password', 'password') .'<br />';
				echo form_password(array('name' => 'password', 'value' => set_value('password'))) .'<br />';
				echo form_error('password');
				echo form_label('Confirm Password', 'password_conf') .'<br />';
				echo form_password(array('name' => 'password_conf', 'value' => set_value('password_conf'))) .'<br />';
				echo form_error('password_conf');
				echo form_submit(array('type' => 'submit', 'value' => 'Save New Password','class'=>'submit'));
				?>

			</div>
			<?php

			echo form_close();
		}
		?>

	</body>
	</html>
