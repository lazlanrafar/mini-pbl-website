<?php 
require '../partials/session-admin.php';
require '../config/dashboard.php';


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
    <?php require '../partials/sidebar-admin-dashboard.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
          <!-- Bar Chart -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Bar Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="bar-chart" class="height-400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Line Chart -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Line Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="line-chart" class="height-400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Pie Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="pie-chart" class="height-400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Scatter Chart -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Scatter Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="scatter-chart" class="height-400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Polar Chart -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Polar Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="polar-chart" class="height-400"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Radar Chart -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Radar Chart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="radar-chart" class="height-400"></div>
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
