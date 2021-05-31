<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        {{--        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            Сроки проведения программы льготной ипотеки
                        </div>
                    </div>
                </div>--}}
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                <img src="img/exam.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="items-center inline-flex">

                        <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                            27 мая 2021</h5>
                    </div>
                    <p class="card-text font-medium font-semibold text-center">Сроки проведения программы льготной
                        ипотеки</p>
                    {{--<a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent">Пройти тему</a>--}}
                    <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6" href="{{ route('home') }}">
                        {{ __('Пройти тему') }}
                    </x-btn-link>
                </div>
            </div>
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                <img src="img/exam.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="items-center inline-flex">

                        <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                            27 мая 2021</h5>
                    </div>
                    <p class="card-text font-medium font-semibold text-center">Сроки проведения программы льготной и другой текст
                        ипотеки</p>
                    {{--<a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent">Пройти тему</a>--}}
                    <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6" href="{{ route('home') }}">
                        {{ __('Пройти тему') }}
                    </x-btn-link>
                </div>
            </div>
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                <img src="img/exam.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="items-center inline-flex">

                        <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                            27 мая 2021</h5>
                    </div>
                    <p class="card-text font-medium font-semibold text-center">Сроки проведения программы льготной
                        ипотеки</p>
                    {{--<a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent">Пройти тему</a>--}}
                    <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6" href="{{ route('home') }}">
                        {{ __('Пройти тему') }}
                    </x-btn-link>
                </div>
            </div>
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                <img src="img/exam.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="items-center inline-flex">

                        <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                            27 мая 2021</h5>
                    </div>
                    <p class="card-text font-medium font-semibold text-center">Сроки проведения программы льготной и другой текст
                        ипотеки</p>
                    {{--<a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent">Пройти тему</a>--}}
                    <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6" href="{{ route('home') }}">
                        {{ __('Пройти тему') }}
                    </x-btn-link>
                </div>
            </div>
        </div>
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>

</x-app-layout>
