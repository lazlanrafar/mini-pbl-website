<?php
require 'index.php';

$reports = mysqli_query($conn, "SELECT * FROM user WHERE role = 'petugas'");

function tambahPetugas($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$no_ktp = htmlspecialchars($data["no_ktp"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$alamat = htmlspecialchars($data["alamat"]);

	// cek no ktp sudah ada atau belum
	$result = mysqli_query($conn, "SELECT no_ktp FROM user WHERE no_ktp = '$no_ktp'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('KTP sudah terdaftar!')
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO `user`(`id`, `role`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `email`, `password`, `telepon`, `alamat`) VALUES ('', 'petugas', '$nama', '$tempat_lahir', '$tanggal_lahir', '$no_ktp', '$email', '$password', '$telepon', '$alamat')";
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

	$query = "UPDATE user SET
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
	mysqli_query($conn, "DELETE FROM user WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>