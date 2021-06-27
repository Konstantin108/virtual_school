@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Редактирование данных</p>
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
                <form
                    method="post"
                    action="{{ route('adminUpdate', ['id' => $user->id]) }}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="avatar">Аватар</label>
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
                        <label for="title">Имя</label>
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
    @else
        <div>Аккаунт администратора с заданным ID не найден</div>
    @endif

@endsection
