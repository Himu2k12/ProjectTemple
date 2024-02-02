@extends('layouts.app')

@section('content')
    <section class=" shop-bnr bnr-pagination pt-35 pt-sm-20 pb-45 pb-sm-20 bg-light-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h2 class="f-700">Login</h2>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <ul class="pagination-inner">
                        <li><a href="{{url('/')}}" class="text-custom-pink">Home </a>
                        </li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Inner end -->
    <!-- login start -->
    <section class="login-form login pt-80 pb-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                    <div class="login-image bg-cover h-100" style="background-image: url('assets/images/logo/login.jpg');">

                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 ">
                    <div class="form-area bg-yellow">
                        <h2 class="f-700 mb-15 text-custom-white text-md-center">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            {{csrf_field()}}
                            <div class="form-group relative mb-25 mb-sm-20">
                                <i class="far fa-user transform-v-center"></i>     <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group relative mb-20 mb-sm-20">
                                <i class="fas fa-lock transform-v-center"></i>  <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group form-check pl-0">
                                <div class="d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-black btn-block shadow-4 mt-20">LOGIN</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color: white" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <div class="signup-login text-center">
                                <p class="mt-15 fs-13">
                                    New here?<a href="#" class="ml-5 mb-0 d-inline-block f-500 text-white">Sign up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- logi end -->
@endsection
