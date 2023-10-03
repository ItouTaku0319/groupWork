

@extends('layouts.base')
@section('title','ログインページ')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->

@if(\Illuminate\Support\Facades\Auth::user()->department_id === 1)
    あなたはシステム部社員です
    <br>
    <a href="{{ route('bookRegister') }}">書籍登録へ</a>
    <a href="{{ route('bookErase' )}}">書籍削除へ</a>
@else
    あなたは一般社員です
@endif
<br>
{{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。

<form action="{{ route('user.logout') }}" method="post">
    @csrf
    <button>ログアウト</button>
</form>
<a href=""></a>
<a href="{{ route('bookIndex') }}">書籍一覧表示</a>



@endsection