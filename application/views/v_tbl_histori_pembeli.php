<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">

			</div>
		</div>
		<div class="page-title text-center">
			<h2>Tabel Histori</h2>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<section class="shop_grid_area section-padding-80">
    <div class="container">
    <div class="row">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Waktu</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>

                <?php
                $no=0;
                foreach ($histori as $hs) {
                    $no++;?>

                <tr>
                    <td><?=$no?></td>
                    <td><?=$hs->waktu?></td>
                    <td><?=$hs->nama_produk?></td>
                    <td><?=$hs->jumlah?></td>
                    <td><?=$hs->total?></td>
                    <td><?=$hs->status?></td>
                </tr>
                <?php } ?>
              </table>
            <!-- /.box-body -->
          <!-- /.box -->
      </div>
    </div>
</section>