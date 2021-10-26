<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoリスト</title>
</head>
<body>
  <header>
  <h1>Todoリスト</h1>
  <button id='home'>ホーム</button>
  <button id="menyu">メニュー</button></a>
  <a href="{{ route('logOut') }}"><button>ログアウト</button></a>
  </header>

  @if($errors->has('newTask'))
  <script>
    alert("{{ $errors->first('newTask') }}");
  </script> 
  @endif

  <div id="main">
      
  </div>

  <footer>
      <p>todoリスト</p>
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