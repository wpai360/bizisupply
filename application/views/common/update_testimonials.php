<!-- Main content -->
<section class="content" style="min-height: 650px;">
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
			        <label for="Name" class="col-sm-2 control-label">Name *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">
			            <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Testimonial Name"   Value="<?php echo (isset($single_data->name))? $single_data->name : "" ;   ?>" />
					  	<span class="text-danger"><?php echo form_error('Name'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Status *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">			          
							<select class="form-control" id="is_active" name="is_active">								
								<option value="1" <?php echo (isset($single_data->is_active) && $single_data->is_active=='1')? "selected":""; ?>> Active </option>
								<option value="0" <?php echo (isset($single_data->is_active) && $single_data->is_active=='0')? "selected":""; ?> > De-active </option>
							</select>
							<span class="text-danger"><?php echo form_error('is_active'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Description *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">			          
							<textarea id="myTextareacreatetestimonial" name="Description" rows="10" cols="80" placeholder="Add Category Description Here.." ><?php echo (isset($single_data->description))? $single_data->description : "" ;   ?></textarea>
						  	<span class="text-danger"><?php echo form_error('Description'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Testimonial Image *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-6">
			          	<input type="file" name="testimonialMainImage" id="uploadFile" />
			          	<span id="error_msg_image" class="text-danger"></span>
			          </div>
			          	<div class="col-sm-4">
			          		<?php (!empty($single_data->upload_image)) ? $imgPath = base_url('assets/uploads/testimonials_images/').$single_data->upload_image  : $imgPath = base_url("assets/images/add-image.jpg");    ?>
			          		<img class="previewimg" height="130px" width="130px"  src="<?php echo $imgPath; ?>" alt="Testimonial-image" id="upload_post_image"> 
			          </div>
			        </div>
			      </div>
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-sm-10">
			          <button type="submit" name="update_testimonial" class="btn btn-danger">Update Now</button>
			        </div>
			    </div>
  			</form>
  		</div>
  	</div>
</section>