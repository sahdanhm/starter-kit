@extends('auth.auth')
@section('content')
    @push('svg')
        <img src="{{ asset('images/svg/woman-reading.svg') }}" alt="" class="img-fluid" width="500">
    @endpush
    <h2 class="mb-3 fs-7 fw-bolder">Update Password</h2>
    <p class=" mb-9">Please enter your email and new password</p>
    @if ($errors->any())
        <div class="text-danger mb-4 d-flex align-items-center">
            <i class="ti ti-circle-x fs-7"></i>
            &nbsp;
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter your email" value="{{ Request::get('email') }}" readonly>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"
                    autocomplete="current-password" autofocus required>
                <span class="input-group-text"
                    onclick="togglePassword(this.previousElementSibling.id, this.firstElementChild.id)">
                    <i class="fa fa-eye" id="togglePassword"></i>
                </span>
            </div>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
            <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                    placeholder="Confirm your password" autocomplete="current-password" required>
                <span class="input-group-text"
                    onclick="togglePassword(this.previousElementSibling.id, this.firstElementChild.id)">
                    <i class="fa fa-eye" id="togglePasswordConfirmation"></i>
                </span>
            </div>
        </div>
        <div class="mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" id="flexCheckChecked" name="autologin" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Log in after update password
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Update Password</button>
    </form>
    @push('scripts')
        <script>
            function togglePassword(id, toggleId) {
                var x = document.getElementById(id);
                var y = document.getElementById(toggleId);
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
