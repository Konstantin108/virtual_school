@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 350px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Вопросы</p>
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
                <th>ID темы</th>
                <th>текст</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>

            @forelse($questions as $quest)
                <tr>
                    <td>{{ $quest->id }}</td>
                    <td>{{ $quest->theme_id }}</td>
                    <td>{{ $quest->text }}</td>
                    <td>
                        <a href="#">Ред.</a>&nbsp
                        <a href="#">Уд.</a>
                    </td>
                </tr>
            @empty
                <td colspan="4">вопросов нет</td>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
