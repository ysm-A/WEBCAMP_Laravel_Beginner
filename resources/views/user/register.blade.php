@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
        <h1>ユーザ登録</h1>
        <!--Messege-->
        @if (session('front.users_register_success') == true)
            ユーザー登録完了！<br>
        @endif
        <!--error handling-->
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        
        <form action="/user/register" method="post">
            @csrf
            名前 : <input name="name" value="{{ old('name') }}"><br>
            email：<input name="email" value="{{ old('email') }}"><br>
            パスワード：<input  name="password" type="password"><br>
            <button>登録</button><br>
        </form>
@endsection