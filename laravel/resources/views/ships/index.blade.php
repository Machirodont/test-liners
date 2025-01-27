@extends('layouts.app')

@section('title', 'Ships List')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Список лайнеров</h1>

        <!-- Success message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Ships Table -->
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <tbody>
            @foreach($ships as $ship)
                <tr class="border-t">
                    <td class="px-4 py-2">
                        <a href="{{ route('ships.show', $ship->id) }}" class="text-indigo-600 hover:text-indigo-800">
                            {{ $ship->title }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $ships->links() }}
        </div>
    </div>
@endsection
