	<section class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="logo-section">

					  <?php if($common && $common['logo']){
                       $logo = $common['logo']->image;
                        $logo=base_url('assets/uploads/profile/'.$logo);
					   }else{
					    $logo=base_url('assets/images/empty.png');
					   	} ?>

						<a href="<?php echo base_url('/');?>"><img src="<?php echo $logo; ?>"></a>
					</div>
				</div>

				<div class="col-md-8">
					<nav class="navbar">
					  <div class="nav-bar-section">					   
					<ul class="nav navbar-nav">
              <li id="1423-menu"><a class="active" href="<?php echo base_url('/');?>">Home</a></li>
                <li id="menu-1424"><a href="<?php echo base_url('about-us');?>">About Us</a></li>
                <li id="menu-1425"><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
                <li id="menu-1426"><a href="<?php echo base_url('help');?>">Help</a></li>
                <li id="menu-1427"><a href="<?php echo base_url('register');?>">Register Now</a></li>
                <li id="menu-1428"><a href="<?php echo base_url('login');?>">Login</a></li>
              </ul>
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</section>

	