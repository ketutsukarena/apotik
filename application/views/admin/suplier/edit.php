<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/suplier/edit/'.$suplier->id_suplier));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label><br/>
		<input type="text" name="nama" class="form-control" placeholder="Nama"value="<?php echo $suplier->nama_suplier ?>" required>
	</div>
	<div class="form-group">
		<label>Alamat</label><br/>
		<textarea name="alamat" class="form-control" placeholder="Alamat" required=""><?php echo $suplier->alamat ?></textarea>
	</div>
	<div class="form-group">
		<label>Kota</label><br/>
		<input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo $suplier->kota ?>" required>
	</div>
	<div class="form-group">
		<label>No Telepon</label><br/>
		<input type="text" name="no_telp" disable="true" class="form-control" placeholder="No Telepon" value="<?php echo $suplier->no_telp ?>" required>
	</div>
	</div>
		<div class="form-group"></div>
			<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
		</div>
	</div>

<?php 
// form close
echo form_close();
?>