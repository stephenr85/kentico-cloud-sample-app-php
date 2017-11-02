
@php($price = $product->getNumber('price') > 0 ? $product->getNumber('price') : "Price hasn't been set yet.")

<article class="product-tile">
    <a href="{{ route('product.detail', [$product->system->codename]) }}">
        <h1 class="product-heading">{{ $product->getString('product_name') }}</h1>
        @if(count($product->getElement('product_status')->value) > 0)
            <span class="product-tile-status">
                {{ $product->getElement('product_status')->value[0]->name }}
            </span>
        @endif
        <figure class="product-tile-image">
            @php($img = $product->getElement('image')->value[0])
            <img src="{{ $img->url }}" alt="{{ $img->description }}">
        </figure>
        <div class="product-tile-info">
            <span class="product-tile-price">
                {{ $price }}
            </span>
        </div>
    </a>
</article>