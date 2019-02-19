<!-- Main content -->
<section class="content">
	<div class="tab-pane">
		<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}
   	?>
  	
  		<div class="col-sm-12">
  			<div class="box-body">							
				<a class="btn btn-success" href="<?php echo base_url('admin/create-category');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Category</a><br><br>
				<table id="category_listingTable" class="table table-bordered table-striped">						
					<thead>
						<tr>
							<th>Sr.</th>							
							<th>Category Name</th>
							<th>Action</th>						
						</tr>
					</thead>
					<tbody>
					<?php if(!empty($category)){ ?>
					<?php $count =  1; ?>
					<?php foreach( $category as $categoryVal): ?>   
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $categoryVal->name; ?></td>
							<td>
							<a title="EDIT" href="<?php echo base_url('admin/update-category/'.$categoryVal->id.''); ?>">
								<span class="label label-primary">
									<i class="fa fa-fw fa-edit"></i>
								</span>
							</a>
							&nbsp;&nbsp;
							<a title="DELETE" href="<?php echo base_url('admin/delete-category/'.$categoryVal->id.''); ?>">
									<span class="label label-danger" onclick="return confirm('Are you sure want to delete this Category?')">
										<i class="fa fa-trash-o"></i>
									</span>
							</a>
							</td>
						</tr>
					<?php $count++; ?>
					<?php endforeach; ?>
					<?php } else { ?>
						<tr>
							<td colspan="8" style="text-align:center;"><h2>There is no Category record to display..</h2></td>
						</tr>
					<?php } ?>		
					</tbody>
				</table>
			</div>
  		</div>
  	</div>
</section>