<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <form action="{{ route('create_post')}}" method="POST">
        @csrf
    <h1>作成ページ</h1>
    <div>
        <h2>単語帳作成</h2>
            <p>単語帳名</p>
            <input type="text" name="word_book_name">
            <button type="submit">作成</button>
        </div>

        <div>
            <h2>単語帳チャプター作成</h2>
                @csrf
                <select>
                    @foreach ($word_books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="chapter_name">
                <button type="submit">作成</button>
        </div>

        <div>
            <h2>単語作成</h2>
                @csrf
                <input type="text" name="word_name">
                <button type="submit">作成</button>
        </div>
    </form>
    </body>
</html>