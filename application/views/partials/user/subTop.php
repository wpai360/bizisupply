<section class="content-header">
     <h1>

        <?= $title;?>

          <ul class="nav navbar-nav dropdown-abs">

          



      <li class="dropdown notifications-menu nav-item">

            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true">

             <i class="fa fa-gears"></i> Settings</a>
            <?php 
              if($common['active'] == 'buyer'){ 
                $url = base_url('buyer/profile');
                $switch = '<a href="'.base_url("switch").'">Swtich Dashboard</a>';
                 }else{ 
                  $url = base_url('supplier/profile'); 
                  $switch = '<a href="'.base_url("switch").'">Swtich Dashboard</a>';
                }
                ?>

            <ul class="dropdown-menu">
              <li class="header"> <a href="<?php echo $url;?>">Profile</a></li>
              <li class="header"><?php echo $switch;?> </li>

               <li class="header"> <a href="<?php echo base_url('logout');?>">Logout</a></li>
              
              
            </ul>
          </li>
      </ul>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $title;?></li>
      </ol>
    
 <!--      <button type="button" class="btn r4q btn-info btn-lg">Create R4Q</button> -->
    </section>