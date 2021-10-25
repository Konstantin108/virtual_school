<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ <span class="stat_name">{{ $user->name }}</span>
        </h2>
    </x-slot>
    <div class="block_f_msgs">

        @if(session()->has('success'))
            <div class="success_msgs">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="fail_msgs">{{session()->get('fail')}}</div>
        @endif

    </div>
    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200" style="text-align: center">
                        Данные пользователя
                    </div>
                    <div style="display: flex; padding: 10px;">
                        <div style="margin-right: 30px;">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                Имя пользователя
                                <b>
                                    <p style="font-size: 21px">{{ $user->name }}</p>
                                </b>
                            </div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                E-Mail адрес
                                <b>
                                    <p style="font-size: 21px">{{  $user->email }}</p>
                                </b>
                            </div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                Дата регистрации на сайте
                                <b>
                                    <p style="font-size: 21px">{{  $user->created_at }}</p>
                                </b>
                            </div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                Дата последнего обновления профиля
                                <b>
                                    <p style="font-size: 21px">{{  $user->updated_at }}</p>
                                </b>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="display: flex; justify-content: center; align-items: center">
                                @if($user->avatar)
                                    <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                                         style="width: 140px;">
                                @else
                                    <img src="img/no_photo.jpg" alt="avatar" style="width: 140px;">
                                @endif
                            </div>
                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        width: 300px;
                                        height: 40px;"
                            >
                                <a href="{{ route('account.edit', ['account' => $user->id]) }}"
                                   style="padding: 6px;
                                          background-color: #2e2f37;
                                          color: white;
                                          border-radius: 8px"
                                >
                                    Настройки профиля
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div style="display: flex; justify-content: space-around;">
                            <div>Ваши обращения ({{ $count }}шт.)</div>
                            <div>Ожидает назначения ответственного ({{ $in_waiting }}шт.)</div>
                            <div>В работе ({{ $in_process }}шт.)</div>
                            <div>Выполнено ({{ $is_done }}шт.)</div>
                            <div>Отозвано ({{ $is_back }}шт.)</div>
                            <div>Закрыто ({{ $ready }}шт.)</div>
                        </div>
                    </div>
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
                                            <a href="{{ route('userMessageEdit', [
                                                        'id' => $message->id
                                                ]) }}" class="acc_link">
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
        </div>
    </div>

</x-app-layout>
