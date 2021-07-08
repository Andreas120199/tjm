<?php 
include '../function.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$ukuran=$_POST['ukuran'];
$merk=$_POST['merk'];
$satuan=$_POST['satuan'];
$stock=$_POST['stock'];
$lokasi=$_POST['lokasi'];
	  
$query = mysqli_query($conn,"insert into stock_brg values('','$nama','$jenis','$merk','$ukuran','$stock','$satuan','$lokasi')");
if ($query){
  header('location:../stock.php');
} else { 
    echo'gagal';
    header('location:../stock.php');
}
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>