<!-- Main content -->
<section class="content" style="min-height: 600px;">
	<div class="tab-pane">
  	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}

    	//pr($all_data);
      $imgPath = base_url('assets/uploads/partners_logo/').$all_data->pl_file_name;
   	?>
   	<div class="col-sm-3">
      <div class="pull-right image">
        <img src="<?php echo $imgPath; ?>" width="150" height="150">    
      </div>
     </div>
    <div class="col-sm-9">
      <form id="part_logo" class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="uploadFile" class="col-sm-2 control-label">Partner's Logo</label>
              <div class="col-sm-10">
                <input id="uploadFile" name="update_partner_logo" type="file" />
                <span class="text-danger"><?php echo form_error('update_partners_logo'); ?></span>
                <span id="error_msg_image" class="text-danger"></span>
              </div>          
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="update_partners_logo" class="btn btn-danger">Update</button>
              </div>
            </div>
        </form>
    </div> 
  </div>
</section>