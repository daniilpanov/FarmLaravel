<div class="header-img @section('header.image.classes')@show"
     style="background-image:url('@section('header.image.url')@show')">
</div>

@isset($nav_disable)
@else
    <nav class="navbar navbar-expand-lg navbar-light container">
        <!-- <a class="navbar-brand" href="#">Меню</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width: 100%; justify-content: space-between">
                <li class="nav-item doska">
                    <a class="nav-link" href="/">О ферме</a>
                </li>
                <li class="nav-item doska">
                    <a class="nav-link" href="/catalog">Продукция</a>
                </li>
                <li class="nav-item doska">
                    <a class="nav-link" href="/delivery">Доставка и самовывоз</a>
                </li>
                <li class="nav-item doska">
                    <a class="nav-link" href="/contacts">Контакты</a>
                </li>
            </ul>
        </div>
    </nav>
@endisset
