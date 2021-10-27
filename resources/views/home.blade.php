<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/public/css/home.css">
  <title>ToDoリスト</title>
</head>
<body>
  <header>
    <h1>Todoリスト</h1>
    <nav>
      <ul>
        <li id='home'>ホーム</li>
        <li id="menyu">メニュー</li>
        <li><a href="{{ route('logOut') }}">ログアウト</a></li>
      </ul>
    </nav>
  </header>

  @if($errors->has('newTask'))
  <script>
    alert("{{ $errors->first('newTask') }}");
  </script> 
  @endif

  <div id="main">
      
  </div>

  <footer>
      <h1>TODO</h1>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function() {
        //通常読み込み時
        $('#main').load("{{ route('main') }}");

        //メイン画面をロード
        $('#home').click(function() {
          $('#main').load("{{ route('main') }}");
        })
        //メニューをロード
        $('#menyu').click(function() {
          $('#main').load("{{ route('menyu') }}");
        })
    })
  </script>
</body>
</html>