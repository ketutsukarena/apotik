<p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a></p>

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
            <th>Username - Level</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>jenis Kelamin</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($user as $user) {?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $user->nama_user ?></td>
            <td><?php echo $user->username ?> - <?php echo $user->level_user ?></td>
            <td><?php echo $user->alamat_user ?></td>
            <td><?php $tgl = date("d-M-Y", strtotime($user->tgllahir_user)); echo $tgl; ?></td>
            <td><?php 
	            if ($user->jeniskelamin_user == 'l') {
	            	echo 'Laki-laki';
	            }else{
	            	echo 'Perempuan';
	            } ?>
            </td>
            <td>
            	<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
            	<?php include('hapus.php'); ?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
