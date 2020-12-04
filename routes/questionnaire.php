<?php

use Illuminate\Support\Facades\Route;
Route::group([
    'namespace' => 'Questionnaire',
    'middleware' => 'auth',
], function () {

    if (file_exists(app_path('Http/Controllers/Questionnaire/LocalizationController.php'))) {
        Route::get('lang/{locale}', 'LocalizationController@lang');
    }

    Route::get('/questionnaires/create', 'QuestionnaireController@create');
    Route::post('/questionnaires', 'QuestionnaireController@store');
    Route::get('/questionnaire/{questionnaire}', 'QuestionnaireController@show');

    Route::get('/questionnaires/{questionnaire}/question/create', 'QuestionController@create');
    Route::post('/questionnaires/{questionnaire}/question', 'QuestionController@store');
    Route::delete('/questionnaires/{questionnaire}/question/{question}', 'QuestionController@destroy');

    Route::get('/surveys/{questionnaires}-{slug}', 'SurveyController@show');
    Route::post('/surveys/{questionnaires}-{slug}', 'SurveyController@store');

});
