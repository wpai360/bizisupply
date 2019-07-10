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
	   
      if($common['active'] == 'buyer'){
	   // echo "b";  
	   $userdata = $this->session->userdata('user_buyer_session');
	   
	    $this->db->from('users');
      // $this->db->select('users.buyer_image,users.supplier_image');
      $this->db->select('buyer_image,supplier_image');
      $this->db->where("users.id = $userdata->id");
	   $querys = $this->db->get()->result();  
		
       

		
		 if(isset($querys[0]->buyer_image)){

          $src=base_url('uploads/'.$querys[0]->buyer_image);  
		  }
		
         else{
	     $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
	  
	  }  ?>
    <div class="pull-left image">  
   <img src="<?php echo $src;?>" class="img-circle" alt="User Image"  style="width: 134px;height: 125px;"/>
    </div>  
		 
<?php	  }else
		   
	   { 
	     //echo print_r($querys[0]->supplier_image); die; 
	   
	    if(isset($querys[0]->supplier_image)){
			 
          $src1=base_url('uploads/'.$querys[0]->supplier_image);  
		 }
		
		 else if(empty($querys[0]->supplier_image))   {
			   //echo "s";
		  $src1=base_url('assets/theme/dist/img/user2-160x160.jpg');	 
		    	 
			 
		} ?>
	 <div class="pull-left image">  
	 <img src="<?php echo $src1;?>" class="img-circle" alt="User Image"  style="width: 134px;height: 125px;"/>
  	  </div>
		  
<?php	  }

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
 
 <?php  // print_r($_SESSION['supplier_image']);?>
     
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
       <!-- Logo -->
       <div class="info">
       <h4 style = "margin-left:10px;">Connect Buyer & Supplier</h4>
       </div>
        <div class="pull-left image">

          <?php if($common['user']->image){
            $src=base_url('assets/uploads/profile/'.$common['user']->image);

          }else{
            $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
         }
         ?>
         
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
           <span>New Orders &<br> Orders in process</span>
          </a>
        </li>
		
        <li>
         <!--  <a href="<?php echo base_url('buyer/requestQuotes');?>"> -->
          <a href="<?php echo base_url('buyer/orderHistory');?>">
           <span>Order History</span>
          </a>
        </li>

        <li>
         <!--  <a href="<?php echo base_url('buyer/requestQuotes');?>"> -->
          <a href="<?php echo base_url('buyer/masterList');?>">
           <span>My Hawki Master List</span>
          </a>
        </li>

        <li>
         <!--  <a href="<?php echo base_url('buyer/internalMail');?>"> -->
          <a href="<?php echo base_url('buyer/internalMail');?>">
           <span>Internal mail</span>
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

        <?php }else{
	?>

        <li>
          <a href="<?php echo base_url('supplier/dashboard');?>">
           <span>Orders and Offers</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('supplier/requesthistory');?>">
           <span>Order history</span>
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
