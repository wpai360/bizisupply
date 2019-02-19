
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
    <?php 
    if($result && $result->image){
     $src=base_url('assets/uploads/profile/'.$result->image);
    
    }else{
   $src=base_url('assets/images/empty.png');
    }
?>
      <img src="<?= $src;?>" class="img-thumbnail" alt="Logo" style="width: 150px;">
    
    </div>
  </div>
  <div class="col-sm-10">

  <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 


      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
          <input type="text" value="<?php if($result && $result->name){ echo $result->name;}?>" class="form-control" id="inputName" placeholder="name" required="required" name="name">
           <?php echo form_error('name');?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Description</label>

        <div class="col-sm-10">
          <textarea class="form-control" placeholder="description" required="required" name="description"><?php if($result && $result->description){ echo $result->description;}?></textarea> 
           <?php echo form_error('description');?>
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