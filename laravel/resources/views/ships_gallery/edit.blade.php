@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Редактировать изображение в галерее</h1>

        <form action="{{ route('ships_gallery.update', ['ships_gallery_id' => $shipGallery->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-g$ray-700">Название изображения</label>
                <input type="text" id="title" name="title" value="{{ old('title', $shipGallery->title) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Ordering -->
            <div class="mb-4">
                <label for="ordering" class="block text-sm font-medium text-gray-700">Порядок</label>
                <input type="number" id="ordering" name="ordering" value="{{ old('ordering', $shipGallery->ordering) }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Сохранить
                </button>
                <a href="{{ route('ships.show', ['ship' => $shipGallery->ship_id]) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>
        </form>
        <br><br>
        <img src="{{$shipGallery->url}}">
    </div>
@endsection
