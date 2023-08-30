@if ($subCategories)
    @foreach ($subCategories as $sub)
        <li>
            <input type="checkbox" @if (in_array($sub->id, $productCategories)) {{ 'checked' }} @endif name="category[]"
                class="" value="{{ $sub->id }}">
            <label>{{ $sub->name }}</label>
            <ul>
                @if (count($sub->children))
                    @include('admin.product.includes.subcategories', [
                        'subCategories' => $sub->children,
                    ])
                @endif
            </ul>
        </li>
    @endforeach
@endif
