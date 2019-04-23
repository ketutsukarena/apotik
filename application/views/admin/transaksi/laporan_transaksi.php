<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Obat</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total</th>
            

            
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($detail as $detail) {?>
        <tr>
            <td><?php echo $i ?></td>
            <td>
              <?php
                
                $this->load->model('pembelian_model');
                $tanggal = $this->pembelian_model->gettanggal($detail->id_transaksibeli);
                echo $tanggal->tgl_transaksibeli;
            
              ?>
                
              </td>

            <td>

              <?php
                
                $this->load->model('pembelian_model');
                $nama_obat = $this->pembelian_model->getnamaobat($detail->id_obat);
                echo $nama_obat->nama_obat;
            
              ?>
            </td>
            <td><?php echo $detail->hargasatuan ?></td>
            <td><?php echo $detail->jumlah ?></td>
            <td><?php echo $detail->subtotal ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
