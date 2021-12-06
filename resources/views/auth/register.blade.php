@extends('layouts.guestApp')

@section('content')
    <section id="login">
      <div class="login-content">
        <span>Have an account?</span>
        <a href="{{route('login')}}">Sign In</a>
        <div class="formcontent">
          <h1 class="mb-3">Welcome to City Funding</h1>
          <p class="mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
            doloremque natus tempore ex officiis culpa
          </p>
        </div>
         <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="input-group">
            <label class="name" for="name">{{__('Full Name')}}</label>
            <input
              type="text"
              class="form-control"
              placeholder="{{__('Full name')}}"
              name="name"
              id="name"
              autocomplete="off"
            />
            <i class="fa fa-envelope"></i>
            @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
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
            <button class="btn-primary" type="submit">{{__('Create an account')}}</button>
          </div>
        </form>
      </div>
      <div class="back"></div>
    </section>
@endsection
