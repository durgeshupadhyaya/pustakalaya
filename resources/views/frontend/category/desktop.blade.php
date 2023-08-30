<ul class="submenu dropdown-menu">
    @if ($subCategories)
        @foreach ($subCategories as $sub)
            <li>
                <a class="nav-link d-flex flex-center-between"
                    href="{{ route('product.category', $sub->slug) }}">{{ $sub->name ?? '' }}
                    @if (count($sub->children))
                        <i class="fa-solid fa-angle-right small"></i>
                    @endif
                </a>

                @if (count($sub->children))
                    @include('frontend.category.desktop', [
                        'subCategories' => $sub->children,
                    ])
                @endif
            </li>
        @endforeach
    @endif
</ul>
