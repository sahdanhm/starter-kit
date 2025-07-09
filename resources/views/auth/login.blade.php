@extends('auth.auth')
@section('content')
    @push('styles')
        <style>
            .link-text:hover {
                text-decoration: underline;
            }
        </style>
    @endpush
    @push('svg')
        <img src="{{ asset('images/svg/man-reading.svg') }}" alt="" class="img-fluid" width="500">
    @endpush
    <h2 class="mb-3 fs-7 fw-bolder">Log in</h2>
    <p class=" mb-9">Please enter your email and password to login</p>
    @if ($errors->any())
        <div class="text-danger mb-4 d-flex align-items-center">
            <i class="ti ti-circle-x fs-7"></i>
            &nbsp;
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter your email" autocomplete="email" autofocus required>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"
                    autocomplete="current-password" required>
                <span class="input-group-text" onclick="togglePassword()">
                    <i class="fa fa-eye" id="togglePassword"></i>
                </span>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" id="flexCheckChecked" name="rememberme" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remeber me
                </label>
            </div>
            <a class="text-primary fw-medium link-text" href="{{ route('password.forgot.page') }}">Forgot Password ?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Log
            In</button>
    </form>
    @push('scripts')
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
    @endpush
@endsection
