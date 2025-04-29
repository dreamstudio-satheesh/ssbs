<!-- resources/views/components/auth-login.blade.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Login - Starlit App</title>

    <meta name="description" content="Admin Panel">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" href="{{ url('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" href="{{ url('assets/css/dashmix.min.css') }}">
  </head>

  <body>
    <div id="page-container">
      <main id="main-container">
        <div class="row g-0 justify-content-center bg-body-dark">
          <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('{{ url('assets/media/photos/photo20@2x.jpg') }}');">
              <div class="row g-0">
                <div class="col-md-6 order-md-1 bg-body-extra-light">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <div class="mb-2 text-center">
                      <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
                        <span class="text-dark">Starlit</span><span class="text-primary">Steel</span>
                      </a>
                      <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                      @csrf
                      <div class="mb-4">
                        <input type="text" class="form-control form-control-alt" name="username" placeholder="Username" required autofocus>
                      </div>
                      <div class="mb-4">
                        <input type="password" class="form-control form-control-alt" name="password" placeholder="Password" required>
                      </div>
                      <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-hero btn-primary">
                          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                        </button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <div class="d-flex">
                      <a class="flex-shrink-0 img-link me-3" href="#">
                        <img class="img-avatar img-avatar-thumb" src="{{ url('assets/media/avatars/avatar13.jpg') }}" alt="">
                      </a>
                      <div class="flex-grow-1">
                        <p class="text-white fw-semibold mb-1">
                          Amazing framework with tons of options! It helped us build our project!
                        </p>
                        <a class="text-white-75 fw-semibold" href="#">Jose Wagner, Web Developer</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script src="{{ url('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ url('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/op_auth_signin.min.js') }}"></script>
  </body>
</html>
