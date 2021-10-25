<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            @if ($theme)
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 36rem;">
                    <img src="/img/library.png" class="card-img-top sm:w-20 lg:w-40" alt="...">
                    <div class="card-body">
                        <div class="items-center inline-flex">
                            <h5 class="card-title uppercase font-semibold font-bold text-center text-green-300 text sm:px-6">
                                {{ $theme->created_at->format('d F Y') }}
                            </h5>
                        </div>
                        <h2 class="card-text font-medium font-semibold text-center font-bold text-2xl ">{{ $theme->title }}</h2>
                        <p class="card-text font-medium font-semibold">{{ $theme->text }}</p>
                        @php
                            $previous = $_SERVER['HTTP_REFERER']
                        @endphp
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6"
                                    href="{{ $previous }}">
                            {{ __('Вернуться к темам') }}
                        </x-btn-link>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6"
                                    href="{{ route('getQuest',  ['id' => $theme->id]) }}">
                            {{ __('Проверочные вопросы') }}
                        </x-btn-link>
                    </div>
                </div>
            @else
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                    данная тема отсутствует
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
