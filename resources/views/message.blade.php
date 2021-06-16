<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center leading-tight">
            ОБРАТНАЯ СВЯЗЬ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    Если вы нашли неточность в учебных материалах или у вас имеются технические проблемы, напишите
                    нам об этом
                </div>
            </div>
        </div>
        <br>
        <form action="{{ route('message.store') }}"
              method="post"
        >
            @csrf
            @method('POST')
            <input type="hidden" value="{{ Auth::user()->id }}" id="user_id" name="user_id">
            <input type="hidden" value="{{ Auth::user()->name }}" id="user_name" name="user_name">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                        <select
                            id="problem_theme"
                            @error('problem_theme')
                            style="border: red 1px solid;"
                            @enderror
                            name="problem_theme"
                        >
                            <option value="0">Выберите проблему</option>
                            <option value="Неточность, ошибки в учебном материале">Неточность, ошибки в учебном
                                материале
                            </option>
                            <option value="Техническая проблема">Техническая проблема</option>
                        </select>
                        @if($errors->has('problem_theme'))
                            @foreach($errors->get('problem_theme') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                        <select
                            id="theme_title"
                            @error('theme_title')
                            style="border: red 1px solid;"
                            @enderror
                            name="theme_title"
                        >
                            <option value="0">Выберите тему, с которой связана проблема</option>
                            @foreach($themes as $theme)
                                <option value="{{$theme->title}}">       {{$theme->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('theme_title'))
                            @foreach($errors->get('theme_title') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 border-b border-gray-200">
                        Подробно изложите суть проблемы
                        @if($errors->has('text'))
                            @foreach($errors->get('text') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <textarea
                        style="width: 600px;
                        margin-left: 20px;"
                        type="text"
                        name="text"
                        id="text">
                        {{old('text')}}
                    </textarea>
                </div>
                <input type="hidden" value="{{now()}}" name="created_at" id="updated_at">
                <input type="hidden" value="{{now()}}" name="updated_at" id="updated_at">
                <button
                    type="submit"
                    style="color: white;
                       background-color: #2D3748;
                       padding: 6px;
                       border-radius: 10px;
                       margin-top: 14px;
                       outline: none;
                ">
                    Сохранить
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
