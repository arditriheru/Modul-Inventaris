<?php include "readme.php";?>
<?php include "views/header.php"; ?>
<?php 
    $kode_ruangan = $_POST['kode_ruangan'];
?>
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
              "SELECT COUNT(*) AS total
              FROM inventaris
              WHERE kode_ruangan = '$kode_ruangan';");
              while($b = mysqli_fetch_array($a)){
              $total = $b['total'];
            ?>
            <h1>Jumlah <small> <?php echo $total;}?> Barang</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href="booking-filter"><i class="fa fa-search"></i> Cari</a></li>
              <li class="active"><i class="fa fa-list"></i> List</li>
            </ol>  
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nomor Inventaris</th>
                    <th><center>Nama Barang</th>
                    <th><center>Jenis</th>
                    <th><center>Lokasi</th>
                    <th><center>Pengadaan</th>
                    <th><center>Kondisi</th>
                    <th><center>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggalHariIni=date('Y-m-d');
                    $data = mysqli_query($koneksi,
                      "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
                      IF (inventaris.kondisi='1', 'Baik', 'Rusak') AS kondisi
                      FROM inventaris, inventaris_jenis, inventaris_ruangan
                      WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                      AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                      AND inventaris.kode_ruangan = '$kode_ruangan'
                      ORDER BY inventaris.nama_barang ASC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nomor_inventaris']; ?></td>
                    <td><center><?php echo $d['nama_barang']; ?></td>
                    <td><center><?php echo $d['nama_jenis']; ?></td>
                    <td><center><?php echo $d['nama_ruangan']; ?></td>
                    <td><center><?php echo date("d/m/Y",strtotime($d['tanggal_pengadaan']));?></td>
                    <td><center><?php echo $d['kondisi']; ?></td>
                    <td>
                      <div align="center">
                        <a href="inventaris-detail?id=<?php echo $d['kode_registrasi']; ?>"
                        <button type="button" class="btn btn-warning">Detail</a><br><br>
                      </div>
                    </td>
                  </tr>
                  <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
<br><br><?php include "../copyright.php";?>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>
