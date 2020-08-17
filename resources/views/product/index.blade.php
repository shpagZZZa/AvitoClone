@extends('layouts.app')
@section('title', 'Объявления')

@section('content')
    <div class="container">
        <div class="card-body">
            <div class="col">
                <div class="row mb-5">
                    <form action="{{ route('products') }}" method="get">
                        <label for="searchField">Введите параметры поиска</label>
                        <input type="text" id="searchField" name="search">

                        <button class="btn btn-primary ml-2">Поиск</button>
                    </form>
                </div>

                <div>
                    @foreach ($products as $product)
                        @include('layouts.product-info', $product)
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
