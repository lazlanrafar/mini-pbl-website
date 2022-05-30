<?php
require 'index.php';

function tambah($data) {
	global $conn;

	$id_user = htmlspecialchars($data["id_user"]);
	$provinsi = htmlspecialchars($data["provinsi"]);
	$kecamatan = htmlspecialchars($data["kecamatan"]);
	$kota = htmlspecialchars($data["kota"]);
	$alamat_lengkap = htmlspecialchars($data["alamat_lengkap"]);

	// upload gambar
	$shgb = upload("shgb");
	$imb = upload("imb");
	$sppt_pbb = upload("sppt_pbb");
	if( !$shgb && !$imb && !$sppt_pbb ) {
		return false;
	}

	$query = "INSERT INTO pengajuan_sk (`id`, `id_user`, `id_petugas`, `id_admin`, `provinsi`, `kecamatan`, `kota`, `alamat_lengkap`, `shgb`, `imb`, `sppt_pbb`,`biaya`, `status`, `updated_at`) VALUES (NULL, '$id_user',NULL,NULL, '$provinsi', '$kecamatan', '$kota', '$alamat_lengkap', '$shgb', '$imb', '$sppt_pbb', '', 'Menunggu Konfirmasi', '')";
	mysqli_query($conn, $query);

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