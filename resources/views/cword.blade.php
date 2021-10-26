@section('css', "{{ asset('css/app.css') }}")
@section('title', 'cword')

@extends('header')
@section('content')
<h1>{{ $word_book->name }}->{{ $chapter->name }}</h1>
<div>
    <form action="{{ route('cword') }}" method="POST">
    @csrf
        <p>単語作成</p>
        <input type="text">
        <button type="submit">決定</button>
    </form>
</div>
@endsection