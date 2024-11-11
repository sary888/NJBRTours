<?php include 'header.php' ?>
     <!-- content -->
     <div class="content">

            <div class="container">

                <div class="box">

                    <div class="box-header">
                        Data Pendaftar
                    </div>

                        <form action="">
                            <div class="input-group">
                                <input type="text" name="key" placeholder="Pencarian">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Telepon</th>
                        <th>Jumlah Jamaah</th>
                        <th>Tanggal Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // Ambil data pendaftar dari database
            $result = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY id DESC");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['paket']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jumlah_jamaah']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data pendaftar</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>


<?php include 'footer.php' ?>
