@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Удалить тему</p>
                            </div>
                        </div>
                        <i class="fas fa-pen fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <h3 style="color: red">Удаление темы</h3>
            <tr>
                <th style="width: 60px;">#ID</th>
                <th>заголовок темы</th>
                <th>статус</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 60px;">{{ $theme->id }}</td>
                <td>{{ $theme->title }}</td>
                <td>
                    @if($theme->status == 'published')
                        опубликовано
                    @elseif($theme->status == 'blocked')
                        заблокировано
                    @else
                        на модерации
                    @endif
                </td>
                <td>{{ $theme->created_at }}</td>
                <td>{{ $theme->updated_at }}</td>
            </tr>
            </tbody>
        </table>

        @php
            $count = 1;
            foreach ($questions as $quest){
                if($quest->theme_id == $theme->id){
                    $count++;
                }
            }
        @endphp
        @if($count > 1)

            <h3 style="color: red">Вместе с темой будут удалены следующие вопросы</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 60px;">#ID</th>
                    <th style="width: 90px;">ID темы</th>
                    <th>текст вопроса</th>
                </tr>
                </thead>
                <tbody>

                @forelse($questions as $quest)
                    @if($quest->theme_id == $theme->id)

                        <tr>
                            <td style="width: 60px;">{{ $quest->id }}</td>
                            <td style="width: 90px;">{{ $quest->theme_id }}</td>
                            <td>{{ $quest->text }}</td>
                        </tr>
                    @endif
                @empty
                    <td colspan="4">вопросов нет</td>
                @endforelse

                </tbody>
            </table>
        @endif

    </div>
    <a
        href="{{ route('deleteTheme', ['id' => $theme->id]) }}"
        style="height: 30px;
        min-width: 100px;
        padding: 10px;
        background-color: indianred;
        text-decoration: none;
        color: white;
        border-radius: 12px;
        margin-right: 20px;
     "
    >
        удалить {{ $count }} элемента
    </a>
    <a
        href="{{ route('admin.themes.index') }}"
        style="height: 30px;
        min-width: 100px;
        padding: 10px;
        background-color: #2fc98e;
        text-decoration: none;
        color: white;
        border-radius: 12px;
     "
    >
        назад
    </a>

@endsection
