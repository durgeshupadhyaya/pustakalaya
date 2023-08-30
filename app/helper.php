<?php

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Session;

function getSocialmedia()
{
    return SocialMedia::get();
}

function getpaymentGateways()
{
    return PaymentGateway::oldest('order')->get();
}

function getSettings()
{
    return Setting::pluck('value', 'key')->toArray();
}

function getAllPages()
{
    return Page::oldest('id')->get();
}

function getPage($slug)
{
    return Page::where('slug', $slug)->first();
}

function getBlogs()
{
    return  Blog::all();
}

function getCategoryFromSlug($slug)
{
    return Category::where('slug', $slug)->first();
}
function getCategory()
{
    return Category::orderBy('order', 'ASC')->get();
}

function getParentCategories()
{
    return Category::where('parent_id', 0)->where('is_featured', 1)->orderBy('order', 'ASC')->get();
}

function getChildCategories($parent_id)
{
    return Category::where('parent_id', $parent_id)->get();
}

function getProductsFromCategory($category, $limit)
{
    $category_ids = getAllChildCategories($category);
    return Product::select('products.*')->distinct()->join('product_categories', 'product_categories.product_id', '=', 'products.id')
        ->join('categories', 'categories.id', '=', 'product_categories.category_id')
        ->whereIn('product_categories.category_id', $category_ids)->limit($limit)->latest()->get();
}

function getAllChildCategories($slug)
{
    $mainCategory = Category::where('slug', $slug)->first();
    if ($mainCategory) {
        $parent_id = $mainCategory->id;
        $main = Category::where('parent_id', $parent_id)->get();
        $emp = [];
        $emp[$parent_id][] = $mainCategory->id;
        if ($main->count() > 0) {
            foreach ($main as $m1) {
                $emp[$parent_id][] = $m1->id;
                if ($m1) {
                    $main1 = Category::where('parent_id', $m1->id)->get();

                    foreach ($main1 as $m) {
                        $emp[$parent_id][] = $m->id;
                    }
                }
            }
        }
        return $emp[$parent_id];
    }
}

function priceAfterDiscount($mrp, $discount)
{
    return ceil($mrp - ($mrp * $discount / 100));
}

function getShippingCharge()
{
    $shipping_charge =  Setting::pluck('value', 'key')->toArray();
    return  $shipping_charge['shipping_charge'] ?? 0;
}


function getTotalAmount()
{
    if (Session::has('couponDiscount')) {
        $total_amount = getCouponDiscount();
    } else {
        $total_amount = \Cart::getTotal();
    }
    return $total_amount ?? 0;
}

function getCouponDiscount()
{
    $coupon =  Session::get('couponDiscount');
    if ($coupon['coupontype'] == 'fixed') {
        $discount = \Cart::getTotal() - $coupon['couponvalue'];
        return $discount ?? 0;
    } else {
        if ($coupon['couponvalue'] < 100) {
            $discount = \Cart::getTotal() - (\Cart::getTotal() * $coupon['couponvalue'] / 100);
            return ceil($discount) ?? 0;
        }
    }
}

function discount()
{
    $coupon =  Session::get('couponDiscount');
    if ($coupon['coupontype'] == 'fixed') {
        return 'R.s ' . $coupon['couponvalue'];
    } else {
        return '% ' . $coupon['couponvalue'];
    }
}


function getFooterParentCategories()
{
    return Category::where('parent_id', 0)->where('is_featured', 1)->inRandomOrder()->limit(5)->latest()->get();
}


function getBanner($position)
{
    $banner =  Banner::select('image', 'link')->where('position', $position)->first();
    return [
        'image' =>  asset('admin/images/banner/' . $banner->image) ?? null,
        'link' =>  $banner->link ?? null,
    ];
}

function getCategoryWiseProducts($slug, $limit = 6)
{
    $products = Product::select('products.*')->distinct('products.id');
    $category_ids = getAllChildCategories($slug);

    if ($category_ids) {
        $products = $products->join('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'product_categories.category_id')
            ->whereIn('product_categories.category_id', $category_ids);
    }

    $products = $products->inRandomOrder()->limit($limit)->latest()->get();
    return $products;
}
