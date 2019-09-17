
<style>
html{	scroll-behavior: smooth;
}


#banner {
    position: relative;
    height:600px;
    width:100%;
    overflow: hidden;
}
#videobcg {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    height:auto;
    width:auto;
    z-index: -100;
}

#coffeeButton {
    height: 250px;
    width: 250px;
    border: none;
    background: none;
    cursor: pointer;
}

#coffeeButton:focus {

}

#coffeeButton:hover svg {
    transform: scale(1.1);
}

#coffeeButton::-moz-focus-inner {

}

#coffeeButton svg {
    outline: none;
    transition: transform 0.3s linear;
}

.sr-only {
    height: 1px;
    overflow: hidden;
    position: absolute;
    width: 1px;
}
.clerify-section {
    display: table;
    padding: 30px 0;
    width: 100%;
    box-sizing: border-box;
    overflow: hidden;
}



.box{

}

.box1{
  position:absolute;
  top:40%;
  left:65%;
  transform : translate(-50% ,-50%);
}

.btn:link,
.btn:visited{
  text-decoration: none;

  position:relative;
  top:0;
  left:0;
  padding:20px 40px;
  border-radius:100px;
  display:inline-block;
  transition: all .5s;
  color:white;
}

.btn-white{
  background:#047fb7;

}

.btn:hover{
   box-shadow:0px 10px 10px rgba(0,0,0,0.2);
   transform : translateY(-3px);
   color:white;
}

.btn:active{
  box-shadow:0px 5px 10px rgba(0,0,0,0.2)
  transform:translateY(-1px);
  color:white;
}

.btn-bottom-animation-1{
  animation:comeFromBottom 1s ease-out .8s;
}



.btn-white::after {
    background: #047fb7;
    color:white;
}

.btn-animation-1:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
    color:white;
}

@keyframes comeFromBottom{
  0%{
    opacity:0;
    transform:translateY(40px);
  } 
  100%{
    opacity:1;
    transform:translateY(0);
  }



}
</style>
 <section class="banner-section">
    <div class="" style="background-color:#00b7e9; height:675px;color:white;width:100%;">
         <h1 style="text-align:center;padding-top:2%;">B2B Platform Connectinng Agricultural &amp; Horticultural to Supply Chain</h1>
        <div class="" style="text-align:right;">
            <img style="float:right; height:36.9em;" src="<?php echo base_url();?>assets/images/hawk.png">
        </div>
        <div style="margin-left:15%;">
            <h2>For Buyer</h2>
            <img style="width:25px;height:25px;margin-left:25px;" src="<?php echo base_url();?>assets/images/farmer.png">
            <p style="margin-left:5%;font-size:1.3em;">Obtain NEW SUPPLIERS &amp; COMPETITIVE PRICING</p>
            <p style="margin-left:5%;font-size:1.3em;">from local or Australia wide</p>
            <p style="margin-left:5%;font-size:1.3em;">(NO-COST to use our standard smart software * T&amp;C apply)</p>
        </div>
        <div style="margin-left:15%;">
            <h2>For Supplier</h2>
            <img style="width:25px;height:25px;margin-left:25px;" src="<?php echo base_url();?>assets/images/sheds.png">
            <p style="margin-left:5%;font-size:1.3em;">Supply online to minimise your operational cost and</p>
            <p style="margin-left:5%;font-size:1.3em;">engage new customers ready to buy local, state and</p>
            <p style="margin-left:5%;font-size:1.3em;">Australia wide</p>
            <p style="margin-left:5%;font-size:1.3em;">(PAY ONLY A MONTHLY FEE to use our smart software)</p>
        </div>
        <div class="box1">
            <p id="text123" style="color:#3498db; position:absolute;z-index:999;top:43%; 

  padding-left:28%;">The hawk has landed,
                <br>Click here to starts 30 days supplier free trial!</p>
                <button id="coffeeButton" onclick="location.href='<?php echo base_url('register'); ?>'">
                <svg style="top:150%;padding-left:10%;" viewbox="0 0 16 16">
                    <path id="MyPath" d="m391.84 540.91c-.421-.329-.949-.524-1.523-.524-1.351 0-2.451 1.084-2.485 2.435-1.395.526-2.388 1.88-2.388 3.466 0 1.874 1.385 3.423 3.182 3.667v.034h12.73v-.006c1.775-.104 3.182-1.584 3.182-3.395 0-1.747-1.309-3.186-2.994-3.379.007-.106.011-.214.011-.322 0-2.707-2.271-4.901-5.072-4.901-2.073 0-3.856 1.202-4.643 2.925"
                    fill="#fff" transform="matrix(.77976 0 0 .78395-299.99-418.63)" />
                </svg>
            </button>
        </div>
        <div class="box" style="text-align:center;"> <a href="#howwork" style="font-family:&apos;Lato&apos;; font-size:15px; width:25%;border-radius:100px;"
            class="btn btn-white btn-animation-1">Find out more about our smart software <br>Change the way you buy &amp; supply forever</a> 
        </div>
    </div>
</section>
  <?php
  if (count($Testimonials)) {
      if ($Testimonials[0]):
    ?>

      <?php if ($common && $common['social_links']) {
        $google_plus = $common['social_links']['google_plus']['social_link_url'];

        $google_play = $common['social_links']['google_play']['social_link_url'];

        $apple_store = $common['social_links']['apple_store']['social_link_url'];


        if (!$google_plus) {
            $google_plus = '#';
        }
        if (!$google_play) {
            $google_play = '#';
        }
        if (!$apple_store) {
            $apple_store = '#';
        }
    } else {
        $apple_store = '#';
        $google_play = '#';
    } ?>


<?php endif;
  }
 ?>


  <section class="how-it-work-sec" id="howwork">
  	<div class="container">
    <div class="text-how-sec text-center">
    
    <h2>How It All Works</h2>
    <p>Change the way you buy & supply forever</p>
    
  </div>
  		<div class="row">
  		

 <?php
  if (count($Services)) {
      foreach ($Services as $key => $Service) {
          if ($key != 0) {
              if ($key == (($key)*3)/$key) {
                  ?>
      <div class="clerify-section"></div>
      <?php
              }
          } ?>
       <?php if ($Service->services_id == 7) {
              ?>
        <div class="how-it-text col-lg-4 offset-md-4" style="margin-top:10%;">
    <?php } else { ?>
    <div class="col-lg-4 tell-us-section">
        <?php } ?>

           
        <div class="how-it-text">
     
           <h2>   <img class="" src="<?php echo base_url(); ?>assets/uploads/service_images/<?php echo $Service->upload_image ; ?>">
<?php echo $Service->name ; ?></h2>

               <p><?php echo $Service->description ; ?></p>
        </div>
    </div>


  		<?php
      }
  }
    ?>

  		</div>
  	</div>
  </section>



<section id="banner">
    <video id="videobcg" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
        <source src="<?php echo base_url();?>assets/front/images/phone.mp4" type="video/mp4">
            <source src="movie.webm" type="video/webm">Sorry, your browser does not support HTML5 video.</video>
            <div class="row" style="">

<div class="col-md-6 left-content-section-1">
<h2>Your supply chain is now in your pocket 24/7</h2>
<p><i class="far fa-check-square"></i> Get A Competitive Quote From Multi Trusted & Rated Suppliers</p>
<p><i class="far fa-check-square"></i> Recall Your Own Master List With Most Purchased Products</p>
<p><i class="far fa-check-square"></i> Direct Payment to Supplier, No Comission from Hawki Supply</p>
<p><i class="far fa-check-square"></i> Buyer & Supplier Perfoms Rating</p>
  <p><i class="far fa-check-square"></i> Easy-Fast & In Your Pocket or the Plam of Your Hand</p>
  <img src="<?php echo base_url();?>assets/front/images/android-button.png">
  <img src="<?php echo base_url();?>assets/front/images/iphone-button.png">

  <div class="btnnn-section">
 
</div>
</div>
</div>
</section>


 
  


 
  

<?php
  if (count($Testimonials)) {
      if ($Testimonials[1]):
    ?>

  <section class="hawkisupply-section">
  
        <div class="row">
          <div class="col-md-6 images-men-sec">


          </div>
          <div class="col-md-6 right-content-section-1">
            <h2>Register YOUR BUSINESS TODAY</h2>
            <p>As a Buyer, start receiving competitive quotes for the products or services you want to purchase.</p>
             <p>  As a Supplier, start receiving requests for your products or services from customers who have an immediate need to buy.</p>
            <div class="btnnn-section">
            <a href="<?php echo base_url('register'); ?>"><input type="button" name="Try HiS Free" class="try-his-free-sec" value="Register Now"></a>
          </div>
        </div>
      </div>
    
  </section>
<?php endif;
  }
 ?>



 <?php
  if (count($Testimonials) > 3) {
      foreach ($Testimonials as $key => $Testimonial) {
          if ($key > 2):
    ?>

  <section class="image-part-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <div class="img-iphon-andoriad">
            
        <img src="<?php echo base_url(); ?>assets/uploads/testimonials_images/<?php echo $Testimonial->upload_image ; ?>">

          </div>
        </div>
        <div class="col-md-6 register-your-section">
         <h2><?php echo $Testimonial->name ; ?></h2>
            <p><?php echo $Testimonial->description ; ?></p>
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


  			
  		</div>
  	</div>
  </section>
