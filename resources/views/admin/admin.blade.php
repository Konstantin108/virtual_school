@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Профиль администратора</p>
                            </div>
                        </div>
                        <i class="fas fa-pen fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user->is_admin)
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
                        <label>Имя администратора</label>
                        <span style="margin-left: 122px;">{{ $user->name }}</span>
                    </div>
                    <div class="form-group">
                        <label>E-Mail адрес</label>
                        <span style="margin-left: 187px;">{{ $user->email }}</span>
                    </div>
                    <div class="form-group">
                        <label>Количество обращений в работе</label>
                        <span style="margin-left: 35px;">{{ $countInProcess }}</span>
                    </div>
                    <div class="form-group">
                        <label>Количество обращений закрыто</label>
                        <span style="margin-left: 37px;">{{ $countReady }}</span>
                    </div>
                </div>
                <div>
                    @if($user->id == Auth::user()->id)
                        <a href="{{ route('adminEdit', ['id' => $user->id])}}"
                           style="height: 30px;
                               min-width: 100px;
                               padding: 10px;
                               margin-right: 20px;
                               background-color: #17A673;
                               text-decoration: none;
                               color: white;
                               border-radius: 12px;"
                        >
                            редактировать
                        </a>
                    @else
                    @endif
                    <a href="{{ $previous }}"
                       style="height: 30px;
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
    @else
        <div>Аккаунт администратора с заданным ID не найден</div>
    @endif

@endsection
