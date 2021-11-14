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
    <select v-model="selectChapterId">
        <option v-for='chapter in chapters' :value="chapter.id">@{{ chapter.name }}</option>
    </select>
    <div v-if="wordExist">
        <table>
            <tr v-for="word of words">
                <td>@{{ word.name }}</td>
                <td v-for="mean of word.means">@{{ mean.mean }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection
