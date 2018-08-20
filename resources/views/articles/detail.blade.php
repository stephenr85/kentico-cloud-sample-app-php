@extends('layouts.app')
@section('meta_title', $meta_title)
@section('body')
<article class="article-detail col-lg-9 col-md-12 article-detail-related-box">
    <h2>{{ $article->title }}</h2>
    <div class="article-detail-datetime">
        {{ date('F j, Y', $article->postDate->getTimeStamp()) }}
    </div>
    <div class="row">
        <div class="article-detail-image col-md-push-2 col-md-8">
            <img alt="{{ $article->teaserImage[0]->description }}" class="img-responsive" src="{{ $article->teaserImage[0]->url }}" title="{{ $article->teaserImage[0]->description }}">
        </div>
    </div>
    <div class="row">
        <div class="article-detail-content">
            {!! deliver_rich_text($article->bodyCopy) !!}
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