@if(count($products) > 0)
    @foreach ($products as $product)
        <!-- 3 products on row for large screen -->
        <div class="col-md-6 col-lg-4">
        	@include('products._product_listing_item', ['product' => $product])
        </div>
    @endforeach
@else

    <span class="ContentLabel">@lang('dancinggoat.Brewers_NoMatchingProducts')</span>
    
@endif