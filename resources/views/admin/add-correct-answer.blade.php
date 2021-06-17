@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">добавить ответ</p>
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
                  action="{{ route('saveCorrectAnswer', ['quest' => $quest]) }}"
            >
                @csrf
                <input type="hidden"
                       id="id"
                       name="id"
                       value="{{ $quest->id }}">
                <div class="form-group">
                    <label for="text">Какой из ответов будет верным?</label>
                    <div class="form-control">
                        <p>{{ $quest->text }}</p>
                    </div>
                </div>
                <b>Варианты ответов:</b>
                <br>
                <br>
                <div class="form-group">
                    <label for="answer_1">Вариант ответа №1</label>
                    <div class="form-control">
                        <p>{{ $quest->answer_1 }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_2">Вариант ответа №2</label>
                    <div class="form-control">
                        <p>{{ $quest->answer_2 }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_3">Вариант ответа №3</label>
                    <div class="form-control">
                        <p>{{ $quest->answer_3 }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div for="answer_4">Вариант ответа №4</div>
                    <div class="form-control"><p>{{ $quest->answer_4 }}</p>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <select
                        id="correct_answer"
                        name="correct_answer"
                    >
                        <option value="0">Укажите номер правильного ответа</option>

                        <option value="{{ $quest->answer_1 }}">
                            1
                        </option>
                        <option value="{{ $quest->answer_2 }}">
                            2
                        </option>
                        <option value="{{ $quest->answer_3 }}">
                            3
                        </option>
                        <option value="{{ $quest->answer_4 }}">
                            4
                        </option>
                    </select>
                </div>
                <input type="hidden"
                       id="quest_number"
                       name="quest_number"
                       value="1">
                <input type="hidden"
                       id="text"
                       name="text"
                       value="{{ $quest->text }}">
                <input type="hidden"
                       id="theme_id"
                       name="theme_id"
                       value="{{ $quest->theme_id }}">
                <input type="hidden"
                       id="answer_4"
                       name="answer_4"
                       value="{{ $quest->answer_4 }}">
                <input type="hidden"
                       id="answer_3"
                       name="answer_3"
                       value="{{ $quest->answer_3 }}">
                <input type="hidden"
                       id="answer_2"
                       name="answer_2"
                       value="{{ $quest->answer_2 }}">
                <input type="hidden"
                       id="answer_1"
                       name="answer_1"
                       value="{{ $quest->answer_1 }}">
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

