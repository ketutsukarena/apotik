<!-- <p><a href="<?php echo base_url('admin/jenis/tambah') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Ttambah</a> -->

<?php  include('gggg.php'); ?>
            

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
            <th>Jenis</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($jenis as $jenis) {?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $jenis->nama_jenis ?></td>
            <td>
            	<a href="<?php echo base_url('admin/jenis/edit/'.$jenis->id_jenis) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
            	<?php include('hapus.php'); ?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
