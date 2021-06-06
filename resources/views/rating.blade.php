<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center leading-tight">
            {{ __('КУРСЫ ПОВЫШЕНИЯ КВАЛИФИКАЦИИ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Рейтинг!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse($users as $user)
                        <div>{{ $user->name }}</div>
                        <div>{{ $user->rating }}</div>
                    @empty
                        <div class="card border uppercase bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4" style="width: 18rem;">
                            пользователи отсутствуют
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
