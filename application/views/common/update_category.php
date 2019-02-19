<!-- Main content -->
<section class="content">
	<div class="tab-pane" id="profile">
  	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}

    	//pr($category);
   	?>
   	<a class="btn btn-success" href="<?php echo base_url('admin/category');?>"><i class="fa fa-reply"></i>&nbsp;&nbsp;Backto Category</a><br><br>
   	<div class="col-sm-12">
  		<form class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
  			 <div class="form-group">
		       <label for="categoryName" class="col-sm-2 control-label">Category Name *</label>
		        <div class="col-sm-10"> 
		          <div class="col-sm-8">		          	
		            	<input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name"   Value="<?php echo (isset($category->name))? $category->name : "" ;   ?>" />
						<span class="text-danger"><?php echo form_error('categoryName'); ?></span>
		          </div>
		        </div>
		      </div>
		     <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		          <button type="submit" class="btn btn-danger" name="updateCategory">Update</button>
		        </div>
		      </div>
  		</form>
  	</div>
  </div>
</section>