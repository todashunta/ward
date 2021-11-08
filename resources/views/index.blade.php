{{-- @section('css', "css/app.css") --}}
@section('title', 'index')
@section('script', "js/index.js")

@extends('layouts.header')
@section('content')
<div id="app">
    <select v-model="selectBookId">
        @foreach ($word_books as $book)
        <option value="{{ $book->id }}">{{ $book->name }}</option>
        @endforeach
    </select>
</div>

@endsection
