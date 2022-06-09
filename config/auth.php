<?php
require 'index.php';

function registrasi($data) {
	global $conn;

    $nama = htmlspecialchars($data["nama"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$no_ktp = htmlspecialchars($data["no_ktp"]);
	$email = htmlspecialchars($data["email"]);
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

	$query = "INSERT INTO `user`(`id`, `role`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `email`, `password`, `telepon`, `alamat`) VALUES ('','user','$nama','$tempat_lahir','$tanggal_lahir','$no_ktp','$email','$password','$telepon','$alamat')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}