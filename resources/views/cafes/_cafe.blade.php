<div class="col-md-6">
    <div class="cafe-tile cursor-hand js-scroll-to-map" data-address="{{ $cafe->city . ', ' . $cafe->street }}">
        @if(isset($show_image) && $show_image)
            <div class="cafe-image-tile-image-wrapper" style="background-image:url('{{ $cafe->photo[0]->url }}'); background-size: cover; background-position: right center;"></div>
        @endif
        <div class="cafe-tile-content">
            <h3 class="cafe-tile-name">{{ $cafe->system->name }}</h3>
            <address class="cafe-tile-address">
                <a href="javascript:void(0)" class="cafe-tile-address-anchor">{{ $cafe->street }}, {{ $cafe->city }}<br />{{ $cafe->zipCode }}, {{ $cafe->country }}, {{ $cafe->state }}</a>
            </address>
            <p class="cafe-tile-phone">{{ $cafe->phone }}</p>
        </div>
    </div>
</div>