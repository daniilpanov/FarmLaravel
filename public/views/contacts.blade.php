@extends('layouts.main')

@section('header.image.url'){{ $page?->image?->path() }}@endsection

@section('content')
    @isset($data['success'])
        @if ($data['success'] == 1)
            <script>
                notification('<strong>Ваше обращение отправлено</strong>! В ближайшее время мы свяжемся с Вами по электронной почте', true);
                window.history.pushState(null, '', document.location.pathname);
            </script>
        @else
            <script>
                notification('Что-то пошло не так! Попробуйте ещё раз. Приносим свои извинения.', false);
                window.history.pushState(null, '', document.location.pathname);
            </script>
        @endif
    @endisset
    <section>
        <h1 class="first">Как нас найти</h1>

        <div class="row">
            <div class="col-md">
                <div style="position:relative;overflow:hidden;">
                    <a
                        href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0">
                        Санкт‑Петербург и Ленинградская область
                    </a>
                    <a
                        href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/house/kiyevskoye_shosse_59/ZkAYfw5mSEcFQFtjfXh0eHtqZw==/?from=mapframe&ll=29.996122%2C59.459793&utm_medium=mapframe&utm_source=maps&z=16"
                        style="color:#eee;font-size:12px;position:absolute;top:14px">
                        Киевское шоссе, 59 — Яндекс Карты
                    </a>
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUNb2AvoB" width="560" height="400"
                            allowfullscreen style="position:relative;"></iframe>
                </div>
            </div>
            <div class="col-md">
                <ul>
                    <li>АДРЕС МАГАЗИНА: Ленинградская область, Гатчинский район,пос.Никольское,Киевское
                        шоссе,д.59
                    </li>
                </ul>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-md">
                <div style="position:relative;overflow:hidden;">
                    <a
                        href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0">
                        Яндекс Карты
                    </a>
                    <a
                        href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/house/derevnya_ryabizi/ZkAYfwBnSkMEQFtjfXh4cn9hZw==/?ll=29.978808%2C59.493734&utm_medium=mapframe&utm_source=maps&z=17.37"
                        style="color:#eee;font-size:12px;position:absolute;top:14px">
                        59.493323,29.977363 — Яндекс Карты
                    </a>
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUNb2bzsA" width="560" height="400"
                            allowfullscreen style="position:relative"></iframe>
                </div>
            </div>

            <div class="col-md">
                <ul>
                    <li>
                        АДРЕС ФЕРМЫ: Ленинградская область, Гатчинский район,Войсковицкое
                        поселение,деревня
                        Рябизи, Фермерская ул.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="first">
            {!! $___('form_title', '<p>
                Вы можете сделать заказ по номеру тел/whatsapp
                <a href="tel:+79112147227">+79112147227</a>
            </p>
            <p>
                Или написать нам:
            </p>') !!}
        </div>

        <form id="form" method="post" action="/contacts/send">
            @csrf
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('name', 'Имя') }}*: </label>
                </div>
                <div class="col-md-6">
                    <input name="name" required type="text" class="form-control" placeholder="{{ $___('name', 'Имя') }}" aria-label="{{ $___('name', 'Имя') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('phone', 'Телефон') }}*: </label>
                </div>
                <div class="col-md-6">
                    <input name="tel" required type="tel" class="form-control" placeholder="{{ $___('phone', 'Телефон') }}" aria-label="{{ $___('phone', 'Телефон') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>E-Mail*: </label>
                </div>
                <div class="col-md-6">
                    <input name="email" required type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <label>{{ $___('msg', 'Сообщение') }}: </label>
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
                        <span class="fourth text-uppercase">{{ $___('send', 'Отправить') }}</span>
                    </button>
                </div>
            </div>
        </form>
    </section>

    <section>
        <div class="third">
            {{ $___('VK_pre', 'Мы в ВК') }}:&emsp;
            <a href="https://vk.com/public193961315">
                <u>{{ $___('VK_link_title', 'Фермерские продукты Гатчина') }}</u>
            </a>
        </div>
    </section>
@endsection
