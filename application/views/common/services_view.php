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
  			<div class="box-body">
				<a class="btn btn-success" href="<?php echo base_url('admin/create-service');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Service</a><p>&nbsp;</p>
			
              <table id="customer_listingTable" class="table table-bordered table-striped">
                
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<!--<th>Description</th>
						<th>Banner Image</th>-->
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(!empty($all_data)){ ?>
				<?php $count ='1'; ?>
					<?php foreach( $all_data as $key =>$ServiceValue): ?>   
						<tr>
							<td><?php echo $count; ?></td>
								<td><?php echo $ServiceValue->name; ?></td>
							<!--<td><?php ///echo $ServiceValue->description; ?></td>
						
							<td><img class="rounded-circle" height="60px" width="60px" src="<?php //echo $ServiceValue->Banner_Image;  ?>"/></td>-->
						
							
							<td>
							<?php if($ServiceValue->is_active == '1'): ?>
									<span class="label label-success">Active</span>
							<?php elseif($ServiceValue->is_active == '0'): ?>
									<span class="label label-warning">De-Active</span>
							<?php else: ?>
									<span class="label label-danger"><?php echo $ServiceValue->is_active; ?></span>
							<?php endif; ?>
							</td>
							
							<td>
								<a href="<?php echo base_url('admin/update-service/'.$ServiceValue->services_id.''); ?>"><span class="label label-primary"><i class="fa fa-fw fa-edit"></i></span></a>
								
								<a href="<?php echo base_url('admin/delete-service/'.$ServiceValue->services_id.''); ?>"><span class="label label-danger" onclick="return confirm('Are you sure want to delete this Testimonial ?')" ><i class="fa fa-trash-o"></i></span></a>
								
							</td>
						</tr>
						
						
					<?php $count++; ?>
					<?php endforeach; ?>		
				
				<?php } else { ?>
						<tr><td colspan="8" style="text-align:center;"><h2>There is no Record..</h2></td></tr>
				<?php } ?>		
				</tbody> 
				<tfoot>
                <tr>
				<th>Sr.</th>
						<th>Name</th>
						<!---<th>Description</th>
						<th>Banner Image</th>-->
						<th>Status</th>
						<th>Action</th>
                </tr>
                </tfoot>
				
              </table>
            </div>
  		</div>
  	</div>
</section>