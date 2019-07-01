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
					<br>
	<div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Category Name</label>
    <div class="col-md-4">
        <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple">
            <option value="cheese">T-sirt</option>
            <option value="tomatoes">cock</option>
            <option value="mozarella">Table</option>
          
        </select>
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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>	
	
	
</section>