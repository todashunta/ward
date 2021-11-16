@section('title', 'index')
@section('script', "js/index.js")

@section('css', "css/index.css")
@extends('layouts.header')
@section('content')
<div id="app">
    <div class="pankuzu">
        <div class="word-book-frame" @@click="wordBookFrame">
            <p>@{{wordBookName}}</p>
            <div class="word-book-input">
                @foreach ($word_books as $book)
                    <input type="radio" name="word-book" v-model="selectBookId" value="{{ $book->id }}" id="{{ 'word-book-'.$loop->index }}">
                    <label for="{{ 'word-book-'.$loop->index }}" @@click="wordBookFrame">{{ $book->name }}</label>
                @endforeach
            </div>
        </div>
        <div class="relation"></div>
        <div class="chapter-input">
            <template v-for='chapter in chapters'>
                <input type="radio"  name="chapter" v-model="selectChapterId" :value="chapter.id" id="">
                <label for="" @@click="wordBookFrame">@{{ chapter.name }}</label>
            </template>
        </div>
    </div>
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
