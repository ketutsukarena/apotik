<p><a href="<?php echo base_url('admin/obat/tambah') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a></p>

<?php 
//notifikasi tambah sukses
	if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Action</th>
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
            <td><?php echo $obat->hargabeli_obat ?></td>
            <td><?php echo $obat->hargajual_obat ?></td>
            <td><?php echo $obat->stok_obat ?></td>
            <td>
            	<a href="<?php echo base_url('admin/obat/edit/'.$obat->id_obat) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
            	<?php include('hapus.php'); ?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
