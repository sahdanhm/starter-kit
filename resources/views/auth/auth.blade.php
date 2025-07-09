<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    {{-- <title>{{ $companyProfile->name }}</title> --}}
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" {{-- href="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" /> --}} <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('template/backend') }}/dist/css/style.min.css" />
    <style>
        .logo-img {
            height: 8vh;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        {{-- <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" alt="loader" class="lds-ripple img-fluid" /> --}}
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8 d-flex flex-column">
                        <a href="/" class="text-nowrap logo-img d-inline-block ms-4 my-2 m-xl-4">
                            <img src="{{ asset('images/company/logo.png') }}" height="100%" alt="logo">

                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center h-100">
                            @stack('svg')
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9 position-relative">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('template/backend') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/custom.js"></script>
    <script src="{{ asset('template/backend') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
