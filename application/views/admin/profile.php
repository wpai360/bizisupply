
<!-- Main content -->
<section class="content">

 <div class="tab-pane" id="profile">


  <?php 

     if($this->session->flashdata('msg')){
    echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
     }

    ?>

  <div class="col-sm-2">
    <div class="pull-right image">
    <?php if($user->image){
        $src=base_url('assets/uploads/profile/'.$user->image);
    
    }else{
   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
    }
?>
      <img src="<?= $src;?>" class="img-circle" alt="User Image" style="width: 150px;">
    
    </div>
  </div>
  <div class="col-sm-10">

  <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 


      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
          <input type="text" value="<?= $user->username ?>" class="form-control" id="inputName" placeholder="username" name="username">
           <?php echo form_error('username');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input type="email" value="<?= $user->email ?>" class="form-control" name="email" id="inputEmail" placeholder="Email">
           <?php echo form_error('email');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
          <input type="password" name="password" value="password" class="form-control" id="inputName" autocomplete="off">
           <?php echo form_error('password');?>
        </div>
      </div>

      <div class="form-group">
        <label for="InputFile" class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
          <input id="InputFile" name="image" type="file" />
        </div>
          <?php 

     if($this->session->flashdata('imageErr')){
      echo '<p class="text-danger">'.$this->session->flashdata('imageErr').'</p>';
     }

    ?>
      </div>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</section>