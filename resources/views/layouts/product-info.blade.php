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
