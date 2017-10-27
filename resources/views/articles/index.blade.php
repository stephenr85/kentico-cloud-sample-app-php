@extends('layouts.app')

@section('body')

@if(count($articles) > 0)
<div class="row">
	@foreach($articles as $article)
		@include('articles._article_teaser', compact('article'))
		
		@if(($loop->index + 1) % 4 == 0)
			<div class="clear"></div>
		@endif
	@endforeach
</div>
@endif

@endsection