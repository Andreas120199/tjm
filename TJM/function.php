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
    $uploaddir = 'image/'; 
    $no_polisi = $_POST['no_polisi'];
    $foto_mobil = $uploaddir . time() . '1_'. basename($_FILES['foto_mobil']['name']);
    $foto_norangka = $uploaddir . time() . '1_'. basename($_FILES['foto_norangka']['name']);
    $foto_nomesin = $uploaddir . time() . '1_'. basename($_FILES['foto_nomesin']['name']);
    $foto_stnk = $uploaddir . time() . '1_'. basename($_FILES['foto_stnk']['name']);
    $foto_bpkb = $uploaddir . time() . '1_'. basename($_FILES['foto_bpkb']['name']);

    //Buat Gambar

    $allowed_extention = array('png', 'jpg','jpeg');
    // $nama = $_FILES['file']['name']; //ambil nama gambar
    // $dot = explode('.',$nama);
    // $ekstensi = strtolower(end($dot)); //ambil ekstensi
    // $ukuran = $_FILES['file']['size']; //ambil size file
    // $file_temp = $_FILES['file']['temp_name']; //ambil lokasi filenya
    
    $cekdata = mysqli_query($conn,"select * from detail where no_polisi = '$no_polisi'");
    $hitungdata = mysqli_num_rows($cekdata);

    if($hitungdata < 1){

        // if(in_array($ekstensi, $allowed_extention) === true){
        //     if($ukuran < 15000000){
                if ((move_uploaded_file($_FILES['foto_mobil']['tmp_name'], $foto_mobil)) && 
                    (move_uploaded_file($_FILES['foto_norangka']['tmp_name'], $foto_norangka))&& 
                    (move_uploaded_file($_FILES['foto_nomesin']['tmp_name'], $foto_nomesin))&& 
                    (move_uploaded_file($_FILES['foto_stnk']['tmp_name'], $foto_stnk))&& 
                    (move_uploaded_file($_FILES['foto_bpkb']['tmp_name'], $foto_bpkb))) 
                    {
                        // move_uploaded_file($file_temp, 'image/'.$foto_mobil, 'image/'.$foto_norangka, 'image/'.$foto_nomesin, 'image/'.$foto_bpkb);
                        $addtotable = mysqli_query($conn, "insert into detail (no_polisi, foto_mobil, foto_norangka, foto_nomesin, foto_stnk, foto_bpkb)
                        values ('$no_polisi', '$foto_mobil', '$foto_norangka', '$foto_nomesin', '$foto_stnk', '$foto_bpkb')");
                        // $addtotable= $con->query("INSERT INTO detail (no_polisi, foto_mobil, foto_norangka, foto_nomesin, foto_stnk, foto_bpkb ) 
                        // VALUES ('$no_polisi', '$foto_mobil', '$foto_norangka', '$foto_nomesin', '$foto_stnk', '$foto_bpkb')");
                if($addtotable){
                    header('location:detail.php');
                }else{
                    echo'gagal';
                }
//             }else{
//                 //Kalau Filenya lebih dari 15mb
//                 echo '
//                 <script>
//                     alert("Ukuran terlalu besar, harus di bawah 15 mb);
//                     window.location.href="detail.php";
//                 </script>
//                 ';
//             }
//         }else{
//             //Kalau filenya bukan png atau jpg
//             echo '
//                 <script>
//                     alert("File bukan PNG/JPG ");
//                     window.location.href="detail.php";
//                 </script>
//             ';
//         }
// }else {
//     //jika udh ada
//     echo '
//     <script>
//         alert("No Polisi Sudah tersedia");
//         window.location.href="detail.php";
//     </script>
//     ';
    }
}
}

// //menambah foto mobil
// if(isset($_POST['addpicture'])){
//     $no_polisi = $_POST['no_polisi'];
//     $foto_mobil = $_POST['foto_mobil'];

//     //Buat Gambar
//     $allowed_extention = array('png', 'jpg');
//     $nama = $_FILES['files']['name']; //ambil nama gambar
//     $dot = explode('.',$nama);
//     $ekstensi = strtolower(end($dot)); //ambil ekstensi
//     $ukuran = $_FILES['files']['size']; //ambil size file
//     $file_temp = $_FILES['files']['temp_name']; //ambil lokasi filenya

//     //penamaan file -> enkripsi
//     $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;//gabung nama enkripsi dengan ekstensinya

//     $cekdata = mysqli_query($conn,"select * from detail where no_polisi = '$no_polisi'");
//     $hitungdata = mysqli_num_rows($cekdata);

//     if($hitungdata < 1){

//         if(in_array($ekstensi, $allowed_extention) === true){
//             if($ukuran < 15000000){
//                 move_uploaded_file($file_temp, 'image/'.$foto_mobil, 'image/'.$foto_norangka, 'image/'.$foto_nomesin, 'image/'.$foto_bpkb);
//                 $addtotable = mysqli_query($conn, "insert into detail (no_polisi, foto_mobil, foto_norangka, foto_nomesin, foto_stnk, foto_bpkb)
//                 values ('$no_polisi', '$foto_mobil', '$foto_norangka', '$foto_nomesin', '$foto_stnk', '$foto_bpkb')");
//                 if($addtotable){
//                     header('location:detail.php');
//                 }else{
//                     echo'gagal';
//                     header('location:detail.php');
//                 }
//             }else{
//                 //Kalau Filenya lebih dari 15mb
//                 echo '
//                 <script>
//                     alert("Ukuran terlalu besar, harus di bawah 15 mb);
//                     window.location.href="detail.php";
//                 </script>
//                 ';
//             }
//         }else{
//             //Kalau filenya bukan png atau jpg
//             echo '
//                 <script>
//                     alert("File bukan PNG/JPG ");
//                     window.location.href="detail.php";
//                 </script>
//             ';
//         }
// }else {
//     //jika udh ada
//     echo '
//     <script>
//         alert("No Polisi Sudah tersedia");
//         window.location.href="detail.php";
//     </script>
//     ';
//     }
// }

//menambah data stock
if(isset($_POST['addnewstock'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $merk = $_POST['merk'];
    $ukuran = $_POST['ukuran'];
    $stock = $_POST['stock'];
    $satuan = $_POST['satuan'];
    $lokasi = $_POST['lokasi'];
    
    $addtotable = mysqli_query($conn, "insert into stock (nama, jenis, merk, ukuran, stock, satuan, lokasi)
    values ('$nama', '$jenis', '$merk', '$ukuran', '$stock', '$satuan', '$lokasi')");
    if($addtotable){
        header('location:stock.php');
    }else{
        echo'gagal';
        header('location:stock.php');
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
    
    $addtotable = mysqli_query($conn, "insert into stock (nama, notlp1, notlp2, notlp3, alamat, deskripsi)
    values ('$nama', '$notlp1', '$notlp2', '$notlp3', '$alamat', '$deskripsi')");
    if($addtotable){
        header('location:customer.php');
    }else{
        echo'gagal';
        header('location:customer.php');
    }
}

//menambah data karyawan
if(isset($_POST['addnewkaryawan'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notlp1 = $_POST['notelp1'];
    $notlp2 = $_POST['notelp2'];
    $notlp3 = $_POST['notelp3'];
    $deskripsi = $_POST['deskripsi'];
    
    $addtotablekaryawan = mysqli_query($conn, "insert into karyawan (nama, email, notelp1, notelp2, notelp3, deskripsi)
    values ('$nama', '$email', '$notlp1', '$notlp2', '$notlp3', '$deskripsi')");
    if($addtotablekaryawan){
        header('location:infokaryawan.php');
    }else{
        echo'gagal';
        header('location:infokaryawan.php');
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

// if(isset($_POST['updatedetail'])){
//     $idp = $_POST['idp'];
//     $no_polisi = $_POST['no_polisi'];
//     $foto_mobil = $_POST['foto_mobil'];
//     $foto_norangka = $_POST['foto_norangka'];
//     $foto_nomesin = $_POST['foto_nomesin'];
//     $foto_stnk = $_POST['foto_stnk'];
//     $foto_bpkb = $_POST['foto_bpkb'];

//     $update = mysqli_query($conn, "update detail set no_polisi='$no_polisi', foto_mobil='$foto_mobil', foto_norangka='$foto_norangka', foto_nomesin='$foto_nomesin', 
//     foto_stnk='$foto_stnk',foto_bpkb='$foto_bpkb' where iddetail = '$idp'");
//     if($update){
//         header('location:detail.php');
//     }else{
//         echo'gagal';
//         header('location:detail.php');
//     }
// }

//Update Info Customer

if(isset($_POST['updatecustomer'])){
    $idc = $_POST['idc'];
    $nama = $_POST['nama'];
    $notlp1 = $_POST['notlp1'];
    $notlp2 = $_POST['notlp2'];
    $notlp3 = $_POST['notlp3'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $update = mysqli_query($conn, "update customer set nama='$nama', notlp1='$notlp1', notlp2='$notlp2', notlp3='$notlp3', alamat='$alamat',deskripsi='$deskripsi'
     where idcustomer = '$idc'");
    if($update){
        header('location:customer.php');
    }else{
        echo'gagal';
        header('location:customer.php');
    }
}

//Update Info Stock

if(isset($_POST['updatestock'])){
    $ids = $_POST['ids'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $merk = $_POST['merk'];
    $ukuran = $_POST['ukuran'];
    $stock = $_POST['stock'];
    $satuan = $_POST['satuan'];
    $lokasi = $_POST['lokasi'];

    $update = mysqli_query($conn, "update stock set nama='$nama', jenis='$jenis', merk='$merk', ukuran='$ukuran', stock='$stock',satuan='$satuan' ,lokasi='$lokasi'
     where idstock = '$ids'");
    if($update){
        header('location:stock.php');
    }else{
        echo'gagal';
        header('location:stock.php');
    }
}

//Update Info Masuk Stock

if(isset($_POST['updatebarangmasuk'])){
    $id = $_POST['id']; //iddata
    $ids = $_POST['idstock']; //idbarang
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    $lihatstock = mysqli_query($conn,"select * from stock where idstock='$ids'"); //lihat stock barang itu saat ini
    $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
    $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

    $lihatdataskrg = mysqli_query($conn,"select * from barang_masuk where id='$id'"); //lihat qty saat ini
    $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
    $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

    if($jumlah >= $qtyskrg){
        //ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
        $hitungselisih = $jumlah-$qtyskrg;
        $tambahistock = $stockskrg+$hitungselisih;

        $queryx = mysqli_query($conn,"update stock set stock='$tambahistock' where idstock='$ids'");
        $updatedata1 = mysqli_query($conn,"update barang_masuk set tgl='$tanggal',jumlah='$jumlah',keterangan='$keterangan' where id='$id'");
        
        //cek apakah berhasil
        if ($updatedata1 && $queryx){
                header('location:masuk.php');
            } else { 
                echo'gagal';
                header('location:masuk.php');
            }

    } else {
        //ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
        $hitungselisih = $qtyskrg-$jumlah;
        $kurangistock = $stockskrg-$hitungselisih;

        $query1 = mysqli_query($conn,"update stock set stock='$kurangistock' where idstock='$ids'");

        $updatedata = mysqli_query($conn,"update barang_masuk set tgl='$tanggal', jumlah='$jumlah', keterangan='$keterangan' where id='$id'");
        
        //cek apakah berhasil
        if ($query1 && $updatedata){
            header('location:masuk.php');
            } else { 
                echo'gagal';
                header('location:masuk.php');
            }

    }
}

//Update Barang Keluar 


if(isset($_POST['updatebarangkeluar'])){
    $id = $_POST['id']; //iddata
    $ids = $_POST['idstock']; //idbarang
    $jumlah = $_POST['jumlah'];
    $penerima = $_POST['penerima'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    $lihatstock = mysqli_query($conn,"select * from stock where idstock='$ids'"); //lihat stock barang itu saat ini
    $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
    $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

    $lihatdataskrg = mysqli_query($conn,"select * from barang_keluar where id='$id'"); //lihat qty saat ini
    $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
    $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

    if($jumlah >= $qtyskrg){
        //ternyata inputan baru lebih besar jumlah keluarnya, maka kurangi lagi stock barang
        $hitungselisih = $jumlah-$qtyskrg;
        $kurangistock = $stockskrg-$hitungselisih;

        $queryx = mysqli_query($conn,"update stock set stock='$kurangistock' where idstock='$ids'");
        $updatedata1 = mysqli_query($conn,"update barang_keluar set tgl='$tanggal',jumlah='$jumlah',penerima='$penerima',keterangan='$keterangan' where id='$id'");
        
        //cek apakah berhasil
        if ($updatedata1 && $queryx){
            header('location:keluar.php');
        }else{
            echo'gagal';
            header('location:keluar.php');
            }
    } else {
        //ternyata inputan baru lebih kecil jumlah keluarnya, maka tambahi lagi stock barang
        $hitungselisih = $qtyskrg-$jumlah;
        $tambahistock = $stockskrg+$hitungselisih;

        $query1 = mysqli_query($conn,"update stock set stock='$tambahistock' where idstock='$ids'");

        $updatedata = mysqli_query($conn,"update barang_keluar set tgl='$tanggal', jumlah='$jumlah', penerima='$penerima', keterangan='$keterangan' where id='$id'");
        
        //cek apakah berhasil
        if ($query1 && $updatedata){
            header('location:keluar.php');
        }else{
            echo'gagal';
            header('location:keluar.php');
        }
    }
}

//Update Info Karyawan

if(isset($_POST['updatekaryawan'])){
    $idkar = $_POST['idkar'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notlp1 = $_POST['notelp1'];
    $notlp2 = $_POST['notelp2'];
    $notlp3 = $_POST['notelp3'];
    $deskripsi = $_POST['deskripsi'];
    $update = mysqli_query($conn, "update karyawan set nama='$nama', email='$email',notelp1='$notlp1', notelp2='$notlp2', notelp3='$notlp3', deskripsi='$deskripsi'
     where idkaryawan = '$idkar'");
    if($update){
        header('location:infokaryawan.php');
    }else{
        echo'gagal';
        header('location:infokaryawan.php');
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

//Delete Data Stock

if(isset($_POST['deletestock'])){
    $ids = $_POST['ids'];

    $delete = mysqli_query($conn, "delete from stock where idstock = '$ids'");
    if($delete){
        header('location:stock.php');
    }else{
        echo'gagal';
        header('location:stock.php');
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

//Delete Data Customer

if(isset($_POST['deletekaryawan'])){
    $idkar = $_POST['idkar'];

    $delete = mysqli_query($conn, "delete from karyawan where idkaryawan = '$idkar'");
    if($delete){
        header('location:infokaryawan.php');
    }else{
        echo'gagal';
        header('location:infokaryawan.php');
    }
}

//Delete Detail 

if(isset($_POST['deletephoto'])){
    $idet = $_POST['idet'];

    $delete = mysqli_query($conn, "delete from detail where iddetail = '$idet'");
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

//Delete Info Masuk Stock

if(isset($_POST['deletebarangmasuk'])){
    $id = $_POST['id'];
    $ids = $_POST['idstock'];

    $lihatstock = mysqli_query($conn,"select * from stock where idstock='$ids'"); //lihat stock barang itu saat ini
    $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
    $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

    $lihatdataskrg = mysqli_query($conn,"select * from barang_masuk where id='$id'"); //lihat qty saat ini
    $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
    $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

    $adjuststock = $stockskrg-$qtyskrg;

    $queryx = mysqli_query($conn,"update stock set stock='$adjuststock' where idstock='$ids'");
    $del = mysqli_query($conn,"delete from barang_masuk where id='$id'");

    
    //cek apakah berhasil
    if ($queryx && $del){
        header('location:masuk.php');
    } else { 
        echo'gagal';
        header('location:masuk.php');
    }
}

//Delete Info Keluar Data

if(isset($_POST['deletebarangkeluar'])){
    $id = $_POST['id'];
    $ids = $_POST['idstock'];

    $lihatstock = mysqli_query($conn,"select * from stock where idstock='$idstock'"); //lihat stock barang itu saat ini
    $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
    $stockskrg = $stocknya['stock'];//jumlah stocknya skrg

    $lihatdataskrg = mysqli_query($conn,"select * from barang_keluar where id='$id'"); //lihat qty saat ini
    $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
    $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg

    $adjuststock = $stockskrg+$qtyskrg;

    $queryx = mysqli_query($conn,"update stock set stock='$adjuststock' where idstock='$idstock'");
    $del = mysqli_query($conn,"delete from barang_keluar where id='$id'");

    
    //cek apakah berhasil
    if ($queryx && $del){
        header('location:keluar.php');
    }else{
        echo'gagal';
        header('location:keluar.php');
        }
}

?>