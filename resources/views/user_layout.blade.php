<!DOCTYPE html>
<html lang="ja">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ユーザーとお店を繋ぐグルメサイトです">

  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Third party plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

  <title>食なび</title>
</head>

<body class="bg-light">
  <div class="wrapper">
    <header class="sticky-top">
      <div class="bg-white border-bottom mb-5">
        <nav class="navbar navbar-expand navbar-light container">

          @if(Auth::check())
          <img src="{{ asset('images/icon_shokunavi.png') }}" alt="" height="32" width="32">
          <a class="navbar-brand mr-4" href="{{ route('shops.user_index') }}">食なび </a>
          <span class="navbar-item "><a href="{{ route('users.show', Auth::user()->id) }}"> ようこそ, {{ Auth::user()->name }}さん</a></span>
          ｜
          <a href="#" id="logout" class="navbar-item">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @else
          <img src="{{ asset('images/icon_shokunavi.png') }}" alt="" height="32" width="32">
          <a class="navbar-brand mr-4" href="{{ route('shops.user_index') }}">食なび</a>
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item mr-2"><a href="{{ route('login') }}">ログイン</a></li>
            <li class="nav-item mr-2"><a href="{{ route('register') }}">会員登録</a></li>
            <li class="nav-item mr-2"><a href="{{ route('about') }}">about</a></li>
            <li class="nav-item mr-2"><a href="{{ route('test') }}">test</a></li>
          </ul>
          @endif
        </nav>
      </div>
    </header>
    <main class="mb-4">
      @yield('content')
    </main>

    <footer class="text-center bg-white">
      &copy; 2020 SHOKUNAVI
    </footer>
  </div>


  @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>