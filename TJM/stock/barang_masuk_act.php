<?php 
include '../function.php';
$barang=$_POST['barang']; // ini ID barang nya
$qty=$_POST['qty'];
$tanggal=$_POST['tanggal'];
$ket=$_POST['ket'];

$dt=mysqli_query($conn,"select * from stock where idstock='$barang'");
$data=mysqli_fetch_array($dt);
$sisa=$data['stock']+$qty;
$query1 = mysqli_query($conn,"update stock set stock='$sisa' where idstock='$barang'");

$query2 = mysqli_query($conn,"insert into barang_masuk (idstock,tgl,jumlah,keterangan) values('$barang','$tanggal','$qty','$ket')");

if($query1 && $query2){
  header('location:../masuk.php');
} else { 
    echo'gagal';
    header('location:../masuk.php');
}


?>

<html>
<head>
  <title>Barang Masuk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>