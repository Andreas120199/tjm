<?php
session_start();
//koneksi ke database
$conn = mysqli_connect("localhost","root","","tjm");

//menambah data
if(isset($_POST['addnewcar'])){
    $nopolisi = $_POST['no_polisi'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $norangka = $_POST['no_rangka'];
    $nomesin = $_POST['no_mesin'];
    $nofaktur = $_POST['no_faktur'];
    $stnk = $_POST['stnk_atasnama'];
    $status = $_POST['status_unit'];
    $unitin = $_POST['unitin'];
    $seller = $_POST['seller'];
    $unitout = $_POST['unitout'];
    $buyer = $_POST['buyer'];

    $addtotable = mysqli_query($conn, "insert into info (no_polisi, merk, type, tahun, no_rangka, no_mesin, no_faktur, stnk_atasnama, status_unit, unitin, seller, unitout,	buyer)
    values ('$nopolisi', '$merk', '$type', '$tahun', '$norangka', '$nomesin', '$nofaktur', '$stnk', '$status', '$unitin', '$seller', '$unitout', '$buyer')");
    if($addtotable){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }
}

//menambah data customer
if(isset($_POST['addnewcustomer'])){
    $nama = $_POST['nama'];
    $notlp1 = $_POST['notlp1'];
    $notlp2 = $_POST['notlp2'];
    $notlp3 = $_POST['notlp3'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $addtotable = mysqli_query($conn, "insert into customer (nama, notlp1, notlp2, notlp3, alamat, deskripsi)
    values ('$nama', '$notlp1', '$notlp2', '$notlp3', '$alamat', '$deskripsi')");
    if($addtotable){
        header('location:customer.php');
    }else{
        echo'gagal';
        header('location:customer.php');
    }
}

//Updte Info 

if(isset($_POST['update'])){
    $idm = $_POST['idm'];
    $nopolisi = $_POST['no_polisi'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $norangka = $_POST['no_rangka'];
    $nomesin = $_POST['no_mesin'];
    $nofaktur = $_POST['no_faktur'];
    $stnk = $_POST['stnk_atasnama'];
    $status = $_POST['status_unit'];
    $seller = $_POST['seller'];
    $unitout = $_POST['unitout'];
    $buyer = $_POST['buyer'];

    $update = mysqli_query($conn, "update info set no_polisi='$nopolisi', merk='$merk', type='$type', tahun='$tahun', no_rangka='$norangka',no_mesin='$nomesin',no_faktur='$nofaktur', 
    stnk_atasnama='$stnk', seller='$seller',status_unit='$status', unitout='$unitout',	buyer='$buyer' where idmobil = '$idm'");
    if($update){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }
}

//Updte Info Cutomer

if(isset($_POST['updatecustomer'])){
    $idc = $_POST['idc'];
    $nama = $_POST['nama'];
    $notlp1 = $_POST['notlp1'];
    $notlp2 = $_POST['notlp2'];
    $notlp3 = $_POST['notlp3'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn, "update customer set nama='$nama', notlp1='$notlp1', notlp2='$notlp2', notlp3='$notlp3', alamat='$alamat',deskripsi='$deskripsi' where idcustomer = '$idc'");
    if($update){
        header('location:customer.php');
    }else{
        echo'gagal';
        header('location:customer.php');
    }
}

//Delete Data

if(isset($_POST['delete'])){
    $idm = $_POST['idm'];

    $delete = mysqli_query($conn, "delete from info where idmobil = '$idm'");
    if($delete){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }
}
?>