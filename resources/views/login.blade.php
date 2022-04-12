
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Study Case</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
</head>

<body data-layout-color="light" data-layout="detached" data-rightbar-onstart="true">
<div class="auth-fluid">
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <div class="auth-brand text-center text-lg-start">
                    <a href="javascript:void(0);" class="logo-dark">
                        <span><img src="/assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                    <a href="javascript:void(0);" class="logo-light">
                        <span><img src="/assets/images/logo.png" alt="" height="18"></span>
                    </a>
                </div>

                <h4 class="mt-0">Sign In</h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="E-mail"
                               name="email" required/>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                        <label for="password">Password</label>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="rememberMe" value="1" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">I love the color!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much!
                . <i class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Hyper Admin User
            </p>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
