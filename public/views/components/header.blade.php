@hasSection('header.image.url')
<div class="header-img @section('header.image.classes')@show"
     style="background-image:url('@section('header.image.url')@show')">
</div>
@endif

@isset($nav_disable)
@elseif(!empty($menu))
    <nav class="navbar navbar-expand-lg navbar-light container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width: 100%; justify-content: space-between">
                @isset($page_alias)
                    @foreach($menu as $item)
                        <li class="nav-item doska">
                            <a class="nav-link lnk{!! $item->alias == $page_alias ? ' active" aria-current="page' : '' !!}"  href="/{{ $item->alias }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                @else
                    @foreach($menu as $item)
                        <li class="nav-item doska">
                            <a class="nav-link lnk"  href="/{{ $item->alias }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </nav>
@endisset
