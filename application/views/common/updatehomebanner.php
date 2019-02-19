<!-- Main content -->
<section class="content">
	<div class="tab-pane" id="profile">
  	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}

    	//pr($bannerdata);
   	?>
  		<div class="col-sm-12">
  			<form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 
		      <div class="form-group">
		       <label for="bannerTitle" class="col-sm-2 control-label">Banner Title*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="text" class="form-control" id="bannerTitle" name="bannerTitle" placeholder="Enter Banner Title"   Value="<?php echo $bannerdata[0]->bannerTitle; ?>" />
						<span class="text-danger"><?php echo form_error('bannerTitle'); ?></span>
		          </div>
		        </div>
		      </div>
		      <div class="form-group">
		       <label for="video_url" class="col-sm-2 control-label">Video Url*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="text" class="form-control" id="video_url" name="video_url" placeholder="Enter Banner Video Url"   Value="<?php echo $bannerdata[0]->video_url; ?>" />
						<span class="text-danger"><?php echo form_error('video_url'); ?></span>
		          </div>
		        </div>
		      </div>
		      <!-- <div class="form-group">
		       <label for="bannerDescription" class="col-sm-2 control-label">Banner Description*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<textarea id="bannerDescription" name="bannerDescription" rows="8" cols="90" placeholder="Add Banner Description Here.."   ><?php  echo set_value('bannerDescription'); ?></textarea>
									<span class="text-danger"><?php echo form_error('bannerDescription'); ?></span>
		          </div>
		        </div>
		      </div> -->
		      <div class="form-group">
		       <label for="banner_isActive" class="col-sm-2 control-label">Banner Status*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<select class="form-control" id="banner_isActive" name="banner_isActive" >
							<option value="1" <?php if($bannerdata[0]->banner_isActive==1){ ?> selected="selected" <?php } ?>> Active </option>
							<option value="0" <?php if($bannerdata[0]->banner_isActive==0){ ?> selected="selected" <?php } ?>> De-active </option>
						</select>
						<span class="text-danger"><?php echo form_error('banner_isActive'); ?></span>
		          </div>
		       	</div>
		      </div>
		      <div class="form-group">
		       <label for="banner_isActive" class="col-sm-2 control-label">Banner Image*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<img src="<?php echo base_url();?>assets/uploads/homebanner/<?php echo $bannerdata[0]->image; ?> " alt="Image" class="media-object img-rounded thumb48"  width="500" height="180">
		          </div>
		       	</div>
		      </div>	
		      <div class="form-group">
		       <label for="banner_isActive" class="col-sm-2 control-label">Banner Image*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="file" id="uploadFile" name="banner_images" />
		            	<span id="error_msg_image" class="text-danger"></span>
						<span class="text-danger"><?php //echo form_error('banner_isActive'); ?></span>
		          </div>
		       	</div>
		      </div>		          
		      <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		          <button type="submit" class="btn btn-danger" name="updateHomeBanner">Submit</button>
		        </div>
		      </div>
    		</form>
  		</div>
  	</div>
</section>