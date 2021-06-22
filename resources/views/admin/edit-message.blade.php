@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Работа с обращением</p>
                            </div>
                        </div>
                        <i class="fas fa-envelope-open-text fa-2x text-gray-200"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-2">
            <form method="post" action="{{ route('admin.messages.update', ['message' => $message]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="problem_theme">Тип проблемы</label>
                    <div class="form-control">
                        <p>{{ $message->problem_theme }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div style="display: flex;
                            width: 520px;
                            height: 60px;
                            justify-content: space-around;
                            align-items: center;
                            border-radius: 8px;
                            border: 1px solid grey;
                            padding: 10px;
                    ">
                        <div style="display: flex; padding-top: 5px;">
                            <label for="user_name">Пользователь:&nbsp;&nbsp;</label>
                            <b><span>{{ $message->user_name }}</span></b>
                        </div>
                        <div style="display: flex; padding-top: 5px;">
                            <label for="user_id">ID пользователя:&nbsp;&nbsp;</label>
                            <b><span>{{ $message->user_id }}</span></b>
                        </div>
                        <a href="#">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="theme_title">Проблема с темой</label>
                    <div class="form-control">
                        <p>{{ $message->theme_title }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text">Текст обращения</label>
                    <div style="min-height: 30px;
                                background-color: white;
                                padding-left: 10px;
                                border: 1px solid grey;
                                border-radius: 8px;
                        ">
                        {{ $message->text }}
                    </div>
                </div>
                <div style="display: flex; height: 80px; width: 560px; justify-content: space-between">
                    <div class="form-group">
                        <label for="created_at">Дата заведения</label>
                        <p>{{ $message->created_at }}</p>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Дата обновления</label>
                        <p>{{ $message->updated_at }}</p>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Статус обращения</label>
                        @if($message->status == 'ожидание')
                            <p style="color: indianred">ожидает назначения</p>
                        @elseif($message->status == 'в работе')
                            <p style="color: blue">в работе</p>
                        @else
                            <p style="color: green">обращение закрыто</p>
                        @endif
                    </div>
                </div>
                <input type="hidden" value="{{ $curator->name }}" id="curator" name="curator">
                <input type="hidden" value="{{ $curator->id }}" id="curator_id" name="curator_id">
                <br>
                <div style="display: flex; flex-direction: column">
                    @if(!$message->curator)
                        <div class="form_radio_btn_1 button_1">
                            <x-input type="radio" name="status" id="published"
                                     value="в работе" checked/>
                            <label for="published">взять в работу</label>
                        </div>
                    @else
                        <div class="form_radio_btn_1 button_1">
                            <x-input type="radio" name="status" id="published"
                                     value="в работе" checked/>
                            <label for="published">вернуть в работу</label>
                        </div>
                    @endif
                    <div class="form_radio_btn_1 button_1">
                        <x-input type="radio" name="status" id="draft"
                                 value="закрыто"/>
                        <label for="draft">закрыть обращение</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a
                    href="{{ route('admin.messages.index') }}"
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
