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
        <title>Dashboard - Management</title>
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
            <a class="navbar-brand ps-3" href="index.php" >Taruna Jaya Motor</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: </div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PT. Taruna Jaya Motor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
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
                                            <th>Merk</th>
                                            <th>Tahun</th>
                                            <th>STNK Atas Nama</th>
                                            <th>Seller</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Awal</th>
                                            <th>Buyer</th>
                                            <th>Cara Pembayaran</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Nominal Transfer</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     // buat tampilin data ke tabel //
                                        $sql = "SELECT * FROM info, managemet, customer
                                        where info.no_polisi = managemet.no_polisi, managemet.buyer = info.buyer, 
                                        managemet.seller = info.seller, customer.nama = managemet.buyer";

                                        $ambildata = mysqli_query($conn,$sql);
                                        while($data=mysqli_fetch_array($ambildata)){
                                            $nopolisi = $data['no_polisi'];
                                            $merk = $data['merk'];
                                            $tahun = $data['tahun'];
                                            $stnk = $data['stnk_atasnama'];
                                            $seller = $data['seller'];
                                            $hargabeli = $data['hargabeli'];
                                            $hargaawal = $data['hargaawal'];
                                            $buyer = $data['buyer'];
                                            $cara_bayar = $data['cara_bayar'];
                                            $tgl_bayar = $data['tgl_bayar'];
                                            $nominal = $data['nominal'];
                                            $idmng = $data['idmanage'];
                                        
                                    ?>
                                        <tr>
                                            <td><?=$nopolisi;?></td>
                                            <td><?=$merk;?></td>
                                            <td><?=$tahun;?></td>
                                            <td><?=$stnk;?></td>
                                            <td><?=$seller;?></td>
                                            <td><?=$hargabeli;?></td>
                                            <td><?=$hargaawal;?></td>
                                            <td><?=$buyer;?></td>
                                            <td><?=$cara_bayar;?></td>
                                            <td><?=$tgl_bayar;?></td>
                                            <td><?=$nominal;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idmng;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name = "idmobilhapus" value="<?=$idmng;?>">
                                            </td>
                                        </tr>
                                                                                            
                                                <!-- The Modal Edit -->
                                                <div class="modal fade" id="edit<?=$idmng;?>">
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
                                                    <input type = "text" name = "no_polisi" value="<?=$nopolisi;?>" placeholder = "No Polisi" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "merk" value="<?=$merk;?>" placeholder = "Merk" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "tahun" value="<?=$tahun;?>" placeholder = "Tahun" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "type" value="<?=$type;?>" placeholder = "Type" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "no_rangka" value="<?=$norangka;?>" placeholder = "No Rangka" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "no_mesin" value="<?=$nomesin;?>" placeholder = "No Mesin" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "no_faktur" value="<?=$nofaktur;?>" placeholder = "No Faktur" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "stnk_atasnama" value="<?=$stnk;?>" placeholder = "STNK Atas Nama" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "status_unit" value="<?=$status;?>" placeholder = "Status Unit" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "seller" value="<?=$seller;?>" placeholder = "Seller" class = "form-control" required>
                                                    <br>
                                                    <input type = "text" name = "unitout" value="<?=$unitout;?>" placeholder = "Unit Out" class = "form-control" required>
                                                    <br>
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
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <form method = "post">
        <div class="modal-body">
          <input type = "text" name = "no_polisi" placeholder = "No Polisi" class = "form-control" required>
          <input type = "text" name = "merk" placeholder = "Merk" class = "form-control" required>
          <input type = "text" name = "type" placeholder = "Type" class = "form-control" required>
          <input type = "text" name = "tahun" placeholder = "Tahun" class = "form-control" required>
          <input type = "text" name = "no_rangka" placeholder = "No Rankga" class = "form-control" required>
          <input type = "text" name = "no_mesin" placeholder = "No Mesin" class = "form-control" required>
          <input type = "text" name = "no_faktur" placeholder = "No Faktur" class = "form-control" required>
          <input type = "text" name = "stnk_atasnama" placeholder = "STNK Atas Nama" class = "form-control" required>
          <input type = "text" name = "status_unit" placeholder = "Status Unit" class = "form-control" required>
          <input type = "text" name = "unitin" placeholder = "Unit In" class = "form-control" required>
          <input type = "text" name = "seller" placeholder = "Seller" class = "form-control" required>
          <input type = "text" name = "unitout" placeholder = "Unit Out" class = "form-control">
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
