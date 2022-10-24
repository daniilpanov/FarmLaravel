@extends('layouts.main')

@section('header.image.url'){{ $page?->image?->path() }}@endsection
@section('header.image.classes'){{ 'large' }}@endsection

@section('content')
    <section>
        <h2 class="first">Самовывоз</h2>
        <div class="row">
            <div class="col-md">
                <div style="position:relative;overflow:hidden">
                    <a href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/?utm_medium=mapframe&utm_source=maps"
                       style="color:#eee;font-size:12px;position:absolute;top:0">
                        Санкт‑Петербург и Ленинградская область
                    </a>
                    <a href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/house/kiyevskoye_shosse_59/ZkAYfw5mSEcFQFtjfXh0eHtqZw==/?from=mapframe&ll=29.996122%2C59.459793&utm_medium=mapframe&utm_source=maps&z=16"
                       style="color:#eee;font-size:12px;position:absolute;top:14px">
                        Киевское шоссе, 59 — Яндекс Карты
                    </a>
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUNb2AvoB" width="560" height="400"
                            allowfullscreen style="position:relative">
                    </iframe>
                </div>
            </div>
            <div class="col-md">
                <ul>
                    <li>ИЗ МАГАЗИНА по адресу: Ленинградская область, Гатчинский
                        район,пос.Никольское,Киевское шоссе,д.59
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md">
                <div style="position:relative;overflow:hidden">
                    <a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                       style="color:#eee;font-size:12px;position:absolute;top:0">
                        Яндекс Карты
                    </a>
                    <a href="https://yandex.ru/maps/10174/saint-petersburg-and-leningrad-oblast/house/derevnya_ryabizi/ZkAYfwBnSkMEQFtjfXh4cn9hZw==/?ll=29.978808%2C59.493734&utm_medium=mapframe&utm_source=maps&z=17.37"
                       style="color:#eee;font-size:12px;position:absolute;top:14px">
                        59.493323,29.977363 — Яндекс Карты
                    </a>
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUNb2bzsA" width="560" height="400"
                            allowfullscreen style="position:relative">
                    </iframe>
                </div>
            </div>
            <div class="col-md">
                <ul>
                    <li>С ФЕРМЫ по адресу: Ленинградская область, Гатчинский район,Войсковицкое
                        поселение,деревня Рябизи, Фермерская ул.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <h2 class="first">Доставка (дата и время согласовываются в момент заказа)</h2>

        <div class="row justify-content-around">
            <div class="col-4 text-center">
                <img src="{{ asset('storage/img/St._Petersburg_Russia_Bridges_Evening_Rivers_Neva_556759_1280x853.jpg') }}"
                     height="200">
            </div>
            <div class="col-4 text-center">
                <img src="{{ asset('storage/img/oblast.jpg') }}" height="200">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-4 text-center">
                <h4 class="fourth">САНКТ-ПЕТЕРБУРГ</h4>
            </div>
            <div class="col-4 text-center">
                <h4 class="fourth">ЛЕНИНГРАДСКАЯ ОБЛАСТЬ</h4>
            </div>
        </div>

        <div class="row justify-content-around">
            <div class="col-4">
                <div class="dropdown">
                    <div class="text-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            РАЙОНЫ
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item">Красносельский</a></li>
                            <li><a class="dropdown-item">Кировский</a></li>
                            <li><a class="dropdown-item">Московский</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="dropdown">
                    <div class="text-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            РАЙОНЫ
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item">Гатчинский</a></li>
                            <li><a class="dropdown-item">Кингиссеппский</a></li>
                            <li><a class="dropdown-item">Волосовский</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
