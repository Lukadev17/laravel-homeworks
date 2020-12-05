<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with("answers")->get();
        return view("questions")->with("questions", $questions);
    }

    public function create()
    {
        return view('create_question');
    }

    public function save(AddQuestionRequest $request)
    {
        $question = new Question();
        $question->question = $request->input('question');
        $question->save();
        $answer_1 = new Answer();
        $answer_1->answer = $request->input('answer_1');
        $answer_1->correct_answer = $request->input('correct_answer') == 1;
        $answer_1->question_id = $question->id;
        $answer_1->save();

        $answer_2 = new Answer();
        $answer_2->answer = $request->input('answer_2');
        $answer_2->correct_answer = $request->input('correct_answer') == 2;
        $answer_2->question_id = $question->id;
        $answer_2->save();

        $answer_3 = new Answer();
        $answer_3->answer = $request->input('answer_3');
        $answer_3->correct_answer = $request->input('correct_answer') == 3;
        $answer_3->question_id = $question->id;
        $answer_3->save();

        $answer_4 = new Answer();
        $answer_4->answer = $request->input('answer_4');
        $answer_4->correct_answer = $request->input('correct_answer') == 4;
        $answer_4->question_id = $question->id;
        $answer_4->save();

        return redirect()->action([QuestionController::class, 'index']);
    }

    public function update(Request $request, Question $question)
    {
    }

    public function delete(Question $question)
    {

    }
}
