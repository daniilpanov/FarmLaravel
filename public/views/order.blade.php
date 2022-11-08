@php($page_alias = 'cart')

@extends('layouts.root')

@section('main')
    <main class="container">
        <h2 class="first">{{ $___('order-form-title', 'Для совершения заказа заполните, пожалуйста, следующие данные:') }}</h2>

        <form id="form" method="post" action="/cart/buy">
            @csrf
            <input type="hidden" name="order_data" value="{{ $data }}">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('your-name', 'Ваше имя') }}*: </label>
                </div>
                <div class="col-md-6">
                    <input required name="name" type="text" class="form-control" placeholder="{{ $___('name', 'Имя') }}" aria-label="{{ $___('name', 'Имя') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('your-phone', 'Ваш номер телефона') }}*: </label>
                </div>
                <div class="col-md-6">
                    <input required name="tel" type="tel" class="form-control" placeholder="{{ $___('phone', 'Телефон') }}" aria-label="{{ $___('phone', 'Телефон') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('your-email', 'Ваш E-Mail') }}*: </label>
                </div>
                <div class="col-md-6">
                    <input required name="email" type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('comment-for-order', 'Комментарий к заказу') }}: </label>
                </div>
                <div class="col-md-6">
                    <textarea name="msg" class="form-control" placeholder="{{ $___('msg', 'Сообщение') }}"
                              aria-label="{{ $___('msg', 'Сообщение') }}"></textarea>
                </div>
            </div>
            <p></p>
            <div class="row text-center">
                <div class="col-md-2 offset-md-5">
                    <button type="submit" class="btn btn-outline-success">
                        <span class="fourth text-uppercase">{{ $___('make-order', 'Заказать') }}</span>
                    </button>
                </div>
            </div>
        </form>
    </main>
@endsection
