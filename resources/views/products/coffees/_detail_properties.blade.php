

<div class="product-detail-properties">
    <h4>@lang('dancinggoat.Product_Parameters')</h4>
    <dl class="row">
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Farm')</dt>
        <dd class="col-xs-12 col-sm-8">{{ $product->farm }}</dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Variety')</dt>
        <dd class="col-xs-12 col-sm-8">{{ $product->variety }}</dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Processing')</dt>
        <dd class="col-xs-12 col-sm-8">
        	@foreach($product->processing as $processing)
        	{{ $processing->name }}{{ $loop->last ? '' : ', ' }} 
        	@endforeach
        </dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Altitude')</dt>
        @if($product->altitude)        
            <dd class="col-xs-12 col-sm-8">{{ $product->altitude }} ft</dd>
        @endif
    </dl>
</div>