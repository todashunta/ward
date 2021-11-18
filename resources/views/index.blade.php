@section('title', 'index')
@section('script', "js/index.js")

@section('css', "css/index.css")
@extends('layouts.header')
@section('content')
<div id="app">
    <div id="reset-cover" @@click="reset"></div>
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
        <div class="chapter-frame" @@click="chapterFrame">
            <p>@{{ chapterName }}</p>
            <div class="chapter-input">
                <template v-for='chapter in chapters'>
                    <input type="radio"  name="chapter" v-model="selectChapterId" :value="chapter.id" :id="chapter.name">
                    <label :for="chapter.name" @@click="chapterFrame">@{{ chapter.name }}</label>
                </template>
            </div>
        </div>
    </div>
    <button id="dl-xlsx">ダウンロード</button>
    <div v-if="wordExist" class="table">
        <table class="table-to-export" data-sheet-name="東京都区一覧">
            <template v-for="(word, wordIndex) of words">
                <tr>
                    <td>@{{ wordIndex + 1}}</td>
                    <td>@{{ word.name }}</td>
                    <td>@{{ word.means[0].class.name }}</td>
                    <td>
                    <template  v-for="(mean, meanIndex) of word.means">
                        <template v-if="meanIndex == 0">@{{ mean.mean }}</template>
                        <template v-else>,@{{ mean.mean }}</template>
                    </template>
                    </td>
                </tr>
            </template>
        </table>
    </div>
</div>

@endsection
