<?php include 'header.php'; ?>

<div class="section">
    <div class="container" style="display: flex; align-items: flex-start; gap: 20px;">

        <?php
            // Sanitize input and ensure proper database connection
            $id = intval($_GET['id']); // Filter ID to prevent SQL Injection
            $jadwal_paket_umroh = mysqli_query($conn, "SELECT * FROM jadwal_paket_umroh WHERE id = '$id'");

            if (mysqli_num_rows($jadwal_paket_umroh) == 0) {
                echo "<script>window.location='index.php'</script>";
                exit; // Stop further execution
            }
            $p = mysqli_fetch_object($jadwal_paket_umroh);
        ?>

        <!-- Image and Description Section -->
        <div style="flex: 1; display: flex; flex-direction: column; gap: 10px; ">
            <div style="display: flex; gap: 20px; ">
                
                <div style="flex: 1;">
                    <h3 class="text-center"><?= htmlspecialchars($p->nama) ?></h3>
                    <p><?=($p->keterangan)?></p>
                </div>
            </div>
        </div>

            <!-- Registration Section -->
        <div style="max-width: 300px; margin-top: 100px; padding: 15px; border: 1px solid darkgoldenrod; border-radius: 15px; background-color: black; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align: center; color: white;">Pendaftaran Umroh</h3>
            <form action="proses-registrasi.php" method="POST">
                <div style="margin-bottom: 8px;">
                    <label for="nama" style="display: block; font-weight: bold; color: white;">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 8px;">
                    <label for="paket" style="display: block; font-weight: bold; color: white;">Paket:</label>
                    <input type="paket" id="paket" name="paket" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 8px;">
                    <label for="telepon" style="display: block; font-weight: bold; color: white;">No. Telepon:</label>
                    <input type="text" id="telepon" name="telepon" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 8px;">
                    <label for="jumlah_jamaah" style="display: block; font-weight: bold; color: white;">Jumlah Jamaah:</label>
                    <input type="number" id="jumlah_jamaah" name="jumlah_jamaah" required min="1" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <button type="submit" style="background-color: #007BFF; color: white; padding: 8px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">
                    Daftar
                </button>
            </form>

            <!-- Contact Us Section -->
            <div style="margin-top: 15px; text-align: center;">
                <h4 style="color: white;">Hubungi Kami</h4>
                <div style="display: flex; justify-content: center; gap: 10px;">
                    <a href="https://wa.me/6281245678978" target="_blank" style="display: inline-block; background-color: #25D366; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                        WhatsApp
                    </a>
                    <a href="https://www.instagram.com/nhenkjbr_tours" target="_blank" style="display: inline-block; background-color: #E1306C; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                        Instagram
                    </a>
                </div>
            </div>
        </div>



        <!-- Tombol WhatsApp di bawah -->
        <div class="whatsapp-button" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
            <a href="https://wa.me/6281245678978?text=Assalamualaikum,%20Saya%20Ingin%20Berkonsultasi%20" 
               target="_blank" 
               style="display: flex; align-items: center; justify-content: center; background-color: #25D366; color: white; width: 60px; height: 60px; border-radius: 50%; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); transition: background-color 0.3s, transform 0.3s;">
                <img src="https://img.icons8.com/color/48/whatsapp.png" alt="WhatsApp" style="width: 30px;"/>
            </a>
        </div>

        <style>
            .whatsapp-button a:hover {
                background-color: #128C7E; /* Darker green on hover */
                transform: scale(1.1); /* Slightly increase size */
            }
        </style>


    </div>
</div>

<?php include 'footer.php'; ?>
