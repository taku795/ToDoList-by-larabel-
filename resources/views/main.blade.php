<link rel="stylesheet" href="/public/css/main.css">
  <section>
    <div>
      <h1>リスト追加</h1>
      <p>やることを追加してください</p>
    </div>
    <form method="POST" action="{{ route('addTask') }}" class="add-form">
      @csrf
      <input type="text" name="newTask">
      <button type="submit">追加する</button>
    </form>
  </section>
  
  <section>
    <div>
      <h1>リスト一覧</h1>
    </div>
    <table>
      @foreach($tasks as $task)
      <tr>
        <td>{{ $task['task'] }}</td>
        <td>
          <button id="edit{{ $task['id'] }}">編集</button>          
        </td>
        <td>
          <form onSubmit='return Check()' method='POST' action="/public/todo/{{ $task['id'] }}/delete">
          @csrf
            <button>消去</button>
          </form>
        </td>
      </tr>
      <script>
        $(function() {
        $("#edit{{ $task['id'] }}").click(function() {
          $('#main').load("/public/todo/{{ $task['id'] }}/edit");
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



