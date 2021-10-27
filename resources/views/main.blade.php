<link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <section>
    <h1>リスト追加</h1>
    <p>やることを追加してください</p>
    <form method="POST" action="{{ route('addTask') }}" class="add-form">
      @csrf
      <input type="text" name="newTask">
      <button type="submit">追加する</button>
    </form>
  </section>
  
  <section>
    <h1>リスト一覧</h1>
    <table>
      @foreach($tasks as $task)
      <tr>
        <td>{{ $task['task'] }}</td>
        <td>
          <button id="edit{{ $task['id'] }}">編集</button>          
        </td>
        <td>
          <form onSubmit='return Check()' method='POST' action="http://localhost/todo/{{ $task['id'] }}/delete">
          @csrf
            <button>消去</button>
          </form>
        </td>
      </tr>
      <script>
        $(function() {
        $("#edit{{ $task['id'] }}").click(function() {
          $('#main').load("/todo/{{ $task['id'] }}/edit");
        })
    })
      </script>
      
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
  @if (session('msg-update'))
    <script>
      alert("{{ session('msg-update') }}");
    </script>
  @endif



