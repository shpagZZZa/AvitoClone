@extends('layouts.app')
@section('title', 'Категории')

@section('content')
    <div class="container">
        <div class="card-header">
            Новая категория
        </div>

        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-row">
                    <label for="category-name">Название: </label>
                    <input type="text" id="category-name" name="name" required>
                </div>

                <button class="btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
