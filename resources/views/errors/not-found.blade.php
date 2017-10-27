@extends('layouts.app')

@section('Oops! Page not found', 'Page Title')

@section('body')


<div class="row">
    <div class="not-found">
        <div class="col-md-5 col-lg-4 col-lg-offset-1 sm-hidden xs-hidden">
            <img class="img-responsive" alt="Page not found" src="{{ asset('images/404.jpg') }}">
        </div>
        <div class="col-md-7 col-lg-6">
            <div class="not-found-content">
                <h2 class="">
                	@lang('dancinggoat.NotFound_Title')
                </h2>
                <p>@lang('dancinggoat.NotFound_Message')</p>
                <p>
                    @lang('dancinggoat.NotFound_Instructions')
                </p>
                <a href="atUrl.Action("Index", "Home")" class="btn">
                    @lang('dancinggoat.NotFound_GoHome')
                </a>
            </div>
        </div>
    </div>
</div>



@endsection