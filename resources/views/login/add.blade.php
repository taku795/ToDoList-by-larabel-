@extends('login/layout')
@section('title','新規登録画面')
@section('content')
  <h1>新規登録</h1>
  <form method="POST" action="{{ route('addUser') }}" class="login-form">
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
    <input type="text" name="loginPasswordCheck" placeholder="パスワード（確認）">
    @if($errors->has('loginPasswordCheck'))
    <div>
    {{ $errors->first('loginPasswordCheck') }}
    </div>
    @endif
    <button type="submit">登録</button>
    <a href="{{ route('loginPage') }}"><button type="button">キャンセル</button></a>
  </form>
@endsection