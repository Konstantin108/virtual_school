<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('СПИСОК ТЕМ К ИЗУЧЕНИЮ') }}
        </h2>
    </x-slot>
    <div class="block_f_msgs">
        @if(session()->has('success'))
            <div class="success_msgs">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="fail_msgs">{{session()->get('fail')}}</div>
        @endif
    </div>
    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4"
                 style="width: 18rem; position: relative; height: 520px; background-color: orange"
            >
                <img src="img/test.png" class="card-img-top" alt="test" style="margin-top: 14px; margin-bottom: 20px">
                <div class="card-body">
                    <div class="items-center inline-flex">
                        <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                            &emsp;архив
                        </h5>
                    </div>
                    <p class="card-text font-medium font-semibold text-center">Здесь хранятся уже пройденные темы</p>
                    <x-btn-link class="btn btn-primary sm:m-2 lg:m-6"
                                style="position: absolute; bottom: 26px; left: 40px;"
                                href="{{ route('completedThemes')}}"
                    >
                        {{ __('Перейти в архив') }}
                    </x-btn-link>

                </div>
            </div>

            @foreach($themes as $theme)
                @if(!in_array($theme->id, $ratingItems))
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
                                {{ __('Пройти тему') }}
                            </x-btn-link>
                        </div>
                    </div>
                @endif
                @if(count($ratingItems) == $count)
                    <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4"
                         style="width: 26rem;
                                position: relative;
                                height: 520px;
                                background-color: #e2e8fe;
                                display: flex;
                                justify-content: center;
                                align-items: center;"
                    >
                        <div class="py-12" style="width: 100%;">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                                        Нет новых тем к изучению
                                    </div>
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
