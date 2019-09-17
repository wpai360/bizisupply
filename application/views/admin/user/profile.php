<div class="col-md-3">
	
	   <?php if($user->image){
        $src=base_url('assets/uploads/profile/'.$userProfile->image);
    
    }else{
   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
    }
?>

	<div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive rounded-circle" src="<?= $src;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo ucfirst($userProfile->username);?></h3>

              <p class="text-muted text-center">Buyer/Supplier</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Buyer</b> <a class="pull-right"></a>
                </li>
                <li class="list-group-item">
                  <b>Supplier</b> <a class="pull-right"></a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Account</b></a>
            </div>
            <!-- /.box-body -->
          </div>

</div>

<div class="col-sm-12 col-md-9">
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            <?php echo ucfirst($userProfile->username);?>
                        </h4>
                        <div class="media">
                         
                            <div class="media-body">
                                <div class="clearfix">
                                    <p class="pull-right">
                                        <a href="#">
                                            Supplier Account
                                        </a><br/>
                                        <a href="#">
                                            Buyer Account
                                        </a>
                                    </p>

                                    <h4 style="margin-top: 0">Email ─ <?php echo $userProfile->email;?></h4>

                                 <h4 style="margin-top: 0">Status ─ <?php if($userProfile->verify == 1){
                                 	echo 'Active';}else{
                                 		echo 'InActive';
                                 		}?></h4>
                                    <p style="margin-bottom: 0">
                                        <i class="fa fa-shopping-cart margin-r5"></i> 100+ purchases
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>