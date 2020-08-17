<div class="row">
    <div>
        <img src="{{ $product->img }}" style="width: 70px">

        <div class="col">
            <div class="justify-content-between">
                <a href="{{ route('product', $product) }}" class="text-dark">
                    {{ $product->name }}
                </a>

                <span>
                    {{ $product->created_at }}
                </span>
            </div>

            <a href="" class="text-info">
                {{ $product->category->name }}
            </a>

            <span>
                {{ $product->price }}
            </span>


        </div>
    </div>
</div>
