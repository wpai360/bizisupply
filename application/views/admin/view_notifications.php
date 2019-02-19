<section class="content">
	<div class="box box-info">
  		<div class="box-header with-border">
    		<h3 class="box-title">All Notifications List</h3>
		    <div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      			</button>
    		</div>
  		</div>
  		<!-- /.box-header -->
  		<div class="box-body">
    		<div class="table-responsive" id="userList">
		      	<table class="table no-margin">
		        	<thead>
		          		<tr>
		          			<th>Sr.</th>
		          			<th>Notifications</th>				        	
		          		</tr>
		        	</thead>
        			<tbody>
        				<?php //pr($AllNotification); ?>
        				<?php if(!empty($AllNotification)){ ?>
        				<?php $count ='1'; ?>
						<?php foreach( $AllNotification as $key =>$AllNotificationVal): ?>
						<?php $CI =& get_instance();
              				  $CI->load->model('RequestQuotes'); 
              				  $RequestQuotesName = $CI->RequestQuotes->GetRequestQuotesByID($AllNotificationVal->rq_id);
              				  $CI->load->model('User'); 
              				  $UserName = $CI->User->get_user($AllNotificationVal->user_id);
              				  //pr($UserName);
              			?>
        				<tr>
		          			<td><?php echo $count; ?></td>
		          			<td>
		          				<?php 

		          					$noti ="";
		          					if($AllNotificationVal->rq_status == 'rejected'){
									 	$noti .=" has Rejected the RquestQuotes for ".$UserName->name." Buyer";
									}if($AllNotificationVal->rq_status == 'pending'){
										$noti .=" has Request the RquestQuotes for ".$RequestQuotesName->product_name." product";
									}if($AllNotificationVal->rq_status=='awaiting_result'){
										$noti .=" has awaiting for the RquestQuotes from ".$UserName->name." Buyer";
								} ?>


		          				<?php echo $UserName->name.$noti; ?> </td>				        	
		          		</tr> 
		          		<?php $count++; ?>
						<?php endforeach; ?>
						<?php } else { ?>
						<tr><td colspan="2" style="text-align:center;"><h2>There is No Notifications..</h2></td></tr>
						<?php } ?>      
    				</tbody>
  				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
	</div>
</section>