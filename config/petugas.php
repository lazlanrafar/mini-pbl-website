<?php
require 'index.php';

$query = "SELECT ukuran_tanah.id, ukuran_tanah.waktu_pengukuran, ukuran_tanah.lebar_tanah, ukuran_tanah.panjang_tanah, ukuran_tanah.dokumen_pl, pengajuan_ukur_tanah.provinsi, pengajuan_ukur_tanah.kota, pengajuan_ukur_tanah.kecamatan, pengajuan_ukur_tanah.alamat_lengkap, pengajuan_ukur_tanah.status FROM ukuran_tanah JOIN pengajuan_ukur_tanah ON ukuran_tanah.id_pengajuan = pengajuan_ukur_tanah.id";

$reports = mysqli_query($conn, $query);


?>