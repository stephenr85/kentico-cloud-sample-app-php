
@php($price = $product->price > 0 ? $product->price : "Price hasn't been set yet.")

<article class="product-tile">
    <a href="{{ route('product.detail', [$product->system->codename]) }}">
        <h1 class="product-heading">{{ $product->productName }}</h1>
        @if(count($product->productStatus) > 0)
            <span class="product-tile-status">
                {{ $product->productStatus[0]->name }}
            </span>
        @endif
        <figure class="product-tile-image">
            @php($img = $product->image[0])
            <img src="{{ $img->url }}" alt="{{ $img->description }}">
        </figure>
        <div class="product-tile-info">
            <span class="product-tile-price">
                {{ $price }}
            </span>
        </div>
    </a>
</article>