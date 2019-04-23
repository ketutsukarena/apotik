<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('admin/pembelian/tambah'));
?>


<div class="col-md-6">
  <div class="form-group">
    <label>Nama Obat</label><br/>
      <select class="form-control" name="nama_obat" id="nama_obat" value="<?php echo set_value('nama_obat') ?>">
        <option value=""> - Pilih Obat -</option>
          <?php
          foreach ($obat->result() as $obat) {
          echo "<option value='".$obat->id_obat."'>".$obat->nama_obat."</option>";
          }
        ?>
      </select>
  </div>
  <div class="form-group">
    <label>Jumlah</label><br/>
    <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Obat" value="<?php echo set_value('jumlah') ?>" >
  </div>
  <div class="col-md-6"> 
    <div class="form-group">
      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
    </div>
  </div>
</div>


<?php 
// form close
echo form_close();
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            
            <th>#</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>*****</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
        foreach ($tampil_data as $ambil) { ?>
        <tr class="odd gradeX">
            <td><?php echo $i ?></td>
            <td>
              <?php
                $this->load->model('pembelian_model');
                $obat = $this->pembelian_model->getnama($ambil->idobat);
                echo $obat->nama_obat;
              ?>
                
              </td>
            <td><?php echo $ambil->hargasatuan ?></td>
            <td><?php echo $ambil->jumlahobat ?></td>
            <td><?php echo $ambil->hargasubtotal ?></td>
            <td>
              <a href="<?php echo base_url('admin/pembelian/hapusbantuan/'.$ambil->id) ?> " class="btn btn-danger"><i class="fa fa-trash-o"></i>Hapus</a>
            </td>     
        </tr>
        
        <?php $i++; } ?>
<?php 
//open form
echo form_open(base_url('admin/pembelian/tambah_transaksi'));
?>    
        <tr>
          <td colspan="4" align="right">Harga Total</td>
          <td colspan="2">
            <input type="text" name="total" readonly value="<?php echo $total ?> " />
          </td>
        </tr>
        <tr>
          <td colspan="4" align="right">
                <label>Nama Supplier</label><br/>
          </td>
          <td colspan="2">
            <select class="form-control" name="nama_supplier" id="nama_supplier" value="<?php echo set_value('nama_supplier') ?>">
              <option value=""> - Pilih Supplier -</option>
                <?php
                $this->load->model('pembelian_model');
                $suplier = $this->pembelian_model->listingsuplier();

                foreach ($suplier as $suplier) {
                echo "<option value='".$suplier->id_suplier."'>".$suplier->nama_suplier."</option>";
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="6">
            <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Selesai">
          </td>
        </tr>
    </tbody>
</table>
<?php 
// form close
echo form_close();
?>
