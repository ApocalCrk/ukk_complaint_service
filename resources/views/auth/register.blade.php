<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <base href="http://ukk2021.test/public_template/">
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Register - Pelayanan Pengaduan Masyarakat</title>
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
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
                <div class="single-form-wrap mt-5">

                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Daftar Akun</h2>
                            <p>Mulai pengaduan dengan membuat akun</p>
                            <a href="/login">Saya sudah punya akun </a>
                        </div>

                        <!--Form-->
                        <div class="form-card">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input type="number" class="input @error('nik') is-invalid @enderror"
                                                name="nik" value="{{ old('nik') }}" placeholder="NIK" required
                                                autocomplate="nik" autofocus>
                                            <span class="form-icon">
                                                <i data-feather="credit-card"></i>
                                            </span>
                                            @error('nik')
                                            <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="name" type="text"
                                                class="input @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" placeholder="Nama" required
                                                autocomplete="name">
                                            <span class="form-icon">
                                                <i data-feather="user"></i>
                                            </span>
                                            @error('name')
                                            <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="telp" type="number"
                                                class="input @error('telp') is-invalid @enderror" name="telp"
                                                value="{{ old('telp') }}" placeholder="No Telp" required
                                                autocomplete="telp">
                                            <span class="form-icon">
                                                <i data-feather="smartphone"></i>
                                            </span>
                                            @error('telp')
                                            <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="email" type="email"
                                                class="input @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="Email" required
                                                autocomplete="email">
                                            <span class="form-icon">
                                                <i data-feather="mail"></i>
                                            </span>
                                            @error('email')
                                            <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password" type="password"
                                                class="input @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" required autocomplete="new-password">
                                            <span class="form-icon">
                                                <i data-feather="lock"></i>
                                            </span>
                                            @error('password')
                                            <div class="danger-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input id="password-confirm" type="password" class="input"
                                                placeholder="Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="new-password">
                                            <span class="form-icon">
                                                <i data-feather="repeat"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="setting-item">
                                        <label class="form-switch is-primary">
                                            <input type="checkbox" class="is-switch" required>
                                            <i></i>
                                        </label>
                                        <div class="setting-meta">
                                            <span>Privacy Policy Agreement</span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="control login">
                                        <button type="submit"
                                            class="button h-button is-primary is-bold is-fullwidth is-raised">Daftar</button>
                                    </div>

                                </div>
                            </form>
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
