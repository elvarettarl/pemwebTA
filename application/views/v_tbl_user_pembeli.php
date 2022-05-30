<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url() ?>assets/img/bg-img/TSS-30.png);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">

			</div>
		</div>
		<div class="page-title text-center">
			<h2>Tabel User pembeli</h2>
		</div>
	</div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<section class="shop_grid_area section-padding-80">
    <div class="container">
    <div class="row">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <h2><a href="#tambah" data-toggle="modal">Tambah pembeli</a></h2>
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>

                <?php
                $no=0;
                foreach ($pembeli as $ad) {
                    $no++;?>

                <tr>
                    <td><?=$no?></td>
                    <td><?=$ad->nama_pembeli?></td>
                    <td><?=$ad->kelas?></td>
                    <td><?=$ad->email_pembeli?></td>
                    <td><?=$ad->nama_level?></td>
                    <td>
                        <a href="#ubah" data-toggle="modal" onclick="edit(<?=$ad->id_pembeli?>)" class="btn btn-danger btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                        <a href="<?=base_url('user_pembeli/hapus/'.$ad->id_pembeli)?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger btn-sm">
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
                <h4 class="modal-title">Tambah pembeli</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('user_pembeli/tambah')?>" method="post" enctype="multipart/form-data">
                    Nama
                    <input type="text" name="nama_pembeli" class="form-control" required><br>
                    Kelas
                    <input type="text" name="kelas" class="form-control" required><br>
                    Email
                    <input type="text" name="email_pembeli" class="form-control" required><br>
                    Password
                    <input type="password" name="password" class="form-control" required><br>
                    Level
                    <p>
                    <select name="id_level" class="form-control">
                    <?php foreach ($level as $lv): ?>
                        <option value="<?=$lv->id_level?>"><?=$lv->nama_level?></option>
                    <?php endforeach?>
                    </select>
                    </p>
                    <br>
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
				<h4 class="modal-title">Ubah pembeli</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
			</div>	
			<div class="modal-body">
				<form action="<?=base_url('user_pembeli/ubah')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pembeli" id="id_pembeli">
                Nama
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" required><br>
                Kelas
                <input type="text" name="kelas" id="kelas" class="form-control" required><br>
                Email
                <input type="text" name="email_pembeli" id="email_pembeli" class="form-control" required><br>
                Password
                <input type="password" name="password" id="password" class="form-control" required><br>
                Level
                <p>
                <select name="id_level" id="id_level" class="form-control">
                <?php foreach ($level as $lv): ?>
                    <option value="<?=$lv->id_level?>"><?=$lv->nama_level?></option>
                <?php endforeach?>
                </select>
                </p>
                <br>
                <br>
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
    function edit(id_pembeli){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>user_pembeli/tampil_pembeli/"+id_pembeli,
			dataType:"json",
			success:function(data){
				$("#id_pembeli").val(data.id_pembeli);
				$("#nama_pembeli").val(data.nama_pembeli);
                $("#password").val(data.password);
                $("#id_level").val(data.id_level);
				$("#email_pembeli").val(data.email_pembeli);
                $("#kelas").val(data.kelas);
			}
		});
	}
</script>