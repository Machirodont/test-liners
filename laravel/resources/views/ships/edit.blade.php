@extends('layouts.app')

@section('title', 'Edit Ship: ' . $ship->title)

@section('content')
    <h1>Edit Ship: {{ $ship->title }}</h1>

    <form action="{{ route('ships.update', $ship->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $ship->title) }}" required>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $ship->description) }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="ordering">Ordering</label>
            <input type="number" id="ordering" name="ordering" value="{{ old('ordering', $ship->ordering) }}">
        </div>

        <div>
            <label for="state">State</label>
            <input type="checkbox" id="state" name="state" value="1" {{ old('state', $ship->state) ? 'checked' : '' }}>
        </div>

        <div>
            <table>
                <tbody>
                @foreach($ship->spec as $spec)
                    @php
                        $lineCode = md5($spec['name'].$spec['value']);
                    @endphp
                    <tr>
                        <td><input type="text" name="spec[{{$lineCode}}][name]" value="{{$spec['name']}}" required></td>
                        <td><input type="text" name="spec[{{$lineCode}}][value]" value="{{$spec['value']}}" required></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @error('spec')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update Ship</button>
    </form>

    <a href="{{ route('ships.show', $ship->id) }}">Back to Ship</a>
@endsection
