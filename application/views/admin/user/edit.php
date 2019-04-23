<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label><br/>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama_user ?>" required>
	</div>
	<div class="form-group">
		<label>Alamat</label><br/>
		<textarea name="alamat" class="form-control" placeholder="Alamat" required=""><?php echo $user->alamat_user ?></textarea>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Tanggal Lahir</label><br/>
		<input type="date" name="tgllahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $user->tgllahir_user; ?>" required>
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label><br/>
		<input type="radio" name="kelamin" <?php
		if($user->jeniskelamin_user=='l'){
			echo 'checked';
		} 
			?> value="l">Laki-laki<br>
		<input type="radio" name="kelamin" <?php
		if($user->jeniskelamin_user=='p'){
			echo 'checked';
		} 
			?> value="p">Perempuan<br>
	</div>
	<div class="form-group">
		<label>Pilih Level</label><br/>
		<select name="level" class="form-control">
			<option value="admin">Admin</option>
			<option value="kasir" <?php 
				if ($user->level_user=='kasir'){ echo 'selected'; }
			 ?>>Kasir</option>
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