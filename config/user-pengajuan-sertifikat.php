<?php
require 'index.php';

$reports = mysqli_query($conn, "SELECT sertifikat_tanah.id,sertifikat_tanah.biaya,sertifikat_tanah.status, sertifikat_tanah.bukti_pembayaran,sertifikat_tanah.sertifikat_tanah,pengajuan_ukur_tanah.provinsi,pengajuan_ukur_tanah.kota, pengajuan_ukur_tanah.kecamatan, pengajuan_ukur_tanah.alamat_lengkap, ukuran_tanah.dokumen_pl, ukuran_tanah.panjang_tanah, ukuran_tanah.lebar_tanah FROM sertifikat_tanah JOIN pengajuan_ukur_tanah ON sertifikat_tanah.id_pengajuan = pengajuan_ukur_tanah.id JOIN ukuran_tanah ON ukuran_tanah.id_pengajuan = pengajuan_ukur_tanah.id WHERE pengajuan_ukur_tanah.id_user = '$_SESSION[userId]'");


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
