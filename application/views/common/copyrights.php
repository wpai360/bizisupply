<!-- Main content -->
<section class="content">

 <div class="tab-pane">
  <?php 
      if($this->session->flashdata('message')){
        echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
      }

      //pr($bannerdata);
    ?>    
    <div class="col-sm-12">
    <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="copyrights" class="col-sm-2 control-label">Copyrights *</label>
        <div class="col-sm-8">
          <textarea class="form-control" placeholder="Copyrights" required="required" rows="3" colos="90" name="copyrights"><?php echo (isset($result->description))? $result->description : "" ;   ?></textarea> 
           <?php echo form_error('copyrights');?>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="update_copyrights" class="btn btn-danger">Update Now</button>
        </div>
      </div>

    </form>
  </div>
</div>
</section>