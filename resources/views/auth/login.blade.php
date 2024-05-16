@extends('layouts.app')

@section('content')

 <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                     @if(Session::has('error'))
                                        <div class="alert alert-danger text-center alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                            <strong> {{ Session::get('error') }} </strong>
                                        </div>

                                    @endif

                                    <form  class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                                 <input placeholder="Email Address OR Username" type="text" class="form-control-user form-control @error('emailORusername') is-invalid @enderror" name="emailORusername" value="{{ old('emailORusername') }}" required autocomplete="emailORusername" autofocus>

                                                @error('emailORusername')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" placeholder="Password" type="password" class="form-control-user form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">

                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember">
                                                <label class="custom-control-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
