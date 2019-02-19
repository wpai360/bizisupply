<!-- Main content -->
<section class="content">
	<div class="tab-pane" id="profile">
		<?php 
    	if($this->session->flashdata('message')){
    		echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    	}
   	?>
  		<div class="col-sm-12">
  			<div class="box-body">							
				<!-- <a class="btn btn-success" href="<?php echo base_url('admin/create-banner');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Banner</a> -->
				<table id="customer_listingTable-stop_data_tbl" class="table table-bordered table-striped">						
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Image</th>
							<th>Title</th>
							<th>Is Active</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if(!empty($homeBanner)){ ?>
					<?php $count =  1; ?>
					<?php foreach( $homeBanner as $banner): ?>   
						<tr>
							<td><?php echo $count; ?></td>
							
							<td>
								<img class="img-square" height="60px" width="60px" src="<?php if(!empty($banner->image)){echo base_url("/assets/uploads/homebanner/thumbnail/$banner->image");}else{echo base_url("assets/frontend/images/no-image.jpg");}?>"/>
							</td>
							
							<td><?php echo $banner->bannerTitle; ?></td>
							<td>
								<?php echo ($banner->banner_isActive == true)? '<span class="label label-success">Active</span>' : '<span class="label label-danger">De-Active</span>'; ?></td>
							
							<td>
							<a title="EDIT" href="<?php echo base_url('admin/banner-update/'.$banner->bid.''); ?>">
								<span class="label label-primary">
									<i class="fa fa-fw fa-edit"></i>
								</span>
							</a>
							&nbsp;&nbsp;
							<a title="DELETE" href="<?php echo base_url('admin/banner-delete/'.$banner->bid.''); ?>">
									<span class="label label-danger" onclick="return confirm('Are you sure want to delete this banner?')">
										<i class="fa fa-trash-o"></i>
									</span>
							</a>
							</td>
							
						</tr>
					<?php $count++; ?>
					<?php endforeach; ?>		
					
					<?php } else { ?>
						<tr>
							<td colspan="8" style="text-align:center;"><h2>There is no Banner record to display..</h2></td></tr>
					<?php } ?>		
					</tbody>
				</table>
			</div>
  		</div>
  	</div>
</section>