<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center font-bold leading-tight">
            РАБОТА С ОБРАЩЕНИЕМ
        </h2>
    </x-slot>
    @if($message->user_id == Auth::user()->id)
        <div class="py-12">
            <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <form
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                        method="post"
                        action="{{ route('userMessageUpdate', ['id' => $message->id ]) }}"
                    >
                        @csrf
                        @method('POST')
                        <div class="p-6 bg-gray-100 border-b border-gray-200" style="text-align: center">
                            Обращение #ID{{ $message->id }}
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <td style="width: 180px; padding-left: 10px; padding-top: 10px;">
                                    Тип обращения
                                </td>
                                <td style="padding-top: 10px; padding-right: 10px;">
                                    {{ $message->problem_theme }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Касается темы
                                </td>
                                <td style="padding-right: 10px;">
                                    {{ $message->theme_title }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Текст обращения
                                </td>
                                <td style="padding-right: 10px;">
                                    {{ $message->text }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Дата создания
                                </td>
                                <td style="padding-right: 10px;">
                                    {{ $message->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Дата обновления
                                </td>
                                <td style="padding-right: 10px;">
                                    {{ $message->updated_at }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Статус
                                </td>
                                <td style="padding-right: 10px;">
                                    @if($message->status == 'ожидание')
                                        ожидает назначения ответственного лица
                                    @elseif($message->status == 'в работе')
                                        обращение на исполнении
                                    @elseif($message->status == 'выполнено')
                                        обращение исполнено
                                    @elseif($message->status == 'закрыто')
                                        обращение закрыто
                                    @elseif($message->status == 'отозвано')
                                        отозвано пользователем
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px; padding-left: 10px;">
                                    Ответственный
                                </td>
                                <td style="padding-right: 10px;">
                                    @if($message->curator)
                                        {{ $message->curator }}
                                    @else
                                        отсутствует
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="padding: 10px; display: flex; justify-content: center">
                            @if($message->status == 'закрыто' || $message->status == 'отозвано')
                            @elseif($message->status == 'выполнено')
                                <div class="form_radio_btn_4">
                                    <input type="radio"
                                           name="status"
                                           id="closed"
                                           value="закрыто">
                                    <label for="closed">подтвердить</label>
                                </div>
                                <div class="form_radio_btn_4">
                                    <input type="radio"
                                           name="status"
                                           id="in_process"
                                           value="в работе">
                                    <label for="in_process">вернуть в работу</label>
                                </div>
                            @elseif($message->status == 'в работе' || $message->status == 'ожидание')
                                <div class="form_radio_btn_4">
                                    <input type="radio"
                                           name="status"
                                           id="cancel"
                                           value="отозвано">
                                    <label for="cancel">отозвать</label>
                                </div>
                            @endif
                        </div>
                        <div style="padding: 10px; display: flex; justify-content: center">
                            @if($message->status == 'закрыто' || $message->status == 'отозвано')
                            @else
                                <button type="submit" style="padding: 6px;
                                          background-color: #2e2f37;
                                          color: white;
                                          margin-right: 12px;
                                          outline: none;
                                          border-radius: 8px">
                                    сохранить
                                </button>
                            @endif
                            <a href="{{ route('account.index') }}" style="padding: 6px;
                                          background-color: #2e2f37;
                                          color: white;
                                          border-radius: 8px">
                                вернуться
                            </a>
                        </div>
                    </form>
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
    @else
        <div class="py-12">
            <div class="flex max-w-7xl mx-auto sm:p-4 lg:p-8 flex-wrap justify-center">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-gray-100 border-b border-gray-200" style="text-align: center">
                            Данные не найдены
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
