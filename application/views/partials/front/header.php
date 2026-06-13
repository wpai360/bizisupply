<section class="header-section">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="logo-section">
				<?php if($common && $common['logo']){
                       $logo = $common['logo']->image;
                        $logo=base_url('assets/uploads/profile/'.$logo);
					   }else{
					    $logo=base_url('assets/images/empty.png');
					   	} ?>

<a href="<?php echo base_url('/');?>"><img style="width:80%;margin-left:15%;margin-top:1%;"  src="<?php echo $logo; ?>"></a>
				</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/'); ?>">	• Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('academy'); ?>"> 	• How-it-work</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('about-us'); ?>">	• About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('help'); ?>">	• Help</a>
      </li>
    </ul>
    <span class="navbar-text">
    <button type="button" class="btn btn-primary" style="background-color: rgb(34, 189, 229); border-color: rgb(34, 189, 229);"><a href="<?php echo base_url('login'); ?>" class="nav-link" style="color: white; padding: 0;"> Login/Register</a></button>
    </span>
  </div>
</nav>



					

</section>
	


	
