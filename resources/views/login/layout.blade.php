<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>@yield('title')</title>
</head>
<body>
  <header>
  <h1>Todoリスト</h1>
  </header>

  <div class="main">
      @yield('content')
  </div>

  <footer>
      <h1>TODO</h1>
  </footer>
</body>
</html>