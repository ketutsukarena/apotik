<p><a href="<?php echo base_url('admin/suplier/tambah') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a></p>

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
            <th>Alamat</th>
            <th>Kota</th>
            <th>No Telepon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($suplier as $suplier) {?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $suplier->nama_suplier ?></td>
            <td><?php echo $suplier->alamat ?></td>
            <td><?php echo $suplier->kota ?></td>
            <td><?php echo $suplier->no_telp ?></td>
            <td>
            	<a href="<?php echo base_url('admin/suplier/edit/'.$suplier->id_suplier) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
            	<?php include('hapus.php'); ?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
