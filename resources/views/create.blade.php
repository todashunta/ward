<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <form action="{{ route('store')}}" method="POST">
        @csrf
        <p>単語帳名</p>
        <input type="text" name="name">
        <button type="submit">作成</button>
    </form>
    @foreach ($word_book as $i)
        <h3><a href="{{ route('edit', ['word_book_id' => $i->id]) }}">{{$i->name}}</a></h3>
    @endforeach
</body>
</html>