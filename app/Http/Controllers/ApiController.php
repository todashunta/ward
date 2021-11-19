<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WordBook;
use App\Models\Chapter;
use App\Models\Word;
use App\Models\Mean;
use App\Models\WordClass;

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

    public function get_words($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        $words = Word::where('chapter_id', $id)->get();
        foreach ($words as $word) {
            $means = Mean::where('word_id', $word->id)->get();
            $word->means = $means;
            foreach ($means as $index => $mean) {
                $class = WordClass::where('id', $mean->word_class_id)->first();
                $word->means[$index]->class = $class;
            }
        }
        $data = [
            'chapter' => $chapter,
            'words' => $words
        ];
        return response()->json($data);
    }
    public function excel(Request $request)
    {
        $res_data = $request->json()->all();
        $res = 'no';
        $word_book_id = $res_data[0]['word_book_id'];
        $chapter_id = $res_data[0]['chapter_id'];
        foreach ($res_data as $row) {
            if (!empty($row['word'])) {
                if (empty(Word::where('name', $row['word'])->where('chapter_id', $chapter_id)->first())) {
                    $word = Word::create([
                        'name' => $row['word'],
                        'chapter_id' => $chapter_id,
                    ]);
                    if (!empty(WordClass::where('name', $row['class'])->first())) {
                        $class = WordClass::where('name', $row['class'])->first();

                        if (!empty(Mean::where('word_id', $word->id)->where('word_class_id', $class->id))) {
                            if (strpos($row['mean'], ',')) {
                                $means = explode(',', $row['mean']);
                            } else if (strpos($row['mean'], '、')) {
                                $means = explode('、', $row['mean']);
                            } else {
                                $means = [$row['mean']];
                            }
                            foreach ($means as $mean) {
                                Mean::create([
                                    'mean' => $mean,
                                    'word_id' => $word->id,
                                    'word_class_id' => $class->id
                                ]);
                            }
                        }
                    } else {
                        return response()->json('classが選択に不具合があります');
                    }
                }
            }
        }
        return response()->json($res_data);
    }
}
