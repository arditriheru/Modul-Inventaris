<?php include "readme.php";?>
<?php include "views/header.php"; ?>
  <nav>
    <div id="wrapper">
      <?php include "menu.php"; ?>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <?php 
              include '../koneksi.php';
              $a = mysqli_query($koneksi,
                "SELECT COUNT(kode_registrasi) AS total
                FROM inventaris;");
              while($b = mysqli_fetch_array($a)){
            ?>
            <h1>Total <small> <?php echo $b['total'];}?> Barang</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>  
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
            <?php include "d-status.php"?>
            <?php include "d-kondisi.php"?>
        </div><!-- /.row -->
<br><br><?php include "../copyright.php";?>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>