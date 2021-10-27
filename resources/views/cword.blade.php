@section('css', "{{ asset('css/app.css') }}")
@section('title', 'cword')

@extends('header')
@section('content')
<h1>{{ $word_book->name }}->{{ $chapter->name }}</h1>
<div>
    <form action="{{ route('word_index', $chapter->id) }}" method="POST">
    @csrf
        <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
        <p>単語作成</p>
        <input type="text" name="word_name">
        <button type="submit">決定</button>
    </form>
</div>
@endsection