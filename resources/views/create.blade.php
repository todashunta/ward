@section('css', "{{ asset('css/app.css') }}")
@section('title', 'create')

@extends('header')
@section('content')
<body>
    <form action="{{ route('create_post')}}" method="POST">
        @csrf
    <h1>作成ページ</h1>
    <div id="create-wordbook">
        <h2>単語帳作成</h2>
            <p>単語帳名</p>
            <input type="text" name="word_book_name">
            <button type="submit">作成</button>
        </div>
        <div id="create-chapter">
            <h2>単語帳チャプター作成</h2>
                @csrf
                <select v-model="wordBook">
                    @foreach ($word_books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                    <div>
                        <p>現在のチャプター</p>
                        <select>
                            <template v-for='chapter of chapters'>
                                <option value="@{{ chapter.id }}">@{{ chapter.name }}</option>
                            </template>
                        </select>
                    </div>
                </select>
                <button type="submit">作成</button>
        </div>
        
        <div id="create-word">
            <h2>単語作成</h2>
                @csrf
                <select>
                    @foreach ($word_books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="word_name">
                <button type="submit">作成</button>
        </div>
    </form>

    <example-component></example-component>
    <script src="js/create.js"></script>
@endsection
@section('script', 'js/create.js')
@extends('footer')