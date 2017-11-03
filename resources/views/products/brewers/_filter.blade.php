
<h4>@lang('dancinggoat.Brewers_Manufacturers')</h4>

@foreach ($manufacturers->terms as $manufacturer)
    <span class="checkbox js-postback">
        {!! Form::checkbox('manufacturer['.$manufacturer->codename.']', $manufacturer->codename, null, ['id' => 'manufacturer['.$manufacturer->codename.']']) !!}
        {!! Form::label('manufacturer['.$manufacturer->codename.']', $manufacturer->name) !!}
    </span>
@endforeach

<h4>@lang('dancinggoat.Brewers_PublicStatus')</h4>

@foreach ($product_statuses->terms as $product_status)
    <span class="checkbox js-postback">
        {!! Form::checkbox('product_status['.$product_status->codename.']', $product_status->codename, null, ['id' => 'product_status['.$product_status->codename.']']) !!}
        {!! Form::label('product_status['.$product_status->codename.']', $product_status->name) !!}
    </span>
@endforeach