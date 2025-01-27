<?php
/** @var \App\Models\Ship $ship */
?>

@extends('layouts.app')

@section('title', $ship->title)

@section('content')
    <h1>{{ $ship->title }}</h1>
    <div>
        <a href="{{ route('ships.edit', $ship->id) }}">Edit</a>
        <form action="{{ route('ships.destroy', $ship->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this ship?')">Delete</button>
        </form>
    </div>
    <div>
        {!! $ship->description !!}
    </div>

    <table>
        <tbody>
        @foreach($ship->spec as $spec)
            <tr>
                <td>{{$spec['name']}}</td>
                <td> {{$spec['value']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Cabins</h2>
    <a href="{{ route('cabin_category.create', ['ship_id'=>$ship->id]) }}">Create</a>
    <div style="display: flex;">
        @foreach($ship->cabinCategories as $category)
            @php
                $photo = $category->photos[0] ?? \App\Models\ShipGallery::NO_IMG_PLACEHOLDER;
            @endphp
            <div style="padding:10px;">
                {{$category->title}}<br>
                <img src="{{$photo}}" alt="" style="width: 100px;">
                <div>
                    <a href="{{ route('cabin_category.edit', $category->id) }}">Edit</a>
                    <form action="{{ route('cabin_category.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this cabin_category?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <h2>Gallery</h2>
    <a href="{{ route('ships_gallery.create', ['ship_id'=>$ship->id]) }}">Create</a>
    <div style="display: flex;">
        @foreach($ship->gallery as $photo)
            <div style="padding:10px;">
                {{$photo->title}}<br>
                <img src="{{$photo->url}}" alt="" style="width: 100px;">
                <div>
                    <a href="{{ route('ships_gallery.edit', $photo->id) }}">Edit</a>
                    <form action="{{ route('ships_gallery.destroy', $photo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this ship?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
