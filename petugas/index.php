<?php 
require '../partials/session.php';
require '../config/petugas.php';


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
          <div class="row" id="basic-table">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Pengajuan Pengukuran Tanah</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text">
                      Using the most basic table Leanne Grahamup, here’s how
                      <code>.table</code>-based tables look in Bootstrap. You
                      can use any example of below table for your table and it
                      can be use with any type of bootstrap tables.
                    </p>


                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Alamat Lengkap</th>
                            <th>Dokumen PL</th>
                            <th>Jadwal Pengukuran</th>
                            <th>Ukuran Tanah</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($reports as $data) : ?>
                          <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td>
                              <?= $data["provinsi"]; ?>,
                              <?= $data["kecamatan"]; ?>,
                              <?= $data["kota"]; ?>,
                              <?= $data["alamat_lengkap"]; ?>
                            </td>
                            <td>
                              <?php if ($data["dokumen_pl"] != "") : ?>
                                <a href="../docs/<?= $data["dokumen_pl"]; ?>" target="_BLANK">Lihat</a>
                              <?php endif ?>
                            </td>
                            <td scope="row"><?= $data['waktu_pengukuran'] ?></td>
                            <td scope="row">
                              <?php if ($data["panjang_tanah"] != "") : ?>
                                <?= $data['panjang_tanah'] ?> x <?= $data['lebar_tanah'] ?>
                              <?php endif ?>
                            </td>
                            <td scope="row"><?= $data['status'] ?></td>
                            <td>
                              <?php if ($data["status"] == "Menunggu Jadwal Ukur") : ?>
                                  <a href="atur-jadwal.php?id=<?= $data['id'] ?>" class="btn btn-primary">Atur Jadwal</a>
                              <?php endif ?>
                              <?php if ($data["status"] == "Menunggu Hasil Ukur") : ?>
                                  <a href="form-hasil-ukur.php?id=<?= $data['id'] ?>" class="btn btn-primary">Masukan Hasil Ukur</a>
                              <?php endif ?>
                            </td>
                      
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
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
