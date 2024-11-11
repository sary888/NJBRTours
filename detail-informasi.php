<?php include 'header.php'; ?>

<style>
    .informasi {
        padding: 20px;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background-color: #fff;
        display: flex; /* Menggunakan flexbox untuk layout */
        padding: 20px;
        align-items: center; /* Menjaga gambar dan teks dalam satu baris */
    }
    .card img {
        border-radius: 5px;
        width: 400px; 
        height: auto;
        margin-right: 20px; /* Memberikan jarak antara gambar dan teks */
    }
    .card-content {
        display: flex;
        flex-direction: column; /* Mengatur elemen teks menjadi kolom */
        justify-content: center; /* Memusatkan elemen teks secara vertikal */
        flex-grow: 1; /* Membiarkan konten mengambil ruang yang tersedia */
    }
    .card-title {
        font-size: 24px;
        font-weight: bold;
        color: black;
        margin: 0 0 10px; /* Mengatur margin bawah judul */
    }
    .card-meta {
        color: #6c757d;
        margin-bottom: 10px; /* Mengurangi margin bawah meta */
    }
    .card-description {
        font-size: 16px;
        width: 600px;
        line-height: 1.6; /* Meningkatkan jarak antar baris untuk keterbacaan */
        color: black;
        padding: 15px; /* Menambah padding di sekitar keterangan */
        border-top: 1px solid #ddd; /* Menambah garis atas untuk memisahkan keterangan */
        margin-top: 10px; /* Memberikan jarak antara elemen di atas dan keterangan */
        background-color: #f9f9f9; /* Memberikan latar belakang yang sedikit berbeda */
        border-radius: 5px; /* Membuat sudut keterangan lebih halus */
    }
</style>

<div class="informasi">
    <div class="section">
        <div class="container">

            <?php
            $informasi = mysqli_query($conn, "SELECT * FROM informasi LEFT JOIN pengguna ON pengguna.id = informasi.created_by WHERE informasi.id = '".$_GET['id']."' ");

            if (mysqli_num_rows($informasi) == 0) {
                echo "<script>window.location='index.php'</script>";
            }

            $p = mysqli_fetch_object($informasi);
            ?>

            <div class="card">
                <img src="uploads/informasi/<?= htmlspecialchars($p->gambar) ?>" alt="<?= htmlspecialchars($p->judul) ?>">
                <div class="card-content"> <!-- Menggunakan div baru untuk konten teks -->
                    <h3 class="card-title"><?= htmlspecialchars($p->judul) ?></h3>
                    <div class="card-meta">
                        <small>Dibuat pada <?= date('d/m/Y', strtotime($p->created_at)) ?>, oleh <?= htmlspecialchars($p->nama) ?></small>
                    </div>
                    <div class="card-description">
                        <p><?=($p->keterangan)?></p>
                    </div>
                </div>
            </div>

        </div>
    </div> 
</div>

<?php include 'footer.php'; ?>
