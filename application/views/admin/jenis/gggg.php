<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/jenis/tambah'));
?>
<button class="btn btn-success btn-x3" data-toggle="modal" data-target="#tambah">
  <i class="fa fa-plus"></i> Tabah Jenis Obat</button>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Jenis Obat Apa -_-</h4>
            </div>
            <div class="modal-body">
                <span class="input-group-addon">Tambah Jenis</span>
                <input type="text" name="nama" class="form-control" placeholder="Isi Kolom"  value="<?php echo set_value('nama') ?>" required>

               
            </div>
            <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-success" value="Simpan Data">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>