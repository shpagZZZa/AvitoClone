@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <div class="card-header">
        <div class="row justify-content-between justify-content-center">
            {{$product->name}}
        </div>
    </div>

    <div class="card-body">
        <div class="col">
            @include('layouts.product', $product)
        </div>
    </div>
@endsection
