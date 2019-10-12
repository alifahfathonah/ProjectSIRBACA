<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/default.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style="background:url('{{asset('/img/bg.jpg')}}') center center fixed; background-size:cover; z-index: -1;">
    <div class="full-boxed">
     
      <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <a class="navbar-brand" href="#">Ruang Baca INF</a>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/')}}">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/notiv')}}">Daftar</a>
          </li>
        
        </ul>

      </nav>
      <div class="sidebar">

          @yield('contain')
      </div>
      <footer>
        <nav class="navbar navbar-expand-sm  bg-primary navbar-dark fixed-bottom">
          <a class="navbar-brand" href="#">Copyright &copy; Herisvan Hendra 2019 - {{date('Y')}}</a>
        </nav>
      </footer>
    </div>
    <script type="text/javascript" src="{{ asset('/js/app.js')}}"></script>
  </body>
</html>
