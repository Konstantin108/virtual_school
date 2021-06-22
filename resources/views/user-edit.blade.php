<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight uppercase">
            РЕДАКТИРОВАНИЕ ПРОФИЛЯ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200" style="text-align: center">
                        Данные пользователя
                    </div>

                    <form method="post" action="{{ route('account.update', ['account' => $user]) }}"
                          style="display: flex; padding: 10px; height: 280px;"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                Имя пользователя
                                <p>
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
                                </p>
                            </div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                E-Mail адрес
                                <p>
                                    <input type="text"
                                           id="email"
                                           @error('email')
                                           style="border: red 1px solid;"
                                           @enderror
                                           name="email"
                                           autocomplete="off"
                                           value="{{ $user->email }}"
                                    >
                                </p>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="display: flex; justify-content: center; align-items: center">
                                <img src="{{\Storage::disk('public')->url($user->avatar)}}"
                                     alt="avatar"
                                     style="width: 140px"
                                >

                            </div>
                            <input type="file" id="avatar" name="avatar" class="form-control">
                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        width: 300px;
                                        height: 40px;"
                            >
                                <input type="hidden" id="password" name="password" value="{{ $user->password }}">
                                <input type="hidden" id="id" name="id" value="{{ $user->id }}">

                                <x-button class="ml-4" type="submit">Сохранить</x-button>
                                <x-btn-link class="sm:m-2 lg:m-6" href="{{ route('account.index') }}">
                                    {{ __('Вернуться') }}
                                </x-btn-link>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


</x-app-layout>
