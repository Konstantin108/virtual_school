<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 36rem;">
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
                            <div class="sm:m-2 lg:m-6 p-2 bg-green-200">
                                <x-input type="radio" name="answer" id="answer_1"
                                         value="{{ $quest->answer_1 }}"/>{{ $quest->answer_1 }}
                            </div>
                            <div class="sm:m-2 lg:m-6 p-2 bg-gray-300 m-4">
                                <x-input type="radio" name="answer" id="answer_2"
                                         value="{{ $quest->answer_2 }}"/>{{ $quest->answer_2 }}
                            </div>
                            <div class="sm:m-2 lg:m-6 p-2 bg-yellow-300">
                                <x-input type="radio" name="answer" id="answer_3"
                                         value="{{ $quest->answer_3 }}"/>{{ $quest->answer_3 }}
                            </div>
                            <div class="sm:m-2 lg:m-6 p-2 bg-blue-300">
                                <x-input type="radio" name="answer" id="answer_4"
                                         value="{{ $quest->answer_4 }}"/>{{ $quest->answer_4 }}
                            </div>
                            <div>
                                <x-input type="hidden" name="correctAnswer" id="correct_answer"
                                         value="{{ $quest->correct_answer }}"/>
                            </div>
                            <input type="hidden" value="{{ $quest->text }}" id="text" name="text">
                            <x-button class="m-2">
                                {{ __('Ответить') }}
                            </x-button>

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
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
