<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }
    public function store(QuestionRequest $request, Questionnaire $questionnaire)
    {
        $data = request()->all();
        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);
        return redirect('/questionnaire/' . $questionnaire->id);

    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();
        return redirect()->back();
    }
}
