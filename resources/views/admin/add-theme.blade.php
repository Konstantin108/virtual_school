@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Добавить тему</p>
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
            <form method="post" action="{{ route('admin.themes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text"
                           id="title"
                           name="title"
                           @error('title')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('title')}}">
                    @if($errors->has('title'))
                        @foreach($errors->get('title') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Содержание темы</label>
                    <textarea type="text"
                              id="text"
                              name="text"
                              class="form-control">{{ old('text') }}
                        </textarea>
                    @if($errors->has('text'))
                        @foreach($errors->get('text') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <label>Статус</label>
                <div style="display: flex; flex-direction: column">
                    <div style="color: red">для публикации темы необходимо добавить минимум 2 проверочных вопроса</div>
                    {{--                    <div class="form_radio_btn_1 button_1">--}}
                    {{--                        <x-input type="radio" name="status" id="published"--}}
                    {{--                                 value="published"/>--}}
                    {{--                        <label for="published">тема опубликована</label>--}}
                    {{--                    </div>--}}
                    <div class="form_radio_btn_1 button_1">
                        <x-input type="radio" name="status" id="draft"
                                 value="draft" checked/>
                        <label for="draft">тема на модерации</label>
                    </div>
                    <div class="form_radio_btn_1 button_1">
                        <x-input type="radio" name="status" id="blocked"
                                 value="blocked"/>
                        <label for="blocked">тема заблокирована</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a
                    href="{{ route('admin.themes.index') }}"
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
