@extends('layouts.app')

@section('title', 'Create New Ship')

@section('content')
    <h1>Создать новый лайнер</h1>

    <form action="{{ route('ships.store') }}" method="POST">
        @csrf

        @include('form.input_text', ['label'=>'Title', 'name'=>'title'])
        @include('form.textarea', ['label'=>'Описание', 'name'=>'description'])
        @include('form.input_number', ['label'=>'Порядок', 'name'=>'ordering'])
        @include('form.select', ['label'=>'Активный', 'name'=>'state', 'options'=> ['0'=>'Нет', '1'=>'Да']])

        @include('form.submit', ['title'=>'Create Ship'])
    </form>
@endsection
