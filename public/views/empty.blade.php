@extends('layouts.main')

@section('content')
    {{ $page?->content?->content ?? '' }}
@endsection
