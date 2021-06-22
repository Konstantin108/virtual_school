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

                <a href="{{ route('account.edit', ['account' => $user->id]) }}">
                    Настройки профиля
                </a>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div>Ваши обращения({{ $count }}шт.)</div>
                        <div>Выполнено ({{ $ready }}шт.)</div>
                        <div>Ожидает назначения ответственного ({{ $in_waiting }}шт.)</div>
                        <div>В работе ({{ $in_process }}шт.)</div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                            <div class="row">
                                <table class="table table-bordered" style="border: 1px solid black">
                                    <thead>
                                    <tr>
                                        <th class="text_in_tbl border_b_in_acc border_f_tbl">#ID</th>
                                        <th class="border_f_tbl border_b_in_acc type_prob_in_acc text_in_tbl">тип
                                            обращения
                                        </th>
                                        <th class="text_in_tbl border_b_in_acc border_f_tbl text_in_acc">текст
                                            обращения
                                        </th>
                                        <th class="text_in_tbl border_b_in_acc border_f_tbl stat_time_in_acc time_pa_in_acc">
                                            дата создания
                                        </th>
                                        <th class="text_in_tbl border_b_in_acc border_f_tbl stat_time_in_acc time_pa_in_acc">
                                            дата
                                            обновления
                                        </th>
                                        <th class="text_in_tbl border_b_in_acc border_f_tbl stat_w_in_acc">статус</th>
                                        <th class="text_in_tbl border_b_in_acc stat_w_in_acc">ответственный</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($messages as $message)
                                        <tr>
                                            <td class="text_in_tbl border_f_tbl border_b_in_acc">{{ $message->id }}</td>
                                            <td class="border_f_tbl border_b_in_acc type_prob_in_acc text_in_tbl">
                                                @if($message->problem_theme == 'Неточность, ошибки в учебном материале')
                                                    Ошибка в материалах
                                                @else
                                                    {{  $message->problem_theme }}
                                                @endif
                                            </td>
                                            <td class="text_in_tbl border_f_tbl border_b_in_acc text_in_acc">
                                                <a href="#" class="acc_link">
                                                    {{  $message->text }}
                                                </a>
                                            </td>
                                            <td class="text_in_tbl border_f_tbl border_b_in_acc stat_time_in_acc"
                                                time_pa_in_acc>{{  $message->created_at->format('d F Y') }}</td>
                                            <td class="text_in_tbl border_f_tbl border_b_in_acc stat_time_in_acc time_pa_in_acc">{{  $message->updated_at->format('d F Y') }}</td>
                                            <td class="text_in_tbl border_f_tbl border_b_in_acc stat_w_in_acc">{{  $message->status }}</td>
                                            <td class="text_in_tbl border_b_in_acc stat_w_in_acc">
                                                @if($message->curator)
                                                    {{ $message->curator }}
                                                @else
                                                    не назначен
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td>Здесь пока ничего нет</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforelse

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Выйти из аккаунта') }}
                    </x-dropdown-link>
                </form>

            </div>

        </div>
    </div>

</x-app-layout>
