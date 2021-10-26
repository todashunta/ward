<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WordBook;
use App\Models\Chapter;
use Doctrine\Inflector\Rules\Word;

class HomeController extends Controller
{
    public function index()
    {
        $word_books = WordBook::get();
        return view('index', compact('word_books'));
    }

    public function create()
    {
        $word_book = WordBook::get();
        return view('create', compact('word_book'));
    }

    public function store(Request $request)
    {
        WordBook::create(['name' => $request->name]);
        return  redirect()->route('create');
    }

    public function edit($word_book_id)
    {
        $word_book_name = WordBook::where('id', $word_book_id)->value('name');
        $id = WordBook::where('id', $word_book_id)->value('id');
        $chapters = Chapter::where('word_book_id', $word_book_id)->get();
        return view('edit', compact('word_book_name', 'chapters', 'id'));
    }

    public function  update(Request $request)
    {
        Chapter::create([
            'name' => $request->new_chapter,
            'word_book_id' => $request->word_book_id,
        ]);
        return redirect()->route('edit', ['word_book_id' => $request->word_book_id]);
    }

    public function cword($word_book_id, $chapter_id)
    {
        $word_book = WordBook::where('id', $word_book_id)->get();
        $chapter = WordBook::where('id', $chapter_id)->get();
        return view('cword', compact('word_book', 'chap