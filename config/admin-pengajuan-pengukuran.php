<?php
require 'index.php';

$reports = mysqli_query($conn, "SELECT * FROM pengajuan_ukur_tanah");

function handleKonfirmasi($id) {
	global $conn;
	mysqli_query($conn, "UPDATE pengajuan_ukur_tanah SET status = 'Menunggu Jadwal Ukur' WHERE id = $id");

	setPetugasPengukur($id);
	return mysqli_affected_rows($conn);
}

function setPetugasPengukur($id) {
	global $conn;
	$id_petugas = mysqli_query($conn, "SELECT id FROM user WHERE role = 'Petugas' ORDER BY RAND() LIMIT 1");
	$id_petugas = mysqli_fetch_assoc($id_petugas);
	$id_petugas = $id_petugas['id'];

	mysqli_query($conn, "INSERT INTO `ukuran_tanah`(`id`, `id_pengajuan`, `id_petugas`, `waktu_pengukuran`, `lebar_tanah`, `panjang_tanah`, `dokumen_pl`) VALUES (NULL,'$id','$id_petugas',NULL,NULL,NULL,NULL)");
	return mysqli_affected_rows($conn);
}

function setStatusDataTidakValid($id) {
	global $conn;
	mysqli_query($conn, "UPDATE pengajuan_ukur_tanah SET status = 'Data Tidak Valid' WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function setBiayaPengukuran($data){
	global $conn;
	
	$biaya = htmlspecialchars($data['biaya']);
	$query = "INSERT INTO `sertifikat_tanah`(`id`, `id_pengajuan`, `biaya`, `bukti_pembayaran`, `sertifikat_tanah`, `status`) VALUES ('','$data[id]','$biaya',NULL,NULL,'Menunggu Pembayaran')";
	mysqli_query($conn, $query);


	mysqli_query($conn, "UPDATE pengajuan_ukur_tanah SET status = 'Selesai' WHERE id = $data[id]");
	return mysqli_affected_rows($conn);
}