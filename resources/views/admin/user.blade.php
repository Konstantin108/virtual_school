@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Профиль пользователя</p>
                            </div>
                        </div>
                        <i class="fas fa-pen fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-2">
            <div>
                <div class="form-group" style="float: left; height: 300px;">
                    <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
                    >
                        @if($user->avatar)
                            <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                                 style="width: 210px;">
                        @else
                            <img src="/img/no_photo.jpg" alt="avatar" style="width: 210px;">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Имя пользователя</label>
                    <span style="margin-left: 74px;">{{ $user->name }}</span>
                </div>
                <div class="form-group">
                    <label>E-Mail адрес</label>
                    <span style="margin-left: 118px;">{{ $user->email }}</span>
                </div>
                <div class="form-group">
                    <label>Рейтинг пользователя</label>
                    <span style="margin-left: 44px;">{{ $user->rating }}</span>
                </div>
                <div class="form-group">
                    <label>Права администратора</label>
                    <span style="margin-left: 40px;">
                    @if($user->is_admin)
                            <span style="color: green">да</span>
                        @else
                            <span style="color: indianred">нет</span>
                        @endif
                </span>
                </div>
                <div class="form-group">
                    <label>Количество обращений</label>
                    <span style="margin-left: 35px;">{{ $count }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.users.edit', ['user' => $user])}}"
                   style="height: 30px;
                   min-width: 100px;
                   padding: 10px;
                   background-color: #17A673;
                   text-decoration: none;
                   color: white;
                   border-radius: 12px;"
                >
                    редактировать
                </a>
                <a href="{{ route('deleteUser', ['id' => $user->id]) }}"
                   style="height: 30px;
                   min-width: 100px;
                   padding: 10px;
                    margin-left: 20px;
                   background-color: indianred;
                   text-decoration: none;
                   color: white;
                   border-radius: 12px;"
                >
                    удалить
                </a>
                <a
                    href="{{ route('admin.users.index') }}"
                    style="height: 30px;
                       margin-left: 20px;
                       min-width: 100px;
                       padding: 10px;
                       background-color: #cbcb0c;
                       text-decoration: none;
                       color: white;
                       border-radius: 12px;"
                >
                    назад
                </a>
            </div>
        </div>
    </div>


@endsection
