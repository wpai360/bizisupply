 <section class="sidebar">

 <ul class="nav navbar-nav">
    <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                    page and may cause design problems
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
 </ul>
      <!-- Sidebar user panel -->
      <?php if($common && $common['active'] == 'buyer'){
        $base =  base_url('buyer/profile');
        $name = 'Buyer';
              }else{
        $base =  base_url('supplier/profile');
        $name = 'Supplier';
              }
        ?>
     <a href="<?php echo $base;?>">

     <div class="user-panel">
        <div class="pull-left image">

          <?php if($common['user']->image){
            $src=base_url('assets/uploads/profile/'.$common['user']->image);

          }else{
           $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
         }
         ?>
          <img src="<?= $src;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if($common['user']->username){echo ucfirst($common['user']->username); }else {echo "Admin";}?></p>
          <i class="fa fa-circle text-success"></i> Online <br/>
          <span class="text-center diff">(<?php echo $name;?>)</span>
        </div>
      </div>
      </a>
   
      <ul class="sidebar-menu" data-widget="tree">
       

       

    <?php  if($common && $common['active'] == 'buyer'){ ?>

      
		
		<li>
         <!--  <a href="<?php echo base_url('buyer/requestQuotes');?>"> -->
          <a href="<?php echo base_url('buyer/buyerOrderDashboard');?>">
           <span>New Orders & Orders in process</span>
          </a>
        </li>
		
		 <li>
         <!--  <a href="<?php echo base_url('buyer/requestQuotes');?>"> -->
          <a href="<?php echo base_url('buyer/orderHistory');?>">
           <span>Order History</span>
          </a>
        </li>
		<!--
		<li>
          <a href="<?php echo base_url('buyer/dashboard');?>">
           <span>Dashboard</span>
          </a>
        </li>
		
        <li>
         <!--  <a href="<?php echo base_url('buyer/requestQuotes');?>"> 
          <a href="<?php echo base_url('buyer/view-requestQuotes');?>">
           <span>Request for Quotes</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('buyer/orderPlaced');?>">
           <span>Orders Placed</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('buyer/suppliers');?>">
           <span>Suppliers</span>
          </a>
        </li>

-->

        <?php }else{ ?>

        <li>
          <a href="<?php echo base_url('supplier/dashboard');?>">
           <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('supplier/responseQuote');?>">
           <span>Response Quote</span>
          </a>
        </li>
        
        <!--<li>
		  <a href="<?php echo base_url('supplier/orders');?>">
		   <span>Order</span>
		  </a>
        </li>-->

        <?php }?>
      </ul>
    </section>
