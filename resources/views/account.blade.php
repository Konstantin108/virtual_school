<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight uppercase">
            ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">

            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4">
                <div class="block_f_msgs">
                    @if(session()->has('success'))
                        <div class="success_msgs">{{session()->get('success')}}</div>
                    @elseif(session()->has('error'))
                        <div class="fail_msgs">{{session()->get('fail')}}</div>
                    @endif
                </div>
                <br>
                <p class="card-text font-medium font-semibold">Имя пользователя:</p>
                <h3 class="card-text font-medium font-semibold">{{ $user->name }}</h3>
                <br>
                <p class="card-text font-medium font-semibold">E-mail:</p>
                <h3 class="card-text font-medium font-semibold">{{ $user->email }}</h3>
                <br>
                <p class="card-text font-medium font-semibold">Дата регистрации</p>
                <h3 class="card-text font-medium font-semibold">{{ $user->created_at }}</h3>
                <br>
                <p class="card-text font-medium font-semibold">Дата обновления профиля</p>
                <h3>{{ $user->updated_at }}</h3>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div>Ваши обращения({{ $count }}шт.)</div>
                        <div>Выполнено ({{ $ready }}шт.)</div>
                        <div>Ожидает назначения ответственного ({{ $in_waiting }}шт.)</div>
                        <div>В работе ({{ $in_process }}шт.)</div>
                    </div>
                </div>
                <x-btn-link class="btn btn-primary sm:m-2 lg:m-6"
                            href="{{ route('account.edit', ['account' => $user->id]) }}">
                    {{ __('Настройка профиля') }}
                </x-btn-link>
            </div>

        </div>
    </div>

</x-app-layout>
