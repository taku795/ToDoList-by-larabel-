<link rel="stylesheet" href="/public/css/menyu.css">
<div class="id">
    <p>ログインID：{{$loginID}}</p>
    @if ($loginID!='test')
    <form onSubmit='return Check()' method='POST' action="{{ route('deleteAccount') }}">
        @csrf
        <button>アカウント消去</button>
    </form>
    @endif
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