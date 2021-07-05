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
            <a class="navbar-brand ps-3" href="index.php" >Taruna Jaya Motor</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
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
                            <li class="breadcrumb-item"><a href="index.php">Main Page</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                                            <th>Nama</th>
                                            <th>No Telepon 1 +62</th>
                                            <th>No Telepon 2 +62</th>
                                            <th>No Telepon 3 +62</th>
                                            <th>Alamat</th>
                                            <th>Keterangan</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // buat tampilin data ke tabel //
                                        $ambildatacustomer = mysqli_query($conn,"select * from customer");
                                        while($datacustomer=mysqli_fetch_array($ambildatacustomer)){
                                            $nama = $datacustomer['nama'];
                                            $notlp1 = $datacustomer['notlp1'];
                                            $notlp2 = $datacustomer['notlp2'];
                                            $notlp3 = $datacustomer['notlp3'];
                                            $alamat = $datacustomer['alamat'];
                                            $deskripsi = $datacustomer['deskripsi'];
                                            $idc = $datacustomer['idcustomer'];
                                        
                                    ?>
                                        <tr>
                                            <td><?=$nama;?></td>
                                            <td><?=$notlp1;?></td>
                                            <td><?=$notlp2;?></td>
                                            <td><?=$notlp3;?></td>
                                            <td><?=$alamat;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idc;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name = "idcustomerhapus" value="<?=$idc;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idc;?>">
                                                    Delete 
                                                </button>
                                            </td>
                                        </tr>
                                                                                            
                                                <!-- The Modal Edit -->
                                                <div class="modal fade" id="edit<?=$idc;?>">
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
                                                    Nama : 
                                                    <input type = "text" name = "nama" value="<?=$nama;?>" placeholder = "Nama" class = "form-control" required>
                                                    <br>
                                                    Nomor Telepon :
                                                    <input type = "text" name = "notlp1" value="<?=$notlp1;?>" placeholder = "No Telepon 1" class = "form-control" required>
                                                    <input type = "text" name = "notlp2" value="<?=$notlp2;?>" placeholder = "No Telepon 2" class = "form-control">
                                                    <input type = "text" name = "notlp3" value="<?=$notlp3;?>" placeholder = "No Telepon 3" class = "form-control">
                                                    <br>
                                                    Alamat :
                                                    <input type = "text" name = "alamat" value="<?=$alamat;?>" placeholder = "Alamat" class = "form-control" required>
                                                    <br>
                                                    Keterangan :
                                                    <input type = "text" name = "deskripsi" value="<?=$deskripsi;?>" placeholder = "Keterangan" class = "form-control">
                                                    <br>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name = "idc" value="<?=$idc;?>">      
                                                    <button type="submit" class="btn btn-primary" name = "updatecustomer">Save changes</button>
                                                </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                                <!-- The Modal Delete -->
                                                <div class="modal fade" id="delete<?=$idc;?>">
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
                                                    <input type="hidden" name = "idc" value="<?=$idc;?>">      
                                                    <button type="submit" class="btn btn-Danger" name = "deletecustomer">Hapus</button>
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
         
          Nama :
          <input type = "text" name = "nama" placeholder = "Nama" class = "form-control" required>
          <br>
          Nomor Telepon :
          <input type = "text" name = "notlp1" placeholder = "No Telepon 1" class = "form-control" required>
          <input type = "text" name = "notlp2" placeholder = "No Telepon 2" class = "form-control" >
          <input type = "text" name = "notlp3" placeholder = "No Telepon 3" class = "form-control" >
          <br>
          Alamat : 
          <input type = "text" name = "alamat" placeholder = "Alamat" class = "form-control" required>
          <br>
          Keterangan : 
          <input type = "text" name = "deskripsi" placeholder = "Keterangan" class = "form-control">
          <br>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "addnewcustomer">Save changes</button>
      </div>
        </form>
        
      </div>
    </div>
  </div>
</html>
