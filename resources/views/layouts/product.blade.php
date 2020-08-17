<div class="col">
    <div class="row">
        <div class="col-md-8">
            <div class="row justify-content-between">
                <span class="text-capitalize" style="font-size: large">{{ $product->name }} - {{ $product->price }} руб.</span>

                @can('delete', $product)
                    <form action="{{ route('product.delete', $product) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger">Удалить пост</button>
                    </form>
                @endcan
            </div>

            <hr>

            <div>
                @foreach($product->images as $image)
                    <img src="{{ $image->path }}" alt="{{ $product->name }}">
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            @include('layouts.profile-info', $profile = $product->profile)
        </div>
    </div>

    <div class="row">

    </div>
</div>
