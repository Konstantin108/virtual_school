<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight uppercase">
            РЕДАКТИРОВАНИЕ ПРОФИЛЯ
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="card border bg-red-100 sm:px-6 sm:m-2 lg:px-8 lg:m-4">
                <form method="post" action="{{ route('account.update', ['account' => $user]) }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label class="sm:m-2 lg:m-6" for="name" :value="__('Имя пользователя')"/>
                        <input
                               type="text"
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
                        <x-label class="sm:m-2 lg:m-6"  for="email" :value="__('E-Mail адрес')"/>
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

                    <x-button class="ml-4" type="submit">Сохранить</x-button>
                    <x-btn-link class="sm:m-2 lg:m-6" href="{{ route('account.index') }}">
                        {{ __('Вернуться') }}
                    </x-btn-link>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
