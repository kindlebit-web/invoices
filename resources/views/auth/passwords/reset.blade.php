@extends('layouts.auth-app')
@section('content')
<div class="page-single">
    <div class="container">
      <div class="row">
        <div class="col col-login mx-auto">
          <div class="text-center mb-6">
            <img src="{{asset('images/logo.svg')}}" class="h-6" alt="">
          </div>
           @if (session('status'))
                <div class="col-sm-12 alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          <form class="card" method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="card-body p-6">
              <div class="card-title">{{ __('Reset Password') }}</div>
              <div class="form-group">
                <label class="form-label">{{ __('E-Mail Address') }}</label>
                <input type="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label class="form-label">{{ __('Password') }}</label>
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div> 
              <div class="form-group">
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
           
              <div class="form-footer">
                 <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
