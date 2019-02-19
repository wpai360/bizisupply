<!-- Main content -->
<section class="content">

 <div class="tab-pane">
  <?php 
      if($this->session->flashdata('message')){
        echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
      }

      //pr($bannerdata);
    ?>
    <div class="col-sm-2">
      <div class="pull-right image">
        <?php 

          (!empty($result->image)) ? $imgPath = base_url('assets/uploads/get_started/').$result->image  : $imgPath = base_url("assets/images/add-image.jpg");    ?>

        <img src="<?php echo $imgPath; ?>" class="img-thumbnail" alt="get_started" style="width: 150px;">      
      </div>
    </div>
    <div class="col-sm-10">
    <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="first_title" class="col-sm-2 control-label">First Title *</label>
        <div class="col-sm-10">
          <input type="text" value="<?php echo (isset($result->name))? $result->name : "" ;   ?>" class="form-control" id="first_title" placeholder="First Title" required="required" name="first_title">
           <?php echo form_error('first_title');?>
        </div>
      </div>

      <div class="form-group">
        <label for="second_title" class="col-sm-2 control-label">Second Title *</label>

        <div class="col-sm-10">
           <input type="text" value="<?php echo (isset($result->description))? $result->description : "" ;   ?>" class="form-control" id="second_title" placeholder="Second Title" required="required" name="second_title"> 
           <?php echo form_error('second_title');?>
        </div>
      </div>


      <div class="form-group">
        <label for="uploadFile" class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
          <input id="uploadFile" name="get_started_image" type="file" />
          <span id="error_msg_image" class="text-danger"></span>
        </div>          
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="update_get_started" class="btn btn-danger">Update Now</button>
        </div>
      </div>

    </form>
  </div>
</div>
</section>