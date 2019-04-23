
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $judul ?> </title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  </head>
<body>
  <div class="container">
    <!-- <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <h2> Login Apotik</h2>
      </div>
    </div> -->
    <br/>
    <div class="row ">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> 
            <!-- Masukkan Username dan Password untuk login! --> 
            <center><h3>LOGIN APOTEK</h3></center>
          </strong>  
          </div>
          <div class="panel-body">

<?php   
  //notifikasi input error
  echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

  //notifikasi login sukses
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> ';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }
  if ($this->session->flashdata('logout')) {
    echo '<div class="alert alert-success"><i"><i class="fa fa-check"></i> ';
    echo $this->session->flashdata('logout');
    echo '</div>';
  }
?>

            <form role="form" method="post" action="<?php echo  base_url('login') ?>"> 
              <br />
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                <input type="text" class="form-control" placeholder="Your Username " name="username" autofocus="true"/>
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                <input type="password" class="form-control"  placeholder="Your Password" name="password" />
              </div>
              <div class="form-group">
              </div>
              <center>
                <input style="width:30%;" type="submit" name="submit" class="btn btn-primary btn lg" value="Login">
                <hr />
                
                Dasbor? <a href="<?php echo base_url() ?>admin/dasbor" >click here </a>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>



</body>
</html>
