@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Пользователи</p>
                                <p style="font-size: 15px;">(всего: {{ $count }})</p>
                            </div>
                        </div>
                        <i class="fas fa-user-friends fa-2x text-gray-200"></i>
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
                <th>имя пользователя</th>
                <th>E-Mail адрес</th>
                <th>дата добавления</th>
                <th>дата обновления</th>
                <th>права админа</th>
                <th>действие</th>
            </tr>
            </thead>
            <tbody>

            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->is_admin }}</td>
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
                <td colspan="4">пользователей нет</td>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
