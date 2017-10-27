@extends('layouts.app')

@section('body')
<article class="article-detail col-lg-9 col-md-12 article-detail-related-box">
    <h2>{{ $article->getString('title') }}</h2>
    <div class="article-detail-datetime">
        {{ date('F j, Y', $article->getDateTime('post_date')) }}
    </div>
    <div class="row">
        <div class="article-detail-image col-md-push-2 col-md-8">
            <img alt="{{ $article->getElementValue('teaser_image')[0]->description }}" class="img-responsive" src="{{ $article->getElementValue('teaser_image')[0]->url }}" title="{{ $article->getElementValue('teaser_image')[0]->description }}">
        </div>
    </div>
    <div class="row">
        <div class="article-detail-content">
            {!! $article->getString('body_copy') !!}
        </div>
    </div>
</article>

@if(count($related_articles) > 0)
<div class="article-related-articles">
    <h1 class="title-tab">@lang('dancinggoat.Articles_RelatedArticles')</h1>
    <div class="row">
        @each('articles._related_article', $related_articles, 'article')
    </div>
</div>
@endif

@endsection