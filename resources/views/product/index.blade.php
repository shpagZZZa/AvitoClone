@extends('layouts.app')
@section('title', 'Объявления')

@section('content')
    <div class="container">
        <div class="card-body">
            <div class="col">
                @foreach ($products as $product)
                    @include('layouts.product-info', $product)
                @endforeach
            </div>
        </div>
    </div>
@endsection
