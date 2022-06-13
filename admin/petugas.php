<?php 
require '../partials/session-admin.php';
require '../config/admin-petugas.php' ;


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
    <?php require '../partials/sidebar-admin-petugas.php' ?>

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
                  <h4 class="card-title">Tabel Petugas</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="d-flex my-2 justify-content-end">
                      <a
                        href="petugas-tambah.php"
                        class="btn btn-primary"
                        ><i class="fa fa-plus"></i> Tambah </a
                      >
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach( $reports as $data ) : ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data["nama"]; ?></td>
                            <td>
                              <?= $data["tempat_lahir"]; ?>,
                              <?= $data["tanggal_lahir"]; ?>
                            </td>
                            <td><?= $data["email"]; ?></td>
                            <td><?= $data["telepon"]; ?></td>
                            <td><?= $data["alamat"]; ?></td>
                            <td>
                              <a
                                href="petugas-edit.php?id=<?= $data["id"]; ?>"
                                class="btn btn-warning p-1 rounded-circle"
                                ><i class="fa fa-pencil"></i
                              ></a>
                              <a
                                href="petugas-hapus.php?id=<?= $data["id"]; ?>"
                                class="btn btn-danger p-1 rounded-circle"
                                ><i class="fa fa-bitbucket"></i
                              ></a>
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
