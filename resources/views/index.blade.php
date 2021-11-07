@section('css', "{{ asset('css/app.css') }}")
@section('title', 'index')

@extends('header')
@section('content')
<body>
    <a href="/create">単語帳作成</a>
    <table>
        @foreach ($word_books as $book)
            @foreach ($book->chapter as $chapter)
                <tr>
                    <td><a href="/edit/{{ $book->id }}">{{ $book->name }}</a></td>
                    <td>{{ $chapter->name }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection
@extends('footer')