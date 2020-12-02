<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;

class SurveyController extends Controller
{

    public function show(Questionnaire $questionnaires, $slug)
    {
        $questionnaires->load('questions.answers');
        return view('survey.show', compact('questionnaires'));
    }
}
