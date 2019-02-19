<!-- Main content -->
<section class="content">
	<div class="tab-pane">
	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}
   	?>
  		<div class="col-sm-12">
  			<form class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
	  			<div class="form-group">
			       <label for="typesName" class="col-sm-2 control-label">Types Name *</label>
			        <div class="col-sm-10"> 
			          <div class="col-sm-8">		          	
			            	<input type="text" class="form-control" id="typesName" name="typesName" placeholder="Enter Type Name"   Value="<?php echo set_value('typesName'); ?>" />
							<span class="text-danger"><?php echo form_error('typesName'); ?></span>
			          </div>
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-sm-10">
			          <button type="submit" class="btn btn-danger" name="AddNewTypes">Add New</button>
			        </div>
			    </div>
  		</form>
  		</div>
  	</div>
</section>