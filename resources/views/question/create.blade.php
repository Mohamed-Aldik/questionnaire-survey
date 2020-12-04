@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('questionnaire.Create New Question') </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/questionnaires/' . $questionnaire->id . '/question') }}">
                            @csrf
                            <div class="form-group">
                                <label for="question">@lang('questionnaire.question')</label>
                                <input name="question[question]" type="text" class="form-control" id="question"
                                    aria-describedby="questionHelp" placeholder="@lang('questionnaire.Enter Question')"
                                    value="{{ old('question.question') }}">
                                <small id="questionHelp" class="form-text text-muted">
                                    @lang('questionnaire.the description 1')</small>
                                @error('question.question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <fieldset>
                                <legend>@lang('questionnaire.Choices')</legend>
                                <small id="choicesHelp" class="form-text text-muted">
                                    @lang('questionnaire.Give choices that give you the most insight into your question')
                                </small>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">@lang('questionnaire.answer1')</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer1"
                                            aria-describedby="choicesHelp" placeholder="@lang('questionnaire.Enter choice')"
                                            value="{{ old('answers.0.answer') }}">
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer2">@lang('questionnaire.answer2')</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer2"
                                            aria-describedby="choicesHelp" placeholder="@lang('questionnaire.Enter choice')"
                                            value="{{ old('answers.1.answer') }}">
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer3">@lang('questionnaire.answer3')</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer3"
                                            aria-describedby="choicesHelp" placeholder="@lang('questionnaire.Enter choice')"
                                            value="{{ old('answers.2.answer') }}">
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer4">@lang('questionnaire.answer4')</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer4"
                                            aria-describedby="choicesHelp" placeholder="@lang('questionnaire.Enter choice')"
                                            value="{{ old('answers.3.answer') }}">
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary">@lang('questionnaire.Add Question')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
