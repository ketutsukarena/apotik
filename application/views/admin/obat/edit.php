<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/obat/edit/'.$obat->id_obat));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label><br/>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $obat->nama_obat ?>" required>
	</div>

	<div class="form-group">
		<label>jenis</label><br/>
		<select name="jenis" class="form-control">
			<?php 
				foreach ($jenis as $jenis) {
					echo "<option value=".$jenis->id_jenis." ";
					if ($jenis->id_jenis == $obat->id_jenis) echo "selected";
					echo ">".$jenis->nama_jenis."</option>";
				}
			 ?>
			
		</select>
	</div>	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Harga Beli</label><br/>
		<input type="text" name="hargabeli" class="form-control" placeholder="Harga Beli" value="<?php echo $obat->hargabeli_obat ?>" required>
	</div>
	<div class="form-group">
		<label>Harga Jual</label><br/>
		<input type="text" name="hargajual" disable="true" class="form-control" placeholder="Harga Jual" value="<?php echo $obat->hargajual_obat ?>" required>
	</div>
	<div class="form-group">
		<label>Stok</label><br/>
		<input type="text" name="stok" disable="true" class="form-control" placeholder="Stok" value="<?php echo $obat->stok_obat ?>" required>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>


<?php 
// form close
echo form_close();
?>
