<?php include "readme.php";?>
<?php 
include '../koneksi.php';
$kode_ruangan = $_GET['id'];
$hapus=mysqli_query($koneksi,"DELETE FROM inventaris_ruangan WHERE kode_ruangan='$kode_ruangan'");
if($hapus){
	echo "<script>alert('Berhasil Dihapus!!!');document.location='ruangan-tambah'</script>";
}else{
	echo "<script>alert('Gagal Hapus!!!');document.location='ruangan-tambah'</script>";
}
?>