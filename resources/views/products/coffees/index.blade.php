@extends('layouts.app')

@section('page_title', 'Coffees')


@section('body')


<div class="product-page row">
    <div class="flex">
        <aside class="col-md-4 col-lg-3 product-filter">
        	{!! Form::open(['route'=>'products.coffees.filter', 'method' => 'get']) !!}
            @include('products.coffees._filter')
        	{!! Form::close() !!}
        </aside>

        <div id="product-list" class="col-md-8 col-lg-9 product-list">
            @include('products._product_listing', ['products' => $coffees])
        </div>
    </div>
</div>

@endsection


@section('scripts')
    <script src="{{ asset('js/formAutoPost.js') }}"></script>
    <script>
        $(".js-postback input:checkbox").formAutoPost({ targetContainerSelector: "#product-list" });
    </script>
@endsection