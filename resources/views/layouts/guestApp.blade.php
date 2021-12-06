<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>{{__('Login')}}</title>
    @stack('css')
  </head>
  <body>
      @section('content')@show
    <script src="{{asset('/')}}js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}js/js.js"></script>
     @stack('js')
  </body>
</html>
