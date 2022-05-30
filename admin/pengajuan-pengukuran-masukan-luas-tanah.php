<?php 
require '../partials/session-admin.php';
require '../config/admin-pengajuan-pengukuran.php';

$dataPengajuan = query("SELECT * FROM pengajuan_sk WHERE id = $_GET[id]")[0];
$dataPengaju = query("SELECT * FROM user WHERE id = $dataPengajuan[id_user]")[0];

if( isset($_POST["submit"]) ) {
  if( setUkuranTanah($_POST) > 0 ) {
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
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Memasukan Hasil Pengukuran Tanah</h4>
              </div>
              <div class="card-body">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_pengajuan" value="<?= $_GET['id'] ?>">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-label-group mb-2">
                          <input id="no-ktp" type="text" class="form-control"
                          placeholder="No KTP Pengaju" value="<?= $dataPengaju["no_ktp"] ?>"
                          disabled />
                          <label for="no-ktp">No KTP Pengaju</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-label-group mb-2">
                          <input id="nama-pengaju" type="text"
                          class="form-control" placeholder="Nama Pengaju"
                          value="<?= $dataPengaju["nama"] ?>" disabled />
                          <label for="nama-pengaju">Nama Pengaju</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-label-group mb-2">
                          <input type="text" id="alamat-dokumen"
                          class="form-control" placeholder="Alamat Pengukuran"
                          value="<?= $dataPengajuan["provinsi"] ?>, <?= $dataPengajuan["kota"] ?>, <?= $dataPengajuan["kecamatan"] ?>, <?= $dataPengajuan["alamat_lengkap"] ?>" disabled />
                          <label for="alamat-dokumen">Alamat Pengukuran</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-label-group mb-2">
                          <input
                            type="date"
                            id="tanggal-pengukuran"
                            class="form-control"
                            name="tanggal_pengukuran"
                            placeholder="Tanggal Pengukuran"
                            required
                          />
                          <label for="tanggal-pengukuran"
                            >Tanggal Pengukuran</label
                          >
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-label-group mb-2">
                          <input
                            type="number"
                            id="panjang-tanah"
                            class="form-control"
                            name="panjang_tanah"
                            placeholder="Panjang Tanah"
                            required
                          />
                          <label for="panjang-tanah">Panjang Tanah</label>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-label-group mb-2">
                          <input
                            type="number"
                            id="lebar-tanah"
                            class="form-control"
                            name="lebar_tanah"
                            placeholder="Lebar Tanah"
                            required
                          />
                          <label for="lebar-tanah">Lebar Tanah</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-label-group mb-2">
                          <input
                            type="file"
                            id="dokumen-pl"
                            class="form-control"
                            name="dokumen_pl"
                            placeholder="Dokumen PL"
                            required
                          />
                          <label for="dokumen-pl">Dokumen PL</label>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      <button
                        type="submit"
                        name="submit"
                        class="btn btn-primary mr-1 mb-1"
                      >
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

    <?php require '../partials/footer.php' ?>
    <?php require '../partials/scripts.php' ?>
  </body>
</html>
