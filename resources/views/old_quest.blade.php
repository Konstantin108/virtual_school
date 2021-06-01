<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            @forelse ($questions as $quest)
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 36rem;">
                    <img src="/img/questions.png" class="card-img-top sm:w-20 lg:w-40" alt="...">
                    <div class="card-body">
                        <div class="items-center inline-flex">

                            <h2 class="card-title uppercase font-semibold text-center text-gray-800 text-2xl font-bold sm:px-6">
                                {{ $quest->text }}
                            </h2>
                        </div>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6 bg-green-300"
                                    href="{{ route('getNextQuest', [
                                    'id' => $quest->theme_id,
                                    'questNumber' => $quest->quest_number ])}}">
                            {{ $quest->answer_1 }}
                        </x-btn-link>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6 bg-yellow-300"
                                    href="{{ route('getNextQuest', [
                                    'id' => $quest->theme_id,
                                    'questNumber' => $quest->quest_number ])}}">
                            {{ $quest->answer_2 }}
                        </x-btn-link>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6 bg-gray-300"
                                    href="{{ route('getNextQuest', [
                                    'id' => $quest->theme_id,
                                    'questNumber' => $quest->quest_number ])}}">
                            {{ $quest->answer_3 }}
                        </x-btn-link>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6 bg-blue-300"
                                    href="{{ route('getNextQuest', [
                                    'id' => $quest->theme_id,
                                    'questNumber' => $quest->quest_number ])}}">
                            {{ $quest->answer_4 }}
                        </x-btn-link>
                    </div>
                </div>
            @empty
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                    <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6"
                                href="{{ route('themes')}}">
                        {{ __('Перейти к результатам') }}
                    </x-btn-link>
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
