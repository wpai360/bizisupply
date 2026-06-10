<!-- Main content -->
<section class="content">
	<div class="tab-pane" id="profile">
  	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}
   	?>
  		<div class="col-sm-12">
  			<form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 
		      <div class="form-group">
		       <label for="bannerTitle" class="col-sm-2 control-label">Banner Title*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="text" class="form-control" id="bannerTitle" name="bannerTitle" placeholder="Enter Banner Title"   Value="<?php echo set_value('bannerTitle'); ?>" />
						<span class="text-danger"><?php echo form_error('bannerTitle'); ?></span>
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
							<option value="1" selected=""> Active </option>
							<option value="0"> De-active </option>
						</select>
						<span class="text-danger"><?php echo form_error('banner_isActive'); ?></span>
		          </div>
		       	</div>
		      </div>
		      <div class="form-group">
		       <label for="banner_isActive" class="col-sm-2 control-label">Banner Image*</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="file" id="banner_images" name="banner_images" />
						<span class="text-danger"><?php //echo form_error('banner_isActive'); ?></span>
		          </div>
		       	</div>
		      </div>		          
		      <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		          <button type="submit" class="btn btn-danger" name="addNewBanner">Submit</button>
		        </div>
		      </div>
    		</form>
  		</div>
  	</div>
</section>