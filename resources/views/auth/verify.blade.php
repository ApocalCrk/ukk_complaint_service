<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="http://10.42.0.1:8081/public_template/">
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Konfirmasi Email </title>
    <link rel="icon" type="image/png" href="../favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

</head>

<body style="height: 100vh;">
    <div id="huro-app" class="app-wrapper">

        <div class="app-overlay"></div>

        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>

                    <div class="page-content-inner">

                        <!--Confirm Accpount-->
                        <div class="confirm-account-wrapper">
                            <div class="wrapper-inner">
                                <div class="action-box">
                                    <div class="box-content">
                                        <img class="light-image" src="assets/img/illustrations/placeholders/launch.svg" alt="" />
                                        <img class="dark-image" src="assets/img/illustrations/placeholders/launch-dark.svg" alt="" />
                                        <h3 class="dark-inverted">Tolong verifikasi email anda</h3>
                                        <p>{{ __('Sebelum melanjutkan, silahkan verifikasi email anda terlebih dahulu') }}<br>
                    {{ __('Jika tidak menerima email') }},</p>
                                        <div class="buttons">
                                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                @csrf
                                                <button type="submit" class="button h-button is-primary is-raised">{{ __('Klik disini untuk mengirim ulang') }}</button>.
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/components.js"></script>
        <script src="assets/js/popover.js"></script>
        <script src="assets/js/widgets.js"></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js"></script>

        <!-- Landing page js -->

        <!-- Dashboards js -->

        <!-- Charts js -->


        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->

        <script src="assets/js/syntax.js"></script>
    </div>
</body>


</html>
