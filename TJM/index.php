<?php
require 'function.php';
require 'cek.php';
$imgUrl = "logo_tjm.PNG"; 
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
                            <li class="breadcrumb-item active">Main Page</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Tambah Mobil
                                    </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No Polisi</th>
                                            <th>Merk</th>
                                            <th>Tahun</th>
                                            <th>Type</th>
                                            <th>No Rangka</th>
                                            <th>No Mesin</th>
                                            <th>No Faktur</th>
                                            <th>STNK Atas Nama</th>
                                            <th>Status Unit</th>
                                            <th>Unit In</th>
                                            <th>Seller</th>
                                            <th>Unit Out</th>
                                            <th>Buyer</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // buat tampilin data ke tabel //
                                        $ambilsemuadata = mysqli_query($conn,"select * from info");
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                            $nopolisi = $data['no_polisi'];
                                            $merk = $data['merk'];
                                            $type = $data['type'];
                                            $tahun = $data['tahun'];
                                            $norangka = $data['no_rangka'];
                                            $nomesin = $data['no_mesin'];
                                            $nofaktur = $data['no_faktur'];
                                            $stnk = $data['stnk_atasnama'];
                                            $status = $data['status_unit'];
                                            $unitin = $data['unitin'];
                                            $seller = $data['seller'];
                                            $unitout = $data['unitout'];
                                            $buyer = $data['buyer'];
                                            $idm = $data['idmobil'];
                                        
                                    ?>
                                        <tr>
                                            <td><?=$nopolisi;?></td>
                                            <td><?=$merk;?></td>
                                            <td><?=$tahun;?></td>
                                            <td><?=$type;?></td>
                                            <td><?=$norangka;?></td>
                                            <td><?=$nomesin;?></td>
                                            <td><?=$nofaktur;?></td>
                                            <td><?=$stnk;?></td>
                                            <td><?=$status;?></td>
                                            <td><?=$unitin;?></td>
                                            <td><?=$seller;?></td>
                                            <td><?=$unitout;?></td>
                                            <td><?=$buyer;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idm;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name = "idmobilhapus" value="<?=$idm;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                    Delete 
                                                </button>
                                            </td>
                                        </tr>
                                                                                            
                                                <!-- The Modal Edit -->
                                                <div class="modal fade" id="edit<?=$idm;?>">
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
                                                    <form method = "post">
                                                    <div class="modal-body">
                                                    No Polisi : 
                                                    <input type = "text" name = "no_polisi" value="<?=$nopolisi;?>" placeholder = "No Polisi" class = "form-control" required>
                                                    Merk : 
                                                    <input type = "text" name = "merk" value="<?=$merk;?>" placeholder = "Merk" class = "form-control" required>
                                                    Tahun : 
                                                    <input type = "text" name = "tahun" value="<?=$tahun;?>" placeholder = "Tahun" class = "form-control" required>
                                                    Type : 
                                                    <input type = "text" name = "type" value="<?=$type;?>" placeholder = "Type" class = "form-control" required>
                                                    No Rangka : 
                                                    <input type = "text" name = "no_rangka" value="<?=$norangka;?>" placeholder = "No Rangka" class = "form-control" required>
                                                    No Mesin : 
                                                    <input type = "text" name = "no_mesin" value="<?=$nomesin;?>" placeholder = "No Mesin" class = "form-control" required>
                                                    No Faktur : 
                                                    <input type = "text" name = "no_faktur" value="<?=$nofaktur;?>" placeholder = "No Faktur" class = "form-control" required>
                                                    STNK Atas Nama : 
                                                    <input type = "text" name = "stnk_atasnama" value="<?=$stnk;?>" placeholder = "STNK Atas Nama" class = "form-control" required>
                                                    Status Unit : 
                                                    <input type = "text" name = "status_unit" value="<?=$status;?>" placeholder = "Status Unit" class = "form-control" required>
                                                    Seller : 
                                                    <input type = "text" name = "seller" value="<?=$seller;?>" placeholder = "Seller" class = "form-control" required>
                                                    Unit Out : 
                                                    <input type = "text" name = "unitout" value="<?=$unitout;?>" placeholder = "Unit Out" class = "form-control" required>
                                                    Buyer : 
                                                    <input type = "text" name = "buyer" value="<?=$buyer;?>" placeholder = "Buyer" class = "form-control" required>
                                                    <br>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name = "idm" value="<?=$idm;?>">      
                                                    <button type="submit" class="btn btn-primary" name = "update">Save changes</button>
                                                </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                                <!-- The Modal Delete -->
                                                <div class="modal fade" id="delete<?=$idm;?>">
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
                                                    <input type="hidden" name = "idm" value="<?=$idm;?>">      
                                                    <button type="submit" class="btn btn-Danger" name = "delete">Hapus</button>
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
          <h4 class="modal-title">Tambah Mobil</h4>
          <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <form method = "post">
        <div class="modal-body">
        No Polisi : 
          <input type = "text" name = "no_polisi" placeholder = "No Polisi" class = "form-control" required>
          Merk : 
          <input type = "text" name = "merk" placeholder = "Merk" class = "form-control" required>
          Type :
          <input type = "text" name = "type" placeholder = "Type" class = "form-control" required>
          Tahun : 
          <input type = "text" name = "tahun" placeholder = "Tahun" class = "form-control" required>
          No Rangka :
          <input type = "text" name = "no_rangka" placeholder = "No Rankga" class = "form-control" required>
          No Mesin : 
          <input type = "text" name = "no_mesin" placeholder = "No Mesin" class = "form-control" required>
          No Faktur : 
          <input type = "text" name = "no_faktur" placeholder = "No Faktur" class = "form-control" required>
          STNK Atas Nama :
          <input type = "text" name = "stnk_atasnama" placeholder = "STNK Atas Nama" class = "form-control" required>
          Status Unit : 
          <input type = "text" name = "status_unit" placeholder = "Status Unit" class = "form-control" required>
          Unit In : 
          <input type = "text" name = "unitin" placeholder = "Unit In" class = "form-control" required>
          Seller : 
          <input type = "text" name = "seller" placeholder = "Seller" class = "form-control" required>
          Unit Out : 
          <input type = "text" name = "unitout" placeholder = "Unit Out" class = "form-control">
          Buyer : 
          <input type = "text" name = "buyer" placeholder = "Buyer" class = "form-control">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "addnewcar">Save changes</button>
      </div>
        </form>
        
      </div>
    </div>
  </div>
</html>
