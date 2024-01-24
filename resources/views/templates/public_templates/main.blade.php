<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="http://ukk2021.test/public_template/">
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> @yield('title') </title>
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
    <!-- Concatenated plugins -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/upload_file.js"></script>
</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <div class="app-overlay"></div>

        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
            <div class="container">
                <!-- Brand -->
                <div class="navbar-brand">
                    <!-- Mobile menu toggler icon -->
                    <div class="brand-start">
                        <div class="navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a class="navbar-item is-brand" href="/masyarakat">
                        <img class="light-image" src="../logo-dark.svg" alt="">
                        <img class="dark-image" src="../logo-light.svg" alt="">
                    </a>

                    <div class="brand-end">
                        <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                            <a class="navbar-link is-arrowless" href="javascript:void(0);">
                                <i data-feather="bell"></i>
                                @if(count($notif) > 0)
                                @foreach($notif as $row)
                                    @if($row->tanggapan->read_by_user != '1')
                                    <span class="new-indicator pulsate"></span>
                                    @endif
                                @endforeach
                                @endif
                            </a>
                            <div class="navbar-dropdown is-boxed is-right">
                                <div class="heading">
                                    <div class="heading-left">
                                        <h6 class="heading-title">Notifikasi</h6>
                                    </div>
                                </div>
                                <div class="inner has-slimscroll">
                                    <ul class="notification-list">
                                    @if(count($notif) > 0)
                                        @foreach($notif as $row)
                                        <li>
                                            <a class="notification-item" href="/masyarakat/pengaduan/{{ $row->id }}">
                                                <div class="img-left">
                                                    <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Judul Aduan : {{ $row->judul_laporan }}</span> <br> 
                                                    @if($row->status == 'Proses')
                                                        Aduan sedang diproses
                                                    @elseif($row->status == 'Selesai')
                                                        Aduan sudah selesai
                                                    @else
                                                        error
                                                    @endif
                                                </p>
                                                    <p class="time">{{ $row->updated_at }}</p>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        @else
                                            <p class="has-text-centered">Tidak Ada Notifikasi.</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                            <div class="is-trigger" aria-haspopup="true">
                                <div class="profile-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                                </div>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-head">
                                        <div class="h-avatar is-large">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                                        </div>
                                        <div class="meta">
                                            <span>{{ Auth::user()->name }}</span>
                                            <span>{{ Auth::user()->level }}</span>
                                        </div>
                                    </div>
                                    <a class="dropdown-item is-media" href="/masyarakat/profil">
                                        <div class="icon">
                                            <i class="lnil lnil-user-alt"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Profil</span>
                                            <span>Lihat profil saya</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item is-media layout-switcher" href="/">
                                        <div class="icon">
                                            <i class="lnil lnil-layout"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Tampilan Depan</span>
                                            <span>Beralih ke WebApp</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item is-button">
                                        <form action="/logout" method="post" id="logout_msy">@csrf</form>
                                        <button onclick="$('#logout_msy').submit()" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                            <span class="icon is-small">
                                                    <i data-feather="log-out"></i>
                                                </span>
                                            <span>Logout</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div class="mobile-main-sidebar">
            <div class="inner">
                <ul class="icon-side-menu">
                    <li>
                        <a href="/masyarakat">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/masyarakat/buat_aduan">
                            <i data-feather="edit"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/masyarakat/pengaduan">
                            <i data-feather="inbox"></i>
                        </a>
                    </li>
                </ul>

                <ul class="bottom-icon-side-menu">
                    <li>
                        <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                            <i data-feather="search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="circular-menu" class="circular-menu">

            <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </a>

            <div class="items-wrapper">
                <div class="menu-item is-flex">
                    <label class="dark-mode">
                        <input type="checkbox" checked>
                        <span></span>
                    </label>
                </div>
                <a class="menu-item is-flex">
                    <i data-feather="bell"></i>
                </a>
                <a class="menu-item is-flex">
                    <i data-feather="grid"></i>
                </a>
            </div>

        </div>
        <div class="main-sidebar">
            <div class="sidebar-brand">
                <a href="/masyarakat">
                    <img class="light-image" src="../logo-dark.svg" alt="">
                    <img class="dark-image" src="../logo-light.svg" alt="">
                </a>
            </div>
            <div class="sidebar-inner">

                <ul class="icon-menu">
                    <!-- Activity -->
                    <li>
                        <a href="/masyarakat">
                            <i class="sidebar-svg" data-feather="home"></i>
                        </a>
                    </li> <!-- Layouts -->
                    <li>
                        <a href="/masyarakat/buat_aduan">
                            <i class="sidebar-svg" data-feather="edit"></i>
                        </a>
                    </li> <!-- Bounties -->
                    <li>
                        <a href="/masyarakat/pengaduan">
                            <i class="sidebar-svg" data-feather="inbox"></i>
                        </a>
                    </li> <!-- Bugs -->
                </ul>

                <!-- User account -->
                <ul class="bottom-menu">
                    <!-- Notifications -->
                    <li class="right-panel-trigger" data-panel="search-panel">
                        <a href="javascript:void(0);" id="open-search"><i class="sidebar-svg" data-feather="search"></i></a>
                        <a href="javascript:void(0);" id="close-search" class="is-hidden is-inactive"><i class="sidebar-svg" data-feather="x"></i></a>
                    </li> 
                    <li id="user-menu">
                        <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                            <img src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                            <span class="status-indicator"></span>
                            <style>
                                body.is-dark .dropdown-menu .dropdown-content .dropdown-head {
                                    background-color: #28282b !important;
                                }
                                body.is-dark .dropdown-menu .dropdown-content .dropdown-head .meta span {
                                    color: #aaaab3 !important;
                                }
                            </style>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-head">
                                        <div class="h-avatar is-large">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
                                        </div>
                                        <div class="meta">
                                            <span>{{ Auth::user()->name }}</span>
                                            <span>{{ Auth::user()->level }}</span>
                                        </div>
                                    </div>
                                    <a href="/masyarakat/profil" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-user-alt"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Profil</span>
                                            <span>Lihat profil saya</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item is-media layout-switcher" href="/">
                                        <div class="icon">
                                            <i class="lnil lnil-layout"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Tampilan Depan</span>
                                            <span>Beralih ke WebApp</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item is-button">
                                        <button onclick="$('#logout_msy').submit()" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                            <span class="icon is-small">
                                                    <i data-feather="log-out"></i>
                                                </span>
                                            <span>Logout</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
        <div id="activity-panel" class="right-panel-wrapper is-activity">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Lihat Sekilas</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="tabs-wrapper is-triple-slider is-squared">
                    <div class="tabs-inner">
                        <div class="tabs">
                            <ul>
                                <li data-tab="team-side-tab" class="is-active"><a><span>Baru</span></a></li>
                                <li data-tab="projects-side-tab"><a><span>Proses</span></a></li>
                                <li data-tab="schedule-side-tab"><a><span>Selesai</span></a></li>
                                <li class="tab-naver"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="right-panel-body">
                        <div id="team-side-tab" class="tab-content is-active">
                            @foreach($all_dat as $row)
                                @if($row->status == '0')
                                <div class="team-card">
                                    <div class="h-avatar">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" alt="">
                                    </div>
                                    <div class="meta">
                                        <span>Judul Aduan : {{ $row->judul_laporan }}</span>
                                        <span>
                                                <i data-feather="calendar"></i>
                                                {{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}
                                            </span>
                                    </div>
                                    <a class="link" href="/masyarakat/pengaduan/{{ $row->id }}">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <div id="projects-side-tab" class="tab-content">
                            @foreach($all_dat as $row)
                                @if($row->status == 'Proses')
                                <div class="team-card">
                                    <div class="h-avatar">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" alt="">
                                    </div>
                                    <div class="meta">
                                        <span>Judul Aduan : {{ $row->judul_laporan }}</span>
                                        <span>
                                                <i data-feather="calendar"></i>
                                                {{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}
                                            </span>
                                    </div>
                                    <a class="link" href="/masyarakat/pengaduan/{{ $row->id }}">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <div id="schedule-side-tab" class="tab-content">
                            @foreach($all_dat as $row)
                                @if($row->status == 'Selesai')
                                <div class="team-card">
                                    <div class="h-avatar">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" alt="">
                                    </div>
                                    <div class="meta">
                                        <span>Judul Aduan : {{ $row->judul_laporan }}</span>
                                        <span>
                                                <i data-feather="calendar"></i>
                                                {{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}
                                            </span>
                                    </div>
                                    <a class="link" href="/masyarakat/pengaduan/{{ $row->id }}">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <div id="search-panel" class="right-panel-wrapper is-search is-left">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <img class="light-image" src="../logo-dark.svg" alt="" />
                    <img class="dark-image" src="../logo-light.svg" alt="" />
                    <a class="close-panel">
                        <i data-feather="chevron-left"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="field">
                        <div class="control has-icon">
                            <input type="text" class="input is-rounded search-input" placeholder="Search...">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                            <div class="search-results has-slimscroll"></div>
                        </div>
                    </div>

                    <div class="recent">
                        <h4>BARU SAJA DILIHAT</h4>
                        <div class="recent-block">
                            <a class="media-flex-center" href="/masyarakat">
                                <div class="h-icon is-info is-rounded is-small">
                                    <i data-feather="home"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Dashboard</span>
                                    <span>Halaman Utama</span>
                                </div>
                            </a>
                            <a class="media-flex-center" href="/masyarakat/buat_aduan">
                                <div class="h-icon is-orange is-rounded is-small">
                                    <i data-feather="edit"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Buat Aduan</span>
                                    <span>Pengaduan</span>
                                </div>
                            </a>
                            <a class="media-flex-center" href="/masyarakat/pengaduan">
                                <div class="h-icon is-green is-rounded is-small">
                                    <i data-feather="inbox"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Data Pengaduan</span>
                                    <span>Pengaduan</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Wrapper -->
        <div id="app-home" class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">

                        <div class="title-wrap">
                            <h1 class="title is-4">@yield('title')</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            <div class="toolbar-notifications is-hidden-mobile">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <i data-feather="bell"></i>
                                        @if(count($notif) > 0)
                                        @foreach($notif as $row)
                                            @if($row->tanggapan->read_by_user != '1')
                                            <span class="new-indicator pulsate"></span>
                                            @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="heading">
                                                <div class="heading-left">
                                                    <h6 class="heading-title">Notifikasi</h6>
                                                </div>
                                            </div>
                                            <ul class="notification-list">
                                            @if(count($notif) > 0)
                                            @foreach($notif as $row)
                                                <li>
                                                    <a class="notification-item" href="/masyarakat/pengaduan/{{ $row->id }}">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Judul Aduan : {{ $row->judul_laporan }}</span><br>
                                                            @if($row->status == 'Proses')
                                                                Aduan Sedang diproses
                                                            @elseif($row->status == 'Selesai')
                                                                Aduan sudah selesai
                                                            @else
                                                                error
                                                            @endif
                                                            </p>
                                                            <p class="time">{{ $row->updated_at }}</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                            @else
                                                <p class="has-text-centered">Tidak Ada Notifikasi.</p>
                                            @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                                <i data-feather="grid"></i>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        @yield('content')

                    </div>

                </div>
            </div>
        </div>

        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- <script src="assets/js/components.js"></script> -->
        <script src="assets/js/popover.js"></script>
        <script src="assets/js/widgets.js"></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js"></script>

        <!-- Landing page js -->

        <!-- Dashboards js -->

        <script src="assets/js/personal-2.js"></script>

        <!-- Charts js -->

        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->
        <script src="assets/js/syntax.js"></script>
    </div>
</body>
</html>