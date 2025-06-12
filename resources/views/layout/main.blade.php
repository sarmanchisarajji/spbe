<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ url('') }}/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <script src="{{ url('') }}/assets/js/core/jquery-3.7.1.min.js"></script>

    <!-- Fonts and icons -->
    <script src="{{ url('') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ url('') }}/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('') }}/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="{{ url('') }}/assets/css/kaiadmin.min.css" />
</head>

<body>
    <div class="wrapper">

        @include('components.sidebar')

        <div class="main-panel">

            @include('components.header')

            <div class="container">

                @yield('main-contents')

            </div>

            @include('components.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>

    <!--   Core JS Files   -->
    <script src="{{ url('') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ url('') }}/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    {{-- <script src="{{ url('') }}/assets/js/plugin/chart.js/chart.min.js"></script> --}}

    <!-- jQuery Sparkline -->
    <script src="{{ url('') }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ url('') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ url('') }}/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ url('') }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ url('') }}/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    {{-- <script src="assets/js/plugin/jsvectormap/world.js"></script> --}}

    <!-- Sweet Alert -->
    <script src="{{ url('') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ url('') }}/assets/js/kaiadmin.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#dataTable1").DataTable({
                "pageLength": 25
            });
            $('#dataTable1 thead th').css('text-transform', 'none');

            $("#dataTable").DataTable({});
            $('#dataTable thead th').css('text-transform', 'none');
        });
    </script>
</body>

</html>
