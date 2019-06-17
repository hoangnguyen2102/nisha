<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SingleArticleController extends Controller
{
    //
    public function index($slug)
    {
        return view('client.basic.single-article', [
            'data'  =>  Article::findBySlug($slug),
            'otherNews'    =>  Article::getOtherNews(),
        ]);
    }
}
