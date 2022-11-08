@php($page_alias = 'cart')
@extends('main')

@section('content')
    <div class="text-lg-center first">
        {{ $___('thank-you-for-order', 'Спасибо за ваш заказ!') }}
    </div>
    <div class="fourth">
        {{ $___('order-info', 'Мы перезвоним Вам в ближайшее время и отправим информацию о Вашем заказе на Ваш E-Mail') }}
    </div>
@endsection
