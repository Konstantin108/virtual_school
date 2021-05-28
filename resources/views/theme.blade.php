@extends('layouts.site')
@section('content')

<div>#ID</div>
<div>{{ $theme->id }}</div>
<div>заголовок</div>
<div>{{ $theme->title }}</div>
<div>текст</div>
<div>{{ $theme->text }}</div>
<div>дата добавления</div>
<div>{{ $theme->created_at }}</div>
<a href='{{ route('/') }}'>назад</a>

@endsection
