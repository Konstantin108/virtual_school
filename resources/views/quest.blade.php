@extends('layouts.site')
@section('content')

    @forelse ($questions as $quest)
        <form method="post"
              action="{{ route('getNextQuest', [
                    'id' => $quest->theme_id,
                    'questNumber' => $quest->quest_number
                ])
             }}"
        >
            @csrf
            @method('POST')
            <h1>{{$quest->text}}</h1>
            <input type="radio" name="answer" id="answer_1" value="{{ $quest->answer_1 }}">{{ $quest->answer_1 }}
            <br>
            <input type="radio" name="answer" id="answer_2" value="{{ $quest->answer_2 }}">{{ $quest->answer_2 }}
            <br>
            <input type="radio" name="answer" id="answer_3" value="{{ $quest->answer_3 }}">{{ $quest->answer_3 }}
            <br>
            <input type="radio" name="answer" id="answer_4" value="{{ $quest->answer_4 }}">{{ $quest->answer_4 }}
            <br>
            <input type="hidden" name="correctAnswer" id="correct_answer" value="{{ $quest->correct_answer }}">
            <button type="submit" class="btn btn-success">Ответить</button>
        </form>
    @empty
        <h1>Ваш результат {{ $value }} правильных ответов из {{ $colOfQuestions }}</h1>
    @endforelse

@endsection
