@extends('layouts.app')



@section('body')

<h2>@lang('dancinggoat.CompanyCafes')</h2>
<div class="row">
	@foreach($cafes as $cafe)
		@include('cafes._cafe', ['cafes' => $cafe, 'show_image' => true])
	@endforeach    
</div>

<h2>@lang('dancinggoat.PartnerCafes_Title')</h2>
<div class="row">
    @foreach($partner_cafes as $cafe)
        <h3>{{ $cafe->city }}, {{ $cafe->country }}</h3>
        <p>
            {{ $cafe->system->name }}, 
            {{ $cafe->street }}, 
            {{ $cafe->street }}, 
            {{ $cafe->phone }}
        </p>
    @endforeach
</div>

<h2 class="map-title">@lang('dancinggoat.Cafes_MapTitle')</h2>
<div class="map js-map"></div>

@endsection


@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $google_maps_key }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection