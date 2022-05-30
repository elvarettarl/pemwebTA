<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title  -->
	<title>Moklet Market 00</title>

	<!-- Favicon  -->
	<link rel="icon" href="<?= base_url() ?>assets/img/core-img/favicon.ico">

	<!-- Core Style CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/core-style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/style.css">

</head>

<body>
	<!-- ##### Header Area Start ##### -->
	<header class="header_area">
		<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
			<!-- Classy Menu -->
			<nav class="classy-navbar" id="essenceNav">
				<!-- Logo -->
				<a class="nav-brand" href="<?= base_url() ?>Dashboard"><img
						src="<?= base_url() ?>assets/img/core-img/TSS-10-10.png" alt=""></a>
				<!-- Navbar Toggler -->
				<div class="classy-navbar-toggler">
					<span class="navbarToggler"><span></span><span></span><span></span></span>
				</div>
				<!-- Menu -->
				<div class="classy-menu">
					<!-- close btn -->
					<div class="classycloseIcon">
						<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
					</div>
					<!-- Nav Start -->
					<div class="classynav">
						<ul>
							<li><a href="#">Category</a>
								<div class="megamenu">
									<ul class="single-mega cn-col-4">
										<li><a href="<?= base_url() ?>kategori/makananminuman">Makanan & Minuman</a>
										</li>
									</ul>
									<ul class="single-mega cn-col-4">
										<li><a href="<?= base_url() ?>kategori/pakaian">Pakaian</a></li>
									</ul>
									<ul class="single-mega cn-col-4">
										<li><a href="<?= base_url() ?>kategori/kecantikan">Kecantikan</a></li>
									</ul>
									<ul class="single-mega cn-col-4">
										<li><a href="<?= base_url() ?>kategori/peralatanatk">Peralatan ATK</a></li>
									</ul>
								</div>
							</li>

							<?php if ($_SESSION['id_level'] == 3) : ?>
							<li><a href="<?= base_url()?>produk">My Product</a></li>
							<li><a href="<?= base_url()?>tabel/histori_penjual">Histori Penjualan</a></li>
							<?php endif; ?>
							
							<?php if ($_SESSION['id_level'] == 2) : ?>
							<li><a href="<?= base_url()?>tabel/histori_pembeli">Histori Pembelian</a></li>
							<?php endif; ?>

							<?php if ($_SESSION['id_level'] == 1) : ?>
							<li>
								<a href="#">Table</a>
								<ul class="dropdown">
									<li><a href="<?=base_url();?>tabel/produk">Produk</a></li>
									<li><a href="<?=base_url();?>tabel/user_admin">Admin</a></li>
									<li><a href="<?=base_url();?>tabel/user_pembeli">Pembeli</a></li>
									<li><a href="<?=base_url();?>tabel/user_penjual">Penjual</a></li>
                                    <li><a href="<?=base_url();?>tabel/level">User Level</a></li>
                                    <li><a href="<?=base_url();?>tabel/kategori">Kategori</a></li>
                                    <li><a href="<?=base_url();?>tabel/histori_admin">Histori</a></li>
								</ul>

							</li>
							<?php endif; ?>
						</ul>
					</div>
					<!-- Nav End -->
				</div>
			</nav>

			<!-- Header Meta Data -->
			<div class="header-meta d-flex clearfix justify-content-end">
				<!-- Search Area -->
				<div class="search-area" style="width:500px;">
					<form action="#" method="post">
						<input type="search" name="search" id="headerSearch" placeholder="Type for search">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<!-- User Login Info -->
				<div class="user-login-info">
					<a href="<?= base_url() ?>login/logout"><img src="<?= base_url() ?>assets/img/core-img/user.svg"
							alt=""></a>
				</div>
				<!-- Cart Area -->
				<?php if ($_SESSION['id_level'] == 2) : ?>
				<div class="cart-area">
					<a href="#" id="essenceCartBtn"><img src="<?= base_url() ?>assets/img/core-img/bag.svg" alt="">
						<span><?= count($this->cart->contents()) ?></span></a>
				</div>
				<?php endif; ?>
			</div>

		</div>
	</header>
	<!-- ##### Header Area End ##### -->

	<!-- ##### Right Side Cart Area ##### -->
	<div class="cart-bg-overlay"></div>

	<?php if ($_SESSION['id_level'] == 2) : ?>
	<div class="right-side-cart-area">

		<!-- Cart Button -->
		<div class="cart-button">
			<a href="#" id="rightSideCart"><img src="<?= base_url() ?>assets/img/core-img/bag.svg" alt="">
				<span><?= count($this->cart->contents()) ?></span></a>
		</div>

		<div class="cart-content d-flex">

			<!-- Cart Summary -->
			<div class="cart-amount-summary">

				<h2>ORDER</h2>
				<div style="margin-top:-80px;">
				<p>Nama </p> 
				<div class="input-group flex-nowrap">
				  <input type="text" value="<?=$_SESSION['nama_pembeli']?>"  disabled style="margin-top:-20px;" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
				</div>
				<p>Kelas </p> 
				<div class="input-group flex-nowrap">
				  <input type="text" value="<?=$_SESSION['kelas']?>"  disabled style="margin-top:-20px;" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">
				</div>
				</div>
				<?php $total = 0; ?>
				<table class="table">
					<thead>
					<tr>
						<th scope="col">Produk</th>
						<th scope="col">Harga</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Hapus</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($this->cart->contents() as $d ) : ?>
					<form action="<?= base_url('produk/updatecart') ?>" method="POST" enctype="multipart/form-data">
					<tr>
						<td><?= $d['name'] ?></td>
						<td><?= $d['price'] ?></td>
						<td>
							<input type="number" style="width:30px;" name="cart[<?= $d['id'] ?>][qty]" value="<?= $d['qty'] ?>" min="0">	
						</td>
						<td><a href="<?= base_url('produk/deletecart/'.$d['rowid'])?>" class="btn btn-danger fa fa-trash"></a></td>
					</tr>
						<input type="hidden" name="cart[<?= $d['id'] ?>][id]" value="<?= $d['id'] ?>">
						<input type="hidden" name="cart[<?= $d['id'] ?>][name]" value="<?= $d['name'] ?>">
						<input type="hidden" name="cart[<?= $d['id'] ?>][rowid]" value="<?= $d['rowid'] ?>">
						<input type="hidden" name="cart[<?= $d['id'] ?>][price]" value="<?= $d['price'] ?>">
						<?php $total += ($d['price'] * $d['qty'])  ?>
						<?php endforeach; ?>
					</tbody>
						</table>
						<button style="" id="btn btn-success">UBAH</button> <br> <br>
					</form>
				
				<ul class="summary-table">
					<li><span>subtotal:</span> <span>Rp. <?= $total ?></span></li>
					<!-- <li><span>discount:</span> <span>-15%</span></li> -->
					<!-- <li><span>total:</span> <span>$232.00</span></li> -->
				</ul>
				<div class="checkout-btn mt-100" style>
					<a href="#" onclick="return checkout();" class="btn essence-btn">check out</a>
				</div>	
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- ##### Right Side Cart End ##### -->

	<?php
      $this->load->view($content);
    ?>

	<!-- ##### Footer Area Start ##### -->
	<footer class="footer_area clearfix">
		<div class="container">
			<div class="row">
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area d-flex mb-30">
						<!-- Logo -->
						<div class="footer-logo mr-50">
							<a href="#"><img src="<?= base_url() ?>assets/img/core-img/TSS-10-10.png" alt=""></a>
						</div>
						<!-- Footer Menu -->
						<div class="footer_menu">
							<ul>
								<li><a href="shop.html">Shop</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area mb-30">
						<ul class="footer_widget_menu">
							<li><a href="#">Order Status</a></li>
							<li><a href="#">Payment Options</a></li>
							<li><a href="#">Shipping and Delivery</a></li>
							<li><a href="#">Guides</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Use</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row align-items-end">
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area">
						<div class="footer_heading mb-30">
							<h6>Subscribe</h6>
						</div>
						<div class="subscribtion_form">
							<form action="#" method="post">
								<input type="email" name="mail" class="mail" placeholder="Your email here">
								<button type="submit" class="submit"><i class="fa fa-long-arrow-right"
										aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
				</div>
				<!-- Single Widget Area -->
				<div class="col-12 col-md-6">
					<div class="single_widget_area">
						<div class="footer_social_area">
							<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
									class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
									class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
									class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
									class="fa fa-pinterest" aria-hidden="true"></i></a>
							<a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
									class="fa fa-youtube-play" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-12 text-center">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());

						</script> All rights reserved | This template is made with <i class="fa fa-heart-o"
							aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- ##### Footer Area End ##### -->

	<!-- jQuery (Necessary for All JavaScript Plugins) -->
	<script src="<?= base_url() ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<!-- Plugins js -->
	<script src="<?= base_url() ?>assets/js/plugins.js"></script>
	<!-- Classy Nav js -->
	<script src="<?= base_url() ?>assets/js/classy-nav.min.js"></script>
	<!-- Active js -->
	<script src="<?= base_url() ?>assets/js/active.js"></script>
	<script>
		function checkout() {
			$.ajax({
				url: "<?= base_url('') ?>produk/checkout",
				method: "GET",
				success: function (res) {
					window.location.reload();
				}
			});
		}

	</script>
</body>

</html>
