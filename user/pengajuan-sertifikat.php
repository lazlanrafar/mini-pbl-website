<?php 
require '../partials/session.php' ;
require '../config/pengajuan-sertifikat.php' ;


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
    <?php require '../partials/sidebar-user-sertifikat.php' ?>

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
                    <p class="card-text">
                      Using the most basic table Leanne Grahamup, here’s how
                      <code>.table</code>-based tables look in Bootstrap. You
                      can use any example of below table for your table and it
                      can be use with any type of bootstrap tables.
                    </p>
                    <div class="d-flex my-2 justify-content-end">
                      <a
                        href="pengajuan-pengukuran-tambah.php"
                        class="btn btn-primary"
                        ><i class="fa fa-plus"></i> Ajukan</a
                      >
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User ID</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Leanne Graham</td>
                            <td>sincere@april.biz</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Ervin Howell</td>
                            <td>shanna@melissa.tv</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Clementine Bauch</td>
                            <td>nathan@yesenia.net</td>
                            <td>@twitter</td>
                          </tr>
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
