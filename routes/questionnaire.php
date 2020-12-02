<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Questionnaire', 'middleware' => 'auth'], function () {

    Route::get('/questionnaires/create', 'QuestionnaireController@create');
    Route::post('/questionnaires', 'QuestionnaireController@store');
    Route::get('/questionnaire/{questionnaire}', 'QuestionnaireController@show');
    Route::get('/questionnaires/{questionnaire}/question/create', 'QuestionController@create');
    Route::post('/questionnaires/{questionnaire}/question', 'QuestionController@store');
    Route::get('/surveys/{questionnaires}-{slug}', 'SurveyController@show');

});
