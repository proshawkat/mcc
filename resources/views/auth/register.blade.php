@extends('layouts.frontend')

@section('content')

    <div class="container register mb-5">
        <div class="row">
            <div class="col-md-3 register-left pt-7">
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <h3 class="register-heading">Registration Form</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Name *" value="{{ old('name') }}" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="{{ old('email') }}" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="6 digit password *" value="" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password *" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth *" value="{{ old('date_of_birth') }}" />
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" id="latitude" name="latitude" placeholder="Latitude *" value="" />
                                            @error('latitude')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" id="longitude" name="longitude" placeholder="Longitude *" value="" />
                                            @error('longitude')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <h3  class="register-heading">Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btnRegister">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
                $('#latitude').val(position.coords.latitude)
                $('#longitude').val(position.coords.longitude)
            }

        });
    </script>
@endsection
