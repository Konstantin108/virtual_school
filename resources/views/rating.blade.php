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
                    Рейтинг пользователей портала
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse($users as $user)
                        <div style="display: flex">
                            <div style="width: 100px;
                                        height: 60px;
                                        border-radius: 20px;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                            ">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div style="width: 200px;
                                        height: 60px;
                                        border-radius: 20px;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                            ">
                                <h3>завершено {{ $user->rating }} из {{ $count }} тем</h3>
                            </div>
                        </div>
                    @empty
                        <div class="card border uppercase bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4"
                             style="width: 18rem;">
                            Пользователи отсутствуют
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
