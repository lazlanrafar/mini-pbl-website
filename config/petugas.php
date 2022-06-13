<?php
require 'index.php';

$query = "SELECT ukuran_tanah.id, ukuran_tanah.waktu_pengukuran, ukuran_tanah.lebar_tanah, ukuran_tanah.panjang_tanah, ukuran_tanah.dokumen_pl, pengajuan_ukur_tanah.provinsi, pengajuan_ukur_tanah.kota, pengajuan_ukur_tanah.kecamatan, pengajuan_ukur_tanah.alamat_lengkap, pengajuan_ukur_tanah.status FROM ukuran_tanah JOIN pengajuan_ukur_tanah ON ukuran_tanah.id_pengajuan = pengajuan_ukur_tanah.id WHERE ukuran_tanah.id_petugas = '$_SESSION[userId]'";
// $query = "SELECT ukuran_tanah.id, ukuran_tanah.waktu_pengukuran, ukuran_tanah.lebar_tanah, ukuran_tanah.panjang_tanah, ukuran_tanah.dokumen_pl, pengajuan_ukur_tanah.provinsi, pengajuan_ukur_tanah.kota, pengajuan_ukur_tanah.kecamatan, pengajuan_ukur_tanah.alamat_lengkap, pengajuan_ukur_tanah.status FROM ukuran_tanah JOIN pengajuan_ukur_tanah ON ukuran_tanah.id_pengajuan = pengajuan_ukur_tanah.id WHERE ukuran_tanah.id_petugas = '$_SESSION[userId]' AND pengajuan_ukur_tanah.status != 'Menunggu Harga Pembayaran'";
$reports = mysqli_query($conn, $query);

function setJadwalPengukuran($data){
    global $conn;

    $waktu_pengukuran = htmlspecialchars($data["waktu_pengukuran"]);

    $query = "UPDATE ukuran_tanah SET waktu_pengukuran = '$waktu_pengukuran' WHERE id = '$data[id]'";
    mysqli_query($conn, $query);

    $id_pengajuan = mysqli_query($conn, "SELECT id_pengajuan FROM ukuran_tanah WHERE id = '$data[id]'");
    $id_pengajuan = mysqli_fetch_assoc($id_pengajuan);
    $id_pengajuan = $id_pengajuan["id_pengajuan"];
    mysqli_query($conn, "UPDATE pengajuan_ukur_tanah SET status = 'Menunggu Hasil Ukur' WHERE id = '$id_pengajuan'");

	// Notifikasi ke pemohon
	$id_user = mysqli_query($conn, "SELECT id_user FROM pengajuan_ukur_tanah WHERE id = $id_pengajuan");
	$id_user = mysqli_fetch_assoc($id_user);
	$id_user = $id_user["id_user"];
	mysqli_query($conn, "INSERT INTO `notifikasi`(`id`, `id_user`, `pesan`) VALUES (NULL,'$id_user','Menunggu Hasil Ukur')");

    return mysqli_affected_rows($conn);
}

function handleHasilUkur($data){
    global $conn;

    $panjang_tanah = htmlspecialchars($data["panjang_tanah"]);
    $lebar_tanah = htmlspecialchars($data["lebar_tanah"]);

    $dokumen_pl = upload("dokumen_pl");
	if( !$dokumen_pl ) {
		return false;
	}

    $query = "UPDATE ukuran_tanah SET dokumen_pl = '$dokumen_pl', panjang_tanah = '$panjang_tanah', lebar_tanah = '$lebar_tanah' WHERE id = '$data[id]'";
    mysqli_query($conn, $query);

    $id_pengajuan = mysqli_query($conn, "SELECT id_pengajuan FROM ukuran_tanah WHERE id = '$data[id]'");
    $id_pengajuan = mysqli_fetch_assoc($id_pengajuan);
    $id_pengajuan = $id_pengajuan["id_pengajuan"];
    mysqli_query($conn, "UPDATE pengajuan_ukur_tanah SET status = 'Menunggu Harga Pembayaran' WHERE id = '$id_pengajuan'");

	// Notifikasi ke pemohon
	$id_user = mysqli_query($conn, "SELECT id_user FROM pengajuan_ukur_tanah WHERE id = $id_pengajuan");
	$id_user = mysqli_fetch_assoc($id_user);
	$id_user = $id_user["id_user"];
	mysqli_query($conn, "INSERT INTO `notifikasi`(`id`, `id_user`, `pesan`) VALUES (NULL,'$id_user','Menunggu Hasil Konfirmasi Dari Petugas Pemeriksa')");

    return mysqli_affected_rows($conn);
}

function upload($param) {
	$namaFile = $_FILES[$param]['name'];
	$ukuranFile = $_FILES[$param]['size'];
	$error = $_FILES[$param]['error'];
	$tmpName = $_FILES[$param]['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih Dokumen terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'doc'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../docs/' . $namaFileBaru);

	return $namaFileBaru;
}
?>