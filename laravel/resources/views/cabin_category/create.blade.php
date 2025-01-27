@php use App\Enums\CabinCategoryTypeEnum; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Добавить тип каюты</h1>
        <div>Корабль: <a href="{{ route('ships.show', ['ship' => $ship->id]) }}">{{$ship->title}}</a> </div>
        <form action="{{ route('cabin_category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" id="ship_id" name="ship_id" value="{{ old('ship_id', $ship->id ?? '') }}">
            @include('form.input_text', ['label'=>'vendor_code', 'name'=>'vendor_code'])
            @include('form.input_text', ['label'=>'Название', 'name'=>'title'])
            @include('form.select', ['label'=>'Тип', 'name'=>'type', 'withNull'=> true, 'options'=> array_combine(CabinCategoryTypeEnum::values(), CabinCategoryTypeEnum::values())])
            @include('form.textarea', ['label'=>'Описание', 'name'=>'description'])
            @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering'])
            @include('form.select', ['label'=>'Активна', 'name'=>'state', 'options'=> ['0'=>'Нет', '1'=>'Да']])

            <div class="mt-6">
                @include('form.submit', ['title'=>'Создать'])
                <a href="{{ route('ships.show', ['ship' => $ship->id ?? '']) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>

        </form>
    </div>
@endsection
