<?php
require 'index.php';

$reports = mysqli_query($conn, "SELECT * FROM petugas");

function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$email = htmlspecialchars($data["email"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "INSERT INTO petugas
				VALUES
			  ('', '$nama', '$tempat_lahir', '$tanggal_lahir', '$email', '$telepon', '$alamat')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function edit($data) {
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$email = htmlspecialchars($data["email"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$alamat = htmlspecialchars($data["alamat"]);

	

	$query = "UPDATE petugas SET
				nama = '$nama',
				tempat_lahir = '$tempat_lahir',
				tanggal_lahir = '$tanggal_lahir',
				email = '$email',
				telepon = '$telepon',
				alamat = '$alamat'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM petugas WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>