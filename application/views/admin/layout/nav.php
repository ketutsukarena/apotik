<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
			<li class="text-center">
                <img src="apotik/img/find_user.png" class="user-image img-responsive"/>
			</li>
            <li>
                <a  href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/pembelian') ?>"><i class="fa fa-laptop"></i>Pemasokan Obat</a>
            </li>   
            <!-- menu user -->

            <li>
                <a href="#"><i class="fa fa-user"></i> User/Admin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('admin/user') ?>">Data User</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User</a>
                    </li>
                </ul>
            </li>
			                   
            <li>
                <a href="#"><i class="fa fa-heart"></i>Suplier<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('admin/suplier') ?>">Data Suplier</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/suplier/tambah') ?>">Tambah Suplier</a>
                    </li>
                </ul>
            </li>                  
            <li>
                <a href="#"><i class="fa fa-flask"></i>Obat<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('admin/obat') ?>">Data Obat</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/obat/tambah') ?>">Tambah Obat</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/jenis') ?>">Jenis Obat</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('admin/laporan') ?>"><i class="fa fa-laptop"></i>Laporan Transaksi Beli</a>
            </li>
        </ul>
    </div>
</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $judul ?></h2>
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <?php echo $judul ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
