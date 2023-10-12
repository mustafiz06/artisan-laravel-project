<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/css/style.css">
</head>

<body>

    <div class="main" style="padding-top: 90px;">

        <!-- Sign up form -->

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('dashboard_assets') }}/assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../index.php" class="signup-image-link">Back To Home</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">ADMIN LOGIN</h2>
                        <form class="register-form" id="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="alert alert-danger">
                                <h4 id="e_msg"></h4>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-button">
                                <!-- <input type="submit" name="login_admin"  value="Log in" /> -->
                                <button type="submit" id="signin" class="form-submit" style="border: none;">
                                    {{ __('Login') }}
                                </button>
                                <br>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>