<section class="row text-and-image">
    <h2 class="col-lg-12">{{ $fact->getString('title') }}</h2>
    <div class="col-md-6{{ $index % 2 == 0 ? " col-md-push-6" : "" }}">
        <div class="text-and-image-text{{ $index % 2 == 0 ? "-right" : "" }}">
            {!! $fact->getString('description') !!}
        </div>
    </div>
    <div class="col-md-6{{ $index % 2 == 0 ? " col-md-pull-6" : "" }}">
    	<img alt="{{ $fact->getElementValue('image')[0]->description }}" class="img-responsive" src="{{ $fact->getElementValue('image')[0]->url }}" title="{{ $fact->getElementValue('image')[0]->description }}">
    </div>
</section>