<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">

			</div>
		</div>
		<div class="page-title text-center">
			<h2>Tabel Produk</h2>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<section class="shop_grid_area section-padding-80">
    <div class="container">
    <div class="row">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <!-- <h2><a href="#tambah" data-toggle="modal">Tambah Produk</a></h2> -->
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Penjual</th>

                </tr>

                <?php
                $no=0;
                foreach ($produk as $pr) {
                    $no++;?>

                <tr>
                  <td><?=$no?></td>
                  <td><?=$pr->nama_produk?></td>
                  <td><?=$pr->harga?></td>
                  <td><?=$pr->stok?></td>
                  <td><?=$pr->deskripsi?></td>
                  <td><img src="<?= base_url('assets/img/product-img/'.$pr->gambar);?>" style="width:40px;"></td>
                  <td><?=$pr->nama_kategori?></td>
                  <td><?=$pr->nama_penjual?></td>
                </tr>
                <?php } ?>
              </table>
            <!-- /.box-body -->
          <!-- /.box -->
      </div>
    </div>
</section>

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
