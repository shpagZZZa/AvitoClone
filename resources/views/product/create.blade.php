@extends('layouts.app')
@section('title', 'Новое объявление')

@section('content')
    <div class="container">
        <div class="card-header">
            Новое объявление
        </div>

        <div class="card-body">
            <div class="form-inline">
                <form class="form" action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-row">
                        <label for="name">Название: </label>
                        <input type="text" id="name" name="name">
                    </div>

                    <div class="form-row mt-4">
                        <label for="Категория: ">Категория: </label>
                        <select name="category_id" id="category">
                            <option selected disabled>Выберите категорию</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row mt-4">
                        <label for="image">Картинка </label>
                        <input type="file" name="image[]" id="image" multiple>
                    </div>


                    <div class="form-row justify-content-lg-start mt-4">
                        <label for="description">Описание: </label>
                        <textarea name="description" id="description" cols="60" rows="5" placeholder="Описание..."></textarea>
                    </div>

                    <div class="form-row mt-4">
                        <label for="price">Цена: </label>
                        <input type="text" id="price" name="price">
                    </div>

                    <div class="form-row mt-4">
                        <label for="tags">Тэги (через пробел, до 10)</label>
                        <textarea name="tags" id="tags" cols="60" rows="5" placeholder="Тэги..."></textarea>
                    </div>

                    <div class="form-row mt-4">
                        <button class="btn-primary">Сохранить</button>
                    </div>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
