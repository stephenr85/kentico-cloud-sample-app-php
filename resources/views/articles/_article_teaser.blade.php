<div class="col-md-3">
    <div class="article-tile">
        <a href="/articles/show/{{ $article->system->codename }}">
            <img alt="{{ $article->getElementValue('teaser_image')[0]->description }}" class="article-tile-image" src="{{ $article->getElementValue('teaser_image')[0]->url }}" title="{{ $article->getElementValue('teaser_image')[0]->description }}">
        </a>
        <div class="article-tile-date">
            {{ date('F j', $article->getDateTime('post_date')) }}
        </div>
        <div class="article-tile-content">
            <h2 class="h4">
                <a href="/articles/show/{{ $article->system->codename }}">{{ $article->getString('title') }}</a>
            </h2>
            <p class="article-tile-text">
                {!! $article->getString('summary') !!}
            </p>
        </div>
    </div>
</div>