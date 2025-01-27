@extends('layouts.app')

@section('title', $ship->title)

@section('content')
    <h1 class="text-3xl font-bold text-center mb-4">{{ $ship->title }}</h1>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('ships.edit', $ship->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
        <form action="{{ route('ships.destroy', $ship->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this ship?')">Delete</button>
        </form>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold">Description</h2>
        <div class="prose lg:prose-xl">{!! $ship->description !!}</div>
    </div>

    <h2 class="text-2xl font-semibold mb-4">Specifications</h2>
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
        <tr>
            <th class="px-4 py-2 border-b">Name</th>
            <th class="px-4 py-2 border-b">Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ship->spec as $spec)
            <tr>
                <td class="px-4 py-2 border-b">{{ $spec['name'] }}</td>
                <td class="px-4 py-2 border-b">{{ $spec['value'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-semibold mt-6 mb-4">Cabins</h2>
    <a href="{{ route('cabin_category.create', ['ship_id'=>$ship->id]) }}" class="inline-block mb-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create Cabin Category</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($ship->cabinCategories as $category)
            @php
                $photo = $category->photos[0] ?? \App\Models\ShipGallery::NO_IMG_PLACEHOLDER;
            @endphp
            <div class="border border-gray-300 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">{{ $category->title }}</h3>
                <img src="{{ $photo }}" alt="{{ $category->title }}" class="w-32 h-32 object-cover mb-4">
                <div class="flex justify-between items-center">
                    <a href="{{ route('cabin_category.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('cabin_category.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this cabin category?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="text-2xl font-semibold mt-6 mb-4">Gallery</h2>
    <a href="{{ route('ships_gallery.create', ['ship_id'=>$ship->id]) }}" class="inline-block mb-4 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Create Gallery</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($ship->gallery as $photo)
            <div class="border border-gray-300 p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">{{ $photo->title }}</h3>
                <img src="{{ $photo->url }}" alt="{{ $photo->title }}" class="w-32 h-32 object-cover mb-4">
                <div class="flex justify-between items-center">
                    <a href="{{ route('ships_gallery.edit', $photo->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('ships_gallery.destroy', $photo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this gallery item?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
