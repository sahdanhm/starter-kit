@extends('auth.auth')
@section('content')
    @push('styles')
        <style>
            .link-text:hover {
                text-decoration: underline;
            }

            .link:hover .ti-arrow-left {
                transform: translateX(-5px);
            }

            .link:active .ti-arrow-left {
                transform: translateX(-5px);
                transition-duration: 0.1s;
            }

            .link .ti-arrow-left {
                transition: all 0.3s ease-in-out;
            }
        </style>
    @endpush
    @push('svg')
        <img src="{{ asset('images/svg/question.svg') }}" alt="" class="img-fluid" width="500">
    @endpush

    <h2 class="fw-bolder fs-7 mb-3">Forgot your password?</h2>
    <p class="mb-4">
        Please enter the email address associated with your account and We will email you a link to reset your password.
    </p>
    @if (session('status'))
        <div class="text-success mb-4 d-flex align-items-center" id="success-message">
            <i class="ti ti-circle-check fs-7"></i>
            &nbsp;
            <span>{{ session('status') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="text-danger mb-4 d-flex align-items-center">
            <i class="ti ti-circle-x fs-7"></i>
            &nbsp;
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
    @if (!session('status') && !$errors->any())
        <div class="text-primary mb-4 d-flex align-items-center d-none" id="wait-message">
            <div class="spinner-border text-primary spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            &nbsp;
            &nbsp;
            <span>Wait, it may take a few minutes.</span>
        </div>
    @endif
    <form action="{{ route('password.forgot') }}" method="post" id="forgot-password-form">
        @csrf
        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter your email" autocomplete="email" autofocus required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-2 rounded-2" id="button-submit">Get link</button>
        <a class="link text-primary fw-medium" href="{{ route('login.page') }}">
            <i class="ti ti-arrow-left d-inline-block"></i>
            <span class="link-text">Back to log in</span>
            <span id="second"></span>
        </a>
    </form>
    @push('scripts')
        <script>
            const forgotPasswordForm = document.getElementById('forgot-password-form');
            forgotPasswordForm.addEventListener('submit', function(e) {
                let waitMessage = document.getElementById('wait-message');
                waitMessage.classList.remove('d-none');
            });
            // Check if the email has been sent successfully
            const isEmailSent = document.querySelector('#success-message') ? true : false;
            let target = localStorage.getItem('countdownTarget');

            if (isEmailSent || target) {
                const btnSubmit = document.getElementById('button-submit');
                btnSubmit.disabled = true;

                // Start the countdown
                if (!target) {
                    localStorage.setItem('countdownTarget', Date.now() + (60 * 1000));
                    target = localStorage.getItem('countdownTarget');
                }

                function updateCountdown() {
                    const now = Date.now();
                    const distance = target - now;
                    const time = Math.ceil(distance / 1000);
                    if (time >= 0) {
                        btnSubmit.innerHTML = 'Resend link after ' + time + 's';
                    } else {
                        btnSubmit.disabled = false;
                        btnSubmit.innerHTML = 'Get link';
                        localStorage.removeItem('countdownTarget');
                        location.reload();
                        clearInterval();
                    }
                }

                updateCountdown();
                setInterval(updateCountdown, 1000);
            }
        </script>
    @endpush
@endsection
