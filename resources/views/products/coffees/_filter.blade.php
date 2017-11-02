

<h4>@lang('dancinggoat.Coffees_CoffeeProcessing')</h4>

@foreach ($processings->terms as $processing)
    <span class="checkbox js-postback">
    	{!! Form::checkbox('processing['.$processing->codename.']', $processing->codename, null, ['id' => 'processing['.$processing->codename.']']) !!}
    	{!! Form::label('processing['.$processing->codename.']', $processing->name) !!}
    </span>
@endforeach

<h4>@lang('dancinggoat.Brewers_PublicStatus')</h4>

@foreach ($product_statuses->terms as $product_status)
    <span class="checkbox js-postback">
    	{!! Form::checkbox('product_status['.$product_status->codename.']', $product_status->codename, null, ['id' => 'product_status['.$product_status->codename.']']) !!}
    	{!! Form::label('product_status['.$product_status->codename.']', $product_status->name) !!}
    </span>
@endforeach