<?php
require 'index.php';

$reports = mysqli_query($conn, "SELECT * FROM pengajuan_sk");
$list_petugas = mysqli_query($conn, "SELECT * FROM petugas ");

function setStatusDataTidakValid($id) {
	global $conn;
	mysqli_query($conn, "UPDATE pengajuan_sk SET status = 'Data Tidak Valid' WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function setPetugasPengukur($data) {
	global $conn;
	$id = htmlspecialchars($data["id"]);
	$id_petugas = htmlspecialchars($data["id_petugas"]);
	var_dump($id);
	var_dump($id_petugas);
	mysqli_query($conn, "UPDATE pengajuan_sk SET id_petugas = '$id_petugas' WHERE id = $id");
	mysqli_query($conn, "UPDATE pengajuan_sk SET status = 'Petugas Telah Ditentukan' WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function setUkuranTanah($data){
	global $conn;
	$id_pengajuan = htmlspecialchars($data["id_pengajuan"]);

	$panjang_tanah = htmlspecialchars($data["panjang_tanah"]);
	$lebar_tanah = htmlspecialchars($data["lebar_tanah"]);
	$ukuran_tanah = "$panjang_tanah x $lebar_tanah";

	$tanggal_pengukuran = htmlspecialchars($data["tanggal_pengukuran"]);
	$dokumen_pl = upload("dokumen_pl");
	if( !$dokumen_pl ) {
		return false;
	}

	$query = "INSERT INTO ukuran_tanah (`id`, `id_pengajuan`, `ukuran_tanah`, `tanggal_pengukuran`, `dokumen_pl`) VALUES (NULL, '$id_pengajuan', '$ukuran_tanah', '$tanggal_pengukuran', '$dokumen_pl')";
	mysqli_query($conn, $query);

	$luas = ($panjang_tanah * $lebar_tanah) / 10000;
	$biayaPengukuran = ($luas / 500 * 80000) + 100000;
	$biayaPemeriksaan = ($luas / 500 * 67000) + 390000;
	$biayaPendaftaran = 500000;
	$total = $biayaPengukuran + $biayaPemeriksaan + $biayaPendaftaran;

	mysqli_query($conn, "UPDATE pengajuan_sk SET status = 'Selesai' WHERE id = $id_pengajuan");
	mysqli_query($conn, "UPDATE pengajuan_sk SET biaya = $total WHERE id = $id_pengajuan");

	mysqli_query($conn, "INSERT INTO sertifikat_tanah (`id`, `id_pengajuan`, `bukti_pembayaran`,`sertifikat_tanah`, `status`) VALUES (NULL, '$id_pengajuan','','', 'Menunggu Pembayaran')");
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