<?php

require 'config/index.php';
$datas = query("SELECT * FROM petugas");

?>

<!DOCTYPE html>
<html class="loading" lang="en">
  <?php require 'partials/head.php' ?>
  <body
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static"
    data-open="click"
    data-menu="vertical-menu-modern"
    data-col="2-columns"
  >
    <?php require 'partials/navbar.php' ?>
    <?php require 'partials/sidebar-petugas.php' ?>

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
                  <div class="d-flex">
                    <h4 class="card-title">Tabel Petugas</h4>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="d-flex justify-content-end">
                      <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#default">Tambah</button>
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
                          <?php foreach( $datas as $data ) : ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data["nama"]; ?></td>
                            <td><?= $data["tempat_lahir"]; ?>, <?= $data["tanggal_lahir"]; ?></td>
                            <td><?= $data["email"]; ?></td>
                            <td><?= $data["telepon"]; ?></td>
                            <td><?= $data["alamat"]; ?></td>
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

    <!-- Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Check First Paragraph</h5>
                                                                <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie.
                                                                    Brownie carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake
                                                                    cheesecake cookie chocolate cake liquorice.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

    <?php require 'partials/footer.php' ?>
    <?php require 'partials/scripts.php' ?>
  </body>
</html>
