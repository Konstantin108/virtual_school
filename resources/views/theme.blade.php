@extends('layouts.site')
@section('content')

<div>заголовок</div>
<div>{{ $theme->title }}</div>
<div>текст</div>
<div>{{ $theme->text }}</div>
<a href="{{ route('getQuest',  ['id' => $theme->id]) }}">перейти к вопросам</a>
<br>
<a href='{{ route('/') }}'>назад</a>

@endsection
