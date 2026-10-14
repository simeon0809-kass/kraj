<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        $topNews = News::orderBy("id", "desc")->limit(12)->get();
        
        $chunks = $topNews->chunk(3);

        return view('front.news.index', [
            'newNewsLeft'   => $chunks->get(0, collect()),
            'newNewsRight'  => $chunks->get(1, collect()),
            'oldNewsLeft'   => $chunks->get(2, collect()),
            'oldNewsRight'  => $chunks->get(3, collect())
        ]);
    }
    
    public function showNews($id)
    {
        $news = News::findOrFail($id);
        
        return view('front.news.show', compact('news'));
    }
}
