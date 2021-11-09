<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WordBook;
use App\Models\Chapter;
use App\Models\Word;
use App\Models\WordClass;
use App\Models\Mean;

class HomeController extends Controller
{
    public function index()
    {
        $word_books = WordBook::get();
        return view('index', compact('word_books'));
    }


    public function create()
    {
        $word_books = WordBook::get();
        $word_classes = WordClass::get();
        return view('create', compact('word_books', 'word_classes'));
    }

    public function create_word_book(Request $request)
    {
        if (!empty($request->word_book_name)) {
            WordBook::create(['name' => $request->word_book_name]);
        }
        if (!empty($request->word_book_id) && !empty($request->chapter_name)) {
            WordBook::where('id', $request->word_book_id)->first();
            $chapter = new Chapter;
            $chapter->name = $request->chapter_name;
            $chapter->word_book_id = $request->word_book_id;
            $chapter->save();
        }

        if (!empty($request->word_class_name)) {
            $class = new WordClass;
            $class->name = $request->word_class_name;
            $class->save();
        }
        if (!empty($request->word_chapter_name) && !empty($request->word_name) && !empty($request->word_class_id) && !empty($request->word_mean_name)) {
            $word = new Word;
            $word->name = $request->word_name;
            $word->chapter_id = Chapter::where('name', $request->word_chapter_name)->first()->id;
            $word->save();
            $mean = new Mean;
            $mean->mean = $request->word_mean_name;
            $mean->word_id = $word->id;
            $mean->word_class_id = $request->word_class_id;
            $mean->save();
        }
        $word_books = WordBook::get();
        $word_classes = WordClass::get();
        return  redirect()->route('create', compact('word_books', 'word_classes'));
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

    public function cword($chapter_id)
    {
        $chapter = Chapter::where('id', $chapter_id)->first();
        $word_book = WordBook::where('id', $chapter->word_book->id)->first();
        return view('cword', compact('word_book', 'chapter'));
    }

    public function postword()
    {
        return redirect()->route('cword');
    }
}
