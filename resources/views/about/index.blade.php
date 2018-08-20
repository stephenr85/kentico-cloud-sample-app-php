@extends('layouts.app')

@section('meta_title', $meta_title)

@section('body')

@foreach($facts as $fact)
    @include('about._fact', ['fact' => $fact, 'index' => $loop->index])
@endforeach

@endsection