<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Renderable
     */
    public function __invoke(Request $request)
    {
        $activities = Activities::orderBy('id', 'asc')->limit(3)->get();

        $news = News::orderBy('id', 'asc')->limit(6)->get();
        $newNews = $news->slice(0, 3);
        $oldNews = $news->slice(3, 3);

        $products = Product::orderBy('created_at', 'desc')->limit(3)->get();

        // check for manually added newspaper files on the public disk
        $pdfPath = Storage::disk('public')->exists('pdfs/e-vesnik.pdf') ? Storage::url('pdfs/e-vesnik.pdf') : null;

        // try specific filenames first, otherwise auto-detect up to two image files in the images folder
        $pageOne = null;
        $pageTwo = null;

        $specificOne = 'images/evesnik-page-1.jpeg';
        $specificTwo = 'images/evesnik-page-2.jpeg';

        if (Storage::disk('public')->exists($specificOne)) {
            $pageOne = Storage::url($specificOne);
        }
        if (Storage::disk('public')->exists($specificTwo)) {
            $pageTwo = Storage::url($specificTwo);
        }

        if (! $pageOne || ! $pageTwo) {
            $files = collect(Storage::disk('public')->files('images'))
                ->filter(fn ($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp']))
                ->sort()
                ->values();

            foreach ($files as $file) {
                $url = Storage::url($file);
                if (! $pageOne) {
                    $pageOne = $url;

                    continue;
                }
                if (! $pageTwo) {
                    $pageTwo = $url;
                    break;
                }
            }
        }

        $galleries = Gallery::with(['images' => function ($query) {
            $query->orderByDesc('created_at');
        }])->get();

        return view('front.home.index', compact('activities', 'newNews', 'oldNews', 'products', 'pdfPath', 'pageOne', 'pageTwo', 'galleries'));
    }
}
