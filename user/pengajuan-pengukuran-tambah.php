<?php 
require '../partials/session.php';
require '../config/user-pengajuan-pengukuran.php';

$dataUser = query("SELECT * FROM user WHERE id = '$_SESSION[userId]'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	// cek apakah data berhasil di tambahkan atau tidak
	if( MengajukanPengukuran($_POST) > 0 ) {
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
    <?php require '../partials/navbar-user.php' ?>
    <?php require '../partials/sidebar-user-pengukuran.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="pengajuan-pengukuran.php">Pengajuan Pengukuran</a>
              </li>
              <li class="breadcrumb-item active">
                Form Pengajuan Pengukuran Tanah
              </li>
            </ol>
          </div>
        </div>
        <div class="content-body">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Form Pengajuan Pengukuran Tanah</h4>
                </div>
                <div class="card-body">
                  <form
                    class="form"
                    action=""
                    method="post"
                    enctype="multipart/form-data"
                  >
                    <input
                      type="hidden"
                      name="id_user"
                      value="<?php echo $dataUser['id']; ?>"
                    />
                    <div class="form-body">
                      <p class="mb-2">
                        <span class="text-bold-600">Informasi Pengaju</span>
                      </p>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="no-ktp"
                              class="form-control"
                              placeholder="Nomor KTP"
                              value="<?php echo $dataUser['no_ktp']; ?>"
                              disabled
                            />
                            <label for="no-ktp">Nomor KTP</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="nama-user"
                              class="form-control"
                              placeholder="Nama Pengaju"
                              value="<?php echo $dataUser['nama']; ?>"
                              disabled
                            />
                            <label for="nama-user">Nama Pengaju</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="email-pengaju"
                              class="form-control"
                              placeholder="Email Address"
                              value="<?php echo $dataUser['email']; ?>"
                              disabled
                            />
                            <label for="email-pengaju">Email Address</label>
                          </div>
                        </div>
                      </div>
                      <p class="mb-2 mt-3">
                        <span class="text-bold-600">Informasi Alamat : </span>
                        Alamat tanah yang ingin diukur
                      </p>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="provinsi"
                              class="form-control"
                              name="provinsi"
                              placeholder="Provinsi"
                              required
                            />
                            <label for="provinsi">Provinsi</label>
                          </div>
                        </div>
                        
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="kota"
                              class="form-control"
                              name="kota"
                              placeholder="Kota/Kabupaten"
                              required
                            />
                            <label for="kota">Kota/Kabupaten</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-label-group mb-2">
                            <input
                              type="text"
                              id="kecamatan"
                              class="form-control"
                              name="kecamatan"
                              placeholder="Kecamatan"
                              required
                            />
                            <label for="kecamatan">Kecamatan</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-label-group mb-2">
                            <textarea
                              type="text"
                              id="alamat-floating"
                              class="form-control"
                              name="alamat_lengkap"
                              placeholder="Alamat"
                              required
                            ></textarea>
                            <label for="alamat-floating">Alamat Lengkap</label>
                          </div>
                        </div>
                      </div>

                      <p class="mb-3 mt-3">
                        <span class="text-bold-600">Informasi Dokumen : </span>
                        Upload Dokumen yang dibutuhkan
                      </p>
                      <div class="row">
                        <div class="col-12 mb-2">
                          <div class="form-label-group mb-2">
                            <input
                              type="file"
                              id="shgb"
                              class="form-control"
                              name="shgb"
                              placeholder="SHGB (Sertifikat Hak Guna Bangunan)"
                              required
                            />
                            <label for="shgb"
                              >SHGB (Sertifikat Hak Guna Bangunan)</label
                            >
                          </div>
                        </div>
                        <div class="col-12 mb-2">
                          <div class="form-label-group mb-2">
                            <input
                              type="file"
                              id="imb"
                              class="form-control"
                              name="imb"
                              placeholder="IMB (Izin Mendirikan Bangunan)"
                              required
                            />
                            <label for="imb"
                              >IMB (Izin Mendirikan Bangunan)</label
                            >
                          </div>
                        </div>
                        <div class="col-12 mb-2">
                          <div class="form-label-group mb-2">
                            <input
                              type="file"
                              id="sppt_pbb"
                              class="form-control"
                              name="sppt_pbb"
                              placeholder="SPPT SBB -  Surat Keputusan dari Kantor Pelayanan Pajak (KPP)"
                              required
                            />
                            <label for="sppt_pbb"
                              >SPPT SBB - Surat Keputusan dari Kantor Pelayanan
                              Pajak (KPP)</label
                            >
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
    </div>

    <?php require '../partials/footer.php' ?>
    <?php require '../partials/scripts.php' ?>
  </body>
</html>
