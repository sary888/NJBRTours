<?php 
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['status_login'])) {    
        echo "<script>window.location = '../login.php?msg=Harap Login Lebih Terdahulu!!!'</script>";
    }    
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn,"SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);

    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
        <title>Panel Admin - <?= $d->nama ?></title>
        <link rel ="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tiny.cloud/1/bfstvy4qx6zru9lrxv61jglhe0mii4x636ivwuq2jjf0wn35/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
        selector: 'textarea',
        });
        </script>
        <!-- Tambahkan CSS Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Tambahkan JS Bootstrap dan dependensinya -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body class="bg-light">

        <!-- navbar -->
          <div class="navbar">

            <div class="container">

                <!-- navbar brand -->
                <h2 class="nav-brand float-left"><a href ="index.php"><?= $d->nama ?></a></h2>

                <!-- navbar menu -->
                <ul class="nav-menu float-left">
                    <li><a href="index.php">Dashboard</a></li>

                    <?php if($_SESSION['ulevel'] == 'Super Admin'){ ?>

                        <li><a href="pengguna.php">Pengguna</a></li>

                    <?php }elseif($_SESSION['ulevel']== 'Admin'){ ?>

                        <li><a href="jadwal-paket-umroh.php">Jadwal Paket Umroh</a></li>
                        <li><a href="data-pendaftar.php">Data Pendaftar</a></li>
                        <li><a href="galeri.php">Galeri</a></li>
                        <li><a href="informasi.php">Informasi</a></li>
                        <li>
                            <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

                            <!-- sub menu -->
                                <ul class="dropdown">
                                    <li><a href="identitas-travel.php">Identitas Travel</a></li>
                                    <li><a href="tentang-kami.php">Tentang Kami</a></li>
                                </ul>
                            </li>

                <?php } ?>

                    <li>
                        <a href="#"><?= $_SESSION['uname'] ?>(<?= $_SESSION['ulevel'] ?>)  <i class="fa fa-caret-down"></i></a>

                        <!-- sub menu -->
                        <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                    </ul> 
                </li>
             </ul>

         </div class="clearfix"></div>
     </div>