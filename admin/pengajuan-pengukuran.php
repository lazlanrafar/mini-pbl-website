<?php 
require '../partials/session-admin.php';
require '../config/admin-pengajuan-pengukuran.php';

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
                  <h4 class="card-title">Pengajuan Pengukuran Tanah</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Alamat Lengkap</th>
                            <th>SHGB</th>
                            <th>IMB</th>
                            <th>SPPT PBB</th>
                            <th>Petugas</th>
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
                              <a href="docs/<?= $data["shgb"]; ?>" target="_BLANK">Download</a>
                            </td>
                            <td>
                              <a href="docs/<?= $data["imb"]; ?>" target="_BLANK">Download</a>
                            </td>
                            <td>
                              <a href="docs/<?= $data["sppt_pbb"]; ?>" target="_BLANK">Download</a>
                            </td>
                            <td><?= $data["id_petugas"]; ?></td>
                            <td>
                            <?php if($data['status'] == "Selesai") { ?>
                              <span class="badge badge-success"><?= $data["status"]; ?></span>
                            <?php } else { ?>
                              <span class="badge badge-warning"><?= $data["status"]; ?></span>
                            <?php } ?>
                            </td>
                            <td>
                              <?php if($data['status'] != "Selesai") { ?>
                              <div class="btn-group dropleft">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <?php if($data['status'] == "Menunggu Konfirmasi") { ?>
                                      <a class="dropdown-item" href="#">Tentukan Petugas</a>
                                    <?php } ?>
                                    <a class="dropdown-item" href="#">Masukan Luas Tanah</a>
                                    <a class="dropdown-item text-danger font-weight-bold" href="#">Data tidak Valid</a>
                                </div>
                              </div>
                              <?php } ?>
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
