<?php include "readme.php";?>
<?php include "views/header.php"; ?>
<?php 
$kode_registrasi  = $_GET['id'];
$nomor_inventaris = $_POST['nomor_inventaris'];
?>
    <nav>
    <div id="wrapper">
      <?php include "menu.php"; ?>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Detail <small>Inventaris</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-flash"></i> Detail</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
          <div class="table-responsive">
            <div clas="row">
              <div class="col-lg-6">
              <a href="inventaris-edit?id=<?php echo $kode_registrasi; ?>"
              <button type="button" class="btn btn-primary">Edit</button>
              </a>
            </div>
            <div align="right" class="col-lg-6">
              <a href="inventaris-hapus?id=<?php echo $kode_registrasi; ?>"
                onclick="javascript: return confirm('Anda yakin hapus?')">
                <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
              </a>
            </div>
            </div><br><br><br><!-- Row --->
            <table class="table table-bordered table-hover table-striped tablesorter">
              <?php 
                  include '../koneksi.php';
                  if($kode_registrasi){
                    $data = mysqli_query($koneksi,
                      "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
                      IF (inventaris.kondisi='1', 'Baik', 'Rusak') AS ifkondisi,
                      IF (inventaris.status='1', 'Baru', 'Bekas') AS ifstatus
                      FROM inventaris, inventaris_jenis, inventaris_ruangan
                      WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                      AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                      AND inventaris.kode_registrasi = '$kode_registrasi';");
                  while($d = mysqli_fetch_array($data)){
                    $nomor_inventaris   = $d['nomor_inventaris'];
                    $nama_barang        = $d['nama_barang'];
                    $nama_jenis         = $d['nama_jenis'];
                    $nama_ruangan       = $d['nama_ruangan'];
                    $kondisi          = $d['ifkondisi'];
                    $status           = $d['ifstatus'];
                    $keterangan         = $d['keterangan'];
                    $tanggal_pengadaan  = $d['tanggal_pengadaan'];
                  function format_pengadaan($tanggal_pengadaan)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $tanggal_pengadaan);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  $tanggal_kalibrasi = $d['tanggal_kalibrasi'];
                  function format_kalibrasi($tanggal_kalibrasi)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $tanggal_kalibrasi);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  $kalibrasi_ulang = $d['kalibrasi_ulang'];
                  function format_rekalibrasi($kalibrasi_ulang)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $kalibrasi_ulang);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  }
                }elseif($nomor_inventaris){
                  $data = mysqli_query($koneksi,
                      "SELECT *, inventaris_jenis.nama_jenis, inventaris_ruangan.nama_ruangan,
                      IF (inventaris.kondisi='1', 'Baik', 'Rusak') AS ifkondisi,
                      IF (inventaris.status='1', 'Baru', 'Bekas') AS ifstatus
                      FROM inventaris, inventaris_jenis, inventaris_ruangan
                      WHERE inventaris.kode_jenis=inventaris_jenis.kode_jenis
                      AND inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
                      AND inventaris.nomor_inventaris = '$nomor_inventaris';");
                  while($d = mysqli_fetch_array($data)){
                    $nomor_inventaris   = $d['nomor_inventaris'];
                    $nama_barang        = $d['nama_barang'];
                    $nama_jenis         = $d['nama_jenis'];
                    $nama_ruangan       = $d['nama_ruangan'];
                    $kondisi          = $d['ifkondisi'];
                    $status           = $d['ifstatus'];
                    $keterangan         = $d['keterangan'];
                    $tanggal_pengadaan  = $d['tanggal_pengadaan'];
                  function format_pengadaan($tanggal_pengadaan)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $tanggal_pengadaan);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  $tanggal_kalibrasi = $d['tanggal_kalibrasi'];
                  function format_kalibrasi($tanggal_kalibrasi)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $tanggal_kalibrasi);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  $kalibrasi_ulang = $d['kalibrasi_ulang'];
                  function format_rekalibrasi($kalibrasi_ulang)
                    {
                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split = explode('-', $kalibrasi_ulang);
                      return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                    }
                  }
                }
              ?>
              <tbody>
              <tr>
                  <td><b>Nomor Inventaris</b></td>
                  <td><?php echo $nomor_inventaris; ?></td>
              </tr>
              <tr>
                  <td><b>Nama Barang</b></td>
                  <td><?php echo $nama_barang; ?></td>
              </tr>
              <tr>
                  <td><b>Jenis</b></td>
                  <td><?php echo $nama_jenis; ?></td>
              </tr>
              <tr>
                  <td><b>Lokasi</b></td>
                  <td><?php echo $nama_ruangan; ?></td>
              </tr>
              <tr>
                  <td><b>Pengadaan</b></td>
                  <td><?php echo format_pengadaan($tanggal_pengadaan); ?></td>
              </tr>
              <tr>
                  <td><b>Kondisi</b></td>
                  <td><?php echo $kondisi; ?></td>
              </tr>
              <tr>
                  <td><b>Status</b></td>
                  <td><?php echo $status; ?></td>
              </tr>
              <tr>
                  <td><b>Kalibrasi</b></td>
                  <td><?php echo format_kalibrasi($tanggal_kalibrasi); ?></td>
              </tr>
              <tr>
                  <td><b>Rekalibrasi</b></td>
                  <td><?php echo format_rekalibrasi($kalibrasi_ulang); ?></td>
              </tr>
              <tr>
                  <td><b>Keterangan</b></td>
                  <td><?php echo $keterangan; ?></td>
              </tr>
            </tbody>
            </table>
            </div>
          </div>
        </div><!-- /.row -->
      </div><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include "views/footer.php"; ?>