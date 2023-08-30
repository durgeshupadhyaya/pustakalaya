<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::latest()->paginate(20);
        return view('admin.review.index', compact('reviews'));
    }

    public function edit(ProductReview $allreview)
    {
        return view('admin.review.edit', compact('allreview'));
    }

    public function update(Request $request, ProductReview $allreview)
    {
        $allreview->update(
            [
                'status' => $request->status,
                'is_seen' => 1
            ]
        );
        return redirect()->route('admin.allreviews.index')->with('success', 'Review Updated');
    }

    public function destroy(ProductReview $allreview)
    {
        $allreview->delete();
        return redirect()->route('admin.allreviews.index')->with('success', 'Review Deleted');
    }
}
