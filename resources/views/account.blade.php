<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ <span class="stat_name">{{ $user->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12 justify-center justify-between">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">

            <div>
                <h2>Данные пользователя</h2>
                <br>
                <div class="block_f_msgs">
                    @if(session()->has('success'))
                        <div class="success_msgs">{{session()->get('success')}}</div>
                    @elseif(session()->has('error'))
                        <div class="fail_msgs">{{session()->get('fail')}}</div>
                    @endif
                </div>
                <br>
                <p>Имя пользователя</p>
                <h3>{{ $user->name }}</h3>
                <br>
                <p>E-Mail адрес</p>
                <h3>{{ $user->email }}</h3>
                <br>
                <p>Дата регистрации на сайте</p>
                <h3>{{ $user->created_at }}</h3>
                <br>
                <p>Дата последнего обновления профиля</p>
                <h3>{{ $user->updated_at }}</h3>
                <br>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div>Ваши обращения({{ $count }}шт.)</div>
                        <div>Выполнено ({{ $ready }}шт.)</div>
                        <div>Ожидает назначения ответственного ({{ $in_waiting }}шт.)</div>
                        <div>В работе ({{ $in_process }}шт.)</div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text_in_tbl border_f_tbl">#ID</th>
                                        <th class="stl_f_title_in_tbl border_f_tbl">тип обращения</th>
                                        <th class="text_in_tbl update_in_tbl border_f_tbl">объект обращения</th>
                                        <th class="text_in_tbl update_in_tbl border_f_tbl">дата создания</th>
                                        <th class="text_in_tbl update_in_tbl border_f_tbl">дата обновления</th>
                                        <th class="text_in_tbl update_in_tbl border_f_tbl">статус</th>
                                        <th style="width: 150px;" class="text_in_tbl">ответственный</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($messages as $message)
                                        <tr>
                                            <td class="text_in_tbl border_f_tbl">{{ $message->id }}</td>
                                            <td class="stl_f_title_in_tbl border_f_tbl">{{  $message->problem_theme }}</td>
                                            <td class="stl_f_title_in_tbl border_f_tbl">{{  $message->theme_title }}</td>
                                            <td class="text_in_tbl update_in_tbl border_f_tbl">{{  $message->created_at->format('d F Y') }}</td>
                                            <td class="text_in_tbl update_in_tbl border_f_tbl">{{  $message->updated_at->format('d F Y') }}</td>
                                            <td class="text_in_tbl update_in_tbl border_f_tbl">{{  $message->status }}</td>
                                            <td style="width: 150px;" class="text_in_tbl">{{ $message->curator }}</td>
                                        </tr>
                                    @empty
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex">
                    <div>
                        <a href="{{ route('account.edit', ['account' => $user->id]) }}">

                            Настройки профиля

                        </a>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Выход') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
