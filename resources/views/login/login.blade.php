@extends('login/layout')
@section('title','ログインフォーム')
@section('content')
  <h2>ログインフォーム</h2>
  <form method="POST" action="{{ route('login') }}" class="login-form">
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
    <button type="submit">ログイン</button>
    <a href="{{ route('addUserPage') }}"><button type="button">新規登録</button></a>
  </form>
  

  <script>
    // 新規登録完了時
    @if(session('msg-complete'))
      alert("{{ session('msg-complete') }}");
    @endif
  </script>
@endsection