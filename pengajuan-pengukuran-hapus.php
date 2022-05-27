<?php 
require 'partials/session.php';
require 'config/pengajuan-pengukuran.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'pengajuan-pengukuran.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'pengajuan-pengukuran.php';
		</script>
	";
}
