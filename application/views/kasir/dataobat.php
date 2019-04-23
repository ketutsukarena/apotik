<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($obat as $obat) {?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $obat->nama_obat ?></td>
            <td><?php
                $this->load->model('jenis_model');
                $jenis = $this->obat_model->getjenis($obat->id_jenis);
                echo $jenis->nama_jenis;
            ?></td>
            <td><?php echo $obat->hargajual_obat ?></td>
            <td><?php echo $obat->stok_obat ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
