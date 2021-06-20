@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Обращения</p>
                                <p style="font-size: 15px;">(всего: {{ $count }})</p>
                            </div>
                        </div>
                        <i class="fas fa-question fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th style="width: 220px;">имя пользователя</th>
                <th>тип проблемы</th>
                <th>текст обращения</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>

            @forelse($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td style="width: 220px;">{{ $message->user_name }}</td>
                    <td>{{ $message->problem_theme }}</td>
                    <td>{{ $message->text }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->updated_at }}</td>
                    <td style="display: flex; justify-content: space-around">
                        <a href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <td colspan="4">обращений нет</td>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
