<style>
.clerify-section {
    display: table;
    padding: 30px 0;
    width: 100%;
    box-sizing: border-box;
    overflow: hidden;
}
</style>
  <section class="banner-section">
  	<div class="you-tube-icon">
      <?php //pr($Banner); ?>
      <?php (!empty($Banner[0]->image)) ? $imgPath = base_url('assets/uploads/homebanner/').$Banner[0]->image  : $imgPath = base_url("assets/images/add-image.jpg");    ?>
  		<img src="<?php echo $imgPath; ?>">
  	</div>
  </section>

  <?php
  if(count($Testimonials)){ 
if($Testimonials[0]):
    ?>

      <?php if($common && $common['social_links']){
           $google_plus = $common['social_links']['google_plus']['social_link_url'];

          $google_play = $common['social_links']['google_play']['social_link_url'];

            $apple_store = $common['social_links']['apple_store']['social_link_url'];


          if(!$google_plus)$google_plus = '#';
          if(!$google_play)$google_play = '#';
           if(!$apple_store)$apple_store = '#';

        } else{
          $apple_store = '#';
          $google_play = '#';
        }
        ?>

  <section class="hawkisupply-section">
	
  			<div class="row">
  				<div class="col-md-5 images-men-sec">
            <img src="<?php echo base_url();?>assets/uploads/testimonials_images/<?php echo $Testimonials[0]->upload_image ;?>">  					
  				</div>
  				<div class="col-md-7 right-content-section">
  					<h2><?php echo $Testimonials[0]->name ;?></h2>
  					<?php echo $Testimonials[0]->description ;?>
  				</div>
			
  		</div>
  </section>
<?php endif;
}
 ?>


  <section class="how-it-work-sec">
  	<div class="container">
  		<div class="row">
  			<div class="text-how-sec text-center">
  				<h2>How It Work</h2>
  				<p>Lorem Ipsum is Simply Dummy Text</p>
  			</div>

 <?php
  if(count($Services)){ 

   foreach ($Services as $key => $Service) {

    if($key != 0){
      if($key == (($key)*3)/$key){
      ?>
      <div class="clerify-section"></div>
      <?php 
    }
  }?>

  				    <div class="col-md-4 tell-us-section">

  					<div class="icon-img-sec">
  				  <img src="<?php echo base_url();?>assets/uploads/service_images/<?php echo $Service->upload_image ;?>">
  					</div>
  					<div class="how-it-text">
	  					  <h2><?php echo $Service->name ;?></h2>
            <p><?php echo $Service->description ;?></p>
  					</div>
  				</div>

  		<?php 
    
    }
  }
    ?>

  		</div>
  	</div>
  </section>


 
  <?php
  if(count($Testimonials)){ 
if($Testimonials[1]):
    ?>

  <section class="hawkisupply-section">
  
        <div class="row">
          <div class="col-md-6 images-men-sec">

            <img src="<?php echo base_url();?>assets/uploads/testimonials_images/<?php echo $Testimonials[1]->upload_image ;?>">
          </div>
          <div class="col-md-6 right-content-section-1">
            <h2><?php echo $Testimonials[1]->name ;?></h2>
            <p><?php echo $Testimonials[1]->description ;?></p>
            <div class="btnnn-section">
            <a href="<?php echo base_url('register'); ?>"><input type="button" name="Try HiS Free" class="try-his-free-sec" value="Try HiS Free"></a>
          </div>
        </div>
      </div>
    
  </section>
<?php endif;
}
 ?>


 
  <?php
  if(count($Testimonials)){ 
if($Testimonials[2]):
    ?>

  <section class="image-part-section">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 text-center">
  				<div class="img-iphon-andoriad">
  					
        <img src="<?php echo base_url();?>assets/uploads/testimonials_images/<?php echo $Testimonials[2]->upload_image ;?>">

  				</div>
  			</div>
  			<div class="col-md-6 register-your-section">
  			 <h2><?php echo $Testimonials[2]->name ;?></h2>
  					<p><?php echo $Testimonials[2]->description ;?></p>

  					<div class="button-section-phone">
  						<div class="iphone-img">
  							 <a href="<?php echo $apple_store;?>"><img src="<?php echo base_url();?>assets/front/images/iphone-button.png"></a>
  						</div>
  						<div class="iphone-img">
  						  <a href="<?php echo $google_play;?>">	<img src="<?php echo base_url();?>assets/front/images/android-button.png"></a>
  						</div>
  					</div>
  			</div>
  		</div>
  	</div>
  </section>

<?php endif;
}
 ?>



 <?php
  if(count($Testimonials) > 3){ 
   foreach ($Testimonials as $key => $Testimonial) {
   
if($key > 2):
    ?>

  <section class="image-part-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <div class="img-iphon-andoriad">
            
        <img src="<?php echo base_url();?>assets/uploads/testimonials_images/<?php echo $Testimonial->upload_image ;?>">

          </div>
        </div>
        <div class="col-md-6 register-your-section">
         <h2><?php echo $Testimonial->name ;?></h2>
            <p><?php echo $Testimonial->description ;?></p>
        </div>
      </div>
    </div>
  </section>

<?php endif;
}
}
 ?>


  <section class="logo-section-footer">
  	<div class="container text-center">
  		<div class="row">

 <?php  if(count($PartnersLogo)){ 
   foreach ($PartnersLogo as $key => $Partners) {
   ?>
  			<div class="col-md-2">
  				<img src="<?php echo base_url();?>assets/uploads/partners_logo/<?php echo $Partners->pl_file_name;?>" style="width: 120px;height:70px">
  			</div>
<?php } } ?>
  			
  		</div>
  	</div>
  </section>
