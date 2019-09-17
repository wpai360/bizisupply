  <link rel="stylesheet" href="<?= base_url();?>assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/theme/bower_components/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="<?= base_url();?>assets/css/user/style.css"> 

 <script src="<?= base_url();?>assets/theme/bower_components/jquery/dist/jquery.min.js"></script>


<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>
<header class="header">
    <div class="container"> 
	    <div class="row">
		    <div class="col-sm-4">
				<div class="logo">
					<h1> LOGO</h1>
				</div>
			</div>
			<div class="col-sm-8 menu">
			<ul>
				<li><img src="https://png.icons8.com/color/260/user-male-circle.png" alt="image"></li>
				<li>admin</li>
				<li><a  class="logout" href="<?php echo base_url('logout');?>"><div class="login">Logout</div></a></li>
			</ul>
								
			</div>
		</div>
    </div>
</header>
<section>
    <div class="container"> 
	    <div class="row">
		    <div class="col-sm-6">
				<div class="suyer bg">
					<h1><a href="<?php echo base_url('buyer/login');?>"><div class="login">Buyer</div></a></h1>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="suyer bg-2">
					<h1><a href="<?php echo base_url('supplier/login');?>"><div class="login">Supplier</div></a></h1>
				</div>				
			</div>
		</div>
    </div>
</section>
<footer>
<p>COPYRIGHT 2018 |</p>
</footer>
<style>
.header{
	background-color:#343957;
}
.bg-2{
	background:#343957;
}
.bg{
	background:#5671f2;
} 
.menu ul li {
    display: inline-block;
    color: #ffff;
    padding: 0 0 0 20px;
    font-size: 17px;
	text-transform:uppercase;
}
.suyer {
    margin: 100px;
    padding: 76px 0;
    border: 3px;
    border-radius: 4px;
    text-align: center;
    color: #fff;
}
.menu ul{
	text-align:right;
} 
.menu{
	line-height: 67px;
}
a{
	text-decoration:none;
	color:#fff;
	text-transform:uppercase;
}
a:hover{
	color:#fff;
	text-transform:uppercase;
}
footer {
	    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
    background: #1a6d8b;
    /* padding: 0 0; */
    text-align: center;
    color: #fff;
    /* line-height: 0; */
}
footer  p{
	padding: 10px 0;
	margin-bottom:0px;
	background:#333;
}
h1{
	color:#fff;
}
li img{
	    height: 50px;
}
.logout{
	background: #e2e2e2;
    display: inline-block;
    line-height: 40px;
    padding: 0 10px;
    color: #353637;
    border-radius: 3px;
    text-transform: capitalize;
}
</style>
</body>
</html>


<!---<a href="<?php echo base_url('buyer/login');?>"><div class="login">Buyer</div></a>

<a href="<?php echo base_url('supplier/login');?>"><div class="login">Supplier</div></a>

<a href="<?php echo base_url('logout');?>"><div class="login">Logout</div></a>-->