<?php 
require 'config/auth.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'auth-login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <?php require 'auth-head.php' ?>

  <!-- BEGIN: Body-->

  <body
    class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static bg-full-screen-image blank-page blank-page"
    data-open="click"
    data-menu="vertical-menu-modern"
    data-col="1-column"
  >
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
          <section class="row flexbox-container">
            <div class="col-xl-8 col-10 d-flex justify-content-center">
              <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                  <div
                    class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0"
                  >
                    <img
                      src="app-assets/images/pages/register.jpg"
                      alt="branding logo"
                    />
                  </div>
                  <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 p-2">
                      <div class="card-header pt-50 pb-1">
                        <div class="card-title">
                          <h4 class="mb-0">Create Account</h4>
                        </div>
                      </div>
                      <p class="px-2">
                        Fill the below form to create a new account.
                      </p>
                      <div class="card-content">
                        <div class="card-body pt-0">
                          <form action="" method="post">
                            <div class="form-label-group">
                              <input
                                type="number"
                                id="no-ktp"
                                class="form-control"
                                placeholder="Nomor KTP"
                                name="no_ktp"
                                required
                              />
                              <label for="no-ktp">Nomor KTP</label>
                            </div>
                            <div class="form-label-group">
                              <input
                                type="password"
                                id="password"
                                class="form-control"
                                placeholder="Password"
                                name="password"
                                required
                              />
                              <label for="password">Password</label>
                            </div>
                            <div class="form-label-group">
                              <input
                                type="text"
                                id="inputName"
                                class="form-control"
                                placeholder="Nama Lengkap"
                                name="nama"
                                required
                              />
                              <label for="inputName">Nama Lengkap</label>
                            </div>
                            <div class="row">
                              <div class="col-7">
                                <div class="form-label-group">
                                  <input
                                    type="text"
                                    id="tempat-lahir"
                                    class="form-control"
                                    placeholder="Tempat Lahir"
                                    name="tempat_lahir"
                                    required
                                  />
                                  <label for="tempat-lahir">Tempat Lahir</label>
                                </div>
                              </div>
                              <div class="col-5">
                                <div class="form-label-group">
                                  <input
                                    type="date"
                                    id="tanggal-lahir"
                                    class="form-control"
                                    placeholder="Tanggal Lahir"
                                    name="tanggal_lahir"
                                    required
                                  />
                                  <label for="tanggal-lahir"
                                    >Tanggal Lahir</label
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="form-label-group">
                              <input
                                type="email"
                                id="email"
                                class="form-control"
                                name="email"
                                placeholder="Email Address"
                                required
                              />
                              <label for="email">Email Address</label>
                            </div>
                            <div class="form-label-group">
                              <input
                                type="text"
                                id="telepon"
                                class="form-control"
                                name="telepon"
                                placeholder="Telepon"
                                required
                              />
                              <label for="telepon">Telepon</label>
                            </div>
                            <div class="form-label-group">
                              <textarea
                                name="alamat"
                                id="alamat"
                                class="form-control"
                                cols="5"
                                rows="3"
                              ></textarea>
                              <label for="alamat">Alamat Lengkap</label>
                            </div>
                            <a
                              href="auth-login.php"
                              class="btn btn-outline-primary float-left btn-inline mb-50"
                              >Login</a
                            >
                            <button
                              type="submit"
                              name="register"
                              class="btn btn-primary float-right btn-inline mb-50"
                            >
                              Register
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php require 'auth-scripts.php' ?>
  </body>
  <!-- END: Body-->
</html>
