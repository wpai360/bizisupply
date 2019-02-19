  <section class="banner-section-login">
    <div class="container">
     <div class="row">
       <div class="banner-login-text">
         <h2><?php echo strtoupper($title);?></h2>
       </div>
     </div> 
    </div>
  </section>
<style>
.main_t label {
	color : #000 !important;
}
</style>
<section class="Register-form-sec">
	<div class="container">
		<div class="row">


	<div class="login-section-heading">

		<p><a href="<?php echo site_url('login'); ?>">Login</a></p>

		<?php 
		if($success){
			echo '<p>You have successfully reset your password.</p>';
		} else {
			echo form_open(); 
			?>
			<div class="main_t">
				<?php
				echo form_label('Password', 'password') .'<br />';
				echo form_password(array('name' => 'password', 'id'=>'password','value' => set_value('password'))) .'<br />';
				echo form_error('password');

				echo form_label('Confirm Password', 'password_conf') .'<br />';
				echo form_password(array('name' => 'password_conf','id'=>'password_conf', 'value' => set_value('password_conf'))) .'<br />';
				echo form_error('password_conf');
				echo form_submit(array('type' => 'submit', 'value' => 'Save New Password','class'=>'submit'));
				?>

			</div>
			<?php

			echo form_close();
		}
		?>
		</div>
		</div>
		</div>
		</section>

		<script type="text/javascript">
			$(document).ready( function (){
               
               /************************************************/
    $.validator.addMethod('mypassword', function(value, element) {
            return this.optional(element) || (value.match(/[a-z]/) && value.match(/[A-Z]/) && value.match(/[0-9]/) && value.match(/[!@#$%&*()_+=-|<>?{}~]/));
        },
        'Password must contain at least one numeric and one uppercase letter and one lowercase letter  and one special character and at least 8 min length.');


$.validator.addMethod( 'passwordMatch', function(value, element) {
    
    // The two password inputs
    var password = $("#password").val();
    var confirmPassword = $("#password_conf").val();

    // Check for equality with the password inputs
    if (password != confirmPassword ) {
        return false;
    } else {
        return true;
    }

}, "Your Password Must Match");



 $("form").validate({
        rules: {
         
            password: {
                required: true,
                minlength: 8,
                mypassword : true
            },
             password_conf: {
              passwordMatch: true
            }
           
        },
         messages: {
             password: {
                required: 'Password is required',
                minlength: 'Password length should be 8 character'
                            },
             password_conf: {
              passwordMatch: 'Confirm Password should be match'       
                   }
        }

    });

/**************************************************/


			});
		</script>

