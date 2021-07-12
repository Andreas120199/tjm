<?php
require 'function.php';
require 'cek.php';
$imgUrl = "logo_tjm.png"; 
?> 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- buat kasih batasan gambar -->
        <style>
            .zoomable{
                width: 250px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.5s ease;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php" >
            <img src="logo_tjm.png" width="200px"\></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="small">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Main Page
                            </a>
                            <a class="nav-link" href="detail.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Detail
                            </a>
                            <a class="nav-link" href="customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Customer
                            </a>
                            <a class="nav-link" href="seller.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Penjual
                            </a>
                            <a class="nav-link" href="infokaryawan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Karyawan
                            </a>
                            <div class="sb-sidenav-menu-heading">Stock</div>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Info Stock
                            </a>
                            <a class="nav-link" href="detail.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?=$_SESSION['username'];?></div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PT. Taruna Jaya Motor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Main Page</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Tambah Data
                                    </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No Polisi</th>
                                            <th>Foto Mobil</th>
                                            <th>Foto No Rangka</th>
                                            <th>Foto No Mesin</th>
                                            <th>Scan STNK</th>
                                            <th>Scan BPKB</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // buat tampilin data ke tabel //
                                    //, info where info.no_polisi = detail.no_polisi
                                        $detail_data = mysqli_query($conn,"select * from detail");
                                        // $detail_data_fetch =mysqli_fetch_array($detail_data);
                                        while($data=mysqli_fetch_array($detail_data)){
                                            $nopolisi = $data['no_polisi'];
                                            $foto_mobil = $data['foto_mobil'];
                                            $foto_norangka = $data['foto_norangka'];
                                            $foto_nomesin = $data['foto_nomesin'];
                                            $foto_stnk = $data['foto_stnk'];
                                            $foto_bpkb = $data['foto_bpkb'];
                                            $idet = $data['iddetail'];

                                            //cek foto mobil
                                            if($foto_mobil==null){
                                                $img = "No Photo";
                                            }else{
                                                $img = '<img src="images/'.$foto_mobil.'" class="zoomable">';
                                            }
                                        
                                            //cek foto no rangka
                                            if($foto_norangka==null){
                                                $img = "No Photo";
                                            }else{
                                                $img = '<img src="images/'.$foto_norangka.'" class="zoomable">';
                                            }
                                        
                                            //cek foto no mesin
                                            if($foto_nomesin==null){
                                                $img = "No Photo";
                                            }else{
                                                $img = '<img src="images/'.$foto_nomesin.'" class="zoomable">';
                                            }
                                        
                                            //cek foto stnk
                                            if($foto_stnk==null){
                                                $img = "No Photo";
                                            }else{
                                                $img = '<img src="images/'.$foto_stnk.'" class="zoomable">';
                                            }
                                        
                                            //cek foto bpkb
                                            if($foto_bpkb==null){
                                                $img = "No Photo";
                                            }else{
                                                $img = '<img src="images/'.$foto_bpkb.'" class="zoomable">';
                                            }
                                        
                                    ?>
                                        <tr>
                                            <td><?=$nopolisi;?></td>
                                            <td><img src="<?php echo $foto_mobil;?>" alt="HTML tutorial" style="width:250px;height:250px;"></td>
                                            <td><img src="<?php echo $foto_norangka;?>" alt="HTML tutorial" style="width:250px;height:250px;"></td>
                                            <td><img src="<?php echo $foto_nomesin;?>" alt="HTML tutorial" style="width:250px;height:250px;"></td>
                                            <td><img src="<?php echo $foto_stnk;?>" alt="HTML tutorial" style="width:250px;height:250px;"></td>
                                            <td><img src="<?php echo $foto_bpkb;?>" alt="HTML tutorial" style="width:250px;height:250px;"></td>
                                            <td>
                                                <input type="hidden" name = "iddetailhapus" value="<?=$idet;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idet;?>">
                                                    Delete 
                                                </button>
                                            </td>
                                        </tr>
                                                                                            
                                                <!-- The Modal Edit -->
                                                <div class="modal fade" id="edit<?=$idet;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit</h4>
                                                    <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method = "post"  enctype="multipart/form-data" >
                                                    <div class="modal-body">
                                                    No Polisi: 
                                                    <input type = "text" name = "no_polisi" value="<?=$nopolisi;?>" placeholder = "No Polisi" class = "form-control" required>
                                                    Foto Mobil : 
                                                    <input type = "file" name = "foto_mobil" value="<?=$foto_mobil;?>" placeholder = "Foto Mobil" class = "form-control" required>
                                                    Foto Nomor Rangka : 
                                                    <input type = "file" name = "foto_norangka" value="<?=$foto_norangka;?>" placeholder = "Foto Nomor Rangka" class = "form-control" required>
                                                    Foto Nomor Mesin :
                                                    <input type = "file" name = "foto_nomesin" value="<?=$foto_nomesin;?>" placeholder = "Foto Nomor Mesin" class = "form-control" required>
                                                    Scan STNK :
                                                    <input type = "file" name = "foto_stnk" value="<?=$foto_stnk;?>" placeholder = "Scan STNK" class = "form-control" required>
                                                    Scan BPKB :
                                                    <input type = "file" name = "foto_bpkb" value="<?=$foto_bpkb;?>" placeholder = "Scan BPKB" class = "form-control" required>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name = "idet" value="<?=$idet;?>">      
                                                    <button type="submit" class="btn btn-primary" name = "updatedetail">Save changes</button>
                                                </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>  
                                                <!-- The Modal Delete -->
                                                <div class="modal fade" id="delete<?=$idet;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus?</h4>
                                                    <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method = "post">
                                                    <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus data ini?
                                                    <br>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name = "idet" value="<?=$idet;?>">      
                                                    <button type="submit" class="btn btn-Danger" name = "deletephoto">Hapus</button>
                                                </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                                </div>
                                        <?php
                                        };
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Created by &copy; Andreas Michael</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <form method = "post" enctype="multipart/form-data">
        <div class="modal-body">
            No Polisi: 
          <input type = "text" name = "no_polisi" placeholder = "No Polisi" class = "form-control" required>
          Foto Mobil : 
          <input type = "file" name = "foto_mobil" placeholder = "Foto Mobil" class = "form-control" required>
          Foto Nomor Rangka : 
          <input type = "file" name = "foto_norangka" placeholder = "Foto Nomor Rangka" class = "form-control" required>
          Foto Nomor Mesin :
          <input type = "file" name = "foto_nomesin" placeholder = "Foto Nomor Mesin" class = "form-control" required>
          Scan STNK :
          <input type = "file" name = "foto_stnk" placeholder = "Scan STNK" class = "form-control" required>
          Scan BPKB :
          <input type = "file" name = "foto_bpkb" placeholder = "Scan BPKB" class = "form-control" required>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "addpicture">Save changes</button>
      </div>
        </form>
        
      </div>
    </div>
  </div>
</html>