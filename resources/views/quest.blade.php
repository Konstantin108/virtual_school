<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4"
                 style="width: 36rem; margin-bottom: 16px;">
                <img src="/img/questions.png" class="card-img-top sm:w-20 lg:w-40" alt="...">
                <div class="card-body">
                    @forelse ($questions as $quest)
                        <form method="post"
                              action="{{ route('getNextQuest', [
                                    'id' => $quest->theme_id,
                                    'questNumber' => $quest->quest_number])}}">
                            @csrf
                            @method('POST')

                            <div class="items-center inline-flex">
                                <h2 class="card-title uppercase font-semibold text-center text-gray-800 text-2xl font-bold sm:px-6 mb-2">
                                    {{ $quest->text }}
                                </h2>
                            </div>
                            <div style="display: flex; flex-direction: column">
                                <div class="form_radio_btn button">
                                    <x-input type="radio" name="answer" id="answer_1"
                                             value="{{ $quest->answer_1 }}"/>
                                    <label for="answer_1">{{ $quest->answer_1 }}</label>
                                </div>
                                <div class="form_radio_btn button">
                                    <x-input type="radio" name="answer" id="answer_2"
                                             value="{{ $quest->answer_2 }}"/>
                                    <label for="answer_2">{{ $quest->answer_2 }}</label>
                                </div>
                                <div class="form_radio_btn button">
                                    <x-input type="radio" name="answer" id="answer_3"
                                             value="{{ $quest->answer_3 }}"/>
                                    <label for="answer_3">{{ $quest->answer_3 }}</label>
                                </div>
                                <div class="form_radio_btn button">
                                    <x-input type="radio" name="answer" id="answer_4"
                                             value="{{ $quest->answer_4 }}"/>
                                    <label for="answer_4">{{ $quest->answer_4 }}</label>
                                </div>
                            </div>
                            <x-input type="hidden" name="correctAnswer" id="correct_answer"
                                     value="{{ $quest->correct_answer }}"/>
                            <input type="hidden" value="{{ $quest->text }}" id="text" name="text">
                            <div class="block-for-btn">
                                <x-button class="m-2 hidden showBtn">
                                    {{ __('Ответить') }}
                                </x-button>
                            </div>
                        </form>
                    @empty
                        <div class="items-center mt-4">
                            <h2 class="card-title uppercase text-center font-semibold text-gray-800 text-2xl font-bold sm:px-6">
                                Результат
                            </h2>
                            <h2 class="card-title uppercase font-semibold text-gray-800 text-2xl font-bold sm:px-6">
                                всего ответов - {{ $colOfQuestions ?? '0'}}
                            </h2>
                            <h2 class="card-title uppercase font-semibold text-gray-800 text-2xl font-bold sm:px-6">
                                из них правильных - {{ $value ?? '0'}}
                            </h2>
                        </div>
                        <br>
                        @if($mistakeQuestions)
                            <p class="card-title uppercase font-semibold text-gray-800 text-2xl font-bold sm:px-6">
                                в этих вопросах вы допустили ошибки
                            </p>
                            @forelse ($mistakeQuestions as $mistakeQuest)
                                @forelse($mistakeQuest as $string)
                                    <div>{{ $string }}</div>
                                @empty
                                    <h2>нет ошибок</h2>
                                @endforelse
                            @empty
                                <h3>нет ошибок</h3>
                            @endforelse
                        @endif
                        <div class="block-for-btn">
                            <div class="items-center mt-4">
                                <a href="{{ route('saveResult') }}"
                                   style="color: white;
                                background-color: #2D3748;
                                padding: 6px;
                                border-radius: 10px;
                         "
                                >сохранить результат
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    'use strict';

    let buttons = document.querySelectorAll('.button');

    let showBtnElem = document.querySelector('.showBtn');

    let showBtn = function getShowBtn() {
        showBtnElem.classList.remove('hidden');
    }

    buttons.forEach(function (button) {
        button.addEventListener('click', showBtn)
    });

</script>
