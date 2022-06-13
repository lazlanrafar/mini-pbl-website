<?php 
require '../partials/session-admin.php';
require '../config/admin-pengajuan-sertifikat.php' ;


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
          <div class="row" id="basic-table">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Pengajuan Sertifikat Tanah</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
            
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Alamat</th>
                            <th>Dokumen PL</th>
                            <th>Luas</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($reports as $data) : ?>
                          <tr>
                            <th scope="row">1</th>
                            <td><?= $data['provinsi'] ?>, <?= $data['kota'] ?>, <?= $data['kecamatan'] ?>, <?= $data['alamat_lengkap'] ?></td>
                            <td>
                              <a href="../docs/<?= $data['dokumen_pl'] ?>" target="_BLANK">Download</a>
                            </td>
                            <td><?= $data['panjang_tanah'] ?> x <?= $data['lebar_tanah'] ?></td>
                            <td><?= $data['biaya'] ?></td>
                            <td>
                              <?php if($data['status'] == "Selesai") : ?>
                              <span class="badge badge-success"><?= $data['status'] ?></span>
                              <?php else : ?>
                              <span class="badge badge-warning"><?= $data['status'] ?></span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="../docs/<?= $data['bukti_pembayaran'] ?>" target="_BLANK">Download</a>
                            </td>
                            <td>
                              <?php if($data['status'] == "Menunggu Konfirmasi"){ ?>
                              <a href="pengajuan-sertifikat-upload.php?id=<?=$data['id'] ?>" class="btn btn-primary">Konfirmasi</a>
                              <?php } ?>
                              <?php if($data['status'] == "Selesai"){ ?>
                              <a href="../docs/<?=$data['sertifikat_tanah'] ?>" target="_BLANK" class="">Download Sertifikat</a>
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
