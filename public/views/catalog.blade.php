@extends('layouts.main')

@push('styles')
    <style>
        .empty-img {
            height: 200px;
        }
    </style>
@endpush

@section('header.image.url'){{ $page?->image?->path() }}@endsection

@section('content')
    <section>
        <h1 class="first">{{ $___('we_have', 'Мы предлагаем') }}:</h1>

        <div class="row catalog-row">
            @forelse($catalog as $category)
                <div class="col-md-3" id="category-{{ $category->alias }}">
                    @if($category->image == null)
                        <div class="empty-img"></div>
                    @else
                        {!! $category->image !!}
                    @endif

                    <a class="btn lnk" data-bs-toggle="modal" data-bs-target="#modal-{{ $category->alias }}"
                       onclick="toggleCategory('{{ $category->alias }}')" href="?category={{ $category->alias }}">
                        <u class="fourth text-center text-uppercase">{{ $category->name }}</u>
                    </a>

                    @include('components.category')
                </div>
            @empty
                {{ __('Catalog is empty') }}
            @endforelse
        </div>
    </section>
    <script>
        function toggleCategory(alias) {
            if (typeof active !== 'undefined' && active) {
                window.history.pushState('', '', location.pathname);
                active = null;
            } else {
                window.history.pushState('', '', location.pathname + `?category=${alias}`);
                active = alias;
            }
        }
    </script>
@endsection
