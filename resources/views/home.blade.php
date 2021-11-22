@extends('layouts.header')
@section('title', 'create')

@section('script', "js/home.js")
@section('css', "css/home.css")
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
    <div class="main">
        <div class="num">@{{ num }}</div>
        <div class="word">@{{ word }}</div>
        <div class="mean">@{{ mean }}</div>
    </div>
    <div class="play">
        <div @@click="shuffle"><img src="image/play/shuffle.svg" alt="shuffle"></div>
        <div @@click="leftSkip"><img src="image/play/left-skip.svg" alt="left"></div>
        <div @@click="start"><img src="image/play/start.svg" alt="start"></div>
        <div @@click="rightSkip"><img src="image/play/right-skip.svg" alt="right"></div>
        <div @@click="repeat"><img src="image/play/repeat.svg" alt="repeat"></div>
    </div>
</div>
@endsection