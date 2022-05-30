<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">

			</div>
		</div>
		<div class="page-title text-center">
			<h2>Kecantikan</h2>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-8 col-lg-9">
				<div class="shop_grid_product_area">
					<div class="row">
						<div class="col-12">
							<div class="product-topbar d-flex align-items-center justify-content-between">
								<!-- Total Products -->
								<!-- <div class="total-products">
                                        <p><span>186</span> products found</p>
                                    </div> -->
							</div>
						</div>
					</div>

					<div class="row">

						<?php $no=0; ?>
						<?php foreach ($produk as $pr) : ?>
						<?php $no++; ?>
						<!-- Single Product -->
						<div class="col-12 col-sm-6 col-lg-4">
							<div class="single-product-wrapper">
								<!-- Product Image -->
								<div class="product-img">
									<img src="<?= base_url('assets/img/product-img/'.$pr->gambar);?>" alt="">
									<!-- Favourite -->
									<!-- <div class="product-favourite">
                                            <a href="<?=base_url('produk/hapus/'.$pr->id_produk)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')">&times;</a>
                                        </div> -->
								</div>
								<!-- Product Description -->
								<div class="product-description">
									<span><?=$pr->nama_penjual?></span>
									<a>
										<h6><?=$pr->nama_produk?></h6>
									</a>
									<p>Rp. <?=$pr->harga?></p>
									Stok: <?=$pr->stok?> <br>
									Deskripsi : <?=$pr->deskripsi?>

									<?php if ($_SESSION['id_level'] == 2) : ?>
									<!-- Hover Content -->
									<div class="hover-content">
										<!-- Add to Cart -->
										<div class="add-to-cart-btn">
											<a href="" class="btn essence-btn" data-toggle="modal" onclick="add(<?= $pr->id_produk ?>, <?= $pr->harga ?>, '<?= $pr->nama_produk ?>')">Add To cart</a>
										</div>
									</div>
									<?php endif; ?>

								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
    function add(id_produk, harga, nama_produk) {
        $.ajax({
            url: "<?= base_url('') ?>produk/addcart",
            method: "POST",
            data: {
                "id_produk" : id_produk,
                "harga" : harga,
                "nama_produk" : nama_produk 
            },
            success: function (res) {
				window.location.reload();
                // console.log(res);
            }
        });
    }
</script>