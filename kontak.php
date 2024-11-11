<?php include 'header.php';?>

<div class="section">
    <div class="container">
        <h3 class="text-center">Kontak</h3>
        
        <!-- Kontak Informasi - Sejajar di Atas -->
        <div class="contact-info" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <div><b>Alamat:</b> <?= $d->alamat ?></div>
            <div><b>Telepon:</b> <?= $d->telepon ?></div>
            <div><b>Email:</b> <?= $d->email ?></div>
        </div>

        <!-- Google Maps di Tengah -->
        <div class="box-gmaps" style="display: flex; justify-content: center;">
            <div style="width: 100%; max-width: 800px; box-sizing: border-box;">
                <iframe src="<?= $d->google_maps ?>" width="130%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        <!-- Bagian lainnya ... -->

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
</div>

<?php include 'footer.php';?>
