@extends('layouts.guestApp')

@section('content')
  <section id="login">
  <div class="login-content">
    <span>Don't have account?</span>
    <a href="{{route('register')}}">Create account</a>
    <div class="formcontent">
      <h1 class="mb-3">Login to your account</h1>
      <p class="mb-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
        doloremque natus tempore ex officiis culpa
      </p>
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-group">
        <label class="email" for="email">Email</label>
        <input
          type="email"
          class="form-control"
          placeholder="abc@braininventory.com"
          name="email"
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
        <label class="password" for="password">Password</label>
        <input
          type="password"
          class="form-control"
          placeholder="password"
          name="password"
        />
        <i class="fa fa-eye"></i>
        @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="select">
        <a href="#">Need Help?</a>
        <a href="#" id="caret"> &#94;</a>
        <ul class="link">
          <li><a href="{{ route('password.request') }}">Forgot password</a></li>
        </ul>
      </div>
      <div class="btn-group">
        <button class="btn-primary" type="submit">Login</button>
      </div>
    </form>
  </div>
  <div class="back"></div>
</section>
@endsection
