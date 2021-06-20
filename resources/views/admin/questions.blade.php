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
        <div style="min-width: 200px; height: 30px; margin-left: 76px;">
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
                    <td style="display: flex; justify-content: space-around">
                        <a href="#">
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
