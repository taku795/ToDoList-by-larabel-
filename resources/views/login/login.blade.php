@extends('login/layout')
@section('title','ログインフォーム')
@section('content')
  <form method="POST" action="{{ route('login') }}" class="login-form">
    <div class="login-title">
      <p>logi in</p>
    </div>
  @csrf
    <input type="text" name="loginID" placeholder="ログインID">
    @if($errors->has('loginID'))
      <div>
      {{ $errors->first('loginID') }}
      </div>
    @endif
    <input type="text" name="loginPassword" placeholder="パスワード">
    @if($errors->has('loginPassword'))
      <div>
      {{ $errors->first('loginPassword') }}
      </div>
    @endif
    @if(session('msg'))
      <div>
      {{ session('msg') }}
      </div>
    @endif
    <div class="button-outer">
      <button type="submit">ログイン</button>
      <a href="{{ route('addUserPage') }}"><button type="button">新規登録</button></a>
    </div>
  </form>
  

  <script>
    // 新規登録完了時
    @if(session('msg-complete'))
      alert("{{ session('msg-complete') }}");
    @endif
  </script>
@endsection