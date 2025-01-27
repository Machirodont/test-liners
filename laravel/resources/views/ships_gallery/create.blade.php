@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Добавить изображение в галерею</h1>
        <div>Корабль: <a href="{{ route('ships.show', ['ship' => $ship->id]) }}">{{$ship->title}}</a> </div>
        <form action="{{ route('ships_gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <input type="hidden" id="ship_id" name="ship_id" value="{{ $ship->id }}">
            @error('ship_id')
            <div class="error">{{ $message }}</div>
            @enderror

            @include('form.input_text', ['label'=>'Название изображения', 'name'=>'title'])

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">Изображение</label>
                <input type="file" id="url" name="url" value="{{ old('url') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering'])

            <div class="mt-6">
                @include('form.submit', ['title'=>'Создать'])
                <a href="{{ route('ships.show', ['ship' => $ship->id]) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>
        </form>
    </div>
@endsection
