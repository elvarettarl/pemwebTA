<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">

			</div>
		</div>
		<div class="page-title text-center">
			<h2>Tabel Kategori</h2>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<section class="shop_grid_area section-padding-80">
    <div class="container">
    <div class="row">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <h2><a href="#tambah" data-toggle="modal">Tambah Kategori</a></h2>
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>

                <?php
                $no=0;
                foreach ($kategori as $kt) {
                    $no++;?>

                <tr>
                  <td><?=$no?></td>
                  <td><?=$kt->nama_kategori?></td>
                  <td>
                        <a href="#ubah" data-toggle="modal" onclick="edit(<?=$kt->id_kategori?>)" class="btn btn-danger btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                        <a href="<?=base_url('kategori/hapkt/'.$kt->id_kategori)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
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
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('kategori/tambah')?>" method="post" enctype="multipart/form-data">
                    Nama Kategori
                    <input type="text" name="nama_kategori" class="form-control" required><br>
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
				<h4 class="modal-title">Ubah kategori</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
			</div>	
			<div class="modal-body">
				<form action="<?=base_url('kategori/ubah')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kategori" id="id_kategori">
                Nama Kategori
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required><br>
                <input type="submit" value="Ubah" name="ubah" class="btn btn-success">
				</form>
			</div>	
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>

<script>
    function edit(id_kategori){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>kategori/tampil_kategori/"+id_kategori,
			dataType:"json",
			success:function(data){
				$("#id_kategori").val(data.id_kategori);
				$("#nama_kategori").val(data.nama_kategori);
			}
		});
	}
</script>