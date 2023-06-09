{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')

<div class="col-2">
    <div class="form-container">
      <div class="form-btn">
      <span>{{ __('Login') }}</span>
          <hr id="Indicator">
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
          <input id="email" type="email" name="email" class="fontAwesome @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="&#xf1fa; correo electronico" >
          @error('email')
              <i>{{ $message }}</i>
          @enderror
          <input id="password" type="password" name="password" placeholder="&#xf084; contraseña" class="fontAwesome @error('password') is-invalid @enderror" required autocomplete="current-password">
          @error('password')
              <i>{{ $message }}</i>
          @enderror

          <button type="submit" class="btn"> {{ __('Login') }}&#8594;</button>
          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
          @endif

      </form>
    </div>
</div>

<div class="col-2">
  <h1>Empezemos Ahora!</h1>
  <p>Si aún no estas registrado <br>hazlo <a href="{{ route('register') }}" style="cursor: pointer; color: #79ab42;"><span><strong>aquí</strong></span></a> </p>
  <div class="img-box">
    <img width="100px" class="back-img" src="image/login-verde.png" style="height: 350px;">
  </div>
</div>

@endsection

