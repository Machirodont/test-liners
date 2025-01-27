<?php
/** @var \App\Models\CabinCategory $cabinCategory */
?>


@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Изменить тип каюты</h1>
        <form action="{{ route('cabin_category.update', ['cabin_category_id' => $cabinCategory->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" id="cabin_category_id" name="cabin_category_id" value="{{ $cabinCategory->id }}" required>

            <div class="mb-4">
                <label for="vendor_code" class="block text-sm font-medium text-gray-700">vendor_code</label>
                <input type="text" id="vendor_code" name="vendor_code" value="{{ old('vendor_code', $cabinCategory->vendor_code) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" id="title" name="title" value="{{ old('title', $cabinCategory->title) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">

                <label for="type" class="block text-sm font-medium text-gray-700">Тип {{$cabinCategory->type}}</label>
                <select id="type" name="type" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                    <option value="" {{ old('type', $cabinCategory->type) === null ? 'selected' : '' }}>Не выбрано</option>
                    @foreach(\App\Enums\CabinCategoryTypeEnum::values() as $type)
                        <option value="{{ $type }}" {{ (old('type', $cabinCategory->type) === $type ? 'selected' : '') }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea id="description" name="description" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">{{ old('description', $cabinCategory->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="ordering" class="block text-sm font-medium text-gray-700">Порядок</label>
                <input type="number" id="ordering" name="ordering" value="{{ old('ordering', $cabinCategory->ordering) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="state" class="inline-flex items-center">
                    <input type="checkbox" id="state" name="state" value="1" {{ old('state') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700">Активна</span>
                </label>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Сохранить
                </button>
                <a href="{{ route('ships.show', ['ship' => $cabinCategory->ship_id]) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>

        </form>
    </div>
@endsection
