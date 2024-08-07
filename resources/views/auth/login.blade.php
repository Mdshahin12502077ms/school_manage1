{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                  <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Admin</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                    <form action="{{url('Login/AuthCheck')}}" method="POST">
                        @csrf

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="text" name="registration_id" id="typeEmailX" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX">Institute Registration Number</label>
                            @if($errors->has('registration_id'))
                            <div class="error" style="color:red">{{ $errors->first('registration_id') }}</div>
                         @endif
                          </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX">Email</label>
                            @if($errors->has('email'))
                            <div class="error" style="color:red">{{ $errors->first('email') }}</div>
                         @endif
                          </div>

                          <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Password</label>
                            @if($errors->has('password'))
                            <div class="error" style="color:red">{{ $errors->first('password') }}</div>
                         @endif
                          </div>

                          <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                          <button type="submit" data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                          <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                          </div>
                    </form>


                  </div>

                  <div>
                    <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
