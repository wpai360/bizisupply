      <?php if($common && $common['social_links']){
        $fb = $common['social_links']['fb']['social_link_url'];

        $twitter = $common['social_links']['twitter']['social_link_url'];

        $google_plus = $common['social_links']['google_plus']['social_link_url'];

        $google_play = $common['social_links']['google_play']['social_link_url'];

        $apple_store = $common['social_links']['apple_store']['social_link_url'];


        if(!$google_plus)$google_plus = '#';
        if(!$google_play)$google_play = '#';
        if(!$apple_store)$apple_store = '#';
        if(!$twitter)$twitter = '#';
        if(!$fb)$fb = '#';

      } else{
        $fb = '#';
        $twitter = '#';
        $apple_store = '#';
        $google_play = '#';
      }

      if($common && $common['get_started']){
       $start = $common['get_started']->description;
       $name = $common['get_started']->name;
       $img = $common['get_started']->image;
       $img=base_url('assets/uploads/get_started/'.$img);


     }else{
      $start;
      $name;
      $img=base_url('assets/images/empty.png');
    }
    ?>

   <section class="Get-started">
    <div class="container">
      <div class="row">
        
        </div>
      </div>
    </div>
  </section>
  
 <footer id="footer-section">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-3">
  				<div class="footer-logo-sec">
            <?php if($common && $common['logo']){
                       $logo = $common['logo']->image;
                       $logo=base_url('assets/uploads/profile/'.$logo);
                       $des =  $common['logo']->description;
             }else{
               $logo=base_url('assets/images/empty.png');
               $des = 'B2B Platform Connecting Agricultural & Horticultural to Supply Chain';
              } ?>
            <a href="<?php echo base_url('/');?>"><img class="img-fluid" alt="Responsive image" src="<?php echo $logo; ?>"></a>
            <p><?php echo $des; ?> </p>
          </div>
          <div class="socil-icon ml-3 my-4">
            <ul>
              <li class="facebook"><a target="blank" href="<?php echo $fb;?>"><i class="fa fa-facebook-f" style="color: #00aced; font-size: 1.5em; background: none;"></i></a></li>
              <li class="ml-4" style="display:inline-block;"><a target="blank" href="<?php echo $twitter;?>"><i class="fa fa-twitter" style="color: #00aced; font-size: 1.5em; background: none;"></i></a></li>
            </ul>
          </div>
  			</div>

  			<div class="col-md-3">
  				<div class="footer-logo-sec">
    				<h2>OUR LINKS</h2>
    				<ul>
    					<li><a href="<?php echo base_url('about-us');?>" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>About Us</a></li>
    					<li><a href="<?php echo base_url('login');?>" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Login</a></li>
    					<li><a href="<?php echo base_url('register');?>" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Register</a></li>
    					<li><a href="<?php echo base_url('academy');?>" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Academy</a></li>
    				</ul>
    				<ul class="new-menu">
    					<li><a href="#" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Terms of Service</a></li>
    					<li><a href="#" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Privacy Policy</a></li>
    					<li><a href="<?php echo base_url('help');?>" style="color: #231f20;"><i class="fa fa-angle-double-right"></i>Help</a></li>
    				</ul>
  			  </div>
  			</div>

        <?php if($common && $common['contact']){
          $num = $common['contact']->contact_number;
          $email = $common['contact']->contact_email;
          $address = $common['contact']->contact_address;
          if(!$num)$num = '0451231932';
          if(!$email)$email = 'HawkiSupply@gmail.com';
          if(!$address)$address = 'Brisbane';
        } else{
          $num = '0451231932';
          $email = 'HawkiSupply@gmail.com';
          $address = 'Brisbane';
        } ?>

    		<div class="col-md-3">
    			<div class="footer-logo-sec-1">
    				<h2>Contact Us</h2>		
    					<p><i class="fa fa-phone" style="color:#00aced"></i><?php echo $num;?></p>
    					<p><i class="fa fa-envelope" style="color:#00aced"></i><?php echo $email;?></p>
    					<p><i class="fa fa-address-book" style="color:#00aced"></i><?php echo $address;?></p>
    			</div>
        </div>

        <div class="col-md-3">
          <div class="iphone-img mb-3" style="display:block;">
            <a href="<?php echo $apple_store;?>"><img src="<?php echo base_url();?>assets/front/images/iphone-button.png"></a>
          </div>
          <div class="iphone-img" style="display:block;">
            <a href="<?php echo $google_play;?>"><img src="<?php echo base_url();?>assets/front/images/android-button.png"></a>
          </div>
        </div>
  		</div>
  	</div>

    <?php if($common && $common['copyrights']){
     $copyright_text = $common['copyrights']->description;
    }else{
     $copyright_text = 'Copyright © 2019 HawkiSupply. All rights reserved.';
    } ?>

  	<div class="footer-content text-center">
  		<p><?php echo ucfirst($copyright_text);?></p>
  	</div>
  </footer>