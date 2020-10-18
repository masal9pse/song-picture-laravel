<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <title>歌詞検索サイト</title>

 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
 <link href="{{ asset('css/userPage.css') }}" rel="stylesheet">
 <style>
 </style>
</head>

<body>
 <div id="app">
  <nav class="navbar navbar-default navbar-static-top">
   <div class="container">
    <div class="navbar-header">

     <!-- Collapsed Hamburger -->
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
      aria-expanded="false">
      <span class="sr-only">Toggle Navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>

     <!-- Branding Image -->
     <a class="navbar-brand" href="{{ url('/') }}">
      歌詞検索サイト
     </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
     <!-- Left Side Of Navbar -->
     <ul class="nav navbar-nav">
      &nbsp;
     </ul>

     <!-- Right Side Of Navbar -->
     <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @guest
      <li><a href="{{ route('login') }}">ログインする</a></li>
      <li><a href="{{ route('register') }}">登録する</a></li>
      <li><a href="https://github.com/masal9pse/song-picture-mamp">ソースコード</a></li>
      @else
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
        aria-haspopup="true" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
       </a>

       <ul class="dropdown-menu">
        <li>
         <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          ログアウトする
         </a>
        <li><a href="https://github.com/masal9pse/song-picture-mamp">ソースコード</a></li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
        </form>
      </li>
     </ul>
     </li>
     @endguest
     </ul>
    </div>
   </div>
  </nav>

  <main class="main">
   @yield('content')
  </main>
 </div>

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>