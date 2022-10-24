<div class="modal fade" id="modal-{{ $category->alias }}" tabindex="-1" aria-labelledby="{{ $category->alias }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-{{ $category->alias }}">{{ $category->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        onclick="toggleCategory('{{ $category->alias }}')" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <ul>
                    @forelse($category->products as $product)
                        <li>
                            <a class="category-item" href="/catalog/{{ $product->full_alias() }}">
                                <div>
                                    <span class="products">{{ $product->name }}</span>
                                </div>
                                <div class="dot-spawn"></div>
                                <div>
                                    <span class="product-price">{{ $product->price }}</span>
                                </div>
                            </a>
                        </li>
                    @empty
                        {{ __('No products found at this category') }}
                    @endforelse
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="toggleCategory('{{ $category->alias }}')">
                    {{ __('Закрыть') }}
                </button>
                <a href="/catalog/{{ $category->alias }}" class="btn btn-primary">
                    {{ __('Открыть полностью') }}
                </a>
            </div>
        </div>
    </div>
</div>
@if($category->isActive())
     <script>
         let active = '{{ $category->alias }}';
         $(document).ready(function () {
             window.scrollTo(0, $('#category-{{ $category->alias }}').offset().top);
             let active_modal = new bootstrap.Modal(document.getElementById('modal-{{ $category->alias }}'));
             active_modal.toggle();
         });
     </script>
@endif
