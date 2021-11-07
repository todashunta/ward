<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WordBook;
use App\Models\Chapter;

class ApiController extends Controller
{
    public function index()
    {
        $data = ['title' => 'aiueo'];
        return response()->json($data);
    }

    public function get_book($word_book_id)
    {
        $word_book = WordBook::where('id', $word_book_id)->first();
        if (empty($word_book)) {
            $data = [
                'word_book' => 'not exist',
                'chapters' => 'not exist'
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
}
