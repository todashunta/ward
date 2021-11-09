<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WordBook;
use App\Models\Chapter;
use App\Models\Word;
use App\Models\Mean;

class ApiController extends Controller
{
    public function index()
    {
        $data = ['title' => 'aiueo'];
        return response()->json($data);
    }

    public function get_chapters($word_book_id)
    {
        $word_book = WordBook::where('id', $word_book_id)->first();
        if (empty($word_book)) {
            $data = [
                'word_book' => false,
                'chapters' => [false]
            ];
            return response()->json($data);
        }
        $chapter = Chapter::where('word_book_id', $word_book_id)->get();
        $data = [
            'word_book' => $word_book,
            'chapters' => $chapter
        ];
        return response()->json($data);
    }
    public function get_words($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        $words = Word::where('chapter_id', $id)->get();
        $data = [
            'chapter' => $chapter,
            'words' => $words
        ];
        return response()->json($data);
    }
    public function get_means($id)
    {
        $word = Word::where('id', $id)->first();
        $means = Mean::where('word_id', $id)->get();
        $data = [
            'word' => $word,
            'means' => $means
        ];
        return response()->json($data);
    }
}
