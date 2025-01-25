@extends('layouts.app')

@section('title', 'Create New Ship')

@section('content')
    <h1>Create New Ship</h1>

    <form action="{{ route('ships.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="ordering">Ordering</label>
            <input type="number" id="ordering" name="ordering" value="{{ old('ordering', 9999) }}">
        </div>

        <div>
            <label for="state">State</label>
            <input type="checkbox" id="state" name="state" value="1" {{ old('state') ? 'checked' : '' }}>
        </div>

        <button type="submit">Create Ship</button>
    </form>
@endsection
