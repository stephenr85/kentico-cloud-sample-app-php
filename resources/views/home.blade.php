@extends('layouts.app')

@section('title', 'Page Title')

@section('body')

<div class="row">
    <h1 class="title-tab">@lang('dancinggoat.Articles_LatestOne')</h1>

    <!-- Feature Article -->
    <div class="article-tile article-tile-large">
        <div class="col-md-12 col-lg-6">
            <a href="/articles/show/{{ $feature_article->system->codename }}">
            	<img src="{{ $feature_article->getElementValue('teaser_image')[0]->url }}" class="article-tile-image">
            </a>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="article-tile-date">
                {{ date('F j', $feature_article->getDateTime('post_date')) }}
            </div>
            <div class="article-tile-content">
                <h2>
                    <a href="/articles/show/{{ $feature_article->system->codename }}">{{ $feature_article->getString('title') }}</a>
                </h2>
                <p class="article-tile-text lead-paragraph">
                    {{ $feature_article->getString('summary') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Articles -->
    @foreach ($articles as $article)
    	
    	@include('articles._article_teaser', compact('article'))

    @endforeach
    <div class="row">
        <div class="clear center-text">
            <a href="/articles" class="btn btn-more">
                @lang('dancinggoat.Articles_More')
            </a>
        </div>
    </div>

    <!-- Our Story -->
    <div class="row">
        <h1 class="title-tab">@lang('dancinggoat.Story_Title')</h1>
        <div class="col-sm-12">
            <div class="ourstory-section center-text" style="background-image: url('{{ $our_story->getElementValue('image')[0]->url }}');">
                {!! deliver_rich_text($our_story->getString('description')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="clear center-text">
            <a href="/about" class="btn btn-more">
                @lang('dancinggoat.Story_WholeStory')
            </a>
        </div>
    </div>


    <!-- Cafes -->
    <div class="row">
	    <div>
	        <h1 class="title-tab">@lang('dancinggoat.CompanyCafes_Title')</h1>
	    </div>
	    @foreach ($cafes as $cafe)
	        <div class="col-xs-6 col-md-3">
	            <div>
	                <a href="/cafes" class="ourcoffee-tile-link">
	                    <h2 class="ourcoffee-tile-text center-text">{{ $cafe->system->name }}</h2>
	                    <span class="cafe-overlay"> </span>
	                    <img class="ourcoffee-tile-image" src="{{ $cafe->getElementValue('photo')[0]->url }}" alt="{{ $cafe->getElementValue('photo')[0]->description }}">
	                </a>
	            </div>
	        </div>
        @endforeach
	</div>
   	<div class="row">
        <div class="clear center-text">
            <a href="/about" class="btn btn-more">
                @lang('dancinggoat.Cafes_More')
            </a>
        </div>
    </div>
</div>

@endsection