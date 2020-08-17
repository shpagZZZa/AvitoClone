@extends('layouts.app')
@section('title', 'Редактировать профиль')

@section('content')
    <div class="container">
        <div class="card-body">
            <form action="{{ route('profile.update', $profile) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="phone">Номер телефона:</label>

                    <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Описание профиля:</label>

                    <textarea id="description" name="description" cols="60" rows="5" class="form-control">
                                {{ old('description', $profile->description) }}
                            </textarea>
                </div>

                <div class="form-group">
                    <label for="image_path">Картинка профиля: </label>

                    <input type="file" id="image_path" name="image_path" class="form-control">
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-3">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                    <a href="{{ route('profile', $profile) }}" class="btn badge-danger ml-2">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection
