

<section class="content-header">
     <h1>

        <?= $title;?><i onclick="tutorial()" style="font-size:40px;" class=" ml-2 far fa-question-circle"></i>
          <ul class="nav navbar-nav dropdown-abs">


      <li class="dropdown notifications-menu nav-item">

            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="true">


            
             <i class="fa fa-gears"></i> Settings</a>

             <?php 
              if($common['active'] == 'buyer'){ 
                $url = base_url('buyer/profile');
                $switch = '<a class="dropdown-item" href="'.base_url("switch").'">Swtich Dashboard</a>';
                 }else{ 
                  $url = base_url('supplier/profile'); 
                  $switch = '<a  class="dropdown-item" href="'.base_url("switch").'">Swtich Dashboard</a>';
                }
                ?>


            <ul class="dropdown-menu">

          <a class="dropdown-item" href="<?php echo $url;?>">Profile</a>
              <div class="dropdown-divider"></div>
<?php echo $switch;?>

              <div class="dropdown-divider"></div>

   <a  class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a>

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

    <script>
    
    var tutorial = () => {
      introJs().start();
    }
</script>