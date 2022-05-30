<?php 
require '../partials/session-admin.php';
require '../config/admin-pengajuan-pengukuran.php';

if( isset($_POST["submit"]) ) {
	
	if( setPetugasPengukur($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
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
    <?php require '../partials/navbar.php' ?>
    <?php require '../partials/sidebar-admin-pengukuran.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
          <div class="row" id="basic-table">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Penentuan Petugas Pengukuran Tanah</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                      <fieldset class="form-group">
                        <select
                          class="select2-size-lg form-control"
                          id="basicSelect"
                          name="id_petugas"
                        >
                          <?php foreach ($list_petugas as $data): ?>
                          <option value="<?= $data['id'] ?>">
                            <?= $data['nama'] ?>,
                            <?= $data['tempat_lahir'] ?>
                            <?= $data['tanggal_lahir'] ?>,
                            <?= $data['email'] ?>,
                            <?= $data['telepon'] ?>,
                            <?= $data['alamat'] ?>,
                          </option>
                          <?php endforeach ?>
                        </select>
                      </fieldset>
                      <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" class="btn btn-primary">
                          <i class="feather icon-save"></i>
                          Simpan
                        </button>
                      </div>
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
