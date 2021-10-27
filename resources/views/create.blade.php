<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <h1>作成ページ</h1>
    <div>
        <h2>単語帳作成</h2>
        <form action="{{ route('create_word_book')}}" method="POST">
            @csrf
            <p>単語帳名</p>
            <input type="text" name="word_book_name">
            <button type="submit">作成</button>
        </form>
    </div>

    {{-- <div>
        <h2>単語帳チャプター作成</h2>
        <form action="{{ route('create_chapter')}}">
            @csrf
            @foreach ($word_books as $book)
                <select>
                    <option value="aiueo">aiueo</option>
                </select>
            @endforeach
            <input type="text" name="chapter_name">
            <button type="submit">作成</button>
        </form>
    </div>

    <div>
        <h2>単語作成</h2>
        <form action="{{ route('create_word')}}">
            @csrf
            <input type="text" name="word_name">
            <button type="submit">作成</button>
        </form>
    </div> --}}
</body>
</html>