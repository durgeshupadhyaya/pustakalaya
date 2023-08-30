<div class="form-group">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Categories</h4>
        </div>

        <div class="panel-body product_category">
            <ul style="padding-left:0" class="category_checkbox">
                @foreach ($categories as $category)
                    <li>
                        <input type="checkbox" name="category[]" class=""
                            @if (in_array($category->id, $productCategories)) {{ 'checked' }} @endif
                            value="{{ $category->id }}"><label for="option">{{ $category->name }}</label>
                        <ul>
                            @if (count($category->children))
                                @include('admin.product.includes.subcategories', [
                                    'subCategories' => $category->children,
                                ])
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
