@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Редактирование данных</p>
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
            <form
                method="post"
                action="{{ route('admin.users.update', ['user' => $user]) }}"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="avatar">Аватар пользователя</label>
                    <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
                    >
                        @if($user->avatar)
                            <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                                 style="width: 200px;">
                        @else
                            <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                        @endif
                    </div>
                    <input type="file" id="avatar" name="avatar" class="form-control" style="width: 500px;">
                </div>
                <div class="form-group">
                    <label for="title">Имя пользователя</label>
                    <input type="text"
                           id="name"
                           name="name"
                           @error('name')
                           style="border: red 1px solid; width: 500px;"
                           @enderror
                           class="form-control"
                           style="width: 500px;"
                           autocomplete="off"
                           value="{{ $user->name }}">
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">E-Mail адрес</label>
                    <input type="text"
                           id="email"
                           name="email"
                           @error('email')
                           style="border: red 1px solid; width: 500px;"
                           @enderror
                           class="form-control"
                           style="width: 500px;"
                           autocomplete="off"
                           value="{{ $user->email }}">
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">Рейтинг пользователя</label>
                    <div style="display: flex;">
                        <input type="number"
                               id="rating"
                               name="rating"
                               max="{{ $count }}"
                               min="0"
                               @error('rating')
                               style="border: red 1px solid; width: 100px; margin-top: 2px;"
                               @enderror
                               class="form-control"
                               style="width: 100px; margin-top: 2px;"
                               autocomplete="off"
                               value="{{ $user->rating }}">
                        <p style="margin-left: 10px; width: 450px; font-size: 14px">максимальный рейтинг не может
                            превышать
                            количество опубликованных тем({{ $count }}шт.)</p>
                    </div>
                    @if($errors->has('rating'))
                        @foreach($errors->get('rating') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <label>Права администратора</label>
                <div style="display: flex; flex-direction: column">
                    <div class="form_radio_btn_1 button_1">
                        <x-input type="radio" name="is_admin" id="1"
                                 value="1"/>
                        <label for="1">да</label>
                    </div>
                    <div class="form_radio_btn_1 button_1">
                        <x-input type="radio" name="is_admin" id="0"
                                 value="0" checked/>
                        <label for="0">нет</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a
                    href="{{ $previous }}"
                    style="height: 30px;
                           margin-left: 20px;
                           min-width: 100px;
                           padding: 8px;
                           background-color: #cbcb0c;
                           text-decoration: none;
                           color: white;
                           border-radius: 8px;"
                >
                    назад
                </a>
            </form>
        </div>
    </div>

@endsection
