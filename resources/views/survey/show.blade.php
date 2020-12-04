@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $questionnaires->title }}</h1>
                <form action="{{ url('/surveys/' . $questionnaires->id . '-' . Str::slug($questionnaires->title)) }} "
                    method="POST">
                    @csrf
                    @foreach ($questionnaires->questions as $key => $question)
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ $key + 1 }}</strong> {{ $question->question }}
                            </div>
                            <div class="card-body">
                                @error('responses.' . $key . '.answer_id')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                                <ul class="list-group">
                                    @foreach ($question->answers as $answer)
                                        <label for="{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" class="mr-2" name="responses[{{ $key }}][answer_id]"
                                                    id="{{ $answer->id }}" value="{{ $answer->id }}"
                                                    {{ old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : '' }}>
                                                {{ $answer->answer }}
                                                <input type="hidden" name="responses[{{ $key }}][question_id]"
                                                    value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card">
                        <div class="card-header">@lang('questionnaire.Your Information') </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">@lang('questionnaire.Your Name')</label>
                                <input name="survey[name]" type="text" class="form-control" id="name"
                                    aria-describedby="nameHelp" placeholder="Enter name" value="{{ old('name') }}">
                                <small id="nameHelp" class="form-text text-muted">
                                    @lang('questionnaire.Hello Whats Your Name')</small>
                                @error('survey.name')
                                    <small class="text-danger">{{ $message }}</small>

                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">@lang('questionnaire.Your E-mail')</label>
                                <input name="survey[email]" type="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @lang('questionnaire.Your Email Please')</small>
                                @error('survey.email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    @lang('questionnaire.Complete Survey')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
