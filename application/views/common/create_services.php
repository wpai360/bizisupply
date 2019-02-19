<!-- Main content -->
<section class="content" style="min-height: 600px;">
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
			            <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Testimonial Name"   Value="<?php echo set_value('Name'); ?>" />
					  	<span class="text-danger"><?php echo form_error('Name'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Status *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">			          
							<select class="form-control" id="is_active" name="is_active">								
								<option value="1" selected > Active </option>
								<option value="0"> De-active </option>
							</select>
							<span class="text-danger"><?php echo form_error('is_active'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Description *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">			          
							<textarea id="myTextareacreatetestimonial" name="Description" rows="10" cols="80" placeholder="Add Category Description Here.." ><?php echo set_value('Description'); ?></textarea>
						  	<span class="text-danger"><?php echo form_error('Description'); ?></span>
			          </div>
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="is_active" class="col-sm-2 control-label">Testimonial Image *</label>
			        <div class="col-sm-10">         
			          <div class="col-sm-10">			          
							<input type="file" name="testimonialMainImage" id="uploadFile" />
			          </div>
			        </div>
			      </div>
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-sm-10">
			          <button type="submit" name="addNew_testimonial" class="btn btn-danger">Create Now</button>
			        </div>
			    </div>
  			</form>
  		</div>
  	</div>
</section>
