<?php include 'header.php' ?>

<?php 
    $jadwal_paket_umroh = mysqli_query($conn,"SELECT * FROM jadwal_paket_umroh WHERE id = '".$_GET['id']."' ");

    if(mysqli_num_rows($jadwal_paket_umroh) == 0){
        echo "<script>window.location='jadwal_paket_umroh.php' </script>";
    }
    $p        = mysqli_fetch_object($jadwal_paket_umroh);
        

?>
         <!-- content -->
         <div class="content">

            <div class="container">

                <div class="box">

                    <div class="box-header">
                        Edit Jadwal Paket Umroh
                    </div>

                    <div class="box-body">

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama</label> 
                                <input type="text" name="nama" placeholder="Nama Jadwal Paket Umroh" value="<?= $p->nama ?>"  class="input-control" required>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="input-control" placeholder="Keterangan"><?= $p->keterangan ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <img src="../uploads/jadwal/<?= $p->gambar ?>"width="200px" class="image">
                                <input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
                                <input type="file" name="gambar" class="input-control">
                            </div>

                            <button type="button" class="btn"onclick="window.location='jadwal-paket-umroh.php'">Kembali</button>
                            <input type="submit" name="submit"value="Simpan" class="btn btn-baby-blue">

                </from>

                 <?php

                    if(isset($_POST['submit'])){

                        $nama   = addslashes(ucwords($_POST['nama']));
                        $ket    = addslashes($_POST['keterangan']);
                        $currdate = date ('Y-m-d H:i:s');

                        if($_FILES['gambar']['name'] !=''){

                            echo 'User Ganti Gambar';

                            $filename = $_FILES['gambar']['name'];
                            $tmpname  = $_FILES['gambar']['tmp_name'];
                            $filesize = $_FILES['gambar']['size'];

                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename     = 'jadwal'.time().'.'.$formatfile;

                            $allowedtype = array('png','jpg','jpeg','gif');

                            if(!in_array($formatfile,$allowedtype)){

                                echo '<div class="alert alert-error">Format file tidak diizinkan.</div';

                                return false;

                            }elseif($filesize > 1000000 ){

                                echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div';

                                return false;

                            }else{

                                if(file_exists("../uploads/jadwal/".$_POST['gambar2'])){

                                    unlink("../uploads/jadwal/".$_POST['gambar2']);
                                }


                                move_uploaded_file($tmpname, "../uploads/jadwal/".$rename);

                            }

                        }else{

                            // echo 'User Tidak Ganti Gambar';

                            $rename     = $_POST['gambar2'];

                        }

                        $update   = mysqli_query($conn,"UPDATE jadwal_paket_umroh SET
                                nama        = '".$nama."',
                                keterangan  = '".$ket."',
                                gambar       = '".$rename."',
                                updated_at  = '".$currdate."'
                                WHERE id    = '".$_GET['id']."'
                            ");


                            if($update) {
                                echo "<script>window.location='jadwal-paket-umroh.php?success=Edit Data Berhasil'</script>";
                            }else{
                            echo 'Gagal Edit'.mysqli_error($conn);
                            }


                    }



             ?>

        </div>

    </div>

</div>





<?php include 'footer.php' ?>
