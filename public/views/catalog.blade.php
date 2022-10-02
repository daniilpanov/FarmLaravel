@extends('layouts.main')

@section('header.image.url'){{ asset('img/Milk_Cheese_Quark_curd_cottage_farmer_cheese_576611_1280x851.jpg') }}@endsection

@section('content')
    <section>
        <h1 class="first">Мы предлагаем:</h1>

        <div class="row" id="pictures">
            <div class="col-md-3">
                <!-- Сюда фотки -->
                <img src="{{ asset('img/Milk-table.jpg') }}" height="200">

                <!-- Кнопка-триггер модального окна -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Milk">
                    <u class="fourth text-center">МОЛОЧНУЮ ПРОДУКЦИЮ</u>
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="Milk" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Молочная продукция</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><a class="products">Молоко коровье</a></li>
                                    <li><a class="products">Молоко козье</a></li>
                                    <li><a class="products">Творог</a></li>
                                    <li><a class="products">Сливки</a></li>
                                    <li><a class="products">Ряженка</a></li>
                                    <li><a class="products">Кефир</a></li>
                                    <li><a class="products">Сыр адыгейский</a></li>
                                    <li><a class="products">Масло сливочное</a></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                </button>
                                <a href="/contacts#form" class="btn btn-primary">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <!-- Сюда фотки -->
                <img src="{{ asset('img/Meat_products_steak_Cutting_board_Piece_Bokeh_607992_1280x714.jpg') }}"
                     height="200">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Meat">
                    <u class="fourth text-center">ПАРНОЕ МЯСО</u>
                </button>
                <!-- Модальное окно -->
                <div class="modal fade" id="Meat" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Парное мясо</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><a class="products">Говядина</a></li>
                                    <li><a class="products">Свинина</a></li>
                                    <li><a class="products">Баранина</a></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                </button>
                                <a href="/contacts#form" class="btn btn-primary">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <!-- Сюда фотки -->
                <img src="{{ asset('img/Nest_Eggs_Three_3_Gray_background_608397_1280x853.jpg') }}" height="200">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Eggs">
                    <u class="fourth text-center">КУРИНЫЕ ЯЙЦА</u>
                </button>
                <!-- Модальное окно -->
                <div class="modal fade" id="Eggs" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Куриные яйца</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><a class="products">Цена за 1 десяток</a></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                </button>
                                <a href="/contacts#form" class="btn btn-primary">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Сюда фотки -->
                <img src="{{ asset('img/Apples_Carrots_Still-life_Wicker_basket_Jug_612038_1280x853.jpg') }}" height="200">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Fruits">
                    <u class="fourth text-center">СЕЗОННЫЕ ОВОЩИ И ФРУКТЫ</u>
                </button>
                <!-- Модальное окно -->
                <div class="modal fade" id="Fruits" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">Сезонные овощи и фрукты</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><a class="products">Картофель</a></li>
                                    <li><a class="products">Морковь</a></li>
                                    <li><a class="products">Огурцы</a></li>
                                    <li><a class="products">Яблоки</a></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                </button>
                                <a href="/contacts#form" class="btn btn-primary">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
