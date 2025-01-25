@extends('layouts.app')

@section('title', 'Ships List')

@section('content')
    <h1>Ships List</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <tbody>
        @foreach($ships as $ship)
            <tr>
                <td><a href="{{ route('ships.show', $ship->id) }}">{{ $ship->title }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $ships->links() }} <!-- Для пагинации -->
@endsection
