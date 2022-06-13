<?php
$username = query("SELECT * FROM user WHERE id = '$_SESSION[userId]'")[0]['nama'];
$notifikasi = query("SELECT * FROM notifikasi WHERE id_user = '$_SESSION[userId]'");
$jumlah_notifikasi = count($notifikasi);

?>
<nav
  class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow"
>
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div
          class="mr-auto float-left bookmark-wrapper d-flex align-items-center"
        >
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"
                ><i class="ficon feather icon-menu"></i
              ></a>
            </li>
          </ul>
        </div>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"
              ><i class="ficon feather icon-bell"></i
              ><span class="badge badge-pill badge-primary badge-up"><?= $jumlah_notifikasi ?></span></a
            >
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                  <h3 class="white"><?= $jumlah_notifikasi ?> New</h3>
                </div>
              </li>
              <li class="scrollable-container media-list">
                <?php foreach ($notifikasi as $data) : ?>
                <a
                  class="d-flex justify-content-between"
                  href="javascript:void(0)"
                >
                  <div class="media d-flex align-items-start">
                    <div class="media-body">
                      <h6 class="primary media-heading">Konfirmasi Jadwal Pengukuran</h6>
                      <small class="notification-text">
                        Atur Jadwal Pengukuran</small
                      >
                    </div>

                  </div> 
                </a>
                <?php endforeach; ?>
              </li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a
              class="dropdown-toggle nav-link dropdown-user-link"
              href="#"
              data-toggle="dropdown"
            >
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name text-bold-600"><?php echo $username ?></span
                ><span class="user-status">Available</span>
              </div>
              <span
                ><img
                  class="round"
                  src="../app-assets/images/portrait/small/avatar-s-11.jpg"
                  alt="avatar"
                  height="40"
                  width="40"
              /></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="../auth-logout.php"
                ><i class="feather icon-power"></i> Logout</a
              >
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
