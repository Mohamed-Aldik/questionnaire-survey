@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionnaire->title }}</div>

                    <div class="card-body">


                        <a href="{{ url('/questionnaires/' . $questionnaire->id . '/question/create') }}"
                            class="btn btn-dark ">Add New Question </a>
                        <a href="{{ url('/surveys/' . $questionnaire->id . '-' . Str::slug($questionnaire->title)) }}"
                            class="btn btn-dark ">Task Survey </a>
                    </div>
                </div>
                @foreach ($questionnaire->questions as $question)
                    <div class="card">
                        <div class="card-header">{{ $question->question }}</div>

                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item">{{ $answer->answer }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
