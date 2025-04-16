@php
    App::setLocale(getUserLanguage());
    $gs = generalSetting();
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('auth.login') - {{ $gs->system_name }}</title>
    <link rel="icon" href="{{ asset($gs->favicon) }}" type="image/png" />
    <meta name="_token" content="{!! csrf_token() !!}" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #e0e6ed;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
        }

        .login-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);
        }

        .left-side {
            background: #fff;
            padding: 2rem;
            text-align: center;
        }


        .left-side img {
            width: 133px;
            max-width: 320px;
        }

        .login-logo {
            height: 50px;
            width: 20px;
            margin-bottom: 1rem;
        }

        .right-side {
            padding: 2.5rem;
        }

        .form-control {
            font-size: 0.95rem;
        }

        .social-btn {
            margin: 0 5px;
            font-size: 1rem;
        }

        .footer {
            background-color: #002366;
            color: white;
            padding: 1rem;
            font-size: 0.85rem;
        }

        .footer a {
            color: white;
            margin-left: 10px;
        }

        .login-btn {
            width: 100%;
        }

        @media (max-width: 768px) {
            .left-side {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container login-wrapper d-flex align-items-center justify-content-center">
        <div class="row login-card mx-2" style="width: 500px;">


            <div class="col-md-12 right-side">

                <div class="col-md-12 left-side d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset($gs->logo) }}" alt="Logo" class="login-logo">
                    {{-- <img src="{{ asset('your-illustration.png') }}" alt="Illustration"> --}}
                </div>

                <h4 class="mb-4 text-center">@lang('auth.login')</h4>

                <div class="d-flex justify-content-center mb-3">
                    <a href="#" class="btn btn-outline-secondary social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-secondary social-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-secondary social-btn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">@lang('Email Adress')</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="Enter email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">@lang('auth.password')</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label">@lang('auth.remember_me')</label>
                        </div>
                        <a href="{{ route('recoveryPassord') }}" class="text-decoration-none">@lang('auth.forget_password')?</a>
                    </div>

                    <button type="submit" class="btn btn-primary login-btn">@lang('auth.login')</button>

                    <div class="text-center mt-3">
                        {{-- @lang("don't_have_account") <a href="{{ route('register') }}" class="text-danger">@lang('Register')</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('toast_message'))
            toastr.{{ Session::get('toast_message')['type'] }}('{{ Session::get('toast_message')['message'] }}');
        @endif
    </script>
</body>

</html>
