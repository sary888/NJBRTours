<?php include 'header.php'; ?>

<!-- content -->
<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Tentang Kami
            </div>

            <div class="box-body">
                <?php
                if (isset($_GET['success'])) {
                    echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tentang Kami</label>
                        <textarea name="tentang" class="input-control" placeholder="Tentang Kami"><?= htmlspecialchars($d->tentang_kami, ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Foto Travel</label>
                        <div class="image-container">
                            <div class="image-overlay">
                                <h3>Selamat Datang Di NhenkJbr Tours</h3>
                            </div>
                            <img src="../uploads/identitas/<?= htmlspecialchars($d->foto_travel, ENT_QUOTES, 'UTF-8') ?>" width="50px" class="image">
                        </div>
                        <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($d->foto_travel, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="file" name="foto_baru" class="input-control">
                    </div>

                    <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-baby-blue">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $tentang = addslashes($_POST['tentang']);
                    $currdate = date('Y-m-d H:i:s');

                    // menampung dan validasi foto travel
                    if ($_FILES['foto_baru']['name'] != '') {
                        $filename = $_FILES['foto_baru']['name'];
                        $tmpname = $_FILES['foto_baru']['tmp_name'];
                        $filesize = $_FILES['foto_baru']['size'];

                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'travel' . time() . '.' . $formatfile;

                        $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                        if (!in_array($formatfile, $allowedtype)) {
                            echo '<div class="alert alert-error">Format file foto travel tidak diizinkan.</div>';
                            return false;
                        } elseif ($filesize > 1000000) {
                            echo '<div class="alert alert-error">Ukuran file foto travel tidak boleh lebih dari 1 MB.</div>';
                            return false;
                        } else {
                            if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {
                                unlink("../uploads/identitas/" . $_POST['foto_lama']);
                            }
                            move_uploaded_file($tmpname, "../uploads/identitas/" . $rename);
                        }
                    } else {
                        $rename = $_POST['foto_lama'];
                    }

                    $update = mysqli_query($conn, "UPDATE pengaturan SET
                            tentang_kami = '" . $tentang . "',
                            foto_travel = '" . $rename . "',
                            updated_at = '" . $currdate . "'
                            WHERE id = '" . $d->id . "'
                        ");

                    if ($update) {
                        echo "<script>window.location='tentang-kami.php?success=Edit Data Berhasil'</script>";
                    } else {
                        echo 'Gagal Edit' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
