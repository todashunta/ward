<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $word_book_name }}</h1>
    <form action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="word_book_id" value={{ $id }}>
        <table>
            @foreach ($chapters as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <input type="text" name="new_chapter">
                    </td>
                </tr>
        </table>
        <button type="submit">決定</button>
    </form>
</body>
</html>