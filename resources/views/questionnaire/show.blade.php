@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionnaire->title }}</div>

                    <div class="card-body">


                        <a href="{{ url('/questionnaires/' . $questionnaire->id . '/question/create') }}"
                            class="btn btn-dark ">@lang('questionnaire.Add New Question') </a>
                        <a href="{{ url('/surveys/' . $questionnaire->id . '-' . Str::slug($questionnaire->title)) }}"
                            class="btn btn-dark ">@lang('questionnaire.Task Survey') </a>
                    </div>
                </div>
                @foreach ($questionnaire->questions as $question)
                    <div class="card">
                        <div class="card-header">{{ $question->question }}</div>

                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{ $answer->answer }}</div>

                                    @if ($question->responses->count())

                                        <div>
                                            {{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%
                                        </div>

                                    @endif
                                </li>

                            @endforeach
                        </ul>
                        <div class="card-footer">
                            <form action="{{ url('/questionnaires/' . $questionnaire->id . '/question/' . $question->id) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    @lang('questionnaire.Delete Question') </button>

                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
