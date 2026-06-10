<section class="banner-section-login1">
    <div class="container">
     <div class="row">
       <div class="banner-login-text">
         <h2><?php echo strtoupper($title);?></h2>
       </div>
     </div> 
    </div>
</section>

  <?php if($common && $common['contact']){
            $num = $common['contact']->contact_number;
            $email = $common['contact']->contact_email;
            $address = $common['contact']->contact_address;


                if(!$num)$num = '1234567890';
             if(!$email)$email = 'hawaki@info.net';
               if(!$address)$address = 'colonial street, Dedham, MA 02026';
            } else{
              $num = '1234567890'; $fb = '#';
              $email = 'hawaki@info.net';
              $address = 'colonial street, Dedham, MA 02026';
            }
              ?>


<section class="contact-uss">
	<div class="container-fluid">
		<div id="contact">				
			<div class="container">		

				<div class="contact-h2">
						<h2>Contact</h2>
						<hr class="separator-break">
				</div>
				
				<?php 
				echo form_open(); 
				echo '<p class="success" style="text-align:center">';

				if($this->session->flashdata('msg')){
				echo $this->session->flashdata('msg');
				}
				echo '</p>';
				?>
				
					<div class="contact row">
						<div class="col-md-6 contact-left">
							<div class="contact-top">
								<h3>Get in touch</h3>
								<p>KnowYourTutor.com is India’s 1st portal to get assured discounts on tuition courses. Our mission is to help you find best tutors, courses and events online or nearby you. In short, we are here to help you save time and money. Happy Learning!</p>
							</div>
							<div class="contact-address">
								<ul>
									<li><i class="fa fa-phone"></i> <span>+<?php echo $num;?></span></li>
									<li><i class="fa fa-phone fa-envelope"></i> <span><?php echo $email;?></span></li>
									<li><i class="fa fa-map-marker"></i> <span><?php echo $address;?></span></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-6 contact-right">
							<div class="contact-top-send">
								<h3>Send us a message</h3>
							</div>
							<div class="contact-form">
								<form  method="post">
									<input type="text" name="name" placeholder="Name" required>
									<input type="email" name="email" placeholder="Email" required>
									<input type="text" name="phone" placeholder="Telephone" required>
									<textarea name="message" placeholder="Type Here.........." required></textarea>
									<button type="submit" class="btn1">Submit</button>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
							
				<div class="map">
					<h3>Find us here</h3>
						<div class="contact-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2953.158442137816!2d-71.15691514929178!3d42.25378887909206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e37fa83c688403%3A0xd9a823ce2c650a64!2s27+Colonial+Dr%2C+Dedham%2C+MA+02026%2C+USA!5e0!3m2!1sen!2sin!4v1533809796651"  allowfullscreen></iframe>
						</div>	
				</div>	
			</div>	
		</div>	
	</div>
</section>
