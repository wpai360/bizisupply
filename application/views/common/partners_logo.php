<!-- Main content -->
<section class="content" style="min-height: 600px;">
	<div class="tab-pane">
  	<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}

    	//pr($bannerdata);
   	?>
   	<div class="col-sm-2">
      <div class="pull-right image">
        
    
      </div>
    </div>
	   	<div class="col-sm-10">	   		
	   		<form id="part_logo" class="form-horizontal formPost" method="POST" enctype="multipart/form-data">
	   			<div class="form-group">
			        <label for="uploadFile" class="col-sm-2 control-label">Partner's Logo</label>
			        <div class="col-sm-10">
			          <input id="uploadFile" name="partners_logo[]" multiple type="file" />
			          <span class="text-danger"><?php //echo form_error('partners_logo[]'); ?></span>
			          <span id="error_msg_image" class="text-danger"></span>
			        </div>          
		        </div>
		        <div class="form-group">
        			<div class="col-sm-offset-2 col-sm-10">
          				<button type="submit" name="upload_partners_logo" class="btn btn-danger">Upload</button>
        			</div>
      			</div>
	   		</form>
	   	</div>
   	</div>
   	<div class="tab-pane pl_img_view">
   		<div class="col-sm-12">
        <div class="pl-img-row">
   			<?php //pr($all_data); 
   				if($all_data){
   				foreach ($all_data as $partners_logo) {
   					$imgPath = base_url('assets/uploads/partners_logo/').$partners_logo->pl_file_name;

   					//pr($imgPath);
   				 ?>
					<div class="col-sm-3 pl-img">
						<img src="<?php echo $imgPath; ?>" width="150" height="150">
						<a class="pl_update" href="<?php echo base_url('admin/update-partner-logo/'.$partners_logo->pl_id.''); ?>"><span class="label label-primary"><i class="fa fa-fw fa-edit"></i></span></a>
						<a class="pl_delete" href="<?php echo base_url('admin/delete-partner-logo/'.$partners_logo->pl_id.''); ?>"><span class="label label-danger" onclick="return confirm('Are you sure want to delete this Logo ?')" ><i class="fa fa-trash-o"></i></span></a>

					</div>
   			<?php	}
   				}else{
   					echo "<h1> No Partners Logo to Display</h1>";
   				}
   			?>
   			</div>
   		</div>
   	</div>
   	
</section>