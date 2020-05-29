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
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-search"></i> Cari</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <form method="post" action="inventaris-filter-tampil" role="form">
            <div class="col-lg-6">
            	<div class="form-group">
                <label>Nama Ruangan</label>
                <select class="form-control" type="text" name="kode_ruangan">
                  <option disabled selected>Pilih</option>
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                      "SELECT * FROM inventaris_ruangan ORDER BY nama_ruangan ASC;");
                    while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['kode_ruangan']."'>"."(".$d['kode_ruangan'].")"." - ".$d['nama_ruangan']."</option>";
                    }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Cari</button>
            </div>
            </form>
            <form method="post" action="inventaris-detail" role="form">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Nomor Inventaris</label>
                <input class="form-control" type="text" name="nomor_inventaris" placeholder="Masukkan..">
              </div><button type="submit" class="btn btn-success">Cari</button>
            </div>
          </form>
            </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>