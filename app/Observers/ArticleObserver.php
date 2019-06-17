<?php

namespace App\Observers;

use App\Models\Admin\Article;

class ArticleObserver
{
    //
    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Admin\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        $article->articles()->detach();
    }
}
