<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                   
                </div>
            </div>
                <div class="page-title text-center">
                    <h2>Toko Saya</h2>
                </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Option</h6>
                            <a href="#tambah" data-toggle="modal">Tambah Produk</a>
                        </div>
                    </div>
                </div>

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

                            <?php
                                $no=0;
                                foreach ($produk as $pr) {
                                    $no++;?>

                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/img/product-img/'.$pr->gambar);?>" alt="">
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="<?=base_url('produk/hapus/'.$pr->id_produk)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')">&times;</a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span><?=$pr->nama_penjual?></span>
                                        <a><h6><?=$pr->nama_produk?></h6></a>
                                        <p>Rp. <?=$pr->harga?></p>
                                        Stok: <?=$pr->stok?> <br>
                                        Deskripsi : <?=$pr->deskripsi?>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#ubah" class="btn essence-btn" data-toggle="modal" onclick="edit(<?=$pr->id_produk?>)">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    <div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('produk/tambah')?>" method="post" enctype="multipart/form-data">
                    Nama Produk
                    <input type="text" name="nama_produk" class="form-control" required><br>
                    Kategori
                    <p>
                    <select name="id_kategori" class="form-control">
                    <?php foreach ($kategori as $kt): ?>
                        <option value="<?=$kt->id_kategori?>"><?=$kt->nama_kategori?></option>
                    <?php endforeach?>
                    </select>
                    </p>
                    <br>
                    <br>
                    Harga
                    <input type="text" name="harga" class="form-control" required><br>
                    Stok
                    <input type="text" name="stok" class="form-control" required><br>
                    Deskripsi
                    <input type="text" name="deskripsi" class="form-control" required><br>
                    Gambar
                    <input type="file" name="gambar" class="form-control" required><br>
                    <br>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ubah" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Produk</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
			</div>	
			<div class="modal-body">
				<form action="<?=base_url('produk/update')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" id="id_produk">
						Nama Produk
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required><br>
                        Kategori
                        <p>
                        <select name="id_kategori" id="id_kategori" class="form-control">
                        <?php foreach ($kategori as $kt): ?>
                            <option value="<?=$kt->id_kategori?>"><?=$kt->nama_kategori?></option>
                        <?php endforeach?>
                        </select>
                        </p>
                        <br>
                        <br>
                        Harga
						<input type="text" name="harga" id="harga" class="form-control"required><br>
                        Stok
						<input type="text" name="stok" id="stok" class="form-control"required><br>
                        Deskripsi
						<input type="text" name="deskripsi" id="deskripsi" class="form-control"required><br>
                        Gambar
						<input type="file" name="gambar" id="gambar" class="form-control"><br>
						<br>
                        <input type="submit" value="Ubah" name="update" class="btn btn-success">
				</form>
			</div>	
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>

<script>
    function edit(id_produk){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>produk/tampil_ubah_produk/"+id_produk,
			dataType:"json",
			success:function(data){
				$("#id_produk").val(data.id_produk);
				$("#nama_produk").val(data.nama_produk);
                $("#id_kategori").val(data.id_kategori);
				$("#harga").val(data.harga);
				$("#stok").val(data.stok);	
                $("#deskripsi").val(data.deskripsi);
			}
		});
	}
</script>