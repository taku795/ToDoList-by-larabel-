<h1>編集</h1>
  タスクを編集してください
  <form method="POST" action="http://localhost/todo/{{ $task['id'] }}/update">
    @csrf
    <input type="text" name="newTask" value="{{ $task['task'] }}">
    <button type="submit">更新</button>
  </form>
  
