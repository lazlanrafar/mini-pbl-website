<?php 
session_start();
require 'config/auth.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil email berdasarkan id
	$result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan email
	if( $key === hash('sha256', $row['email']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	if( $_SESSION["role"] == "user" ) {
    header("Location: user/dashboard.php");
  }else{
    header("Location: admin/dashboard.php");
  }
	exit;
}


if( isset($_POST["login"]) ) {

	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");    

	// cek email
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			$_SESSION["role"] = $row['role'];
			$_SESSION["userId"] = $row['id'];

			if( $row["role"] == "user" ) {
        header("Location: admin/dashboard.php");
      }else{
        header("Location: user/dashboard.php");
      }
			exit;
		}
	}

	$error = true;

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
            <div class="col-xl-8 col-11 d-flex justify-content-center">
              <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                  <div
                    class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0"
                  >
                    <img
                      src="app-assets/images/pages/login.png"
                      alt="branding logo"
                    />
                  </div>
                  <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                      <div class="card-header pb-1">
                        <div class="card-title">
                          <h4 class="mb-0">Login</h4>
                        </div>
                      </div>
                      <p class="px-2">
                        Welcome back, please login to your account.
                      </p>
                      <div class="card-content">
                        <div class="card-body py-5 mb-3">
                          <form action="" method="post">
                            <fieldset
                              class="form-label-group form-group position-relative has-icon-left"
                            >
                              <input
                                type="email"
                                class="form-control"
                                id="email-address"
                                placeholder="Email Address"
                                name="email"
                                required
                              />
                              <div class="form-control-position">
                                <i class="feather icon-user"></i>
                              </div>
                              <label for="email-address">Email Address</label>
                            </fieldset>

                            <fieldset
                              class="form-label-group position-relative has-icon-left"
                            >
                              <input
                                type="password"
                                class="form-control"
                                id="user-password"
                                placeholder="Password"
                                name="password"
                                required
                              />
                              <div class="form-control-position">
                                <i class="feather icon-lock"></i>
                              </div>
                              <label for="user-password">Password</label>
                            </fieldset>

                            <?php if( isset($error) ) : ?>
                                <p style="color: red; font-style: italic;">username / password salah</p>
                            <?php endif; ?>

                            <a
                              href="auth-register.php"
                              class="btn btn-outline-primary float-left btn-inline"
                              >Register</a
                            >
                            <button
                              type="submit"
                              name="login"
                              class="btn btn-primary float-right btn-inline"
                            >
                              Login
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
</html>
