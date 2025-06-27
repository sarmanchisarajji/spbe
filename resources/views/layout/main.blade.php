<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ url('') }}/assets/img/favicon-16x16.png" type="image/x-icon" />

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

    </div>

    <!--   Core JS Files   -->
    <script src="{{ url('') }}/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ url('') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ url('') }}/assets/js/core/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    {{-- <script src="{{ url('') }}/assets/js/plugin/chart.js/chart.min.js"></script> --}}

    <!-- Chart Circle -->
    <script src="{{ url('') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ url('') }}/assets/js/plugin/datatables/datatables.min.js"></script>

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

    @if (session('success'))
        <script>
            swal({
                title: "Berhasil!",
                text: "{{ session('success') }}!",
                icon: "success",
                button: {
                    className: "btn btn-success"
                }
            });
        </script>
    @endif
</body>

</html>
