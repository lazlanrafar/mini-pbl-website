<?php 
require 'config/index.php';

$id = $_GET["id"];

if( hapusPetugas($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'petugas.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'petugas.php';
		</script>
	";
}

?>