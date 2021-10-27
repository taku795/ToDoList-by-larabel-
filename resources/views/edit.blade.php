<link rel="stylesheet" href="/public/css/edit.css">
<div>
  <p>タスクを編集してください</p>
</div>
<form method="POST" action="/public/todo/{{ $task['id'] }}/update" class="edit-form">
  @csrf
  <input type="text" name="newTask" value="{{ $task['task'] }}">
  <button type="submit">更新</button>
</form>
  
