<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('АРХИВ ИЗУЧЕННЫХ ТЕМ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">

            @foreach($themes as $theme)
                @if(in_array($theme->id, $completedItems))
                    <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4"
                         style="width: 18rem; position: relative; height: 520px;"
                    >
                        <img src="img/exam.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="items-center inline-flex">
                                <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                                    {{ $theme->created_at->format('d F Y') }}
                                </h5>
                            </div>
                            <p class="card-text font-medium font-semibold text-center">{{ $theme->title }}</p>
                            <x-btn-link class="btn btn-primary sm:m-2 lg:m-6"
                                        style="position: absolute; bottom: 26px; left: 50px;"
                                        href="{{ route('themes.show', ['id' => $theme->id])}}"
                            >
                                {{ __('Повторить') }}
                            </x-btn-link>
                            <div style="position: absolute; right: 10px; bottom: 6px;">
                                <i class="fas fa-check"
                                   style="color: forestgreen"
                                >
                                </i> тема изучена
                            </div>

                        </div>
                    </div>
                @endif
                    @if(count($completedItems) < 1)
                        <div class="py-12" style="width: 100%;">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                                        Нет изученных тем
                                    </div>
                                </div>
                            </div>
                        </div>
                        @break
                    @endif
            @endforeach

        </div>
    </div>

</x-app-layout>
