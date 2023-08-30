<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreInquiryRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\HomeCategorywiseProduct;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $best_sellers = Product::where('status', 1)->inRandomOrder()->limit(12)->get();
        $new_arrivals = Product::where('status', 1)->inRandomOrder()->limit(12)->latest()->get();
        $p_category = getParentCategories();
        $sliders = Slider::oldest('order')->get();
        $settings = Setting::pluck('value', 'key');
        return view('frontend.index', compact('best_sellers', 'new_arrivals', 'p_category', 'sliders'));
    }

    public function contact()
    {
        $socialmedias = SocialMedia::get();
        return view('frontend.contact', compact('socialmedias'));
    }

    public function inquiry(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        Inquiry::create($request->all());
        return redirect()->back()->with('message', 'Thank you, your enquiry has been Submitted Successfully');
    }

    public function pageDetail($slug)
    {
        $pagedetail = Page::where('slug', $slug)->first();
        return view('frontend.page', compact('pagedetail'));
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }

    public function bookRequest()
    {
        return view('frontend.bookrequest');
    }
}
