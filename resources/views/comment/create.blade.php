@extends('layouts.app')
@section('title', "Новый отзыв о".$profile->user->name)

@section('content')
    <div class="container">
        <div class="card-header">
            Отзыв о {{ $profile->user->name }}
        </div>

        <div class="card-body">
            @include('layouts.profile-info', $profile)

            <hr>

            <form action="{{ route('comment.store', $profile) }}" method="post">
                @csrf

                <div class="form-row">
                    <label for="content" class="mr-1">
                        Содержание отзыва:
                    </label>
                    <textarea name="content" id="content" cols="60" rows="5" placeholder="Содержание..."></textarea>
                </div>

                <div class="form-row mt-2">
                    <label for="mark" class="mr-1">
                        Ваша оценка (от 1 до 5):
                    </label>
                    <input type="number" min="1" max="5" id="mark" name="mark">
                </div>

                @if($errors->any())
                    {!! implode('', $errors->all('<div class="alert-danger">:message</div>')) !!}
                @endif

                <button class="btn-primary mt-2">
                    Сохранить отзыв
                </button>
            </form>
        </div>

    </div>
@endsection
