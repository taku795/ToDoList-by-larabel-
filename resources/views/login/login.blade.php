@extends('login/layout')
@section('title','ログインフォーム')
@section('content')
  <h1>ログインフォーム</h1>
  <form method="POST" action="{{ route('login') }}">
  @csrf
    ログインid
    <input type="text" name="loginID">
    @if($errors->has('loginID'))
    <div>
    {{ $errors->first('loginID') }}
    </div>
    @endif
    パスワード
    <input type="text" name="loginPassword">
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
  </form>
  
  <a href="{{ route('addUserPage') }}">新規登録</a>
@endsection