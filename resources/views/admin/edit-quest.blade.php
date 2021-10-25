@extends('layouts.admin-main')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="width: 400px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <p style="font-size: 18px; margin-top: 10px;">Редактировать вопрос</p>
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
                  action="{{ route('admin.questions.update', ['question' => $question]) }}"
            >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Тема</label>
                    <div>
                        @forelse($themes as $theme)
                            @if($theme->id == $question->theme_id)
                                <h3>{{ $theme->title }}</h3>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <input type="hidden"
                       id="theme_id"
                       name="theme_id"
                       value="{{ $question->theme_id }}">
                <input type="hidden"
                       id="id"
                       name="id"
                       value="{{ $question->id }}">
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
                           value="{{ $question->text }}">
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
                           value="{{ $question->answer_1 }}">
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
                           value="{{ $question->answer_2 }}">
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
                           value="{{ $question->answer_3 }}">
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
                           value="{{ $question->answer_4 }}">
                    @if($errors->has('answer_4'))
                        @foreach($errors->get('answer_4') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <input type="hidden"
                       id="quest_number"
                       name="quest_number"
                       value="{{ $question->quest_number }}">
                <input type="hidden"
                       id="correct_answer"
                       name="correct_answer"
                       value="{{ $question->correct_answer }}">
                <br>
                <button type="submit" class="btn btn-success">Продолжить</button>
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
