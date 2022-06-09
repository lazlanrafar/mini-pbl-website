<?php
require 'index.php';

$reports = query("SELECT 
sertifikat_tanah.id, sertifikat_tanah.status, sertifikat_tanah.sertifikat_tanah, 
pengajuan_sk.provinsi, pengajuan_sk.kota, pengajuan_sk.kecamatan, pengajuan_sk.alamat_lengkap,
pengajuan_sk.biaya,
ukuran_tanah.ukuran_tanah, ukuran_tanah.dokumen_pl
FROM sertifikat_tanah 
JOIN pengajuan_sk 
ON sertifikat_tanah.id_pengajuan = pengajuan_sk.id 
JOIN ukuran_tanah
ON ukuran_tanah.id_pengajuan = pengajuan_sk.id
WHERE pengajuan_sk.id_user = '$_SESSION[userId]'");


function uploadBuktiPembayaran($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $bukti_pembayaran = upload("bukti_pembayaran");

    if( !$bukti_pembayaran ) {
        return false;
    }
    mysqli_query($conn, "UPDATE sertifikat_tanah SET bukti_pembayaran = '$bukti_pembayaran' WHERE id = $id");
    mysqli_query($conn, "UPDATE sertifikat_tanah SET status = 'Menunggu Konfirmasi' WHERE id = $id");
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
