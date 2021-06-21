<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            РЕДАКТИРОВАНИЕ ПРОФИЛЯ<span class="stat_name"></span>
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <form method="post" action="{{ route('account.update', ['account' => $user]) }}">
                @csrf
                @method('PUT')
                <div>
                    <p>Имя пользователя</p>
                    <input type="text"
                           id="name"
                           name="name"
                           @error('name')
                           style="border: red 1px solid;"
                           @enderror
                           autocomplete="off"
                           value="{{ $user->name }}"
                    >
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <div>
                    <p>E-Mail адрес</p>
                    <input type="text"
                           id="email"
                           @error('email')
                           style="border: red 1px solid;"
                           @enderror
                           name="email"
                           autocomplete="off"
                           value="{{ $user->email }}"
                    >
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
                <input type="hidden" id="password" name="password" value="{{ $user->password }}">
                <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                <div style="display: flex">
                    <button type="submit">Сохранить</button>
                    <a href="{{ route('account.index') }}">Назад</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
