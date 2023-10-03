@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->
<table class="table">
<tr><th>番号</th><th>ISBNコード</th><th>タイトル</th><th>作者</th></tr>

<tr>
    <td>{{ $record->id }}</td>
    <td>{{ $record->ISBN }}</td>
    <td>{{ $record->bookName }}</td>
    <td>{{ $record->author }}</td>
    
</tr>
</table>


<h1>コメント</h1>
@if(isset($record))
<form action="" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $record->id }}"readonly><br>
    投稿番号 {{ $record->id }} <br>
    ISBNコード <input type="text" name="ISBN" value="{{ $record->ISBN }}" readonly>
    <br>
    タイトル <input type="text" name="bookName" value="{{ $record->bookName }}" readonly>
    <br>
    作者 <input type="text" name="author" value="{{ $record->author }}" readonly>
    <br>
    <input type="submit" value="コメント、おすすめ度入力"><br>
</form>
@endif
<a href="/profile">ホームへ</a>
@endsection