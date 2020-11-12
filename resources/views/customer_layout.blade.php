<!doctype html>
<html lang="ja">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('scss/app.scss') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>食なびfor飲食店</title>
</head>

<body class="bg-light">
  <div class="wrapper">
    <header>
      <div class="bg-white border-bottom mb-5">
        <nav class="navbar navbar-expand navbar-light container">

          @if(Auth::guard('customer')->check())
          <img src="{{ asset('images/icon_shokunavi.png') }}" alt="" height="32" width="32">
          <a class="navbar-brand mr-4" href="{{ route('shops.index') }}">食なび<span>for</span>飲食店</a>
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="navbar-item mr-2"><a href="{{ route('customers.show',['customer' => Auth::guard('customer')->user()->id]) }}">ようこそ, {{ Auth::guard('customer')->user()->name }}さん</a></li>
            <li class="navbar-item mr-2"><a href="#" id="logout" class="navbar-item">ログアウト</a></li>
          </ul>
          <form id="logout-form" action="{{ route('customers.auth.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @else
          <img src="{{ asset('images/icon_shokunavi.png') }}" alt="" height="32" width="32">
          <a class="navbar-brand mr-4" href="{{ route('customers.auth.login') }}">食なび<span>for</span>飲食店</a>
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li><a class="navbar-item mr-2" href="{{ route('customers.auth.login') }}">ログイン</a></li>
            <li><a class="navbar-item mr-2" href="{{ route('customers.auth.register') }}">会員登録</a></li>
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

</body>

</html>