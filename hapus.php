<?php

	include '../koneksi.php';

	if (isset($_GET['idpengguna'])){

		$delete =mysqli_query($conn, "DELETE FROM pengguna WHERE id= '".$_GET['idpengguna']."'");
		echo "<script>window.location = 'pengguna.php'</script>";

	}

	if (isset($_GET['idjadwal-paket-umroh'])){

		$jadwal_paket_umroh = mysqli_query($conn, "SELECT gambar FROM jadwal_paket_umroh WHERE id= '".$_GET['idjadwal-paket-umroh']."' ");

		if(mysqli_num_rows($jadwal_paket_umroh) > 0){

			$p = mysqli_fetch_object($jadwal_paket_umroh);

			if (file_exists("../uploads/jadwal-paket-umroh/".$p->gambar)){

				unlink("../uploads/jadwal-paket-umroh/".$p->gambar);
			}
		}

		$delete =mysqli_query($conn, "DELETE FROM jadwal_paket_umroh WHERE id= '".$_GET['idjadwal-paket-umroh']."'");
		echo "<script>window.location = 'jadwal-paket-umroh.php'</script>";

	}

	if (isset($_GET['idgaleri'])){

		$galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id= '".$_GET['idgaleri']."' ");

		if(mysqli_num_rows($galeri) > 0){

			$p = mysqli_fetch_object($galeri);

			if (file_exists("../uploads/galeri/".$p->foto)){

				unlink("../uploads/galeri/".$p->foto);
			}
		}

		$delete =mysqli_query($conn, "DELETE FROM galeri WHERE id= '".$_GET['idgaleri']."'");
		echo "<script>window.location = 'galeri.php'</script>";

	}

	if (isset($_GET['idinformasi'])){

		$informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id= '".$_GET['idgaleri']."' ");

		if(mysqli_num_rows($informasi) > 0){

			$p = mysqli_fetch_object($informasi);

			if (file_exists("../uploads/informasi/".$p->gambar)){

				unlink("../uploads/informasi/".$p->gambar);
			}
		}

		$delete =mysqli_query($conn, "DELETE FROM informasi WHERE id= '".$_GET['idinformasi']."'");
		echo "<script>window.location = 'informasi.php'</script>";

	}

?>