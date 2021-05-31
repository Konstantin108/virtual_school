@extends('layouts.site')
@section('content')

    @forelse ($questions as $quest)
        <h1>{{$quest->text}}</h1>
        <a href="{{ route('getNextQuest', [
                    'id' => $quest->theme_id,
                    'questNumber' => $quest->quest_number
                ])
             }}">{{ $quest->answer_1 }}</a>
        <br>
        <a href="{{ route('getNextQuest', [
                    'id' => $quest->theme_id,
                    'questNumber' => $quest->quest_number
                ])
             }}">{{ $quest->answer_2 }}</a>
        <br>
        <a href="{{ route('getNextQuest', [
                    'id' => $quest->theme_id,
                    'questNumber' => $quest->quest_number
                ])
             }}">{{ $quest->answer_3 }}</a>
        <br>
        <a href="{{ route('getNextQuest', [
                    'id' => $quest->theme_id,
                    'questNumber' => $quest->quest_number
                ])
             }}">{{ $quest->answer_4 }}</a>
    @empty
        <h1>Перейти к результатам</h1>
    @endforelse



@endsection
