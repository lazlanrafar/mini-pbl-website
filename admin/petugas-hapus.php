<?php 
require '../partials/session-admin.php';
require '../config/admin-petugas.php' ;

$id = $_GET["id"];

if( hapus($id) > 0 ) {
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