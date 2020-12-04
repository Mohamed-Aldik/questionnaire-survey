<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(QuestionnaireRequest $request)
    {

        $questionnaire = Questionnaire::Create([
            'title' => $request->title,
            'purpose' => $request->purpose,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('questionnaire/' . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');

        return view('questionnaire.show', compact('questionnaire'));
    }
}
