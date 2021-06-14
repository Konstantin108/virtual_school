@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 350px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Темы</p>
                            </div>
                        </div>
                        <i class="fas fa-archive fa-2x text-gray-200"></i>
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
                <th>заголовок</th>
                <th>вопросы</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>

            @forelse($themes as $theme)
                <tr>
                    <td>{{ $theme->id }}</td>
                    <td>{{ $theme->title }}</td>
                    <td>
                        <a href="#">Перейти к вопросам</a>
                    </td>
                    <td>{{ $theme->created_at }}</td>
                    <td>{{ $theme->updated_at }}</td>
                    <td>
                        <a href="#">Ред.</a>&nbsp
                        <a href="#">Уд.</a>
                    </td>
                </tr>
            @empty
                <td colspan="4">тем нет</td>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
