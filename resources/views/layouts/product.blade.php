<script src="{{ asset('js/showForm.js') }}">

</script>
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

            <div class="col">
                <div>
                    Категория: {{ $product->category->name }}
                </div>

                @if(isset($product->description))
                    <div>
                        Описание: {{ $product->description }}
                    </div>
                @endif


                <button class="btn-secondary btn" id="editBtn" onclick="showForm('form', 'editBtn')">
                    Редактировать описание:
                </button>

                <form id="form" action="{{ route('product.update', $product) }}" method="post" class="mt-5" style="display: none">
                    @csrf
                    @method("put")

                    <div class="col">
                        <div>
                            <textarea name="description" id="description" cols="60" rows="3"></textarea>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary">Сохранить описание</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            @include('layouts.profile-info', $profile = $product->profile)
        </div>
    </div>

    <div class="row">

    </div>
</div>
