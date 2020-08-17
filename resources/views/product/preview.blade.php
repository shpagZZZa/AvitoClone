@extends('layouts.app')
@section('title', 'Предпросмотр')

@section('content')
    <div class="container">
        <div class="card-header">
            Предпросмотр "{{ $product['name'] }}"
        </div>

        <div class="card-body">
            <div class="col">
                <div class="row">
                    <div class="col-md-8">
                        <span class="text-capitalize" style="font-size: large">{{ $product['name'] }} - {{ $product['price'] }} руб.</span>
                        <hr>

                        <div>
                            @foreach($product['images'] as $image)
                                <img src="{{ $image['path'] }}" alt="{{ $product['name'] }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <a href="{{ route('profile', $product->profile->id) }}" class="text" style="font-size: larger">
                                {{ $product->profile->user->name }}
                            </a>
                        </div>

                        <div>
                            {{ count($product->profile->products) }} объявлений
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>
            </div>

        </div>
    </div>
@endsection
