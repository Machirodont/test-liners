@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Добавить тип каюты</h1>
        <form action="{{ route('cabin_category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <input type="hidden" id="ship_id" name="ship_id" value="{{ old('ship_id', $ship->id ?? '') }}" readonly class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">

            <div class="mb-4">
                <label for="vendor_code" class="block text-sm font-medium text-gray-700">vendor_code</label>
                <input type="text" id="vendor_code" name="vendor_code" value="{{ old('vendor_code') }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Тип</label>
                <select id="type" name="type" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                    <option value="" {{ old('type') === null ? 'selected' : '' }}>Не выбрано</option>
                    @foreach(\App\Enums\CabinCategoryTypeEnum::values() as $type)
                        <option value="{{ $type }}" @if(old('type') === $type) selected @endif>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea id="description" name="description" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="ordering" class="block text-sm font-medium text-gray-700">Порядок</label>
                <input type="number" id="ordering" name="ordering" value="{{ old('ordering', 9999) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="state" class="inline-flex items-center">
                    <input type="checkbox" id="state" name="state" value="1" {{ old('state') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700">Активна</span>
                </label>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Создать
                </button>
                <a href="{{ route('ships.show', ['ship' => $ship->id ?? '']) }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Отмена
                </a>
            </div>

        </form>
    </div>
@endsection
