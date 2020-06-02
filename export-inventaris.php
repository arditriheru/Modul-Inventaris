<?php include "readme.php";?>
<?php
    $kode_ruangan  = $_POST['kode_ruangan'];
    header("Content-type: application/ms-excel");
    header("Content-Disposition: attachment; filename=list-pasien-".date('d-m-Y').".xls");

    include '../koneksi.php';
    $title = mysqli_query($koneksi,
        "SELECT *, inventaris_ruangan.nama_ruangan
            FROM inventaris, inventaris_ruangan
            WHERE inventaris.kode_ruangan=inventaris_ruangan.kode_ruangan
            AND inventaris.kode_ruangan = '$kode_ruangan';");
        while($value = mysqli_fetch_array($title)){
            $nama_ruangan    = $value['nama_ruangan'];
    }
?>
<html>
    <body>
    <table align="center" border="1">
        <h3 align="center">List Barang Inventaris</h3>
        <h3 align="center">Ruang <?php echo $nama_ruangan ?></h3>
        <h4 align="center"><?php include 'tanggal-sekarang.php'; ?></h4>
        <h4></h4>
        <tr>
            <th><center>No</th>
            <th><center>Nomor Inventaris</th>
            <th><center>Nama Barang</th>
            <th><center>Jenis</th>
            <th><center>Ruangan</th>
            <th><center>Pengadaan</th>
            <th><center>Kondisi</th>
            <th><center>Status</th>
            <th><center>Kalibrasi</th>
            <th><center>Kalibrasi Ulang</th>
            <th><center>Keterangan</th>
        </tr>
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
                    <td><center><?php echo $d['status']; ?></td>
                    <td><center><?php if($d['tanggal_kalibrasi']=='0000-00-00'){
                            echo '-';
                        }else{
                            echo date("d/m/Y",strtotime($d['tanggal_kalibrasi']));
                        } ?>
                    </td>
                    <td><center><?php if($d['kalibrasi_ulang']=='0000-00-00'){
                            echo '-';
                        }else{
                            echo date("d/m/Y",strtotime($d['kalibrasi_ulang']));
                        } ?>
                    </td>
                    <td><center><?php echo $d['keterangan']; ?></td>
                  </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>