<!DOCTYPE HTML>
<html>
<head>
<title>Login Moklet Market</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?= base_url(); ?>/assets/login/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?= base_url(); ?>/assets/login/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?= base_url(); ?>/assets/login/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?= base_url(); ?>/assets/js/login/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>/assets/login/js/bootstrap.min.js"></script>
</head>
<body id="login">
    <div class="app-cam">
	    <form action="<?=base_url()?>login/proses_login_penjual" method="post">
        <h2 class="form-heading">login Penjual</h2>
		<input type="text" class="form-control1" placeholder="Username" name="email_penjual" required>
    <input type="password" class="form-control1" placeholder="Password" name="password" required>
			<div class="submit"><input type="submit" onclick="myFunction()" value="Login"></div>
			<?php if ($this->session->flashdata('pesan')!=null):?><div class="alert alert-warning" style="margin-top:10px;"><?=$this->session->flashdata('pesan');?></div> <?php endif?>
		    <ul class="new">
				<li style="margin-left:70px;"><p class="sign">Login Sebagai Pembeli? <a href="<?= base_url(); ?>login/pembeli"> Login</a></p></li>
			    <li style="margin-left:140px;"><p class="sign">New here ?</p></li>
				<li style="margin-left:60px;"><p class="sign"><a href="<?= base_url(); ?>register/pembeli"> Register Pembeli</a> / <a href="<?= base_url(); ?>register/penjual"> Register Penjual</a></p></li>
			    <div class="clearfix"></div>
		    </ul>
		</form>
    </div>
</body>
</html>
