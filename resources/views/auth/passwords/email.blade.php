@extends('layouts.guestApp')
@section('content')
    <section id="login">
      <div class="login-content">
        <div class="formcontent">
          <h1 class="mb-3">{{__('Forgot Password')}}</h1>
          <p class="mb-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
            @endif
          </p>
        </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
          <div class="input-group">
            <label class="email" for="email">{{__('Email')}}</label>
            <input
              type="text"
              class="form-control"
              placeholder="{{__('Email address')}}"
              name="email"
              id="email"
              autocomplete="off"
            />
            <i class="fa fa-envelope"></i>
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="btn-group mt-4">
            <button class="btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
          </div>
        </form>
      </div>
      <div class="back"></div>
    </section>
@endsection