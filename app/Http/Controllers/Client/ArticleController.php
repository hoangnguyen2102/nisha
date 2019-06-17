<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('client.basic.article', [
            'newArticles'       => $this->getNewArticle(),
            'articles'          => $this->getAllArticle()
        ]);
    }

    public function getNewArticle()
    {
        return Article::getNewArticle();
    }

    public function getAllArticle()
    {
        return Article::getAll();
    }
}
