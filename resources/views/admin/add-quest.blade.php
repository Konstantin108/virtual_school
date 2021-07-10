@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Добавить вопрос</p>
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
            <form method="post"
                  action="{{ route('admin.questions.store') }}"
            >
                @csrf
                <div class="form-group">
                    <label for="theme_id">Тема</label>
                    <br>
                    <select
                        class="form-control"
                        id="theme_id"
                        @error('theme_id')
                        style="border: red 1px solid;"
                        @enderror
                        name="theme_id"
                    >
                        <option value="0">Укажите тему, к которой добавляете вопрос</option>
                        @foreach($themes as $theme)
                            <option value="{{$theme->id}}">
                                #ID{{$theme->id}} | {{$theme->title}}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('theme_id'))
                        @foreach($errors->get('theme_id') as $error)
                            <span
                                style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="text">Вопрос</label>
                    <input type="text"
                           id="text"
                           name="text"
                           @error('text')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('text')}}">
                    @if($errors->has('text'))
                        @foreach($errors->get('text') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <b>Варианты ответов:</b>
                <br>
                <br>
                <div class="form-group">
                    <label for="answer_1">Вариант ответа №1</label>
                    <input type="text"
                           id="answer_1"
                           name="answer_1"
                           @error('answer_1')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('answer_1')}}">
                    @if($errors->has('answer_1'))
                        @foreach($errors->get('answer_1') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="answer_2">Вариант ответа №2</label>
                    <input type="text"
                           id="answer_2"
                           name="answer_2"
                           @error('answer_2')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('answer_2')}}">
                    @if($errors->has('answer_2'))
                        @foreach($errors->get('answer_2') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="answer_3">Вариант ответа №3</label>
                    <input type="text"
                           id="answer_3"
                           name="answer_3"
                           @error('answer_3')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('answer_3')}}">
                    @if($errors->has('answer_3'))
                        @foreach($errors->get('answer_3') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="answer_4">Вариант ответа №4</label>
                    <input type="text"
                           id="answer_4"
                           name="answer_4"
                           @error('answer_4')
                           style="border: red 1px solid;"
                           @enderror
                           class="form-control"
                           autocomplete="off"
                           value="{{old('answer_4')}}">
                    @if($errors->has('answer_4'))
                        @foreach($errors->get('answer_4') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <input type="hidden"
                       id="quest_number"
                       name="quest_number"
                       value="1">
                <input type="hidden"
                       id="correct_answer"
                       name="correct_answer"
                       value="undefined">
                <br>
                <button type="submit" class="btn btn-success">Продолжить</button>
                <a
                    href="{{ route('admin.questions.index') }}"
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
