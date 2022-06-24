<?php
require '../partials/session-admin.php';
require '../config/petugas.php' ;

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( handleHasilUkur($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
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
    <?php require '../partials/navbar-petugas.php' ?>
    <?php require '../partials/sidebar-petugas.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Form Hasil Pengukuran</h4>
                </div>
                <div class="card-body">
                  <form class="form" action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-label-group mb-2">
                            <input
                              type="number"
                              id="panjang-tanah"
                              class="form-control"
                              placeholder="Panjang Tanah"
                              name="panjang_tanah"
                              required
                            />
                            <label for="panjang-tanah"
                              >Panjang Tanah</label
                            >
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-label-group mb-2">
                            <input
                              type="number"
                              id="lebar-tanah"
                              class="form-control"
                              placeholder="Lebar Tanah"
                              name="lebar_tanah"
                              required
                            />
                            <label for="lebar-tanah"
                              >Lebar Tanah</label
                            >
                          </div>
                        </div>
                        <div class="col-12 mt-2">
                          <div class="form-label-group mb-2">
                            <input
                              type="file"
                              id="dokumen-pl"
                              class="form-control"
                              placeholder="Dokumen PL"
                              name="dokumen_pl"
                              required
                            />
                            <label for="dokumen-pl"
                              >Dokumen PL</label
                            >
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" class="btn btn-primary mr-1 mb-1">
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
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