 <section class="sidebar">
<?php $uri = $this->uri->segment(1);
  $userdata = $this->session->userdata('user_buyer_session');
 $user_idd = $userdata->id;
     
     $this->db->from('users');
     $this->db->select('users.supplier_image,users.buyer_image');
       $this->db->where("users.id = $user_idd");
     $querys = $this->db->get()->result();

       //$querys = $this->db->row();
       //->row();
       // echo "<pre>"; print_r($userdata->id); die;
       
      if ($common['active'] == 'buyer') {
          // echo "b";
          $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
        
          if ($querys[0]->buyer_image) {
              $src=base_url('uploads/'.$querys[0]->buyer_image);
          } ?>
    <div class="pull-left image">  

   <img src="<?php echo $src; ?>" class="rounded-circle" alt="User Image"  style="width: 134px;height: 125px;"/>
    </div>  
		 
<?php
      } else {
          $src1=base_url('assets/theme/dist/img/user2-160x160.jpg');
          if ($querys[0]->supplier_image) {
              $src1=base_url('uploads/'.$querys[0]->supplier_image);
          } ?>
	 <div class="pull-left image">  
	 <img src="<?php echo $src1; ?>" class="rounded-circle" alt="User Image"  style="width: 134px;height: 125px;"/>
  	  </div>
		  
<?php
      }

?>


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
      <?php
      
      if ($common && $common['active'] == 'buyer') {
          $base =  base_url('buyer/profile');
          $name = 'Buyer';
      } else {
          $base =  base_url('supplier/profile');
          $name = 'Supplier';
      }
        ?>
     <a href="<?php echo $base;?>">


     <div class="user-panel">
       <!-- Logo -->
       <div class="info">
       <h4 style = "font-size:20px;">Connect Buyer & Supplier</h4>
       </div>
        <div class="pull-left image">

          <?php if ($common['user']->image) {
            $src=base_url('assets/uploads/profile/'.$common['user']->image);
        } else {
            $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
        }
         ?>
         
	   </div>
		
        <div class="pull-left info">
          <p><?php if ($common['user']->username) {
             echo ucfirst($common['user']->username);
         } else {
             echo "Admin";
         }?></p>

          <span class="text-center diff">(<?php echo $name;?>)</span>
        </div>
      </div>
      </a>
   
      <ul class="sidebar-menu"  data-widget="tree">
       

       

    <?php  if ($common && $common['active'] == 'buyer') {
             ?>

      
<li >
          <a href="<?php echo base_url('buyer/masterList'); ?>">
           <span style="font-weight:bold;font-size:18px;"><?php  echo ucfirst($common['user']->username);?>'s Master List</span>
          </a>
        </li>
		
		<li>
          <a href="<?php echo base_url('buyer/buyerOrderDashboard'); ?>">
           <span style="font-size:18px;">New Orders &<br> Orders in process</span>
          </a>
        </li>
    

        <li>
          <a href="<?php echo base_url('buyer/orderHistory'); ?>">
           <span style="font-size:18px;">Order History</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('buyer/preferredSupplier'); ?>">
            <span style="font-size:18px;">Preferred Supplier</span>
          </a>
        </li>                                                           

        <?php
         } else {
             ?>

        <li>
          <a href="<?php echo base_url('supplier/dashboard'); ?>">
           <span style="font-size:18px;">Orders and Offers</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('supplier/offerhistory'); ?>">
           <span style="font-size:18px;">Offer History</span>
          </a>
        </li>
        
        <!--<li>
		  <a href="<?php echo base_url('supplier/orders'); ?>">
		   <span>Order</span>
		  </a>
        </li>-->

        <?php
         }?>
      </ul>
    </section>
