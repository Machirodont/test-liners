@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Добавить изображение в галерею</h1>
        <form action="{{ route('ships_gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <input type="hidden" id="ship_id" name="ship_id" value="{{ old('ship_id', $ship->id ?? '') }}" readonly class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            @error('ship_id')
            <div class="error">{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Название изображения</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                @error('title')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">URL изображения</label>
                <input type="file" id="url" name="url" value="{{ old('url') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="ordering" class="block text-sm font-medium text-gray-700">Порядок</label>
                <input type="number" id="ordering" name="ordering" value="{{ old('ordering', 999) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Сохранить
                </button>
                <a href="{{ route('ships.show', ['ship' => $ship->id ?? '']) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>
        </form>
    </div>
@endsection
