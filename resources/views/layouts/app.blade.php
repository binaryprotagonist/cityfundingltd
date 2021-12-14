<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/toastr.css" />
    <script src="{{ asset('/') }}js/jquery-3.6.0.min.js" ></script>
    <title>{{__('City Funding')}}</title>
    @stack('css')
   
    <style>
      /* Absolute Center Spinner */
      .loading {
      position: fixed;
      z-index: 999;
      height: 2em;
      width: 2em;
      overflow: show;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      }

      /* Transparent Overlay */
      .loading:before {
      content: '';
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

      background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
      }

      /* :not(:required) hides these rules from IE9 and below */
      .loading:not(:required) {
      /* hide "loading..." text */
      font: 0/0 a;
      color: transparent;
      text-shadow: none;
      background-color: transparent;
      border: 0;
      }

      .loading:not(:required):after {
      content: 'Please wait we are feching data...';
      display: block;
      font-size: 10px;
      width: 1em;
      height: 1em;
      margin-top: -0.5em;
      -webkit-animation: spinner 150ms infinite linear;
      -moz-animation: spinner 150ms infinite linear;
      -ms-animation: spinner 150ms infinite linear;
      -o-animation: spinner 150ms infinite linear;
      animation: spinner 150ms infinite linear;
      border-radius: 0.5em;
      -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
      box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
      }

      /* Animation */

      @-webkit-keyframes spinner {
      0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      }
      100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
      }
      }
      @-moz-keyframes spinner {
      0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      }
      100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
      }
      }
      @-o-keyframes spinner {
      0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      }
      100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
      }
      }
      @keyframes spinner {
      0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      }
      100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
      }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light p-4">
      <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">{{__('Logo')}}</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if(Auth::guest())
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#loginModal" 
                >{{__('Login')}}</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link sign" data-bs-toggle="modal" data-bs-target="#signupModal">{{__('Create account')}}</a>
            </li>
            @endif
            @if(Auth::check())
            <li class="nav-item">
              <a
                class="nav-link home"
                aria-current="page"
                href="{{route('portfolio')}}"
                >{{__('Back to Portfolio')}}</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('setting')}}"
                ><i class="fa fa-cog"></i
              ></a>
            </li>
            <li class="nav-item">
              <div class="dropdown" id="headprofile">
                <a
                  class="d-inline-flex py-0 align-items-center"
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img class="img-profile rounded-circle" src="{{Auth::user()->profileImageUrl}}" />
                  <div class="profile-details d-lg-inline mr-2 text-right">
                    <div class="fullname">{{ Auth::user()->name ?? Auth::user()->email }}</div>
                    <div class="mail">
                      <small>{{ Auth::user()->email }}</small>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{route('profile')}}">{{__('Profile')}}</a></li>
                  <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </li>
                </ul>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
      @if(Auth::guest())
      <!-- Login Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content mlogin">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="login-homepage">
                  <span>{{__('Don\'t have account?')}}</span>
                  <a data-bs-target="#signupModal" data-bs-toggle="modal" >{{__('Create account')}}</a>
                  <div class="formcontents">
                    <h1 class="mb-2 mt-2">{{__('Login to your account')}}</h1>
                    <p class="mb-3">
                      {{__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
                      doloremque natus')}} 
                    </p>
                  </div>
                  <form id="loginForm" autocomplete="off">
                    <div class="input-group">
                      <label class="email" for="email">{{__('Email')}}</label>
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email address"
                        name="email"
                        autocomplete="off"
                      />
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="input-group">
                      <label class="password" for="password">{{__('Password')}}</label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        name="password"
                        autocomplete="off"
                      />
                      <i class="fa fa-eye"></i>
                    </div>
                    <div class="forget-password">
                        <a href="{{route('password.request')}}">{{__('Forgot password')}}</a>
                    </div>
                    <div class="btn-group">
                      <button class="btn-primary" type="submit">{{__('Login')}}</button>
                    </div>
                    
                    <div class="google-btn">
                      <p>{{__('Or Connect with')}}:</p>
                      <div class="btn-group">
                    <i class="fa fa-google"></i>
                      <a href="{{route('googleLogin')}}">{{__('Continue with Google')}}</a>
                    </div>
                    </div>
                  </form>
                </div>
              
            </div>
           
          </div>
        </div>
      </div>
      <!-- End Login Modal -->
      <!-- Signup Modal -->
      <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-homepage">
                  <span>{{__('Have an account?')}}</span>
                  <a data-bs-target="#loginModal" data-bs-toggle="modal">{{__('Sign In')}}</a>
                  <div class="formcontents">
                    <h1 class="mb-2 mt-2">{{__('Welcome to City Funding')}}</h1>
                    <p class="mb-3">
                      {{__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
                      doloremque natus')}} 
                    </p>
                  </div>
                  <form id="signupForm" autocomplete="off">
                    <div class="input-group">
                      <label class="email" for="email">{{__('Email')}}</label>
                      <input
                        type="email"
                        class="form-control"
                        placeholder="{{__('Email address')}}"
                        name="email"
                        autocomplete="off"
                      />
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="input-group">
                      <label class="password" for="password">{{__('Password')}}</label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="{{__('Password')}}"
                        name="password"
                        autocomplete="off"
                      />
                      <i class="fa fa-eye"></i>
                    </div>
                    <div class="input-group">
                      <label class="password" for="password">{{__('Confirm Password')}}</label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="{{__('Confirm Password')}}"
                        name="password_confirmation"
                        autocomplete="off"
                      />
                      <i class="fa fa-eye"></i>
                    </div>
                    <div class="forget-password">
                    </div>
                    <div class="btn-group">
                      <button class="btn-primary" type="submit">{{__('Create an account')}}</button>
                    </div>
                    
                    <div class="google-btn">
                      <p>{{__('Or Connect with:')}}</p>
                      <div class="btn-group">
                    <i class="fa fa-google"></i>
                      <a href="{{route('googleLogin')}}">{{__('Continue with Google')}}</a>
                    </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
        <!-- End Signup Modal -->

      @endif
      @section('content')
      @show
      <footer class="p-4">
      <div class="flex flex-row justify-center text-center py-6">
        <span class="SF-Pro-Display-Bold">Copyright </span>
        <a  href="#" target="_blank" class="Gilory-Bold mx-1">@ City funding. </a>
        <span  class="Gilory-Bold me-1"> Made with love by </span>
        <a  href="https://www.braininventory.com" target="_blank" class="Gilory-Bold"> Brain Inventory.</a>
      </div>
    </footer>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/toastr.min.js"></script>
    <script>

        $('#loginModal').on('shown.bs.modal', function() {
            $('#loginForm')[0].reset();
            $('#loginForm').find('p.error_msg').remove();
            $('#signupModal').modal('hide');
        });

        $('#signupModal').on('shown.bs.modal', function() {
            $('#signupForm')[0].reset();
            $('#signupForm').find('p.error_msg').remove();
            $('#loginModal').modal('hide');
        });

        function ajaxCall(URL,METHOD,PARAMS,MULPART = false){
            return new Promise(function(resolve, reject) {
                    if(MULPART){
                      $.ajax({
                              type : METHOD,
                              url  : URL,
                              data : PARAMS,
                              cache: false,
                              contentType: false,
                              processData: false,
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              beforeSend: function() {
                              },
                              complete: function() {
                              },
                              success: function(res) {
                                  resolve(res);
                              },
                              error: function(xhr, status, error) {
                                  resolve(reject);
                              }
                      });
                    }else{
                      $.ajax({
                              type : METHOD,
                              url  : URL,
                              data : PARAMS,
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              beforeSend: function() {
                              },
                              complete: function() {
                              },
                              success: function(res) {
                                  resolve(res);
                              },
                              error: function(xhr, status, error) {
                                  resolve(reject);
                              }
                      });
                    }
            });
        }

    </script>
    <script>
       /**
       * Signup
       */
       $('#signupForm').on('submit',function(e){
           e.preventDefault();
           let form  =  $(this);
           let modal =  $('#signupModal');
           let data  = form.serialize();
           ajaxCall("{{route('ajax.userRegister')}}",'POST',data)
           .then((response) => {
                form.find('p.error_msg').remove();
                if(response.status == 'success'){
                   toastr.success(response.message);
                   setTimeout(function(){ location.reload() }, 1500);
                }
                if(response.status == 'failed'){
                   toastr.error(response.message);
                }
                if(response.status == 'error'){
                     $.each(response.errors, function(key, val) {
                         form.find('[name='+key+']').after('<p class="error_msg">'+val+'</p>');
                     });
                }
           });
       });

       /**
       * Login
       */
       $('#loginForm').on('submit',function(e){
           e.preventDefault();
           let form  =  $(this);
           let modal =  $('#loginForm');
           let data  = form.serialize();
           ajaxCall("{{route('ajax.userLogin')}}",'POST',data)
           .then((response) => {
                form.find('p.error_msg').remove();
                if(response.status == 'success'){
                   toastr.success(response.message);
                   setTimeout(function(){ location.reload() }, 1500);
                }
                if(response.status == 'failed'){
                   toastr.error(response.message);
                }
                if(response.status == 'error'){
                     $.each(response.errors, function(key, val) {
                         form.find('[name='+key+']').after('<p class="error_msg">'+val+'</p>');
                     });
                }
           });
       });
    </script>
    @stack('js')
      <script>
        window.onbeforeunload = function (evt) { 
           $('body').prepend('<div class="loading">Loading&#8230;</div>');
        } 
      @if(Session::get('message'))
        @if(Session::get('status'))
           toastr.success("{{Session::get('message')}}");
        @else
           toastr.error("{{Session::get('message')}}");
        @endif
      @endif
    </script>
    
  </body>
</html>
