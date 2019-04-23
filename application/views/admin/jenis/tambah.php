<!-- <?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/jenis/tambah'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama </label><br/>
		<input type="text" name="nama" class="form_control" placeholder="Nama Jenis Obat" value="<?php echo set_value('nama') ?>" required>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>


<?php 
// form close
echo form_close();
?> -->