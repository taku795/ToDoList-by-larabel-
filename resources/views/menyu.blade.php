<link rel="stylesheet" href="/public/css/menyu.css">
<div class="id">
    <p>ログインID：{{$loginID}}</p>
    <form onSubmit='return Check()' method='POST' action="{{ route('deleteAccount') }}">
        @csrf
        <button>アカウント消去</button>
    </form>
</div>



<script>
    function Check() {
      if (confirm("本当に消去しますか？")) {
        return true;
      } else {
        return false;
      }
    }
  </script>