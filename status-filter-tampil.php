<?php include "readme.php";?>
<?php include "views/header.php"; ?>
<?php $status = $_POST['status'];?>
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
        WHERE status = '$status';");
      while($b = mysqli_fetch_array($a)){
        $total = $b['total'];
        ?>
        <h1>Jumlah <small> <?php echo $total;}?> Barang</small></h1>
        <ol class="breadcrumb">
          <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="inventaris-filter"><i class="fa fa-search"></i> Cari</a></li>
          <li class="active"><i class="fa fa-list"></i> List</li>
        </ol>  
        <?php include "../notifikasi1.php"?>
      </div>
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <div class="col-lg-8">
            <form method="post" action="export-inventaris" role="form">
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control" type="hidden" name="kode_ruangan" value="<?php echo $kode_ruangan?>">
                </div>
                <button type="submit" class="btn btn-success">EXPORT</button><br><br>
              </div>
            </form>
          </div>
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th><center>No</th>
                  <th><center>Nomor Inventaris</th>
                    <th><center>Nama Barang</th>
                      <th><center>Jenis</th>
                        <th><center>Ruangan</th>
                          <th><center>Pengadaan</th>
                            <th><center>Status</th>
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
                                IF (inventaris.status='1', 'Baru', 'Bekas') AS status
                                FROM inventaris, inventaris_jenis, inventaris_ruangan
                                WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                                AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                                AND inventaris.status = '$status'
                                ORDER BY inventaris.kode_registrasi ASC;");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                  <td><center><?php echo $no++; ?></center></td>
                                  <td><center><?php echo $d['nomor_inventaris']; ?></center></td>
                                  <td><center><?php echo $d['nama_barang']; ?></center></td>
                                  <td><center><?php echo $d['nama_jenis']; ?></center></td>
                                  <td><center><?php echo $d['nama_ruangan']; ?></center></td>
                                  <td><center><?php 
                                  if($d['tanggal_pengadaan']=='0000-00-00'){
                                    echo "-";
                                  }else{
                                    echo date("d/m/Y",strtotime($d['tanggal_pengadaan']));
                                  } ?></center></td>
                                  <td><center><?php echo $d['status']; ?></center></td>
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
