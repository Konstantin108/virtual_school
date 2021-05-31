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

                <input type="radio">

{{--        <a href="">{{ $quest->answer_1 }}</a>--}}
{{--        <br>--}}
{{--        <a href="">{{ $quest->answer_2 }}</a>--}}
{{--        <br>--}}
{{--        <a href="">{{ $quest->answer_3 }}</a>--}}
{{--        <br>--}}
{{--        <a href="">{{ $quest->answer_4 }}</a>--}}


                <h1>{{ $quest->correct_answer }}</h1>

                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
    @empty
        <h1>Перейти к результатам</h1>
    @endforelse


@endsection
