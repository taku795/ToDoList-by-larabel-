<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<body>
  <header>
  <h1>Todoリスト</h1>
  <a href=""></a>
  <button>メニュー</button>
  <a href="{{ route('logOut') }}"><button>ログアウト</button></a>
  </header>

  <div class="main">
      @yield('content')
  </div>

  <footer>
      <p>todoリスト</p>
  </footer>
</body>
</html>