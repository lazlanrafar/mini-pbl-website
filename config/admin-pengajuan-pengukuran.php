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
?>