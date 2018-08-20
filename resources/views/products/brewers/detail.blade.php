@extends('products.detail_layout')


@section('product_description')

{!! deliver_rich_text($product->longDescription ? $product->longDescription : $product->shortDescription) !!}
                
@include('products.brewers._detail_properties', ['product' => $product])

@endsection


@section('product_form')

@include('products.brewers._detail_form', ['product' => $product])

@endsection


@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#getfreetaste").validate({
            rules: {
                email: "email",
                zipcode: "digits"
            }
        });
    });
</script>
@endsection