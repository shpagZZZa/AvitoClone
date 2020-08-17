@extends('layouts.app')
@section('title', $profile->user->name)

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row justify-content-between justify-content-center">
                {{ $profile->user->name }}

                @can('update', $profile)
                    <a href="{{ route('profile.edit', $profile) }}" class="btn btn-primary">Редактировать профиль</a>
                    <a href="{{ route('product.create') }}" class="page-link">Новое объявление</a>
                @endcan

                @can('comment', $profile)
                    <a href="{{ route('comment.create', $profile) }}" class="btn btn-secondary">Написать отзыв</a>
                @endcan
            </div>

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-md-4">
                    <h1>Информация о профиле</h1>

                    <div class="row">
                        <div>
                            <img src="/storage/images/profile/{{ $profile->image_path }}" alt="" style="width: 150px;">
                        </div>

                        <div class="col">
                            <div>
                                Телефон: {{ $profile->phone }}
                            </div>

                            <div>
                                О себе: {{ $profile->description  }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h1>Отзывы о продавце</h1>
                    @foreach($comments as $comment)
                        <div class="row mt-4">
                            <div>
                                <img src="/storage/images/profile/{{ $comment->author->image_path }}" alt="{{ $comment->author->user->name }}" style="width: 60px">
                            </div>

                            <div class="col">
                                <div class="row justify-content-between">
                                    <a href="{{ route('profile', $comment->author) }}" class="text-dark ml-3">
                                        {{ $comment->author->user->name }}
                                    </a>
                                    <span class="text-info">
                                        {{ $comment->mark }} из 5
                                    </span>
                                </div>

                                <div>
                                    {{ $comment->content }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-2 col-3"></div>

                <div class="col-9 col-md-6">
                    <h1>Объявления</h1>

                    @foreach($profile->products as $product)
                        <div class="row mb-3">
                            <div>
                                <img src="{{ $product->images->first()->path }}" style="width: 70px">

                            </div>

                            <div class="col">
                                <div class="row justify-content-between">
                                    <div>
                                        <a href="{{ route('product', $product) }}" class="text-dark">
                                            {{ $product->name }}
                                        </a>
                                    </div>

                                    <div>{{ $product->created_at }}</div>
                                </div>

                                <div>
                                    <a href="" class="text-info">
                                        {{ $product->category->name }}
                                    </a>
                                </div>

                                <div>
                                    <span>
                                        {{ $product->price }}
                                    </span>
                                </div>


                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

