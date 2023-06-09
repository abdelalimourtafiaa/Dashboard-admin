<x-guest-layout>
    <x-authentication-card>
        

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form> --}}
{{-- MYFORM --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OurCheck - Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="../../dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="../../dist/css/latform-style-1.min.css" type="text/css">

</head>
<body>
    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="logo">
                        <img src="Admin\assets\images\Yasmina-removebg-preview.png" width="300" height="300" alt="Yasmina">
                    </div>
                    <div class="my-5 text-center">
                        <h3 class="font-weight-bold mb-3">Sign In</h3>
                        <p class="text-muted">Sign in to Yasmina to continue</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" value="{{ __('Email') }}">Email</label>
                            <div class="form-icon-wrapper">
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter email" />
                                <i class="form-icon-left mdi mdi-email"></i>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" value="{{ __('Password') }}"> Password</label>
                            <div class="form-icon-wrapper">
                                <input id="password" class="form-control" type="password" name="password" placeholder="Enter email" required autocomplete="current-password" />
                                <i class="form-icon-left mdi mdi-lock"></i>
                                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            @if (Route::has('password.request'))
                           
                            @endif
                            <label for="password" value="{{ __('Password') }}"></label>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="../../dist/vendor/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <!-- Latform scripts -->
    <script src="../../dist/js/latform.min.js"></script>
</body>
</html>



    </x-authentication-card>
</x-guest-layout>