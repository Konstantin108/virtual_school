@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Вопросы</p>
                                <p style="font-size: 15px;">(всего: {{ $count }})</p>
                            </div>
                        </div>
                        <i class="fas fa-envelope-open-text fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
        <div style="min-width: 200px; height: 30px; margin-left: 50%;">
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @elseif(session()->has('error'))
                <div class="fail_msgs">{{session()->get('fail')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 60px;">#ID</th>
                <th style="min-width: 120px;">ID темы</th>
                <th style="width: 50%;">текст</th>
                <th style="width: 50%;">правильный ответ</th>
                <th style="display: flex; justify-content: space-around; max-width: 100px">действие</th>
            </tr>
            </thead>
            <tbody>

            @forelse($questions as $quest)
                <tr>
                    <td style="width: 60px;">{{ $quest->id }}</td>
                    <td style="min-width: 120px;">{{ $quest->theme_id }}</td>
                    <td style="width: 50%;">{{ $quest->text }}</td>
                    <td style="width: 50%;">
                        @if($quest->correct_answer != 'undefined')
                            <span> {{ $quest->correct_answer }}</span>
                        @else
                            <span style="color: red">правильный ответ не указан</span>
                        @endif
                    </td>
                    <td style="display: flex; justify-content: space-around; max-width: 100px">
                        <a href="{{ route('admin.questions.edit', ['question' => $quest])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('deleteQuest', ['id' => $quest->id]) }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <td colspan="4">вопросов нет</td>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
