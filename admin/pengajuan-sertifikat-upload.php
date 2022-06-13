<?php 
require '../partials/session-admin.php' ;
require '../config/admin-pengajuan-sertifikat.php' ;

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	// cek apakah data berhasil di tambahkan atau tidak
	if( uploadSertifikatTanah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'pengajuan-sertifikat.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'pengajuan-sertifikat.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html class="loading" lang="en">
  <?php require '../partials/head.php' ?>
  <body
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static"
    data-open="click"
    data-menu="vertical-menu-modern"
    data-col="2-columns"
  >
    <?php require '../partials/navbar-admin.php' ?>
    <?php require '../partials/sidebar-admin-sertifikat.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
          <div class="row justify-content-center" id="basic-table">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Sertifikat Tanah</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" class="mt-2">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <div class="form-label-group mb-2">
                            <input
                              type="file"
                              id="sertifikat-tanah"
                              class="form-control"
                              placeholder="Sertifikat Tanah"
                              name="sertifikat_tanah"
                              required
                            />
                            <label for="sertifikat-tanah">Sertifikat Tanah</label>
                          </div>
             
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require '../partials/footer.php' ?>
    <?php require '../partials/scripts.php' ?>
  </body>
</html>
