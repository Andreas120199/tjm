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

//menambah foto
if(isset($_POST['addpicture'])){
    $no_polisi = $_POST['no_polisi'];
    $foto_mobil = $_POST['foto_mobil'];
    $foto_norangka = $_POST['foto_norangka'];
    $foto_nomesin = $_POST['foto_nomesin'];
    $foto_stnk = $_POST['foto_stnk'];
    $foto_bpkb = $_POST['foto_bpkb'];

    //Buat Gambar
    $allowed_extention = array('png', 'jpg');
    $nama = $_FILES['files']['name']; //ambil nama gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['files']['size']; //ambil size file
    $file_temp = $_FILES['files']['temp_name']; //ambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;//gabung nama enkripsi dengan ekstensinya

    $cekdata = mysqli_query($conn,"select * from detail where no_polisi = '$no_polisi'");
    $hitungdata = mysqli_num_rows($cekdata);

    if($hitungdata < 1){

        if(in_array($ekstensi, $allowed_extention) === true){
            if($ukuran < 15000000){
                move_uploaded_file($file_temp, 'image/'.$foto_mobil, 'image/'.$foto_norangka, 'image/'.$foto_nomesin, 'image/'.$foto_bpkb);
                $addtotable = mysqli_query($conn, "insert into detail (no_polisi, foto_mobil, foto_norangka, foto_nomesin, foto_stnk, foto_bpkb)
                values ('$no_polisi', '$foto_mobil', '$foto_norangka', '$foto_nomesin', '$foto_stnk', '$foto_bpkb')");
                if($addtotable){
                    header('location:detail.php');
                }else{
                    echo'gagal';
                    header('location:detail.php');
                }
            }else{
                //Kalau Filenya lebih dari 15mb
                echo '
                <script>
                    alert("Ukuran terlalu besar, harus di bawah 15 mb);
                    window.location.href="detail.php";
                </script>
                ';
            }
        }else{
            //Kalau filenya bukan png atau jpg
            echo '
                <script>
                    alert("File bukan PNG/JPG ");
                    window.location.href="detail.php";
                </script>
            ';
        }
}else {
    //jika udh ada
    echo '
    <script>
        alert("No Polisi Sudah tersedia");
        window.location.href="detail.php";
    </script>
    ';
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

//Updte Detail

if(isset($_POST['updatedetail'])){
    $idc = $_POST['idp'];
    $no_polisi = $_POST['no_polisi'];
    $foto_mobil = $_POST['foto_mobil'];
    $foto_norangka = $_POST['foto_norangka'];
    $foto_nomesin = $_POST['foto_nomesin'];
    $foto_stnk = $_POST['foto_stnk'];
    $foto_bpkb = $_POST['foto_bpkb'];

    $update = mysqli_query($conn, "update detail set no_polisi='$no_polisi', foto_mobil='$foto_mobil', foto_norangka='$foto_norangka', foto_nomesin='$foto_nomesin', 
    foto_stnk='$foto_stnk',foto_bpkb='$foto_bpkb' where iddetail = '$idp'");
    if($update){
        header('location:detail.php');
    }else{
        echo'gagal';
        header('location:detail.php');
    }
}

//Update Info Customer

if(isset($_POST['updatecustomer'])){
    $idp = $_POST['idc'];
    $nama = $_POST['nama'];
    $notlp1 = $_POST['notlp1'];
    $notlp2 = $_POST['notlp2'];
    $notlp3 = $_POST['notlp3'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

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

//Delete Data Customer

if(isset($_POST['deletecustomer'])){
    $idc = $_POST['idc'];

    $delete = mysqli_query($conn, "delete from customer where idcustomer = '$idc'");
    if($delete){
        header('location:customer.php');
    }else{
        echo'gagal';
        header('location:customer.php');
    }
}

//Delete Detail 

if(isset($_POST['deletedetail'])){
    $idp = $_POST['idp'];

    $delete = mysqli_query($conn, "delete from customer where iddetail = '$idp'");
    if($delete){
        header('location:detail.php');
    }else{
        echo'gagal';
        header('location:detail.php');
    }
}

//Delete Info Management

if(isset($_POST['deletemanage'])){
    $idmng = $_POST['idmng'];

    $delete = mysqli_query($conn, "delete from customer where idmanage = '$idmng'");
    if($delete){
        header('location:indexmanagement.php');
    }else{
        echo'gagal';
        header('location:indexmanagement.php');
    }
}
?>