@extends('layout')
@section('title','ToDoリスト')
@section('content')
  <section>
    <h1>リスト追加</h1>
    <p>やることを追加してください</p>
    <form method="POST" action="{{ route('addTask') }}">
      @csrf
      <input type="content" name="newTask">
      <button type="submit">追加する</button>
      @if($errors->has('newTask'))
      <div>
      {{ $errors->first('newTask') }}
      </div>
      @endif
    </form>
  </section>
  
  <section>
    <h1>リスト一覧</h1>
    <table>
      @foreach($tasks as $task)
      <tr>
        <td>{{ $task['task'] }}</td>
        <td>
          <form action="http://localhost/todo/{{$task['id']}}/edit">
            <button>編集</button>
          </form>
        </td>
        <td>
          <form onSubmit='return Check()' method='POST' action="http://localhost/todo/{{ $task['id'] }}/delete">
          @csrf
            <button>消去</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>  
  </section>

  <script>
    function Check() {
      if (confirm("消去しますか？")) {
        return true;
      } else {
        return false;
      }
    }
  </script>
  <!-- 登録完了時の処理 -->
  @if (session('msg'))
    <script>
      alert("{{ session('msg') }}");
    </script>
  @endif
@endsection
