<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="http://ukk2021.test/landing_page/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelayanan Pengaduan Masyarakat</title>

    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="cdn.jsdelivr.net/npm/glider-js%401/glider.min.css">

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body x-data="initApp()" x-init="setupGlider()">

    <div id="pageloader" class="pageloader"></div>
    <div id="infraloader" class="infraloader is-active"></div>
    <div  x-on:scroll.window="scroll()" class="navbar is-transparent is-fixed-top" role="navigation" aria-label="main navigation" :class="{
            'is-scrolled': scrolled,
            '': !scrolled,
            'is-mobile': mobileOpen,
            '': !mobileOpen
        }">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img class="dark-logo light-image" src="img/logo/logo-dark.svg" alt="">
                <img class="light-logo dark-image" src="img/logo/logo-light.svg" alt="">
            </a>
    
            <div class="navbar-item is-hidden-desktop is-hidden-tablet">
                <div class="ninja-toggle">
                    <input x-on:change="toggleTheme()" id="theme-toggle" type="checkbox">
                    <label for="theme-toggle">
                        <span class="track">
                            <span class="track-inner"></span>
                            <span class="track-knob">
                                <i class="sun" data-feather="sun"></i>
                                <i class="moon" data-feather="moon"></i>
                            </span>
                        </span>
                    </label>
                </div>
            </div>
    
            <div class="navbar-burger" @click="openMobileMenu()">
                <div class="menu-toggle">
                    <div class="icon-box-toggle is-navbar" :class="{
                            'active': mobileOpen,
                            '': !mobileOpen
                        }">
                        <div class="rotate">
                            <i class="icon-line-top"></i>
                            <i class="icon-line-center"></i>
                            <i class="icon-line-bottom"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="navbar-menu" :class="{
                'is-active': mobileOpen,
                '': !mobileOpen
            }">
            <div class="navbar-end">
                <div class="navbar-item is-hidden-mobile">
                    <div class="ninja-toggle">
                        <input x-on:change="toggleTheme()" id="theme-toggle-mobile" type="checkbox">
                        <label for="theme-toggle-mobile">
                            <span class="track">
                                <span class="track-inner"></span>
                                <span class="track-knob">
                                    <i class="sun" data-feather="sun"></i>
                                    <i class="moon" data-feather="moon"></i>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <a class="navbar-item" href="/#">
                    Home
                </a>
                <a class="navbar-item" href="/#alur">
                    Alur
                </a>
                <a class="navbar-item" href="/#kontak">
                    Kontak
                </a>
                <a class="navbar-item is-hidden-mobile">
                    |
                </a>
                @guest
                <a class="navbar-item" href="/login">
                    Login
                </a>
                <div class="navbar-item">
                    <a class="button navbar-button" href="/register">
                        Daftar
                    </a>
                </div>
                @endguest
                @auth
                <a class="navbar-item" href="/masyarakat">
                    Dashboard
                </a>
                <div class="navbar-item">
                    <a class="button navbar-button" onclick="document.getElementById('logout').submit()">
                        Logout
                    </a>
                </div>
                <form action="/logout" method="POST" id="logout" class="d-none">
                    @csrf
                </form>
                @endauth
            </div>
        </div>
    </div>
    
    <div class="hero main-hero is-fullheight is-default is-bold section-1">
    
        <img class="hero-shape" src="img/shapes/hero.svg" alt="">
    
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered hero-caption">
                    <div class="column is-5">
                        <h1 class="title is-2 is-bold">
                            Layanan Pengaduan Masyarakat
                        </h1>
                        <h2 class="subtitle is-7">
                        Laporkan kepada kami jika ada penyalahgunaan wewenang, pengabaian kewajiban dan/atau pelanggaran peraturan perundang-undangan yang dilakukan oleh pegawai di lingkungan Kementerian Komunikasi dan Informatika.
                        </h2>
                    </div>
                    <div class="column is-6 is-offset-1">
                        <img class="hero-image light-image" src="img/illustrations/city.svg" alt="">
                        <img class="hero-image dark-image" src="img/illustrations/city-dark.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section feature-section is-medium has-line-after section-2">
    
        <img class="feature-shape" src="img/shapes/feature1.svg" alt="">
    
        <img class="cube cube-1 levitate light-image" src="img/illustrations/cube.svg" alt="">
        <img class="cube cube-1 levitate dark-image" src="img/illustrations/cube-dark.svg" alt="">
    
        <div class="container">
            <div class="columns is-vcentered side-feature">
                <div class="column is-5">
                    <img class="side-image light-image" src="img/illustrations/houses.svg" alt="">
                    <img class="side-image dark-image" src="img/illustrations/houses-dark.svg" alt="">
                </div>
                <div class="column is-5 is-offset-2">
                    <h3 class="title is-3 is-bold">Selamat Datang Di Layanan Pengaduan Masyarakat</h3>
                    <p>Aplikasi Pengaduan Masyarakat Itjen adalah sistem aplikasi yang di fasilitasi oleh Inspektorat Jenderal Kementerian Komunikasi dan Informatika bagi masyarakat yang ingin menyampaikan aduan mengenai penyalahgunaan wewenang, pengabaian kewajiban dan/atau pelanggaran larangan yang dilakukan oleh pegawai di lingkungan Kemkominfo. Pengaduan yang berindikasi pelanggaran akan mudah ditindaklanjuti apabila memenuhi unsur sebagai berikut:</p>
                    <div class="currencies">
                        <div class="currency currency-reveal">
                            What
                            <img src="img/illustrations/group 8.svg" alt="">
                        </div>
                        <div class="currency currency-reveal">
                            Where
                            <img src="img/illustrations/group 9.svg" alt="">
                        </div>
                        <div class="currency currency-reveal">
                            When
                            <img src="img/illustrations/group 10.svg" alt="">
                        </div>
                        <div class="currency currency-reveal">
                            How
                            <img src="img/illustrations/group 11.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section light-section has-line-before section-3">
    
        <img class="cube cube-2 levitate light-image" src="img/illustrations/cube.svg" alt="">
        <img class="cube cube-2 levitate dark-image" src="img/illustrations/cube-dark.svg" alt="">
    
        <div class="container" id="alur">
            <div class="section-title has-text-centered">
                <div class="shadow-title">Alur</div>
                <h2 class="title is-3 is-bold">Alur</h2>
                <h3 class="subtitle is-5">Alur Penggunaan Pelayanan Pengaduan Masyarakat</h3>
            </div>
    
            <div class="stacked-features">
                <div class="stacked-feature">
                    <div class="columns is-vcentered">
                        <div class="column is-6">
                            <img class="light-image" src="img/illustrations/undraw_authentication_fsn5.svg" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_authentication_fsn5 1.png" alt="">
                        </div>
                        <div class="column is-5">
                            <h3 class="title is-4 is-bold is-title-reveal">Registrasi Akun & Login</h3>
                            <p>Silahkan melakukan aduan dengan cara membuat registrasi akun di bagian atas halaman, jika sudah memiliki akun langsung saja login pada bagian atas halaman.</p>
                        </div>
                    </div>
                </div>
    
                <div class="stacked-feature">
                    <div class="columns is-vcentered">
                        <div class="column is-6 is-hidden-desktop is-hidden-tablet">
                            <img class="light-image" src="img/illustrations/undraw_server_push_vtms 1.png" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_server_push_vtms 1 (1).png" alt="">
                        </div>
                        <div class="column is-5 is-offset-1">
                            <h3 class="title is-4 is-bold is-title-reveal">Ajukan Aduan</h3>
                            <p>Kamu dapat mengajukan aduanmu ketika sudah mempunyai akun layanan pengaduan masyarakat dan melakukan verifikasi akun.</p>
                        </div>
                        <div class="column is-6 is-hidden-mobile">
                            <img class="light-image" src="img/illustrations/undraw_server_push_vtms 1.png" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_server_push_vtms 1 (1).png" alt="">
                        </div>
                    </div>
                </div>
    
                <div class="stacked-feature">
                    <div class="columns is-vcentered">
                        <div class="column is-6">
                            <img class="light-image" src="img/illustrations/undraw_arrived_f58d.svg" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_arrived_f58d 1.png" alt="">
                        </div>
                        <div class="column is-5">
                            <h3 class="title is-4 is-bold is-title-reveal">Aduan Di Proses</h3>
                            <p>Ketika aduan sudah di ajukan maka aduan sesegera mungkin akan di proses oleh admin ataupun petugas.</p>
                        </div>
                    </div>
                </div>

                <div class="stacked-feature">
                    <div class="columns is-vcentered">
                        <div class="column is-6 is-hidden-desktop is-hidden-tablet">
                            <img class="light-image" src="img/illustrations/undraw_done_a34v.svg" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_done_a34v 2.png" alt="">
                        </div>
                        <div class="column is-5 is-offset-1">
                            <h3 class="title is-4 is-bold is-title-reveal">Aduan Selesai/Di Tanggapi</h3>
                            <p>Aduan akan dianggap selesai ketika admin atau petugas sudah mendapat persetujuan dari atasan.</p>
                        </div>
                        <div class="column is-6 is-hidden-mobile">
                            <img class="light-image" src="img/illustrations/undraw_done_a34v.svg" alt="">
                            <img class="dark-image" src="img/illustrations/undraw_done_a34v 2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section section-4">
        <img class="cube cube-3 levitate light-image" src="img/illustrations/cube.svg" alt="">
        <img class="cube cube-4 levitate light-image" src="img/illustrations/cube.svg" alt="">
    
        <img class="cube cube-3 levitate dark-image" src="img/illustrations/cube-dark.svg" alt="">
        <img class="cube cube-4 levitate dark-image" src="img/illustrations/cube-dark.svg" alt="">
    </div>
    
            <div class="carousel-wrapper is-hidden">
                <div class="carousel testimonials-glider">
                    
                </div>
            </div>
    
            <div class="section-title has-text-centered" id="kontak">
                <div class="shadow-title">Kontak</div>
                <h2 class="title is-4 is-bold">Kirim Pesan</h2>
                <h3 class="subtitle is-5">Kami memiliki jawaban untuk semua pertanyaan Anda</h3>
            </div>
    
            <div class="content-wrapper has-margin-bottom">
                <div class="columns is-vcentered form-wrapper">
                    <div class="column is-4 is-offset-1">
                        <div class="side-title">
                            <h3 class="title is-3 is-bold is-spaced is-portrait-padded">Dukungan 24/7
                            </h3>
                        </div>
                        <p class="side-paragraph is-small has-margin">
                        Anda punya pertanyaan? Anda ingin mendapatkan informasi tertentu? Tidak masalah, kirim saja kami beberapa baris dan kami akan dengan senang hati menjawabnya. 
                        </p>
                    </div>
                    <div class="column is-6 is-offset-1">
                        <div class="contact-form">
                            <form>
                                <p></p>
    
                                <div class="field-wrap">
                                    <div class="field">
                                        <label>Full Name</label>
                                        <div class="control">
                                            <input type="text" class="input">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Full Name</label>
                                        <div class="control">
                                            <input type="text" class="input">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="field-wrap">
                                    <div class="field">
                                        <label>Email</label>
                                        <div class="control">
                                            <input type="text" class="input">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Phone</label>
                                        <div class="control">
                                            <input type="text" class="input">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="field">
                                    <label>Message</label>
                                    <div class="control">
                                        <textarea class="textarea" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="button-wrap">
                                    <div class="button cta-button is-primary is-raised is-fullwidth">Kirim</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
    
        <img class="map" src="img/illustrations/indo.png" alt="">
    
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <div class="footer-logo">
                        <img src="img/logo/logo-light.svg" width="112" height="28" alt="">
                        <span>Layanan Pengaduan Masyarakat</span>
                    </div>
                    <p class="footer-logo-text is-portrait-padded">
                       Laporkan kepada kami jika ada penyalahgunaan wewenang, pengabaian kewajiban dan/atau pelanggaran peraturan perundang-undangan yang dilakukan oleh pegawai di lingkungan Kementerian Komunikasi dan Informatika.
                    </p>
                </div>
                <div class="column">
                </div>
                <div class="column">
                </div>
                <div class="column">
                    <h4 class="title is-light is-5">Find Us</h4>
                    <ul class="footer-menu">
                        <li>Pekanbaru, Jalan Cempedak No. 37</li>
                        <li>(+62) 89540-1144-66</li>
                        <li>layananaduan@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="copyright-text">&copy;{{date('Y')}} | Punten.inc | All Rights Reserved.</div>
            </div>
        </div>
    </footer>
    <script src="cdn.jsdelivr.net/npm/glider-js%401/glider.min.js"></script>
    <script src="js/bundle.js"></script>
    <script src="js/change_theme.js"></script>
    
</body>
</html>