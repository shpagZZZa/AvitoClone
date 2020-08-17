@extends('layouts.app')
@section('title', 'Панель администратора')

@section('content')
    <div class="container">
        <div class="card-header">
            Панель администратора
        </div>

        <div class="card-body">
            <div>
                <a href="{{ route('categories') }}">Категории</a>
            </div>
        </div>
    </div>
@endsection
