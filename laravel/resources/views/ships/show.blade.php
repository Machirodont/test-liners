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
@endsection
