@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .root > .col-3 {
            border-right: 1px solid rgba(138, 239, 14, 0.55);
        }
        .root > .w-100 {
            height: 50px;
        }
        .root .product > div {
            display: grid;
            align-content: center;
        }
        .root a {
            color: rgba(138, 239, 14);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

@extends('layouts.empty')

@section('content')
    <main class="container-fluid">
        <h1 class="first">Новый заказ</h1>
        <div class="row root">
            <div class="col-3">
                <h2 class="first">Данные клиента:</h2>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="offset-1 col-2">
                        <u>Имя: </u>
                    </div>
                    <div class="col-9">
                        {{ $model->name }}
                    </div>
                    <div class="offset-1 col-2">
                        <u>Телефон: </u>
                    </div>
                    <div class="col-9">
                        <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $model->tel) }}">{{ $model->tel }}</a>
                    </div>
                    <div class="offset-1 col-2">
                        <u>E-Mail: </u>
                    </div>
                    <div class="col-9">
                        <a href="mailto:{{ $model->email }}">{{ $model->email }}</a>
                    </div>
                    @if($model->msg)
                        <fieldset class="col-12" style="border: 1px solid rgba(138, 239, 14, 0.55); border-radius: .25rem; padding: .375rem">
                            <legend>Текст сообщения:</legend>
                            <blockquote style="padding-left: 1rem; border-left: 2px solid rgba(138, 239, 14)">
                                {{ $model->msg }}
                            </blockquote>
                        </fieldset>
                    @endif
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-3">
                <h2 class="first">Заказанные продукты: </h2>
            </div>
            <div class="col-9">
                @foreach($model->products as $product)
                    <div class="row product">
                        <div class="col-3">
                            @if($product->image)
                                {!! $product->image->getStr(['style' => 'max-width: 100%; max-height: 100%; height: auto; width: 100%']) !!}
                            @else
                                <img src="{{ asset('img/no-pic.png') }}" alt="no picture" style="max-width: 100%; max-height: 100%; height: auto; width: 100%">
                            @endif
                        </div>
                        <div class="col-5">
                            <div class="first">{{ $product->name }}</div>
                            <div>{{ $product->page?->description }}</div>
                        </div>
                        <div class="col-4">
                            <div>Кол-во: {{ $model->order_data[$product->id][0] }}</div>
                            <div>Цена{{ $product->price_description ? "($product->price_description)" : '' }}: {{ $product->price }} руб.</div>
                            <div>Стоимость: {{ $product->price * (int)$model->order_data[$product->id][0] }} руб.</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-100"></div>
            <div class="col-3">
            </div>
            <div class="col-9">
                Стоимость всего заказа:
                {{ $model->sum_price }} руб.
            </div>
        </div>
    </main>
@endsection
