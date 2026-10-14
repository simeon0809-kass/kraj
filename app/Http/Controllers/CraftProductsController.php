<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class CraftProductsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Renderable
     */
    public function __invoke(Request $request)
    {
        return view('front.categories.index');
    }

    public function showProducts(int $id)
    {
        $category = Category::with('products')->findOrFail($id);
        $products = $category->products->sortByDesc('created_at');

        return view('front.categories.index', compact('products'));
    }
}
