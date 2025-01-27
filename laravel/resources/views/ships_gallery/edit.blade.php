@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Редактировать изображение в галерее</h1>
        <div>Корабль: <a href="{{ route('ships.show', ['ship' => $shipGallery->ship->id]) }}">{{$shipGallery->ship->title}}</a> </div>
        <form action="{{ route('ships_gallery.update', ['ships_gallery_id' => $shipGallery->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            @include('form.input_text', ['label'=>'Название изображения', 'name'=>'title', 'model' => $shipGallery])
            @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering', 'model' => $shipGallery])

            <div class="mt-6">
                @include('form.submit', ['title'=>'Сохранить'])
                <a href="{{ route('ships.show', ['ship' => $shipGallery->ship_id]) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>
        </form>
        <br><br>
        <img src="{{$shipGallery->url}}">
    </div>
@endsection
