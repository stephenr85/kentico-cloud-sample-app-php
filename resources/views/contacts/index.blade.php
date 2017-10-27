@extends('layouts.app')


@section('body')

<div class="col-md-12">
    <h2 class="contact-title">@lang('dancinggoat.Roastery')</h2>
    <ul class="contact-info">
        <li>{{ $roastery->getString('phone') }}</li>
        <li>{{ $roastery->getString('email') }}</li>
        <li>
            <a href="javascript:void(0)" data-address="{{ $roastery->getString('city') . ', ' . $roastery->getString('street') }}" class="js-scroll-to-map">
                {{ $roastery->getString('street') }}, {{ $roastery->getString('city') }}<br />
                {{ $roastery->getString('zip_code') }}, {{ $roastery->getString('country') }}, {{ $roastery->getString('state') }}<br />
        </a>
    </li>
</ul>
</div>


<div class="row">
	@foreach($cafes as $cafe)
		@include('cafes._cafe', ['cafes' => $cafe, 'show_image' => false])
	@endforeach    
</div>

<h2 class="map-title">@lang('dancinggoat.ContactUs_MapTitle')</h2>
<div class="map js-map"></div>

@endsection


@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $google_maps_key }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection