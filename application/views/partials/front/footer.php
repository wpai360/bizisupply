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
  			<div class="col-md-4">
  				<div class="footer-logo-sec">

          <?php if($common && $common['logo']){
                       $logo = $common['logo']->image;
                        $logo=base_url('assets/uploads/profile/'.$logo);
                      $des =  $common['logo']->description;
             }else{
              $logo=base_url('assets/images/empty.png');
              $des;
              } ?>

            <a href="<?php echo base_url('/');?>"><img src="<?php echo $logo; ?>"></a>


  				<p><?php echo $des; ?> </p>
  			</div>


  			<div class="socil-icon">
  				<ul>
  					<a target="blank" href="<?php echo $fb;?>"><li class="facebook"><i class="fa fa-facebook-f"></i></li></a>
  					
  				<a target="blank" href="<?php echo $twitter;?>">	<li><i class="fa fa-twitter"></i></li></a>
  				</ul>
  			</div>
  			</div>

  			<div class="col-md-4">
  				<div class="footer-logo-sec">
  				<h2>OUR LINKS</h2>
  				<ul>
  					<li><i class="fa fa-angle-double-right"></i>About Us</li>
  					<li><i class="fa fa-angle-double-right"></i>Contact Us</li>
  					<li><i class="fa fa-angle-double-right"></i>Login</li>
  					<li><i class="fa fa-angle-double-right"></i>Register</li>
  				</ul>
  				<ul class="new-menu">
  					<li><i class="fa fa-angle-double-right"></i>Terms of Service</li>
  					<li><i class="fa fa-angle-double-right"></i>Privacy Policy</li>
  					<li><i class="fa fa-angle-double-right"></i>Security Safeguards</li>
  					<li><i class="fa fa-angle-double-right"></i>Help</li>
  				</ul>
  			</div>
  			</div>



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


  		<div class="col-md-4">
  			<div class="footer-logo-sec-1">
  				<h2>Contact Us</h2>		
  					<p><i class="fa fa-phone"></i><?php echo $num;?></p>
  					<p><i class="fa fa-envelope"></i><?php echo $email;?></p>
  					<p><i class="fa fa-address-book"></i><?php echo $address;?></p>
  			</div>
  			<div class="button-section-phone button-1-part">
  						<div class="iphone-img-1">
  						  <a href="<?php echo $apple_store;?>">	<img src="<?php echo base_url();?>assets/front/images/iphone-button.png"></a>
  						</div>
  						<div class="iphone-img-1">
  						<a href="<?php echo $google_play;?>">	<img src="<?php echo base_url();?>assets/front/images/android-button.png"></a>
  						</div>
  					</div>
  			</div>
  		</div>
  	</div>

    <?php if($common && $common['copyrights']){
     $des = $common['copyrights']->description;

   }else{
    $name;
    $des;
  } ?>


  	<div class="footer-content text-center">
  		<p><?php echo ucfirst($des);?></p>
  	</div>
  </footer>