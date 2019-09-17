<section class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
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
			<div class="col-lg-6">
    <nav class="navbar navbar-expand-md">
        <div class="nav-bar-section">
            <ul class="nav navbar-nav">
                <li id="1423-menu" class="nav-item"><a class="active nav-link" href="<?php echo base_url('/');?>">Home</a>
                </li>
                <li id="menu-1424" class="nav-item"><a href="<?php echo base_url('about-us');?>" class="nav-link">About Us</a>
                </li>
                <li id="menu-1426" class="nav-item"><a href="<?php echo base_url('help');?>" class="nav-link">Help</a>
                </li>
                <li id="menu-1428" class="nav-item"><a href="<?php echo base_url('login');?>" class="nav-link">Log In/Register</a>
                </li>
            </ul>
        </div>
    </nav>
	</div>
        </div>



					

	</div>
</section>
	


	