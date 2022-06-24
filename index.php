<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tanahku - Aplikasi Pembuatan Sertifikat Tanah</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="./logo.png" />
  </head>
  <body>
    <section class="abovefold overflow-hidden">
      <style scoped>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap");

        * {
          font-family: "Inter", sans-serif !important;
        }

        body ::-webkit-input-placeholder {
          color: #989db1 !important;
        }

        body :-ms-input-placeholder {
          color: #989db1 !important;
        }

        body ::-ms-input-placeholder {
          color: #989db1 !important;
        }

        body ::placeholder {
          color: #989db1 !important;
        }

        body .font-red-hat-display {
          font-family: "Red Hat Display", sans-serif !important;
        }

        body .cl-light-blue {
          color: #34b3ff;
        }

        body nav .navbar-brand {
          font-family: "Red Hat Display", sans-serif !important;
          font-size: 26px;
          font-weight: 700 !important;
        }

        @media screen and (min-width: 768px) {
          body nav .navigation {
            margin-left: 80px;
          }
        }

        body nav .navigation li {
          margin-right: 32px;
        }

        body nav .navigation a {
          font-size: 16px;
          font-weight: 400 !important;
          color: #16171c !important;
        }

        body nav .authentication li {
          margin-right: 38px;
        }

        body nav .authentication a {
          font-size: 16px;
          font-weight: 700 !important;
        }

        @media screen and (min-width: 768px) {
          body nav .authentication .cl-white {
            color: #ffffff !important;
          }
        }

        @media screen and (max-width: 768px) {
          body nav .authentication .login {
            width: 100%;
          }
        }

        @media screen and (max-width: 768px) {
          body nav .authentication .login a {
            background: #518cff;
            border-radius: 8px;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #ffffff !important;
            padding: 14px 14px 14px 14px !important;
          }
        }

        body nav .authentication .signup {
          background: #ffffff;
          border-radius: 8px;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          color: #518cff !important;
          padding: 14px 14px 14px 14px !important;
        }

        body .abovefold {
          background: -webkit-gradient(
            linear,
            left top,
            left bottom,
            from(#f9fafe),
            to(#ffffff)
          );
          background: linear-gradient(180deg, #f9fafe 0%, #ffffff 100%);
        }

        body .abovefold .header {
          margin-top: 85px;
          margin-bottom: 115px;
        }

        body .abovefold .img-header {
          position: absolute;
          top: 0;
          right: -230px;
        }

        body .abovefold .headline {
          font-family: "Red Hat Display", sans-serif !important;
          font-weight: 700 !important;
          line-height: 91px;
          color: #16171c;
          font-size: 72px;
        }

        @media screen and (max-width: 768px) {
          body .abovefold .headline {
            font-size: 54px;
            line-height: 80px !important;
          }
        }

        body .abovefold .sub-headline {
          font-family: "Red Hat Display", sans-serif !important;
          font-weight: 400 !important;
          font-size: 26px;
          line-height: 38px;
          color: #494c57;
          margin-top: 30px;
          width: 75%;
        }

        @media screen and (min-width: 768px) {
          body .abovefold .sub-headline {
            width: 373px;
          }
        }

        body .abovefold .four-point {
          margin-top: 80px;
        }

        body .abovefold .card {
          background: #ffffff;
          -webkit-box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
          box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
          border-radius: 12px;
          padding: 52px 52px 40px;
          border: none;
        }

        @media screen and (min-width: 768px) {
          body .abovefold .card {
            width: 464px;
          }
        }

        body .abovefold .card .form-control {
          background: #f8f8fc;
          border-radius: 8px;
          border: none;
          padding: 16px 20px;
          height: 56px;
          font-weight: 600 !important;
        }

        body .abovefold .card .input-title {
          color: #494c57;
          font-size: 16px;
          margin-bottom: 12px;
        }

        body .abovefold .card .btn-card {
          margin-top: 36px;
          background: #00b67a;
          border-radius: 8px;
          height: 56px;
          padding: 10px;
          color: #ffffff;
          font-size: 16px;
          font-weight: 700 !important;
        }

        body .abovefold .card .award {
          font-size: 12px;
          line-height: 18px;
          color: #8d8f98;
        }
      </style>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light pt-md-5">
        <div class="container px-0">
          <a class="navbar-brand me-0" href="#"> Tanahku </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse ms-auto"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav me-auto navigation">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Resources</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Career</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto authentication">
              <li class="nav-item my-auto text-center login">
                <a
                  class="nav-link mb-3 mb-md-0"
                  aria-current="page"
                  href="./auth-login.php"
                  >Sign In</a
                >
              </li>
              <li class="nav-item me-0 text-center">
                <a class="nav-link signup" href="./auth-register.php">
                  Sign up
                  <span class="ms-2"
                    ><img
                      src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/arrow-right.svg"
                      alt="arrow"
                      class="img-fluid"
                  /></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container header">
        <div class="row">
          <div class="col-lg-6 px-md-0 my-auto position-relative">
            <div class="headline">
              Pembuatan Sertifikat <span class="cl-light-blue">Online</span>
            </div>
            <div class="sub-headline">
              Cepat, Mudah dan hanya dengan satu klik
            </div>
            <div class="row four-point">
              <div class="col-md-6">
                <img
                  src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                  alt="vector"
                  class="me-3"
                />
                Terpercaya
              </div>
              <div class="col-md-6">
                <img
                  src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                  alt="vector"
                  class="me-3"
                />
                Mudah Digunakan
              </div>
              <div class="col-md-6">
                <img
                  src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                  alt="vector"
                  class="me-3"
                />
                Aman
              </div>
        
            </div>
          </div>
          <div class="col-lg-6 mt-5 mt-md-0"></div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
