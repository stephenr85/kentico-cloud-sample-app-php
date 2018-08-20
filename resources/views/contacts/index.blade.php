@extends('layouts.app')

@section('meta_title', $meta_title)

@section('body')

<div class="col-md-12">
    <h2 class="contact-title">@lang('dancinggoat.Roastery')</h2>
    <ul class="contact-info">
        <li><a href="tel:{{ $roastery->phone }}">{{ $roastery->phone }}</a></li>
        <li>{{ $roastery->email }}</li>
        <li>
            <a href="javascript:void(0)" data-address="{{ $roastery->city . ', ' . $roastery->street }}" class="js-scroll-to-map">
                {{ $roastery->street }}, {{ $roastery->city }}<br />
                {{ $roastery->zipCode }}, {{ $roastery->country }}, {{ $roastery->state }}<br />
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