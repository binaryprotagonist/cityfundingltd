@extends('layouts.guestApp')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <section id="login">
      <div class="login-content">
        <div class="formcontent">
          <h1 class="mb-3">{{ __('Reset Password') }}</h1>
          <p class="mb-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
            @endif
          </p>
        </div>
       <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group">
            <label class="email" for="email">{{__('Email')}}</label>
            <input
              type="text"
              class="form-control"
              placeholder="{{__('Email address')}}"
              name="email"
              id="email"
              value="{{old('email')}}"
              autocomplete="off"
            />
            <i class="fa fa-envelope"></i>
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
                    <div class="input-group">
            <label class="password" for="password">{{__('Password')}}</label>
            <input
              type="password"
              class="form-control"
              placeholder="password"
              name="password"
              id="password"
            />
            <i class="fa fa-eye"></i>
               @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
           <div class="input-group">
            <label class="password-confirmation" for="password-confirmation">{{__('Password Confirmation')}}</label>
            <input
              type="password"
              class="form-control"
              placeholder="{{__('Password Confirmation')}}"
              name="password_confirmation"
              id="password-confirmation"
            />
            <i class="fa fa-eye"></i>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="btn-group mt-4">
            <button class="btn-primary" type="submit">{{ __('Reset Password') }}</button>
          </div>
        </form>
      </div>
      <div class="back"></div>
    </section>
@endsection