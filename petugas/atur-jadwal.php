<?php
require '../partials/session-admin.php';
require '../config/petugas.php' ;

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( setJadwalPengukuran($_POST) > 0 ) {
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
            <div class="col-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Atur Jadwal</h4>
                </div>
                <div class="card-body">
                  <form class="form" action="" method="post">
                      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-label-group mb-2">
                            <input
                              type="date"
                              id="jadwal-ukur"
                              class="form-control"
                              placeholder="No KTP"
                              name="waktu_pengukuran"
                              required
                            />
                            <label for="jadwal-ukur"
                              >Waktu Pengukuran</label
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