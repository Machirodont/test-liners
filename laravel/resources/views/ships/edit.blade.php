@extends('layouts.app')

@section('title', 'Edit Ship: ' . $ship->title)

@section('content')
    <h1>Edit Ship: {{ $ship->title }}</h1>

    <form action="{{ route('ships.update', $ship->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('form.input_text', ['label'=>'Title', 'name'=>'title', 'model' => $ship])
        @include('form.textarea', ['label'=>'Описание', 'name'=>'description', 'model' => $ship])
        @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering', 'model' => $ship])
        @include('form.select', ['label'=>'Активный', 'name'=>'state', 'model' => $ship, 'options'=> ['0'=>'Нет', '1'=>'Да']])

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
        @include('form.submit', ['title'=>'Update Ship'])
    </form>

    <a href="{{ route('ships.show', $ship->id) }}">Back to Ship</a>
@endsection
