<?php
/** @var \App\Models\CabinCategory $cabinCategory */

use App\Enums\CabinCategoryTypeEnum;
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Изменить тип каюты</h1>
        <div>Корабль: <a href="{{ route('ships.show', ['ship' => $cabinCategory->ship->id]) }}">{{$cabinCategory->ship->title}}</a> </div>
        <form action="{{ route('cabin_category.update', ['cabin_category_id' => $cabinCategory->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" id="cabin_category_id" name="cabin_category_id" value="{{ $cabinCategory->id }}">

            @include('form.input_text', ['label'=>'vendor_code', 'name'=>'vendor_code', 'model' => $cabinCategory])
            @include('form.input_text', ['label'=>'Название', 'name'=>'title', 'model' => $cabinCategory])
            @include('form.select', ['label'=>'Тип', 'name'=>'type', 'model' => $cabinCategory, 'withNull'=> true,  'options'=> array_combine(CabinCategoryTypeEnum::values(), CabinCategoryTypeEnum::values())])
            @include('form.textarea', ['label'=>'Описание', 'name'=>'description', 'model' => $cabinCategory])
            @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering', 'model' => $cabinCategory])
            @include('form.select', ['label'=>'Активна', 'name'=>'state', 'model' => $cabinCategory, 'options'=> ['0'=>'Нет', '1'=>'Да']])

            <div class="mt-6">
                @include('form.submit', ['title'=>'Сохранить'])
                <a href="{{ route('ships.show', ['ship' => $cabinCategory->ship_id]) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>
        </form>
    </div>
@endsection
