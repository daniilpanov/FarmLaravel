@extends('layouts.main')

@section('content')
    <h2 id="second">домашние продукты</h2>
    <h3 id="third">мы предлагаем:</h3>
    <h4 class="fourth">молочную продукцию</h4>

    <ul>
        <li class="products">свежее молоко</li>
        <li class="products">творог</li>
        <li class="products">масло</li>
        <li class="products">сыр</li>
    </ul>
    <h4 class="fourth">парное мясо</h4>

    <ul>
        <li class="products">говядина</li>
        <li class="products">свинина</li>
        <li class="products">баранина</li>
        <li class="products">курица</li>
    </ul>

    <h4 class="fourth">а также</h4>

    <ul>
        <li class="products">куриные яйца</li>
        <li class="products">сезонные овощи (картофель,морковь,капуста)</li>
    </ul>
    <div>
        <span class="fourth">Ждем Ваших заказов!</span>
    </div>
    <p>
    <form>
        <div>
            ФИО <input type="text" style="border: 1px solid mediumvioletred">
        </div>
        <p>
        <div>
            ЗАКАЗ <input type="text" style="border: 1px solid mediumvioletred">
        </div>
        <p></p>
        <p></p>
        <button type="submit">
            ОТПРАВИТЬ
        </button>
    </form>
    <p>Мы в ВК <a href="#" id="first_link">НАША ФЕРМА</a>
@endsection
