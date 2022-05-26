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
                                    <h4 class="card-title">Form Petugas</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-label-group">
                                                            <input type="text" id="first-name-floating" class="form-control" placeholder="Nama Petugas" name="fname-floating">
                                                            <label for="first-name-floating">Nama Petugas</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-label-group">
                                                            <input type="tempat-lahir" id="tempat-lahir-id-floating" class="form-control" name="tempat-lahir-id-floating" placeholder="Tempat Lahir">
                                                            <label for="tempat-lahir-id-floating">Tempat Lahir</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-label-group">
                                                            <input type='date' class="form-control pickadate" />
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-label-group">
                                                            <input type="text" id="password-floating" class="form-control" name="contact-floating" placeholder="Password">
                                                            <label for="password-floating">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-label-group">
                                                            <input type="text" id="password-floating" class="form-control" name="contact-floating" placeholder="Password">
                                                            <label for="password-floating">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-label-group">
                                                            <input type="text" id="password-floating" class="form-control" name="contact-floating" placeholder="Password">
                                                            <label for="password-floating">Password</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    </div>
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
    </div>

    <?php require 'partials/footer.php' ?>
    <?php require 'partials/scripts.php' ?>
  </body>
</html>
