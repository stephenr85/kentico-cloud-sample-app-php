

<div class="product-detail-properties">
    <h4>@lang('dancinggoat.Product_Parameters')</h4>
    <dl class="row">
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Farm')</dt>
        <dd class="col-xs-12 col-sm-8">{{ $product->getString('farm') }}</dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Variety')</dt>
        <dd class="col-xs-12 col-sm-8">{{ $product->getString('variety') }}</dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Processing')</dt>
        <dd class="col-xs-12 col-sm-8">
        	@foreach($product->getElement('processing')->value as $processing)
        	{{ $processing->name }}{{ $loop->last ? '' : ', ' }} 
        	@endforeach
        </dd>
        <dt class="col-xs-12 col-sm-4">@lang('dancinggoat.Coffee_Altitude')</dt>
        @if($product->getString('altitude'))        
            <dd class="col-xs-12 col-sm-8">{{ $product->getString('altitude') }} ft</dd>
        @endif
    </dl>
</div>