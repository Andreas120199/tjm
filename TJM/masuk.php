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
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
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
                            <li class="breadcrumb-item active">Barang Masuk</li>
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
											<th>Tanggal</th>
											<th>Nama Barang</th>
											<th>Jenis</th>
											<th>Merk</th>
											<th>Ukuran</th>
											<th>Jumlah</th>
											<th>Keterangan</th>
											<th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // buat tampilin data ke tabel //
                                    $brg=mysqli_query($conn,"SELECT * from barang_masuk sb, stock st where st.idstock=sb.idstock order by sb.id DESC");
                                    
                                    while($b=mysqli_fetch_array($brg)){
                                        $idb = $b['idstock'];
                                        $id = $b['id'];
                                        ?>
                                        <tr>
                                            <td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
                                            <td><?php echo $b['nama'] ?></td>
                                            <td><?php echo $b['jenis'] ?></td>
                                            <td><?php echo $b['merk'] ?></td>
                                            <td><?php echo $b['ukuran'] ?></td>
                                            <td><?php echo $b['jumlah'] ?></td>
                                            <td><?php echo $b['keterangan'] ?></td>
                                            <td>
                                            <button data-toggle="modal" data-target="#edit<?=$id;?>" class="btn btn-warning">Edit</button> 
                                            <button data-toggle="modal" data-target="#del<?=$id;?>" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                                                                            
                                                <!-- The Modal Edit -->
                                                <div class="modal fade" id="edit<?=$id;?>">
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
                                                   
                                                    Tanggal :
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo $b['tgl'] ?>">
                                                    Nama Barang :
                                                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $b['nama'] ?> <?php echo $b['merk'] ?> <?php echo $b['jenis'] ?>" disabled>
                                                    Ukuran Barang :
                                                    <input type="text" id="ukuran" name="ukuran" class="form-control" value="<?php echo $b['ukuran'] ?>" disabled>
                                                    Jumlah Barang :
                                                    <input type="text" id="jumlah" name="jumlah" class="form-control" value="<?php echo $b['jumlah'] ?>">
                                                    Keterangan :
                                                    <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $b['keterangan'] ?>">
                                                    <input type="hidden" name="id" value="<?=$id;?>">
                                                    <input type="hidden" name="idstock" value="<?=$idb;?>">

                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name = "ids" value="<?=$ids;?>">      
                                                    <button type="submit" class="btn btn-primary" name = "updatebarangmasuk">Save changes</button>
                                                </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                                <!-- The Modal Delete -->
                                                <div class="modal fade" id="del<?=$id;?>">
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
                                                    *Stock barang akan berkurang
                                                    <input type="hidden" name="id" value="<?=$id;?>">
                                                    <input type="hidden" name="idstock" value="<?=$idb;?>">
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                                                    <button type="submit" class="btn btn-Danger" name = "deletebarangmasuk">Hapus</button>
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
							    <a href="stock/exportbrgmsk.php" target="_blank" class="btn btn-info">Export Data</a>
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
          <h4 class="modal-title">Input Data Barang Masuk</h4>
          <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <form action="stock/barang_masuk_act.php" method="post">
        <div class="modal-body">
        Tanggal :
		<input name="tanggal" type="date" class="form-control"required>
        Nama Barang :
		<select name="barang" class="custom-select form-control">
		<option selected>Pilih barang</option>
		    <?php
		    $det=mysqli_query($conn,"select * from stock order by nama ASC");
		    while($d=mysqli_fetch_array($det)){
		        ?>
		            <option value="<?php echo $d['idstock'] ?>"><?php echo $d['nama'] ?> <?php echo $d['jenis'] ?> <?php echo $d['merk'] ?>, Ukuran. <?php echo $d['ukuran'] ?></option>
		        <?php
		    }
		?> 
        </select>
        Jumlah Barang :
        <input name="qty" type="number" min="1" class="form-control" placeholder="Qty"required>
         Keterangan :
        <input name="ket" type="text" class="form-control" placeholder="Keterangan"required>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="submit" class="btn btn-primary" value="Save Change">
      </div>
        </form>
        
      </div>
    </div>
  </div>
</html>
