@extends('layouts.site')
@section('content')

@forelse($themes as $theme)
    <div>#ID</div>
    <div>{{ $theme->id }}</div>
    <div>заголовок</div>
    <div>{{ $theme->title }}</div>
    <div>текст</div>
    <div>{{ $theme->text }}</div>
    <div>дата добавления</div>
    <div>{{ $theme->created_at }}</div>
    <a href='{{ route('themes.show', ['id' => $theme->id])}}'>показать</a>
@empty
    <div>темы отсутствуют</div>
@endforelse

@endsection

