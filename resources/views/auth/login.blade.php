<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="http://10.42.0.1:8081/public_template/">
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Login - Pelayanan Pengaduan Masyarakat</title>
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">

            <div class="auth-wrapper-inner is-single">

                <!--Fake navigation-->
                <div class="auth-nav">
                    <div class="left"></div>
                    <div class="center">
                        <a href="/" class="header-item">
                            <img class="light-image" src="../logo-dark.svg" alt="">
                            <img class="dark-image" src="../logo-light.svg" alt="">
                        </a>
                    </div>
                    <div class="right">
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                </div>

                <!--Single Centered Form-->
                <div class="single-form-wrap">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Selamat Datang</h2>
                            <p>Silahkan masuk ke akun anda</p>
                            <a href="/register">Saya tidak punya akun </a>
                        </div>

                        <!--Form-->
                        <div class="form-card">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                            <span class="form-icon">
                                                    <i data-feather="mail"></i>
                                                </span>
                                        </div>
                                        @error('email')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            <span class="form-icon">
                                                    <i data-feather="lock"></i>
                                                </span>
                                        </div>
                                        @error('password')
                                            <div class="danger-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="setting-item">
                                        <label class="form-switch is-primary">
                                            <input type="checkbox" class="is-switch" name="remember" {{ old('remember') ? 'checked' : '' }} id="busy-mode-toggle">
                                            <i></i>
                                        </label>
                                        <div class="setting-meta">
                                            <span>Remember Me</span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="control login">
                                        <button class="button h-button is-primary is-bold is-fullwidth is-raised">Login</button>
                                    </div>


                                </div>
                            </form>
                        </div>

                        <div class="forgot-link has-text-centered">
                            <a>Lupa Password?</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/auth.js"></script>
    </div>
</body>


</html>