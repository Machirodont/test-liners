@extends('layouts.app')
@vite('resources/js/app.js')
@section('title', 'Edit Ship: ' . $ship->title)

@section('content')
    <h1>Редактировать лайнер: {{ $ship->title }}</h1>

    <form action="{{ route('ships.update', $ship->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('form.input_text', ['label'=>'Title', 'name'=>'title', 'model' => $ship])
        @include('form.textarea', ['label'=>'Описание', 'name'=>'description', 'model' => $ship])
        @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering', 'model' => $ship])
        @include('form.select', ['label'=>'Активный', 'name'=>'state', 'model' => $ship, 'options'=> ['0'=>'Нет', '1'=>'Да']])

        <div>
            <table class="min-w-full table-auto border-collapse">
                <tbody id="params-table">
                @foreach($ship->spec as $spec)
                    @php
                        $lineCode = md5($spec['name'].$spec['value']);
                    @endphp
                    <tr class="border-b" id="{{$lineCode}}">
                        <td class="px-4 py-2">
                            <input type="text" name="spec[{{$lineCode}}][name]" value="{{$spec['name']}}" required class="w-full p-2 border border-gray-300 rounded-md">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" name="spec[{{$lineCode}}][value]" value="{{$spec['value']}}" required class="w-full p-2 border border-gray-300 rounded-md">
                        </td>
                        <td>
                            <button
                                data-id="{{$lineCode}}"
                                class="remove-button bg-red-500 text-white p-2 rounded-full font-bold text-xl hover:bg-red-600 focus:outline-none">
                                -
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @error('spec')
            <div class="error">{{ $message }}</div>
            @enderror
            <button
                class="add-button bg-green-500 text-white rounded-full font-bold text-small hover:bg-red-600 focus:outline-none">
                Добавить параметр
            </button>
        </div>
        <br><br>
        @include('form.submit', ['title'=>'Сохранить изменения'])
    </form>

    <a href="{{ route('ships.show', $ship->id) }}">Back to Ship</a>
@endsection
