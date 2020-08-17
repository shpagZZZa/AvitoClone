@extends('layouts.app')
@section('title', 'Категории')

@section('content')
    <div class="container">
        <div class="card-header">
            Категории
        </div>

        <div class="card-body">
            <div>
                @foreach($categories as $category)
                    <div>{{ $category->name }}</div>
                @endforeach
            </div>

            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Новая категория</a>
            </div>
        </div>
    </div>
@endsection
