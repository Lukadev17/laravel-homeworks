<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::with("answers")->get();
        return view("quiz")->with("questions", $questions);
    }

    public function save(Request $request)
    {

        $request = $request->except(('_token'));
        $total = 0;
        foreach($request as $key => $value) {
            if(Answer::find((int)$value)->correct_answer) {
                $total++;
            }
        }
        return view('total', compact('total'));
    }
}
