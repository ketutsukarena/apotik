<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
			<li class="text-center">
                <img src="apotik/img/find_user.png" class="user-image img-responsive"/>
			</li>
            <li>
                <a  href="<?php echo base_url('kasir/dasbor') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url('kasir/penjualan/transaksi') ?>"><i class="fa fa-list"></i>Mulai Penjualan</a>
            </li>
            <li>
                <a href="<?php echo base_url('kasir/obat') ?>"><i class="fa fa-flask"></i>Data Obat</a>
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
