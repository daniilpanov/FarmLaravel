@extends('layouts.root')

@section('main')
    <main>
        <h1 class="first">Корзина</h1>
        @empty($cart_items->toArray())
            <div class="text-center">{{ __('Продукты в корзине отсутствуют') }}</div>
        @else
            <form id="cart-form">
                <div class="form-header" style="padding: 1.5rem">
                    <label>
                        Выбрать все:
                        <input id="choose-all" class="custom" type="checkbox">
                        <label for="choose-all" class="checkbox-body" style="width: 1em; height: 1em"></label>
                    </label>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            @foreach($cart_items as $item)
                                <div class="col-md-6" style="margin-bottom: calc(var(--bs-gutter-x))">
                                    <div class="card cart-item" style="width: 100%; min-height: 100%">
                                        <input type="hidden" class="item-id" value="{{ $item->id }}">
                                        <div class="row card-header" style="padding: 0">
                                            <div class="col-md" style="display: grid; justify-content: flex-start; align-content: baseline">
                                                <input id="cart-item-{{ $item->id }}" class="cart-item-id custom"
                                                       type="checkbox" title="Выбрать"
                                                       name="items[]" value="{{ $item->id }}">
                                                <label for="cart-item-{{ $item->id }}" class="checkbox-body"></label>
                                            </div>
                                            <div class="col-md" style="display: grid; justify-content: flex-end; align-content: baseline">
                                                <button type="button" class="btn btn-danger del-n-close">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>

                                        @if($item->product->image)
                                            {!! $item->product->image->getStr(['class' => 'card-img-top']) !!}
                                        @else
                                            <div class="card-img-top" style="display: flex; justify-content: center">
                                                <img src="{{ asset('img/no-pic.png') }}" alt="no picture" height="341">
                                            </div>
                                        @endif
                                        <div class="card-body"{{--style="display: grid; align-content: center"--}}>
                                            <div class="card-title text-center" style="font-size: xx-large; color: black">
                                                {{ $item->product->title }}
                                            </div>
                                            <p class="card-text" style="color: black">
                                                {{ $item->product->page?->description }}
                                            </p>
                                        </div>
                                        <div class="card-footer" style="padding: 0">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn-secondary minus">-</button>
                                                        <input type="text" style="flex: 1; min-width: 50px; text-align: center"
                                                               class="form-control quantity" aria-describedby="btnGroupAddon"
                                                               value="{{ $item->quantity }}" name="items-quantity[]">
                                                        <button type="button" class="btn btn-secondary plus">+</button>
                                                    </div>
                                                </div>

                                                <div class="col-md" style="display: flex; justify-content: flex-end; color: black">
                                                    <span class="price">{{ $item->product->price }}</span>
                                                    руб.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="all-sum-price">
                            <h3 style="color: rgb(138, 239, 14)">{{ __('Итоговая стоимость:') }}</h3>
                            <span>0</span> руб.
                        </div>
                        <hr style="background-color: rgb(138, 239, 14)">
                        <button type="submit" class="btn btn-success btn-block">Заказать</button>
                        <hr style="opacity: 0; margin: .5rem 0">
                        <button type="reset" class="form-reset btn btn-danger btn-block">Удалить выбранные</button>
                    </div>
                </div>
            </form>
        @endempty
    </main>
@endsection
<script>
    import Delivery from "../../dev2/delivery.html";
    export default {
        components: {Delivery}
    }
</script>
