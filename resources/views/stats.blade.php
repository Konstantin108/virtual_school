<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center leading-tight">
            СТАТИСТИКА ПОЛЬЗОВАТЕЛЯ <span class="stat_name">{{ $name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    Завершено {{ $rate }} из {{ $count }} тем
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text_in_tbl border_f_tbl">#ID</th>
                            <th class="stl_f_title_in_tbl border_f_tbl">тема</th>
                            <th class="text_in_tbl update_in_tbl border_f_tbl">дата назначения</th>
                            <th class="text_in_tbl update_in_tbl border_f_tbl">дата прохождения</th>
                            <th style="width: 150px;" class="text_in_tbl">статус</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($themes as $theme)
                            <tr>
                                <td class="text_in_tbl border_f_tbl">{{ $theme->id }}</td>
                                <td class="stl_f_title_in_tbl border_f_tbl">{{  $theme->title }}</td>
                                <td class="text_in_tbl update_in_tbl border_f_tbl">{{  $theme->created_at->format('d F Y') }}</td>
                                <td class="text_in_tbl update_in_tbl border_f_tbl">
                                    @foreach($allRate as $rateItem)
                                        @if($rateItem->theme_completed_id == $theme->id &&
                                            $rateItem->user_id == $id
                                            )
                                            @if($rateItem->created_at)
                                                {{ $rateItem->created_at->format('d F Y') }}
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td style="width: 150px;" class="text_in_tbl">
                                    @foreach($themeNames as $item)
                                        @if($item == $theme->id)
                                            <i class="fas fa-check"
                                               style="color: forestgreen"
                                            >
                                            </i> тема изучена
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
