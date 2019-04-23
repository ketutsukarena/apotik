<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/user/tambah'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label></br>
		<input class="form-control" type="text" name="nama"  placeholder="Nama" value="<?php echo set_value('nama') ?>" required />

	</div>
	<div class="form-group">
		<label>Username</label><br/>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
	</div>
	<div class="form-group">
		<label>Password</label><br/>
		<input type="password" name="password1" class="form-control" placeholder="Password" value="<?php echo set_value('password1') ?>" required>
	</div>
	<div class="form-group">
		<label>Ulangi Password</label><br/>
		<input type="password" name="password2" disable="true" class="form-control" placeholder="Ulangi Password diatas!" value="<?php echo set_value('password2') ?>" required>
	</div>
	<div class="form-group">
		<label>Alamat</label><br/>
		<textarea name="alamat" class="form-control" placeholder="Alamat" required=""><?php echo set_value('alamat') ?></textarea>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Tanggal Lahir</label><br/>
		<input type="date" name="tgllahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tgllahir') ?>" required>
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label><br/>
		<input type="radio" name="kelamin" checked="checked" value="l">Laki-laki<br>
		<input type="radio" name="kelamin" value="p">Perempuan<br>
	</div>
	<div class="form-group">
		<label>Pilih Level</label><br/>
		<select name="level" class="form-control">
			<option value="admin">Admin</option>
			<option value="kasir">Kasir</option>
		</select>
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