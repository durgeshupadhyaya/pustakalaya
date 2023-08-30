<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $productdetail = Product::where('slug', $slug)->first();
        // $related_products = Product::where('status', 1)->inRandomOrder()->limit(6)->latest()->get();
        $cart = \Cart::get($productdetail->id);
        $best_sellers = Product::where('status', 1)->inRandomOrder()->limit(6)->get();

        $related_products = getCategoryWiseProducts($productdetail->categories[0]->slug ?? 'novels-and-more');

        return view('frontend.product.show', compact('related_products', 'productdetail', 'cart', 'best_sellers'));
    }

    public function categoryWise(Request $request, $slug)
    {
        $paginate = $request->paginate ?? 18;
        $sort = $request->sort ?? 'asc';
        $products = Product::select('products.*')->distinct('products.id');

        $category = getCategoryFromSlug($slug);
        $category_ids = getAllChildCategories($slug);

        if ($category_ids) {
            $products = $products->join('product_categories', 'product_categories.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                ->whereIn('product_categories.category_id', $category_ids);
        }

        if (isset($_GET['sort']) && $_GET['sort']) {
            $products = $products->orderBy('price', $sort);
        }

        if (isset($_GET['min_price']) && $_GET['min_price']) {
            $products = $products->where('products.price', '>=', $_GET['min_price']);
        }
        if (isset($_GET['max_price']) && $_GET['max_price']) {
            $products = $products->where('products.price', '<=', $_GET['max_price']);
        }

        $products = $products->paginate($paginate);
        $searchParams =  $_GET ?? '';
        return view('frontend.product.category-wise', compact('products', 'searchParams', 'category'));
    }

    public function index(Request $request)
    {
        $paginate = $request->paginate ?? 18;
        $sort = $request->sort ?? 'asc';
        $products = Product::select('products.*')->distinct('products.id');

        $category = getCategoryFromSlug($request->categories);
        $category_ids = getAllChildCategories($request->categories);

        if ($category_ids) {
            $products = $products->join('product_categories', 'product_categories.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'product_categories.category_id')
                ->whereIn('product_categories.category_id', $category_ids);
        }

        if (isset($_GET['search']) && $_GET['search']) {
            $products = $products->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if (isset($_GET['sort']) && $_GET['sort']) {
            $products = $products->orderBy('price', $sort);
        }

        if (isset($_GET['min_price']) && $_GET['min_price']) {
            $products = $products->where('products.price', '>=', $_GET['min_price']);
        }
        if (isset($_GET['max_price']) && $_GET['max_price']) {
            $products = $products->where('products.price', '<=', $_GET['max_price']);
        }

        $products = $products->paginate($paginate);
        $params = $_GET ?? '';
        return view('frontend.product.index', compact('products', 'params'));
    }
}
