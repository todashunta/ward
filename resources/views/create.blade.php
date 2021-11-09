@extends('layouts.header')
@section('title', 'create')

@section('script', "js/create.js")

@section('content')
    <form action="{{ route('create_post')}}" method="POST">
        @csrf
    <h1>作成ページ</h1>
    <div id="create">
        <div id="book">
            <h2>単語帳作成</h2>
                <p>単語帳名</p>
                <input type="text" name="word_book_name">
                <button type="submit">作成</button>
            </div>
            <div id="ter">
                <h2>単語帳チャプター作成</h2>
                    <select v-model="chapterWordBook" name="word_book_id">
                        @foreach ($word_books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        <p>現在のチャプター</p>
                        <div v-if="chapter.exist">
                            <p v-for='chapter of chapter.chapters' value="@{{ chapter.id }}">@{{ chapter.name }}</p>
                        </div>
                        <div v-else>
                            <p>見つかりません</p>
                        </div>
                    </div>
                    <input type="text" name="chapter_name">
                    <button type="submit">作成</button>
            </div>

            <div>
                <h2>単語作成</h2>
                    <select v-model="wordWordBook" name="word_word_book_id">
                        @foreach ($word_books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                        @endforeach
                    </select>
                    <select name="word_chapter_name">
                        <option v-if="!word.exist" value="">見つかりません</option>
                        <option v-for='chapter of word.chapters' :value="chapter.id">@{{ chapter.name }}</option>
                    </select>
                    <input type="text" name="word_name" placeholder="単語名">
                    <select name="word_class_id">
                        @foreach ($word_classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="word_mean_name" placeholder="意味">
                    <button type="submit">作成</button>
            </div>
            <div>
                <h2>品詞作成</h2>
                <input type="text" name="word_class_name">
                <button type="submit">作成</button>
                <div>
                    <h4>追加済みの品詞</h4>
                    @foreach ($word_classes as $class)
                    <p value="{{ $class->id }}">{{ $class->name }}</p>
                    @endforeach
                </div>
            </div>
    </div>
    </form>
@endsection