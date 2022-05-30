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

	$query = "INSERT INTO pengajuan_sk (`id`, `id_user`, `id_petugas`, `provinsi`, `kecamatan`, `kota`, `alamat_lengkap`, `shgb`, `imb`, `sppt_pbb`, `ukuran_tanah`, `status`) VALUES (NULL, '$id_user',NULL, '$provinsi', '$kecamatan', '$kota', '$alamat_lengkap', '$shgb', '$imb', '$sppt_pbb', '', 'Menunggu Konfirmasi')";
		
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>