@extends('layouts.app')

@section('body')


@foreach($facts as $fact)
    @include('about._fact', ['fact' => $fact, 'index' => $loop->index])
@endforeach



@endsection