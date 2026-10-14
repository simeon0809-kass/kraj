<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Quote;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class CraftsCategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Renderable
     */
    public function __invoke(Request $request)
    {
        $quotes = Quote::all();
        $categories = Category::with('products')->get();
        $products = Product::latest()->get();

        return view('front.crafts.index', compact('quotes', 'categories', 'products'));
    }
}
