@extends('layouts.main')

@section('header.image.url'){{ $page->image?->path() }}@endsection

@section('content')
    <div class="letter">
        <img class="left"
             src="{{ asset($___('image')) }}" height="200">
        {!! $___('content') !!}
    </div>
    <p class="text-center"><a href="/contacts#form" class="third">{{ $___('make_order', 'ЗАКАЗАТЬ ПРОДУКЦИЮ') }}</a>
@endsection
