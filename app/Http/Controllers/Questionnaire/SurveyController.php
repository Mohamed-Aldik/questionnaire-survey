<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Models\Questionnaire;

class SurveyController extends Controller
{

    public function show(Questionnaire $questionnaires, $slug)
    {
        $questionnaires->load('questions.answers');
        return view('survey.show', compact('questionnaires'));
    }
    public function store(SurveyRequest $request, Questionnaire $questionnaires)
    {

        $data = request()->all();
        $survey = $questionnaires->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);
        return redirect('/')->with('success', __('questionnaire.thanx'));
    }
}
