<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            @forelse($themes as $theme)
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                    <img src="img/exam.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="items-center inline-flex">

                            <h5 class="card-title uppercase font-semibold text-center text-green-300 text-4xl font-bold sm:px-6">
                                {{ $theme->created_at->format('d F Y') }}
                            </h5>
                        </div>
                        <p class="card-text font-medium font-semibold text-center">{{ $theme->title }}</p>
                        <x-btn-link class="btn btn-primary ml-3 sm:m-2 lg:m-6"
                                    href="{{ route('themes.show', ['id' => $theme->id])}}">
                            {{ __('Пройти тему') }}
                        </x-btn-link>
                    </div>
                </div>
            @empty
                <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                    темы отсутствуют
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
