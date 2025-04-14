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
    <link rel="shortcut icon" type="image/png"
        {{-- href="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" /> --}}
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('template/backend') }}/dist/css/style.min.css" />
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
                    <div class="col-xl-7 col-xxl-8">
                        <a href="/" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            {{-- <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" width="6%"
                                alt="logo mark">
                            <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_type) }}" width="15%"
                                alt="logo type"> --}}
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="{{ asset('template/backend') }}/dist/images/backgrounds/login-security.svg"
                                alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9 position-relative">
                                {{-- <x-alert></x-alert> --}}
                                <h2 class="mb-3 fs-7 fw-bolder">Log in</h2>
                                <p class=" mb-9">Please enter your email and password to login</p>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter your email" autocomplete="email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter your password" autocomplete="current-password">
                                            <span class="input-group-text" onclick="togglePassword()">
                                                <i class="fa fa-eye" id="togglePassword"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Log
                                        In</button>
                                </form>
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


    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("togglePassword");
            if (x.type === "password") {
                x.type = "text";
                y.classList.remove("fa-eye");
                y.classList.add("fa-eye-slash");
            } else {
                x.type = "password";
                y.classList.remove("fa-eye-slash");
                y.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
